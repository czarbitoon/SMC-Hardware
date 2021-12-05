<?php
 include "../includes/connect.php";
	if(isset($_POST['office_id'])){

	$modem_number = $_POST["modem_number"];
	$office_id = $_POST["office_id"];
    $modem_desc = $_POST["modem_desc"];

    $sql = "INSERT INTO modem (modem_number, modem_desc, office_id) VALUES ('$modem_number', '$modem_desc', '$office_id')";
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