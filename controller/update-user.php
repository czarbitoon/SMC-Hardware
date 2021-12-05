<?php
 include "../includes/connect.php";
  if(isset($_POST['user_id'])){

  $user_id = $_POST["user_id"];
    $username = $_POST["username"];
    $name = $_POST["name"];
    $office_id = $_POST["office_id"];


    $sql = "UPDATE users SET 
    username = '$username',
    name = '$name',
    office_id = '$office_id'
    WHERE user_id='$user_id'";
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