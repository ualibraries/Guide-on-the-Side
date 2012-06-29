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
        'user_url' => 'a-sample-tutorial',
        'title' => 'A Sample Tutorial',
        'url'   => 'http://www.library.arizona.edu/',
        'description' => '<p>This tutorial will demonstrate all of the functionality available to creators of Guide on the Side tutorials.</p>',
        'content' => '<p><img class="heading" src="tutorials/view_heading_image/chapter/Introduction" alt="" /></p>
<p>This tutorial will demonstrate all of the functionality of the Guide on the Side tutorial creation software.<img class="heading" src="tutorials/view_heading_image/chapter/Add%20and%20format%20text" alt="" /></p>
<p>Type or copy and paste text straight into the text box.</p>
<p>The editor allows you to:</p>
<ul>
<li><strong>bold</strong></li>
<li><em>italicize</em></li>
<li>undo &amp; redo</li>
<li>insert &amp; remove a hyperlink</li>
<li>add bullets</li>
<ul>
<li>indent any text you type in the box.</li>
</ul>
<li>outdent any text you type in the box</li>
</ul>
<p>&nbsp;</p>
<p><strong>For example:</strong></p>
<p>Using the library homepage to your right, place your cursor over the <strong>Search &amp; Find</strong> tab and click <strong>Library Catalog</strong>.</p>
<p>You are now in the <em>Library Catalog.</em></p>
<p>&nbsp;</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Adding%20an%20image" alt="" /></p>
<p>This is an image of the UAL catalog.</p>
<p><img title="UAL catalog" src="uploads/images/6_28_2012_2_08_47_PM.jpg" alt="UAL catalog" width="300" height="229" /></p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Adding%20a%20page%20break" alt="" /></p>
<p>A page break allows you to divide content into different pages which helps minimize scrolling.</p>
<p><img class="heading" src="tutorials/view_heading_image/step/" alt="" /></p>
<p>This is some more text to show what a page break does.</p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Inserting%20a%20question" alt="" /></p>
<p><img class="question" src="questions/view_image/1" alt="" /></p>
<p>&nbsp;<img class="heading" src="tutorials/view_heading_image/chapter/Inserting%20a%20definition%20box" alt="" /></p>
<p>Definition boxes are a useful way to provide additional information without taking up screen space.</p>
<p><img class="definition" src="tutorials/view_definition_image/This%20is%20what%20a%20definition%20box%20looks%20like/%3Cp%3EA%20definition%20box%20allows%20you%20to%20add%20additional%20information%20while%20minimizing%20the%20amount%20of%20room%20you%20use%20on%20the%20screen%20as%20well%20as%20the%20amount%20of%20reading%20that%20students%20have%20to%20do.%3C%5B%7C%5Bp%3E" alt="" /></p>
<p><img class="heading" src="tutorials/view_heading_image/chapter/Previewing%20your%20tutorial" alt="" /></p>
<p>Previewing allows you to see how the tutorial will look to your students and allows you to make sure your questions, definition boxes, and images are working the way that you want them to work.</p>
<p>&nbsp;<img title="Preview" src="uploads/images/6_28_2012_12_56_42_PM.jpg" alt="Preview" width="300" height="175" /></p>
<p>&nbsp;</p>
<p>&nbsp;</p>',
        'contact_name' => 'Librarian',
        'contact_email' => 'librarian@library.lib',
        'contact_phone' => '555-555-5555',
        'created' => '2012-06-29 12:56:27',
        'modified' => '2011-06-29 12:56:27',
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
          'question' => '<p>Does my dog look like he is having fun?<img style="float: right;" title="Caesar in the woods" src="uploads/images/c_dognov11_2.jpg" alt="Caesar in the woods" width="150" height="200" data-mce-src="uploads/images/c_dognov11_2.jpg" data-mce-style="float: right;"></p>',
          'correct_answer' => 0
        ),
        array(
          'id' => 2,
          'question' => '<p>You want to locate a book on gardening in Tucson; what would be the best keyword search to do for this?</p>',
          'correct_answer' => 1,
        ),
        array(
          'id' => 3,
          'question' => "<p>Use the Library Catalog to locate the book, <strong>Yard Full of Sun: The Story of a Gardener's Obsession that Got a Little out of Hand</strong> by Scott Calhoun. Where is this book located?</p>",
          'correct_answer' => 0,
        ),
      );
      $this->output('insert_data', 'sample questions');
      $Question->saveAll($questions);

      $Answer = $this->generateModel('Answer');
      $answers = array(
        array(
          'id' => 1,
          'answer' => 'Yes',
          'response' => 'Yes - he loves to run around in the woods!',
          'order' => 0,
          'question_id' => 1
        ),
        array(
          'id' => 2,
          'answer' => 'No',
          'response' => 'This is not correct, please review the image and try again.',
          'order' => 1,
          'question_id' => 1
        ),
        array(
          'id' => 3,
          'answer' => '"Tucson gardening"',
          'response' => 'This is not correct, please go back and try again.',
          'order' => 0,
          'question_id' => 2
        ),
        array(
          'id' => 4,
          'answer' => 'Gardening and Tucson',
          'response' => 'Good work - this is the correct answer',
          'order' => 1,
          'question_id' => 2
        ),
        array(
          'id' => 5,
          'answer' => 'Tucson and gardening and guide',
          'response' => 'This is not correct, please go back and try again.',
          'order' => 2,
          'question_id' => 2
        ),
        array(
          'id' => 6,
          'answer' => '"Gardening in Tucson"',
          'response' => 'This is not correct, please go back and try again.',
          'order' => 3,
          'question_id' => 2
        ),      
        array(
          'id' => 7,
          'answer' => 'Special Collections',
          'response' => '',
          'order' => 0,
          'question_id' => 3
        ),           
        array(
          'id' => 8,
          'answer' => 'Main Library',
          'response' => '',
          'order' => 1,
          'question_id' => 3
        ),         
        array(
          'id' => 9,
          'answer' => 'Science and Engineering Library',
          'response' => '',
          'order' => 2,
          'question_id' => 3
        ),         
        array(
          'id' => 10,
          'answer' => 'Ebook Format',
          'response' => '',
          'order' => 3,
          'question_id' => 3
        ),         
      );
      $this->output('insert_data', 'sample answers');
      $Answer->saveAll($answers);

      $FinalQuiz = $this->generateModel('FinalQuiz');
      $finalQuiz = array(
        'id' => 1,
        'content' => '
          <p>Welcome!</p>
          <p>Click the Right Arrow below to begin the quiz</p>
          <p><img class="heading" src="tutorials/view_heading_image/chapter/Question%201" alt="" /></p>
          <p><img class="question" src="questions/view_image/2" alt="" /></p>
          <p><img class="heading" src="tutorials/view_heading_image/chapter/Question%202" alt="" /></p>
          <p><img class="question" src="questions/view_image/3" alt="" /></p>
         ',
        'certificate' => true,
        'certificate_email_self' => true,
        'certificate_grades' => true,
        'tutorial_id' => 1,
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