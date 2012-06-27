<?php
if(!class_exists('AppMigration')) {
  if (file_exists(APP . 'AppMigration.php')) {
    include APP . 'AppMigration.php';
  } 
}

class M4dc06554e16c485ba235279a9ab05d96 extends AppMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	var $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	var $migration = array(
		'up' => array(
      'create_table' => array(
        'system' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'value' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
      ),
		),
		'down' => array(
      'drop_table' => array('system'),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	function after($direction) {
		return true;
	}
}
?>