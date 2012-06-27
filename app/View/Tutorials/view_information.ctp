
<?php
  $url = '';
  if ($tutorial['TutorialType']['name'] == 'side-by-side') {
    $url = $this->Html->url(array('action' => 'view', $tutorial['Tutorial']['id']), true);
    $last_modified = $tutorial['Tutorial']['modified'];
  } elseif ($tutorial['TutorialType']['name'] == 'external') {
    $url = $tutorial['Tutorial']['external_identifier'];
    $last_modified = $tutorial['Tutorial']['dot_last_revision_timestamp'];
  }
  // side-by-side tutorials may have been created before their created date in QuickHelp
  if (!empty($tutorial['Tutorial']['dot_creation_timestamp'])
          && $tutorial['Tutorial']['dot_creation_timestamp'] !== '0000-00-00 00:00:00') {
    $created = $tutorial['Tutorial']['dot_creation_timestamp'];
  } else {
    if ($tutorial['TutorialType']['name'] == 'side-by-side') {
      $created = $tutorial['Tutorial']['created'];
    } else {
      $created = '0000-00-00 00:00:00';
    }
  }
  // format string for Set::format()
  $resourceTypeFormat = $this->Html->link('{0}', '/tutorials/search/ResourceType:{1}');

?>
<?php $link_params = array_merge(array('action' => 'search'), $this->params['named']) ?>
<p><?php 
  if (empty($this->params['named'])) {
    echo $this->Html->link('<< Return to tutorial list', $link_params);
  } else {
    echo $this->Html->link('Return to search results << ', $link_params);     
  }
?></p>

<h4 class="tutorial-title">
  <?php echo $tutorial['Tutorial']['title'] ?>
</h4>
<?php if (isset($tutorial['Tutorial']['description']) && !empty($tutorial['Tutorial']['description'])):
  echo '<p>' . $tutorial['Tutorial']['description'] . '</p>';
endif ?>
<?php if (isset($url) && !empty($url)): ?>
<div class='field-container'>
  <div class="field-name">URL: </div>
  <div class="field-value"><?php echo $this->Html->link($url) ?></div>
</div>
<?php endif; ?>
<?php if (isset($tutorial['Tutorial']['format']) && !empty($tutorial['Tutorial']['format'])): ?>
<div class='field-container'>
  <div class="field-name">Format: </div>
  <div class="field-value"><?php echo $tutorial['Tutorial']['format'] ?></div>
</div>
<?php endif ?>
<?php if (isset($tutorial['Tutorial']['author']) && !empty($tutorial['Tutorial']['author'])): ?>
<div class='field-container'>
  <div class="field-name">Author: </div>
  <div class="field-value"><?php echo $tutorial['Tutorial']['author'] ?></div>
</div>
<?php endif ?>
<?php if (isset($tutorial['Tutorial']['contact_name']) && !empty($tutorial['Tutorial']['contact_name'])): ?>
<div class='field-container'>
  <div class="field-name">Contact Person: </div>
  <div class="field-value">
    <?php
    if (isset($tutorial['Tutorial']['contact_email']) && !empty($tutorial['Tutorial']['contact_email'])):
      echo $this->Html->link($tutorial['Tutorial']['contact_name'], "mailto:{$tutorial['Tutorial']['contact_email']}");
    else:
      echo $tutorial['Tutorial']['contact_name'];
    endif;
    ?>
  </div>
</div>
<?php endif ?>
<?php if (!empty($tutorial['Subject'])): ?>
<div class='field-container'>
  <div class="field-name">Subjects: </div>
  <div class="field-value">
    <?php
    echo implode(', ', Set::format($tutorial, '{0}', array('Subject.{n}.name', 'Subject.{n}.id')));
    ?>
  </div>
</div>
<?php endif ?>
<?php if (!empty($tutorial['Tag'])):
  $tagFormat = $this->Html->link('{0}', '/tutorials/search/keyword:{1}'); ?>

  <div class='field-container'>
    <div class="field-name">Keywords:</div>
    <div class="field-value">
      <?php
      echo join(', ', Set::format($tutorial, $tagFormat, array('Tag.{n}.name', 'Tag.{n}.id')));
      ?>
    </div>
  </div>
<?php endif ?>
<?php if (!empty($tutorial['LearningGoal'])):
  $learningGoalFormat = $this->Html->link('{0}', '/tutorials/search/learning_goal:{1}');?>

  <div class='field-container'>
    <div class="field-name">Learning Goals:</div>
    <div class="field-value">
      <?php
      echo join(', ', Set::format($tutorial, $learningGoalFormat, array('LearningGoal.{n}.name', 'LearningGoal.{n}.id')));
      ?>
    </div>
  </div>
<?php endif ?>
<?php if (!empty($tutorial['ResourceType'])):
  $resourceTypeFormat = $this->Html->link('{0}', '/tutorials/search/resource_type:{1}');?>

  <div class='field-container'>
    <div class="field-name">Resource Types:</div>
    <div class="field-value">
      <?php
      echo join(', ', Set::format($tutorial, $resourceTypeFormat, array('ResourceType.{n}.name', 'ResourceType.{n}.id')));
      ?>
    </div>
  </div>
<?php endif ?>

<?php if (!empty($tutorial['Tutorial']['licensing'])): ?>
  <div class='field-container'>
    <div class="field-name"><?php echo $this->Html->link('Creative Commons License',
       'http://creativecommons.org/licenses/', array('target' => '_blank')) ?>:</div>
    <div class="field-value">
      <?php
      echo $tutorial['Tutorial']['licensing'];
      ?>
    </div>
  </div>
<?php endif ?>

<?php if ($created != '0000-00-00 00:00:00'): ?>
  <div class='field-container'>
    <div class="field-name">Created: </div>
    <div class="field-value"><?php echo $this->Time->timeAgoInWords($created, array('format' => 'F j, Y')) ?></div>
  </div>
<?php endif ?>

<?php if ($last_modified != '0000-00-00 00:00:00'): ?>
  <div class='field-container'>
    <div class="field-name">Last Revised: </div>
    <div class="field-value">
      <?php echo $this->Time->timeAgoInWords($last_modified, array('format' => 'F j, Y')) ?>
    </div>
  </div>
<?php endif ?>

<div class="start-tutorial">
  <?php echo $this->Html->link('Start tutorial >> ', $url) ?>
</div>

<?php if (isset($tutorial['Tutorial']['accessible_version_url']) &&
   !empty($tutorial['Tutorial']['accessible_version_url'])):
     echo "<div class='start-tutorial'>";
     echo $this->Html->link('Start accessible version >> ', $tutorial['Tutorial']['accessible_version_url']);
     echo "</div>";
endif ?>