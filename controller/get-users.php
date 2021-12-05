<?php
	include "../includes/connect.php";
	if(isset($_POST['user_id'])){
		$sql = "SELECT * FROM users WHERE user_id='" . $_POST['user_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$user_row = $result -> fetch_assoc();
?>

<tr>
	<th>UserName</th>
	<th>Name</th>
  <th>Office</th>
</tr>
  
  <tr>
	   <td>
    	<div class="form-group">
    		<input class="input-control" id="username" type="text" value="<?php echo $user_row['username']; ?>">

    </td>    		
    <td>
        <input class="input-control" id="name" type="text" value="<?php echo $user_row['name']; ?>">
    </td>     		
    <td>     
          </div>
          <select class="custom-select" id="office_id">
    		 <?php
              $sql = "SELECT * FROM office";
              $result = mysqli_query($conn, $sql);
              while($office_row = $result -> fetch_assoc()){
            ?>
            <option value="<?php echo $office_row  ['office_id'];?>"<?php if($user_row['office_id'] == $office_row["office_id"]) echo "selected"; ?>><?php echo $office_row['name']; ?></option>
            <?php
              }
            ?>
          </select>
      </td>
    	</div`>
  </tr>
  <?php
              }
  ?>