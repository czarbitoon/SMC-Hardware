<?php
	include "../../includes/connect.php";
	if((isset($_POST["printer_id"]))){
		$sql = "SELECT * FROM printer WHERE printer_id = '" . $_POST['printer_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$printer_data = $result -> fetch_assoc();
?>
	<center><?php echo $printer_data['printer_number']; ?></center>
		<div class="form-group">
			<label for="<?php echo $printer_data['printer_desc']; ?>">printer Status</label>
			<select class="custom-select" id="printer_status" readonly>
				<option value="working" <?php if($printer_data['printer_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($printer_data['printer_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($printer_data['printer_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>
		

<script type="text/javascript">
	$("#report_this").click(function(){
		try{
		var printer_status = $("#printer_status").val();
		var user_id =  $("#user_id").val();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/report-printer.php",
			method: "POST",
			data: {
				'printer_status' : printer_status,
				'printer_id' : '<?php echo $printer_data['printer_id']; ?>',
				'user_id' : user_id,
				'office_id' : '<?php echo $printer_data['office_id']; ?>'
			},
			success: function(data){
				$("#modal_content").html(data);
				$("#modal_footer").html("");
				$("#modal_footer").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
				try{
                    $.ajax({
                        url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/printer.php",
                        method: "POST",
                        data:{'user_id':$("#user_id").val()},
                        success: function(data){
                            console.log(data);
                            console.log($("#user_id").val());
                            $("#user_id").val($("#user_id").val());
                            $("#navigation").show();
                            $("#loading").hide();
                            $("#container").show();
                            $("#container").html("");
                            $("#container").html(data);
                        }
                    });
                }
                catch(e){
                	console.log("printer: " + e);
                }
				console.log(data);
			}
		});
		}catch(e){
			console.log(e);
		}
	});
</script>
<?php
	}
	else{
		echo "ERROR!";
	}
?>