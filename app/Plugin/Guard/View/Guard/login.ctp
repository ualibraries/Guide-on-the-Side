<!-- begin login form -->
<?php echo $this->element('login_' . Inflector::underscore($auth_module_name), array('login_url', $login_url, 'is_logged_in' => $is_logged_in))?>
<!-- end login form -->
