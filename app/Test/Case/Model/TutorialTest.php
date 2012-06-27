<?php
/* Tutorial Test cases generated on: 2010-10-06 14:10:30 : 1286399790*/
App::import('Model', 'Tutorial');
App::import('Model', 'Revision');
App::import('Model', 'Question');
App::import('Model', 'FinalQuiz');

class TutorialTest extends CakeTestCase {
	var $fixtures = array('app.tutorial', 'app.revision', 'app.question', 'app.answer', 'app.final_quiz',
    'app.user', 'app.role', 'app.tutorial_type', 'app.audience', 'app.audiences_tutorial', 'app.learning_goal',
    'app.learning_goals_tutorial', 'app.resource_type', 'app.resource_types_tutorial', 'app.subject',
    'app.subjects_tutorial', 'plugin.tags.tag', 'plugin.tags.tagged', 'app.search_indices');

	function startTest() {
		$this->Tutorial =& ClassRegistry::init('Tutorial');
 		$this->Revision =& ClassRegistry::init('Revision');
 		$this->Question =& ClassRegistry::init('Question');
    $this->Tutorial->Behaviors->detach('Taggable');
    
    // the following is for selenium tests. Fixtures on the cheap.
    //   Be careful! Don't turn this on.
    //   It will insert the test data into the production (default) database.
//    $tutorials = $this->Tutorial->find('all');
//    $this->Tutorial->useDbConfig = 'default';
//    $this->Tutorial->saveAll($tutorials);
//    $this->Tutorial->useDbConfig = 'test';
	}

  function testSoftDelete() {
    $this->Tutorial->delete(1);

    $params = array(
      'conditions' => array(
        'id' => 1
      ),
      'fields' => array('id', 'deleted'),
      'recursive' => -1
    );

    // see if the tutorial is still there, but flagged deleted 
    $result = $this->Tutorial->find('all', $params);
    unset($result[0]['Tutorial']['tags']);
    $expected = array(0 => array('Tutorial' => array('id' => 1, 'deleted' => true)));
    $this->assertEquals($result, $expected);

    // tutorial 1 should not be returned, because published filters out deleted things
    $active_result = $this->Tutorial->find('published', $params);
    $expected = array();

    $this->assertEquals($active_result, $expected);
  }

  function testUndelete() {
    $this->Tutorial->undelete(2);

    $params = array(
      'conditions' => array(
        'id' => 2
      ),
      'fields' => array('id'),
      'recursive' => -1
    );

    // tutorial 2 should be returned
    $result = $this->Tutorial->find('published', $params);
    unset($result[0]['Tutorial']['tags']);
    $expected = array(0 => array('Tutorial' => array('id' => 2)));
    $this->assertEqual($result, $expected);
  }

  function testPublish() {
    $this->Tutorial->publish(4);

    $params = array(
      'conditions' => array(
        'id' => 4
      ),
      'fields' => array('id'),
      'recursive' => -1
    );

    $result = $this->Tutorial->find('published', $params);
    $expected = array(0 => array('Tutorial' => array('id' => 4)));
    $this->assertEqual($result, $expected);
  }

  function testUnpublish() {
    $this->Tutorial->unpublish(3);

    $params = array(
      'conditions' => array(
        'id' => 3
      ),
      'fields' => array('id')
    );

    $result = $this->Tutorial->find('published', $params);
    $expected = array();
    $this->assertEqual($result, $expected);
  }

  function testListDeleted() {
    $params = array(
      'fields' => array('id'),
      'recursive' => -1
    );

    $result = $this->Tutorial->find('deleted', $params);
    $expected = array(0 => array('Tutorial' => array('id' => 2)));
    $this->assertEqual($result, $expected);
  }

  function testListUnpublished() {
    $params = array(
      'fields' => array('id'),
      'recursive' => -1
    );

    $result = $this->Tutorial->find('unpublished', $params);
    $expected = array(0 => array('Tutorial' => array('id' => 4)));
    $this->assertEqual($result, $expected);
  }

  function testListUndeleted() {
    $params = array(
      'fields' => array('id'),
      'order' => 'id ASC',
      'recursive' => -1
    );

    $result = $this->Tutorial->find('undeleted', $params);
    $expected = array(
      0 => array('Tutorial' => array('id' => 1)),
      1 => array('Tutorial' => array('id' => 3)),
      2 => array('Tutorial' => array('id' => 4)),
      3 => array('Tutorial' => array('id' => 5)),
      4 => array('Tutorial' => array('id' => 6)),
      5 => array('Tutorial' => array('id' => 7)),
      6 => array('Tutorial' => array('id' => 8)),
      7 => array('Tutorial' => array('id' => 9)),
      8 => array('Tutorial' => array('id' => 10))
    );
    $this->assertEqual($result, $expected);
  }

  // Maybe this isn't a good "unit" test, but I'm too lazy to look up how to do Mock Objects.
  function testAfterSaveRevision() {
//    $this->Tutorial->bindModel(array('hasMany' => array('Revision')), false);
    
    $params = array(
      'conditions' => array(
        'id' => 3
      ),
      'fields' => array('id')
    );
    
    $tutorial = $this->Tutorial->find('first', $params);
    $tutorial['Tutorial']['title'] = 'A new title';
    $this->Tutorial->save($tutorial);
    $tutorial['Tutorial']['title'] = 'A newer title';
    $this->Tutorial->save($tutorial);

    $revision_params = array(
      'conditions' => array(
        'tutorial_id' => 3
      ),
      'order' => 'timestamp DESC, id DESC',
      'recursive' => -1
    );


    $revisions = $this->Revision->find('all');

    debug($revisions);
    
    $old_revision = array_shift($revisions);
    $old_tutorial = unserialize($old_revision['Revision']['content']);
    debug($old_tutorial);
    $this->assertEqual($old_tutorial['Tutorial']['title'], 'A newer title');
    $this->assertEqual($old_revision['Revision']['operation'], 'modified');

    $older_revision = array_shift($revisions);
    $older_tutorial = unserialize($older_revision['Revision']['content']);
    $this->assertEqual($older_tutorial['Tutorial']['title'], 'A new title');

    // create a tutorial to test 'created'
    $new_tutorial = $this->Tutorial->create();
    $new_tutorial['Tutorial']['title'] = 'A new tutorial';
    $new_tutorial['Tutorial']['url'] = 'http://www.google.com';
    $new_tutorial['Tutorial']['content'] = '<br />';
    $new_tutorial['Tutorial']['published'] = false;
    $new_tutorial['Tutorial']['deleted'] = false;
    $this->Tutorial->save($new_tutorial);
    
    $new_revision_params = array(
      'conditions' => array(
        'tutorial_id' => $this->Tutorial->id
      ),
      'order' => 'timestamp DESC',
      'recursive' => -1
    );

    $new_revision = $this->Revision->find('first', $new_revision_params);

    $this->assertEqual($new_revision['Revision']['operation'], 'created');
  }

  function testTableOfContents() {
    App::uses('Router', 'Lib');
    $toc = $this->Tutorial->getChapters(6);

    $expected = array(0 => 'Search the database', 2 => 'Evaluate the result');

    $this->assertEqual($toc, $expected);
  }

  function testStepsWithChapters() {
    $steps = $this->Tutorial->getStepsWithContent(6);

    $expected = 4;
    
    $this->assertEqual(count($steps), 4);
  }

  function testContentParsing() {
    $steps = $this->Tutorial->getStepsWithContent(6);

    foreach ($steps as &$step) {
      if (array_key_exists('content', $step)) {
        unset($step['content']);  
      }
    }

    $expected = 
      array(
        0 => array(
          'chapter' => 'Search the database',
          'step'    => 'Do stuff'
        ),
        1 => array(
          'chapter' => 'Search the database',
          'step'    => 'Find your result'
        ),
        2 => array(
          'chapter' => 'Evaluate the result',
          'step'    => 'Do stuff'
        ),
        3 => array(
          'chapter' => 'Evaluate the result',
          'step'    => 'Read it'
        ),
      );

    $this->assertEqual($steps, $expected);
  }

  function testStepsWithNoChapters() {
    $steps = $this->Tutorial->getStepsWithContent(7);

    foreach ($steps as &$step) {
      if (array_key_exists('content', $step)) {
        unset($step['content']);
      }
    }

    $expected =
      array(
        0 => array(
          'chapter' => '',
          'step'    => 'Do stuff'
        ),
        1 => array(
          'chapter' => '',
          'step'    => 'Find your result'
        ),
        2 => array(
          'chapter' => '',
          'step'    => 'Do stuff'
        ),
        3 => array(
          'chapter' => '',
          'step'    => 'Read it'
        ),
      );

    $this->assertEqual($steps, $expected);
  }

  function testChaptersWithNoSteps() {
    $steps = $this->Tutorial->getStepsWithContent(8);

    foreach ($steps as &$step) {
      if (array_key_exists('content', $step)) {
        unset($step['content']);
      }
    }

    $expected =
      array(
        0 => array(
          'chapter' => 'Do stuff',
          'step'    => ''
        ),
        1 => array(
          'chapter' => 'Find your result',
          'step'    => ''
        ),
        2 => array(
          'chapter' => 'Do stuff',
          'step'    => ''
        ),
        3 => array(
          'chapter' => 'Read it',
          'step'    => ''
        ),
      );

    $this->assertEqual($steps, $expected);
  }

  function testContentWithNoChaptersOrSteps() {
    $steps = $this->Tutorial->getStepsWithContent(9);

    foreach ($steps as &$step) {
      if (array_key_exists('content', $step)) {
        unset($step['content']);
      }
    }

    $expected =
      array(
        0 => array(
          'chapter' => '',
          'step'    => ''
        ),
      );

    $this->assertEqual($steps, $expected);
  }

  /*** Validation tests -- is this really testing core? Maybe they're overkill. ***/
  function testLongTitle() {
    $tutorial = $this->Tutorial->findById(1);

    $tutorial['Tutorial']['title'] = "A really long title that's longer than 25 characters.";

    $result = $this->Tutorial->save($tutorial);

    // The result should be empty
    $this->assertFalse($result);

    // There should be a validation error.
    $this->assertTrue(isset($this->Tutorial->validationErrors['title']));

  }

  function testPublicDisplayOfQuestions() {
    $content = $this->Tutorial->getStepsWithContent(5);
    $this->assertPattern('/.*What is your name.*/i', $content[0]['content']);
    $this->assertPattern('/.*<input[^<>]class=\'answer-radio\'[^<>]type=\'radio\'[^<>]*>.*Dorothy Sayers.*/i', $content[0]['content']);
  }

  function testDefinitionBoxes() {
    $content = $this->Tutorial->getStepsWithContent(10);
    $this->assertPattern('/<a[^<>]*' . QH_urlencode('shows how each term was translated.&ndash;') . '[^<>]*class=\'definition-link\'[^<>]*>Search details<\/a>/', $content[0]['content']);
  }

  function testPublishedStatusOfNewExternalTutorials() {
    $external_tutorial = $this->Tutorial->create();
    $external_tutorial['Tutorial']['title'] = 'A new external tutorial';
    $external_tutorial['Tutorial']['url'] = 'http://www.google.com';
    $external_tutorial['Tutorial']['content'] = '<br />';
    $external_tutorial['Tutorial']['deleted'] = false;
    $this->Tutorial->save($external_tutorial);
    
    $stored_tutorial = $this->Tutorial->findById($this->Tutorial->id);
    $this->assertTrue($stored_tutorial['Tutorial']['published']);
  }

	function endTest() {
		unset($this->Tutorial);
		ClassRegistry::flush();
	}

}
?>