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
        'label' => 'Creative Commons License: ', 
  		'after' => $this->element(
  		  'field_directions', array( 
  		    'text' => $this->Html->link('BY-NC-SA', 'http://creativecommons.org/licenses/by-nc-sa/3.0/', array('target' => '_blank'))
  		  )
  		)
      )
  );
  echo $this->Form->input('dot_ada_version', array('label' => 'Accessible version URL:'));
  echo "</fieldset>";