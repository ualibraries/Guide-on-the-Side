<?php
if (!isset($only_urls)) {
  $only_urls = false;
}
// auto-include javascript files - from app/webroot/js/<controller>/<action|page>.js
if ($only_urls) { // this is for bits
  if ($this->params["controller"] == 'pages') { // for the pages controller
    $file = WWW_ROOT.DS."js".DS.$this->params["controller"].DS.$this->params["pass"][0].".js";
    $web_file = $this->Html->url('/js/') . $this->params["controller"].DS.$this->params["pass"][0] . '.js';
  } else { // for everything else
    $file = WWW_ROOT.DS."js".DS.$this->params["controller"].DS.$this->params["action"].".js";
    $web_file = $this->Html->url('/js/') . $this->params["controller"].DS.$this->params["action"] . '.js';
  }
//  if (is_file($file)){
    echo $web_file;
//  }
} else {
  if ($this->params["controller"] == 'pages') { // for the pages controller
    $file = WWW_ROOT.DS."js".DS.$this->params["controller"].DS.$this->params["pass"][0].".js";
    $web_file = $this->params["controller"].DS.$this->params["pass"][0];
    if (is_file($file)){
      echo $this->Html->script($web_file);
    }
  } else { // for everything else
    $file = WWW_ROOT.DS."js".DS.$this->params["controller"].DS.$this->params["action"].".js";
    $web_file = $this->params["controller"].DS.$this->params["action"];
    if (is_file($file)){
      echo $this->Html->script($web_file);
    }
  }
}