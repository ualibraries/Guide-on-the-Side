<?php

class System extends AppModel {
  var $useTable = 'system';

  var $validate = array(
    'name' => 'isUnique',
  );
}