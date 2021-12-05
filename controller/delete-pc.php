<?php
 include "../includes/connect.php";
	if(isset($_POST['pc_id'])){
		$sql = "DELETE FROM pc WHERE pc_id = '" . $_POST['pc_id'] . "'";
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