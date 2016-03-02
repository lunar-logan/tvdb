<?php
session_start();

if(isset($_SESSION['user'])) {
	header("Location: index.php");
}

filter_input($_POST, "name");