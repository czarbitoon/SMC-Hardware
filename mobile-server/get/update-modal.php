<?php
	include "../../includes/connect.php";
	if(isset($_POST['report_id'])){
		$report_id = $_POST['report_id'];
		$sql = "SELECT * FROM reports WHERE report_id='$report_id'";
		$result = mysqli_query($conn, $sql);
		$report_data;
		while($report_data = $result -> fetch_assoc()){
			if($report_data['pc_id'] != NULL){
				$sql1 = "SELECT * FROM pc WHERE pc_id='" . $report_data['pc_id'] . "'";
				$result1 = mysqli_query($conn, $sql1);
				$pc_data = $result1 -> fetch_assoc();
?>
<input type="text" id="report_id" value="<?php echo $report_id ?>" hidden>
<div>
	<center><h3>PC NUMBER: <?php echo $pc_data['pc_number']; ?></h3></center> 
	<form id="pc_form" method="POST" action="http://smchardwaremon.000webhostapp.com/mobile-server/update-report.php">
		<input type="text" id="pc_id" value="<?php echo $pc_data['pc_id'] ?>" hidden>
	  <div class="form-group">
	    <label for="mouse">Mouse: <?php echo $pc_data['mouse_desc']; ?></label>
	    <select class="form-control" id="mouse">
	    	<option value="working" <?php if($pc_data['mouse_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($pc_data['mouse_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($pc_data['mouse_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="Keyboard">Keyboard: <?php echo $pc_data['keyboard_desc']; ?></label>
	    <select class="form-control" id="keyboard">
	    	<option value="working" <?php if($pc_data['keyboard_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($pc_data['keyboard_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($pc_data['keyboard_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="monitor">Monitor: <?php echo $pc_data['monitor_desc']; ?></label>
	    <select class="form-control" id="monitor">
	    	<option value="working" <?php if($pc_data['monitor_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($pc_data['monitor_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($pc_data['monitor_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="lan">LAN: <?php echo $pc_data['lan_desc']; ?></label> 
	    <select class="form-control" id="lan">
	    	<option value="working" <?php if($pc_data['lan_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($pc_data['lan_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($pc_data['lan_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="sysunit">System Unit: <?php echo $pc_data['sysunit_desc']; ?></label>
	    <select class="form-control" id="sysunit">
	    	<option value="working" <?php if($pc_data['sysunit_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($pc_data['sysunit_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($pc_data['sysunit_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <center><input type="submit" class="btn btn-primary" value="Submit" id="submit_pc"></center>
	</form>
</div>
<?php
			}
			else if($report_data['modem_id'] != NULL){
				$sql1 = "SELECT * FROM modem WHERE modem_id='" . $report_data['modem_id'] . "'";
				$result1 = mysqli_query($conn, $sql1);
				$modem_data = $result1 -> fetch_assoc();
?>
<input type="text" id="report_id" value="<?php echo $report_id ?>" hidden>
<div>
	<center><h3>MODEM NUMBER: <?php echo $modem_data['modem_number']; ?></h3></center> 
	<form id="modem_form" method="POST" action="http://smchardwaremon.000webhostapp.com/mobile-server/update-report.php">
		<input type="text" id="modem_id" value="<?php echo $modem_data['modem_id'] ?>" hidden>
	  <div class="form-group">
	    <label for="modem">Modem Status</label>
	    <select class="form-control" id="modem">
	    	<option value="working" <?php if($modem_data['modem_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($modem_data['modem_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($modem_data['modem_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <center><input type="submit" class="btn btn-primary" value="Submit" id="submit_modem"></center>
	</form>
</div>
<?php
			}
			else if($report_data['printer_id'] != NULL){
				$sql1 = "SELECT * FROM printer WHERE printer_id='" . $report_data['printer_id'] . "'";
				$result1 = mysqli_query($conn, $sql1);
				$printer_data = $result1 -> fetch_assoc();
?>
<input type="text" id="report_id" value="<?php echo $report_id ?>" hidden>
<div>
	<center><h3>PRINTER NUMBER: <?php echo $printer_data['printer_number']; ?></h3></center> 
	<form id="printer_form" method="POST" action="http://smchardwaremon.000webhostapp.com/mobile-server/update-report.php">
		<input type="text" id="printer_id" value="<?php echo $printer_data['printer_id'] ?>" hidden>
	  <div class="form-group">
	    <label for="printer">Printer Status</label>
	    <select class="form-control" id="printer">
	    	<option value="working" <?php if($printer_data['mouse_status'] == 'working') echo "selected"; ?>>Working</option>
	    	<option value="missing" <?php if($printer_data['mouse_status'] == 'missing') echo "selected"; ?>>Missing</option>
	    	<option value="defective" <?php if($printer_data['mouse_status'] == 'defective') echo "selected"; ?>>Defective</option>
	    </select>
	  </div>
	  <center><input type="submit" class="btn btn-primary" value="Submit" id="submit_printer"></center>
	</form>
</div>
<?php
			}
		}
	}
	else{
		echo "No Data!";
	}
?>

<script type="text/javascript">
	function refresh(){
		if(window.localStorage["device"] == "mobile"){
			$("#loading").show();
			$("#container").hide();
			$.ajax({
				url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/reports.php",
				method: "POST",
				data: {'user_id': $("#user_id").val()},
				success: function(data){
					$("#loading").hide();
					$("#container").html("");
					$("#container").html(data);
					// $("#navigation").hide();
					$("#container").show();
				}
			});
		}
		else{
			location.reload();
		}
	}
	$("#modal_footer").hide();
	$("#pc_form").on('submit', function(e){
		e.preventDefault();
        var formData = new FormData(this);
        formData.append('report_id', $("#report_id").val());
        formData.append('pc_id', $("#pc_id").val());
        formData.append('mouse_status', $("#mouse").children("option:selected").val());
        formData.append('keyboard_status', $("#keyboard").children("option:selected").val());
        formData.append('monitor_status', $("#monitor").children("option:selected").val());
        formData.append('lan_status', $("#lan").children("option:selected").val());
        formData.append('sysunit_status', $("#sysunit").children("option:selected").val());
        formData.append('submit', $("#submit_pc").children("option:selected").val());
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	alert(data);
            	refresh();
            }
        });

	});
	$("#modem_form").on('submit', function(e){
		 e.preventDefault();
        var formData = new FormData(this);
        formData.append('modem_id', $("#modem_id").val());
        formData.append('report_id', $("#report_id").val());
        formData.append('modem_status', $("#modem").children("option:selected").val());
        formData.append('submit', $("#submit").children("option:selected").val());
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	alert(data);
            	refresh();
            }
        });
	});
	$("#printer_form").on('submit', function(e){
		e.preventDefault();
        var formData = new FormData(this);
        formData.append('printer_id', $("#printer_id").val());
        formData.append('report_id', $("#report_id").val());
        formData.append('printer_status', $("#printer").children("option:selected").val());
        formData.append('submit', $("#submit").children("option:selected").val());
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	alert(data);
            	refresh();
            }
        });
	});
</script>