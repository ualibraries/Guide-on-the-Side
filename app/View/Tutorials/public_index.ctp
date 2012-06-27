<h3><?php echo Configure::read('user_config.application_title') ?></h3>
<ul>



<?php

  foreach($tutorials as $tutorial) {
    echo "<li>";
    echo $this->Html->link(
      $tutorial['Tutorial']['title'],
      array('action' => 'view', $tutorial['Tutorial']['id']),
      array('target' => '_blank')
    );
    echo ' ';
    echo $this->Html->link(
      '[information]',
      array('action' => 'view_information', $tutorial['Tutorial']['id'])
    );
    echo "</li>";
  }

  echo $this->element('paging');
?>
</ul>