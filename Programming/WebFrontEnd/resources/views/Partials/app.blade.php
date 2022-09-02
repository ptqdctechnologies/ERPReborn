<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <link rel="shortcut icon" href="{{ asset('AdminLTE-master/dist/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.css') }}"> -->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

  <!-- Select2 -->
  <!-- <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/select2/css/select2.min.css') }}"> -->
  <!-- Bootstrap4 Duallistbox -->
  <!-- <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}"> -->
  <!-- sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <!-- Loading css -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/loading.css') }}">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.css') }}">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- <script>
    new zht_JSCore();
  </script> -->
  <script src="{{ asset('js/zht-js/core.js') }}"></script>

  <style>
    body {
      font-family: "Work Sans", sans-serif;

      background: rgb(230, 230, 230);
    }

    .time {
      margin: 100px auto;
      background: rgb(12, 12, 12);
      color: #fff;
      border: 7px solid rgb(255, 252, 252);
      box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
      padding: 8px;
      text-align: center;
      width: 500px;
    }

    .hms {
      font-size: 68pt;
      font-weight: 200;
    }

    .ampm {
      font-size: 22pt;
    }

    .date {
      font-size: 15pt;
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

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- <script src="{{ asset('AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js') }}"></script> -->
  <!-- Select2 -->
  <!-- <script src="{{ asset('AdminLTE-master/plugins/select2/js/select2.full.min.js') }}"></script> -->
  <!-- Bootstrap4 Duallistbox -->
  <!-- <script src="{{ asset('AdminLTE-master/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script> -->
  <!-- Input Mask -->
  <script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
  <!-- <script src="{{ asset('AdminLTE-master/plugins/inputmask/jquery.inputmask.min.js') }}"></script> -->
  <!-- date-range-picker -->
  <!-- <script src="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.js') }}"></script> -->
  <!-- Bootstrap 4 -->

  <!-- DataTables -->
  <script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <!-- <script src="{{ asset('AdminLTE-master/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script> -->

  <!-- jquery-validation -->
  <!-- <script src="{{ asset('AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

  <script src="{{ asset('AdminLTE-master/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/jquery-validation/additional-methods.min.js') }}"></script>

  <script src="{{ asset('AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

  <script src="{{ asset('AdminLTE-master/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/sparklines/sparkline.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/dist/js/pages/dashboard.js') }}"></script>-->
  <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>

  <script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/dist/js/demo.js') }}"></script>

  <script type="text/javascript">
    window.onload = function() {
      document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action").dispatchEvent(new Event("change"));
    }
  </script>

  <script>
    $(function() {

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
      $("#TableSearchProcReq").DataTable({
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
  <script>
    setInterval(customClock, 500);

    function customClock() {
      var time = new Date();
      var date = time.getDate();
      var year = time.getFullYear();
      var hrs = time.getHours();
      var min = time.getMinutes();
      var sec = time.getSeconds();
      var ampm = (time.getHours() >= 12) ? "PM" : "AM";

      // var dow = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
      // var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      // document.getElementById('clock').innerHTML = dow[time.getDay()] + ", " + month[time.getMonth()] + " " + date + ", " + year + "  " + hrs + ":" + min + ":" + sec + " " + ampm;
      var dow = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
      var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      document.getElementById('clock').innerHTML = dow[time.getDay()] + ", " + date + " " + month[time.getMonth()] + " " + year + "  " + hrs + ":" + min + ":" + sec + " " + ampm;


    }
  </script>


  <script>
    // Jquery Dependency

    $("input[data-type='currency']").on({
      keyup: function() {
        formatCurrency($(this));
      },
      blur: function() {
        formatCurrency($(this), "blur");
      }
    });


    function formatNumber(n) {
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
      // appends $ to value, validates decimal side
      // and puts cursor back in right position.

      // get input value
      var input_val = input.val();

      // don't validate empty input
      if (input_val === "") {
        return;
      }

      // original length
      var original_len = input_val.length;

      // initial caret position 
      var caret_pos = input.prop("selectionStart");

      // check for decimal
      if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
          right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side;

      } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = input_val;

        // final formatting
        if (blur === "blur") {
          input_val += ".00";
        }
      }

      // send updated string to input
      input.val(input_val);

      // put caret back in the right position
      var updated_len = input_val.length;
      caret_pos = updated_len - original_len + caret_pos;
      input[0].setSelectionRange(caret_pos, caret_pos);
    }
  </script>


</body>

</html>