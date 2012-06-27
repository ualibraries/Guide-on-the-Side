<?php
class Question extends AppModel {

  var $validate = array(
		'question' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You must supply a question.',
			),
		),
		'correct_answer' => 'numeric',
	);

	var $hasMany = array('Answer' => array('order' => 'order ASC'));

  protected function _parseQuestions($id = null) {
    if (is_numeric($id)) {
      $tutorial = $this->findById($id);
      return $tutorial;
    }
  }

  function beforeSave() {
    $this->data['Question']['question'] =
      strip_tags($this->data['Question']['question'], allowed_tags('strip_tags'));
    return true;
  }

}
?>