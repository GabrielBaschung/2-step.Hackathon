<?php
session_start();
require_once('system/config.php');
require_once('system/data.php');
require_once('templates/session_handler.php');

?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">

<!DOCTYPE html>
<html>
<head>

  <?php
    require_once('templates/page_head.php');
  ?>

</head>
<body>
  <?php require_once('templates/menu.php'); ?>


  <div>
    <div>
      <div id="Inhalt">
        <h1 style="text-align: center; font-size: 5rem; text-transform: uppercase; font-weight: 100;">Erklärung</h1>
        <p style="text-align: center;">Dies ist eine im Modul WebTech während eines Hackathons programmierte Website, welche sich auf das Verwenden einer 2-Schritte-Authentifizierung per E-Mail konzentriert.</p>
      </div>
    </div>
    <?php include_once('templates/msg.php') ?>
  </div>
</body>
</html>
