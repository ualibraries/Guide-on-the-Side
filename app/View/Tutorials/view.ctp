<?php if ($popup): ?>
<?php echo $this->Html->css('resize_elements'); ?>

<div class="aria-dialog visuallyhidden" role="dialog">
    <?php
        $single_page_tutorial_url = $this->Html->url(
            array(
            'action' => 'view_single_page',
            $id,
            $revision_id
            )
        );
    ?>
    <a href="<?php echo $single_page_tutorial_url; ?>"><?php echo __('Start tutorial') ?></a>
</div>

<div class="resize_elements" aria-hidden="true">
    <div class="overlay"></div>
    <div class="resize_video">
        <div class="modal-gif-bg">
            <img class="modal-gif" src="<?php echo $this->webroot; ?>img/resize.gif?cache=<?php echo rand(); ?>" />
        </div>
        <h2 class="gif-overlay">Set up your tutorial to look like this</h2>
        <div class="got-it-link-wrapper">
            <a class="got-it-link simple-button modal-button" href="#">Click here to start</a>
        </div>
    </div>
    <div class="resize_arrow">
        <h2>Shrink your browser window until it takes up about half of your screen &#9658;</h2>
    </div>
    <div class="move_arrow">
        <h2>Awesome! Now drag your browser window to the right. &#9658;</h2>
    </div>
    <div class="done_prompt">
        <h2>Perfect! Now you're ready to go.</h2>
        <a class="popup-link simple-button" href="<?php echo $site_url ?>"><?php echo __('Start tutorial') ?></a>
    </div>
</div>
<h1 class="banner"><?php echo $title?></h1>
<h2><?php echo __('Click to continue to your tutorial') ?></h2>
<p><a class="popup-link simple-button" aria-hidden="true" href="<?php echo $site_url ?>"><?php echo __('Start tutorial') ?></a></p>
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
 <?php echo __('You are viewing an older version of this tutorial. You may:') ?>
 <ul>
   <li><?php echo $this->Html->link(__('View the current version'), array($id)) ?></li>
   <li><?php echo $this->Html->link(__('Make this version the current one'),
     array('action' => 'restore_revision', $id, $revision_id)) ?></li>
   <li><?php echo $this->Html->link(__('Get rid of this message'), '#', array('id' => 'close_revision_info')) ?></li>
 </ul>

</div>
<?php } ?>

<?php echo $this->element('on_the_side', compact('id', 'tutorial_url')) ?>

<iframe id="site-frame" frameBorder="0" name="site-frame" src="<?php echo $site_url ?>"></iframe>

<div id="closed">
    <?php echo __('Display Help') ?>
</div>
<?php endif ?>
