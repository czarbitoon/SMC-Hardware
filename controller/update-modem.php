<?php
 include "../includes/connect.php";
  if(isset($_POST['modem_id'])){

  $modem_id = $_POST["modem_id"];
    $modem_desc = $_POST["modem_desc"];
    $modem_status = $_POST["modem_status"];

    echo $modem_id;

    $sql = "UPDATE modem SET 
    modem_desc = '$modem_desc',
    modem_status = '$modem_status'
    WHERE modem_id='$modem_id'";
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