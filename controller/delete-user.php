<?php
 include "../includes/connect.php";
	if(isset($_POST['user_id'])){
		echo $_POST['user_id'];
		$sql = "DELETE FROM users WHERE user_id = '" . $_POST['user_id'] . "'";
	try{
			$result = mysqli_query($conn, $sql);
		}catch(Exception $e){
			echo $e;
		}
	}
	else{
		echo "error!";
	}
?>