<?php if (Configure::read('user_config.feedback_link.enabled')): ?>
<fieldset>
  <legend>Feedback link</legend>
<?php
    $feedback_link_options = array('label' => 'Show feedback link');
    if (isset($checked) && $checked === true) {
        $feedback_link_options['checked'] = true;
    }
    echo $this->Form->input(
	    'show_feedback_link',
	    $feedback_link_options
    );
    echo $this->Form->input(
            'custom_feedback_link_text',
	    array(
		    'label' => 'Custom link text:',
		    'size' => '40',
		    'after' => '<p class="field-description">Optional. If left blank, the default text "'.Configure::read('user_config.feedback_link.default_text').'" will appear.</p>'
	    )
    );
?>
</fieldset>
<?php endif; ?>
