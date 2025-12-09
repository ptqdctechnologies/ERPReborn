@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
<style>
  #chartdiv {
    width: 100%;
    height: 500px;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1 sidebar-{{ $ColorMode }}-primary">
        <div class="col-sm-6 sidebar" style="height:30px;">
          <a href="#" class="d-block" style="font-size:15px;position:relative;top:7px;">Project Dashboard</a>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Dashboard.footerDashboard')
@endsection