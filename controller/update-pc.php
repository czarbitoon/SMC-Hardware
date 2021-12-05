<?php
 include "../includes/connect.php";
	if(isset($_POST['pc_id'])){

	$pc_id = $_POST["pc_id"];
    $sysunit_desc = $_POST["sysunit_desc"];
    $sysunit_status = $_POST["sysunit_status"];
    $monitor_desc = $_POST["monitor_desc"];
    $monitor_status = $_POST["monitor_status"];
    $mouse_desc = $_POST["mouse_desc"];
    $mouse_status = $_POST["mouse_status"];
    $keyboard_desc = $_POST["keyboard_desc"];
    $keyboard_status = $_POST["keyboard_status"];
    $lan_desc = $_POST["lan_desc"];
    $lan_status = $_POST["lan_status"];

    echo $pc_id;
		$sql = "UPDATE pc SET 
		sysunit_desc = '$sysunit_desc',
		sysunit_status = '$sysunit_status',
		monitor_desc = '$monitor_desc',
		monitor_status = '$monitor_status',
		mouse_desc = '$mouse_desc',
		mouse_status = '$mouse_status',
		keyboard_desc = '$keyboard_desc',
		keyboard_status = '$keyboard_status',
		lan_desc = '$lan_desc',
		lan_status = '$lan_status'
		WHERE pc_id='$pc_id'";
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