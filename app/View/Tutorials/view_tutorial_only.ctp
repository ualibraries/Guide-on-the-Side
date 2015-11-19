  <div id="scrollable">
      <?php echo $this->element('tutorial_content') ?>
  </div>
  <div id="progress"></div>

<?php echo $this->element('acknowledgement') ?>

<?php
echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");
$i18n = array(
	'feedback_sent' => __('Your feedback has been sent.'),
	'check_answer' => __('Check answer'),
	'feedback_not_sent' => __('Your feedback was <strong>not</strong> sent. Please try again later.'),
	'results' => __('Results'),
	'print' => __('Print'),
	'close' => __('Close'),
);
echo $this->Html->scriptBlock('cakephp.i18n = ' . json_encode($i18n) . ';');