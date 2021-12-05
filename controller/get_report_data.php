<?php
	include "../includes/connect.php";
	if(isset($_POST['report_id'])){
		$sql = "SELECT * FROM reports INNER JOIN users ON reports.reported_by=users.user_id WHERE reports.report_id='" . $_POST['report_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$data = $result -> fetch_assoc();
		$sql1 = "SELECT * FROM office WHERE office_id='" . $data['office_id'] . "'";
		$result1 = mysqli_query($conn, $sql1);
		$office = $result1 -> fetch_assoc();
?>
	<div class="p-2">
		<div><p>Office Name: <?php echo $office['name'];?></p></div>
		<div>
			<p>Type:
				<?php
					if($data['pc_id'] != NULL){
						echo "PC</p>";
						$sqlpc = "SELECT * FROM pc WHERE pc_id='" . $data['pc_id'] . "'";
						$result = mysqli_query($conn, $sqlpc);
						$pc = $result -> fetch_assoc();
						echo "<p>PC Number: " . $pc['pc_number'] . "</p>";
						echo "<div><p>Mouse Name: " . $pc['mouse_desc'] . "</p>";
						echo "<p>Status: " . $pc['mouse_status'] . "</p></div>";
						echo "<div><p>Keyboard Name: " . $pc['keyboard_desc'] . "</p>";
						echo "<p>Status: " . $pc['keyboard_status'] . "</p></div>";
						echo "<div><p>Monitor Name: " . $pc['monitor_desc'] . "</p>";
						echo "<p>Status: " . $pc['monitor_status'] . "</p></div>";
						echo "<div><p>Lan Name: " . $pc['lan_desc'] . "</p>";
						echo "<p>Status: " . $pc['lan_status'] . "</p></div>";
						echo "<div><p>SysUnit Name: " . $pc['sysunit_desc'] . "</p>";
						echo "<p>Status: " . $pc['sysunit_status'] . "</p></div>";
					}
					if($data['modem_id'] != NULL){
						echo "Modem</p>";
						$sqlmodem = "SELECT * FROM modem WHERE modem_id='" . $data['modem_id'] . "'";
						$result = mysqli_query($conn, $sqlmodem);
						$modem = $result -> fetch_assoc();
						echo "<p>Modem Number: " . $modem['modem_number'] . "</p>";
						echo "<div><p>Modem Name: " . $modem['modem_desc'] . "</p>";
						echo "<p>Status: " . $modem['modem_status'] . "</p></div>";
					}
					if($data['printer_id'] != NULL){
						echo "Printer</p>";
						$sqlprinter = "SELECT * FROM printer WHERE printer_id='" . $data['printer_id'] . "'";
						$result = mysqli_query($conn, $sqlprinter);
						$printer = $result -> fetch_assoc();
						echo "<p>Printer Number: " . $printer['printer_number'] . "</p>";
						echo "<div><p>Printer Name: " . $printer['printer_desc'] . "</p>";
						echo "<p>Status: " . $printer['printer_status'] . "</p></div>";
					}
				?>
			<p>Reported By: <?php echo $data['name'] ?>;</p>
			<p>Date Reported: <?php echo $data['date_reported']; ?></p>
			<?php
				if($data['is_checked'] == 'true'){
					echo "<p>Date Checked: " . $data['date_checked'];
				}
				else{
					echo "<p style='color:red'>Status: Pending</p>";
				}
			?>
		</div>
	</div>
<?php
	}
?>