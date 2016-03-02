<?php
session_start();

if(!isset($_SESSION['user'])) {
	header("Location: enter.html");
} else {
	echo 'Welcome!';
}