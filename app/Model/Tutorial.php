<?php
class Tutorial extends AppModel {

  public $user_id = 0; // the user updating the record. Is this bad MVC? It will be set by the controller.
  public $log_message = ''; // for passing to Revision model

  var $recursive = -1;

  var $actsAs = array('Steppable', 'Tags.Taggable', //'Search.Searchable',
    'Utils.CsvImport' => array(
      'delimiter' => ','
    ),
    'Containable'
  );
  
  var $hasMany = array('Revision');

  var $hasOne = array('FinalQuiz', 'SearchIndex');

  var $belongsTo = array('TutorialType');

  var $hasAndBelongsToMany = array('Audience', 'LearningGoal', 'ResourceType', 'Subject');

//  var $filterArgs = array(
//    array('name' => 'search_term', 'type' => 'query', 'method' => '_searchText'),
//    array('name' => 'LearningGoal', 'type' => 'query', 'method' => 'findByLearningGoals', 'field' => 'Tutorial.id'),
//    array('name' => 'ResourceType', 'type' => 'subquery', 'method' => 'findByResourceTypes', 'field' => 'Tutorial.id'),
//    array('name' => 'Keyword', 'type' => 'subquery', 'method' => 'findByTags', 'field' => 'Tutorial.id'),
//  );

  // text and intArray are implemented
  // intArray assumes HABTM
  public $allowedSearches = array(
    'term' => array('type' => 'text'),
    'learning_goal' => array('type' => 'intArray'),
    'resource_type' => array('type' => 'intArray'),
    'keyword' => array('type' => 'uuid')
  );

    var $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Tutorials must have titles!',
            ),
            'checkTitleLength' => array(
                'rule' => array(
                    'checkTitleLength',
                    'sidebyside' => 75, // tutorial type character limits
                    'external' => 255,
                ),
                'last' => true,
            ),
        ),
        'contact_email' => array(
            'email' => array(
                'rule' => 'email',
                'allowEmpty' => true,
                'message' => 'This is not an email address.'
            )
        ),
        'published' => 'boolean',
        'deleted' => 'boolean',
        'user_url' => array(
            'isUnique' => array(
                'message' => 'Tutorial URL must be unique.',
                'rule' => 'isUnique',
                'allowEmpty' => true,
            ),
            'lowerAlphaNumericDashes' => array(
                'rule' => 'lowerAlphaNumericDashes',
                'message' => 'Tutorial URL may only contain lowercase letters, numbers, and dashes.'
            )
        ),
    );

  function checkTitleLength($check, $sidebysideLimit, $externalLimit) {
    $value = array_shift($check);

    // Why isn't this field always included? Probably because it's not in the post data.
    $full_data = $this->findById($this->id);

    if ($full_data['Tutorial']['tutorial_type_id'] == 1) { // Side-by-side (QuickHelp) tutorials
      $maxlength = $sidebysideLimit;
      $error = "Titles of QuickHelp tutorials cannot be longer than $maxlength characters.";
    } else {
      $maxlength = $externalLimit;
      $error = "Titles of non-QuickHelp tutorials cannot be longer than $maxlength characters.";
    }

    if (strlen($value) > $maxlength) {
      return $error;
    }

    return true;
  }

  /* $search should have $this->params['named'] from the controller */
  /* assumes Containable */
  /* TODO: Document this!! Code review? */
  function search($search) {
    $tutorial_ids = array();
    $new_search = true;
    foreach ($this->allowedSearches as $key => $allowed) {
      $tutorial_id_results = array();
      if (array_key_exists($key, $search)) {
        if ($allowed['type'] == 'intArray') {
          $association_ids = explode('|', $search[$key]);
          $association_ids = array_filter($association_ids, 'is_numeric');
          if (!empty($association_ids)) {
            $associatedModel = $this->hasAndBelongsToMany[Inflector::camelize($key)];
            $joinModel = $associatedModel['with'];
            $foreign_key = $associatedModel['foreignKey'];
            $association_foreign_key = $associatedModel['associationForeignKey'];
            $search_results = $this->$joinModel->find('all',
              array(
                'fields' => array($foreign_key),
                'group' => $foreign_key . ' HAVING count(DISTINCT ' . $association_foreign_key .') = ' .
                   count($association_ids),
                'conditions' =>
                  array(
                    $key . '_id IN (' . join(',', $association_ids) . ')'
                  )
                )
              );
            $tutorial_id_results = Set::classicExtract($search_results, "{n}.$joinModel.$foreign_key");
          }
        } elseif ($allowed['type'] == 'text') {
          $text = Sanitize::paranoid($search[$key], array(' '));
          $individual_terms = explode(' ', $text);
          $term_results = array();
          $first_term = true;
          foreach ($individual_terms as $term) {
            $search_results = $this->find('all',
              array(
                'fields' => array('id'),
                'conditions' => array(
                  'or' => array(
                    'title LIKE ' => '% ' . $term . ' %',
                    'description LIKE ' => '% ' . $term . ' %',
                  )
                ),
              )
            );
            $tag_search_results = $this->Tag->find('all', array(
              'fields' => array('id', 'name'),
              'conditions' => array(
                 'name LIKE' => '% ' . $term . ' %',
              ),
              'contain' => array(
                'Tagged' => array(
                  'conditions' => array(
                    'model' => 'Tutorial'
                  )
                )
              )
              
            ));
            $term_results = array_unique(array_merge(
              Set::extract("/Tutorial/id", $search_results), // Tutorial model results
              Set::extract("/Tagged/foreign_key", $tag_search_results) // Tag results
            ));
            if ($first_term) {
              $tutorial_id_results = $term_results;
              $first_term = false;
            } else {
              $tutorial_id_results = array_intersect($tutorial_id_results, $term_results);
            }
          }
        }
        if ($new_search) {
          $tutorial_ids = $tutorial_id_results;
          $new_search = false;
        } else {
          $tutorial_ids = array_intersect($tutorial_ids, $tutorial_id_results);
        }
      }

    }
    return $tutorial_ids;
  }

   function _searchText($data) {
    if (empty($data['search_term'])) {
      return array();
    }
    $this->Tagged->Behaviors->attach('Containable', array('autoFields' => false));
    $this->Tagged->Behaviors->attach('Search.Searchable');
    $subquery = $this->Tagged->getQuery('all', array(
        'conditions' => array('Tag.name LIKE'  => '%' . $data['search_term'] . '%'),
        'fields' => array('foreign_key'),
        'contain' => array('Tag')
    ));
    $conditions = array(
      'OR' => array(
        $this->alias . '.title LIKE' => '%' . $data['search_term'] . '%',
        $this->alias . '.description LIKE' => '%' . $data['search_term'] . '%',
        $this->alias . '.id IN (' . $subquery . ')',
      )
    );
//    $conditions['OR'][] = $this->_findByTags($data);
    return $conditions;
  }

  function findByLearningGoals($data = array()) {
    $ids = explode('|', $data['LearningGoal']);
    $this->LearningGoalsTutorial->Behaviors->attach('Containable', array('autoFields' => false));
    $this->LearningGoalsTutorial->Behaviors->attach('Search.Searchable');
    $conditions = array();
    foreach ($ids as $id) {
      $conditions[] = array('LearningGoalsTutorial.learning_goal_id' => $id);
    }
    $query = $this->LearningGoalsTutorial->getQuery('all',
       array(
         'conditions' => $conditions,
         'fields' => array('tutorial_id'),
       )
    );

    return $query;
  }

  // No DRY here. :-( Running out of time.
  function findByResourceTypes($data = array()) {
    $ids = explode('|', $data['ResourceType']);
    $ids = join(',', $ids);
    $this->ResourceTypesTutorial->Behaviors->attach('Containable', array('autoFields' => false));
    $this->ResourceTypesTutorial->Behaviors->attach('Search.Searchable');

    $query = $this->ResourceTypesTutorial->getQuery('all',
       array(
         'conditions' => array('ResourceTypesTutorial.resource_type_id IN (' . $ids . ')'),
         'fields' => array('tutorial_id'),
       )
    );
    return $query;
  }

  function findByTags($data = array()) {
    $ids = explode('|', $data['Keyword']);
    $ids = join("','", $ids);
    $ids = "'" . $ids . "'";
    $this->Tagged->Behaviors->attach('Containable', array('autoFields' => false));
    $this->Tagged->Behaviors->attach('Search.Searchable');

    $query = $this->Tagged->getQuery('all',
       array(
         'conditions' => array('Tagged.tag_id IN (' . $ids . ')'),
         'fields' => array('foreign_key'),
       )
    );
    return $query;
  }

  // callback for CsvImport Behavior
  function beforeImport($data) {
    $data['Tutorial']['published'] = true;
    if (stripos($data['Tutorial']['external_identifier'], 'quickHelp') !== FALSE) {
      // This is already a QuickHelp tutorial. Update the existing one.
      $data['Tutorial']['tutorial_type_id'] = TUTORIAL_TYPE_SIDEBYSIDE;
      $data['Tutorial']['id']  = substr($data['Tutorial']['external_identifier'],
        strrpos($data['Tutorial']['external_identifier'], '/') + 1);
      $data['Tutorial']['external_identifier'] = null;
      // Get the current title to pass validation
      $this->id = $data['Tutorial']['id'];
      $this->read(null);
      $data['Tutorial']['title'] = $this->data['Tutorial']['title'];

      $data['Tutorial']['dot_last_revision_timestamp'] = '0000-00-00 00:00:00';
    } else {
      $data['Tutorial']['tutorial_type_id'] = TUTORIAL_TYPE_EXTERNAL;

      if (!empty($data['Tutorial']['dot_last_revision_timestamp'])) {
        $data['Tutorial']['dot_last_revision_timestamp'] = date('Y-m-d',
           strtotime($data['Tutorial']['dot_last_revision_timestamp']));
      } else {
        $data['Tutorial']['dot_last_revision_timestamp'] = '0000-00-00 00:00:00';
      }
    }
    //common processing

    if (!empty($data['Tutorial']['dot_creation_timestamp'])) {
      $data['Tutorial']['dot_creation_timestamp'] = date('Y-m-d',
         strtotime($data['Tutorial']['dot_creation_timestamp']));
    } else {
      $data['Tutorial']['dot_creation_timestamp'] = '0000-00-00 00:00:00';
    }

    if (!empty($data['Tutorial']['update_priority_level']) || !empty($data['Tutorial']['update_notes'])) {
      $data['Tutorial']['published'] = 0;
    }

    foreach ($data['Tutorial'] as &$field) {
      $field = trim($field);
      $field = preg_replace('/\s+/', ' ', $field);
    }

    if ($data['Tutorial']['for_credit'] === 'Y') {
      $data['Tutorial']['for_credit'] = true;
      $data['Tutorial']['in_index'] = false;
    } else {
      $data['Tutorial']['for_credit'] = false;
      $data['Tutorial']['in_index'] = true;
    }
    $tags = explode('|||', $data['Tutorial']['tags']);
    $data['Tutorial']['tags'] = join(',', $tags);

    // this will import multi-valued HABTM associations. This assumes the remote table
    //   (e.g., subjects) has a 'name' field.
    foreach ($this->hasAndBelongsToMany as $habtm_association) {
      $association_name = $habtm_association['className'];
      $csv_field = Inflector::underscore(Inflector::pluralize($association_name));

      // Multiple values in multi-valued fields are delimited by a triple pipe (|||)
      // e.g., this will look for a learning_goals field in the CSV file
      if (!isset($data['Tutorial'][$csv_field])) {
        continue;
      }
      $association_data = explode('|||', $data['Tutorial'][$csv_field]);
      foreach ($association_data as $name) {
        $object = $this->$association_name->find('first', array('conditions' => array('name' => trim($name))));
        if ($object) {
          $data[$association_name][] = $object[$association_name]['id'];
        } else {
          $this->$association_name->create();
          $new_object = array(
            'name' => trim($name),
          );
          $this->$association_name->save($new_object);
          $data[$association_name][] = $this->$association_name->id;
        }
      }

      unset($data['Tutorial'][$name]);
    }
    return $data;
  }

 

  function lowerAlphaNumericDashes($check) {
    $keys = array_keys($check);
    $field_name = $keys[0];
    return preg_match('/^[a-z0-9\-]*$/', $check[$field_name]);
  }

  public $findMethods = array('published' => true, 'deleted' => true, 'unpublished' => true, 
      'undeleted' => true, 'public' => true);

  public function delete($id = null) {
    if (is_numeric($id)) {
      $tutorial = $this->findById($id);
      if (!$tutorial['Tutorial']['deleted']) {
        $tutorial['Tutorial']['deleted'] = true;
        if ($this->save($tutorial)) {
          return true;
        }
      }
    }
  }

  public function undelete($id = null) {
    if (is_numeric($id)) {
      $tutorial = $this->findById($id);
      if ($tutorial['Tutorial']['deleted']) {
        $tutorial['Tutorial']['deleted'] = false;
        if ($this->save($tutorial)) {
          return true;
        }
      }
    }
  }

  public function publish($id = null) {
    if (is_numeric($id)) {
      $tutorial = $this->findById($id);
      if (!$tutorial['Tutorial']['published']) {
        $tutorial['Tutorial']['published'] = true;
        if ($this->save($tutorial)) {
          return true;
        }
      }
    }
  }

  public function unpublish($id = null) {
    if(is_numeric($id)) {
      $tutorial = $this->findById($id);
      if ($tutorial['Tutorial']['published']) {
        $tutorial['Tutorial']['published'] = false;
        if ($this->save($tutorial)) {
          return true;
        }
      }
    }
  }

  protected function _findPublished($state, $query, $results = array()) {
    if ($state == 'before') {
      $query['conditions']['deleted'] = false;
      $query['conditions']['published'] = true;
      return $query;
    } else {
      return $results;
    }
  }

  protected function _findDeleted($state, $query, $results = array()) {
    if ($state == 'before') {
      $query['conditions']['deleted'] = true;
      return $query;
    } else {
      return $results;
    }
  }

  protected function _findUnpublished($state, $query, $results = array()) {
    if ($state == 'before') {
      $query['conditions']['published'] = false;
      $query['conditions']['deleted'] = false;
      return $query;
    } else {
      return $results;
    }
  }

  protected function _findUndeleted($state, $query, $results = array()) {
    if ($state == 'before') {
      $query['conditions']['deleted'] = false;
      return $query;
    } else {
      return $results;
    }
  }

  protected function _findPublic($state, $query, $results = array()) {
    if ($state == 'before') {
      $query['conditions']['deleted'] = false;
      $query['conditions']['published'] = true;
      $query['conditions']['in_index'] = true;
      return $query;
    } else {
      return $results;
    }
  }

  public function afterFind($results = array(), $primary = false) {
    if ($primary) {
      foreach($results as $key => &$tutorial) {
        if (isset($tutorial['Tutorial']['tutorial_type_id'])) {
          if ($tutorial['Tutorial']['tutorial_type_id'] == 1) {
            $tutorial['Tutorial']['edit_action'] = 'edit_content';
          } elseif ($tutorial['Tutorial']['tutorial_type_id'] == 2) {
            $tutorial['Tutorial']['edit_action'] = 'edit_external';
          }
        }
        if (isset($tutorial['Tutorial']['description']) && !empty($tutorial['Tutorial']['description'])) {
          $short_description_array = explode('.', $tutorial['Tutorial']['description']);
          $tutorial['Tutorial']['short_description'] = $short_description_array[0] . '.';
          if (array_key_exists(1, $short_description_array)) {
            $tutorial['Tutorial']['short_description'] .= '&nbsp;...';
          }
//          for ($i = 0; $i < 20; $i++) {
//            $tutorial['Tutorial']['short_description'] .= $short_description_array[$i] . ' ' ;
//          }
//          $tutorial['Tutorial']['short_description'] .= ' ...';
        }
      }
    }

    return $results;
  }

  public function afterSave($created) {
    // check published status
    $tutorial = $this->findById($this->id);
    if ($tutorial['Tutorial']['tutorial_type_id'] == 2) { // fix the magic number stuff. There is a constant defined
                                                            //   in the controller, but that doesn't help unit tests.
      $tutorial['Tutorial']['published'] = true; // unpublished external tutorials don't make sense
    }

    $revision = $this->Revision->create();
    $revision['Revision']['tutorial_id'] = $this->id;

    // get the whole record for versioning.
    $options = array(
      'contain' => array('FinalQuiz', 'LearningGoal', 'ResourceType', 'Tag', 'Audience', 'Subject', 'TutorialType'),
      'conditions' => array('Tutorial.id' => $this->id),
    );
    $tutorial = $this->find('first', $options);
    $revision['Revision']['content'] = serialize($tutorial);
    $revision['Revision']['user_id'] = $this->user_id; 
    $revision['Revision']['operation'] = (($created) ? 'created' : 'modified');
    $revision['Revision']['timestamp'] = date('Y-m-d H:i:s'); // TODO: this does not guarantee uniqueness, clearly.
    if (!empty($this->data['Revision']['message'])) {
      $revision['Revision']['log_message'] = $this->data['Revision']['message'];
    } elseif (!empty($this->log_message)) {
      $revision['Revision']['log_message'] = $this->log_message;
    }
    if (!$this->Revision->save($revision)) {
      debug('Error saving revision');
    }

    // update Lucene index
    $boolean_query = new Zend_Search_Lucene_Search_Query_Boolean();
    $lucene_term = new Zend_Search_Lucene_Index_Term($this->id, 'tutorial_id');
    $lucene_query = new Zend_Search_Lucene_Search_Query_Term($lucene_term);
    $boolean_query->addSubquery($lucene_query, true);
    $hits = $this->SearchIndex->find('all', array('conditions' => array('query' => $boolean_query)));
    foreach ($hits as $hit) {
      $this->SearchIndex->delete($hit['SearchIndex']['id']);
    }
    $saveData = array('SearchIndex' => array(
      'document' => array(
        array(
          'key' => 'tutorial_id',
          'value' => $tutorial['Tutorial']['id'],
          'type' => 'Keyword'
        ),
        array(
          'key' => 'title',
          'value' => $tutorial['Tutorial']['title'],
          'type' => 'Text'
        ),
        array(
          'key' => 'description',
          'value' => $tutorial['Tutorial']['description'],
          'type' => 'Text'
        ),
        array(
          'key' => 'tags',
          'value' => $tutorial['Tutorial']['tags'],
          'type' => 'Text'
        ),
        array(
          'key' => 'learning_goal',
          'value' => join(' ', Set::extract('/id', $tutorial['LearningGoal'])),
          'type' => 'Text'
        ),
        array(
          'key' => 'resource_type',
          'value' => join(' ', Set::extract('/id', $tutorial['ResourceType'])),
          'type' => 'Text'
        ),
        array(
          'key' => 'keyword',
          'value' => join(' ', Set::extract('/id', $tutorial['Tag'])),
          'type' => 'Text'
        ),
      )
    ));
    $this->SearchIndex->save($saveData);
  }

}
?>
