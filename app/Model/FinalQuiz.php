<?php
class FinalQuiz extends AppModel {

  var $validate = array(
		'tutorial_id' => 'numeric',
	);

  var $actsAs = array('Steppable');

	var $belongsTo = array('Tutorial');

  public function grade($id = null, $answers = array()) {
    $grades = array();
    if ($id && is_numeric($id)) {
      $this->Question = ClassRegistry::init('Question');
      $all_questions = $this->getQuestionIds($id);
      $grades['total'] = count($all_questions);
      $grades['score'] = 0;
      // this assumes that the index of $question['Answer'] matches the answer order. Should be valid based on the
      //   hasMany between Question and Answer
      foreach($all_questions as $order => $question_id) {
        $question = $this->Question->read(null, $question_id);
        $grades[$order]['question'] = $question['Question']['question'];
        $grades[$order]['correct_answer'] = $question['Answer'][$question['Question']['correct_answer']]['answer'];
        if (array_key_exists($question_id, $answers)) {
          $grades[$order]['user_answer'] = $question['Answer'][$answers[$question_id]]['answer'];
          $grades[$order]['response'] = $question['Answer'][$answers[$question_id]]['response'];
          $grades[$order]['user_correct'] = ($answers[$question_id] === $question['Question']['correct_answer']);
        } else {
          $grades[$order]['user_answer'] = "no answer given";
          $grades[$order]['response'] = "";
          $grades[$order]['user_correct'] = false;
        }
        
        if ($grades[$order]['user_correct']) {
          $grades['score']++;
        }
      }
      unset($this->Question);
    } else {
      $grades = array();
    }

    return $grades;
  }

  public function afterSave($created) {
    if (!isset($this->data['FinalQuiz']['no_revision']) || !$this->data['FinalQuiz']['no_revision']) { // force tutorial save to trigger revisioning
      $options = array(
        'conditions' => array(
          'id' => $this->data['FinalQuiz']['tutorial_id']
        )
      );
      $tutorial = $this->Tutorial->find('undeleted', $options);
      if ($tutorial) {
        $this->Tutorial->save($tutorial['0']);
      }
    }
  }

//  public function afterSave($created) {
//    $revision = $this->Revision->create();
//    $revision['Revision']['tutorial_id'] = $this->id;
//
//    // get the whole record for versioning.
//    $options = array(
//      'recursive' => 0,
//      'contains' => array('FinalQuiz'),
//      'conditions' => array('Tutorial.id' => $this->id),
//    );
//    $tutorial = $this->find('first', $options);
//    $revision['Revision']['content'] = serialize($tutorial);
//    $revision['Revision']['user_id'] = 0; // TODO: when the user system is developed, fix this
//    $revision['Revision']['operation'] = (($created) ? 'created' : 'modified');
//    $revision['Revision']['timestamp'] = date('Y-m-d H:i:s'); // TODO: this does not guarantee uniqueness, clearly.
//    if (!empty($this->data['Revision']['message'])) {
//      $revision['Revision']['log_message'] = $this->data['Revision']['message'];
//    }
//    if (!$this->Revision->save($revision)) {
//      debug('Error saving revision');
//    }
//  }
}
?>