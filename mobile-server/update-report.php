<?php
	include "../includes/connect.php";
	///////////////////////// TEST DATA TO PC ///////////////////
	// $mouse_status = $_POST['mouse_status'];
	// $keyboard_status = $_POST['keyboard_status'];
	// $monitor_status = $_POST['monitor_status'];
	// $lan_status = $_POST['lan_status'];
	// $sysunit_status = $_POST['sysunit_status'];
	// $pc_id = $_POST['pc_id'];
	// $report_id = $_POST['report_id'];
	// echo $mouse_status . $keyboard_status . $monitor_status . $lan_status . $sysunit_status . $pc_id . $report_id;
	///////////////////////// TEST DATA TO MODEM /////////////////
	// $modem_status = $_POST['modem_status'];
	// $modem_id = $_POST['modem_id'];
	// $report_id = $_POST['report_id'];
	// echo $modem_status . $modem_id . $report_id;
	///////////////////////// TEST DATA TO PRINTER ../////////////
	// $printer_status = $_POST['printer_status'];
	// $printer_id = $_POST['printer_id'];
	// $report_id = $_POST['report_id'];
	// echo $printer_status . $printer_id . $report_id;
	//////////////////////////////////////////////////////////////
	if(isset($_POST['report_id'])){
		if(isset($_POST['pc_id'])){
			$mouse_status = $_POST['mouse_status'];
			$keyboard_status = $_POST['keyboard_status'];
			$monitor_status = $_POST['monitor_status'];
			$lan_status = $_POST['lan_status'];
			$sysunit_status = $_POST['sysunit_status'];
			$pc_id = $_POST['pc_id'];
			$report_id = $_POST['report_id'];	
			$sql = "UPDATE pc SET mouse_status = '$mouse_status', keyboard_status='$keyboard_status', monitor_status='$monitor_status', lan_status='$lan_status', sysunit_status='$sysunit_status' WHERE pc_id='$pc_id'";
			if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
				$sql = "UPDATE reports SET is_checked = 'true' WHERE report_id='$report_id'";
				if($reuslt = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
					echo "PC Success!";
				}
				else{
					echo "2nd Query ERROR!";
				}
			}
			else{
				echo "1st Query ERROR!";
			}
		}
		else if(isset($_POST['modem_id'])){
			$modem_status = $_POST['modem_status'];
			$modem_id = $_POST['modem_id'];
			$report_id = $_POST['report_id'];
			$sql = "UPDATE modem SET modem_status = '$modem_status' WHERE modem_id='$modem_id'";
			if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
				$sql = "UPDATE reports SET is_checked = 'true' WHERE report_id='$report_id'";
				if($reuslt = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
					echo "Modem Success!";
				}
				else{
					echo "2nd Query ERROR!";
				}
			}
			else{
				echo "1st Query ERROR!";
			}
		}
		else if(isset($_POST['printer_id'])){
			$printer_status = $_POST['printer_status'];
			$printer_id = $_POST['printer_id'];
			$report_id = $_POST['report_id'];
			$sql = "UPDATE printer SET printer_status = '$printer_status' WHERE printer_id='$printer_id'";
			if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
				$sql = "UPDATE reports SET is_checked = 'true' WHERE report_id='$report_id'";
				if($reuslt = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
					echo "Printer Success!";
				}
				else{
					echo "2nd Query ERROR!";
				}
			}
			else{
				echo "1st Query ERROR!";
			}
		}
		else{
			echo "2nd call: No Data!";
		}
	}
	else{
		echo "1st call: No Data";
	}
?>