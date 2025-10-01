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

            <div id="cek1" style="margin-top: -4rem;">
                <div class="card-body login-card-body position-relative" id="dis1">
                    <form action="{{ route('loginStore') }}" method="POST" id="FormLogin">
                        @csrf

                        <div class=" input-group mb-4">
                            <input type="text" class="form-control username" placeholder="Username" name="username" id="dis2" required="" autocomplete="off" autofocus />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-4">
                            <input type="password" class="form-control password" placeholder="Password" name="password" id="login_password" required="" autocomplete="off" />
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

                        <div class="input-group mb-4" id="branch" style="display: none;">
                            <select class="form-control branch_id" name="branch_id" id="branch_id">
                                <option selected="selected" value=""> Select Company Name </option>
                            </select>
                        </div>

                        <div class="input-group mb-4" id="role" style="display: none;">
                            <select class="form-control role_id" name="role_id" id="role_id">
                                <option selected="selected" value=""> Select User Role </option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-sm submit_button" style="color: white;">Login</button>
                            </div>
                        </div>
                    </form>

                    <div class="position-absolute mt-1" style="right: 2.5rem;">
                        <img src="/AdminLTE-master/dist/img/qdc.png" height="17" alt="logo-qdc">
                    </div>
                </div>
            </div>
        </div>

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
            function ShowLoading() {
                $("#loading").show();
                $(".loader").show();
            }

            function HideLoading() {
                $("#loading").hide();
                $(".loader").hide();
            }

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

            $('#FormLogin').on('submit', function (e) {
                e.preventDefault();

                let formData = {
                    _token: $('input[name="_token"]').val(), // CSRF token Laravel
                    username: $('input[name="username"]').val(),
                    password: $('input[name="password"]').val(),
                    branch_id: $('#branch_id').val(),
                    role_id: $('#role_id').val(),
                };

                ShowLoading();

                $.ajax({
                    url: "{{ route('loginStore') }}",
                    method: "POST",
                    data: formData,
                    success: function (response) {
                        if (response.statusCode === 500) {
                            HideLoading();
                            Swal.fire("Error", response.message, "error");
                        } else {
                            $('#branch_id').empty();
                            $('#branch_id').append('<option disabled selected>Select a Company Name</option>');

                            if (response.responseDataInstitutionBranch.length > 0) {
                                response.responseDataInstitutionBranch.forEach((institution, index) => {
                                    const isSelected = index === 0 ? ' selected' : '';
                                    const option = `<option value="${institution.sys_ID}"${isSelected}>${institution.name}</option>`;
                                    $('#branch_id').append(option);
                                });
                            }

                            $('#role_id').empty();
                            $('#role_id').append('<option disabled selected>Select a Role</option>');

                            if (response.responseDataRole.length > 0) {
                                response.responseDataRole.forEach((role, index) => {
                                    const isSelected = index === 0 ? ' selected' : '';
                                    const option = `<option value="${role.sys_ID}"${isSelected}>${role.name}</option>`;
                                    $('#role_id').append(option);
                                });
                            }

                            window.location.href =  "{{ route('dashboard.index') }}";
                        }
                    },
                    error: function (xhr) {
                        console.error("Login error:", xhr.responseText);
                        HideLoading();
                        Swal.fire("Cancelled", "Make sure the username and password are correct", "error");
                    }
                });
            });

            $(window).one('load', function(e) {
                $('#branch_id').select2({
                    theme: 'bootstrap4'
                });

                $('#role_id').select2({
                    theme: 'bootstrap4'
                });
            });
        </script>
    </body>
</html>