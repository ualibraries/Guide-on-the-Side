<?php if ($link_toc && !empty($chapters)): ?>
    <div id="table-of-contents">
        <h2 class="ir">Contents</h2>
        <ul>
            <?php
            foreach ($chapters as $index => $chapter) {
                echo "<li>";
                echo "<a href='#step-{$index}' id='toc-step-{$index}' class='toc-entry'>";
                echo $chapter;
                echo "</a>";
                echo "</li>";
            }
            if ($has_quiz) {
                echo "<li>";
                echo "<a href='#step-{$quiz_index}' id='toc-step-{$quiz_index}' class='toc-entry'>";
                echo "Quiz";
                echo "</a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
<?php endif ?>