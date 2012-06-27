<?php
// This is a Guard plugin authentication module. It expects to see modules in /Lib.

App::uses('ShibbolethModule', 'Guard.Controller/Component');

class QuickhelpShibbolethModule extends ShibbolethModule {

  var $name = 'QuickhelpShibboleth';
  var $hasLoginForm = false;

  // http://stackoverflow.com/questions/3050444/what-causes-apache-environment-variable-set-using-mod-rewrite-to-have-redirect
  function __construct($guard, $name = null) {
    foreach (array_keys($_SERVER) as $key) {
      if (substr($key, 0, 9) == 'REDIRECT_') {
        $new_key = str_replace('REDIRECT_', '', $key);
        $_SERVER[$new_key] = $_SERVER[$key];
      }
    }
    $this->loginRedirect = '/tutorials';
    parent::__construct($guard, $name = null);
  }

  function logout() {
    parent::logout();
    $logout_url = Configure::read('user_config.shibboleth.logout_url');
    $this->Session->setFlash('You have signed out of QuickHelp. You may want to ' .
      '<a href="' . $logout_url . '">' .
      'sign out of WebAuth</a> as well.');
  }

}