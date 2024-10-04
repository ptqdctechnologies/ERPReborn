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

        <div class="login-logo">
            <img src="/AdminLTE-master/dist/img/qdc.png" width="160" alt=""><br>
        </div>
        <!-- /.login-logo -->
        <div id="cek1">
            <div class="card-body login-card-body" id="dis1">
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

    <script>
        $(document).ready(function() {
            // Constants
            const $form = $("#FormLogin");
            const $username = $(".username");
            const $password = $(".password");
            const $branchId = $("#branch_id");
            const $roleId = $("#role_id");
            const $submitButton = $(".submit_button");
            
            // Initialize Select2
            [$branchId, $roleId].forEach($el => {
                $el.select2({ theme: 'bootstrap4' });
            });
            
            // Hide elements initially
            $("#role, #branch").hide();
            
            // AJAX setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Loading functions
            const toggleLoading = (show) => {
                $("#loading, .loader").toggle(show);
            };

            // Password visibility toggle
            window.ShowHidePass = function() {
                const $pass = $('#login_password');
                const isPassword = $pass.attr('type') === 'password';
                
                $pass.attr('type', isPassword ? 'text' : 'password');
                $('#eyeShow').toggle(isPassword);
                $('#eyeSlash').toggle(!isPassword);
            };

            // Form submission
            $form.on("submit", function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const action = $(this).attr("action");
                const method = $(this).attr("method");

                toggleLoading(true);

                $.ajax({
                    url: action,
                    type: method,
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(response) {
                    switch(response.status_code) {
                        case 1:
                            window.location.href = '/dashboard';
                            return;
                        case 2:
                            handleMultiCompanyResponse(response);
                            break;
                        case 0:
                        case 3:
                            Swal.fire("Cancelled", response.status_code === 3 ? 
                                "You have no access" : 
                                "Make sure the username and password are correct", "error");
                            break;
                    }
                })
                .fail(() => {
                    Swal.fire("Cancelled", "Make sure the username and password are correct", "error");
                })
                .always(() => {
                    toggleLoading(false);
                });
            });

            function handleMultiCompanyResponse(response) {
                // Set values
                ["varAPIWebToken", "user_RefID", "personName", 
                "workerCareerInternal_RefID", "organizationalDepartmentName"]
                .forEach(key => $(`.${key}`).val(response[key]));

                // Handle branch options
                $branchId.empty().append(`<option value="">Select Company Name</option>`);
                response.data.forEach(item => {
                    $branchId.append(`<option value="${item.Sys_ID}">${item.Name}</option>`);
                });

                // UI updates
                $username.add($password).prop("readonly", true);
                $("#branch, #role").show();
                $submitButton.prop("disabled", true);
            }

            // Branch change handler
            $branchId.on("change", function() {
                const branchId = $(this).val();
                $roleId.empty().append(`<option value="">Select User Role</option>`);
                $submitButton.prop("disabled", true);

                if (!branchId) return;

                toggleLoading(true);

                $.get('{!! route("getRoleLogin") !!}', {
                    user_RefID: $('.user_RefID').val(),
                    varAPIWebToken: $('.varAPIWebToken').val(),
                    branch_id: branchId,
                    organizationalDepartmentName: $('.organizationalDepartmentName').val()
                })
                .done(function(data) {
                    if (data.status === '401') {
                        Swal.fire("Cancelled", "Make sure the username and password are correct", "error");
                        return;
                    }

                    const roles = data.data;
                    if (roles.length === 1) {
                        $submitButton.prop("disabled", false);
                    }

                    roles.forEach(role => {
                        $roleId.append(`<option value="${role.Sys_ID}">${role.UserRoleName}</option>`);
                    });
                })
                .fail(() => {
                    Swal.fire("Cancelled", "Make sure the username and password are correct", "error");
                })
                .always(() => {
                    toggleLoading(false);
                });
            });

            // Role change handler
            $roleId.on("change", function() {
                $submitButton.prop("disabled", !$(this).val());
            });
        });
    </script>
</body>

</html>