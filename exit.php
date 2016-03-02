<?php
session_start();

session_destroy(); 	// Delete all the user session data

header("Location: entry.php");	// Redirect back to entry point