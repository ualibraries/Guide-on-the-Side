<div id="navbar" class="clearfix">
  <nav class="mode-switch">
    <ul>
      <li>
        <?php
        echo $this->Html->link(
          __('Step-by-step'),
          array(
            'action' => $popup ? 'view_step_by_step_only' : 'view',
            $tutorial['Tutorial']['id']
          ),
          array('title' => __('One step per page'))
        );
        ?>
      </li>
      <li class="active"><?php echo __('Single-page view') ?></li>
    </ul>
  </nav>
</div>

<h1 id="title"><?php echo $title ?></h1>
<?php if (!$popup): ?>
    <p><?php echo __('Open %s in another browser window to work through this tutorial side by side.', "<a href='$site_url' target='site-frame'>$site_title</a></p>") ?>
<?php endif ?>

<?php echo $this->element('table_of_contents') ?>

<?php echo $this->element('tutorial_content') ?>

<?php echo $this->element('acknowledgement') ?>

<?php echo $this->element('feedback', array('id' => $tutorial['Tutorial']['id'], 'mode' => 'single_page')) ?>

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");
