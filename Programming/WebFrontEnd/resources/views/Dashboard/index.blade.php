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

      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Project Dashboard</label>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@endsection