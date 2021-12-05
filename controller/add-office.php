<?php
 include "../includes/connect.php";
 if(isset($_POST["name"])){
    $name = $_POST["name"];

    $sql = "INSERT INTO office (name) VALUES ('$name')";
		try{
			$result = mysqli_query($conn, $sql);
		}catch(Exception $e){
			echo $e;
		}
	}
?>