<form>
	<div class="form-group">
	<label>Printer Number</label>
    <input type="text" class="form-control" id="printer_number" placeholder="Enter Printer Number">
    <label>Printer</label>
    <input type="text" class="form-control" id="printer_desc" placeholder="Enter Printer Name">
    
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