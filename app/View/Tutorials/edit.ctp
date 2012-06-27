
<div class="tutorials form">
  <h1>Edit Tutorial Information</h1>
<?php echo $this->Form->create('Tutorial');?>

	<?php
    echo $this->Form->input('id');
    echo $this->element('tutorial_title');

    $user_url_after = '';
    $user_url_disabled = true;
    if ($is_admin) {
      $user_url_after = 'Changing this will break any existing links!';
      $user_url_disabled = false;
    } elseif (empty($user_url)) {
      $user_url_disabled = false;
    }
    echo $this->Form->input('user_url',
      array(
        'between' => '/tutorial/',
        'label' => 'Published URL: ',
        'disabled' => $user_url_disabled,
        'after' => $user_url_after,
      )
    );

    $this->QuickhelpTinyMce->editor('QuickHelp_simple');
    echo $this->Form->input('description', array('class' => 'mceQuickHelpSimple'));

    echo $this->element('tutorial_common');

    // give up on AJAX link checker for now. May need JSONP or something.
		echo $this->Form->input('url', array('label' => 'Right frame starting URL: '/*, 'after' => "<span>invalid</span>"*/));

    $before_link_toc = $this->Form->label('link_toc', 'Link table of contents?');
    echo $this->Form->input('link_toc', array('before' => $before_link_toc, 'label' => ''));

    if ($has_quiz) {
      echo "<fieldset id='quiz-certificate-fields'>";
      echo '<legend>Quiz fields</legend>';
      $before_quiz = $this->Form->label('FinalQuiz.certificate', 'Quiz certificate:');
      echo $this->Form->input('FinalQuiz.certificate', array('label' => '', 'before' => $before_quiz));
      echo $this->Form->input('FinalQuiz.id');
      echo $this->Form->input('FinalQuiz.certificate_email');
      $before_quiz_email_self = $this->Form->label('certificate', 'Allow user to email self:');
      echo $this->Form->input('FinalQuiz.certificate_email_self',
        array('label' => '', 'before' => $before_quiz_email_self));
      $before_quiz_grades = $this->Form->label('certificate', 'Include grades?');
      echo $this->Form->input('FinalQuiz.certificate_grades',
        array('label' => '', 'before' => $before_quiz_grades));
      echo "</fieldset>";
    }

?>

<?php echo $this->Form->end(__('Submit'));?>
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

