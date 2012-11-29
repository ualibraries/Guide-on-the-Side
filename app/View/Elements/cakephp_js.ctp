<?php
// this is used to populate a global cakephp object in js.
echo $this->Html->scriptBlock(
  'cakephp = new Object();' .
  'cakephp.webroot = "' . $this->Html->url('/') . '";' .
  'cakephp.jsroot = "' . $this->Html->url('/js/') . '";'
);