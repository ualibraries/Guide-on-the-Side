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
        'user_url' => 'a-sample-tutorial',
        'title' => 'A Sample Tutorial',
        'url'   => 'http://www.google.com',
        'description' => '<p>This tutorial will teach you something.</p>',
        'content' => '<p><img class="heading" src="tutorials/view_heading_image/chapter/Finding%20Google" alt="" />Look on the right side of this window. There you will find Google.</p>
    <p><img class="question" src="questions/view_image/1" alt="" /></p>
    <p><img class="heading" src="tutorials/view_heading_image/chapter/Searching%20Google" alt="" /></p>
    <p>Now, type something into the <img class="definition" src="tutorials/view_definition_image/search%20box/%3Cp%3EA%20search%20box%20is%20a%20text%20box%20in%20which%20you%20can%20enter%20search%20terms.%3C%5B%7C%5Bp%3E" alt="" />?</p>
    <p><img class="question" src="questions/view_image/2" alt="" /></p>
    <p><img class="heading" src="tutorials/view_heading_image/step/" alt="" /></p>
    <p>You should now have some search results.</p>
    <p><img class="question" src="questions/view_image/3" alt="" /></p>',
        'contact_name' => 'Librarian',
        'contact_email' => 'librarian@library.lib',
        'contact_phone' => '555-555-5555',
        'created' => '2011-04-26 13:04:27',
        'modified' => '2011-04-26 13:10:10',
        'published' => 1,
        'deleted' => 0,
        'in_index' => 1,
        'link_toc' => 1,
      );
      $this->output('insert_data', 'a sample tutorial');
      $Tutorial->save($tutorial);

      $Question = $this->generateModel('Question');
      $questions = array(
        array(
          'id' => 1,
          'question' => '<p>Did you find Google?</p>',
          'correct_answer' => 0
        ),
        array(
          'id' => 2,
          'question' => '<p>Did you find the search box?</p>',
          'correct_answer' => 1
        ),
        array(
          'id' => 3,
          'question' => '<p>Do get get some results?</p>',
          'correct_answer' => 0
        ),
      );
      $this->output('insert_data', 'sample questions');
      $Question->saveAll($questions);

      $Answer = $this->generateModel('Answer');
      $answers = array(
        array(
          'id' => 1,
          'answer' => 'Yes',
          'response' => 'Good!',
          'order' => 0,
          'question_id' => 1
        ),
        array(
          'id' => 2,
          'answer' => 'No',
          'response' => 'Please try again.',
          'order' => 1,
          'question_id' => 1
        ),
        array(
          'id' => 3,
          'answer' => 'Maybe',
          'response' => 'Please try again.',
          'order' => 2,
          'question_id' => 1
        ),
        array(
          'id' => 4,
          'answer' => 'No',
          'response' => '',
          'order' => 0,
          'question_id' => 2
        ),
        array(
          'id' => 5,
          'answer' => 'Yes',
          'response' => '',
          'order' => 1,
          'question_id' => 2
        ),
        array(
          'id' => 6,
          'answer' => 'Yes',
          'response' => '',
          'order' => 0,
          'question_id' => 3
        ),
        array(
          'id' => 7,
          'answer' => 'No',
          'response' => '',
          'order' => 1,
          'question_id' => 3
        ),
        array(
          'id' => 8,
          'answer' => "I'm not sure",
          'response' => '',
          'order' => 2,
          'question_id' => 3
        ),
      );
      $this->output('insert_data', 'sample answers');
      $Answer->saveAll($answers);

      $Revision = $this->generateModel('Revision');
      $revisions = array(
        array(
          'id' => 1,
          'tutorial_id' => 1,
          'content' => 'a:2:{s:8:"Tutorial";a:18:{s:2:"id";s:1:"1";s:8:"user_url";s:17:"a-sample-tutorial";s:5:"title";s:17:"A Sample Tutorial";s:3:"url";s:21:"http://www.google.com";s:11:"description";s:46:"<p>This tutorial will teach you something.</p>";s:7:"content";s:0:"";s:11:"certificate";s:1:"1";s:17:"certificate_email";N;s:22:"certificate_email_self";s:1:"1";s:12:"contact_name";s:9:"Librarian";s:13:"contact_email";s:21:"librarian@library.lib";s:13:"contact_phone";s:12:"555-555-5555";s:9:"published";s:1:"0";s:7:"created";s:19:"2011-04-26 13:04:27";s:8:"modified";s:19:"2011-04-26 13:04:27";s:7:"deleted";s:1:"0";s:8:"in_index";s:1:"1";s:8:"link_toc";s:1:"1";}s:9:"FinalQuiz";a:10:{s:2:"id";N;s:5:"title";N;s:7:"content";N;s:11:"certificate";N;s:17:"certificate_email";N;s:22:"certificate_email_self";N;s:18:"certificate_grades";N;s:11:"tutorial_id";N;s:7:"created";N;s:8:"modified";N;}}',
          'user_id' => 1,
          'operation' => 'created',
          'timestamp' => '2011-04-26 13:04:27',
          'log_message' => 'created'
        ),
      );
      $this->output('insert_data', 'a sample revision');
      $Revision->saveAll($revisions);

      if (isset($this->callback)) { // currently this just outputs a line break to the CLI
        $this->callback->afterMigration($this->callback, $direction);
      }
    }
    return true;
  }
}
?>