<form>
	 <div class="form-group">
	 <label>PC Number</label>
    <input type="text" class="form-control" id="pc_number" placeholder="Enter PC Number">
    <label>System Unit</label>
    <input type="text" class="form-control" id="sysunit_desc" placeholder="Enter System Unit">
    <label>Monitor</label>
    <input type="text" class="form-control" id="monitor_desc" placeholder="Enter Monitor">
    <label>Keyboard</label>
    <input type="text" class="form-control" id="keyboard_desc" placeholder="Enter Keyboard">
    <label>Mouse</label>
    <input type="text" class="form-control" id="mouse_desc" placeholder="Enter Mouse">
    <label>Lan Device</label>
    <input type="text" class="form-control" id="lan_desc" placeholder="Enter Lan Device">
    <label class="input-group-text">Select Office</label>
          </div>
          <select class="custom-select" id="office_id">
            <option selected disabled>Choose Office</option>
            <?php
            include "connect.php";
              $sql = "SELECT * FROM office";
              $result = mysqli_query($conn, $sql);
              while($row = $result -> fetch_assoc()){
            ?>
            <option value="<?php echo $row['office_id'];?>"><?php echo $row['name']; ?></option>
            <?php
              }
            ?>
          </select>
  </div>
</form>