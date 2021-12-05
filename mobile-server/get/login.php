<div id="login">
    <center><h1 style="margin-top: 10%;">SMC Hardware<br>Monitoring</h1></center>
    <div id="ui" class="jumbotron" style="margin: 2%;">
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <center>
                <button class="btn btn-primary" id="login_btn">Login</button>
            </center>
    </div>
</div>

<script>
    window.localStorage["device"] = "mobile";
    $(document).ready(function(){
        if(window.localStorage["username"] != undefined && window.localStorage["password"] != undefined) {
            $("#login_btn").attr("disabled", "true");
            $("#login_btn").html("Logging in..");
            try{
                console.log("sending data..");
                $.ajax({
                    url: "http://smchardwaremon.000webhostapp.com/mobile-server/login-auth.php",
                    method: "POST",
                    data: {
                        'username': window.localStorage["username"],
                        'password': window.localStorage["password"]
                    },
                    success: function(response){
                        try{
                            console.log(response);
                            var profile_data = JSON.parse(response.toString());
                            window.localStorage['user_id'] = profile_data.user_id;
                            console.log(response);
                            if(profile_data.role == "admin"){
                                $.ajax({
                                    url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + ".php",
                                    method: "POST",
                                    data:{'user_id':profile_data.user_id},
                                    success: function(containerdata){
                                        $.ajax({
                                            url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + "-nav.php",
                                            method: "GET",
                                            success: function(navsdata){
                                                console.log(containerdata);
                                                console.log(profile_data.user_id);
                                                window.localStorage["user_id"] = profile_data.user_id;
                                                $("#user_id").val(profile_data.user_id);
                                                $("#role").val(profile_data.role);
                                                $("#navigation").show();
                                                $("#loading").hide();
                                                $("#container").show();
                                                $("#container").html("");
                                                $("#container").html(containerdata);
                                                $("#navs").html("");
                                                $("#navs").html(navsdata);
                                            }
                                        });
                                    }
                                });
                            }
                            else if(profile_data.role == "personnel"){
                                $.ajax({
                                    url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + ".php",
                                    method: "POST",
                                    data:{'user_id':profile_data.user_id},
                                    success: function(containerdata){
                                        $.ajax({
                                            url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + "-nav.php",
                                            method: "GET",
                                            success: function(navsdata){
                                                console.log(containerdata);
                                                console.log(profile_data.user_id);
                                                window.localStorage["user_id"] = profile_data.user_id;
                                                $("#user_id").val(profile_data.user_id);
                                                $("#role").val(profile_data.role);
                                                $("#navigation").show();
                                                $("#loading").hide();
                                                $("#container").show();
                                                $("#container").html("");
                                                $("#container").html(containerdata);
                                                $("#navs").html("");
                                                $("#navs").html(navsdata);
                                            }
                                        });
                                    }
                                });
                            }
                            else{
                                console.log("loading PC page");
                                $.ajax({
                                    url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/pc.php",
                                    method: "POST",
                                    data:{'user_id':profile_data.user_id},
                                    success: function(containerdata){
                                        $.ajax({
                                            url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + "-nav.php",
                                            method: "GET",
                                            success: function(navsdata){
                                                console.log(containerdata);
                                                console.log(profile_data.user_id);
                                                window.localStorage["user_id"] = profile_data.user_id;
                                                $("#user_id").val(profile_data.user_id);
                                                $("#role").val(profile_data.role);
                                                $("#navigation").show();
                                                $("#loading").hide();
                                                $("#container").show();
                                                $("#container").html("");
                                                $("#container").html(containerdata);
                                                $("#navs").html("");
                                                $("#navs").html(navsdata);
                                            }
                                        });
                                    }
                                });
                            }
                         }
                         catch(e){
                            $("#loading").hide();
                            $("#container").show();
                            console.log(e);
                            alert("recived data: " + response);
                            window.localStorage.clear();
                         }
                    }
                });
            }catch(e){
                console.log(e);
                alert(e);
            }
        }
    });
    $("#register_btn").click(function(){
        alert("This Button is under development");
        // $.ajax({
        //     url: "https://smchardwaremon.000webhostapp.com/mobile-server/get/register.php",
        //     method: "GET",
        //     success: function(data){
        //         $("#container").html("");
        //         $("#container").html(data);
        //     }
        // });
    });

    $('#login_btn').click(function(){
        $("#container").hide();
        $("#loading").show();
        console.log("clicked login");
        try{
            console.log("sending data..");
            $.ajax({
                url: "http://smchardwaremon.000webhostapp.com/mobile-server/login-auth.php",
                method: "POST",
                data: {
                    'username': $("#username").val(),
                    'password': $("#password").val()
                },
                success: function(response){
                    try{
                        console.log(response);
                        var profile_data = JSON.parse(response.toString());
                        console.log(response);
                        window.localStorage["username"] = $("#username").val();
                        window.localStorage["password"] = $("#password").val();
                        if(profile_data.role == "admin"){
                            $.ajax({
                                url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + ".php",
                                method: "POST",
                                data:{'user_id':profile_data.user_id},
                                success: function(containerdata){
                                    $.ajax({
                                        url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + "-nav.php",
                                        method: "GET",
                                        success: function(navsdata){
                                            console.log(containerdata);
                                            console.log(profile_data.user_id);
                                            window.localStorage["user_id"] = profile_data.user_id;
                                            $("#user_id").val(profile_data.user_id);
                                            $("#role").val(profile_data.role);
                                            $("#navigation").show();
                                            $("#loading").hide();
                                            $("#container").show();
                                            $("#container").html("");
                                            $("#container").html(containerdata);
                                            $("#navs").html("");
                                            $("#navs").html(navsdata);
                                        }
                                    });
                                }
                            });
                        }
                        else if(profile_data.role == "personnel"){
                            $.ajax({
                                url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + ".php",
                                method: "POST",
                                data:{'user_id':profile_data.user_id},
                                success: function(containerdata){
                                    $.ajax({
                                        url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + "-nav.php",
                                        method: "GET",
                                        success: function(navsdata){
                                            console.log(containerdata);
                                            console.log(profile_data.user_id);
                                            window.localStorage["user_id"] = profile_data.user_id;
                                            $("#user_id").val(profile_data.user_id);
                                            $("#role").val(profile_data.role);
                                            $("#navigation").show();
                                            $("#loading").hide();
                                            $("#container").show();
                                            $("#container").html("");
                                            $("#container").html(containerdata);
                                            $("#navs").html("");
                                            $("#navs").html(navsdata);
                                        }
                                    });
                                }
                            });
                        }
                        else{
                            $.ajax({
                                url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/pc.php",
                                method: "POST",
                                data:{'user_id':profile_data.user_id},
                                success: function(containerdata){
                                    $.ajax({
                                        url: "http://smchardwaremon.000webhostapp.com/mobile-server/get/" + profile_data.role + "-nav.php",
                                        method: "GET",
                                        success: function(navsdata){
                                            console.log(containerdata);
                                            console.log(profile_data.user_id);
                                            window.localStorage["user_id"] = profile_data.user_id;
                                            $("#user_id").val(profile_data.user_id);
                                            $("#role").val(profile_data.role);
                                            $("#navigation").show();
                                            $("#loading").hide();
                                            $("#container").show();
                                            $("#container").html("");
                                            $("#container").html(containerdata);
                                            $("#navs").html("");
                                            $("#navs").html(navsdata);
                                        }
                                    });
                                }
                            });
                        }
                     }
                     catch(e){
                        $("#loading").hide();
                        $("#container").show();
                        console.log(e);
                        alert("recived data: " + response + "\n" + e);
                        window.localStorage.clear();
                     }
                }
            });
        }catch(e){
            console.log(e);
            alert(e);
        }
    });

</script>