<?php
 include "../includes/connect.php";
	if(isset($_POST['printer_id'])){

	$printer_id = $_POST["printer_id"];
    $printer_desc = $_POST["printer_desc"];
    $printer_status = $_POST["printer_status"];

    echo $printer_id;

		$sql = "UPDATE printer SET 
		printer_desc = '$printer_desc',
		printer_status = '$printer_status'
		WHERE printer_id='$printer_id'";
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