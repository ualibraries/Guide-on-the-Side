<?php

// For some reason the form isn't including the tutorial id. Specifying the url fixes this.
echo $this->Form->create(null, array('url' => array ('action' => $this->action, $tutorial['Tutorial']['id'], $mode)));
echo $this->Form->input('from_name', array('label' => 'Name (optional): '));
echo $this->Form->input('from_email', array('label' => 'Email (optional): '));
echo $this->Form->input('comment', array('label' => 'Comment: ', 'type' => 'textarea'));

// Catch bots in a honeypot.
echo $this->Form->input('haddress', array(
    'label' => "If you're human, don't fill this out.",
    'div' => array('class' => 'haddress')
));

echo $this->Form->end();

?>