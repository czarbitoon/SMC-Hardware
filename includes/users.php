<br><br><br>
<h1>Users</h1>

<button class="btn btn-primary" id="addUser" data-toggle="modal" data-target="#userModal">Add User</button>

<div id="table_data" class="jumbotron">
 	<table class="table table-hover">
		<thead>
		<tr class="table-dark">
			<th scope="col">User Name</th>
			<th scope="col"></th>
			<th scope="col"></th>
		</tr>
		</thead>
 		<?php
		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		while($row = $result -> fetch_assoc()){
?>
		<tr class="table-dark">
			<td class="table-info"><?php echo $row['username']?></td>
			<td class="table-info"><button class="open_user btn btn-primary" value="<?php echo $row['user_id']; ?>" data-toggle="modal" data-target="#userModal">OPEN</button></td>
		<td class="table-info"><button class="delete_user btn btn-danger" value="<?php echo $row['user_id']; ?>">DELETE</button></td>
		</tr>
		<?php
	}
	?>
</table>
</div>

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  	<input type="text" id="user_id" hidden>
    <input type="text" id="id" hidden>
    <input type="text" id="action" hidden>
      <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="modal_title"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="saveUser" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('.open_user').click(function(){
		$("#action").val("edit");
		var title = "user: " + $(this).val();
		$("#user_id").val($(this).val());
		console.log($(this).val());
		$.ajax({
			url: "https://smchardwaremon.000webhostapp.com/controller/get-users.php",
  		method: "POST",
  		data:{'user_id': $(this).val()},
  		success: function(data){
  			$("#modal-body").html("");
  			$("#modal-body").html(data);	
  		}
		});
	});
	
	$('#saveUser').click(function(){
		if($("#action").val() == "edit"){
			var user_id = $('#user_id').val();
			var username = $('#username').val();
			var name = $('#name').val();
			var office_id = $('#office_id').val();
			console.log(office_id);
			$.ajax({
				 url: "https://smchardwaremon.000webhostapp.com/controller/update-user.php",
	          method: "POST",
	          data: {
	          	'user_id' : user_id,
	          	'username' : username,
	          	'name' : name,
	          	'office_id' : office_id,
	          },
	          success: function(data){
	  			$("#modal-body").html("");
	  			$("#modal-body").html(data);
	          }
			});
		}else if($("#action").val() == "add"){
			$.ajax({
				url: "https://smchardwaremon.000webhostapp.com/controller/add-user.php",
				method: "POST",
				data:{
					'username': $("#username").val(),
					'name': $("#name").val(),
					'office_id': $("#office_id").val(),
					'password': $("#password").val(),
				},
				success:function(data){
				$("#modal-body").html("");
	  			$("#modal-body").html(data);
				}
			});
		}
	});

	$("#addUser").click(function(){
		$("#action").val("add");
		$.ajax({
			url: "https://smchardwaremon.000webhostapp.com/includes/user_form.php",
		  method: "GET",
		  success: function(data){
		  	$("#modal-body").html("");
  			$("#modal-body").html(data);
		  }
		});
	});		
	$('.delete_user').click(function(){
		console.log($(this).val());
		$.ajax({
			url: "https://smchardwaremon.000webhostapp.com/controller/delete-user.php",
			method:"POST",
			data:{'user_id': $(this).val()},
			success: function(data){
				console.log(data)
			}
		});
	});
</script>