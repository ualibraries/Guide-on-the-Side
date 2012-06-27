<?php

$config['Guard.AuthModule.Name'] = 'Shibboleth';    // Using Shibboleth module
//$config['Guard.AuthModule.Name'] = 'Default';     // Using default (build-in) module

$config['Guard.AuthModule.Shibboleth'] = array('sessionInitiatorURL' => 'https://%HOST%/Shibboleth.sso/Login',
                                               'logoutURL'           => 'https://%HOST%/Shibboleth.sso/Logout',
                                               'fieldMapping'        => array('eppn'        => 'username',
                                                                              'affiliation' => 'role',
                                                                             ),
                                               'mappingRules'        => array('eppn'        => array('/@ubc.ca/' => ''),
                                                                              'affiliation' => array('/staff@ubc.ca/' => 'admin'),
                                                                             ),
                                               'loginError'          => 'You have successfully logged through Shibboleth. But you do not have access this appliction.',
                                              ); 
