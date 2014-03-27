<?php

  echo $this->Form->create('Backreference');
  echo $this->Form->input('Link Text',
    array(
      'between' => '<br />',
      'after' => '<br />This is required.'
    )
  );

  echo $this->Form->input('Jump to page', 
    array(
      'type' => 'select', 
      'class' => 'backreference-pages', 
      'between' => '<br />',
      'after' => '<br /><br />'
    )
  );

  echo $this->element('tinymce_dialog_buttons');

  echo $this->Form->end();

?>