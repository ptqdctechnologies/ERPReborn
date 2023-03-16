@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getTransporter')
@include('Inventory.DeliveryOrder.Functions.PopUp.PopUpDoRevision')
@include('Inventory.DeliveryOrder.Functions.PopUp.SearchDor')


<div class="content-wrapper" style="position:relative;bottom:12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Delivery Order Revision</label>
                </div>
            </div>
            @include('Inventory.DeliveryOrder.Functions.Menu.MenuDeliveryOrder')
            <div class="card" style="position:relative;bottom:10px;">
                <form method="post" enctype="multipart/form-data" action="{{ route('DeliveryOrder.update', $var_recordID) }}" id="FormSubmitDoRevision">
                    @csrf
                    @method('PUT')
                    <input id="var_recordID" style="border-radius:0;" name="var_recordID" value="{{ $var_recordID }}" class="form-control" type="hidden">
                    <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" type="hidden" value="{{$dataAdvanceRevisions['entities']['combinedBudgetSection_RefID']}}">
                    <div class="tab-content p-3" id="nav-tabContent">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Delivery Order Revision
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @include('Inventory.DeliveryOrder.Functions.Header.HeaderDoRevision')
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Transporter Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @include('Inventory.DeliveryOrder.Functions.Header.HeaderDoRevision2')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                Delivery Order Request Detail&nbsp;&nbsp;
                                                <a id="dor_number2" data-toggle="modal" data-target="#mySearchDor"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt=""></a>

                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @include('Inventory.DeliveryOrder.Functions.Table.TableDorDetail')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Delivery Order Cart
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body table-responsive p-0 detailDoList" style="height: 180px;">
                                        <table class="table table-head-fixed text-nowrap TableDoCart" id="TableDoCart">
                                            <thead>
                                                <tr>
                                                    <th>Trano</th>
                                                    <th>Work Id</th>
                                                    <th>Work Name</th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Valuta</th>
                                                    <th>Note</th>
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
                                                <th style="position: relative;right:20px;"> Total Item : <span id="TotalQty">
                                        </table>
                                    </div>
                                </div>
                                <a onclick="CancelDo();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
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
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDeliveryOrderRevision')
@endsection