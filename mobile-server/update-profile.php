<?php
	include "../includes/connect.php";
	if(isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $user_img = urldecode($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/image/user-image/" . $user_img);
		$sql = "UPDATE users SET 
                    name = '$name',
                    username = '$username',
                    password = '$password',
                    user_img = '$user_img'
                WHERE user_id = '$user_id'";
        if($result = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: sql - ERROR: " . mysqli_error($conn), E_USER_ERROR)){
            echo "Update Success!!";
        }
        else{
            echo "Update Error!!";
        }
	}
	else{
		echo "No Data!";
	}
?>