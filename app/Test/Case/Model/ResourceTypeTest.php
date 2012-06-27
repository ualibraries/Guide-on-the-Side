<?php
/* ResourceType Test cases generated on: 2011-04-28 16:47:57 : 1304034477*/
App::import('Model', 'ResourceType');

class ResourceTypeTest extends CakeTestCase {
	var $fixtures = array('app.resource_type', 'app.tutorial', 'app.final_quiz', 'app.revision', 'app.user', 'app.role', 'app.resource_types_tutorial');

	function startTest() {
		$this->ResourceType =& ClassRegistry::init('ResourceType');
	}

	function endTest() {
		unset($this->ResourceType);
		ClassRegistry::flush();
	}

}
?>