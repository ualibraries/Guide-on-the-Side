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
          'deleted' => 0
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

      
      if (isset($this->callback)) { // currently this just outputs a line break to the CLI
        $this->callback->afterMigration($this->callback, $direction);
      }
    }
    return true;
  }
}
?>
