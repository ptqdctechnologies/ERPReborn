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

      <div>
        <h2>1. Barcode 1 Dimensi (Code 128)</h2>
        <div>
            {!! DNS1D::getBarcodeHTML("ID-9988776655", 'C128', 2, 50) !!}
        </div>
        <p>ID-9988776655</p>

        <hr>

        <h2>2. QR Code (2 Dimensi)</h2>
        <div>
            {!! DNS2D::getBarcodeHTML("Ini adalah isi dari QR Code", 'QRCODE', 4, 4) !!}
        </div>

        <hr>

        <h2>3. Barcode dalam format Base64 PNG (Bentuk tag IMG)</h2>
        <div>
            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG('QDC2026', 'C39') }}" alt="barcode" />
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Dashboard.footerDashboard')
@endsection