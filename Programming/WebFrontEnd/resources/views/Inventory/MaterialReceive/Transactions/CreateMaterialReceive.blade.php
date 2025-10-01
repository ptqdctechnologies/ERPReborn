@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getWorkFlow')
@include('getFunction.getWarehouses')
@include('getFunction.getDeliveryOrder')
@include('getFunction.getMaterialReceive')
@include('Inventory.MaterialReceive.Functions.PopUp.PopUpMaterialReceiveRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Material Receive
                    </label>
                </div>
            </div>

            @include('Inventory.MaterialReceive.Functions.Menu.MenuMaterialReceive')
            @if($var == 0)
            <!-- CONTENT -->
            <div class="card">
                <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormSubmitMaterialReceive">
                    @csrf
                    <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
                    <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">
                    <input type="hidden" name="materialReceiveDetail" id="materialReceiveDetail">
                    <input type="hidden" name="transporterRefID" id="transporterRefID">
                    <input type="hidden" name="deliveryDateTimeTZ" id="deliveryDateTimeTZ">

                    <!-- ADD NEW MATERIAL RECEIVE -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add New Material Receive
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @include('Inventory.MaterialReceive.Functions.Header.HeaderMaterialReceive')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ATTACH FILE -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Attach File
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col p-0">
                                                        <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                                                        <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                        $varAPIWebToken,
                                                        'dataInput_Log_FileUpload',
                                                        null,
                                                        'dataInput_Return'
                                                        ).
                                                        ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DELIVERY ORDER DETAIL -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
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

                                    @include('Inventory.MaterialReceive.Functions.Table.TableMaterialResource')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- REMARK -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Remark
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- CONTENT -->
                                    <div class="card-body">
                                        <div class="row py-3">
                                            <textarea name="var_remark" id="remark" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit Material Receive"> Submit
                                </button>

                                <a class="btn btn-default btn-sm float-right" onclick="CancelMaterialReceive()" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Material Receive"> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </section>
</div>

<div class="modal fade" id="materialReceiveFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="margin: 0px;font-weight:bold;">Are you sure you want to save this data?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="wrapper-budget card-body table-responsive p-0" style="max-height:200px;">
                    <table class="table table-head-fixed text-nowrap table-sm" id="tableMaterialReceiveList" style="border: 1px solid #dee2e6;">
                        <tbody></tbody>
                    </table>
                </div>
                <div class="card-body">
                    <table style="float:right;">
                        <tr>
                            <th id="GrandTotal"></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitMaterialReceive" class="btn btn-default btn-sm" onclick="SubmitForm();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Yes, save it
                </button>

                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> No, cancel
                </button>
            </div>
        </div>
    </div>
</div>

@include('Partials.footer')
@include('Inventory.MaterialReceive.Functions.Footer.FooterMaterialReceive')
@endsection