<?php
session_start();

include_once 'db.php';


if(isset($_SESSION['user'])) {
	header("Location: index.php");
}

$name = filter_input(INPUT_POST, "name",  FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, "password");

$res = sign_in($name, $password);
if($res != FALSE) {
	$_SESSION['user'] = $res;
	header("Location: ../index.php");
} else {
	header("Location: ../enter.html");
}


function sign_in($name, $password) {
	if($name == NULL || $name == FALSE) {
		return FALSE;
	} 

	if($password == NULL || $password == FALSE) {
		return FALSE;
	}

	$password_hash = sha1($password);
	$db = mysql_connect("localhost", DB_USER, DB_PASSWORD, DB_NAME);
	if($db == NULL || $db == FALSE) {
		die("Could not connect to the database: ".mysql_error());
	}
	mysql_select_db(DB_NAME);

	$sql = "SELECT * FROM users WHERE `name`='$name' AND `password`='$password_hash';";
	$res = mysql_query($sql);
	if(mysql_num_rows($res) > 0) {
		$row = mysql_fetch_assoc($res);
		return $row['id'];
	}

	return FALSE;
}