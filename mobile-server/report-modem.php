<?php
	include "../includes/connect.php";
	if(isset($_POST['modem_id'])){
		// echo "Status recieved: " . $_POST['modem_status'];
		$modem_status = $_POST['modem_status'];
		$modem_id = $_POST['modem_id'];
		$user_id = $_POST['user_id'];
		$office_id = $_POST['office_id'];
		$sql = "UPDATE modem SET modem_status = '$modem_status' WHERE modem_id = '$modem_id'";
		try{
			if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
				$t=time();
				$date = date("Y-m-d",$t);
				$sql = "INSERT INTO reports(date_reported, office_id, modem_id, reported_by) VALUES('$date', '$office_id', '$modem_id', '$user_id')";
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