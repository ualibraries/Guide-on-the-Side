<?php
  echo "<p></p>";
  echo $this->Form->create('TextBox');
  echo $this->Form->input('type',
    array(
      'type' => 'radio',
      'options' => array('one-line' => 'A free response box with one line for input', 
          'multi-line' => 'A free response box with multiple lines for input'),
      'separator' => '<br />',
      'legend' => false,
      'label' => 'Type',
      'default' => 'one-line'
    )
  );
  echo $this->Form->input('prompt', array('label' => 'Prompt *: '));
  echo $this->Form->input('placeholder', array('label' => 'Initial (placeholder) text: '));

  echo $this->element('tinymce_dialog_buttons');

  echo $this->Form->end();

