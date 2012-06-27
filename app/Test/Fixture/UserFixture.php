<?php
class UserFixture extends CakeTestFixture {
	var $name = 'User';

  var $fields = array(
    'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
    'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'comment' => 'user name (sometimes)', 'charset' => 'utf8'),
    'role_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
    'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'comment' => 'password', 'charset' => 'utf8'),
    'deleted' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
  );
  
}
?>