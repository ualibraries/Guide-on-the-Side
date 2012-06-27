<div class="finalQuizzes view">
<h2><?php echo __('Final Quiz');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Content'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['content']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Form Method'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['form_method']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Form Action'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['form_action']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Submit Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['submit_value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Eval Link'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['eval_link']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Tutorial'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($finalQuiz['Tutorial']['title'], array('controller' => 'tutorials', 'action' => 'view', $finalQuiz['Tutorial']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $finalQuiz['FinalQuiz']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Final Quiz'), array('action' => 'edit', $finalQuiz['FinalQuiz']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Final Quiz'), array('action' => 'delete', $finalQuiz['FinalQuiz']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $finalQuiz['FinalQuiz']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Final Quizzes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Final Quiz'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tutorials'), array('controller' => 'tutorials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tutorial'), array('controller' => 'tutorials', 'action' => 'add')); ?> </li>
	</ul>
</div>
