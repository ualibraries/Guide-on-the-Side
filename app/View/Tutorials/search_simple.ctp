<h3><?php echo Configure::read('user_config.application_title') ?></h3>

<?php
// TODO: array_merge($this->params['named'] ... instances need sanitization! Move to controller.
$selectedLearningGoals =
  isset($this->params['named']['learning_goal']) ? $this->params['named']['learning_goal'] : '';
$selectedResourceTypes =
  isset($this->params['named']['resource_type']) ? $this->params['named']['resource_type'] : '';

echo "<div class='facet-container'>";

echo "<h4>Filter</h4>";

echo "<div class='facet'>";
echo "<h5>Learning Goal</h5>";
$selectedLGArray = explode('|', $selectedLearningGoals);
if (!empty($selectedLearningGoals)) {
  $selectedLearningGoals .= '|';
}
$removableLearningGoals = array();
foreach ($learningGoals as $id => $learningGoal) {
  if (!in_array($id, $selectedLGArray)) {
    echo "<div class='available-facet'>";
    echo $this->Html->link($learningGoal,
      array_merge($this->params['named'], array('learning_goal' => $selectedLearningGoals . $id)));
    echo "</div>";
  } else {
    $removableLearningGoals[$id] = $learningGoal;
  }
}
if (!empty($removableLearningGoals)) {
  echo "<div class='current-facets'>";
  foreach ($removableLearningGoals as $id => $learningGoal) {
    echo "<div class='current-facet'>";
    echo $learningGoal;
    echo ' (';
    echo $this->Html->link('x', array_merge($this->params['named'], array('learning_goal' =>
        join('|', array_diff($selectedLGArray, array($id))))));
    echo ')';
    echo "</div>";
  }
  echo "</div>";
}
echo "</div>";

echo "<div class='facet'>";
echo "<h5>Resource Type</h5>";
$selectedRTArray = explode('|', $selectedResourceTypes);
if (!empty($selectedResourceTypes)) {
  $selectedResourceTypes .= '|';
}
$removableResourceTypes = array();
foreach ($resourceTypes as $id => $resourceType) {
  if (!in_array($id, $selectedRTArray)) {
    echo "<div class='available-facet'>";
    echo $this->Html->link($resourceType,
      array_merge($this->params['named'], array('resource_type' => $selectedResourceTypes . $id)));
    echo "</div>";
  } else {
    $removableResourceTypes[$id] = $resourceType;
  }
}
if (!empty($removableResourceTypes)) {
  echo "<div class='current-facets'>";
  foreach ($removableResourceTypes as $id => $resourceType) {
    echo "<div class='current-facet'>";
    echo $resourceType;
    echo ' (';
    echo $this->Html->link('x', array_merge($this->params['named'], array('resource_type' =>
        join('|', array_diff($selectedRTArray, array($id))))));
    echo ')';
    echo "</div>";
  }
  echo "</div>";
}
echo "</div>";

echo "</div>";

echo "<div id='search-container'>";
echo $this->Form->create(null, array(
    'url' => array_merge(array('action' => 'search'), $this->params['named'])
));
$value = '';
if (array_key_exists('term', $this->params['named'])) {
  $value = Sanitize::paranoid($this->params['named']['term'], array(' '));
}
echo $this->Form->input('term', array(
  'div' => false,
  'label' => false,
  'value' => $value));

//echo $this->Form->submit('Reset', array('type' => 'reset'));
echo $this->Form->submit('search.gif', array('div' => false, 'id' => 'search-image'));
echo $this->Form->end();

$count = $this->Paginator->counter(array('format' => '%count%'));
if ($count === 0) {
  $message = 'We have no tutorials matching your criteria.';
} elseif ($count === 1) {
  $message = 'We have 1 tutorial matching your criteria';
} else {
  $message = "We have $count tutorials matching your criteria";
}
echo $message;
//if (!empty($results_context['key'])) {
//  if ($results_context['key'] == 'term') {
//    echo " with the " . $results_context['key'] . ' "' . $results_context['name'] .
//      '" in the title, description, or keywords';
//  } else {
//    echo " with the " . $results_context['key'] . ' "' . $results_context['name'] . '"';
//  }
//}
echo '. ';
if (!empty($this->params['named'])) {
  echo $this->Html->link('Start over', array('action' => 'search'));
  echo '.';
}

echo "<ul id='tutorial-list'>";
foreach($tutorials as $tutorial) {
  if (array_key_exists('term', $results_context)) {
    $term_words = explode(' ', $results_context['term']['name']);
    $title = $tutorial['Tutorial']['title'];
    $description = $tutorial['Tutorial']['description'];
    $first = true;
    foreach ($term_words as $word) {
      $title = $this->Text->highlight($title, ' ' . $word . ' ');
      $description = $this->Text->highlight($description, ' ' . $word . ' ');
      if ($first) { // only excerpt around the first word. I'm not as cool as Google.
        $description = $this->Text->excerpt(
          $description,
          $word, 100, '&nbsp;... '
        );
      }
      $first = false;
    }
  } else {
    $title = $tutorial['Tutorial']['title'];
    $description = $tutorial['Tutorial']['short_description'];
  }
  echo "<li>";
  echo "<h4 class='tutorial-title'>";
  echo $this->Html->link(
    $title,
    array('action' => 'view', $tutorial['Tutorial']['id']),
    array('target' => '_blank', 'escape' => false)
  );
  echo "</h4>";
  echo "<p>";
  if (!empty($description)) {
    echo $description;
  }

  if (!empty($tutorial['Tag'])) {
    $relevant_tags = array();
    foreach($tutorial['Tag'] as $tag) {
      if (array_key_exists('term', $results_context) && (stripos($tag['name'], $results_context['term']['name']) !== FALSE)) {
        $relevant_tags[] = $this->Text->highlight($tag['name'], $results_context['name']);
      } elseif (array_key_exists('keyword', $results_context) && $results_context['keyword']['id'] == $tag['id']) {
        $relevant_tags[] = $this->Text->highlight($tag['name'], $tag['name']);
      }
    }
    if (count($relevant_tags) > 0) {
      echo "(Keywords) " . join(',', $relevant_tags);
    }    
  }
  $link_params = array_merge(array('action' => 'view_information', $tutorial['Tutorial']['id']), $this->params['named']);
  echo ' [' . $this->Html->link("more information", $link_params, array('class' => 'more-info-link')) .']';
  echo "</p>";

  echo $this->Html->link('Start tutorial &#0187;',
    array('action' => 'view', $tutorial['Tutorial']['id']),
    array('target' => '_blank', 'escape' => false)
  );
//  echo $this->Html->link(
//    '[information]',
//    array('action' => 'view_information', $tutorial['Tutorial']['id'])
//  );
  echo "</li>";
}
echo "</ul>";

echo $this->element('paging');
echo "</div>";
echo "<br style='clear: both;' />";
?>