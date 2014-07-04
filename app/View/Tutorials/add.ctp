
<div class="tutorials form">
  <h1>Create Tutorial</h1>
<?php echo $this->Form->create('Tutorial');?>
	
	<?php
    echo $this->element('tutorial_title');

    echo $this->Form->input('user_url', array('label' => 'Published URL: ',
    'between' => '/tutorial/', 'size' => '40'));

    $this->QuickhelpTinyMce->editor('QuickHelp_simple');
    echo $this->Form->input('description', array('class' => 'mceQuickHelpSimple'));
  
    echo $this->element('tutorial_common');

    // give up on AJAX link checker for now. May need JSONP or something.
    echo "<fieldset>";
    echo "<legend>Starting location</legend>";
    echo $this->Form->input('url_title', array('label' => 'Page title: ', 'size' => '40'/*, 'after' => "<span>invalid</span>"*/));
    echo $this->Form->input('url', array('label' => 'URL: ', 'size' => '40'/*, 'after' => "<span>invalid</span>"*/));
    echo "</fieldset>";
    echo $this->Form->input('popup', array('label' => 'Popup mode', 'after' => '<p class="field-description">Use popup mode to work around sites that refuse to be embedded</p>'));
    echo $this->Form->input('link_toc', array('label' => 'Include table of contents'));

    echo $this->Form->hidden('tutorial_type_id', array('value' => TUTORIAL_TYPE_SIDEBYSIDE));
?>

<?php echo $this->Form->end(__('Create'));?>
</div>

<?php echo $this->Html->scriptBlock("cakephp.generate_slug = true;") ?>

