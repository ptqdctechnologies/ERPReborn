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
  <!-- <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2/css/select2.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.css') }}">

  <script src = "js/zht-js/core.js" type="text/javascript"></script>
  <script>new zht_JSCore();</script>
  <style type="text/css">
     .error{
       border: 1px solid red;
       display: block;
       border-radius: 10px;

     }
    </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @yield('main')
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- jQuery -->
  <script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
  
  <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('AdminLTE-master/plugins/select2/js/select2.full.min.js') }}"></script>
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
  <!-- Bootstrap 4 -->
  <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- DataTables -->
  <script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <!-- page script -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <!-- fullcalendar -->
  <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>
  <!-- sweetalert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <script src="{{ asset('AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

  <script>
    $(function() {
      $('.select2').select2()
      
      $("#table1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#table2").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $("#table3").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $("#tableGetProject").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudgetExpense").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudgetExpenseLine").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudgetExpenseLine2").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudgetExpenseLineCeiling").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudgetExpense2").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudgetExpense3").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudget").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      
      $("#tableBudget2").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudget3").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableBudget4").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetSite").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetPr").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetWarehouse").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetWarehouse2").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetWarehouse3").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetRequester").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableSearchArf").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableSearchArfinAsf").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableSearchArfRevision").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableSearchAsfRevision").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableSearchBrf").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetCustomer").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableGetCurrency").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });

      $("#tableGetProduct").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });

      $("#tableSearchBsf").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#TableRegisterCo").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#TableSearchCo").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#TableBOQCO").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });

      $("#tableBudgetDetail").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });

      $("#tablePoNumber").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      $("#tableDoNumber").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paginate": false,
      });
      
      $('#example2').DataTable({  
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

</body>

</html>