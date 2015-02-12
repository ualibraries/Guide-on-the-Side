<?php

class SearchIndex extends AppModel {
	public $useDbConfig = 'zendSearchLucene';
/**
 * Removes record for given ID. If no ID is given, the current ID is used.
 * Returns true on success.  This function has been modified to reflect the fact
 * that SearchIndex instances in Lucene can have an id of 0, something that's
 * not possible in common databases.
 *
 *
 * @param integer|string $id ID of record to delete
 * @param boolean $cascade Set to true to delete records that depend on this record
 * @return boolean True on success
 * @link http://book.cakephp.org/2.0/en/models/deleting-data.html
 */
	public function delete($id = null, $cascade = true) {
		if (!empty($id) || $id === 0 || $id === '0') {
			$this->id = $id;
		}

		$id = $this->id;

		$event = new CakeEvent('Model.beforeDelete', $this, array($cascade));
		list($event->break, $event->breakOn) = array(true, array(false, null));
		$this->getEventManager()->dispatch($event);
		if ($event->isStopped()) {
			return false;
		}

		if (!$this->exists()) {
			return false;
		}

		$this->_deleteDependent($id, $cascade);
		$this->_deleteLinks($id);

		if (!empty($this->belongsTo)) {
			foreach ($this->belongsTo as $assoc) {
				if (empty($assoc['counterCache'])) {
					continue;
				}

				$keys = $this->find('first', array(
					'fields' => $this->_collectForeignKeys(),
					'conditions' => array($this->alias . '.' . $this->primaryKey => $id),
					'recursive' => -1,
					'callbacks' => false
				));
				break;
			}
		}

		if (!$this->getDataSource()->delete($this, array($this->alias . '.' . $this->primaryKey => $id))) {
			return false;
		}

		if (!empty($keys[$this->alias])) {
			$this->updateCounterCache($keys[$this->alias]);
		}

		$this->getEventManager()->dispatch(new CakeEvent('Model.afterDelete', $this));
		$this->_clearCache();
		$this->id = false;

		return true;
	}

/**
 * Returns the current record's ID
 *
 * @param integer $list Index on which the composed ID is located
 * @return mixed The ID of the current record, false if no ID
 */
	public function getID($list = 0) {
		if($this->emptyAndNonZero($this->id) || (is_array($this->id) && isset($this->id[0]) && $this->emptyAndNonZero($this->id[0]))){
			return false;
		}

		if (!is_array($this->id)) {
			return $this->id;
		}

		if (isset($this->id[$list]) && !empty($this->id[$list])) {
			return $this->id[$list];
		}

		if (isset($this->id[$list])) {
			return false;
		}

		return current($this->id);
	}

	// delete() needs this to work. Borrowed from Model class.
	public function exists($id = null) {
		if ($id === null) {
			$id = $this->getID();
		}

		if ($id === false) {
			return $false;
		}
		$conditions = array("id"=>$id);
		$query = array('conditions' => $conditions, 'recursive' => -1, 'callbacks' => false);
		return ($this->find('count', $query) > 0);
	}

/**
 * protected function emptyAndNonZero
 *
 * @param mixed $var A variable to check.
 * @return boolean If $var evaluates as empty in PHP's empty() function and
 * is neither a string nor an integer representation of 0, true, otherwise
 * false.
 */
	protected function emptyAndNonZero($var){
		return empty($var) && $var !== 0 && $var !== '0';
	}
}
