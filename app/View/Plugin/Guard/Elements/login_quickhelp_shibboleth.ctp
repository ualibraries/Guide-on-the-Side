<?php echo $this->Session->flash('auth') ?>

<p>Welcome to QuickHelp. Let's make some tutorials!</p>
<?php if(!$is_logged_in):?>
    <?php echo $this->Html->link('UA NetID Login', $login_url); ?>
<?php else: ?>
    <?php echo $this->Html->link('Logout', Router::url(array('plugin' => 'guard', 'controller' => 'guard', 'action' => 'logout'), true))?>
<?php endif;?>