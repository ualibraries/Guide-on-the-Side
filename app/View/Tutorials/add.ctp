
<div class="tutorials form">
  <h1>Create Tutorial</h1>
<?php echo $this->Form->create('Tutorial');?>
	
	<?php
    echo $this->element('tutorial_title');

    echo $this->Form->input('user_url', array('label' => 'Published URL',
    'between' => '/tutorial/'));

    $this->QuickhelpTinyMce->editor('QuickHelp_simple');
    echo $this->Form->input('description', array('class' => 'mceQuickHelpSimple'));
  
    echo $this->element('tutorial_common');

    // give up on AJAX link checker for now. May need JSONP or something.
    echo "<fieldset>";
    echo "<legend>Starting location</legend>";
    echo $this->Form->input('url_title', array('label' => 'Page title: '/*, 'after' => "<span>invalid</span>"*/));
    echo $this->Form->input('url', array('label' => 'URL: '/*, 'after' => "<span>invalid</span>"*/));
    echo "</fieldset>";

    $before_link_toc = $this->Form->label('link_toc', 'Link table of contents?');
    echo $this->Form->input('link_toc', array('before' => $before_link_toc, 'label' => ''));

    echo $this->Form->hidden('tutorial_type_id', array('value' => TUTORIAL_TYPE_SIDEBYSIDE));
?>

<?php echo $this->Form->end(__('Create'));?>
</div>

<?php echo $this->Html->scriptBlock("cakephp.generate_slug = true;") ?>

