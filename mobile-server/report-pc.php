<?php
	include "../includes/connect.php";
	if(isset($_POST['pc_id'])){
		$mouse = $_POST['mouse'];
		$keyboard = $_POST['keyboard'];
		$monitor = $_POST['monitor'];
		$lan = $_POST['lan'];
		$sys_unit = $_POST['sys_unit'];
		$pc_id = $_POST['pc_id'];
		$office_id = $_POST['office_id'];
		$user_id = $_POST['user_id'];
		$sql = "UPDATE pc SET mouse_status = '$mouse', keyboard_status = '$keyboard', monitor_status = '$monitor', lan_status = '$lan' , sysunit_status = '$sys_unit' WHERE pc_id = '$pc_id'";
		try{
			if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
				$t=time();
				$date = date("Y-m-d",$t);
				$sql = "INSERT INTO reports(date_reported, office_id, pc_id, reported_by) VALUES('$date', '$office_id', '$pc_id', '$user_id')";
				if($result = mysqli_query($conn, $sql)  or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
					echo "Success!";
					// $report_id = $conn->insert_id;
					// $sql = "INSERT INTO checked(datecreated, report_id) VALUES('$date', '$report_id')";
					// if($result = mysqli_query($conn, $sql)  or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
					// 	echo "Success!!";
					// }
				}
			}
			else{
				echo "ERROR!";
			}
		}catch(Exception $e){
			echo $e;
		}
	}
	else{
		echo "No Data!";
	}
?>