<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login ERP QDC</title>
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
        #cek2 {
            border-radius: 20px;
            padding: 40px;
        }

        #input1 {
            height: 30px;
            width: 10px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="/AdminLTE-master/dist/img/qdc.png" width="160" alt=""><br>
            <!-- <span style="font-weight: bold;color:azure;">QDC ERP</span> -->
        </div>
        <!-- /.login-logo -->
        <div id="cek1">
            <div class="card-body login-card-body" id="cek2">
                <form action="{{ route('auth.loginStore') }}" method="post">
                    @csrf
                    <div class="input-group mb-4">
                        <input type="text" class="form-control username" placeholder="Username" name="username" id="input1" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control password" placeholder="Password" name="password" id="input1" required="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-4">
                        <select class="form-control branch_name" name="branch_name" id="input1">
                            <option selected="selected" disabled>-- Select Branch Name --</option>
                        </select>
                    </div>
                    <div class="input-group mb-4">
                        <select class="form-control user_role" name="user_role" id="input1">
                            <option selected="selected" disabled>-- Select User Role --</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button class="btn btn-primary btn-block btn-sm" style="color: white;">Login</button>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $(".submits").click(function() {
                $.ajax({
                    dataType: 'json',
                    url: '{!! route('auth.loginStore') !!}?username=' + $('.username').val() + '&password=' + $('.password').val(),
                    type: 'GET',
                    contentType: 'application/x-www-form-urlencoded',
                    cache: false,
                    data: { }
                    // ,

                    // success: function(data) {
                    //     console.log(data);
                    // },
                    // error: function(jqXHR, textStatus, errorThrown) {
                    //     Swal.fire("Cancelled", "Pastikan username dan password and benar", "error");
                    // }
                });
            });
        });
    </script>

</body>

</html>