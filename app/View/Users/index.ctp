<div class="users index">
	<h2><?php echo __('User Management');?></h2>

  <div>
  <?php echo $this->Html->link(__('<< Return to tutorial index'), array('controller' => 'tutorials'))?>
  </div>
  <br />
  
	<?php echo $this->Html->link(__('Create a new user'), array('action' => 'add'),
    array('id' => 'create', 'class' => 'big-button')); ?>

  <h2 id="edit">Edit a user</h2>
  <div id="user-list" class="paginated-list">
    <?php
    $i = 0;
    foreach ($users as $user):
    	$class = ' class="row"';
      if ($i++ % 2 == 0) {
        $class = ' class="row altrow"';
      }
    ?>
    <div<?php echo $class;?>>

        <?php echo $this->Html->link(__($user['User']['username']),
          array('action' => 'edit', $user['User']['id'])); ?>
        (<?php echo $user['Role']['name'] ?>)

    </div>

    <?php endforeach; ?>

    <?php echo $this->element('paging') ?>
    
  </div>
</div>