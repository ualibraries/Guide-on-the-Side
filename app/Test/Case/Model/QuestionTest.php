<?php
/* Question Test cases generated on: 2010-10-08 13:10:45 : 1286568705*/
App::import('Model', 'Question');

class QuestionTest extends CakeTestCase {
	var $fixtures = array('app.question', 'app.answer');

	function startTest() {
		$this->Question =& ClassRegistry::init('Question');

//    $questions = $this->Question->find('all');
//    $this->Question->useDbConfig = 'default';
//    $this->Question->saveAll($questions);
//    $this->Question->useDbConfig = 'test';
	}

  /*** Validation tests -- is this really testing core? Maybe they're overkill. ***/
  function testEmptyQuestion() {
    $question = $this->Question->create();

    $question['Question']['question'] = '';

    $result = $this->Question->save($question);

    // The result should be empty
    $this->assertFalse($result);

    // There should be a validation error.
    $this->assertTrue(isset($this->Question->validationErrors['question']));

  }

  function testNonEmptyQuestion() {
    $question = $this->Question->create();

    $question['Question']['question'] = 'What is your name?';

    $result = $this->Question->save($question);

    $this->assertEqual($result['Question']['question'], 'What is your name?');

    // There should not be a validation error.
    $this->assertFalse(isset($this->Question->validationErrors['question']));

  }

  function testNumericCorrectAnswer() {
    // use a fixture so question is populated
    $question = $this->Question->findById(1);

    $question['Question']['correct_answer'] = 1;

    $result = $this->Question->save($question);

    $this->assertEqual($result['Question']['correct_answer'], 1);

    $this->assertFalse(isset($this->Question->validationErrors['correct_answer']));
  }

  function testNonNumericCorrectAnswer() {
    // use a fixture so question is populated
    $question = $this->Question->findById(1);

    $question['Question']['correct_answer'] = 'a';

    $result = $this->Question->save($question);

    $this->assertFalse($result);
    $this->assertTrue(isset($this->Question->validationErrors['correct_answer']));
  }

  /*** End validation test ***/

	function endTest() {
		unset($this->Question);
		ClassRegistry::flush();
	}

}
?>