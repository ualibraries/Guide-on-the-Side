<?php if ($popup): ?>
<h1 class="banner"><?php echo $title?></h1>
<h2>One quick thing...</h2>

    <p>The tutorial is going to pop up on the left, so you'll need to make some room by resizing your current window.</p>
    <h3>Step 1</h3>
    <p>Go to the upper right corner of your browser and resize this window.</p>
    <div><?php echo $this->Html->image("resize.jpg", array('alt' => 'Please resize your window', 'title' => 'Resize your window', 'id' => 'resize-screenshot')) ?></div>
    <h3>Step 2</h3>
    <p><a id="popup-link" class="simple-button" href="<?php echo $site_url ?>">Start tutorial</a></p>

   <?php
  echo $this->Html->scriptBlock(
    "cakephp.site_url = '{$site_url}';" .
    "cakephp.tutorial_url = '".$this->Html->url(array('action' => 'view_step_by_step_only', $id))."';"
  );
?>
<?php else: ?>

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

<?php echo $this->element('on_the_side', compact('id', 'tutorial_url')) ?>

<iframe id="site-frame" frameBorder="0" name="site-frame" src="<?php echo $site_url ?>"></iframe>

<div id="closed">
    Display Help
</div>
<?php endif ?>
