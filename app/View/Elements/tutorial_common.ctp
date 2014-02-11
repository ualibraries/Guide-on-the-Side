<?php
  echo "<fieldset>";
  echo "<legend>Contact information</legend>";
  echo $this->Form->input('contact_name', array('label' => 'Name: ', 'size' => '40'));
  echo $this->Form->input('contact_email', array('label' => 'Email: ', 'size' => '40'));
  echo $this->Form->input('contact_phone', array('label' => 'Phone: ', 'size' => '40'));
  echo "</fieldset>";
