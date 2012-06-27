<?php
class ResourceType extends AppModel {

  var $validate = array(
		'name' =>	'notempty',
	);

	var $hasAndBelongsToMany = array('Tutorial');

}
?>