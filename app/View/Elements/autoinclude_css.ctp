<?php
if (!isset($only_urls)) {
  $only_urls = false;
}
// auto-include css files - from app/webroot/css/<controller>/<action|page>.css
if ($only_urls) { // this is for bits
  if ($this->params["controller"] == 'pages') { // for the pages controller
    $file = WWW_ROOT.DS."css".DS.$this->params["controller"].DS.$this->params["pass"][0].".css";
    $web_file = $this->Html->url('/css/') . $this->params["controller"].DS.$this->params["pass"][0] . '.css';
  } else { // for everything else
    $file = WWW_ROOT.DS."css".DS.$this->params["controller"].DS.$this->params["action"].".css";
    $web_file = $this->Html->url('/css/') . $this->params["controller"].DS.$this->params["action"] . '.css';
  }
  if (is_file($file)){
    echo $web_file;
  }
} else {
  if ($this->params["controller"] == 'pages') { // for the pages controller
    $file = WWW_ROOT.DS."css".DS.$this->params["controller"].DS.$this->params["pass"][0].".css";
    $web_file = $this->params["controller"].DS.$this->params["pass"][0];
  } else { // for everything else
    $file = WWW_ROOT.DS."css".DS.$this->params["controller"].DS.$this->params["action"].".css";
    $web_file = $this->params["controller"].DS.$this->params["action"];
  }
  if (is_file($file)){
    echo $this->Html->css($web_file);
  }
}