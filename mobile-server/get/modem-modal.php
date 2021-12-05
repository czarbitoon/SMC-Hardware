<?php
	include "../../includes/connect.php";
	if((isset($_POST["modem_id"]))){
		$sql = "SELECT * FROM modem WHERE modem_id = '" . $_POST['modem_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$modem_data = $result -> fetch_assoc();
?>
	<center><?php echo $modem_data['modem_number']; ?></center>
		<div class="form-group">
			<label for="<?php echo $modem_data['modem_desc']; ?>">Modem Satus</label>
			<select class="custom-select" id="modem_status" readonly>
				<option value="working" <?php if($modem_data['modem_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($modem_data['modem_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($modem_data['modem_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>

<script type="text/javascript">
	$("#report_this").click(function(){
		try{
		var modem_status = $("#modem_status").val();
		var user_id =  $("#user_id").val();
		console.log(modem_status);
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/report-modem.php",
			method: "POST",
			data: {
				'modem_status' : modem_status,
				'modem_id' : '<?php echo $modem_data['modem_id']; ?>',
				'user_id' : user_id,
				'office_id' : '<?php echo $modem_data['office_id']; ?>'
			},
			success: function(data){
				$("#modal_content").html(data);
				$("#modal_footer").html("");
				$("#modal_footer").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
				try{
                    $.ajax({
                        url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/modem.php",
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
                	console.log("modem: " + e);
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