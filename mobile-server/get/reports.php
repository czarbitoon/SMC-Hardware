<?php
	include "../../includes/connect.php";
?>
<br>
<br>
<br>
<br>
<br>
<?php
	$sql = "SELECT * FROM reports  WHERE is_checked='false'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 0){
?>
	<div>
		<center>No Reports Yet!</center>
	</div>
<?php
	}
	while($report_data = $result -> fetch_assoc()){
?>
<div class="jumbotron">
	<?php
			if($report_data['pc_id'] != NULL){
				$sql1 = "SELECT * FROM pc INNER JOIN office ON pc.office_id=office.office_id WHERE pc.pc_id = '" . $report_data['pc_id'] . "'";
				$result1 = mysqli_query($conn, $sql1);
				echo "<center><h3>PC</h3></center>";
				while($data = $result1 -> fetch_assoc()){
?>
	<div>
		<center><h5>PC NUMBER: <?php echo $data['pc_number']?></h5></center>
		<p>Office: <?php echo $data['name']; ?></p>
		<center><button class="view_report btn btn-primary" value="<?php echo $report_data['report_id'] ?>">View Report</button></center>
	</div>
<?php
				}
			}
			else if($report_data['modem_id'] != NULL){
				$sql1 = "SELECT * FROM modem INNER JOIN office ON modem.office_id=office.office_id WHERE modem.modem_id = '" . $report_data['modem_id'] . "'";
				$result1 = mysqli_query($conn, $sql1);
				echo "<center><h3>Modem</h3></center>";
				while($data = $result1 -> fetch_assoc()){
?>
	<div>
		<center><h5>Modem NUMBER: <?php echo $data['modem_number']; ?></h5></center>
		<p>Office: <?php echo $data['name']; ?></p>
		<center><button class="view_report btn btn-primary" value="<?php echo $report_data['report_id'] ?>">View Report</button></center>
	</div>
<?php
				}
			}
			else if($report_data['printer_id'] != NULL){
				$sql1 = "SELECT * FROM printer INNER JOIN office ON printer.office_id=office.office_id WHERE printer.printer_id = '" . $report_data['printer_id'] . "'";
				$result1 = mysqli_query($conn, $sql1);
				echo "<center><h3>Printer</h3></center>";
				while($data = $result1 -> fetch_assoc()){
?>
	<div>
		<center><h5>Printer NUMBER: <?php echo $data['modem_number']; ?></h5></center>
		<p>Office: <?php echo $data['name']; ?></p>
		<center><button class="view_report btn btn-primary" value="<?php echo $report_data['report_id'] ?>">View Report</button></center>
	</div>
<?php
				}
			}
?>
</div>
<?php
		}
?>
<script type="text/javascript">
	$(".view_report").click(function(){
		console.log($(this).val());
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/update-modal.php",
			method: "POST",
			data:{
				"report_id" : $(this).val()
			},
			success: function(data){
				$("#modal_content").html("");
				$("#modal_content").html(data);
				$('#modal').modal('show');
			}
		});
	});
</script>
