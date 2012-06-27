<?php
/* Role Test cases generated on: 2010-12-15 16:12:23 : 1292455343*/
App::import('Model', 'Role');

class RoleTest extends CakeTestCase {
	var $fixtures = array('app.role', 'app.user');

	function startTest() {
		$this->Role =& ClassRegistry::init('Role');
	}

	function endTest() {
		unset($this->Role);
		ClassRegistry::flush();
	}

}
?>