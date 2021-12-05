<?php
 include "../includes/connect.php";
	if(isset($_POST['office_id'])){

	$pc_number = $_POST["pc_number"];
	$office_id = $_POST["office_id"];
    $sysunit_desc = $_POST["sysunit_desc"];
    $monitor_desc = $_POST["monitor_desc"];
    $mouse_desc = $_POST["mouse_desc"];
    $keyboard_desc = $_POST["keyboard_desc"];
    $lan_desc = $_POST["lan_desc"];

    $sql = "INSERT INTO pc (pc_number, mouse_desc, keyboard_desc, monitor_desc, lan_desc, sysunit_desc, office_id) VALUES ('$pc_number', '$mouse_desc', '$keyboard_desc', '$monitor_desc', '$lan_desc', '$sysunit_desc', '$office_id')";
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