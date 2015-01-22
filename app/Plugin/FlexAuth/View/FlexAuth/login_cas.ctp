<?php echo $this->Session->flash('auth') ?>
<?php if(!$is_logged_in):?>
    <?php
      $username = $this->Session->read('phpCAS.user');
      $contact_email = Configure::read('user_config.email.send_all_feedback_to');
      $application_title = Configure::read('user_config.application_title');
      $subject =  $application_title. " access request for " . $username;
      $body = "I am requesting access to ".$application_title;
      $body .= "\n\nUsername: ".$username;
      $body .= "\n\nRequest sent from: ".Router::url(null, true);
      $mailto = "mailto:".rawurlencode($contact_email);
      $mailto .= "?subject=".rawurlencode($subject);
      $mailto .= "&body=".rawurlencode($body);
      ?>
      <p>
        Your account (<?php echo $username; ?>) does not have permission to access this page.<br>
        <?php echo $this->Html->link("Request access", $mailto); ?>
      </p>
      <p>
        <?php echo $this->Html->link('Log out', Router::url('/logout', true))?>
      </p>
<?php else: ?>
    <?php echo $this->Html->link('Log out', Router::url('/logout', true))?>
<?php endif;?>
