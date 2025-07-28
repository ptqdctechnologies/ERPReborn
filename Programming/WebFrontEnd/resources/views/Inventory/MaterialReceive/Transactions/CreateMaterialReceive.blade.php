@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getWorkFlow')
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
                    <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" value="46000000000033">
                    <input type="hidden" name="materialReceiveDetail" id="materialReceiveDetail">
                    <input type="hidden" name="transporterRefID" id="transporterRefID">

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

                    <!-- MATERIAL RECEIVE CART -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Material Receive List (Cart)
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @include('Inventory.MaterialReceive.Functions.Table.TableDetailMaterialResource')
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
                                <a class="btn btn-default btn-sm float-right" onclick="CancelMaterialReceive()" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                </a>

                                <button class="btn btn-default btn-sm float-right" type="submit" id="submitMaterialReceive" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
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
@include('Inventory.MaterialReceive.Functions.Footer.FooterMaterialReceive')
@endsection