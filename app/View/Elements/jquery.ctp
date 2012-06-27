<?php

$jquery_url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js';

if (!isset($only_urls)) {
  $only_urls = false;
}
// auto-include javascript files - from app/webroot/js/<controller>/<action|page>.js
if ($only_urls) { // this is for bits
  echo $jquery_url;
} else {
  echo $this->Html->script($jquery_url);
}