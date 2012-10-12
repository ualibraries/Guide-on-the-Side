<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php
 *
 * This is an application wide file to load any function that is not used within a class
 * define. You can also use this to include or require any files in your application.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2009, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// This is to allow themes to be outside the app directory.
App::build(array('View' => array(ROOT . DS . 'themes' . DS)));

// Random bits of stuff

  /**
   *  Support for user-supplied YAML configuration
   */
  App::import('Vendor', 'sfYaml', array('file' => 'symfony-yaml' . DS . 'lib' . DS . 'sfYaml.php'));
  // config.yml can live in the app directory or parallel to it.
  if (file_exists(APP . DS . 'config.yml')) {
    Configure::write('user_config', sfYaml::load(APP . DS . 'config.yml'));  
  } else {
    Configure::write('user_config', sfYaml::load(ROOT . DS . 'config.yml'));
  }
  

  // Wacky en/decoding goodies, also in common.js
  function QH_urldecode($string) {
    $string = rawurldecode($string);
    return str_replace(array('[|[', ']|]', '|*|', '|^|', '[][', '|}|', '|{|', '|$|'), array('/', '\\', ':', '#', '&', "'", '"', '?'), $string);
  }

  function QH_urlencode($string) {
    $string = str_replace(array('/', '\\', ':', '#', '&', "'", '"', '?'), array('[|[', ']|]', '|*|', '|^|', '[][', '|}|', '|{|', '|$|'), $string);
    return $string = rawurlencode($string);
  }

  // This is a mapping between buttons and tags used to render the results of those buttons.
  //   It is used for backend filtering (strip_tags).
  //   It was intended to be used for TinyMCE filtering (valid_elements) also, but I'm not sure that's necessary.
  function allowed_tags($format = '') {
    $button_tags = array(
      'general' => array('p', 'div', 'br'),
      'bold' => array('strong'),
      'italic' => array('em'),
      'link' => array('a'),
      'bullist' => array('ul', 'li'),
      'phpimage' => array('img'),
      'qhBtnHeading' => array('img'),
      'qhBtnQuestion' => array('img'),
      'qhBtnDefinition' => array('img'),
    );

    static $just_tags = array();

    $return_tags = null;

    if ($format == 'strip_tags' || $format == 'tinymce') {
      if (empty($just_tags)) {
        foreach ($button_tags as $tag_array) {
          $just_tags = array_merge($just_tags, $tag_array);
        }
        $just_tags = array_unique($just_tags);
      }
      if ($format == 'strip_tags') {
        return '<' . implode('><', $just_tags) . '>';
      } elseif ($format == 'tinymce') {
        ; // TODO: implement later
      }
    } elseif ($format == 'array') {
      return $button_tags;
    }

  }

  // Per http://jamienay.com/2010/01/zend_search_lucene-datasource-for-cakephp/
  ini_set('include_path', ini_get('include_path') . ':' . APP . 'Vendor' . DS);
  function __autoload($path) {
    if (substr($path, 0, 5) == 'Zend_') {
      include str_replace('_', '/', $path) . '.php';
    }
    return $path;
  }

  spl_autoload_register('__autoload');
  
  App::import('Vendor', 'StandardAnalyzer',
    array('file' => 'StandardAnalyzer' . DS . 'Analyzer' . DS . 'Standard' . DS . 'English.php'));

  CakePlugin::loadAll();
  App::uses('FireCake', 'DebugKit.Lib');

  Configure::write('Dispatcher.filters', array(
      'AssetDispatcher',
      'CacheDispatcher'
  ));  
  
//  $revision_message = Configure::read('user_config.require_revision_message'); 
  Configure::write('require_revision_message', false);
  Configure::write('GoogleAnalytics.enabled', Configure::read('user_config.google_analytics.enabled'));