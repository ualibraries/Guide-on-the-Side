<div class="tutorials form">
  <h1><?php echo __('Create Link to External Tutorial') ?></h1>

<?php

echo $this->Form->create('Tutorial');

  echo $this->element('tutorial_title');
  echo $this->Form->input('external_identifier', array('label' => __('Published URL: ')));

  echo $this->Form->input('in_index', array('label' => __('Available in public index'), 'checked' => true));

  echo $this->element('tutorial_common');

  echo "<fieldset>";
  echo '<legend>' . __('Non-QuickHelp tutorial information') . '</legend>';
  echo $this->Form->input('dot_source_path', array('label' => __('Source path: '), 'size' => '40'));
  echo $this->Form->input('dot_creation_timestamp', array('label' => __('Tutorial creation time:')));
  echo $this->Form->input('dot_last_revision_timestamp', array('label' => __('Tutorial last revised time:')));
  echo '</fieldset>';

  echo $this->element('tutorial_metadata');
  echo $this->Form->hidden('tutorial_type_id', array('value' => TUTORIAL_TYPE_EXTERNAL));
  echo $this->Form->hidden('published', array('value' => true));
  echo $this->Form->end(__('Create'));
?>
</div>

<?php
echo $this->Html->script('tutorials/add', array('inline' => false));