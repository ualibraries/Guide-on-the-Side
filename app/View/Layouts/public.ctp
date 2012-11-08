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
    <?php 
      $user_title = Configure::read('user_config.application_title');
      if (!empty($user_title)) {
        echo $user_title . ': ';
      }
      echo $title_for_layout;
    ?>
	</title>
	<?php
    echo $this->Html->charset('UTF-8');
    
		//echo $this->Html->meta('icon');
    echo $this->element('formalize_css');
    echo $this->Html->css('http://fonts.googleapis.com/css?family=PT+Sans|Crimson+Text|Droid+Sans:regular,bold');

    echo $this->element('jquery_ui_css');

    echo $this->Html->css('public-common'); ?>
  
    <?php echo $this->element('autoinclude_css') ?>

    <!--[if lte IE 8]>
    <?php echo $this->Html->css('ie') ?>
    <![endif]-->
    <!--[if IE 7]>
    <?php echo $this->Html->css('ie7') ?>
    <![endif]-->
    
    <?php
    if ($this->action != 'print_view') {
      echo $this->Html->css('print_certificate', 'stylesheet',
        array('media' => 'print', 'id' => 'print-certificate'));
      echo "<!--[if IE 7]>";
      echo $this->Html->css('print_certificate_ie', 'stylesheet',
        array('media' => 'print', 'id' => 'print-certificate')); 
      echo "<![endif]-->";
    }
    ?>



    <?php
    echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js');
    echo $this->Html->script('jquery_plugins/jquery.doubletap/lib/jquery.doubletap');
    // jQuery Tools must be loaded before jQuery UI.
    echo $this->Html->script('http://cdn.jquerytools.org/1.2.5/all/jquery.tools.min.js');
    echo $this->element('jquery_ui');
    echo $this->Html->script('ui_tools_conflict_fix');

    echo $this->Html->script('jquery_plugins/jquery-resize/jquery.ba-resize.min');

    echo $this->Html->script('common');

    echo $this->element('autoinclude_js');

    echo $this->element('cakephp_js');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="content">

			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

  <?php echo $this->element('google_analytics') ?>
</body>
</html>