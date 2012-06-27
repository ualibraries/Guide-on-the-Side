<?php
  echo $this->Form->create('Heading');
  echo $this->Form->input('type',
    array(
      'type' => 'radio',
      'options' => array('step' => 'Page break', 'chapter' => 'Chapter heading (also causes a page break)'),
      'separator' => '<br />',
      'legend' => false,
      'label' => 'Type',
      'default' => 'step'
    )
  );
  echo $this->Form->input('title', array('label' => 'Title: '));

  echo $this->element('tinymce_dialog_buttons');

  echo $this->Form->end();
?>

