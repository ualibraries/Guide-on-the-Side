<?php

App::import('Vendor', 'cas', array('file' => 'CAS-1.3.3'.DS.'CAS.php'));
App::uses('BaseAuthenticate', 'Controller/Component/Auth');

class CasAuthenticate extends BaseAuthenticate {

    public function authenticate(CakeRequest $request, CakeResponse $response) {
        $user = $this->getUser();
        // CAS authentication required if user is not logged in
        if (!$user) {
            $this->initializeCASClient();
            // Force CAS authentication if required
            phpCAS::forceAuthentication();
            $user = $this->getUser();
        }
        return $user;
    }

    // Determine how this Authenticate object knows if it should try to log in.
    public function isLoginDataAvailable(CakeRequest $request) {
        return true;
    }

    protected function _findUser($username) {
        $result = ClassRegistry::init('User')->find('first', array(
            'conditions' => array('username' => $username),
            'recursive' => (int)$this->settings['recursive'],
            'contain' => $this->settings['contain'],
        ));
        if (empty($result) || empty($result['User'])) {
            return false;
        }
        $user = $result['User'];
        unset($user['password']);
        unset($result['User']);
        $merged = array_merge($user, $result);
        $merged['noLoginForm'] = true;
        // debug($merged);
        return $merged;
    }

    protected function isAuthenticated() {
        $this->initializeCASClient();
        return phpCAS::isAuthenticated();
    }

    protected function determineUsername() {
        $this->initializeCASClient();
        if ($this->isAuthenticated()) {
            return phpCAS::getUser();
        } else {
            return false;
        }
    }

    public function getUser($request = null) {
        $username = $this->determineUsername();
        if (username) {
            return $this->_findUser($username);
        } else {
            return false;
        }
    }

    protected function initializeCASClient() {
        if (!phpCAS::isInitialized()) {
            // Set debug mode
            phpCAS::setDebug(false);
            //Initialize phpCAS
            phpCAS::client(CAS_VERSION_2_0, Configure::read('user_config.cas.hostname'), Configure::read('user_config.cas.port'), Configure::read('user_config.cas.uri'), true);
            phpCAS::setFixedServiceURL($this->loginRedirectURL());
            // No SSL validation for the CAS server
            phpCAS::setNoCasServerValidation();
        }
        return true;
    }

    private function loginRedirectURL() {
        $redirectURL = Router::url(null, true);
        if (Configure::read('user_config.cas.force_ssl_redirect')) {
            $redirectURL = preg_replace('/^http:/', 'https:', $redirectURL);
        }
        return $redirectURL;
    }

    function logout($user) {
        $this->initializeCASClient();
        // Force CAS logout if required
        if (phpCAS::isAuthenticated()) {
            phpCAS::logout();
        }
        return parent::logout();
    }

}

?>
