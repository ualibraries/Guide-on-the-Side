<?php

App::uses('AuthModule', 'Guard.Controller/Component');

/**
 * ShibbolethModule The Shibboleth authentication module. It requires external 
 * SP to be set up with IdP and checks the attributes SP send to the application 
 * to do the authentication.
 * 
 * @uses AuthModule
 * @package Plugins.Guard
 * @version $id$
 * @copyright Copyright (C) 2010 CTLT
 * @author Compass
 * @license PHP Version 3.0 {@link http://www.php.net/license/3_0.txt}
 */
class ShibbolethModule extends AuthModule {

    /**
     * name the name of the authentication module
     * 
     * @var string
     * @access public
     */
    var $name = 'Shibboleth';

    /**
     * hasLoginForm this module uses external login page
     * 
     * @var mixed
     * @access public
     */
    var $hasLoginForm = false;

    /**
     * sessionHeaders the headers to check against to see if there is an active 
     * shibboleth session
     * 
     * @var string
     * @access public
     */
    var $sessionHeaders = array('Shib-Session-ID', 'HTTP_SHIB_IDENTITY_PROVIDER');

    /**
     * hasLoginData test if it got login data from SP (if there is a active 
     * session)
     * 
     * @access public
     * @return boolean true, if it got login data. false, if not
     */
    function hasLoginData() {
        return $this->isSessionActive();
    }

    /**
     * Check if a Shibboleth session is active.
     *
     * @access public
     * @return boolean if session is active
     */
    function isSessionActive() { 
        $active = false;

        foreach ($this->sessionHeaders as $header) {
            if ( array_key_exists($header, $_SERVER) && !empty($_SERVER[$header]) ) {
                $active = true;
                break;
            }
        }
        return $active;
    }

    /**
     * Generate the URL to initiate Shibboleth login.
     *
     * @param string $redirect the final URL to redirect the user to after all login is complete
     * @return the URL to direct the user to in order to initiate Shibboleth login
     */
    function sessionInitiatorUrl($redirect = null) {
        $initiator_url = self::urlNormalize($this->sessionInitiatorURL) . 
            '?target=' . Router::url(array('plugin' => 'guard', 'controller' => 'guard', 'action' => 'login'), true);
        return $initiator_url;
    }

    /**
     * authenticate authenticate the user and generate the user session
     * 
     * @param mixed $username 
     * @access public
     * @return void
     */
    function authenticate($username = null) {
        $loggedIn = false;

        $this->_mapFields();

        if ($user = $this->identify($this->data[$this->guard->fields['username']])) {
            $this->Session->write($this->guard->sessionKey, $user);
            $loggedIn = true;
        }
        return $loggedIn;
    }

    function identify($username = null, $conditions = null) {
        // get the model AuthComponent is configured to use
        $model =& $this->guard->getModel(); // default is User
        // do a query that will find a User record when given successful login data
        $user = $model->find('first', array('conditions' => array(
            $model->escapeField($this->guard->fields['username']) => $username)
        ));

        // return null if user invalid
        if (!$user) {
            return null; // this is what AuthComponent::identify would return on failure
        }

        // call original AuthComponent::identify with string for $user and false for $conditions
        return $this->guard->identify($user[$this->guard->userModel][$model->primaryKey], null);
    }

    /**
     * getLoginUrl return the shibboleth login URL
     * 
     * @access public
     * @return string the shibboleth login URL
     */
    function getLoginUrl() {
        return $this->sessionInitiatorUrl();
    }

    /**
     * logout logout shibboleth session. User will be redirected to shibboleth 
     * logout URL after the internal logout. Then redirected to the final logout 
     * page.
     * 
     * @access public
     * @return void
     */
    function logout() {
        if ( $this->isSessionActive() ) {
            $this->guard->logoutRedirect = self::urlNormalize($this->logoutURL) . 
                '?return=' . Router::url($this->guard->logoutRedirect, true);
        }
    }
}
