<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <link rel="shortcut icon" href="{{ asset('AdminLTE-master/dist/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/ionicons.min.css') }}">

  <!-- DataTables -->
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

  <!-- Sweetalert -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminltesweatalert.min.css') }}">
  <script src="{{ asset('AdminLTE-master/dist/js/sweetalert2.min.js') }}"></script>

  <!-- Font Googleapis -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/fonts.googleapis.css') }}">

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

  <!-- jQuery -->
  <script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
  <!-- DataTables -->
  <script src="{{ asset('AdminLTE-master/dist/js/jquery.dataTables.min.js') }}"></script>
  <!-- Fullcalender -->
  <script src="{{ asset('AdminLTE-master/plugins/fullcalendar/customfullcalender.js') }}"></script>
  <!-- Adminlte JS -->
  <script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>

</body>

</html>