  <div id="scrollable">
      <?php echo $this->element('tutorial_content') ?>
  </div>
  <div id="progress"></div>

<?php echo $this->element('acknowledgement') ?>

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");
