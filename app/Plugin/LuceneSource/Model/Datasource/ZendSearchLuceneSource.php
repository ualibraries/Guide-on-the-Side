<?php

App::import('Vendor', 'Zend_Search_Lucene', array('file' => 'Zend' . DS . 'Search' . DS . 'Lucene.php'));

class ZendSearchLuceneSource extends DataSource {

    // GMH patch: these are used by Model::getColumnType()
    public $startQuote = null;
    public $endQuote = null;
  
    public $description = 'Zend_Search_Lucene index interface';
    
    public $indexFile = null;

	public $indexDirectory = null;
    
    protected $_schema = array(
		'id' => array(
			'type' => 'integer',
			'length' => 10,
		),
    	'document' => array()
    );
    
    protected $sources = array('search_indices');
    
    private $__index = null;
    

    public function __construct($config) {
    	$this->indexFile = $config['indexFile'];
    	$this->__setSources($config['source']);
		
		$this->indexDirectory = TMP;
		if (!empty($config['indexDirectory'])) {
			$this->indexDirectory = $config['indexDirectory'];
		}
    	$this->__loadIndex($this->indexDirectory . $this->indexFile);
        
		Zend_Search_Lucene_Search_QueryParser::setDefaultEncoding(strtolower(Configure::read('App.encoding')));
		
		if (!empty($config['analyzer'])) {
			Zend_Search_Lucene_Analysis_Analyzer::setDefault(new $config['analyzer']());
		}

		parent::__construct($config);
    }

	public function read(&$model, $queryData = array()) {
		$this->_startLog();
		
		try {
			$items = $this->__readData(&$model, $queryData);
			if ($items) {
				$items = $this->__getPage($items, $queryData);
				$this->numRows = count($items);
			}
		} catch (Zend_Exception $e) {
			$this->error = $e->getMessage();
			$items = false;
		}

		if (Set::extract($queryData, 'fields') == '__count') {
			$items = array(array($model->alias => array('count' => count($items))));
		}

		$this->_closeLog();

		return $items;
	}

	public function delete(&$model, $id = null) {
		$id = current((array)$id);
		if (!$id) {
			return false;
		}
		
		return $this->__delete($id);
	}
	
	public function deleteAll() {
		return $this->__delete();
	}

	public function create(&$model, $fields = array(), $values = array()) {
		$count = $this->__index->count();
		
		foreach ($fields as $i => $field) {
			$doc = $this->__createSearchDocument();
			foreach ($values[$i] as $key => $val) {
				$doc->addField(Zend_Search_Lucene_Field::$val['type']($val['key'], strip_tags($val['value']), 'utf-8'));
			}
			
			
			$this->__index->addDocument($doc);
		}
		
		if ($this->__index->count() > $count) {
			return true;
		}
		
		return false;
	}
	
	public function calculate(&$model, $func, $params = array()) {
		return '__'.$func;
	}	
	
  public function expression() {
    
  }
  
	public function paginateCount() {
	
	}
	
	public function describe(&$model) {
		return $this->_schema;
	}
	
	public function listSources() {
		return $this->sources;
	}
	
	public function setMergeFactor($num) {
		$this->__index->setMergeFactor($num);
	}
	
	public function optimize() {
		$this->__index->optimize();
	}
	
	private function __createSearchDocument() {
		return new Zend_Search_Lucene_Document();
	}
	
	private function __createIndex($path) {
    	$this->__index = Zend_Search_Lucene::create($path);
    }
   
    private function __readData(&$model, $queryData) {
    	$highlight = false;
    	if (isset($queryData['highlight']) && $queryData['highlight'] == true) {
    		$highlight = true;
    	}
		
		$limit = 1000;
//  The following 3 lines break pagination. And since I can't figure out how to make Zend Lucene support
//    offset, we'll just have to get all the results for pagination to work.
//    
//		if (!empty($queryData['limit'])) {
//			$limit = $queryData['limit'];
//		}

    	$query = $this->__parseQuery($queryData);

		Zend_Search_Lucene::setResultSetLimit($limit);

		$hits = $this->__index->find($query);

		$data = array();
		foreach ($hits as $i => $hit) {
			$fields = $this->__getFieldInfo($hit->getDocument());
			
			$returnArray = array();
			foreach ($fields as $field) {
				if ($highlight && $field->isIndexed == 1) {
					$returnArray[$field->name] = $query->htmlFragmentHighlightMatches($hit->{$field->name});
				} else {
					$returnArray[$field->name] = $hit->{$field->name};
				}
			}
			
			$returnArray['id'] = $hit->id;
			$returnArray['score'] = $hit->score;

			$data[$i][$model->alias] = $returnArray;
		}
		return $data;
	}
	
	private function __parseQuery($queryData) {
		if (isset($queryData['conditions']['query'])) {
			$queryString = $queryData['conditions']['query'];
		} else {
			$conditions = array();
			foreach ($queryData['conditions'] as $key => $val) {
				if (strpos($key, '.') !== false) {
					list(, $key) = explode('.', $key, 2);
				}
				$conditions[] = "$key:$val";
			}
			$queryString = join(' ', $conditions);
		}
		$this->query = $queryString;

    	return Zend_Search_Lucene_Search_QueryParser::parse($queryString);
	}
	
	private function __getFieldInfo(Zend_Search_Lucene_Document $doc) {
		$fieldNames = $doc->getFieldNames();
		$fields = array();
		foreach ($fieldNames as $fieldName) {
			$fields[] = $doc->getField($fieldName);
		}
		
		return $fields;
	}
	
	private function __delete($index = null) {
		if (!$index) {
			return $this->__createIndex($this->indexDirectory . $this->indexFile);
		} else {
			return $this->__index->delete($index);
		}
		
		return false;
	}
	
	private function __loadIndex($path) {
    	if (file_exists($path)) {
    		return $this->__index = Zend_Search_Lucene::open($path);
    	} else {
    		return $this->__createIndex($path);
    	}
    	
    	return false;
    }
    
    private function __getPage($items = null, $queryData = array()) {
		if (empty($queryData['limit']))  {
			return $items;
		}
		$limit = $queryData['limit'];
		$page = $queryData['page'];

		$offset = $limit * ($page-1);
		return array_slice($items, $offset, $limit);
	}
	
	private function __setSources($configSource) {
    	if (!$configSource) {
    		return $this->sources;
    	}
    	
    	if (!is_array($configSource)) {
    		$this->sources = array($configSource);
    		return $this->sources;
    	}
    	
    	$this->sources = $configSource;
    	return $this->sources;
    }

	protected function _startLog() {
		$this->__queryStart = microtime(true);
		$this->query = $this->error = $this->affected = $this->numRows = $this->took = null;
	}

	protected function _closeLog() {
		if (!isset($this->__queryStart)) {
			trigger_error('Was asked to close log, but log was not started.');
		}
		
		$this->took = round((microtime(true) - $this->__queryStart) * 1000);
		$this->__queryStart = null;
		$this->_queriesTime += $this->took;
		$this->_queriesCnt++;
		
		if ($this->numRows === null) {
			$this->numRows = 0;
		}
		if (!$this->error) {
			$this->error = false;
		}
		
		$this->_queriesLog[] = array(
			'query'		=> $this->query,
			'error'		=> $this->error,
			'affected'	=> $this->affected,
			'numRows'	=> $this->numRows,
			'took'		=> $this->took,
		);
	}
	
	public function getLog($sorted = false, $clear = true) {
		$log = $this->_queriesLog;

		if ($sorted) {
			$log = sortByKey($log, 'took', 'desc', SORT_NUMERIC);
		}

		if ($clear) {
			$this->_queriesLog = array();
		}
		
		return array('log' => $log, 'count' => $this->_queriesCnt, 'time' => $this->_queriesTime);
	}
	
}

?>