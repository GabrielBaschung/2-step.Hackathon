<?php

function get_db_connection(){
	global $db_host, $db_name, $db_user, $db_pass, $db_charset;

	$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
	$options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false
	];

	try {
		$db = new PDO($dsn, $db_user, $db_pass, $options);
	} catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}
	return $db;
}


function login($email, $password){
	$db = get_db_connection();
	$sql = "SELECT * FROM Benutzerdaten WHERE email='$email' AND password='$password';";
	$result = $db->query($sql);
	if($result->rowCount() == 1){
		$row = $result->fetch();
		return $row;
	}else{
		return false;
	}
}


// Registrieren
/* Neue Benutzerdaten werden in die User Datenbank gespeichert */
function register($email, $password, $firstname, $lastname){
	$db = get_db_connection();  // DB-Verbindung herstellen (s. login())
	// Das PHP-Datenbank-Interface PDO stellt sog. prpared statements zur Verfügung.
	// siehe: https://www.php-einfach.de/mysql-tutorial/crashkurs-pdo/
	// Dabei stehen im SQL-Statement Fragezeichen als Platzhalter für die zu übertragenden Werte.
	$sql = "INSERT INTO Benutzerdaten (email, password, firstname, lastname) VALUES (?, ?, ?, ?);";
	// Im folgenden Schritt wird das Statement mit $db->prepare($sql) vorbereitet und in einer Variablen gespeichert.
	$stmt = $db->prepare($sql);
	// Mit der execute()-Methode wird die Abfrage ausgeführt.
	// Dabei müssen die einzusetzenden Werte als Array übermittelt werden.
	// Innerhalb des Arrays müssen die Werte die richtige Reihenfolge haben.
	// Da es sich bei dem Statement um einen INSERT-Befehl handelt,
	//   wird als Ergebnis true fur eine erfolgreiche Speicherung
	//   und false für eine misslungene Speicherung zurückgegeben
	return $stmt->execute(array($email, $password, $firstname, $lastname));
}
/************************ SELECT BEFEHLE ************************/
// User Daten auslesen
/* Die Daten des eingeloggten Benutzers werden via User_Id ausgelesen */
// Die Funktion verläuft in einer etwas verkürzten Version analog zur login()-Funktion
function get_user_by_id($id){
	$db = get_db_connection();
	$sql = "SELECT * FROM Benutzerdaten WHERE id = $id;";
	$result = $db->query($sql);
	return $result->fetch();
}


function does_email_exist($email){
	$db = get_db_connection(); // DB-Verbindung herstellen (s. login())
	$sql = "SELECT * FROM Benutzerdaten where email = '$email';";
	$result = $db->query($sql);
	if($result->rowCount() > 0){
		return true;
	};
	return false;
}
