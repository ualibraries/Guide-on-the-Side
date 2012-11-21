
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
    echo $this->Form->input('link_toc', array('before' => $before_link_toc, 'label' => false));

    echo "<fieldset id='certificate-fields'>";
    echo '<legend>Certificates</legend>';
    $before_quiz = $this->Form->label('Tutorial.certificate', 'Include a tutorial certificate?');
    echo $this->Form->input('Tutorial.certificate', array('label' => false, 'before' => $before_quiz));
    echo $this->Form->input('Tutorial.id');
    if ($has_quiz) {
      $before_quiz = $this->Form->label('FinalQuiz.certificate', 'Include a quiz certificate?');
      echo $this->Form->input('FinalQuiz.certificate', array('label' => '', 'before' => $before_quiz));
      echo $this->Form->input('FinalQuiz.id');
//      $before_quiz_grades = $this->Form->label('FinalQuiz.certificate_grades', 'Include grades?');
//      echo $this->Form->input('FinalQuiz.certificate_grades',
//      array('label' => false, 'before' => $before_quiz_grades));      
    }    
    echo "</fieldset>";
    
    echo "<fieldset>";
    echo '<legend>Email settings</legend>';
    echo $this->Form->input('Tutorial.certificate_email', 
        array('label' => false, 'before' => 
        $this->Form->label('Tutorial.certificate_email', 'Send all certificates to:')));
    $before_quiz_email_self = $this->Form->label('Tutorial.certificate_email_self', 'Allow user to send to additional email addresses?');
    echo $this->Form->input('Tutorial.certificate_email_self',
      array('label' => false, 'before' => $before_quiz_email_self));

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

