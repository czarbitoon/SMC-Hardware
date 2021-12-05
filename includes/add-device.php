<?php
    header('Access-Control-Allow-Origin: *');
?>
<div class="input-group mb-3">
	<div class="input-group-prepend">
	<label class="input-group-text" for="inputGroupSelect01">Select Device</label>
	</div>
	<select class="custom-select" id="device">
		<option selected disabled>Choose Device</option>
		<option value="pc">PC</option>
		<option value="printer">Printer</option>
		<option value="modem">Modem</option>
	</select>
</div>

<div id="form_content">
	
</div>


<script type="text/javascript">
	$("#device").change(function(){
		$.get("includes/" + $("#device").val() + "_form.php", function(data){
			$("#type").val($("#device").val());
		    $("#form_content").html(data);
		});
	});
</script>