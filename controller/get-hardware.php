<?php
	include "../includes/connect.php";
	if(isset($_POST['pc_id'])){
    echo $_POST['pc_id'];
		$sql = "SELECT * FROM pc WHERE pc_id='" . $_POST['pc_id'] . "'";
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
    		<input class="input-control" id="sysunit_desc" type="text" value="<?php echo $row['sysunit_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="sysunit_status">
          	<option value="working" <?php if($row['sysunit_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['sysunit_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['sysunit_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
          </select>
        </div>
    </td>
    </tr>
  <tr>
    <td>
    	<div class="form-group">
    		<input class="input-control" id="monitor_desc" type="text" value="<?php echo $row['monitor_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="monitor_status">
          	<option value="working" <?php if($row['monitor_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['monitor_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['monitor_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
          </select>
        </div>
    </td>
    </tr>

  <tr>
    <td>
    	<div class="form-group">
    		<input class="input-control" id="mouse_desc" type="text" value="<?php echo $row['mouse_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="mouse_status">
          	<option value="working" <?php if($row['mouse_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['mouse_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['mouse_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
          </select>
        </div>
    </td>
    </tr>
  
  <tr>
    <td>
    	<div class="form-group">
    		<input class="input-control" id="keyboard_desc" type="text" value="<?php echo $row['keyboard_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="keyboard_status">
          	<option value="working" <?php if($row['keyboard_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['keyboard_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['keyboard_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
          </select>
        </div>
    </td>
    </tr>
  <tr>
    <td>
    	<div class="form-group">
    		<input class="input-control" id="lan_desc" type="text" value="<?php echo $row['lan_desc']; ?>">
    	</div>
    </td>
    <td>
    	<div class="input-group mb-3">
          <select class="custom-select" id="lan_status">
          	<option value="working" <?php if($row['lan_status'] == 'working') echo "selected"; ?>>Working</option>
          	<option value="missing" <?php if($row['lan_status'] == 'missing') echo "selected"; ?>>Missing</option>
          	<option value="defective" <?php if($row['lan_status'] == 'defective') echo "selected"; ?>>Defective</option>          	
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