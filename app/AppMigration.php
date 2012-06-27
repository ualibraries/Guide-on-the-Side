<?php

class AppMigration extends CakeMigration {

	function __construct($options = array()) {
    parent::__construct($options);
    if (isset($this->callback)) {
      // The __messages property has been declared private with no way to set message types otherwise. Bummer.
      //$this->callback->__messages['insert_data'] = 'Inserting :data.';
    }
  }

  function output($type, $text) {
    if (isset($this->callback)) { // this is for the CLI
      $this->callback->beforeAction($this->callback, $type,
        array(
          'data' => $text,
        )
      );
    } else {
      return; // figure out how to get messages back to the web version of the installer
    }
  }
}