<?php
	include "../../includes/connect.php";
?>
<br>
<br>
<br>
<div class="jumbotron">
	<form action="http://smchardwaremon.000webhostapp.com/mobile-server/personnel-register.php" method="POST" id="forms">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" aria-describedby="name1" placeholder="Name">
			<small id="name1" class="form-text text-muted">Please Enter Full Name</small>
		</div>
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
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" id="username" aria-describedby="username1" placeholder="Username">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" aria-describedby="password" placeholder="Password">
		</div>
		<center><input type="submit" name="submit" id="submit" value="Submit"></center>
	</form>
	
</div>
<script type="text/javascript">
	 $("#forms").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('name', $("#name").val());
        formData.append('office_id', $("#office_id").val());
        formData.append('username', $("#username").val());
        formData.append('password', $("#password").val());
        formData.append('submit', $("#submit").val());
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
            	alert(data);
            	$.ajax({
            		url: "http://smchardwaremon.000webhostapp.com/mobile-server/personnel-add-user.php",
            		method: "GET",
            		success: function(data){
            			$("#container").html("");
            			$("#container").html(data);
            		}
            	});
            }
        });
    });
</script>