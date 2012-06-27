<?php
  echo $this->Form->create('Question');
  $this->QuickhelpTinyMce->editor('QuickHelp_simple');
  echo $this->Form->input('question',
    array(
      'type' => 'textarea',
      'between' => ': ',
      'class' => 'mceQuickHelpSimple'
    )
  );

  echo "<table id='answers'>";
  echo "<thead>";
  echo $this->Html->tableHeaders(array('', 'Answer text', 'Correct?', 'Response text'));
  echo "</thead>";
  echo "<tbody>";

  for ($i = 0; $i <= 1; $i++) {
    $answer_fields[$i] = array(
      "<div class='ui-icon ui-icon-arrowthick-2-n-s'>&nbsp;</div>",
      $this->Form->input("Answer.$i.answer", array('label' => false/*, 'class' => 'mceQuickHelpSimple'*/)),
      // value 0 is weird, I know. Because the radio is split, I had to trick Cake into not creating hidden radio
      //   fields. According to the cookbook, setting value does it.
      $this->Form->radio('correct_answer', array($i => ''),
        array('value' => 0, 'legend' => false)),
      $this->Form->input("Answer.$i.response", array('label' => false/*, 'class' => 'mceQuickHelpSimple'*/)),
      $this->Html->link('&nbsp;', '#', array('class' => 'ui-icon ui-icon-circle-close remove-answer')),
      $this->Form->hidden("Answer.$i.order", array('label' => false, 'value' => $i)),
    );
  }

  echo $this->Html->tableCells($answer_fields);

  echo "</tbody>";
  echo "</table>";

  echo $this->Html->link('Add', '#', array('id' => 'add-answers', 'class' => 'ui-icon ui-icon-circle-plus'));

  echo $this->element('tinymce_dialog_buttons');
  echo $this->Form->end();
?>