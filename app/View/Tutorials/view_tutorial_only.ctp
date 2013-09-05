
  <div id="scrollable">
      <?php echo $this->element('tutorial_content') ?>
  </div>
  <div id="navigation" class="clearfix">
    <div id="prev-navigation">
      <a href="#" class="prev browse left ir" title="Previous">Previous</a>
    </div>
    <div id="progress"></div>
    <div id="next-navigation">
      <a href="#" class="next browse right ir" title="Next">Next</a>
    </div>
<!--    Section X of Y -->
  </div>

<?php echo $this->element('acknowledgement') ?>

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");
