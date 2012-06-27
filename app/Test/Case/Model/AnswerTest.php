<?php
/* Answer Test cases generated on: 2010-10-08 14:10:59 : 1286572019*/
App::import('Model', 'Answer');

class AnswerTest extends CakeTestCase {
	var $fixtures = array('app.answer', 'app.question');

	function startTest() {
		$this->Answer =& ClassRegistry::init('Answer');

//    $answers = $this->Answer->find('all');
//    $this->Answer->useDbConfig = 'default';
//    $this->Answer->saveAll($answers);
//    $this->Answer->useDbConfig = 'test';
	}

  function testStuff() {
    // This is fake. It forces the population of the default database through startTest().
  }

	function endTest() {
		unset($this->Answer);
		ClassRegistry::flush();
	}

}
?>