<?php
class Revision extends AppModel {
	var $name = 'Revision';

  var $belongsTo = array('Tutorial', 'User');
	public $validate = array(
		'operation' => array(
			'rule' => 'notEmpty',
			'required' => true
		)
	);
}
?>
