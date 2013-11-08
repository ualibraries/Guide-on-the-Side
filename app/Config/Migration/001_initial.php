<?php
if(!class_exists('AppMigration')) {
  if (file_exists(APP . 'AppMigration.php')) {
    include APP . 'AppMigration.php';
  } 
}

App::uses('Security', 'Utility');

class M4db71ff537bc4ee397642a369ab05d96 extends AppMigration {

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
        'answers' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'answer' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'response' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'order' => array('type' => 'integer', 'null' => true, 'default' => NULL),
          'question_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
        'final_quizzes' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'content' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'certificate' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
          'certificate_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'certificate_email_self' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
          'certificate_grades' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
          'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
          'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
          'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
        'questions' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'question' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'correct_answer' => array('type' => 'integer', 'null' => false, 'default' => NULL),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
        'revisions' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'tutorial_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
          'content' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
          'operation' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 40, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'timestamp' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
          'log_message' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
        'roles' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
        'tutorials' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'user_url' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'url' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'content' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'certificate' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
          'certificate_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'certificate_email_self' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
          'contact_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'contact_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'contact_phone' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
          'published' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
          'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
          'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
          'deleted' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
          'in_index' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
          'link_toc' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
        'users' => array(
          'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
          'username' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'comment' => 'user name (sometimes)', 'charset' => 'utf8'),
          'role_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
          'password' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1024, 'collate' => 'utf8_general_ci', 'comment' => 'password', 'charset' => 'utf8'),
          'deleted' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
          'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1),
          ),
          'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM'),
        ),
      ),
    ),
    'down' => array(
      'drop_table' => array(
        'answers', 'final_quizzes', 'questions', 'revisions', 'roles', 'tutorials', 'users'
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
    $output = array(); // not used
    if ($direction === 'up') {
      if (!class_exists('Security')) {
        App::import('Core', 'Security');
      }
      // create initial user
      $User = $this->generateModel('User');
      $user = array(
        'User' => array(
          'username' => 'admin',
          'password' => Security::hash('GuideOnTheSideAdmin#1', null, true),
          'role_id' => 2,
        )
      );
      $this->output('insert_data', 'admin user');
      $User->save($user);

      // populate roles
      $Role = $this->generateModel('Role');
      $roles = array(
        array(
          'id' => 1,
          'name' => 'creator',
        ),
        array(
          'id' => 2,
          'name' => 'admin',
        ),
      );
      $this->output('insert_data', 'roles (' . implode(', ', Set::extract('{n}.name', $roles)) . ')');
      $Role->saveAll($roles);

      // create a sample tutorial
      $Tutorial = $this->generateModel('Tutorial');
      $tutorial = array(
        'id' => 1,
        'user_url' => 'wikipedia-demo',
        'title' => 'Wikipedia - demo',
        'url'   => 'http://www.wikipedia.org/',
        'description' => '<p>In this tutorial, you will learn how to find resources using <em>Wikipedia</em>. <em>Wikipedia </em>is a free online encyclopedia with access to over 4,000,000 articles.</p>',
        'content' => '<p>In this tutorial, you will learn how to find resources using <em>Wikipedia</em>.
<em>Wikipedia </em>is a free online encyclopedia with access to over 4,000,000 articles.</p>
<p>Use the arrows below to navigate through the tutorial</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/About%20Wikipedia" alt="" /></p>
<p>Anyone can contribute to a <em>Wikipedia</em> article, so you need to use critical thinking skills when selecting articles. However, it can be a great place to gather background information on a topic that may be unfamiliar to you.</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Search%20Wikipedia" alt="" /></p>
<p>You search Wikipedia by using <img class="definition" src="tutorials/view_definition_image/keywords/%3Cp%3EKeywords%20are%20important%20words%20or%20phrases%20that%20describe%20your%20research%20topic%20and%20will%20help%20you%20find%20relevant%20articles.%3C%5B%7C%5Bp%3E" alt="" />.</p>
<p>Search for&nbsp;<strong>photography</strong>.&nbsp;</p>
<p><img class="heading" src="tutorials/view_heading_image/step/" alt="" /></p>
<p>You are now at the <em>Wikipedia</em> page for <strong>Photography</strong></p>
<p>Locate the <strong>Contents</strong> section on the left side of the page. This is the table of contents for the <em>Wikipedia</em> article.</p>
<p>Select: <strong>2 History and evolution</strong></p>
<p><img class="question" src="questions/view_image/1" alt="" /></p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Thinking%20critically%20in%20Wikipedia" alt="" /></p>
<p>One way to determine the validity of what you\'ve found is to check the <em>Wikipedia</em> citations. Use the superscript number to access information about the source.</p>
<p><img src="uploads/images/superscript_link.png" alt="example superscript link" width="300" height="139" /></p>
<p><img class="heading" src="tutorials/view_heading_image/step/" alt="" />Scroll to the <strong>Camera development</strong> section of the page and take a look at the different cameras.</p>
<p><img class="text-box" src="tutorials/view_text_box_image/multi-line/Which%20of%20these%20cameras%20would%20be%20the%20most%20fun%20to%20use%7C%24%7C/I%7C%7D%7Cd%20most%20like%20to%20use%20the..." alt="" /></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>',
        'contact_name' => 'Librarian',
        'contact_email' => 'librarian@example.com',
        'contact_phone' => '555-555-5555',
        'created' => '2013-10-24 12:06:23',
        'modified' => '2013-10-30 14:51:03',
        'published' => 1,
        'deleted' => 0,
        'in_index' => 1,
        'link_toc' => 1,
      );
      $this->output('insert_data', 'sample tutorial');
      $Tutorial->save($tutorial);

      $Question = $this->generateModel('Question');
      $questions = array(
        array(
          'id' => 1,
          'question' => '<p>What are the names of the Greek mathematicians that described a pinhole camera?</p>',
          'correct_answer' => 1,
        ),
        array(
          'id' => 2,
          'question' => '<p>What is a good use for <em>Wikipedia</em>?</p>',
          'correct_answer' => 1,
        ),
      );
      $this->output('insert_data', 'sample questions');
      $Question->saveAll($questions);

      $Answer = $this->generateModel('Answer');
      $answers = array(
        array(
          'id' => 1,
          'answer' => 'Thelma and Louise',
          'response' => 'This is not correct. Please go back and read the first sentence under Precursor technologies.',
          'order' => 0,
          'question_id' => 1
        ),
        array(
          'id' => 2,
          'answer' => 'Aristotle and Euclid',
          'response' => 'Good work! This is the correct answer.',
          'order' => 1,
          'question_id' => 1
        ),
        array(
          'id' => 3,
          'answer' => 'Fred and Barney',
          'response' => 'This is not correct. Please go back and read the first sentence under Precursor technologies.',
          'order' => 2,
          'question_id' => 1
        ),
        array(
          'id' => 4,
          'answer' => 'To keep up with celebrity gossip',
          'response' => '',
          'order' => 0,
          'question_id' => 2
        ),
        array(
          'id' => 5,
          'answer' => 'To gather background information on an unfamiliar topic',
          'response' => '',
          'order' => 1,
          'question_id' => 2
        ),
        array(
          'id' => 6,
          'answer' => 'To learn about cameras',
          'response' => '',
          'order' => 2,
          'question_id' => 2
        ),
      );
      $this->output('insert_data', 'sample answers');
      $Answer->saveAll($answers);

      $FinalQuiz = $this->generateModel('FinalQuiz');
      $finalQuiz = array(
        'id' => 1,
        'content' => '<p>Take this final quiz.<img class="question" src="questions/view_image/2" alt="" /></p>',
        'certificate' => true,
        'certificate_email_self' => true,
        'certificate_grades' => true,
        'tutorial_id' => 1,
        'created' => '2013-10-30 14:22:42',
        'modified' => '2013-10-30 14:49:14',
      );
      $this->output('insert_data', 'sample quiz');
      $FinalQuiz->saveAll($finalQuiz);
      
      if (isset($this->callback)) { // currently this just outputs a line break to the CLI
        $this->callback->afterMigration($this->callback, $direction);
      }
    }
    return true;
  }
}
?>