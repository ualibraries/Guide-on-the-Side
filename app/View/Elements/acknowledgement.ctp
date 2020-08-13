<?php
	$gotsLink = $this->Html->link(
		__('Guide on the Side'),
		'//github.com/ualibraries/Guide-on-the-Side',
		array('target' => '_blank')
	);
	$uaLink = $this->Html->link(
		__('University of Arizona Libraries'),
		'http://www.library.arizona.edu',
		array('target' => '_blank')
	);
?>

<div class="acknowledgement">
	<?php echo __('Powered by %s from the %s', $gotsLink, $uaLink); ?>
</div>
