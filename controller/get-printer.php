<?php
	include "../includes/connect.php";
	if(isset($_POST['printer_id'])){
		$sql = "SELECT * FROM printer WHERE printer_id='" . $_POST['printer_id'] . "'";
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
    		<input class="input-control" id="printer_desc" type="text" value="<?php echo $row['printer_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="printer_status">
          	<option value="working" <?php if($row['printer_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['printer_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['printer_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
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