<div class="tutorials form">
  <h1><?php echo __('Edit Link to External Tutorial') ?></h1>

<?php

  echo $this->Form->create('Tutorial');
  echo $this->Form->input('id');
  echo $this->element('tutorial_title');
  echo $this->Form->input('external_identifier', array('label' => __('Published URL:')));
  $before_index = $this->Form->label('in_index', __('Available in public index?'));
  echo $this->Form->input('in_index', array('before' => $before_index, 'label' => ''));

  echo $this->element('tutorial_common');
  echo $this->element('tutorial_updater');
  echo "<fieldset>";
  echo '<legend>' . __('Non-QuickHelp tutorial information') . '</legend>';
  echo $this->Form->input('dot_source_path', array('label' => __('Path to Source path')));
  echo $this->Form->input('dot_creation_timestamp', array('label' => __('Tutorial creation time')));
  echo $this->Form->input('dot_last_revision_timestamp', array('label' => __('Tutorial last revised time')));
  echo '</fieldset>';
  echo $this->element('tutorial_metadata');
  echo $this->Form->end(__('Save'));
?>
</div>

<?php
echo $this->Html->script('tutorials/add', array('inline' => false));