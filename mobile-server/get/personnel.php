<?php
	include "../../includes/connect.php";
?>
<br>
<br>
<br>
<br>
<div class="jumbotron">
	<div class="form-group">
		<label for="office_id">Select Office</label>
		<select class="form-control" id="office_id">
			<?php
				$sql = "SELECT * FROM office";
				$result = mysqli_query($conn, $sql);
				while($office_data = $result -> fetch_assoc()){
					echo "<option value='" . $office_data['office_id'] . "'>" . $office_data['name'] . "</option>";
				}
			?>
		</select>
	</div>
	<div id="data">
		
	</div>
</div>
<script type="text/javascript">
	$("#office_id").change(function(){
		console.log($(this).val());
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get-device.php",
			method: "POST",
			data: {
				'office_id': $(this).val()
			},
			success: function(data){
				$("#data").html("");
				$("#data").html(data);
			}

		});
	});
</script>