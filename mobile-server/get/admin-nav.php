<li class="nav-item active">
	<a class="nav-link" id="get_reports">Reports <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
	<a class="nav-link" id="add_user">Add User <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
	<a class="nav-link" id="devices">Devices <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Account
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	<a class="dropdown-item" id="view_profile">View Profile</a>
	<a class="dropdown-item" id="logout">Logout</a>
</div>
</li>
<script type="text/javascript">
	$("#get_reports").click(function(){
		console.log($("#user_id").val());
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
	});
	$("#add_user").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/admin-add-user.php",
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
	});
	$("#devices").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/personnel.php",
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
	});
	$("#logout").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		window.localStorage.clear();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/login.php",
			method: "POST",
			data: {'user_id': $("#user_id").val()},
			success: function(data){
				$("#loading").hide();
				$("#container").html("");
				$("#container").html(data);
				$("#navigation").hide();
				$("#container").show();
			}
		});
	});
	$("#view_profile").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/profile.php",
			method: "POST",
			data: {'user_id': $("#user_id").val()},
			success: function(data){
				$("#loading").hide();
				$("#container").html("");
				$("#container").html(data);
				$("#container").show();
			}
		});
	});
</script>