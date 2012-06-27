<?php

class GuardController extends AppController {
    var $name = "Guard";
    var $uses = array();

    public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->allow('login');
    }
    
    /**
     * login login action
     * 
     * @access public
     * @return void
     */
    function login() {
        $this->set('login_url', $this->Auth->getLoginUrl());
        $this->set('is_logged_in', $this->Auth->isLoggedIn());

        // check if the auth module needs a login form or just a button
        $this->set('auth_module_name', $this->Auth->getAuthModuleName());
        if ($this->request->is('post')) {
          if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect());
          } else {
            $this->Session->setFlash(__('Username or password is incorrect'));
          }
        }
    }

    /**
     * logout logout action
     * 
     * @access public
     * @return void
     */
    function logout() {
        $this->redirect($this->Auth->logout());
    }
}
