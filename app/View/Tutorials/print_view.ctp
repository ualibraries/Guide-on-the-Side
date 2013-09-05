<h1 id="title"><?php echo $title ?></h1>

<?php echo $this->element('table_of_contents') ?>

<?php echo $this->element('tutorial_content') ?>

<?php echo $this->element('acknowledgement') ?>

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");