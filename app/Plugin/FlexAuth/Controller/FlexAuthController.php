<?php

class FlexAuthController extends FlexAuthAppController{
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function login() {
        $authMethod = Configure::read('user_config.authentication.method');
        
        if (!empty($authMethod)) {
            $url = str_replace(array('%HOST%'), array($_SERVER['SERVER_NAME']), 
                Configure::read("user_config.$authMethod.login_url")) . 
                '?target=' . Router::url('/admin', true);
            $this->set('login_url', $url);
            $loginLinkText = Configure::read("user_config.$authMethod.login_link_text");
            if (!empty($loginLinkText)) {
                $this->set(compact('loginLinkText'));
            } else {
                $this->set('loginLinkText', 'Log in');
            }
        }
            
        $this->set('is_logged_in', $this->Auth->loggedIn());
        
        $this->render("login_$authMethod");
        
        $this->Auth->isLoginDataAvailable();
        
        if ($this->Auth->isLoginDataAvailable()) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Login failed! Please try again.'));
            }
        }
    }
    
    public function logout() {
        $this->Session->setFlash("You have signed out.");
        $this->redirect($this->Auth->logout());
    }
    
}

