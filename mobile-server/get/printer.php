<br>
<br>
<br>
<br>
<?php
	include "../../includes/connect_mobile.php";
	if(isset($_POST["user_id"])){
		$sql = "SELECT * FROM users WHERE user_id = '" . $_POST["user_id"] . "'";
		$result = mysqli_query($conn, $sql);
		$prof_data = $result -> fetch_assoc();
		$sql = "SELECT * FROM printer WHERE office_id = '" . $prof_data['office_id'] . "'";
		$result = mysqli_query($conn, $sql);
		while($printer_data = $result -> fetch_assoc()){
?>
<div class="alert alert-primary" role="alert">Note: Specify which device is 'missing' and or 'defective'</div>
<div class="jumbotron">
	<center>Printer Number: <?php echo $printer_data['printer_number']; ?></center>
	<p>Printer Description: <?php echo $printer_data['printer_desc'];?></p>
	<p>Printer Status: <?php echo $printer_data['printer_status'];?></p>
	<center><button class="report btn btn-primary" value="<?php echo $printer_data['printer_id']; ?>">Report This!</button></center>
</div>

<?php
		}
	}
	else{
		echo "NO DATA!";
	}
?>

<script type="text/javascript">
$("#modal_footer").html("");
$("#modal_footer").append('<button type="button" id="report_this" class="btn btn-primary">Report</button>' +
        '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
$(".report").click(function(){
	console.log("report_open");
	$("#title").html("");
	$("#title").html("printer: " + $(this).val());
	$.ajax({
		url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/printer-modal.php",
		method: "POST",
		data: {
			'printer_id': $(this).val()
		},
		success: function(data){
			$("#modal_content").html("");
			$("#modal_content").html(data);
			$('#modal').modal('show');
		}
	});
});
// $(".forms").on('submit', function(e){
// e.preventDefault();
// if($)

// });
</script>