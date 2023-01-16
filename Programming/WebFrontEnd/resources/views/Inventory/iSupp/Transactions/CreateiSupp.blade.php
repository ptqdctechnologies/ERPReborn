@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Inventory.iSupp.Functions.PopUp.searchPoNumber')
@include('Inventory.iSupp.Functions.PopUp.searchDoNumber')
@include('Inventory.iSupp.Functions.PopUp.PopUpiSuppRevision')
@include('getFunction.getWarehouse')

<div class="content-wrapper" style="position:relative;bottom:12px;">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">i-Supp</label>
                </div>
            </div>
            @include('Inventory.iSupp.Functions.Menu.MenuiSupp')
            @if($var == 0)
            <div class="card" style="position:relative;bottom:10px;">
                <form method="post" enctype="multipart/form-data" action="{{ route('iSupp.store') }}" id="FormSubmitiSupp">
                    @csrf
                    <div class="tab-content p-3" id="nav-tabContent">
                        @include('Inventory.iSupp.Functions.Header.HeaderiSupp')

                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <label class="card-title">
                                                File Receipt
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
                                                    <input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" name="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
                                                </div>
                                                <br><br>
                                                <div class="col-md-12">
                                                    <div class="card-body table-responsive p-0" style="height:90px;">

                                                        <table class="table table-head-fixed table-sm text-nowrap">
                                                            <div class="form-group input_fields_wrap">

                                                                <div class="input-group control-group">

                                                                    <!-- <div id="dataShow_MasterFileRecord" style="border-style:solid; border-width:1px;"></div> -->
                                                                    <div id="dataShow_ActionPanel" style="border-style:solid; border-width:1px;"></div>

                                                                </div>
                                                            </div>

                                                        </table>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
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
                                                PO Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @include('Inventory.iSupp.Functions.Table.tablePoDetail')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Detail i-Supp
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0" id="DetailiSupp">
                                        <table class="table table-head-fixed text-nowrap table-sm" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Work Id</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Product Id</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:20%;border:1px solid #e9ecef;">Product Name</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:8%;border:1px solid #e9ecef;">Qty</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:3%;border:1px solid #e9ecef;">UOM</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Balance Qty</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;width:20%;border:1px solid #e9ecef;">Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                    <input id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                                                    <input id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="putUom" style="border-radius:0;" type="text" class="form-control" readonly>
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                                                </td>
                                                <td style="border:1px solid #e9ecef;">
                                                    <input id="remark" style="border-radius:0;" type="text" class="form-control">
                                                    <input id="remark2" style="border-radius:0;" type="hidden" class="form-control">
                                                </td>

                                                <input id="statusEditiSupp" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                                                <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">

                                            </tbody>
                                        </table>
                                        <br>
                                        <div style="padding-right:10px;padding-top:10px;">
                                            <a class="btn btn-default btn-sm float-right" onclick="CancelDetailIsupp()" id="CancelDetailDor" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
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
                                            i-Supp Cart
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body table-responsive p-0 iSuppCart" style="height: 180px;">
                                        <table class="table table-head-fixed text-nowrap table-striped TableiSuppCart" id="TableiSuppCart">
                                            <thead>
                                                <tr>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Action</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Work Id</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                                                    <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-body table-responsive p-0 iSuppCart">
                                        <table class="table table-head-fixed table-sm text-nowrap">
                                            <tfoot>
                                                <tr>
                                                    <th style="color:brown;float:right;">Total i-Supp : <span id="TotalISupp"></span></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <a onclick="CanceliSupp();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                </a>
                                <button class="btn btn-default btn-sm float-right" type="submit" id="SubmitiSupp" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
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
@include('Inventory.iSupp.Functions.Footer.FooteriSupp')
@endsection