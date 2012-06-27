<?php
class Revision extends AppModel {
	var $name = 'Revision';

  var $belongsTo = array('Tutorial', 'User');
}
?>