<!--|-----------------------------------------------------------|
    |                          Extends                          |
    |-----------------------------------------------------------|-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ERP Reborn</title>
    <link rel="shortcut icon" href="/AdminLTE-master/dist/img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">

    <!-- EDITABLE -->


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @yield('main')
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>
</body>

<!--<script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script> -->
<script src="{{ asset('AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- jquery-validation -->
<script src="{{ asset('AdminLTE-master/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script src="{{ asset('AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ asset('AdminLTE-master/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('AdminLTE-master/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('AdminLTE-master/dist/js/demo.js') }}"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    $(function() {
        $("#examples").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#examplesz').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<!-- ATTACHMENTS -->

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<!-- ARF -->



<!-- ASF -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".fileInputMultiAsf").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".remove-attachment", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>

<!-- VALIDATION -->

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                alert("Form successful submitted!");
            }
        });
        $('#arfForm').validate({
            rules: {
                project_code: {
                    maxlength: 10,
                    required: true,
                },
                projek_name: {
                    required: true,
                },
                site_code: {
                    required: true
                },
                site_name: {
                    required: true
                },
                currency_code: {
                    required: true
                },
                currency_name: {
                    required: true
                },
                manager_code: {
                    required: true
                },
                manager_name: {
                    required: true
                },
                finance_code: {
                    required: true
                },
                finance_name: {
                    required: true
                },
                beneficiary: {
                    required: true
                },
                bank_name: {
                    required: true
                },
                account_name: {
                    required: true
                },
                account_number: {
                    required: true
                },
                origin_budget: {
                    required: true
                },
                internal_notes: {
                    required: true
                },
                filenames: {
                    required: true
                },
                requester_name: {
                    required: true
                },
                remark: {
                    required: true
                },
                nec_at: {
                    required: true
                },
            },
            messages: {
                email: {
                    // required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    // required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },

                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                // error.addClass('invalid-feedback');
                // element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

</html>
<!--|-----------------------------------------------------------|
    |                      End Extends                          |
    |-----------------------------------------------------------|-->