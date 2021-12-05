<?php
	include "../includes/connect.php";
	if(isset($_POST['office_id'])){
		$sql = "SELECT * FROM office WHERE office_id='" . $_POST['office_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$row = $result -> fetch_assoc();
?>

<tr>
	<th>Office Name</th>
</tr>

	<td>
	<div class="form-group">
    		<input class="input-control" id="name" type="text" value="<?php echo $row['name']; ?>">
    	</div>
    </td>
<?php
	}
?>