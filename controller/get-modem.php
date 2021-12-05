<?php
	include "../includes/connect.php";
	if(isset($_POST['modem_id'])){
		$sql = "SELECT * FROM modem WHERE modem_id='" . $_POST['modem_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$row = $result -> fetch_assoc();
?>

	<tr>
    <th>Device Name</th>
    <th>Status</th>
  </tr>
  <tr>
    <td>
    	<div class="form-group">
    		<input class="input-control" id="modem_desc" type="text" value="<?php echo $row['modem_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="modem_status">
          	<option value="working" <?php if($row['modem_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['modem_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['modem_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
          </select>
        </div>
    </td>
    </tr>
    <?php
	}
	else{
		echo "ERROR";
	}
?>