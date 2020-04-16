<?php
// ------------------- CONTROLLER -------------------
require_once('system/config.php');
// Alle DB-Abfragen sind in data.php zusammengefasst.
require_once('system/data.php');
// Die Verwaltung der Session wiederholt sich auf allen Seiten (ausser login und register)
//   und kann daher in einer zentalen Datei zusammengefasst werden.
require_once('templates/session_handler.php');
?>

<!-- einfaches Bootstrap-Menü -->
<nav>
  <div class="container">
  <div style="margin-left: 10vw; padding-top: 30px;">
    <a class="title" href="<?php echo $base_url; // $base_url kommt aus system/config.php ?>">2-Step</a>
    <div id="mmp_forum_navbar">
      <div style="text-align: right; margin-right: 10vw;">
        <a style="margin: 30px;" href="<?php echo $base_url; // $base_url kommt aus system/config.php ?>index.php">Home</a>
        <a style="margin: 30px;" href="<?php echo $base_url ?>login.php"><?php echo $log_in_out_text; // $log_in_out_text kommt aus templates/session_handler.php?></a>
<?php if(!$logged_in){ // Der folgende Menüunkt wird nur angezeigt, wenn der User NICHT eingeloggt ist.?>
        <a style="margin: 30px;" href="<?php echo $base_url ?>register.php">Registrieren</a>
<?php } ?>
      </div>
    </div>
  </div>
</div>
</nav>
