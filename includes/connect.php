<?php
    header('Access-Control-Allow-Origin: *');
	$servername = "localhost";
	$username = "id12926836_jcbits"; //copypaste username
	$password = "12345678"; //cppwd
	$db = "id12926836_smchardwaremon";// dbnm

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>