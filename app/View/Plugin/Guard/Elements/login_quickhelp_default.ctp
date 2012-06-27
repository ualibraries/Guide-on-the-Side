<?php echo $this->Session->flash('auth') ?>

<?php $title = Configure::read('user_config.application_title') ?>

<p>Welcome<?php echo ($title ? " to $title" : '') ?>. Let's make some tutorials!</p>

<?php
echo $this->Form->create('User', array('url' => $login_url));
echo $this->Form->input('username');    
echo $this->Form->input('password');    
echo $this->Form->end('Login');

?>

