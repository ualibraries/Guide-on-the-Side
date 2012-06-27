<?php

class SearchIndexFixture extends CakeTestFixture {
  var $name = 'SearchIndex';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'content' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'step_through' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'show_startover_link' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
    'contact_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact_phone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'has_form' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'form_method' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 16, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'form_action' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'submit_value' => array('type' => 'string', 'null' => true, 'default' => 'Submit', 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'eval_link' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'published' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'deleted' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
    'tutorial_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'title' => 'Not deleted tutorial',
			'url' => 'http://google.com',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'step_through' => 1,
			'show_startover_link' => 1,
			'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
		),
  	array(
			'id' => 2,
			'title' => 'Deleted tutorial',
			'url' => 'http://www.library.arizona.edu',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 1
		),
		array(
			'id' => 3,
			'title' => 'Published tutorial',
			'url' => 'http://www.library.arizona.edu',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
		),
		array(
			'id' => 4,
			'title' => 'Unpublished tutorial',
			'url' => 'http://www.library.arizona.edu',
			'content' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 0,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
		),
    array(
      'id' => 5,
      'title' => 'Tutorial with content',
      'url' => 'http://www.library.arizona.edu',
      'content' => '
        <img class="heading" src="tutorials/view_heading_image/chapter/Search%20the%20database" />
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        For our first question, let\'s do some stuff. Now, answer this question:
        <img class="question" src="questions/view_image/1" />
        <img class="heading" src="tutorials/view_heading_image/step/Find%20your%20result" />
        Click on the second result
        <img class="heading" src="tutorials/view_heading_image/chapter/Evaluate%20the%20result" />
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        Now, tell me your thoughts.
        <img class="question" src="questions/view_image/2" />
        <img class="heading" src="tutorials/view_heading_image/step/Read%20it" />
        Now, read the article.
        <img class="question" src="questions/view_image/3" />
        Thanks for using UAL QuickHelp!
      ',
      'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
    ),
    array(
      'id' => 6,
      'title' => 'Tutorial with TOC',
      'url' => 'http://www.library.arizona.edu',
      'content' => '
        <img class="heading" src="tutorials/view_heading_image/chapter/Search%20the%20database" />
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        For our first question, let\'s do some stuff. Now, answer this question:
        <img class="question" src="questions/view_image/1" />
        <img class="heading" src="tutorials/view_heading_image/step/Find%20your%20result" />
        Click on the second result
        <img class="heading" src="tutorials/view_heading_image/chapter/Evaluate%20the%20result" />
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        Now, tell me your thoughts.
        <img class="question" src="questions/view_image/2" />
        <img class="heading" src="tutorials/view_heading_image/step/Read%20it" />
        Now, read the article.
        <img class="question" src="questions/view_image/3" />
        Thanks for using UAL QuickHelp!
      ',
      'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
    ),
    array(
      'id' => 7,
      'title' => 'Tutorial, no chapters',
      'url' => 'http://www.library.arizona.edu',
      'content' => '
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        For our first question, let\'s do some stuff. Now, answer this question:
        <img class="question" src="questions/view_image/1" />
        <img class="heading" src="tutorials/view_heading_image/step/Find%20your%20result" />
        Click on the second result
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        Now, tell me your thoughts.
        <img class="question" src="questions/view_image/2" />
        <img class="heading" src="tutorials/view_heading_image/step/Read%20it" />
        Now, read the article.
        <img class="question" src="questions/view_image/3" />
        Thanks for using UAL QuickHelp!
      ',
      'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
    ),
    array(
      'id' => 8,
      'title' => 'Tutorial, no chap/steps',
      'url' => 'http://www.library.arizona.edu',
      'content' => '
        <img class="heading" src="tutorials/view_heading_image/chapter/Do%20stuff" />
        For our first question, let\'s do some stuff. Now, answer this question:
        <img class="question" src="questions/view_image/1" />
        <img class="heading" src="tutorials/view_heading_image/chapter/Find%20your%20result" />
        Click on the second result
        <img class="heading" src="tutorials/view_heading_image/chapter/Do%20stuff" />
        Now, tell me your thoughts.
        <img class="question" src="questions/view_image/2" />
        <img class="heading" src="tutorials/view_heading_image/chapter/Read%20it" />
        Now, read the article.
        <img class="question" src="questions/view_image/3" />
        Thanks for using UAL QuickHelp!
      ',
      'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
    ),
    array(
      'id' => 9,
      'title' => 'Tutorial, no chap/steps',
      'url' => 'http://www.library.arizona.edu',
      'content' => '
        For our first question, let\'s do some stuff. Now, answer this question:
        <img class="question" src="questions/view_image/1" />
        Click on the second result
        Now, tell me your thoughts.
        <img class="question" src="questions/view_image/2" />
        Now, read the article.
        <img class="question" src="questions/view_image/3" />
        Thanks for using UAL QuickHelp!
      ',
      'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
    ),
    array(
      'id' => 10,
      'title' => 'Tutorial with definition boxes',
      'url' => 'http://www.library.arizona.edu',
      'content' => '
        <img class="heading" src="tutorials/view_heading_image/chapter/Search%20the%20database" />
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        For our first question, let\'s do some stuff. Now, answer this question:
        <img class="question" src="questions/view_image/1" />
        <p>Learn some stuff from this definition box:</p>
        <p><img class="definition" src="tutorials/view_definition_image/Search%20details/%3Cp%3EScroll%20down%20the%20right%20hand%20menu%20to%20the%20%22%3Cstrong%3ESearch%20details%22%3C%5B%7C%5Bstrong%3E%20section.%20Click%20%22%3Cstrong%3ESee%20more...%22%3C%5B%7C%5Bstrong%3E%20to%20see%20how%20PubMed%20searched%20for%20your%20terms%20through%20the%20lists.%20The%20%3Cstrong%3ETranslations%20area%3C%5B%7C%5Bstrong%3E%20shows%20how%20each%20term%20was%20translated.%26ndash%3B%3C%5B%7C%5Bp%3E%0A%3Cp%3EClick%20the%20back%20button%20to%20return%20to%20the%20search.%3C%5B%7C%5Bp%3E" /></p>
        <img class="heading" src="tutorials/view_heading_image/step/Find%20your%20result" />
        Click on the second result
        <img class="heading" src="tutorials/view_heading_image/chapter/Evaluate%20the%20result" />
        <img class="heading" src="tutorials/view_heading_image/step/Do%20stuff" />
        Now, tell me your thoughts.
        <img class="question" src="questions/view_image/2" />
        <img class="heading" src="tutorials/view_heading_image/step/Read%20it" />
        Now, read the article.
        <img class="question" src="questions/view_image/3" />
        Thanks for using UAL QuickHelp!
      ',
      'step_through' => 1,
			'show_startover_link' => 1,
      'contact_name' => '',
      'contact_email' => '',
      'contact_phone' => '',
			'has_form' => 1,
			'form_method' => 'Lorem ipsum do',
			'form_action' => 'Lorem ipsum dolor sit amet',
			'submit_value' => 'Lorem ipsum dolor sit amet',
			'eval_link' => 'Lorem ipsum dolor sit amet',
			'published' => 1,
			'created' => '2010-09-17 16:00:56',
			'modified' => '2010-09-17 16:00:56',
			'deleted' => 0
    ),
	);
}