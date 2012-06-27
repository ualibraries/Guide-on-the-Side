<?php
/* Question Fixture generated on: 2010-10-08 14:10:01 : 1286572981 */
class QuestionFixture extends CakeTestFixture {
	var $name = 'Question';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'question' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'correct_answer' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'question' => 'What is your name?',
			'correct_answer' => 2
		),
		array(
			'id' => 2,
			'question' => 'Is this a good result?',
			'correct_answer' => 1
		),
		array(
			'id' => 3,
			'question' => 'Which statement best summarizes the article?',
			'correct_answer' => 3
		),
	);
}
?>