<?php
/* ResourceType Fixture generated on: 2011-10-04 15:09:47 : 1317762587 */
class ResourceTypeFixture extends CakeTestFixture {
	var $name = 'ResourceType';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Assessment'
		),
		array(
			'id' => 2,
			'name' => 'Database Tutorial'
		),
		array(
			'id' => 3,
			'name' => 'Demonstration'
		),
		array(
			'id' => 4,
			'name' => 'Exercise'
		),
		array(
			'id' => 5,
			'name' => 'Guide'
		),
		array(
			'id' => 6,
			'name' => 'In-Class Activity'
		),
		array(
			'id' => 7,
			'name' => 'Lecture'
		),
		array(
			'id' => 8,
			'name' => 'Simulation'
		),
		array(
			'id' => 9,
			'name' => 'Scenario'
		),
		array(
			'id' => 10,
			'name' => 'Video'
		),
	);
}
