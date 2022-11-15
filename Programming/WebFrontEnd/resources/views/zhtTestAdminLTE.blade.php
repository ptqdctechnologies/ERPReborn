<?php 

//\App\Helpers\ZhtHelper\UserInterface\Helper_AdminLTE::init(); 

/*
<body class="hold-transition sidebar-mini">
    cccccccccccccccccccccccc
    
<div class="input-group date" id="reservationdate" data-target-input="nearest">
<input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
<div class="input-group-text"><i class="fa fa-calendar"></i></div>
</div>
</div>
</body>


 */

?>


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

  
<div class="col-md-6">
<div class="form-group">
<label>Minimal</label>
<select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true">
<option selected="selected" data-select2-id="19">Alabama</option>
<option>Alaska</option>
<option>California</option>
<option>Delaware</option>
<option>Tennessee</option>
<option>Texas</option>
<option>Washington</option>
</select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-qbbq-container"><span class="select2-selection__rendered" id="select2-qbbq-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
</div>

 <div class="form-group">
<label>Disabled</label>
<select class="form-control select2bs4 select2-hidden-accessible" disabled="" style="width: 100%;" data-select2-id="20" tabindex="-1" aria-hidden="true">
<option selected="selected" data-select2-id="22">Alabama</option>
<option>Alaska</option>
<option>California</option>
<option>Delaware</option>
<option>Tennessee</option>
<option>Texas</option>
<option>Washington</option>
</select><span class="select2 select2-container select2-container--bootstrap4 select2-container--disabled" dir="ltr" data-select2-id="21" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="true" aria-labelledby="select2-4310-container"><span class="select2-selection__rendered" id="select2-4310-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
</div>

</div>
  
  
  
</body>
  
</body>

</html>
