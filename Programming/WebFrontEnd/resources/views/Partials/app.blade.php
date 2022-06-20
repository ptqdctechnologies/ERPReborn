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
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2/css/select2.min.css') }}">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
  <!-- sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.css') }}">

  <script src = "js/zht-js/core.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

  <script>
    new zht_JSCore();
  </script>

  <style type="text/css">
     .error{
       border: 1px solid red;
       display: block;
       border-radius: 10px;

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
    </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    
    <div id="loading" style="display: none;">
        <span class="loader"></span>
        <div class="textLoader">
            <center>
                <b>Please Wait ... </b>
            </center>
        </div>
    </div>
    @yield('main')
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  
  <footer>
    <!-- jQuery -->
    <!-- <script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('AdminLTE-master/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset('AdminLTE-master/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-master/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script src="{{ asset('AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script src="{{ asset('AdminLTE-master/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-master/plugins/sparklines/sparkline.js') }}"></script>
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
    <!-- fullcalendar -->
    <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>
    <!-- sweetalert -->
    <script src="{{ asset('AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <script>
      $(document).ready(function() {
        // $('.select2').select2();
        
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

        $("#tableGetWorker").DataTable({
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
  </footer>
</body>
</html>