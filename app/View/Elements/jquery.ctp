<?php

$jquery_url = 'jquery-1.7.2.min.js';

if (!isset($only_urls)) {
  $only_urls = false;
}

if ($only_urls) { // this is for bits; UAL only
  echo $jquery_url;
} else {
  // for non-bits (which is UAL only) installs, try to get CDN benefits.
  echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
  $fallback = rawurlencode($this->Html->script($jquery_url));
  echo <<<JQUERYFALLBACK
<script type="text/javascript">
if (typeof jQuery == 'undefined')
{
  document.write(unescape('$fallback'));
}
</script>
JQUERYFALLBACK;

  echo $this->Html->script($jquery_url);
}