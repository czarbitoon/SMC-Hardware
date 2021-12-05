<?php
	include "../includes/connect.php";
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$office_id = $_POST['office_id'];
		$sql = "INSERT INTO users(username, password, role, name, office_id) VALUES('$username','$password', 'user', '$name', '$office_id')";
		if($result = mysqli_query($conn, $sql)){
			echo "Success!";
			echo "$role";
		}
		else{
			echo "ERROR!";
		}
	}
	else{
		echo "No Data!";
	}
?>