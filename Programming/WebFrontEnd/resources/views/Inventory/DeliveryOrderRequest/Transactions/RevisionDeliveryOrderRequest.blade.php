@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Inventory.DeliveryOrderRequest.Functions.PopUp.PopUpDorRevision')
@include('Inventory.DeliveryOrderRequest.Functions.PopUp.SearchPurchaseOrder')
@include('Inventory.DeliveryOrderRequest.Functions.PopUp.SearchOrderPicking')
@include('getFunction.getWarehouse')
@include('getFunction.getSite')
@include('getFunction.getSupplier')
@include('getFunction.getWorker')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Delivery Order Request Revision</label>
                </div>
            </div>
            @include('Inventory.DeliveryOrderRequest.Functions.Menu.MenuDeliveryOrderRequest')
            <div class="card" style="position:relative;bottom:10px;">
                <form method="post" enctype="multipart/form-data" action="{{ route('DeliveryOrderRequest.update', $dataHeader['Sys_ID_Advance']) }}" id="FormSubmitDorRevision">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="DocumentTypeID" value="{{ $DocumentTypeID }}" id="DocumentTypeID">
                    <input type="hidden" name="var_recordID" value="{{ $dataHeader['Sys_ID_Advance'] }}" id="var_recordID">

                    <div class="tab-content p-3" id="nav-tabContent">
                        @include('Inventory.DeliveryOrderRequest.Functions.Header.HeaderDorRevision')
                        @include('Inventory.DeliveryOrderRequest.Functions.Header.HeaderDorDetailRevision')
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Delivery Order Request Detail 
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @include('Inventory.DeliveryOrderRequest.Functions.Table.TableSourceDetail')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Delivery Order Request Cart
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body table-responsive p-0 detailDorList" style="height: 180px;">
                                        <table class="table table-head-fixed text-nowrap TableDorCart" id="TableDorCart">
                                            <thead>
                                                <tr>
                                                    <th>Transaction Number</th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>PR Price</th>
                                                    <th>Average Price</th>
                                                    <th>Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body AdvanceListCart">
                                        <table style="float:right;">
                                            <tr>
                                                <th style="position: relative;right:30px;"> Total Item : <span id="TotalQty">
                                        </table>
                                    </div>
                                </div>
                                <a onclick="CancelDor();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                </a>
                                <button class="btn btn-default btn-sm float-right" type="submit" id="SubmitDor" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Inventory.DeliveryOrderRequest.Functions.Footer.FooterDeliveryOderRequestRevision')
@endsection