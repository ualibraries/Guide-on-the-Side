
<div class="tutorials form">

  <h2>Edit '<?php echo $tutorial_title ?>' Tutorial Content</h2>

  <?php echo $this->Html->link('<< Return to tutorial index', array('action' => 'index')) ?>

<div class="actions">
  <div id="publish-links">
  <?php
    echo $this->Html->link('Unpublish', array('action' => 'unpublish', $tutorial_id),
      array('id' => 'unpublish', 'class' => 'big-button'),
      "Unpublishing will prevent users from seeing this tutorial. Are you sure you want to do this?");
    echo $this->Html->link('Publish', array('action' => 'publish', $tutorial_id),
      array('id' => 'publish', 'class' => 'big-button'));
    echo $this->Html->scriptBlock('var tutorial_published = ' . $published . ';');
  ?>
  </div>
  <div id="edit-information-link">
  <?php
    echo $this->Html->link('Edit information', array('action' => 'edit', $tutorial_id), array('class' => 'big-button'));
  ?>
  </div>
  <div id="preview-link">
  <?php
    echo $this->Html->link('Preview', array('action' => 'view', $tutorial_id),
      array('id' => 'preview', 'target' => '_blank', 'class' => 'big-button'));
  ?>
  </div>
  <div id="quiz-link">
  <?php
    if ($has_quiz) {
      echo $this->Html->link('Edit quiz',
       array('controller' => 'final_quizzes', 'action' => 'edit', $this->data['FinalQuiz']['id'],
         'tutorial' => $tutorial_id), array('class' => 'big-button'));
    } else {
      echo $this->Html->link('Add quiz',
       array('controller' => 'final_quizzes', 'action' => 'add', 'tutorial' => $tutorial_id),
       array('class' => 'big-button'));
    }

  ?>
  </div>

</div>
<?php
// I shouldn't have to specify the URL here, but it fixes #114. I think.
echo $this->Form->create('Tutorial', 
  array('url' => array($tutorial_id)));
?>

	<?php
    $this->QuickhelpTinyMce->editor('QuickHelp');

    echo $this->Form->hidden('id');
    echo $this->Form->input('content', array('label' => '', 'class' => 'mceQuickHelp'));

    $after_message = ' Give a reason for your revision';
    if (Configure::read('require_revision_message')) {
      $after_message .= ' (required)';
    }
    echo "<hr />";
    echo $this->Form->input('Revision.message', array('label' => 'Log message: ', 'after' => $after_message));
  ?>
<?php 
  echo $this->Form->end(__('Save'));
?>
</div>

<?php 
  echo $this->Html->scriptBlock("cakephp.tutorial_id = $tutorial_id;");
//  echo $this->Html->script('md5', array('inline' => false));
  // take checksum of contents for testing onbeforeunload (to try and prevent lost data)
//  $checksum = md5($this->data['Tutorial']['content']);
////  debug($this->data['Tutorial']['content']);
////  debug($checksum);
//  echo $this->Html->scriptBlock("cakephp.content_checksum = '$checksum';");
////  echo $this->Html->scriptBlock("cakephp.second_checksum = md5($('#TutorialContent').text());");
//  echo $this->Html->scriptBlock("cakephp.compare = (cakephp.content_checksum == cakephp.second_checksum)");
