<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title><?php echo $title_for_layout ?></title>

  <?php
  echo $this->Html->charset('UTF-8');
  echo $this->element('jquery_ui_css');
  echo $this->Html->css('tinymce_dialog');
  echo $this->element('autoinclude_css');

  echo $this->Html->script('/TinyMCE/js/tiny_mce/tiny_mce_popup.js');
  echo $this->element('jquery');
  echo $this->element('formalize_css');
  echo $this->element('jquery_ui');
  echo $this->element('cakephp_js');
  
  // note that the order of $scripts_for_layout and autoinclude_js is important for questions/add.js
  //   and questions/edit.js
  echo $scripts_for_layout;

  echo $this->Html->script('common');

  echo $this->element('autoinclude_js');
  ?>

</head>
<body>
 <?php echo $this->Session->flash() ?>
 <?php echo $content_for_layout ?>
</body>
</html>