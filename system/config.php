<?php
$protocol = "http";
$domain_name = "https://587114-10.web1.fh-htwchur.ch/";
$base_url = $domain_name."/";
if(!empty($project_folder)){
  $base_url .= $project_folder."/";
}

$page_head_title = "2-Schritte-Authentifizierung";

$db_host     = 'localhost';     // Hostserver, auf dem die DB läuft.
                                // «localhost» bedeutet: die selbe Serveradresse, auf dem auch die Seiten gespeichert sind
$db_name     = '587114_10_1';   // Name der Datenbank (stimmt im Beispiel nur zufällig mit username überein)
$db_user     = '587114_10_1';   // Name des DB-Users (stimmt im Beispiel nur zufällig mit Datenbankname überein)
$db_pass     = 'aDIgFKlArR=1';  // Passwort des DB-Users

$db_charset  = 'utf8mb4';       // siehe https://www.hydroxi.de/utf8-vs-utf8mb4/
?>
