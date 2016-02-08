
<div class="tutorials form">
  <h1><?php echo __('Edit Tutorial Information') ?></h1>
<?php echo $this->Form->create('Tutorial');?>

	<?php
    echo $this->Form->input('id');
    echo $this->element('tutorial_title');

    $user_url_after = '';
    $user_url_disabled = true;
    if ($is_admin) {
      $user_url_after = __('Changing this will break any existing links!');
      $user_url_disabled = false;
    } elseif (empty($user_url)) {
      $user_url_disabled = false;
    }
    echo $this->Form->input('user_url',
      array(
        'between' => '/tutorial/',
        'label' => __('Published URL: '),
        'disabled' => $user_url_disabled,
        'size' => '40',
        'after' => '<p class="field-description">' . $user_url_after . '</p>',
      )
    );

    $this->QuickhelpTinyMce->editor('QuickHelp_simple');
    echo $this->Form->input('description', array('label' => __('Description'), 'class' => 'mceQuickHelpSimple'));

    echo $this->element('tutorial_common');

    // give up on AJAX link checker for now. May need JSONP or something.
    echo "<fieldset>";
    echo "<legend>" . __('Starting location') . "</legend>";
    echo $this->Form->input('url_title', array('label' => __('Page title: '), 'size' => '40'/*, 'after' => "<span>invalid</span>"*/));
    echo $this->Form->input('url', array('label' => __('URL: '), 'size' => '40'/*, 'after' => "<span>invalid</span>"*/));
    echo "</fieldset>";
    echo $this->Form->input('popup', array(
		 'label' => __('Popup mode'),
		 'after' => '<p class="field-description">' . __('Use popup mode when your right frame starting URL is not working') . '</p>')
	 );
    echo $this->Form->input(
	    'show_chapter_progress',
	    array(
		    'label' => __('Show Chapter Progress'),
		    'after' => '<p class="field-description">' . __('Show how far a user is in a chapter (e.g. "2 of 3")') . '</p>'
	    )
    );
    echo $this->Form->input('link_toc', array('label' => __('Link table of contents')));
    echo $this->element('tutorial_feedback_link');
    echo $this->Form->hidden('tutorial_type_id', array('value' => TUTORIAL_TYPE_SIDEBYSIDE));
?>
</fieldset>
<?php

    echo "<fieldset id='certificate-fields'>";
    echo '<legend>' . __('Certificates') . '</legend>';
    echo $this->Form->input('Tutorial.certificate', array('label' => __('Include a tutorial certificate')));
    echo $this->Form->input('Tutorial.id');
    if ($has_quiz) {
      echo $this->Form->input('FinalQuiz.certificate', array('label' => __('Include a quiz certificate')));
      echo $this->Form->input('FinalQuiz.id');
//      $before_quiz_grades = $this->Form->label('FinalQuiz.certificate_grades', 'Include grades?');
//      echo $this->Form->input('FinalQuiz.certificate_grades',
//      array('label' => false, 'before' => $before_quiz_grades));      
    }
    echo $this->Form->input('Tutorial.certificate_email_self', array('label' => __('Allow user to send to additional email addresses')));
    echo $this->Form->input('Tutorial.certificate_email', array('label' => __('Send all certificates to: '), 'size' => '40'));
    echo "</fieldset>";
    

?>

<?php echo $this->Form->end(__('Save'));?>
</div>

<?php
  if (empty($user_url)) {
    echo $this->Html->scriptBlock("cakephp.generate_slug = true;");
  } else {
    echo $this->Html->scriptBlock("cakephp.generate_slug = false;");
  }
  // edit uses the add functions as well. DRY FTW!
  echo $this->Html->script('tutorials/add', array('inline' => false));
?>

