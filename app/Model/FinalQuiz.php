<?php
class FinalQuiz extends AppModel {

  var $validate = array(
		'tutorial_id' => 'numeric',
	);

  var $actsAs = array('Steppable', 'Containable');

	var $belongsTo = array('Tutorial');

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