<?php
 include "../includes/connect.php";
	if(isset($_POST['modem_id'])){
		$sql = "DELETE FROM modem WHERE modem_id = '" . $_POST['modem_id'] . "'";
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