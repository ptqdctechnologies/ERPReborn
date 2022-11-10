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
                <div class="tab-content p-3" id="nav-tabContent">
                    @include('Inventory.DeliveryOrderRequest.Functions.Header.HeaderDor')
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            PR Detail
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @include('Inventory.DeliveryOrderRequest.Functions.Table.tablePrDetail')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <label class="card-title">
                                        Detail Delivery Order Request
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0" id="detailDor">
                                    <table class="table table-head-fixed text-nowrap table-sm" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">PR Number</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Work Id</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Product Id</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:20%;border:1px solid #e9ecef;">Product Name</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:5%;border:1px solid #e9ecef;">Qty</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Unit Price</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Average</th>
                                                <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Balance Qty</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="pr_number_detail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="putWorkId" style="border-radius:0;" type="text" class="form-control" readonly="">
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <div class="input-group">
                                                   &nbsp;<input id="putProductId" style="border-radius:0;" class="form-control" readonly>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#" id="product_id2" data-toggle="modal" data-target="#myProduct"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty quantity" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                                                <input id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="priceCek" style="border-radius:0;" type="text" class="form-control ChangePrice" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                                                <input id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="average" style="border-radius:0;" type="text" class="form-control" readonly="">
                                            </td>
                                            <td style="border:1px solid #e9ecef;">
                                                <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                                            </td>
                                            <!-- Untuk Validasi -->
                                            <input id="statusProduct" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                                            <input id="statusEditDor" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                                            <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                                            <input id="ValidatePrice" style="border-radius:0;" type="hidden" class="form-control" readonly="">

                                        </tbody>
                                    </table>
                                    <div style="padding-right:10px;padding-top:10px;">
                                        <a class="btn btn-default btn-sm float-right" onclick="CancelDetailDor()" id="CancelDetailDor" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
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

                    <!-- <div class="tab-pane fade show active" id="detailTransAvail" role="tabpanel" aria-labelledby="product-desc-tab">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Detail Delivery Order Request
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" id="detailDor">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>PR Number</label></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input name="prNumberDorDetail" id="prNumberDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">

                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Project</label></td>
                                                            <td>
                                                                <input name="projectDorDetail" id="projectDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                            <td>
                                                                <input name="projectDorDetail2" id="projectDorDetail2" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Site</label></td>
                                                            <td>
                                                                <input name="siteDorDetail" id="siteDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                            <td>
                                                                <input name="siteDorDetail2" id="siteDorDetail2" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>Work Id</label></td>
                                                            <td>
                                                                <input name="workIdDorDetail" id="workIdDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                            <td>
                                                                <input name="workIdDorDetail2" id="workIdDorDetail2" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td><label>Product Id</label></td>
                                                            <td>
                                                                <input name="productIdDorDetail" id="productIdDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                            <td>
                                                                <input name="productIdDorDetail2" id="productIdDorDetail2" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><label>PR Price</label></td>
                                                            <td>
                                                                <input name="priceDorDetail" id="priceDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td><Label>Average Price</Label></td>
                                                            <td>
                                                                <input name="averageDorDetail" id="averageDorDetail" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><Label>Qty Request</Label></td>
                                                            <td>
                                                                <input name="qtyDorDetail" id="qtyDorDetail" style="border-radius:0;" type="text" class="form-control ChangeQty">
                                                                <input name="qty" id="qtyDorHide" style="border-radius:0;" type="hidden" class="form-control">
                                                                <input name="status" id="status" style="border-radius:0;width:100px;" type="hidden" class="form-control" readonly="">
                                                            </td>
                                                            <td>
                                                                <input name="qtyDorDetail2" id="qtyDorDetail2" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                                            <p style="position:relative;text-align:center;top:7px;">Available Total</p>
                                                        </div>
                                                        <div class="card-body table-responsive p-0 available" style="height: 108px;">
                                                            <table>
                                                                <tbody>
                                                                    <br>
                                                                    <tr>
                                                                        <td title="Total BOQ Detail"><label>PR Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;">
                                                                            <input name="price" id="prQty" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>In DOR Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;">
                                                                            <input name="price" id="inDorQty" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label>Balance Qty</label></td>
                                                                        <td>:</td>
                                                                        <td style="font-weight:bold;color:red;">
                                                                            <input name="price" id="balanceQty" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control">
                                                                        </td>
                                                                        <td>Ls</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="padding-right:10px;padding-top:5px;">
                                                    <a class="btn btn-default btn-sm float-right CancelDor" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                                                    </a>
                                                    <a class="btn btn-default btn-sm float-right" onclick="addFromDetailDortoCart();" id="addFromDetailDortoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

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

                                <div class="card-body table-responsive p-0 detailDorList">
                                    <table class="table table-head-fixed text-nowrap TableDorCart">
                                        <thead>
                                            <tr>
                                                <th>Action</th>
                                                <th>Trano</th>
                                                <th>Work Id</th>
                                                <th>Product Id</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>PR Price</th>
                                                <th>Average</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-body table-responsive p-0 detailDorList">
                                    <table class="table table-head-fixed table-sm text-nowrap">
                                    <tfoot>
                                        <tr>
                                        <th style="color:brown;float:right;">Total Delivery Order Request : <span id="TotalDeliveryOrderRequest"></span></th>
                                        </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                            <a onclick="cancelAdvance();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                            </a>
                            <button class="btn btn-default btn-sm float-right" type="submit" id="buttonSubmitDor" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@include('Partials.footer')
@include('Inventory.DeliveryOrderRequest.Functions.Footer.FooterDor')
@endsection