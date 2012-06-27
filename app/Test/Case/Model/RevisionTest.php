<?php
/* Revision Test cases generated on: 2010-10-11 10:10:50 : 1286819930*/
App::import('Model', 'Revision');

class RevisionTest extends CakeTestCase {
	var $fixtures = array('app.revision', 'app.tutorial');

	function startTest() {
		$this->Revision =& ClassRegistry::init('Revision');
	}

	function endTest() {
		unset($this->Revision);
		ClassRegistry::flush();
	}

}
?>