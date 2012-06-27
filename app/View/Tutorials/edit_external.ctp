<div class="tutorials form">
  <h1>Edit Link to External Tutorial</h1>

<?php

  echo $this->Form->create('Tutorial');
  echo $this->Form->input('id');
  echo $this->element('tutorial_title');
  echo $this->Form->input('external_identifier', array('label' => 'Published URL:'));
  $before_index = $this->Form->label('in_index', 'Available in public index?');
  echo $this->Form->input('in_index', array('before' => $before_index, 'label' => ''));

  echo $this->element('tutorial_common');
  echo $this->element('tutorial_updater');
  echo "<fieldset>";
  echo '<legend>Non-QuickHelp tutorial information</legend>';
  echo $this->Form->input('dot_source_path', array('label' => 'Path to Source path'));
  echo $this->Form->input('dot_creation_timestamp', array('label' => 'Tutorial creation time'));
  echo $this->Form->input('dot_last_revision_timestamp', array('label' => 'Tutorial last revised time'));
  echo '</fieldset>';
  echo $this->element('tutorial_metadata');
  echo $this->Form->end('Save');
?>
</div>

<?php
echo $this->Html->script('tutorials/add', array('inline' => false));