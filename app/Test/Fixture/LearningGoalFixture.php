<?php
/* LearningGoal Fixture generated on: 2011-10-04 15:08:47 : 1317762527 */
class LearningGoalFixture extends CakeTestFixture {
	var $name = 'LearningGoal';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2048, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Developing a Research Strategy'
		),
		array(
			'id' => 2,
			'name' => 'Selecting Finding Tools'
		),
		array(
			'id' => 3,
			'name' => 'Searching'
		),
		array(
			'id' => 4,
			'name' => 'Using Finding Tool Features'
		),
		array(
			'id' => 5,
			'name' => 'Retrieving Sources'
		),
		array(
			'id' => 6,
			'name' => 'Evaluating Sources'
		),
		array(
			'id' => 7,
			'name' => 'Documenting Sources'
		),
		array(
			'id' => 8,
			'name' => 'Understanding Economic, Legal, and Social Issues'
		),
	);
}
