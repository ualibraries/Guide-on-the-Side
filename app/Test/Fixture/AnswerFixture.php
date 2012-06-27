<?php
/* Answer Fixture generated on: 2010-10-08 14:10:30 : 1286572890 */
class AnswerFixture extends CakeTestFixture {
	var $name = 'Answer';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'answer' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'response' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'answer' => 'Dorothy Sayers',
			'response' => 'Uh... no.',
			'order' => 1,
			'question_id' => 1
		),
  	array(
			'id' => 2,
			'answer' => 'Ὁμηρος',
			'response' => 'Correct!',
			'order' => 2,
			'question_id' => 1
		),
   	array(
			'id' => 3,
			'answer' => 'Clark Kent',
			'response' => "Imaginative, aren't we?",
			'order' => 3,
			'question_id' => 1
		),
   	array(
			'id' => 4,
			'answer' => 'Yes',
			'response' => "No",
			'order' => 1,
			'question_id' => 2
		),
    array(
			'id' => 5,
			'answer' => 'No',
			'response' => "",
			'order' => 2,
			'question_id' => 2
		),
    array(
			'id' => 6,
			'answer' => 'Crazy stuff',
			'response' => "That is NOT correct.",
			'order' => 1,
			'question_id' => 3
		),
    array(
			'id' => 7,
			'answer' => 'Wacky stuff',
			'response' => "What's wrong with you?",
			'order' => 2,
			'question_id' => 3
		),
    array(
			'id' => 8,
			'answer' => 'It tells me my name.',
			'response' => "That'll work",
			'order' => 3,
			'question_id' => 3
		),
	);
}
?>