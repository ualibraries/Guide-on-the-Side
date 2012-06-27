<?php

require_once 'PHPUnit/Extensions/SeleniumTestCase.php'; 

class TutorialsView extends PHPUnit_Extensions_SeleniumTestCase {
  
  protected $base_url;

  public static $browsers = array(
    array(
      'name' => 'Firefox 3.6 Linux',
      //'browser' => '*custom /usr/bin/firefox -P Selenium',
      'browser' => '*firefox',
      'host' => 'localhost',
      //'browserUrl' => 'http://www.google.com/',
      'port' => 4444,
      'timeout' => 6000,
    ),
    /*array(
      'name' => 'Google Chrome Linux',
      'browser' => '*googlechrome',
      'host' => 'localhost',
      //'browserUrl' => 'http://www.google.com/',
      'port' => 4444,
      'timeout' => 6000,
    ),*/
  );

  function setUp() {
    // get the base url from Hudson
    global $argv, $argc;
//    $this->assertGreaterThan(3, $argc, 'No environment name passed');
    $this->base_url = array_pop($argv);
    if (substr($this->base_url, -1) != '/') {
      $this->base_url .= '/';
    }
    echo "Base URL: " . $this->base_url;
    echo "\n";
    $this->setBrowserUrl($this->base_url);
  }

//  function testPrevNextButtons() {
//    $this->open("tutorials/view_tutorial_only/5");
//    $this->click("link=Next");
//    $this->assertTrue($this->isTextPresent("For our first question"));
//    $this->click("link=Prev");
//    $this->assertTrue($this->isTextPresent("Search the database"));
//    $this->click("link=Next");
//    $this->click("link=Next");
//    $this->click("link=Next");
//    $this->assertTrue($this->isTextPresent("tell me your thoughts"));
//    $this->click("link=Next");
//    $this->assertTrue($this->isTextPresent("Thanks for using UAL QuickHelp"));
//    $this->click("link=Next");
//    $this->assertTrue($this->isTextPresent("Thanks for using UAL QuickHelp"));
//  }
}
