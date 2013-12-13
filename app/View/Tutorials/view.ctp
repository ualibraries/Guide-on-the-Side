<?php if ($popup): ?>
Sorry about that. This site will not allow us to embed it, so we'll need to open your tutorial in a new window.
You literally have to <a id="popup-link" href="<?php echo $site_url ?>">click here</a>, but we shouldn't say that.
Do we let tutorial authors control this page? An image showing the user how to set up their windows might be nice.
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