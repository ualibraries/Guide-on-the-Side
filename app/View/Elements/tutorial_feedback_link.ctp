<?php if (Configure::read('user_config.feedback_link.enabled')): ?>
<fieldset>
  <legend><?php echo __('Feedback link') ?></legend>
<?php
    $feedback_link_options = array('label' => __('Show feedback link'));
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
		    'label' => __('Custom text:'),
		    'size' => '40',
		    'after' =>
				 '<p class="field-description">' .
				 __('Optional. If left blank, the default text "%s" will appear.', Configure::read('user_config.feedback_link.default_text')) .
				 '</p>'
	    )
    );
?>
</fieldset>
<?php endif; ?>
