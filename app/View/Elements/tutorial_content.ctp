<form class="items" name="email_and_print" id="email_and_print">
    <?php
    if (!empty($steps)) {
        foreach ($steps as $index => $step) {
            echo "<div class='step' id='step-$index'>";
            if (!empty($step['chapter'])) {
                if (!empty($step['chapter'])) {
                    echo "<h2>" . $step['chapter'] . "</h2>";
                    if ($step['total_steps_in_chapter'] > 1) {
                        echo "<span class='step-number'>" . $step['step_num_within_chapter'] . ' of ' . $step['total_steps_in_chapter'] . "</span>";
                    }
                }
            }
            echo $step['content'];
            echo "</div>";
        }
    }
    ?>
    <?php
    if (!empty($quiz_steps)) {
        foreach ($quiz_steps as $key => $step) {
            $index = $key + count($steps);
            echo "<div class='step no-feedback' id='step-$index'>";
            echo "<h2>";
            echo "Quiz";
            if (!empty($step['chapter']) || !empty($step['step'])) {

                if (!empty($step['chapter'])) {
                    echo ": " . $step['chapter'] . ': ';
                }
                if (!empty($step['step'])) {
                    echo  ': ' . $step['step'];
                }

            }
            echo "</h2>";
            echo $step['content'];
            echo "</div>";
        }
    } ?>
    <div class="step">
        <?php
        if (($tutorial['Tutorial']['certificate'] || $tutorial['FinalQuiz']['certificate'])
            && $tutorial['Tutorial']['certificate_email_self']) {
            echo "<p>Please enter your name and email address to retrieve a copy of your completed quiz.</p>";
        }

        if ($tutorial['Tutorial']['certificate'] || $tutorial['FinalQuiz']['certificate']) {
            echo $this->Form->input('certificate_name', array('label' => 'Your name:',
                'placeholder' => 'Your name', 'class' => 'certificate_name'));
        }

        if (($tutorial['Tutorial']['certificate'] || $tutorial['FinalQuiz']['certificate'])
            && $tutorial['Tutorial']['certificate_email_self']) {
            echo $this->Form->input('certificate_email', array('label' => 'Email address(es):',
                'placeholder' => 'Email addresses', 'class' => 'certificate_email'));
            echo "<p class='field-description'>You can enter multiple email addresses separated by commas. If you are doing this for a class, you may need to enter your instructor's email address also.</p>";
        }

        if ($tutorial['Tutorial']['certificate'] || $tutorial['FinalQuiz']['certificate']) {
            echo "<input value='{$tutorial['Tutorial']['id']}' name='tutorial_id' type='hidden' />";
            echo "<input value='{$tutorial['FinalQuiz']['id']}' name='quiz_id' type='hidden' />";
            echo "<input value='Print / Send email' type='submit' name='submit' />";
        }

        echo "<p>";
        echo $this->Html->link('What did you think of this tutorial?', array('action' => 'provide_feedback',
            $tutorial['Tutorial']['id']), array('id' => 'provide-feedback'));
        echo "</p>";
        ?>
    </div>
</form>