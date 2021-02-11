<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login ERP QDC</title>
    <link rel="shortcut icon" href="/AdminLTE-master/dist/img/favicon.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
    <!-- sweetalert -->
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <style>
        #dis1 {
            border-radius: 20px;
            padding: 40px;
        }

        #dis2 {
            height: 30px;
            width: 10px;
        }

        #loading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: center no-repeat #fff;
        }

        /*-- css spin --*/
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /*-- css loader --*/
        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .loader {
            border-left: 10px solid blue;
            border-top: 10px solid red;
            border-bottom: 10px solid yellow;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            left: 43.5%;
            top: 20%;
            -webkit-animation: spin 2s linear infinite;
            position: fixed;
            animation: spin 2s linear infinite;
        }

        .textLoader {
            position: fixed;
            top: 56%;
            left: 44.5%;
            color: #34495e;
            font-size: 17px;
        }

        /*-- responsive --*/
        @media screen and (max-width: 1034px) {
            .textLoader {
                left: 46.2%;
            }
        }

        @media screen and (max-width: 824px) {
            .textLoader {
                left: 47.2%;
            }
        }

        @media screen and (max-width: 732px) {
            .textLoader {
                left: 48.2%;
            }
        }

        @media screen and (max-width: 500px) {
            .loader {
                left: 36.5%;
                ;
            }

            .textLoader {
                left: 40.5%;
            }
        }

        @media screen and (max-height: 432px) {
            .textLoader {
                top: 65%;
            }
        }

        @media screen and (max-height: 350px) {
            .textLoader {
                top: 75%;
            }
        }

        @media screen and (max-height: 312px) {
            .textLoader {
                display: none;
            }
        }

        /*-- responsive --*/
    </style>
</head>

<body class="hold-transition login-page" onload="loader()">
    <div id="loading">
        <span class="loader"></span>
        <div class="textLoader">
            <center>
            <b>Please Wait ... </b>
            </center>
        </div>
    </div>
    <div class="login-box">
        <div class="login-logo">
            <img src="/AdminLTE-master/dist/img/qdc.png" width="160" alt=""><br>
        </div>
        <!-- /.login-logo -->
        <div id="cek1">
            <div class="card-body login-card-body" id="dis1">
                <form action="#" method="post" name="formLogin">
                    @csrf
                    <div class="input-group mb-4">
                        <input type="text" class="form-control username" placeholder="Username" name="username" id="dis2" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control password" placeholder="Password" name="password" id="dis2" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <select class="form-control branch_name" name="branch_name" id="dis2">
                            <option selected="selected" value=""> Select Branch Name </option>
                        </select>
                    </div>
                    <div class="input-group mb-4">
                        <select class="form-control user_role" name="user_role" id="dis2">
                            <option selected="selected" value=""> Select User Role </option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <a class="btn btn-primary btn-block btn-sm submits" style="color: white;">Login</a>
                            <a class="btn btn-primary btn-block btn-sm submitx" href="javascript:validateFormLogin()" style="color: white;">Login</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE-master/dist/js/adminlte.min.js') }}"></script>
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".branch_name").hide();
            $(".user_role").hide();
            $(".login").hide();
            $(".submitx").hide();
            $("#loading").hide();
            $(".loader").hide();            
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $(".submits").click(function() {

                $.ajax({
                    type: 'GET',
                    url: '{!! route('auth.loginStore') !!}?username=' + $('.username').val() + '&password=' + $('.password').val(),
                    success: function(data) {
                        console.log(data);
                        var len = 0;
                        if (data == '401') {
                            Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");
                        } else {
                            var delay = 500;
                            $(document).ready(function() {
                                $("#loading").show();
                                $(".loader").show();

                                setTimeout(function() {
                                    $("#loading").hide();
                                    $(".loader").hide();
                                }, delay);
                            });

                            len = data.length;
                            for (var i = 0; i < len; i++) {
                                var id = data[i].branch_RefID;
                                var name = data[i].branchName;
                                var option = "<option value='" + id + "'>" + name + "</option>";
                                $(".branch_name").append(option);
                            }
                            $(".username").prop("disabled", true);
                            $(".password").prop("disabled", true);
                            $(".branch_name").show();
                            $(".user_role").show();
                            $(".submits").hide();
                            $(".submitx").show();
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $(".branch_name").click(function() {

                var id = $(this).val();

                if(id != ""){
                    $.ajax({
                        type: 'GET',
                        url: '{!! route('auth.loginStores') !!}?username=' + $('.username').val() + '&password=' + $('.password').val(),
                        success: function(data) {
                            console.log(data);
                            var len = 0;
                            if (data == '401') {
                                Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");
                            } else {
                                var delay = 500;
                                $(document).ready(function() {
                                    $("#loading").show();
                                    $(".loader").show();

                                    setTimeout(function() {
                                        $("#loading").hide();
                                        $(".loader").hide();
                                    }, delay);
                                });

                                len = data.length;
                                for (var i = 0; i < len; i++) {
                                    var ids = data[i].userRole_RefID;
                                    var names = data[i].userRoleName;
                                    var option = "<option value='" + ids + "'>" + names + "</option>";
                                    $(".user_role").append(option);
                                }
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");
                        }
                    });
                }
            });
        });
    </script>
    <script>
        function validateFormLogin() {
            var branch_name = document.forms["formLogin"]["branch_name"].value;
            var user_role = document.forms["formLogin"]["user_role"].value;
            if (branch_name == "") {
                Swal.fire("Error !", "Branch name tidak boleh kosong !", "error");
            }
            else if (user_role == "") {
                Swal.fire("Error !", "User role tidak boleh kosong !", "error");
            }
            else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $(document).ready(function() {
                    $.ajax({
                        type: 'GET',
                        url: '{!! route('auth.loginStorex') !!}?username=' + $('.username').val() + '&password=' + $('.password').val(),
                        success: function(data) {
                            if (data == '401') {
                                window.location.href = "/";
                            } else {
                                window.location.href = "projectDashboard";
                            }
                        },
                    });
                });
            }
        }
    </script>
</body>
</html>