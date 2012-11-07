<?php

App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class ShibbolethAuthenticate extends BaseAuthenticate {
    
    public function authenticate(CakeRequest $request, CakeResponse $response) {     
        $username = $this->determineUsername();
        
        $user = $this->_findUser($username, $password = '');
        // This is a bit of a hack to circumvent the fact that Cake won't let me get to the 
        //   authentication objects from a controller. But it is best to have this set in this class.   
        if ($user) {
            $user['noLoginForm'] = true;
        }
        return $user;
    }
    
    protected function _findUser($username, $password) {
		$result = ClassRegistry::init('User')->find('first', array(
			'conditions' => array('username' => $username),
			'recursive' => (int)$this->settings['recursive'],
			'contain' => $this->settings['contain'],
		));
		if (empty($result) || empty($result['User'])) {
			return false;
		}
        debug($result);
		$user = $result['User'];
        debug($user);
		unset($user['password']);
		unset($result['User']);
		return array_merge($user, $result);
    }
    
    protected function determineUsername() {
        $this->normalizeShibbolethVariables();
        
        $usernameField = Configure::read('user_config.shibboleth.username_field');
        
        // If the Shibboleth SP is configured to transmit data via HTTP headers
        $usernameFieldInHTTPHeader = strtoupper('HTTP_' . str_replace('-', '_', $usernameField));
        
        $username = null;
        if (isset($_SERVER[$usernameField])) {
            $username = $_SERVER[$usernameField];
        } elseif (isset($_SERVER[$usernameFieldInHTTPHeader])) {
            $username = $_SERVER[$usernameFieldInHTTPHeader];
        }
        
        return $username;
    }
    
    protected function normalizeShibbolethVariables() {
        // Normalize Shibboleth variables
        // http://stackoverflow.com/questions/3050444/what-causes-apache-environment-variable-set-using-mod-rewrite-to-have-redirect
        foreach (array_keys($_SERVER) as $key) {
            if (substr($key, 0, 9) == 'REDIRECT_') {
                $new_key = str_replace('REDIRECT_', '', $key);
                $_SERVER[$new_key] = $_SERVER[$key];
            }
        }
    }
    
    // Determine how this Authenticate object knows if it should try to log in.
    public function isLoginDataAvailable(CakeRequest $request) {
        return $this->determineUsername();
    }
    
}

