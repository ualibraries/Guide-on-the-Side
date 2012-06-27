<?php
  echo "<fieldset>";
  echo '<legend>Metadata</legend>';

  echo $this->Form->input('LearningGoal',
    array(
      'label' => 'Learning Goals',
      'multiple' => 'checkbox',
      'between' => $this->element(
        'field_directions', array(
          'text' => 'check all that apply; See the ' .
            $this->Html->link(
              'Project SAILS Skill Sets',
              'https://www.projectsails.org/SkillSets',
              array('target' => '_blank')
            ) . ' for help.'
        )
      )
    )
  );
  echo $this->Form->input('Audience', array('label' => 'Audiences', 'multiple' => 'checkbox',
      'between' => $this->element('field_directions', array('text' => 'check all that apply'))));
  echo $this->Form->input('tags', array('type' => 'textarea', 'label' => 'Keywords'));
  echo $this->Form->input('ResourceType', array('label' => 'Resource Types', 'multiple' => 'checkbox',
      'between' => $this->element('field_directions', array('text' => 'check all that apply'))));
  echo $this->Form->input('Subject', array('label' => 'Subjects', 'multiple' => 'checkbox',
      'between' => $this->element('field_directions', array('text' => 'check all that apply'))));
  echo $this->Form->input('licensing', 
    array(
      'label' => 'Creative Commons License (' .
         $this->Html->link('BY-NC-SA', 'http://creativecommons.org/licenses/by-nc-sa/3.0/', array('target' => '_blank'))
          . ')',
    )
  );
  $before_ada = $this->Form->label('dot_ada_version', 'Accessible version URL');

  echo $this->Form->input('dot_ada_version', array('before' => $before_ada, 'label' => false));
  echo "</fieldset>";