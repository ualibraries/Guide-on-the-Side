<?php echo $this->Session->flash('auth') ?>

<p><?php echo __('Welcome. Let\'s make some tutorials!') ?></p>
<?php if(!$is_logged_in):?>
    <?php echo $this->Html->link($loginLinkText, $login_url); ?>
<?php else: ?>
    <?php echo $this->Html->link(__('Log out'), Router::url('/logout', true))?>
<?php endif;?>