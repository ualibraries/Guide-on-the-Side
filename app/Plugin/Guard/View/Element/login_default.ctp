<?php

echo $form->create('Guard', array('url' => $login_url));
echo $form->input('username');    
echo $form->input('password');    
echo $form->end('Login');

?>

