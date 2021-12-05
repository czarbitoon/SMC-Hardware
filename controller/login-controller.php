<?php
	include "../includes/connect.php";
	session_start();
	if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION["row"] = $result -> fetch_assoc();
			// echo $_SESSION["row"]["role"] ;
			if($_SESSION["row"]["role"] == "admin" || $_SESSION['row']['role'] == 'personnel'){
			 header("Location: ../index.php");	
			}
			else{
				header("Location: " . $_SERVER["HTTP_REFERER"]);
			}
// 			echo $_SESSION["user"];
			// header("Location: ../index.php");
            // header("Location: " . $_SERVER["HTTP_REFERER"]);
// 			echo "Logged In";
		}
		else{
			echo "ERROR!";
		}
	}
	else{
		echo "No data recieved";
	}



?>