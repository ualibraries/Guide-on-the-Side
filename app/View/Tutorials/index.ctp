<div class="tutorials index">
	<h1><?php echo __('Tutorials');?></h1>

  <?php
    echo $this->Html->link(__('Create a tutorial'), array('action' => 'add'),
      array('id' => 'create', 'class' => 'big-button'));
  ?>

  <h2 id="edit">Edit</h2>

  <div id="tutorial-list" class="paginated-list">
  <?php
	$i = 0;
	foreach ($tutorials as $tutorial):
		$class = ' class="row"';
		if ($i++ % 2 == 0) {
			$class = ' class="row altrow"';
		}
	?>
	<div<?php echo $class;?>>
		<div>
      <?php
      echo $this->Html->link($tutorial['Tutorial']['title'], array('action' => 'view', $tutorial['Tutorial']['id']));
      ?>
    </div>
		<div class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => $tutorial['Tutorial']['edit_action'], $tutorial['Tutorial']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $tutorial['Tutorial']['id']), null, 
        sprintf(__('Are you sure you want to delete tutorial %s?'), $tutorial['Tutorial']['title'])); ?>
		</div>
	</div>
  <?php endforeach ?>

  <?php echo $this->element('paging') ?>
  </div>

  <div>
  <?php
    echo $this->Html->link('View the public interface', array('action' => 'search'), array('target' => '_blank'));
  ?>
  </div>
  
  <?php
  if ($is_admin) {
    echo $this->Html->link('Manage users', array('controller' => 'users'));
  }

  ?>

</div>
