<?php
require_once('system/config.php');
require_once('system/data.php');
require_once('templates/session_handler.php');
?>

<nav>
  <div class="container">
  <div style="margin-left: 10vw; padding-top: 30px;">
    <a class="title" href="<?php echo $base_url; //?>">2-Step</a>
    <div id="mmp_forum_navbar">
      <div style="text-align: right; margin-right: 10vw;">
        <a style="margin: 30px;" href="<?php echo $base_url;?>index.php">Home</a>
        <a style="margin: 30px;" href="<?php echo $base_url ?>login.php"><?php echo $log_in_out_text;?></a>
<?php if(!$logged_in){ //Wenn man nicht eingeloggt ist, wird angezeigt, dass man sich registrieren kann?>
        <a style="margin: 30px;" href="<?php echo $base_url ?>register.php">Registrieren</a>
<?php } ?>
      </div>
    </div>
  </div>
</div>
</nav>
