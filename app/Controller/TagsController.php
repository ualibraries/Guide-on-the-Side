<?php

class TagsController extends AppController {

  public function search() {
    $term = $this->params['url']['term'];
    $tags = $this->Tag->find('all', array('fields' => array('name'), 'conditions' => array('name like' => "$term%")));
    $tags = Set::extract('/Tag/name', $tags);
    echo json_encode($tags);
    exit();
  }
}