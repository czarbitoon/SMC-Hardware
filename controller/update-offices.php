<?php
 include "../includes/connect.php";
  if(isset($_POST['office_id'])){

  $office_id = $_POST["office_id"];
    $name = $_POST["name"];


    $sql = "UPDATE office SET 
    name = '$name'
    WHERE office_id='$office_id'";
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