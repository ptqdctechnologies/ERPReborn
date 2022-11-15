@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('Inventory.DeliveryOrder.Functions.PopUp.PopUpDoRevision')


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
                <form method="post" enctype="multipart/form-data" action="{{ route('DeliveryOrderRequest.store') }}" id="FormSubmitDor">
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">
                        @include('Inventory.DeliveryOrder.Functions.Header.HeaderDo')
                        <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                DOR Detail
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
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Average Price</th>
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
                                                    <input id="putProductId" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty quantity" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                                                    <input id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="priceCek" style="border-radius:0;" type="text" class="form-control ChangePrice" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" readonly>
                                                    <input id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="average" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <!-- Untuk Validasi -->
                                                <input id="statusEditDor" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                                                <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">

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

                                    <div class="card-body table-responsive p-0 detailDorList" style="height: 180px;">
                                        <table class="table table-head-fixed text-nowrap TableDorCart" id="TableDorCart">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Trano</th>
                                                    <th>Work Id</th>
                                                    <th>Product Id</th>
                                                    <th>Product Name</th>
                                                    <th>Qty</th>
                                                    <th>PR Price</th>
                                                    <th>Average Price</th>
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
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDeliveryOrder')
@endsection