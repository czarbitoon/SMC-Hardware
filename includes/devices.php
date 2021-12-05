<br><br><br>
<h1>Devices</h1>
<div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Select Office</label>
          </div>
          <select class="custom-select" id="office">
            <option selected disabled>Choose Office</option>
            <?php
              $sql = "SELECT * FROM office";
              $result = mysqli_query($conn, $sql);
              while($row = $result -> fetch_assoc()){
            ?>
            <option value="<?php echo $row['office_id'];?>"><?php echo $row['name']; ?></option>
            <?php
              }
            ?>
          </select>
          <button class="btn btn-primary" id="addDevice" data-toggle="modal" data-target="#exampleModalCenter">Add Device</button>
        </div>

<div id="table_data" class="jumbotron">
  
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <input type="text" id="id" hidden>
    <input type="text" id="type" hidden>
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
        <button type="button" id="save" class="btn btn-primary" data-dismiss="modal">Save changes</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $("#office").change(function(){
    $("#action").val("edit");
    $.ajax({
      url: "https://smchardwaremon.000webhostapp.com/controller/get-devices.php",
      method: "POST",
      data:{'id': $("#office").val()},
      success: function(data){
        $("#table_data").html("");
        $("#table_data").append(data);
      }
    });
  });
  $("#addDevice").click(function(){
    $("#action").val("add");
     $.ajax({
      url: "https://smchardwaremon.000webhostapp.com/includes/add-device.php",
      method: "GET",
      success: function(data){
        $("#modal-body").html("");
        $("#modal-body").append(data);
      }
    });
  });
  $("#save").click(function(){
    if($("#action").val() == "edit"){
      if($("#type").val() == "pc"){
        var pc_id = $("#id").val();
        var sysunit_desc = $("#sysunit_desc").val();
        var sysunit_status = $("#sysunit_status").val();
        var monitor_desc = $("#monitor_desc").val();
        var monitor_status = $("#monitor_status").val();
        var mouse_desc = $("#mouse_desc").val();
        var mouse_status = $("#mouse_status").val();
        var keyboard_desc = $("#keyboard_desc").val();
        var keyboard_status = $("#keyboard_status").val();
        var lan_desc = $("#lan_desc").val();
        var lan_status = $("#lan_status").val();
        $.ajax({
          url: "https://smchardwaremon.000webhostapp.com/controller/update-pc.php",
          method: "POST",
          data: {
            'pc_id' : pc_id,
            'sysunit_desc' : sysunit_desc,
            'sysunit_status': sysunit_status,
            'monitor_desc' : monitor_desc,
            'monitor_status' : monitor_status,
            'mouse_desc' : mouse_desc,
            'mouse_status' : mouse_status,
            'keyboard_desc' : keyboard_desc,
            'keyboard_status' : keyboard_status,
            'lan_desc' : lan_desc,
            'lan_status': lan_status
          },
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
      }
      else if($("#type").val() == "printer"){
        var printer_id = $("#id").val();
        var printer_desc = $("#printer_desc").val();
        var printer_status = $("#printer_status").val();
        $.ajax({
          url: "https://smchardwaremon.000webhostapp.com/controller/update-printer.php",
           method: "POST",
          data: {
            'printer_id' : printer_id,
            'printer_desc' : printer_desc,
            'printer_status': printer_status,
          },
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
      }
      else if($("#type").val() == "modem"){
        var modem_id = $("#id").val();
        var modem_desc = $("#modem_desc").val();
        var modem_status = $("#modem_status").val();
        $.ajax({
          url: "https://smchardwaremon.000webhostapp.com/controller/update-modem.php",
           method: "POST",
          data: {
            'modem_id' : modem_id,
            'modem_desc' : modem_desc,
            'modem_status': modem_status,
          },
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
      }
    }else if($("#action").val() == "add"){
      console.log($("#type").val());
      if($("#type").val() == "pc"){
        var pc_number = $("#pc_number").val();
        var office_id = $("#office_id").val();
        var sysunit_desc = $("#sysunit_desc").val();
        var monitor_desc = $("#monitor_desc").val();
        var mouse_desc = $("#mouse_desc").val();
        var keyboard_desc = $("#keyboard_desc").val();
        var lan_desc = $("#lan_desc").val();
        $.ajax({
          url: "https://smchardwaremon.000webhostapp.com/controller/add-pc.php",
          method: "POST",
          data: {
            'pc_number' : pc_number,
            'office_id' : office_id,
            'sysunit_desc' : sysunit_desc,
            'monitor_desc' : monitor_desc,
            'mouse_desc' : mouse_desc,
            'keyboard_desc' : keyboard_desc,
            'lan_desc' : lan_desc,
          },
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
      }    
      else if($("#type").val() == "printer"){
        var printer_number = $("#printer_number").val();
        console.log(printer_number);
        var office_id = $("#office_id").val();
        var printer_desc = $("#printer_desc").val();
        $.ajax({
          url: "https://smchardwaremon.000webhostapp.com/controller/add-printer.php",
          method: "POST",
          data: {
            'printer_number' : printer_number,
            'office_id' : office_id,
            'printer_desc' : printer_desc,
          },
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
     }
     else if($("#type").val() == "modem"){
        var modem_number = $("#modem_number").val();
        var office_id = $("#office_id").val();
        var modem_desc = $("#modem_desc").val();
        $.ajax({
          url: "https://smchardwaremon.000webhostapp.com/controller/add-modem.php",
          method: "POST",
          data: {
            'modem_number' : modem_number,
            'office_id' : office_id,
            'modem_desc' : modem_desc,
          },
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
     }
    }
  });
</script>