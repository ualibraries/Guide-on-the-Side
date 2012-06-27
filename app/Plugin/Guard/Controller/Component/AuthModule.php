<?php
/**
 * AuthModule define the base class of the authentication module. All authentication 
 * modules should extend this class.
 * 
 * @uses Object
 * @package Plugins.Guard
 * @version //autogen//
 * @copyright Copyright (C) 2010 CTLT
 * @author Compass
 * @license LGPL {@link http://www.gnu.org/copyleft/lesser.html}
 */
class AuthModule extends Object {

  /**
   * hasLoginForm if the authentication module uses build-in login form. 
   * authentication module can override its value if using external login form 
   * 
   * @var boolean true, if the module uses login form. false, if the module uses
   * external authentication page.
   * @access protected
   */
  var $hasLoginForm = true;

  /**
   * guard guard component 
   * 
   * @var GuardComponent guard component object
   * @access protected
   */
  var $guard = null;

  /**
   * controller controller object
   * 
   * @var Controller controller object
   * @access protected
   */
  var $controller = null;

  /**
   * Session the shortcut for session object in component
   * 
   * @var Session
   * @access protected
   */
  var $Session = null;

  /**
   * fields the copy of the fields array in AuthComponent
   * 
   * @var array
   * @access protected
   * @see AuthComponent
   */
  var $fields = array();

  /**
   * data login data 
   * 
   * @var array
   * @access protected
   */
  var $data = array();

  /**
   * __construct contructor
   * 
   * @param GuardComponent $guard pointor to the guard component
   * @param string $name the name of this authentication module
   * @access protected
   * @return void
   */
  function __construct($guard, $name = null) {
    parent::__construct();
    $this->guard = $guard;
    $this->fields = $guard->fields;
    $this->controller = $guard->controller;
    $this->Session = $guard->Session;

    // check if authentication module name is set
    if(!isset($this->name)) {
      $this->name = $name;
    }

    $this->extractConfig();
  }

  /**
   * hasLoginData test if the controller got the login data (submitted by form 
   * or in HTTP header). The authentication module with out login form should 
   * override this method to provide its own way to check if the login data is 
   * received.
   * 
   * @access public
   * @return boolean true if it got login data, false if not.
   */
  function hasLoginData() {
    if(false === $this->hasLoginForm()) {
      $this->guard->error('You should override hasLoginData() method in your authentication module as you do not have login form.');
      $this->__stop();
    }

    if($hasData = !empty($this->controller->data) && isset($this->controller->data[$this->controller->name])) {
      $this->data = $this->controller->data[$this->controller->name];
    }

    return $hasData;
  }

  /**
   * getLoginData return the login data stored in authentication module
   * 
   * @access public
   * @return array authentication data
   */
  function getLoginData() {
    return $this->data;
  }

  /**
   * hasLoginForm getter method for hasLoginForm. test if authentication module 
   * is using build-in login form
   * 
   * @access public
   * @return boolean true, if the module uses login form. false, if the module uses
   * external authentication page.
   */
  function hasLoginForm() {
    return $this->hasLoginForm;
  }    

  /**
   * logout logout method. Authentication module should override it if there are 
   * more clean up to do before logout.
   * 
   * @access public
   * @return void
   */
  function logout() {
  }

  /**
   * isLoggedIn test if the user is logged in
   * 
   * @access public
   * @return boolean true, if the user is logged in. false, if not.
   */
  function isLoggedIn() {
    return (null != $this->guard->user());
  }

  /**
   * redirectToLogin redirect user to login page
   * 
   * @param string $url the url to redirect to.
   * @access public
   * @return void
   */
  function redirectToLogin($url = null) {
    if (!$this->guard->RequestHandler->isAjax()) {
      $this->Session->setFlash($this->guard->authError, $this->guard->flashElement, array(), 'auth');
      if (!empty($this->controller->params['url']) && count($this->controller->params['url']) >= 2) {
        $query = $this->controller->params['url'];
        unset($query['url'], $query['ext']);
        $url .= Router::queryString($query, array());
      }
      $this->Session->write('Auth.redirect', $url);
      $this->controller->redirect(Router::normalize($this->guard->loginAction));
      return false;
    } elseif (!empty($this->guard->ajaxLogin)) {
      $this->controller->viewPath = 'elements';
      echo $this->controller->render($this->guard->ajaxLogin, $this->gurad->RequestHandler->ajaxLayout);
      $this->_stop();
      return false;
    } else {
      $this->controller->redirect(null, 403);
    }
  }

  /**
   * getLoginUrl return the login URL
   * 
   * @access public
   * @return string the login URL
   */
  function getLoginUrl() {
    return Router::url(array('plugin' => 'guard', 'controller' => 'guard', 'action' => 'login'), true);
  }

  /**
   * urlNormalize replace the variables with values for URLs
   * 
   * @param string $url the URL to be replaced
   * @access public
   * @return string the replaced URL
   */
  function urlNormalize($url) {
    $search = array('%HOST%');
    $replace = array($_SERVER['SERVER_NAME']);
    return str_replace($search, $replace, $url);
  }

  /**
   * extractConfig extract the configurations to variables. All the 
   * values that are defined configurations for this authentication module are 
   * extract into properties to current module. The arrays are merged. Other 
   * types of values are replaced if there are existing ones.
   * 
   * @access public
   * @return void
   */
  function extractConfig() {
    $configs = Configure::read('Guard.AuthModule.' . $this->name);
    if(!empty($configs)) {
      foreach($configs as $k => $v) {
        if(isset($this->$k) && is_array($this->$k)) {
          // merge array, if already defined 
          $this->$k = array_merge($this->$k, $v);
        } else {
          // for other types of values, just replace them
          $this->$k = $v;
        }
      }
    }
  }

  /**
   * _mapFields Mapping the fields from the external authentication module to 
   * current system. The mappings are defiend in configuration files with 
   * regular expressions. The mapped data are stored in $this->data
   * Authentication modules may not use this function if the fields are already
   * matched. This method can be overridden to provide custom mapping. This 
   * method also calls convertField method to convert the value of each fields.
   * 
   * @access protected
   * @return void
   * @see guard.php
   * @see convertField
   */
  function _mapFields() {
    foreach($this->fieldMapping as $k => $v) {
      $this->data[$v] = self::convertField($k, $_SERVER[$k]);
    }
  }

  /**
   * convertField convert the values from external authenticatio module to match 
   * the current sysatem. The converting rules are defined in configuration 
   * file with regular expressions. This method can be overridden to provide 
   * custom conversion.  
   * 
   * @param mixed $field the original field name from external authentication 
   * system
   * @param mixed $value the value to be converted
   * @access public
   * @return string converted value
   */
  function convertField($field, $value) {
    if(isset($this->mappingRules) && isset($this->mappingRules[$field])) {
      return preg_replace(array_keys($this->mappingRules[$field]), 
                          array_values($this->mappingRules[$field]),
                          $value
                         );
    } else {
      return $value;
    }
  }
}
