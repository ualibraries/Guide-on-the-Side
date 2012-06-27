<?php
/* Subject Test cases generated on: 2011-04-28 16:48:01 : 1304034481*/
App::import('Model', 'Subject');

class SubjectTest extends CakeTestCase {
	var $fixtures = array('app.subject', 'app.tutorial', 'app.final_quiz', 'app.revision', 'app.user', 'app.role', 'app.subjects_tutorial');

	function startTest() {
		$this->Subject =& ClassRegistry::init('Subject');
	}

	function endTest() {
		unset($this->Subject);
		ClassRegistry::flush();
	}

}
?>