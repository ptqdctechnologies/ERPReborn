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
    <!-- Loading css -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/loading.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
    </style>
</head>

<body class="hold-transition login-page">
    <div id="loading" style="display: none;">
        <span class="loader"></span>
        <div class="textLoader">
            <b>Please Wait ...</b>
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

        <div class="login-logo" style="margin-top: -6rem;">
            <img src="/AdminLTE-master/dist/img/erp_qdc.png" height="260" alt=""><br>
            <!-- <img src="/AdminLTE-master/dist/img/qdc.png" width="160" alt=""><br> -->
        </div>
        <!-- /.login-logo -->

        <div id="cek1" style="margin-top: -4rem;">
            <div class="card-body login-card-body position-relative" id="dis1">
                <form action="{{ route('loginStore') }}" method="post" name="FormLogin" id="FormLogin">
                    @csrf

                    <input type="hidden" class="user_RefID" name="user_RefID">
                    <input type="hidden" class="varAPIWebToken" name="varAPIWebToken">
                    <input type="hidden" class="personName" name="personName">
                    <input type="hidden" class="workerCareerInternal_RefID" name="workerCareerInternal_RefID">
                    <input type="hidden" class="organizationalDepartmentName" name="organizationalDepartmentName">

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
                    <div class="input-group mb-4" id="branch">
                        <select class="form-control branch_id" name="branch_id" id="branch_id">
                            <option selected="selected" value=""> Select Company Name </option>
                        </select>
                    </div>
                    <div class="input-group mb-4" id="role">
                        <select class="form-control role_id" name="role_id" id="role_id">
                            <option selected="selected" value=""> Select User Role </option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button class="btn btn-primary btn-block btn-sm submit_button" type="submit" style="color: white;">Login</button>
                        </div>
                    </div>
                </form>

                <div class="position-absolute mt-1" style="right: 2.5rem;">
                    <img src="/AdminLTE-master/dist/img/qdc.png" height="17" alt="logo-qdc">
                </div>
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
    <!-- Select2 -->
    <script src="{{ asset('AdminLTE-master/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- FUNCTION SELECT 2 IN COMBO BOX-->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('#branch_id').select2({
                theme: 'bootstrap4'
            });

            $('#role_id').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#role").hide();
            $("#branch").hide();
        });
    </script>

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

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                        console.log('response FormLogin', response);
                    
                        var len = 0;
                        if (response.status_code == 0) {

                            HideLoading();
                            Swal.fire("Cancelled", "Make sure the username and password are correct", "error");

                        } else if (response.status_code == 1) {

                            window.location.href = '/dashboard';

                        } else if (response.status_code == 2) {

                            HideLoading();

                            $(".varAPIWebToken").val(response.varAPIWebToken);
                            $(".user_RefID").val(response.user_RefID);
                            $(".personName").val(response.personName);
                            $(".workerCareerInternal_RefID").val(response.workerCareerInternal_RefID);
                            $(".organizationalDepartmentName").val(response.organizationalDepartmentName);

                            $(".branch_id").empty();

                            var option = "<option value='" + '' + "'>" + 'Select Company Name' + "</option>";
                            $(".branch_id").append(option);

                            len = response.data.length;
                            for (var i = 0; i < len; i++) {
                                var id = response.data[i].Sys_ID;
                                var name = response.data[i].Name;
                                var option2 = "<option value='" + id + "'>" + name + "</option>";
                                $(".branch_id").append(option2);
                            }
                            $(".username").prop("readonly", true);
                            $(".password").prop("readonly", true);

                            $("#branch").show();
                            $("#role").show();

                            $(".submit_button").prop("disabled", true);
                        } else if (response.status_code == 3) {

                            HideLoading();
                            Swal.fire("Cancelled", "You have not access", "error");

                        }
                    },
                    error: function(response) { // handle the error
                        console.log('response error FormLogin', response);

                        HideLoading();

                        Swal.fire("Cancelled", "Make sure the username and password are correct", "error");
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
            $(".branch_id").change(function() {

                var id = $(this).val();
                
                if (id != "") {

                    ShowLoading();

                    $.ajax({
                        type: 'GET',
                        url: '{!! route("getRoleLogin") !!}?user_RefID=' + $('.user_RefID').val() + '&varAPIWebToken=' + $('.varAPIWebToken').val() + '&branch_id=' + $('.branch_id').val() + '&organizationalDepartmentName=' + $('.organizationalDepartmentName').val(),
                        success: function(data) {
                            console.log('data branch_id', data);

                            var len = 0;
                            if (data.status == '401') {

                                Swal.fire("Cancelled", "Make sure the username and password are correct", "error");
                                HideLoading();

                            } else {
                                HideLoading();
                                len = data.length;
                                arrData = data.data;
                                $(".role_id").empty();

                                if (len > 1) {
                                    var option = "<option value='" + '' + "'>" + 'Select User Role' + "</option>";
                                    $(".role_id").append(option);
                                    $(".submit_button").prop("disabled", true);
                                } else {
                                    $(".submit_button").prop("disabled", false);
                                }
                                for (var i = 0; i < len; i++) {
                                    var ids = arrData[i].Sys_ID;
                                    var names = arrData[i].UserRoleName;
                                    var option = "<option value='" + ids + "'>" + names + "</option>";
                                    $(".role_id").append(option);
                                }
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('data error branch_id', jqXHR, textStatus, errorThrown);

                            Swal.fire("Cancelled", "Make sure the username and password are correct", "error");

                            HideLoading();
                        }
                    });
                } else {
                    $(".role_id").empty();
                    var option = "<option value='" + '' + "'>" + 'Select User Role' + "</option>";
                    $(".role_id").append(option);
                    $(".submit_button").prop("disabled", true);
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".role_id").change(function() {
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