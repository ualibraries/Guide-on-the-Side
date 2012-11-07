<?php
/**
 * Routes Configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'tutorials', 'action' => 'search'));
	Router::connect('/admin', array('controller' => 'tutorials', 'action' => 'index'));    
    Router::connect('/login', array('plugin' => 'flex_auth', 'controller' => 'flex_auth', 'action' => 'login'));
    Router::connect('/logout', array('plugin' => 'flex_auth', 'controller' => 'flex_auth', 'action' => 'logout'));

 	Router::connect('/install', array('controller' => 'system', 'action' => 'install'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/tags/:action/*', array('controller' => 'tags'));

    App::uses('SlugRoute', 'Lib/Route');
    // See http://mark-story.com/posts/view/using-custom-route-classes-in-cakephp
    Router::connect('/tutorial/:slug', array('controller' => 'tutorials', 'action' => 'view'),
    array('routeClass' => 'SlugRoute'));

    /**
     * Load the CakePHP default routes. Remove this if you do not want to use
     * the built-in default routes.
     */
	require CAKE . 'Config' . DS . 'routes.php';