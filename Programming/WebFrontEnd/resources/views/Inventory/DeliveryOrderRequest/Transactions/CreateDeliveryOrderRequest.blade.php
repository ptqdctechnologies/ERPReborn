@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('Inventory.DeliveryOrderRequest.Functions.PopUp.PopUpDorRevision')
@include('Inventory.DeliveryOrderRequest.Functions.PopUp.SearchPurchaseRequisition')
@include('getFunction.getWarehouse')
@include('getFunction.getWarehouse2')
@include('getFunction.getWarehouse3')
@include('getFunction.getSupplier')

<div class="content-wrapper" style="position:relative;bottom:12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Delivery Order Request</label>
                </div>
            </div>
            @include('Inventory.DeliveryOrderRequest.Functions.Menu.MenuDeliveryOrderRequest')
            @if($var == 0)
            <div class="card" style="position:relative;bottom:10px;">
                <form method="post" enctype="multipart/form-data" action="{{ route('DeliveryOrderRequest.store') }}" id="FormSubmitDor">
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">
                        @include('Inventory.DeliveryOrderRequest.Functions.Header.HeaderDor')
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Purchase Requisition Detail &nbsp;&nbsp;
                                                <a id="pr_number2" data-toggle="modal" data-target="#mySearchPurchaseRequistion" title="Select Purchase Requisition"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @include('Inventory.DeliveryOrderRequest.Functions.Table.TablePrDetail')
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
                                                    <th>Work Id</th>
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

                                    <div class="card-body detailDorList">
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
            @endif
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Inventory.DeliveryOrderRequest.Functions.Footer.FooterDeliveryOderRequest')
@endsection