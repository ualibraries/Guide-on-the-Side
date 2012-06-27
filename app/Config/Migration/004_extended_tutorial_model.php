<?php
if(!class_exists('AppMigration')) {
  if (file_exists(APP . 'AppMigration.php')) {
    include APP . 'AppMigration.php';
  } 
}

class M4dc07e32c360433493032b1a9ab05d96 extends AppMigration {

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
        'tutorial_types' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
					'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
				),
      ),
      'create_field' => array(
        'tutorials' => array(
          'tutorial_type_id' => array('type' => 'integer', 'null' => false, 'default' => 1),
          'external_identifier' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        ),
      )
		),
		'down' => array(
      'drop_table' => array('tutorial_types'),
      'drop_field' => array(
        'tutorials' => array('tutorial_type_id', 'external_identifier'),
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
    if ($direction === 'up') {
      $this->TutorialType = $this->generateModel('TutorialType');
      $tutorial_types = array(
        array(
          'id' => 1,
          'name' => 'side-by-side',
        ),
        array(
          'id' => 2,
          'name' => 'external',
        ),
        array(
          'id' => 3,
          'name' => 'uploaded',
        ),
        array(
          'id' => 4,
          'name' => 'document',
        ),
      );
      $this->output('insert_data', 'tutorial types');
      $this->TutorialType->saveAll($tutorial_types);
    }
		return true;
	}
}
?>