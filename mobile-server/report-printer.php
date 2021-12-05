<?php
	include "../includes/connect.php";
	if(isset($_POST['printer_id'])){
		$printer_status = $_POST['printer_status'];
		$printer_id = $_POST['printer_id'];
		$user_id = $_POST['user_id'];
		$office_id = $_POST['office_id'];
		$sql = "UPDATE printer SET printer_status = '$printer_status'WHERE printer_id = '$printer_id'";
		try{
			if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
				$t=time();
				$date = date("Y-m-d",$t);
				$sql = "INSERT INTO reports(date_reported, office_id, printer_id, reported_by) VALUES('$date', '$office_id', '$printer_id', '$user_id')";
				if($result = mysqli_query($conn, $sql)  or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
					echo "Success!!";
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