<?php
	include "connect.php";
	 if(isset($_POST["username"])){
    $username = $_POST["username"];
    $name = $_POST['name'];
    $office_id = $_POST['office_id'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username,name,password,office_id) VALUES ('$username', '$name', '$password', '$office_id')";
		try{
			$result = mysqli_query($conn, $sql);
		}catch(Exception $e){
			echo $e;
		}
	}

?>