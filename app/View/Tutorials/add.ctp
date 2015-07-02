
<div class="tutorials form">
  <h1><?php echo __('Create Tutorial') ?></h1>
<?php echo $this->Form->create('Tutorial');?>
	
	<?php
    echo $this->element('tutorial_title');

    echo $this->Form->input('user_url', array('label' => __('Published URL: '),
    'between' => '/tutorial/', 'size' => '40'));

    $this->QuickhelpTinyMce->editor('QuickHelp_simple');
    echo $this->Form->input('description', array('class' => 'mceQuickHelpSimple'));
  
    echo $this->element('tutorial_common');

    // give up on AJAX link checker for now. May need JSONP or something.
    echo "<fieldset>";
    echo "<legend>" . __('Starting location') . "</legend>";
    echo $this->Form->input('url_title', array('label' => __('Page title: '), 'size' => '40'/*, 'after' => "<span>invalid</span>"*/));
    echo $this->Form->input('url', array('label' => __('URL: '), 'size' => '40'/*, 'after' => "<span>invalid</span>"*/));
    echo "</fieldset>";
    echo $this->Form->input('popup', array(
		'label' => __('Popup mode'),
		'after' => '<p class="field-description">' . __('Use popup mode when your right frame starting URL is not working') . '</p>')
	 );
    echo $this->Form->input(
	    'show_chapter_progress',
	    array(
		    'label' => __('Show Chapter Progress'),
		    'checked'=>true,
		    'after' => '<p class="field-description">' . __('Show how far a user is in a chapter (e.g. "2 of 3")') . '</p>'
	    )
    );
    echo $this->Form->input('link_toc', array('label' => __('Include table of contents')));
    echo $this->element('tutorial_feedback_link', array("checked"=>true));
    echo $this->Form->hidden('tutorial_type_id', array('value' => TUTORIAL_TYPE_SIDEBYSIDE));
?>
</fieldset>

<?php echo $this->Form->end(__('Create'));?>
</div>

<?php echo $this->Html->scriptBlock("cakephp.generate_slug = true;") ?>

