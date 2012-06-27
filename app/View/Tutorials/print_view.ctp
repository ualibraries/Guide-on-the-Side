  <h1 id="title"><?php echo $title ?></h1>
    <div class="items">
      <div class="step">
        <ul id="table-of-contents">
          <?php
            if (!empty($chapters)) {
              foreach ($chapters as $index => $chapter) {
                echo "<li>$chapter</li>";
              }
            }
          ?>
        </ul>
        <p>Please press <strong>NEXT</strong> to continue.</p>
       </div>
      <hr />
      <?php
        if (!empty($steps)) {
          foreach ($steps as $step) {
            echo "<div class='step'>";
            if (!empty($step['chapter']) || !empty($step['step'])) {
              echo "<h2>";
              if (!empty($step['chapter'])) {
                echo $step['chapter'];
              }
              if (!empty($step['chapter']) && !empty($step['step'])) {
                echo ': ';
              }
              if (!empty($step['step'])) {
                echo $step['step'];
              }
              echo "</h2>";
            }
            echo $step['content'];
            echo "</div>";
            echo "<hr />";
          }
        }
      ?>
      <div class="step">
        <p>You have completed this tutorial.</p>
        <?php
        if ($tutorial['Tutorial']['certificate'] && $tutorial['Tutorial']['certificate_email_self']) {
          echo "<p>To retrieve an email certificate that you completed this tutorial, please enter your email address.</p>";
          echo "<p>If you are doing this for a class, you may need to enter your instructor's email address below. Note" .
            " that you can enter multiple email addresses separated by commas.</p>";
        }

        if ($tutorial['Tutorial']['certificate']) {
          echo $this->Form->input('certificate_name', array('label' => '<strong>Please enter your name:</strong><br />',
              'value' => 'Your name', 'class' => 'certificate_name'));
          echo "<br />";
        }

        if ($tutorial['Tutorial']['certificate'] && $tutorial['Tutorial']['certificate_email_self']) {
          echo $this->Form->input('certificate_email', array('label' => 'Email address(es):<br />',
              'value' => 'Email addresses', 'class' => 'certificate_email'));
          echo "<br />";
        }

        if ($tutorial['Tutorial']['certificate']) {
          
          echo "<input value='{$tutorial['Tutorial']['id']}' name='tutorial_id' type='hidden' />";
          echo "<input value='Print / send email' type='submit' name='submit' />";
        } ?>
        <p>
        <?php
        echo $this->Html->link('What did you think of this tutorial?', array('action' => 'provide_feedback',
          $tutorial['Tutorial']['id']), array('id' => 'provide-feedback')) ?>
        </p>
      </div>
    </div>
    
    
    <div class="items">
      <?php
        if (!empty($quiz_steps)) {
          foreach ($quiz_steps as $step) {
            echo "<div class='step'>";
            if (!empty($step['chapter']) || !empty($step['step'])) {
              echo "<h2>";
              if (!empty($step['chapter'])) {
                echo $step['chapter'] . ': ';
              }
              if (!empty($step['step'])) {
                echo $step['step'];
              }
              echo "</h2>";
            }
            echo $step['content'];
            echo "</div>";
          }
        } ?>
        <div class="step">
        <?php
        if ($tutorial['FinalQuiz']['certificate'] && $tutorial['FinalQuiz']['certificate_email_self']) {
          echo "<p>To retrieve an email certificate that you completed this quiz, please enter your email address.</p>";
          echo "<p>If you are doing this for a class, you may need to enter your instructor's email address below. Note" .
            " that you can enter multiple email addresses separated by commas.</p>";
        }

        if ($tutorial['FinalQuiz']['certificate']) {
          echo $this->Form->input('certificate_name', array('label' => '<strong>Please enter your name:</strong><br />',
              'value' => 'Your name', 'class' => 'certificate_name'));
          echo "<br />";
        }

        if ($tutorial['FinalQuiz']['certificate'] && $tutorial['FinalQuiz']['certificate_email_self']) {
          echo $this->Form->input('certificate_email', array('label' => 'Email address(es):<br />',
              'value' => 'Email addresses', 'class' => 'certificate_email'));
          echo "<br />";
        }

        if ($tutorial['FinalQuiz']['certificate']) {
          echo "<input value='{$tutorial['FinalQuiz']['id']}' name='quiz_id' type='hidden' />";
          echo "<input value='Print / Send email' type='submit' name='submit' />";
        }
      ?>
      </div>
    </div>
  

<?php
  echo $this->Html->scriptBlock("cakephp.tutorial_id = {$tutorial['Tutorial']['id']};");