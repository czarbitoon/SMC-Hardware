<?php
    header('Access-Control-Allow-Origin: *');
?>
<form>
   <div class="form-group">
   <label>Username</label>
    <input type="text" class="form-control" id="username" placeholder="Enter Username">
    <label>Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name">
    <label>Password</label>
    <input type="text" class="form-control" id="password" placeholder="Enter Password">
    <label class="input-group-text">Select Office</label>
          </div>
          <select class="custom-select" id="office_id">
            <option selected disabled>Choose Office</option>
            <?php
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