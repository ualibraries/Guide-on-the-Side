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
        <?php echo __('Your account (%s) does not have permission to access this page.', $username) ?><br>
        <?php echo $this->Html->link(__('Request access'), $mailto); ?>
      </p>
      <p>
        <?php echo $this->Html->link(__('Log out'), Router::url('/logout', true))?>
      </p>
<?php else: ?>
    <?php echo $this->Html->link(__('Log out'), Router::url('/logout', true))?>
<?php endif;?>
