<?php
if(!class_exists('AppMigration')) {
  if (file_exists(APP . 'AppMigration.php')) {
    include APP . 'AppMigration.php';
  } 
}

class M4de9564c6f104137b35e11d39ab05d96 extends AppMigration {

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
			'create_field' => array(
				'tutorials' => array(
					'author' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'format' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'updater' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'update_priority' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'update_notes' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'accessible_version_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'accessible_version_format' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
 					'for_credit' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
				),
			),
      'alter_field' => array(
        'tags' => array(
          'name' => array('length' => 255),
          'keyname' => array('length' => 255),
        ),
      ),
			'drop_field' => array(
				'tutorials' => array('dot_ada_version',),
			),
		),
		'down' => array(
			'drop_field' => array(
				'tutorials' => array('author', 'format', 'updater', 'update_priority', 'update_notes', 'accessible_version_url', 'accessible_version_format', 'for_credit'),
			),
			'create_field' => array(
				'tutorials' => array(
					'dot_ada_version' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
				),
			),
      'alter_field' => array(
        'tags' => array(
          'name' => array('length' => 30),
          'keyname' => array('length' => 30),
        ),
      ),
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