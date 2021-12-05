<?php
 include "../includes/connect.php";
	if(isset($_POST['printer_id'])){
		$sql = "DELETE FROM printer WHERE printer_id = '" . $_POST['printer_id'] . "'";
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