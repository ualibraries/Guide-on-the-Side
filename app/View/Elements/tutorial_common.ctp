<?php
  echo "<fieldset>";
  echo '<legend>' . __('Contact information') . '</legend>';
  echo $this->Form->input('contact_name', array('label' => __('Name: '), 'size' => '40'));
  echo $this->Form->input('contact_email', array('label' => __('Email: '), 'size' => '40'));
  echo $this->Form->input('contact_phone', array('label' => __('Phone: '), 'size' => '40'));
  echo "</fieldset>";
