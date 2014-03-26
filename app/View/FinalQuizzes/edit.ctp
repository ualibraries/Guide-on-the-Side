<h2><?php echo __('Edit Quiz'); ?></h2>

<?php echo $this->Html->link('<< Return to tutorial', array('controller' => 'tutorials',
  'action' => 'edit_content', $this->params['named']['tutorial'])) ?>

<div class="actions">
   <div>
      <?php
      echo $this->Html->link('Delete quiz',
         array('action' => 'delete', $this->data['FinalQuiz']['id']), array('class' => 'big-button'),
         'Are you sure you want to delete your quiz?');
      ?>
   </div>
</div>

<div class="finalQuizzes form">
<?php echo $this->Form->create('FinalQuiz');?>

	<?php
    echo $this->Form->input('id');
		$this->QuickhelpTinyMce->editor('QuickHelp');
    echo $this->Form->input('content', array('label' => '', 'class' => 'mceQuickHelp'));

		echo $this->Form->input('tutorial_id',
      array(
        'value' => $this->params['named']['tutorial'],
        'type' => 'hidden'
      )
    );
	?>
<?php echo $this->Form->end(__('Save'));?>
</div>
