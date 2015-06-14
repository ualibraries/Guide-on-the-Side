<?php
  echo "<fieldset>";
  echo '<legend>' . __('Metadata') . '</legend>';

  $sailsLink = $this->Html->link(
		__('Project SAILS Skill Sets'),
		'https://www.projectsails.org/SkillSets',
		array('target' => '_blank')
	);

  echo $this->Form->input('LearningGoal',
    array(
      'label' => __('Learning Goals'),
      'multiple' => 'checkbox',
      'between' => $this->element(
        'field_directions', array(
          'text' => __('check all that apply; See the %s for help.', $sailsLink)
        )
      )
    )
  );
  echo $this->Form->input('Audience', array('label' => __('Audiences'), 'multiple' => 'checkbox',
      'between' => $this->element('field_directions', array('text' => 'check all that apply'))));
  echo $this->Form->input('tags', array('type' => 'textarea', 'label' => __('Keywords')));
  echo $this->Form->input('ResourceType', array('label' => __('Resource Types'), 'multiple' => 'checkbox',
      'between' => $this->element('field_directions', array('text' => __('check all that apply')))));
  echo $this->Form->input('Subject', array('label' => __('Subjects'), 'multiple' => 'checkbox',
      'between' => $this->element('field_directions', array('text' => __('check all that apply')))));
  echo $this->Form->input('licensing', 
      array(
        'label' => __('Creative Commons License: '),
  		'after' => $this->element(
  		  'field_directions', array( 
  		    'text' => $this->Html->link(__('BY-NC-SA'), 'http://creativecommons.org/licenses/by-nc-sa/3.0/', array('target' => '_blank'))
  		  )
  		)
      )
  );
  echo $this->Form->input('dot_ada_version', array('label' => __('Accessible version URL:')));
  echo "</fieldset>";