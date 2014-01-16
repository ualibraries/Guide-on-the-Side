<?php
echo $this->Html->scriptBlock(
  "cakephp.popup = {$popup};"
);
?>

<?php
$tutorial_url = $this->Html->url(
  array(
    'action' => 'view_tutorial_only',
    $id
  )
);

echo $this->element('on_the_side', compact('id', 'tutorial_url', 'popup'));

echo $this->Html->script('tutorials/view', array('inline' => false));
echo $this->Html->css('tutorials/view', array('inline' => false));