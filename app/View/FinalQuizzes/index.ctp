<div class="finalQuizzes index">
	<h2><?php echo __('Final Quizzes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('content');?></th>
			<th><?php echo $this->Paginator->sort('form_method');?></th>
			<th><?php echo $this->Paginator->sort('form_action');?></th>
			<th><?php echo $this->Paginator->sort('submit_value');?></th>
			<th><?php echo $this->Paginator->sort('eval_link');?></th>
			<th><?php echo $this->Paginator->sort('tutorial_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($finalQuizzes as $finalQuiz):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $finalQuiz['FinalQuiz']['id']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['title']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['content']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['form_method']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['form_action']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['submit_value']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['eval_link']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($finalQuiz['Tutorial']['title'], array('controller' => 'tutorials', 'action' => 'view', $finalQuiz['Tutorial']['id'])); ?>
		</td>
		<td><?php echo $finalQuiz['FinalQuiz']['created']; ?>&nbsp;</td>
		<td><?php echo $finalQuiz['FinalQuiz']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $finalQuiz['FinalQuiz']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $finalQuiz['FinalQuiz']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $finalQuiz['FinalQuiz']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $finalQuiz['FinalQuiz']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Final Quiz'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tutorials'), array('controller' => 'tutorials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add')); ?> </li>
	</ul>
</div>