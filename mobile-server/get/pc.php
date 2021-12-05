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
		$sql = "SELECT * FROM pc WHERE office_id = '" . $prof_data['office_id'] . "'";
		$result = mysqli_query($conn, $sql);
		while($pc_data = $result -> fetch_assoc()){
?>
<div class="alert alert-primary" role="alert">Note: Specify which device is 'missing' and or 'defective'</div>
<div class="jumbotron">
	<center>PC Number: <?php echo $pc_data['pc_number']; ?></center>
	<p>Mouse: <?php echo $pc_data['mouse_status'];?></p>
	<p>Keyboard: <?php echo $pc_data['keyboard_status'];?></p>
	<p>LAN: <?php echo $pc_data['lan_status'];?></p>
	<p>System Unit: <?php echo $pc_data['sysunit_status'];?></p>
	<center><button class="report btn btn-primary" value="<?php echo $pc_data['pc_id']; ?>">Report This!</button></center>
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
	$("#title").html("PC: " + $(this).val());
	$.ajax({
		url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/pc-modal.php",
		method: "POST",
		data: {
			'pc_id': $(this).val()
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