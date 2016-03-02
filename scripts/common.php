<?php
include_once 'scripts/db.php';


function get_show_by_year($year) {
	$y = intval($year);
	if($y < 1000) {
		return FALSE;
	}

	$db = connect();	 // connect to the database and select db

	$sql = "SELECT * FROM shows WHERE release_date=$y;";
	$cursor = mysql_query($sql);
	if(mysql_num_rows($cursor) > 0) {
		return $cursor;
	}
	return FALSE;
}