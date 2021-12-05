<br><br><br>
<h1>Offices</h1>

<button class="btn btn-primary" id="addOffice" data-toggle="modal" data-target="#officeModal">Add Office</button>
<div class="alert alert-danger" role="alert">Note: Deleting office deletes all the devices</div>
<div id="table_data" class="jumbotron">
 	<table>
		<tr>
			<td>Office Name</td>
			<td></td>
			<td></td>
		</tr>
 		<?php

		$sql = "SELECT * FROM office";
		$result = mysqli_query($conn, $sql);
		while($row = $result -> fetch_assoc()){
?>
		<tr>
			<td><?php echo $row['name']?></td>
			<td><button class="open_office btn btn-primary" value="<?php echo $row['office_id']; ?>" data-toggle="modal" data-target="#officeModal">OPEN</button></td>
		<td><button class="delete_office btn btn-danger" value="<?php echo $row['office_id']; ?>">DELETE</button></td>
		</tr>
		<?php
	}
	?>
</table>
</div>

<div class="modal fade" id="officeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
  	<input type="text" id="office_id" hidden>
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
        <button type="button" id="saveOffice" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('.open_office').click(function(){
		$("#action").val("edit");
		var title = "office: " + $(this).val();
		$("#office_id").val($(this).val());
		console.log($(this).val());
		$.ajax({
			url: "https://smchardwaremon.000webhostapp.com/controller/get-offices.php",
  		method: "POST",
  		data:{'office_id': $(this).val()},
  		success: function(data){
  			$("#modal-body").html("");
  			$("#modal-body").html(data);	
  		}
		});
	});
	
	$('#saveOffice').click(function(){
		if($("#action").val() == "edit"){
			var office_id = $('#office_id').val();
			var name = $('#name').val();
			console.log(office_id);
			console.log(name);
			$.ajax({
				 url: "https://smchardwaremon.000webhostapp.com/controller/update-offices.php",
	          method: "POST",
	          data: {
	          	'office_id' : office_id,
	          	'name' : name
	          },
	          success: function(data){
	  			$("#modal-body").html("");
	  			$("#modal-body").html(data);
	          }
			});
		}else if($("#action").val() == "add"){
			$.ajax({
				url: "https://smchardwaremon.000webhostapp.com/controller/add-office.php",
				method: "POST",
				data:{'name': $("#name").val()},
				success:function(data){
				$("#modal-body").html("");
	  			$("#modal-body").html(data);
				}
			});
		}
	});

	$("#addOffice").click(function(){
		$("#action").val("add");
		$.ajax({
			url: "https://smchardwaremon.000webhostapp.com/includes/office_form.php",
		  method: "GET",
		  success: function(data){
		  	$("#modal-body").html("");
  			$("#modal-body").html(data);
		  }
		});
	});		
	$('.delete_office').click(function(){
		console.log($(this).val());
		$.ajax({
			url: "https://smchardwaremon.000webhostapp.com/controller/delete-office.php",
			method:"POST",
			data:{'office_id': $(this).val()},
			success: function(data){
				console.log(data)
			}
		});
	});
</script>