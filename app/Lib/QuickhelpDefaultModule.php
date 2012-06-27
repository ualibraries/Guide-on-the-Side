<?php
// This is a Guard plugin authentication module. It expects to see modules in /lib.

App::uses('DefaultModule', 'Guard.Controller/Component');

class QuickhelpDefaultModule extends DefaultModule {

  var $name = 'QuickhelpDefault';
  var $hasLoginForm = true;

  function logout() {
    parent::logout();
    $title = Configure::read('user_config.application_title');
    if (empty($title)) {
      $title = "the tutorials application";
    }  
    $this->Session->setFlash("You have signed out of $title.");

  }

}