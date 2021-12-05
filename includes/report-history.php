<?php
	$sql = "SELECT * FROM reports";
	$result = mysqli_query($conn, $sql);
?>
<br>
<br>
<br>
<br>
<center><h2>Report History</h2></center>
<table id="table-history" class="table table-striped table-bordered table-sm" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Report ID</th>
      <th class="th-sm">Office Name</th>
      <th class="th-sm">Device Type</th>
      <th class="th-sm">Reported By</th>
      <th class="th-sm">Date Time Reported</th>
      <th class="th-sm">Status</th>
      <th class="th-sm"></th>
    </tr>
  </thead>
  <tbody>
  	<?php while($reports = $result -> fetch_assoc()){ ?>
  	<tr>
	  	<?php
  			$sql1 = "SELECT * FROM users WHERE user_id = '" . $reports['reported_by'] . "'";
  			$result1 = mysqli_query($conn, $sql1);
  			$users = $result1 -> fetch_assoc();
  			$sql2 = "SELECT * FROM office WHERE office_id ='" . $reports['office_id'] . "'";
  			$result2 = mysqli_query($conn, $sql2);
  			$office = $result2 -> fetch_assoc();
  			echo "<td>" . $reports['report_id'] . "</td>";
  			echo "<td>" . $office['name'] . "</td>";
  			if($reports['pc_id'] != NULL){
  				echo "<td>PC</td>";
  			}
  			if($reports['modem_id'] != NULL){
  				echo "<td>Modem</td>";
  			}
  			if($reports['printer_id'] != NULL){
  				echo "<td>Printer</td>";
  			}
  			echo "<td>" . $users['name'] . "</td>";
  			echo "<td>" . $reports['date_reported'] . "</td>";
  			echo ($reports['is_checked'] == 'true') ? "<td style='color:green'>Checked!</td>" : "<td style='color:red'>Pending</td>";
  			echo "<td><button value='" . $reports['report_id'] . "' class='btn btn-primary show-details' data-toggle='modal' data-target='#exampleModal'>Show Details</button></td>";
	  	?>
  	</tr>
  	<?php } ?>
  </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="details-data">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	$('.show-details').click(function(){
		$.ajax({
			 url: "https://smchardwaremon.000webhostapp.com/controller/get_report_data.php",
          method: "POST",
          data: {
          	'report_id' : $(this).val()
          },
          success: function(data){
  			$("#details-data").html("");
  			$("#details-data").html(data);
          }
		});
	});
	$(document).ready(function () {
	  $('#table-history').DataTable();
	  $('.dataTables_length').addClass('bs-select');
	});
</script>