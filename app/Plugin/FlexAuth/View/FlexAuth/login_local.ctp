<?php echo $this->Session->flash('auth') ?>

<?php if(!$is_logged_in):?>
    <p>Welcome. Let's make some tutorials!</p>

    <?php
    echo $this->Form->create('User');
    echo $this->Form->input('username');    
    echo $this->Form->input('password');    
    echo $this->Form->end('Log in');

    ?>
<?php else: ?>
    <?php echo $this->Html->link('Log out', Router::url('/logout', true))?>
<?php endif; ?>


