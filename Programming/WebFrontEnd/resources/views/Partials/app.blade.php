<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <link rel="shortcut icon" href="{{ asset('AdminLTE-master/dist/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/ionicons.min.css') }}">

  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/jquery.dataTables.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

  <!-- Loading css -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/loading.css') }}">
  <!-- Budget css -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/budget.min.css') }}">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.css') }}">

  <!-- JQUERY JS -->
  <script src="{{ asset('AdminLTE-master/dist/js/jquery-3.5.1.js') }}"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

  <!-- sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <script src="{{ asset('AdminLTE-master/dist/js/sweetalert2.min.js') }}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script> -->

  <!-- Font Googleapis -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/fonts.googleapis.css') }}">
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->

  <script src="{{ asset('js/zht-js/core.js') }}"></script>
  <script>
    new zht_JSCore(false)
  </script>

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
  
  <script type="text/javascript">
    window.onload = function() {
      document.getElementById("dataInput_Log_FileUpload_Pointer_RefID_Action").dispatchEvent(new Event("change"));
    }
  </script>

  <!-- jQuery -->
  <!-- <script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script> -->
  <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
  <!-- DataTables -->
  <!-- <script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
  <script src="{{ asset('AdminLTE-master/dist/js/jquery.dataTables.min.js') }}"></script>
  
  <!-- Fullcalender -->
  <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>

  <script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>

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
    function currency(num) {
      var str = num.toString().replace("$", ""),
        parts = false,
        output = [],
        i = 1,
        formatted = null;
      if (str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ",") {
          output.push(str[j]);
          if (i % 3 == 0 && j < (len - 1)) {
            output.push(",");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };

    function currencyTotal(num) {
      var str = num.toString().replace("$", ""),
        parts = false,
        output = [],
        i = 1,
        formatted = null;
      if (str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for (var j = 0, len = str.length; j < len; j++) {
        if (str[j] != ",") {
          output.push(str[j]);
          if (i % 3 == 0 && j < (len - 1)) {
            output.push(",");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return (formatted + ((parts) ? "." + parts[1].substr(0, 2) : ".00"));
    };
  </script>
</body>

</html>