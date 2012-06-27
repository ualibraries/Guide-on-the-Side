<?php

// For some reason the form isn't including the tutorial id. Specifying the url fixes this.
echo $this->Form->create(null, array('url' => array ('action' => $this->action, $tutorial['Tutorial']['id'])));
echo $this->Form->input('from_name', array('label' => 'Name (optional): '));
echo $this->Form->input('from_email', array('label' => 'Email (optional): '));
echo $this->Form->input('comment', array('label' => 'Comment: ', 'type' => 'textarea'));
//echo $this->Form->end('Submit');
echo $this->Form->end();

?>