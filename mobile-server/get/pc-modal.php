<?php
	include "../../includes/connect.php";
	if(isset($_POST["pc_id"])){
		$sql = "SELECT * FROM pc WHERE pc_id = '" . $_POST['pc_id'] . "'";
		$result = mysqli_query($conn, $sql);
		$pc_data = $result -> fetch_assoc();
?>
	<center><?php echo $pc_data['pc_number']; ?></center>
		<div class="form-group">
			<label for="<?php echo $pc_data['mouse_desc']; ?>">Mouse</label>
			<select class="custom-select" id="mouse" readonly>
				<option value="working" <?php if($pc_data['mouse_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($pc_data['mouse_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($pc_data['mouse_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>
		<div class="form-group">
			<label for="<?php echo $pc_data['keyboard_desc']; ?>">Keyboard</label>
			<select class="custom-select" id="keyboard" readonly>
				<option value="working" <?php if($pc_data['keyboard_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($pc_data['keyboard_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($pc_data['keyboard_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>
		<div class="form-group">
			<label for="<?php echo $pc_data['monitor_desc']; ?>">Monitor</label>
			<select class="custom-select" id="monitor" readonly>
				<option value="working" <?php if($pc_data['monitor_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($pc_data['monitor_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($pc_data['monitor_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>
		<div class="form-group">
			<label for="<?php echo $pc_data['lan_desc']; ?>">LAN</label>
			<select class="custom-select" id="lan" readonly>
				<option value="working" <?php if($pc_data['lan_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($pc_data['lan_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($pc_data['lan_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>
		<div class="form-group">
			<label for="<?php echo $pc_data['sysunit_desc']; ?>">System Unit</label>
			<select class="custom-select" id="sys_unit" readonly>
				<option value="working" <?php if($pc_data['sysunit_status'] == 'working') echo "selected";?>>Working</option>
				<option value="missing" <?php if($pc_data['sysunit_status'] == 'missing') echo "selected";?>>Missing</option>
				<option value="defective" <?php if($pc_data['sysunit_status'] == 'defective') echo "selected";?>>Defective</option>
			</select>
		</div>

<script type="text/javascript">
	$("#report_this").click(function(){
		try{
		var mouse = $("#mouse").val();
		var keyboard = $("#keyboard").val();
		var monitor = $("#monitor").val();
		var lan = $("#lan").val();
		var sys_unit = $("#sys_unit").val();
		var user_id =  $("#user_id").val();
		console.log('<?php echo $pc_data['office_id']; ?>');
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/report-pc.php",
			method: "POST",
			data: {
				'mouse' : mouse,
				'keyboard' : keyboard,
				'monitor' : monitor,
				'lan' : lan,
				'sys_unit' : sys_unit,
				'pc_id' : '<?php echo $pc_data['pc_id']; ?>',
				'user_id' : user_id,
				'office_id' : '<?php echo $pc_data['office_id']; ?>'
			},
			success: function(data){
				$("#modal_content").html(data);
				$("#modal_footer").html("");
				$("#modal_footer").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>');
				try{
                    $.ajax({
                        url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/pc.php",
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
                	console.log(e);
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
?>