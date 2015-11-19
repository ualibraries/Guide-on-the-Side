<?php
  echo "<p></p>";
  echo $this->Form->create('TextBox');
  echo $this->Form->input('type',
    array(
      'type' => 'radio',
      'options' => array('one-line' => __('A free response box with one line for input'),
          'multi-line' => __('A free response box with multiple lines for input')),
      'separator' => '<br />',
      'legend' => false,
      'label' => __('Type'),
      'default' => 'one-line'
    )
  );
  echo $this->Form->input('prompt', array('label' => __('Prompt *: ')));
  echo $this->Form->input('placeholder', array('label' => __('Initial (placeholder) text: ')));

  echo $this->element('tinymce_dialog_buttons');

  echo $this->Form->end();

