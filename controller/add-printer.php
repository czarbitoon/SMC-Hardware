<?php
 include "../includes/connect.php";
	if(isset($_POST['office_id'])){

	$printer_number = $_POST["printer_number"];
	$office_id = $_POST["office_id"];
    $printer_desc = $_POST["printer_desc"];

    $sql = "INSERT INTO printer (printer_number, printer_desc, office_id) VALUES ('$printer_number', '$printer_desc', '$office_id')";
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