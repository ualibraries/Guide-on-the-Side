<?php
class AddDefaultValueUsersDeletedColumn extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
			'alter_field' => array(
				'users' => array(
					'deleted' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
				),
			),
		),
		'down' => array(
			'alter_field' => array(
				'users' => array(
					'deleted' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
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
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
