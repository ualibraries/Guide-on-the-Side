<?php if(!$is_logged_in):?>
    <a href="<?php echo $login_url?>"><img src="https://www.auth.cwl.ubc.ca/CWL_login_button.gif" width="76" height="25" alt="CWL Login" border="0" /></a>
<?php else: ?>
    <?php echo $html->link('Logout', Router::url(array('plugin' => 'guard', 'controller' => 'guard', 'action' => 'logout'), true))?>
<?php endif;?>
