<?php
	include "../includes/connect.php";
?>
<table>
<tr>
	<td>PC Number</td>
	<td>Description</td>
	<td></td>
	<td></td>
</tr>
<?php
	if(isset($_POST['id'])){
		$sql = "SELECT * FROM pc
			WHERE office_id = '
		" . $_POST['id'] . "'";
		$result = mysqli_query($conn, $sql);
		while($row = $result -> fetch_assoc()){
?>
	<tr>
		<td><?php echo $row['pc_number'];?></td>
		<td><?php echo $row['sysunit_desc'];?></td>
		<td><button class="open_pc btn btn-primary" value="<?php echo $row['pc_id']; ?>" data-toggle="modal" data-target="#exampleModalCenter">OPEN</button></td>
		<td><button class="delete_pc btn btn-danger" value="<?php echo $row['pc_id']; ?>">DELETE</button></td>
	</tr>
<?php
		}
?>
</table>

<table>
<tr>
	<td>Printer Number</td>
	<td>Description</td>
	<td></td>
	<td></td>
</tr>
<?php
		$sql = "SELECT * FROM printer
			WHERE office_id = '
		" . $_POST['id'] . "'";
		$result = mysqli_query($conn, $sql);
		while($row = $result -> fetch_assoc()){
?>
	<tr>
		<td><?php echo $row['printer_number'];?></td>
		<td><?php echo $row['printer_desc'];?></td>
		<td><button class="open_printer btn btn-primary" value="<?php echo $row['printer_id']; ?>" data-toggle="modal" data-target="#exampleModalCenter">OPEN</button></td>
		<td><button class="delete_printer btn btn-danger" value="<?php echo $row['printer_id']; ?>">DELETE</button></td>
	</tr>
<?php
		}
?>
</table>

<table>
<tr>
	<td>Modem Number</td>
	<td>Description</td>
	<td></td>
	<td></td>
</tr>
<?php
		$sql = "SELECT * FROM modem
			WHERE office_id = '
		" . $_POST['id'] . "'";
		$result = mysqli_query($conn, $sql);
		while($row = $result -> fetch_assoc()){
?>
	<tr>
		<td><?php echo $row['modem_number'];?></td>
		<td><?php echo $row['modem_desc'];?></td>
		<td><button class="open_modem btn btn-primary" value="<?php echo $row['modem_id']; ?>" data-toggle="modal" data-target="#exampleModalCenter">OPEN</button></td>
		<td><button class="delete_modem btn btn-danger" value="<?php echo $row['modem_id']; ?>">DELETE</button></td>
	</tr>
<?php
		}
	}
?>
</table>

<script type="text/javascript">
  $('.open_pc').click(function(){
  	console.log($(this).val());
  	var title = "PC: " + $(this).val();
    $("#id").val($(this).val());
    $("#type").val("pc");
    $.ajax({
      url: "https://smchardwaremon.000webhostapp.com/controller/get-hardware.php",
      method: "POST",
      data:{'pc_id': $(this).val()},
      success: function(data){
        console.log(title);
        $("#modal-body").html("");
        $("#modal_title").html("");
        $("#modal_title").append(title);
        $("#modal-body").append(data);
      }
    });
  });

  $('.open_printer').click(function(){
  	console.log($(this).val());
  	var title = "Printer: " + $(this).val();
  	$("#id").val($(this).val());
  	$("#type").val("printer");
  	$.ajax({
  		url: "https://smchardwaremon.000webhostapp.com/controller/get-printer.php",
  		method: "POST",
  		data:{'printer_id': $(this).val()},
  		success: function(data){
  			console.log(title);
  			$("#modal-body").html("");
		    $("#modal_title").html("");
		    $("#modal_title").append(title);
		    $("#modal-body").append(data);
	  }
  	});
  });

  $('.open_modem').click(function(){
  	console.log($(this).val());
  	var title = "modem: " + $(this).val();
  	$("#id").val($(this).val());
  	$("#type").val("modem");
  	$.ajax({
  		url: "https://smchardwaremon.000webhostapp.com/controller/get-modem.php",
  		method: "POST",
  		data:{'modem_id': $(this).val()},
  		success: function(data){
  			console.log(title);
  			$("#modal-body").html("");
		    $("#modal_title").html("");
		    $("#modal_title").append(title);
		    $("#modal-body").append(data);
	  }
  	});
  });

  $('.delete_pc').click(function(){
  	console.log($(this).val());
  	$.ajax({
  		url: "https://smchardwaremon.000webhostapp.com/controller/delete-pc.php",
  		method: "POST",
  		data:{'pc_id': $(this).val()},
  		success: function(data){
		    $.ajax({
		      url: "https://smchardwaremon.000webhostapp.com/controller/get-devices.php",
		      method: "POST",
		      data:{'id': $("#office").val()},
		      success: function(data){
		        $("#table_data").html("");
		        $("#table_data").append(data);
		      }
		    });
	  }
  	});
  });
    $('.delete_printer').click(function(){
  	console.log($(this).val());
  	$.ajax({
  		url: "https://smchardwaremon.000webhostapp.com/controller/delete-printer.php",
  		method: "POST",
  		data:{'printer_id': $(this).val()},
  		success: function(data){
		    $.ajax({
		      url: "https://smchardwaremon.000webhostapp.com/controller/get-devices.php",
		      method: "POST",
		      data:{'id': $("#office").val()},
		      success: function(data){
		        $("#table_data").html("");
		        $("#table_data").append(data);
		      }
		    });
	  }
  	});
  });
      $('.delete_modem').click(function(){
  	console.log($(this).val());
  	$.ajax({
  		url: "https://smchardwaremon.000webhostapp.com/controller/delete-modem.php",
  		method: "POST",
  		data:{'modem_id': $(this).val()},
  		success: function(data){
 		    $.ajax({
		      url: "https://smchardwaremon.000webhostapp.com/controller/get-devices.php",
		      method: "POST",
		      data:{'id': $("#office").val()},
		      success: function(data){
		        $("#table_data").html("");
		        $("#table_data").append(data);
		      }
		    });
	  }
  	});
  });
</script>
