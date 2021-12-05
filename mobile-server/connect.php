<?php


	header('Access-Control-Allow-Origin: *');
	$servername = "localhost";
	$username = "id12456218_admin"; //copypaste username
	$password = "12345"; //cppwd
	$db = "id12456218_smcpcmon";// dbnm

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


?>