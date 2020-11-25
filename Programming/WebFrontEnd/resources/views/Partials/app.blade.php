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

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
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

<!-- POPUP ARF -->

<script>
    $(document).ready(function() {
        $('.tombolProject').click(function() {
            var code = $("#kata1").html();
            var name = $("#kata").html();
            $("#projectcode").val(code);
            $("#projectname").val(name);
        });
        $('.tombolSubProject').click(function() {
            var code1 = $("#kata2").html();
            var name1 = $("#kata3").html();
            $("#subprojectc").val(code1);
            $("#subprojectn").val(name1);
        });
        $('.tombolRequestArf').click(function() {
            var requestNameArf = $("#kata4").html();
            $("#requestNameArf").val(requestNameArf);
        });
        $('.tombolCurrency').click(function() {
            var currencyCode = $("#kata8").html();
            var currencyName = $("#kata9").html();
            $("#currencyCode").val(currencyCode);
            $("#currencyName").val(currencyName);
        });
        $('.tombolArfManager').click(function() {
            var managerArfUid = $("#kata10").html();
            var managerArfName = $("#kata11").html();
            $("#managerArfUid").val(managerArfUid);
            $("#managerArfName").val(managerArfName);
        });
        $('.tombolArfFinance').click(function() {
            var financeArfUid = $("#kata12").html();
            var financeArfName = $("#kata13").html();
            $("#financeArfUid").val(financeArfUid);
            $("#financeArfName").val(financeArfName);
        });
        $('.tombolArfProduk').click(function() {
            var produkArfCode = $("#kata14").html();
            var produkArfName = $("#kata15").html();
            $("#produkArfCode").val(produkArfCode);
            $("#produkArfName").val(produkArfName);
        });
    });
</script>

<!-- END POPUP ARF         -->

<!-- POPUP ASF -->

<script>
    $(document).ready(function() {

        $('.tombolAsfManager').click(function() {
            var managerAsfUid = $("#kata6").html();
            var managerAsfName = $("#kata7").html();
            $("#managerAsfUid").val(managerAsfUid);
            $("#managerAsfName").val(managerAsfName);
        });
        $('.tombolAsfCurrency').click(function() {
            var currencyAsfCode = $("#kata16").html();
            $("#currencyAsfCode").val(currencyAsfCode);
        });
        $('.tombolAsfFinance').click(function() {
            var financeAsfUid = $("#kata17").html();
            var financeAsfName = $("#kata18").html();
            $("#financeAsfUid").val(financeAsfUid);
            $("#financeAsfName").val(financeAsfName);
        });

    });
</script>

<!-- END POPUP ASF -->

<!-- ARF -->
<script>
    $(document).ready(function() {
        $('.klikDetailArf').click(function() {
            var get1 = $("#getWorkId").html();
            var get2 = $("#getWorkName").html();
            var get3 = $("#getProductId").html();
            var get4 = $("#getQty").html();
            var get5 = $("#getPrice").html();
            var get6 = $("#getRemark").html();
            $("#putWorkId").val(get1);
            $("#putWorkName").val(get2);
            $("#putProductId").val(get3);
            $("#putQty").val(get4);
            $("#putPrice").val(get5);
            $("#putRemark").val(get6);
        });
    });
</script>

<!-- END ARF         -->


<!-- ATTACHMENTS -->

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<!-- ARF -->

<script type="text/javascript">
    $(document).ready(function() {
        $(".fileInputMultiArf").click(function() {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".remove-attachment", function() {
            $(this).parents(".control-group").remove();
        });
    });
</script>

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
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
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
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
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