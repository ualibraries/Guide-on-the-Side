<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppModel extends Model {
  var $actsAs = array('Containable');

  // From http://cakephp.lighthouseapp.com/projects/42648/tickets/182-paginate-and-custom-find-failing-count
  function _findCount($state, $query, $results = array()) {    
    if ($state == 'before') {
      if (isset($query['type']) && $query['type'] != 'count') {
        $query = $this->{'_find' . ucfirst($query['type'])}($state, $query);
      }
      return parent::_findCount($state, $query);
    }
    return parent::_findCount($state, $query, $results);
  }

}
