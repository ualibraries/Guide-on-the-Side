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

<div id="closed">
  Display Help
</div>
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
  <?php if ($link_toc && !empty($chapters)): ?>
  <div id="table-of-contents">
    <a href='#'>Contents</a>
    <ul>
      <?php
        foreach ($chapters as $index => $chapter) {
          echo "<li>";
          echo "<a href='#' id='step-{$index}' class='toc-entry'>";
          echo $chapter;
          echo "</a>";
          echo "</li>";
        }
        if ($has_quiz) {
          echo "<li>";
          echo "<a href='#' id='step-{$quiz_index}' class='toc-entry'>";
          echo "Quiz";
          echo "</a>";
          echo "</li>";
        }
      ?>
    </ul>
  </div>
  <?php endif ?>

  <div class="control-buttons">
    <?php
      echo $this->Html->link(
        $this->Html->image("expand-dark.png", array('alt' => 'Undock', 'title' => 'Undock', 'id' => 'undock-image')) .
        $this->Html->image("contract-dark.png", array('alt' => 'Dock', 'title' => 'Dock', 'id' => 'dock-image')),
        '#', array('id' => 'dock-link', 'escape' => false));
      echo $this->Html->link($this->Html->image("print-dark.png", array('alt' => 'Print', 'title' => 'Print')),
          array('action' => 'print_view', $id), array('id' => 'print-link', 'escape' => false, 'target' => '_blank'));
      echo $this->Html->link($this->Html->image("cross-dark.png", array('alt' => 'Close', 'title' => 'Close')),
          '#', array('id' => 'close-link', 'escape' => false));
    ?>
    </div>
  </div>
  <div class="tutorial-container clearfix">
    <h1 id="title"><a href='#' id="start-link" title="Go to the beginning"><?php echo $title ?></a></h1>
    <!-- IE requires frameBorder, and it apparently can't be applied with jQuery. -->
    <iframe id="tutorial-frame" name="tutorial-frame" frameBorder="0" scrolling="no" src="<?php echo $tutorial_url ?>"></iframe>
  </div><!-- end .tutorial-container -->
</div>
<iframe id="site-frame" frameBorder="0" name="site-frame" src="<?php echo $site_url ?>"></iframe>
<iframe id='feedback-frame' frameBorder="0" src='<?php echo $this->Html->url(array('action' => 'provide_feedback', $id)) ?>'></iframe>
