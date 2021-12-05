<li class="nav-item active">
	<a class="nav-link" id="pc">PC <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
	<a class="nav-link" id="modem">Modem <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
	<a class="nav-link" id='printer'>Printer <span class="sr-only">(current)</span></a>
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
	$("#pc").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/pc.php",
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
	$("#modem").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/modem.php",
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
	$("#printer").click(function(){
		console.log($("#user_id").val());
		$("#loading").show();
		$("#container").hide();
		$.ajax({
			url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/printer.php",
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
	$("#logout").click(function(){
		console.log($("#user_id").val());
		window.localStorage.clear();
		$("#loading").show();
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
		});s
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