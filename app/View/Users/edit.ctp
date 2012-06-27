<div class="users form">
<?php echo $this->Form->create('User');
  if ($user_is_self) {
    echo "<h2>Change Password</h2>";
  } else {
    echo "<h2>Edit User</h2>";
  } ?>
  <?php if (!$user_is_self): ?>
    <div class="actions">
      <?php echo $this->Html->link(
        __('Delete user'),
        array(
          'action' => 'delete',
          $this->Form->value('User.id')
        ),
        array('class' => 'big-button'),
        sprintf(__('Are you sure you want to delete %s?'), $this->Form->value('User.username'))
      ); ?>

    </div>
  <?php endif ?>
	<?php
    
    echo $this->Form->input('id');
    if (!$user_is_self) {
      echo $this->Form->input('username');
    }
    if ($hasLoginForm) {
		  echo $this->Form->input('password', array('label' => 'Password', 'type' => 'password',
        'value' => '', 'after' => 'Leave blank to keep.'));
 		  echo $this->Form->input('password_confirmation', array('label' => 'Password Confirmation', 'type' => 'password',
        'value' => ''));
    }
    if (!$user_is_self) {
 		  echo $this->Form->input('role_id');
    }

	?>
  <?php
    echo $this->Form->submit(__('Save user'),
      array(
        'after' => ' ' . $this->Html->link(__('Cancel'), array('action' => 'index')),
      )
    );
    echo $this->Form->end();
  ?>
</div>
