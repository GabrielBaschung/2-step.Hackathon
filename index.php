<?php
// ------------------- CONTROLLER -------------------
session_start(); // Start einer neuen, oder Weiterführung einer bestehenden Session
// Alle Site-relevanten Werte (base-url, DB-Einstellungen) sind in config.php zentral gespeichert.
require_once('system/config.php');
// Alle DB-Abfragen sind in data.php zusammengefasst.
require_once('system/data.php');
// Die Verwaltung der Session wiederholt sich auf allen Seiten (ausser login und register)
//   und kann daher in einer zentalen Datei zusammengefasst werden.
require_once('templates/session_handler.php');

?>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;700&display=swap" rel="stylesheet">

<!DOCTYPE html>
<html>
<head>

  <?php
    require_once('templates/page_head.php'); // Inhalt des <head>-Elements aus externer PHP-Datei
  ?>

</head>
<body>
  <!-- Navigation -->
  <?php require_once('templates/menu.php'); // Navigation aus externer PHP-Datei ?>


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