<?php

class SearchIndex extends AppModel {
  var $useDbConfig = 'zendSearchLucene';
//  var $useTable = false;

  // delete() needs this to work. Borrowed from Model class.
	function exists() {
		if ($this->getID() === false) {
			return false;
		}
		$conditions = array('query' => $this->getID());
		$query = array('conditions' => $conditions, 'recursive' => -1, 'callbacks' => false);
		return ($this->find('count', $query) > 0);
	}
}
