<?php
    header('Access-Control-Allow-Origin: *');
?>
<form>
	 <div class="form-group">
	<label>Modem Number</label>
    <input type="text" class="form-control" id="modem_number" placeholder="Enter Modem Number">
    <label>Modem</label>
    <input type="text" class="form-control" id="modem_desc" placeholder="Enter Modem Name">
    
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