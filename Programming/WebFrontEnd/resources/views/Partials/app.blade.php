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
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
  <!-- sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <!-- Loading css -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/loading.css') }}">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.css') }}">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- <script>
    new zht_JSCore();
  </script> -->
  <script src="{{ asset('js/zht-js/core.js') }}"></script>
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
  <script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
  <!-- DataTables -->
  <script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>

  <script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>
  <script src="{{ asset('AdminLTE-master/dist/js/demo.js') }}"></script>

  <script type="text/javascript">
    window.onload = function() {
      document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action").dispatchEvent(new Event("change"));
    }
  </script>

  <script>
    // TIME FUNCTION

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
    // CURRENCY FUNCTION

    $("input[data-type='currency']").on({
      keyup: function() {
        formatCurrency($(this));
      },
      blur: function() {
        formatCurrency($(this), "blur");
      }
    });

    function formatNumber(n) {
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }

    function formatCurrency(input, blur) {
      var input_val = input.val();

      if (input_val === "") {
        return;
      }
      var original_len = input_val.length;

      var caret_pos = input.prop("selectionStart");
      if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
          right_side += "00";
        }
        right_side = right_side.substring(0, 2);
        input_val = left_side + "." + right_side;
      } else {
        input_val = formatNumber(input_val);
        input_val = input_val;
        if (blur === "blur") {
          input_val += ".00";
        }
      }
      input.val(input_val);
      var updated_len = input_val.length;
      caret_pos = updated_len - original_len + caret_pos;
      input[0].setSelectionRange(caret_pos, caret_pos);
    }
  </script>
</body>

</html>