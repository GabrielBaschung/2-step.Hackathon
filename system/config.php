<?php
// Definition der Website-URL
// Wird in bei allen Verlinkungen innerhalb der Website gebraucht.
// Die Definition setzt sich zusammen aus dem
// - Protokoll: http oder https
$protocol = "http";
// - Domainnamen, z. B: localhost:8080, localhost, 539007-24.web1.fh-htwchur.ch, google.com
$domain_name = "https://587114-10.web1.fh-htwchur.ch/";
// - und optional einem Ordnernamen, wenn das Projekt nicht direkt im Stammverzeichnis (web auf dem Ausbildungsserver, htdocs auf XAMPP) lebt
// $project_folder = "Hackathon";

$base_url = $domain_name."/";
if(!empty($project_folder)){
  $base_url .= $project_folder."/";
}

//Der Seitentitel, der in allen Unterseiten mit config.php eingebunden wird
$page_head_title = "2-Schritte-Authentifizierung";

// Definition der Verbindungsparameter für die Datenbankname
// Wird in data.php gebraucht
$db_host     = 'localhost';     // Hostserver, auf dem die DB läuft.
                                // «localhost» bedeutet: die selbe Serveradresse, auf dem auch die Seiten gespeichert sind
$db_name     = '587114_10_1';   // Name der Datenbank (stimmt im Beispiel nur zufällig mit username überein)
$db_user     = '587114_10_1';   // Name des DB-Users (stimmt im Beispiel nur zufällig mit Datenbankname überein)
$db_pass     = 'aDIgFKlArR=1';  // Passwort des DB-Users

$db_charset  = 'utf8mb4';       // siehe https://www.hydroxi.de/utf8-vs-utf8mb4/
?>
