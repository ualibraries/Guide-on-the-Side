<div class="finalQuizzes form">
<?php echo $this->Form->create('FinalQuiz');?>
 		<h2><?php echo __('Add Final Quiz'); ?></h2>
	<?php
		$this->QuickhelpTinyMce->editor('QuickHelp');
    echo $this->Form->input('content', array('label' => '', 'class' => 'mceQuickHelp'));
    
		echo $this->Form->input('tutorial_id',
      array(
        'value' => $this->params['named']['tutorial'],
        'type' => 'hidden'
      )
    );
	?>
<?php echo $this->Form->end(__('Add Quiz'));?>
</div>
