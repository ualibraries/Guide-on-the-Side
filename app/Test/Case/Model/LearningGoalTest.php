<?php
/* LearningGoal Test cases generated on: 2011-04-28 16:47:51 : 1304034471*/
App::import('Model', 'LearningGoal');

class LearningGoalTest extends CakeTestCase {
	var $fixtures = array('app.learning_goal', 'app.tutorial', 'app.final_quiz', 'app.revision', 'app.user', 'app.role', 'app.learning_goals_tutorial');

	function startTest() {
		$this->LearningGoal =& ClassRegistry::init('LearningGoal');
	}

	function endTest() {
		unset($this->LearningGoal);
		ClassRegistry::flush();
	}

}
?>