<?php

class Role extends AppModel {

    var $hasMany = array('User');
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'required' => true
		)
	);

}
?>
