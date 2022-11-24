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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Delivery Order</label>
                </div>
            </div>
            @include('Inventory.DeliveryOrder.Functions.Menu.MenuDeliveryOrder')
            @if($var == 0)
            <div class="card" style="position:relative;bottom:10px;">
                <form method="post" enctype="multipart/form-data" action="{{ route('DeliveryOrder.store') }}" id="FormSubmitDo">
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                    Add New Delivery Order
                                    </label>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                    </button>
                                    </div>
                                </div>
                                    @include('Inventory.DeliveryOrder.Functions.Header.HeaderDo')
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
                                    @include('Inventory.DeliveryOrder.Functions.Header.HeaderDo2')
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
                                                Delivery Order Request Detail
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
                                            Delivery Order Detail
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0" id="detailDo">
                                        <table class="table table-head-fixed text-nowrap table-sm" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">DOR Number</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">Work Id</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">Work Name</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">Product Id</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">Product Name</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">Delivery Type</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:4%;border:1px solid #e9ecef;">Qty Request</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:4%;border:1px solid #e9ecef;">Uom</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:18%;border:1px solid #e9ecef;">Note</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:12%;border:1px solid #e9ecef;">With Journal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="dor_number_detail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putWorkId" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putWorkName" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putProductId" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly>
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="delivery_type" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty quantity" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                                                    <input id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putUom" style="border-radius:0;" type="text" class="form-control" readonly>
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="note" style="border-radius:0;" type="text" class="form-control">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="no" name="journal" value="No" checked>
                                                        <label for="no">No
                                                        </label>
                                                    </div>
                                                    <div class="icheck-primary d-inline">
                                                        <input type="radio" id="yes" name="journal" value="Yes">
                                                        <label for="yes">Yes
                                                        </label>
                                                    </div>
                                                </td>
                                                <!-- Untuk Validasi -->
                                                <input id="putCurrency" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                                                <input id="statusEditDo" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                                                <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                                                <input id="ValidateNote" style="border-radius:0;" type="hidden" class="form-control" readonly="">

                                            </tbody>
                                        </table>
                                        <div style="padding-right:10px;padding-top:10px;">
                                            <a class="btn btn-default btn-sm float-right" onclick="CancelDetailDo()" id="CancelDetailDo" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                                            </a>
                                            <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs()" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                                <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                                            </a>
                                        </div>
                                        <br><br><br>
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
                                        <table class="table table-head-fixed text-nowrap TableDorCart" id="TableDorCart">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Trano</th>
                                                    <th>Work Id</th>
                                                    <th>Work Name</th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th>Valuta</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body table-responsive p-0 detailDoList">
                                        <table class="table table-head-fixed table-sm text-nowrap">
                                            <tfoot>
                                                <tr>
                                                    <th style="color:brown;float:right;">Total Delivery Order : <span id="TotalDeliveryOrder"></span></th>
                                                </tr>
                                            </tfoot>
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
            @endif
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDeliveryOrder')
@endsection