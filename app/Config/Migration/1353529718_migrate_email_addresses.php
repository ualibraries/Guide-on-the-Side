<?php
class MigrateEmailAddresses extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(),
		'down' => array(),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
        if ($direction === 'up') {
          // copy the quiz email address to the tutorial
          $FinalQuiz = $this->generateModel('FinalQuiz');
          $Tutorial = $this->generateModel('Tutorial');
          $allQuizzes = $FinalQuiz->find('all');
          foreach ($allQuizzes as $quiz) {
              if (!empty($quiz['FinalQuiz']['certificate_email'])) {
                  // Can't get Containable to work, so let's grab each one individually. 
                  //   Terrible for performance, but my excuse is that this is a migration.
                  $tutorial = $Tutorial->find('first', array(
                      'conditions' => array('id' => $quiz['FinalQuiz']['tutorial_id'])
                  ));
                  $tutorial['Tutorial']['certificate'] = $quiz['FinalQuiz']['certificate'];
                  $tutorial['Tutorial']['certificate_email'] = $quiz['FinalQuiz']['certificate_email'];
                  $tutorial['Tutorial']['certificate_email_self'] = $quiz['FinalQuiz']['certificate_email_self'];
                  $Tutorial->save($tutorial);
              }
          }
        } else {
          // if we're running the migration down, copy the email address back to the quiz. Yes, this
          //   leaves an artifact (doesn't remove Tutorial['certificate_email']). I'm ok with that.
          $FinalQuiz = $this->generateModel('FinalQuiz');
          $Tutorial = $this->generateModel('Tutorial');
          $allQuizzes = $FinalQuiz->find('all');
          foreach ($allQuizzes as $quiz) {
              // Can't get Containable to work, so let's grab each one individually. 
              //   Terrible for performance, but my excuse is that this is a migration.
              $tutorial = $Tutorial->find('first', array(
                  'conditions' => array('id' => $quiz['FinalQuiz']['tutorial_id'])
              ));

              if (!empty($tutorial['Tutorial']['certificate_email'])) {
                  $quiz['FinalQuiz']['certificate'] = $tutorial['Tutorial']['certificate'];
                  $quiz['FinalQuiz']['certificate_email'] = $tutorial['Tutorial']['certificate_email'];
                  $quiz['FinalQuiz']['certificate_email_self'] = $tutorial['Tutorial']['certificate_email_self'];
                  $FinalQuiz->save($quiz);
              }
          }
          $FinalQuiz->save($allQuizzes);  
        }
        
		return true;
	}
}
