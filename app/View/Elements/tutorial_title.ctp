<?php

  echo $this->Form->input('title',
    array(
      'label' => 'Tutorial Title',
      'maxlength' => $title_length,
      'after' => "<span id='after-title'>{$title_length}</span> characters remaining"
    )
  );