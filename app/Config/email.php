<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

    public $default = array();

    public function __construct() {
        $transport = Configure::read('user_config.email.transport');
        if (!$transport) {
            // SMTP will probably provide a better experience, but php mail() was the default previously.
            $transport = 'php';	
        }

        $from = Configure::read('user_config.email.send_from');
        $from = explode(',', $from);
        if (is_array($from)) {
            $from = $from[0];
        }

        $this->default = array(
            'from' => $from,
            'sender' => $from,
            'log' => Configure::read('user_config.email.log'),
        );

        if ('php' === $transport) {
            $this->default['transport'] = 'Mail';
        } elseif ('smtp' === $transport) {
            $this->default = array_merge($this->default, 
                array(
                    'transport' => 'Smtp',
                    'from' => $from,
                    'sender' => $from,
                    'port' => Configure::read('user_config.smtp.port'),
                    'username' => Configure::read('user_config.smtp.username'),
                    'password' => Configure::read('user_config.smtp.password'),
                    'timeout' => Configure::read('user_config.smtp.timeout'),
                )
            );
            $host = Configure::read('user_config.smtp.host');
            switch (Configure::read('user_config.smtp.encryption')) {
                case 'ssl':
                    $this->default['host'] = 'ssl://'.$host;
                    break;			   	
                case 'tls':
                    $this->default['host'] = $host;
                    $this->default['tls'] = true;
                    break;
                default:
                    $this->default['host'] = $host;
            }
        }
    }
}
