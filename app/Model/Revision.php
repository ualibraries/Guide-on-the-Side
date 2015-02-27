<?php
class Revision extends AppModel {
	public $name = 'Revision';

	public $belongsTo = array('Tutorial', 'User');
	public $validate = array(
		'operation' => array(
			'rule' => 'notEmpty',
			'required' => true
		)
	);
}
?>
