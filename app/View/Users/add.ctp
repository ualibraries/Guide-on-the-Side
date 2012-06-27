<div class="users form">
<?php echo $this->Form->create('User');?>
  <h2>Add User</h2>
	<?php
		echo $this->Form->input('username');
    if ($hasLoginForm) {
		  echo $this->Form->input('password', array('value' => ''));
 		  echo $this->Form->input('password_confirmation', array('type' => 'password', 'value' => ''));
    }
 		echo $this->Form->input('role_id');
	
    echo $this->Form->submit(__('Add user'),
      array(
        'after' => ' ' . $this->Html->link(__('Cancel'), array('action' => 'index')),
      )
    );
    echo $this->Form->end();
  ?>
</div>