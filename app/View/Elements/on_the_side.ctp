<div id="draggable" class="docked">
    <div id="navbar" class="clearfix">
        <nav class="mode-switch">
            <ul>
                <li class="active">Step-by-step</li>
                <li>
                    <?php
                    echo $this->Html->link(
                        __('Single-page view'),
                        array(
                            'action' => 'view_single_page',
                            $id,
                            'popup' => isset($popup) ? $popup : '0',
                        ),
                        array('title' => __('All steps on one page'))
                    );
                    ?>
                </li>
            </ul>
        </nav>
        <?php if (!$popup): ?>
        <div class="control-buttons">
            <?php
            echo $this->Html->link(
                $this->Html->image("expand-dark.png", array('alt' => __('Undock'), 'title' => __('Undock'), 'id' => 'undock-image')) .
                $this->Html->image("contract-dark.png", array('alt' => __('Dock'), 'title' => __('Dock'), 'id' => 'dock-image')),
                '#', array('id' => 'dock-link', 'escape' => false));
            echo $this->Html->link($this->Html->image("cross-dark.png", array('alt' => __('Close'), 'title' => __('Close'))),
                '#', array('id' => 'close-link', 'escape' => false));
            ?>
        </div>
        <?php endif ?>
    </div>
    <div class="tutorial-container clearfix <?php if ($this->element('table_of_contents')) { echo "with-toc"; } ?>">
        <h1 id="title"><a href='#' id="start-link" title="<?php echo __('Go to the beginning') ?>"><?php echo $title ?></a></h1>
        <?php echo $this->element('table_of_contents') ?>
        <!-- IE requires frameBorder, and it apparently can't be applied with jQuery. -->
        <iframe id="tutorial-frame" name="tutorial-frame" frameBorder="0" scrolling="no" src="<?php echo $tutorial_url ?>"></iframe>
    </div><!-- end .tutorial-container -->
</div>

<?php echo $this->element('feedback', array('mode' => null)) ?>