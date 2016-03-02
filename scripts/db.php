<?php

define('DB_NAME', 'tvdb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');


function connect() {
	$db = mysql_connect("localhost", DB_USER, DB_PASSWORD);
	if(!$db) {
		die("Could not connect to the database: ".mysql_error());
	}

	mysql_select_db(DB_NAME);

	return $db;
}