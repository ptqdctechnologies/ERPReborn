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
            border: 2px solid skyblue;
        }

        #input1 {
            height: 30px;
            width: 10px;
            border: 1px solid skyblue;
        }

        #kk {
            background-image: url("/AdminLTE-master/images/pexels-efdal-yildiz-917494.jpg");
            background-repeat: no-repeat;
            background-size: cover
        }
    </style>
</head>

<body class="hold-transition login-page" id="kk">
    <div class="login-box">
        <div class="login-logo">
            <img src="/AdminLTE-master/dist/img/qdc.png" width="160" alt=""><br>
            <!-- <span style="font-weight: bold;color:azure;">QDC ERP</span> -->
        </div>
        <!-- /.login-logo -->
        <div id="cek1">
            <div class="card-body login-card-body" id="cek2">
                <form action="{{ route('ARF.store') }}" method="post">
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
                            <a class="btn btn-primary btn-block btn-sm submits">Login</a>
                            <button type="submit" class="btn btn-primary btn-block btn-sm login">Login</button>
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

                // var x = $(".username").val();
                // var y = $(".password").val();

                $.ajax({
                    type: 'GET',
                    url: '{!! route('test.store') !!}?username=' + $('.username').val() + '&password=' + $('.password').val(),
                    // type: 'get',
                    // dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var len = 0;
                        if (data != null) {
                            len = data.length;
                        }
                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                var id = data[i].branch_RefID;
                                var name = data[i].branchName;
                                var option = "<option value='" + id + "'>" + name + "</option>";
                                $(".branch_name").append(option);

                            }
                        }

                        $(".username").prop("disabled", true);
                        $(".password").prop("disabled", true);
                        $(".branch_name").show();
                        $(".user_role").show();
                        $(".login").show();
                        $(".submits").hide();
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
                $.ajax({
                    type: 'GET',
                    url: '{!! route('test.store') !!}?username=' + $('.username').val() + '&password=' + $('.password').val(),
                    // type: 'get',
                    // dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        var len = 0;
                        if (data != null) {

                            len = data.length;
                        }

                        if (len > 0) {
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
            });
        });
    </script>

</body>

</html>