<?php

class Role extends AppModel {

	public $hasMany = array('User');
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'required' => true
		)
	);

}
?>
