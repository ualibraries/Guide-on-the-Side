<?php
$user_config = Configure::read('user_config');

if ($user_config['authentication']['method'] == 'local' ||
    empty($user_config['authentication']['method']) ||
    !isset($user_config['authentication']['method']) ||
    !isset($user_config['authentication'])) {
  $config['Guard.AuthModule.Name'] = 'QuickhelpDefault';     // Using default (built-in) module
  $config['Guard.AuthModule.QuickhelpDefault'] =
    array(
      'loginError'          => "Something's wrong with your username and/or password. Please try again.",
      'loginRedirect'       => '/tutorials',
    );
} elseif ($user_config['authentication']['method'] == 'shibboleth') {
  $config['Guard.AuthModule.Name'] = 'QuickhelpShibboleth';    // Using Shibboleth module
  $config['Guard.AuthModule.QuickhelpShibboleth'] =
    array('sessionInitiatorURL' => $user_config['shibboleth']['login_url'],
      'logoutURL'           => $user_config['shibboleth']['logout_url'],
      'fieldMapping'        => array($user_config['shibboleth']['username_field']        => 'username'),
      'loginError'          => 'You have successfully logged in through Shibboleth, but you do not have a QuickHelp account.',
      'loginRedirect'       => '/tutorials',
    );
}