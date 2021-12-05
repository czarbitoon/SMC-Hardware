<?php
	include "../../includes/connect_mobile.php";
	if(isset($_POST["user_id"])){
        $user_id = $_POST["user_id"];
        $sql = "SELECT * FROM users WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $sql);
        $data = $result->fetch_assoc();
?>
<div class="container mt-5">
    <div class=".col-xs-4 .col-md-offset-2">
        <div class="panel panel-default panel-info Profile">
        <center><img src="https://smchardwaremon.000webhostapp.com/image/user-image/<?php echo $data["user_img"] ?>" width="100" alt="error loading image"></center>
        <div class="panel-heading"> My Profile </div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="name" placeholder="Name" value="<?php echo $data["name"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="username" placeholder="Username" value="<?php echo $data["username"] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-4">
                                <input class="form-control" type="password" id="password" placeholder="Password" value="<?php echo $data["password"] ?>">
                        </div>
                    </div>    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Role</label>
                        <div class="col-sm-4">
                                <input class="form-control" type="text" name="role" value="<?php echo $data["role"] ?>" readonly>
                        </div>
                    </div>        
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-4">
                                <input class="form-control" type="file" id="image" placeholder="Image">
                        </div>
                    </div>     
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <button class="btn btn-primary" id="update">Update</button>
                        </div>
                    </div>
                </div>  <!-- end form-horizontal -->
            </div> <!-- end panel-body -->
        </div> <!-- end panel -->
    </div> <!-- end size -->
</div> <!-- end container-fluid -->
<?php
    }
?>
<script>
    $("#update").click(function(){
        var file_data = $('#image').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('image', file_data);
        form_data.append('user_id', window.localStorage["user_id"]);
        form_data.append('name', $("#name").val());
        form_data.append('username', $("#username").val());
        form_data.append('password', $("#password").val());
        $.ajax({
            url: 'http://smchardwaremon.000webhostapp.com/mobile-server/update-profile.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'POST',
            success: function(d){
                alert(d);
                $.ajax({
                    url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/profile.php",
                    method: "POST",
                    data: {'user_id': window.localStorage["user_id"]},
                    success: function(data){
                        $("#loading").hide();
                        $("#container").html("");
                        $("#container").html(data);
                        $("#container").show();
                    }
                });
            }
        });
    });

</script>