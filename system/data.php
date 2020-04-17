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

function edit($email, $password, $firstname, $lastname){
	$db = get_db_connection();
	$sql = "UPDATE Benutzerdaten SET email=?, password=?, firstname=?, lastname=? WHERE id=$id;";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($email, $password, $firstname, $lastname));
}

function register($email, $password, $firstname, $lastname){
	$db = get_db_connection();
	$sql = "INSERT INTO Benutzerdaten (email, password, firstname, lastname) VALUES (?, ?, ?, ?);";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($email, $password, $firstname, $lastname));
}

function get_user_by_id($id){
	$db = get_db_connection();
	$sql = "SELECT * FROM Benutzerdaten WHERE id = $id;";
	$result = $db->query($sql);
	return $result->fetch();
}

function email_vergeben($email){
	$db = get_db_connection();
	$sql = "SELECT * FROM Benutzerdaten where email = '$email';";
	$result = $db->query($sql);
	if($result->rowCount() > 0){
		return true;
	};
	return false;
}

function edit_data($email, $firstname, $lastname){
	$db = get_db_connection();
	$sql = "UPDATE Benutzerdaten SET email=?, firstname=?, lastname=? WHERE id='$id';";
	$stmt = $db->prepare($sql);
	return $stmt->execute(array($email, $firstname, $lastname));
}
