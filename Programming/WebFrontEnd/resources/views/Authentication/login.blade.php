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
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
    <style>
        #dis1 {
            border-radius: 20px;
            padding: 40px;
        }

        #dis2 {
            height: 30px;
            width: 10px;
        }

        #login_password {
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

<body class="hold-transition login-page">
    <div id="loading">
        <span class="loader"></span>
        <div class="textLoader">
            <center>
                <b>Please Wait ... </b>
            </center>
        </div>
    </div>

    <div class="login-box">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="login-logo">
            <img src="/AdminLTE-master/dist/img/qdc.png" width="160" alt=""><br>
        </div>
        <!-- /.login-logo -->
        <div id="cek1">
            <div class="card-body login-card-body" id="dis1">
                <form action="{{ route('loginStore') }}" method="post" name="FormLogin" id="FormLogin">
                    @csrf
                    <div class=" input-group mb-4">
                        <input type="text" class="form-control username" placeholder="Username" name="username" id="dis2" required="" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control password" placeholder="Password" name="password" id="login_password" required="" autocomplete="off">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="input-group-btn" id="eyeSlash" onclick="ShowHidePass()">
                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                </span>
                                <span class="input-group-btn" id="eyeShow" style="display: none;" onclick="ShowHidePass()">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>

                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <select class="form-control branch_name" name="branch_name" id="dis2">
                            <option selected="selected" value=""> Select Company Name </option>
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

                            <!-- <a class="btn btn-primary btn-block btn-sm submit_before" style="color: white;">Login</a>
                            <button class="btn btn-primary btn-block btn-sm submit_after" type="submit" style="color: white;">Login</button> -->


                            <button class="btn btn-primary btn-block btn-sm submit_button" type="submit" style="color: white;">Login</button>

                        </div>
                    </div>
                </form>
            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>


    <!-- FUNCTION SHOW HIDE -->

    <script>
        function ShowLoading() {
            $("#loading").show();
            $(".loader").show();
        }

        function HideLoading() {
            $("#loading").hide();
            $(".loader").hide();
        }
    </script>



    <!-- END FUNCTION SHOW HIDE -->

    <script>
        function ShowHidePass() {
            var x = document.getElementById('login_password');
            if (x.type === 'password') {
                x.type = "text";
                $('#eyeShow').show();
                $('#eyeSlash').hide();
            } else {
                x.type = "password";
                $('#eyeShow').hide();
                $('#eyeSlash').show();
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            HideLoading();
            
            $(".branch_name").hide();
            $(".user_role").hide();
        });
    </script>

    <script>
        $(function() {
            $("#FormLogin").on("submit", function(e) { //id of form 
                e.preventDefault();
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method
                var form_data = new FormData($(this)[0]); // convert form into formdata 
                var form = $(this);

                ShowLoading();

                $.ajax({
                    url: action,
                    dataType: 'json', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {

                        var len = 0;

                        if (response.status_code == 0) {

                            HideLoading();
                            Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");

                        } else if (response.status_code == 1) {

                            window.location.href = '/dashboard';

                        } else if (response.status_code == 2) {

                            HideLoading();

                            $(".branch_name").empty();

                            var option = "<option value='" + '' + "'>" + 'Select Company Name' + "</option>";
                            $(".branch_name").append(option);

                            len = response.data.length;
                            for (var i = 0; i < len; i++) {
                                var id = response.data[i].branch_RefID;
                                var name = response.data[i].branchName;
                                var option2 = "<option value='" + id + "'>" + name + "</option>";
                                $(".branch_name").append(option2);
                            }
                            $(".username").prop("readonly", true);
                            $(".password").prop("readonly", true);
                            $(".branch_name").show();
                            $(".user_role").show();

                            $(".submit_button").prop("disabled", true);
                        }
                    },
                    error: function(response) { // handle the error

                        HideLoading();

                        Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");
                    },

                })
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
                if (id != "") {

                    ShowLoading();

                    $.ajax({
                        type: 'GET',
                        url: '{!! route("getRoleLogin") !!}?username=' + $('.username').val() + '&password=' + $('.password').val() + '&branch_name=' + $('.branch_name').val(),
                        success: function(data) {
                            var len = 0;
                            if (data == '401') {
                                Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");

                                HideLoading();

                            } else {

                                HideLoading();

                                $(".user_role").empty();

                                var option = "<option value='" + '' + "'>" + 'Select User Role' + "</option>";
                                $(".user_role").append(option);

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

                            HideLoading();
                        }
                    });
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".user_role").click(function() {
                var id = $(this).val();
                if (id != "") {
                    $(".submit_button").prop("disabled", false);
                } else {
                    $(".submit_button").prop("disabled", true);
                }

            });
        });
    </script>

</body>

</html>