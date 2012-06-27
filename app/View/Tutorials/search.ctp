<h3><?php echo Configure::read('user_config.application_title') ?></h3>

<?php
$count = $this->Paginator->counter(array('format' => '%count%'));
if ($count > 0) {

  echo $this->element('paging');

} else {
  echo "<br />We didn't find any tutorials! Try removing some filters.";
}

echo "<ul id='tutorial-list'>";
foreach($tutorials as $tutorial) {

  if (isset($tutorial['SearchIndex'])) {
    $tutorial['Tutorial'] = $tutorial['SearchIndex'];
  } else {
    $tutorial['Tutorial']['tutorial_id'] = $tutorial['Tutorial']['id'];
  }
  $title = $tutorial['Tutorial']['title'];
  $description = $tutorial['Tutorial']['description'];
  $tags = $tutorial['Tutorial']['tags'];
//  }
  echo "<li>";
  echo "<h4 class='tutorial-title'>";
  echo $this->Html->link(
    $title,
    array('action' => 'view', $tutorial['Tutorial']['tutorial_id']),
    array('target' => '_blank', 'escape' => false, 'title' => 'Start tutorial')
  );
  echo ' ';
  $link_params = array_merge(array('action' => 'view_information', $tutorial['Tutorial']['tutorial_id']), $this->params['named']);
  echo $this->Html->link("more information", $link_params, array('class' => 'more-info-link', 'title' => 'More information'));
  echo "</h4>";
  echo "<p>";
  $word = '';
  if (isset($this->params['named']['term'])) {
    $word = isset($this->params['named']['term']);
  }
  if (!empty($search)) {
    if (!empty($description)) {
      echo $description;
    }
    if (!empty($tags)) {
      echo " Keywords: ";
      echo $tags;
    }
  }
  echo "</p>";

  echo "</li>";
}
echo "</ul>";

echo $this->element('paging');
echo "</div>";
echo "<br style='clear: both;' />";
?>