<?php

  echo $this->Form->input('title',
    array(
      'label' => __('Tutorial Title: '),
      'maxlength' => $title_length,
      'size' => '40',	
      'after' => "<p class='field-description'>" . __('%d characters remaining.', "<span id='after-title'>{$title_length}</span>") . "</p>"
    )
  );