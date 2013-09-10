<?php

$jquery_url = 'jquery-1.7.2.min.js';

if (!isset($only_urls)) {
  $only_urls = false;
}
// auto-include javascript files - from app/webroot/js/<controller>/<action|page>.js
if ($only_urls) { // this is for bits
  echo $jquery_url;
} else {
  echo $this->Html->script($jquery_url);
}