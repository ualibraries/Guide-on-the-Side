<div id="navbar" class="clearfix">
  <nav class="mode-switch">
    <ul>
      <li><?php echo $this->Html->link('Step-by-step', array('action' => 'view', $tutorial['Tutorial']['id']), array('title' => 'One step per page'))?></li>
      <li class="active">Single-page view</li>
    </ul>
  </nav>
</div>

<hgroup>
  <h1 id="title"><?php echo $title ?></h1>  
  <h2>Start at <a href="<?php echo $site_url ?>" target="site-frame"><?php echo $site_title ?></a>.</h2>
</hgroup>
<?php echo $this->element('table_of_contents') ?>

<?php echo $this->element('tutorial_content') ?>

<?php echo $this->element('acknowledgement') ?>

<?php echo $this->element('feedback', array('id' => $tutorial['Tutorial']['id'], 'mode' => 'single_page')) ?>

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");