<?php if ($popup): ?>
<h3>One quick thing...</h3>
<p>This website can't be embedded in Guide on the Side, so we need to put your tutorial in a popup. You may want to arrange your windows side by side to easily reference the tutorial and the site. [image]</p>
<p><a id="popup-link" class="simple-button" href="<?php echo $site_url ?>">Launch <em><?php echo $title ?></em></a></p>

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
