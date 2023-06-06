@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('Documents.Functions.PopUp.SearchCheckDocument')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Check Document on Process</label>
        </div>
      </div>
      
      @include('Documents.Functions.Menu.MenuCheckDocument')
      
      @if($var == 1)
      <div class="card" style="position:relative;bottom:10px;">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            

            @include('Documents.Transactions.DocumentWorkflow')

            @if($TransactionMenu == "Advance")
              @include('Documents.Transactions.DocumentAdvance')
            @elseif($TransactionMenu == "AdvanceSettlement")
              @include('Documents.Transactions.DocumentAdvanceSettlement')
            @elseif($TransactionMenu == "BussinesTripRequest")
              @include('Documents.Transactions.DocumentBussinesTripRequest')
            @elseif($TransactionMenu == "BussinesTripSettlement")
              @include('Documents.Transactions.DocumentBussinesTripSettlement')
            @elseif($TransactionMenu == "PurchaseRequisition")
              @include('Documents.Transactions.DocumentPurchaseRequisition')
            @elseif($TransactionMenu == "PurchaseOrder")
              @include('Documents.Transactions.DocumentPurchaseOrder')
            @endif

            @include('Documents.Transactions.DocumentApprovalHistory')            

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