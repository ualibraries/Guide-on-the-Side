<?php

class BackreferencesController extends AppController {

    var $uses = array();

    function add() {
        $this->layout = 'tinymce_dialog';
        $this->set('title_for_layout', 'Backreference');
    }


    function beforeFilter() {
        $this->helpers[] = 'QuickhelpTinyMce';
    }

}

?>