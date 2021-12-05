<?php
	include "../includes/connect.php";
	if(isset($_POST["username"]) && isset($_POST["password"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
			if(mysqli_num_rows($result) == 1){
				$row = $result -> fetch_assoc();
				echo json_encode($row);
			}
			else{
				echo "Wrong Username or Password!";
			}
		}
	}
	else{
		echo "No Data!";
	}
?>