<h1 id="title"><?php echo $title ?></h1>
<div>Start at <a href="<?php echo $site_url ?>" target="site-frame"><?php echo $site_title ?></a>.</div>
<?php echo $this->element('table_of_contents') ?>

<?php echo $this->element('tutorial_content') ?>

<?php echo $this->element('acknowledgement') ?>

<?php echo $this->element('feedback', array('id' => $tutorial['Tutorial']['id'], 'mode' => 'single_page')) ?>

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");