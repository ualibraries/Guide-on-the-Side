<?php echo $this->Session->flash('auth') ?>

<p>Welcome. Let's make some tutorials!</p>
<?php if(!$is_logged_in):?>
    <?php echo $this->Html->link($loginLinkText, $login_url); ?>
<?php else: ?>
    <?php echo $this->Html->link('Log out', Router::url('/logout', true))?>
<?php endif;?>