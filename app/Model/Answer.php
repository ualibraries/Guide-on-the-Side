<?php
class Answer extends AppModel {

	var $validate = array(
		'question_id' => 'numeric',
    'answer' => array(
      'rule' => 'notempty',
      'message' => 'This field cannot be left blank.'
    ),
	);
	
	var $belongsTo = array('Question');

  function beforeSave() {
    $this->data['Answer']['answer'] =
      strip_tags($this->data['Answer']['answer'], allowed_tags('strip_tags'));
    $this->data['Answer']['response'] =
      strip_tags($this->data['Answer']['response'], allowed_tags('strip_tags'));
    return true;
  }
}
?>