<?php
  $tutorial_url = $this->Html->url(
    array(
      'action' => 'view_tutorial_only',
      $id,
      $revision_id
    )
  );

  echo $this->Html->meta('description', $meta_description, array('inline' => false));
  
  ?>

<?php
if ($revision_id) { ?>
<div id="revision-info">
 You are viewing an older version of this tutorial. You may:
 <ul>
   <li><?php echo $this->Html->link('View the current version', array($id)) ?></li>
   <li><?php echo $this->Html->link('Make this version the current one',
     array('action' => 'restore_revision', $id, $revision_id)) ?></li>
   <li><?php echo $this->Html->link('Get rid of this message', '#', array('id' => 'close_revision_info')) ?></li>
 </ul>

</div>
<?php } ?>
<div id="draggable" class="docked">
  <div id="navbar" class="clearfix">
    <nav class="mode-switch">
      <ul>
        <li class="active">Step-by-step</li>
        <li><?php echo $this->Html->link('Single-page view', array('action' => 'view_single_page', $id), array('title' => 'All steps on one page'))?></li>
      </ul>
    </nav>

    <div class="control-buttons">
    <?php
      echo $this->Html->link(
        $this->Html->image("expand-dark.png", array('alt' => 'Undock', 'title' => 'Undock', 'id' => 'undock-image')) .
        $this->Html->image("contract-dark.png", array('alt' => 'Dock', 'title' => 'Dock', 'id' => 'dock-image')),
        '#', array('id' => 'dock-link', 'escape' => false));
      echo $this->Html->link($this->Html->image("cross-dark.png", array('alt' => 'Close', 'title' => 'Close')),
          '#', array('id' => 'close-link', 'escape' => false));
    ?>
    </div>
  </div>
  <div class="tutorial-container clearfix <?php if ($this->element('table_of_contents')) { echo "with-toc"; } ?>">
    <h1 id="title"><a href='#' id="start-link" title="Go to the beginning"><?php echo $title ?></a></h1>
    <?php echo $this->element('table_of_contents') ?>
    <!-- IE requires frameBorder, and it apparently can't be applied with jQuery. -->
    <iframe id="tutorial-frame" name="tutorial-frame" frameBorder="0" scrolling="no" src="<?php echo $tutorial_url ?>"></iframe>
  </div><!-- end .tutorial-container -->
</div>
<iframe id="site-frame" frameBorder="0" name="site-frame" src="<?php echo $site_url ?>"></iframe>

<?php echo $this->element('feedback', array('mode' => null)) ?>

<div id="closed">
    Display Help
</div>