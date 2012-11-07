<?php
/**
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
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Guide on the Side: '); ?>
		<?php echo $title_for_layout; ?>
	</title>
  <base href="<?php echo $this->Html->url('/', true) ?>" />
	<?php
    echo $this->Html->charset('UTF-8');
		//echo $this->Html->meta('icon');
    
    echo $this->Html->css('http://fonts.googleapis.com/css?family=PT+Sans|Crimson+Text|Droid+Sans:regular,bold');

    echo $this->element('jquery_ui_css');

    echo $this->Html->css('default');
    
    echo $this->element('autoinclude_css');

    echo $this->element('jquery');
    // jQuery Tools must be loaded first.
    echo $this->Html->script('http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js');
    echo $this->element('jquery_ui');
    echo $this->Html->script('ui_tools_conflict_fix');

    echo $this->Html->script('common');

    echo $this->element('autoinclude_js');

    echo $this->element('cakephp_js');

		echo $scripts_for_layout;
  ?>
</head>
<body> 
  <div id="container">
    <div id="content">
      <div id="userinfo">
      <?php
        if ($this->Session->check('Auth.User.username')) {
          echo "You are logged in as {$this->Session->read('Auth.User.username')}. ";
          if ($show_password_link) {
            echo '[';
            echo $this->Html->link('Change password', array('controller' => 'users',
                'action' => 'edit', $this->Session->read('Auth.User.id')));
            echo '] ';
          }
          echo '[';
          echo $this->Html->link('Log out', '/logout');
          echo ']';
        }

      ?>
      </div>
      <?php
        echo $this->Html->link(
          $this->Html->image('gots-banner.jpg', array('alt' => 'Guide on the Side', 'id' => 'QuickHelp')),
          array('controller' => 'tutorials', 'action' => 'index'),
          array('escape' => false)
        );
			  echo $this->Session->flash();
			  echo $content_for_layout;
      ?>
      
    </div>
  </div>

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>