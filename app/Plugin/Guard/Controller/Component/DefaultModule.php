<?php

App::uses('AuthModule', 'Guard.Controller/Component');

/**
 * DefaultModule the default authentication module, using AuthComponent
 * 
 * @uses AuthModule
 * @package Plugins.Guard
 * @version //autogen//
 * @copyright Copyright (C) 2010 CTLT
 * @author Compass
 * @license LGPL {@link http://www.gnu.org/copyleft/lesser.html}
 */
class DefaultModule extends AuthModule {
    /**
     * name the name of the module
     * 
     * @var string
     * @access protected
     */
    var $name         = 'Default';

    /**
     * hasLoginForm this module has login form
     * 
     * @var boolean true
     * @access protected
     */
    var $hasLoginForm = true;

    /**
     * authenticate provide the authenticate method. Checking against the 
     * internal user table in the database. The user table can be defined by 
     * UserModel variable. The method also creates the user session by useing 
     * AuthComponent::login().
     * 
     * @param string $username not used
     * @access public
     * @return boolean true, if the user is successfully authenticated. false, 
     * if not
     */
    function authenticate($username = null) {
        $loggedIn = false;
        $model =& $this->guard->getModel();

        $username = $this->data[$this->fields['username']];
        $password = $this->data[$this->fields['password']];
        if(empty($username) || empty($password)) {
            return false;
        }

        $data = $this->guard->hashPasswords(array($model->alias => $this->data));

        $data = array(
            $model->alias . '.' . $this->fields['username'] => $data[$model->alias][$this->fields['username']],
            $model->alias . '.' . $this->fields['password'] => $data[$model->alias][$this->fields['password']] 
        );

        $loggedIn = $this->guard->login($data);

        return $loggedIn;
    }
}

