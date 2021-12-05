<?php
 include "../includes/connect.php";
	if(isset($_POST['office_id'])){
		echo $_POST['office_id'];
		$sql = "DELETE FROM office WHERE office_id = '" . $_POST['office_id'] . "'";
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