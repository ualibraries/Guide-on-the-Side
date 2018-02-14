<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

  public $theme = 'GuideOnTheSide';
  public $paginate = array();

  // GD settings
  var $padding = 10; // not the CSS padding, but the padding inside the image
  var $character_width = 8;
  var $font_size = 11;
  var $number_of_characters = 36;

  public function __construct($request = null, $response = null) {
    parent::__construct($request, $response);
    $this->character_height = $this->font_size;
    $this->line_height = $this->character_height + 8;
  }

  var $components = array(
    'FlexAuth.FlexAuth',
    'Session',
    'RequestHandler',
//    'Search.Prg',
  );

  function beforeFilter() {
    $this->helpers[] = 'Js';

    // provide the role to all actions
    $is_logged_in = $this->Auth->user();
    if ($is_logged_in) {
        $role_id = $this->Auth->user('role_id');
        $this->loadModel('Role');
        $this->Role->recursive = 0;
        $role = $this->Role->findById($role_id);
        $this->Session->write('Role', $role['Role']);
    }

    $this->set('is_admin', $this->Session->read('Role.name') == 'admin');
    $this->set('show_password_link', !$this->Auth->user('noLoginForm'));

    if ($theme = Configure::read('user_config.theme')) {
      $this->theme = $theme;
    }
  }
}
