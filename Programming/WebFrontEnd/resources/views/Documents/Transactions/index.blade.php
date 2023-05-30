@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduct')
@include('Documents.Functions.PopUp.SearchCheckDocument')
@include('getFunction.getProject')
@include('getFunction.getWorkFlow')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Check Document on Process</label>
        </div>
      </div>
      @include('Documents.Functions.Menu.MenuCheckDocument')
      @if($TransactionMenu == "Advance")
        @include('Documents.Transactions.DocumentAdvance')
      @elseif($TransactionMenu == "PurchaseRequisition")
        @include('Documents.Transactions.DocumentPurchaseRequisition')
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')

@include('Documents.Functions.Footer.FooterCheckDocument')
@endsection