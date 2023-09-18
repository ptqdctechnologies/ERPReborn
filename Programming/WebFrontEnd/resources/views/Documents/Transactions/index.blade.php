@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('Documents.Functions.PopUp.SearchCheckDocument')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Check Document on Process</label>
        </div>
      </div>
      
      @include('Documents.Functions.Menu.MenuCheckDocument')
      
      @if($var == 1)
      <div class="card" style="position:relative;bottom:10px;">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            
            @include('Documents.Transactions.DocumentWorkflow')
            @include('Documents.Transactions.DocumentAdvance')

          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Documents.Functions.Footer.FooterCheckDocument')
@endsection