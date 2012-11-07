<?php

App::uses('FormAuthenticate', 'Controller/Component/Auth');

// Rename FormAuthenticate
class LocalAuthenticate extends FormAuthenticate {
    
    // Determine how this Authenticate object knows if it should try to log in.
    public function isLoginDataAvailable(CakeRequest $request) {
        return $request->is('post');
    }
}