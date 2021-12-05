<?php
	include "../includes/connect.php";
	if(isset($_POST['office_id'])){
		$sql = "SELECT * FROM pc WHERE office_id = '" . $_POST['office_id'] . "'";
		$result = mysqli_query($conn, $sql);
		while($pc_data = $result -> fetch_assoc()){
?>
	<div class="jumbotron">
		<center><p>PC NUMBER: <?php echo $pc_data['pc_number']; ?></p></center>
		<p>Mouse Status: <?php echo $pc_data['mouse_status']; ?></p>
		<p>Keyboard Status: <?php echo $pc_data['keyboard_status']; ?></p>
		<p>Monitor Status: <?php echo $pc_data['monitor_status']; ?></p>
		<p>LAN Status: <?php echo $pc_data['lan_status']; ?></p>
		<p>System Unit Status: <?php echo $pc_data['sysunit_status']; ?></p>
	</div>
<?php
		}
	}
	else{
		echo "No Data!";
	}
?>