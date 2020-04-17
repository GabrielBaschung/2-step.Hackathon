<?php
$protocol = "http";
$domain_name = "https://gabriel.nickschnee.ch/";
$base_url = $domain_name."/";
if(!empty($project_folder)){
  $base_url .= $project_folder."/";
}

$page_head_title = "2-Schritte-Authentifizierung";

$db_host     = 'diamant.metanet.ch';     // Hostserver, auf dem die DB läuft.
                                // «localhost» bedeutet: die selbe Serveradresse, auf dem auch die Seiten gespeichert sind
$db_name     = 'gab_';   // Name der Datenbank (stimmt im Beispiel nur zufällig mit username überein)
$db_user     = 'gabriel_db';   // Name des DB-Users (stimmt im Beispiel nur zufällig mit Datenbankname überein)
$db_pass     = 'e0X1dr%1';  // Passwort des DB-Users

$db_charset  = 'utf8mb4';       // siehe https://www.hydroxi.de/utf8-vs-utf8mb4/
?>
