@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getWorkFlow')
@include('getFunction.getWarehouses')
@include('getFunction.getMaterialReceive')
@include('Inventory.MaterialReceive.Functions.PopUp.PopUpMaterialReceiveRevision')
@include('Inventory.MaterialReceive.Functions.PopUp.PopUpMaterialReceiveSummaryData')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Revision Material Receive
                    </label>
                </div>
            </div>

            @include('Inventory.MaterialReceive.Functions.Menu.MenuMaterialReceive')
            <div class="card">
                <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormSubmitRevisionMaterialReceive">
                    @csrf
                    <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" />
                    <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" value="<?= $header['combinedBudget_RefID']; ?>">
                    <input type="hidden" name="warehouseInboundOrder_RefID" id="warehouseInboundOrder_RefID" value="<?= $header['warehouseInboundOrderRefID']; ?>">
                    <input type="hidden" name="transporter_RefID" id="transporter_RefID" value="<?= $header['transporterRefID']; ?>">
                    <input type="hidden" name="deliveryDate" id="deliveryDate" value="<?= $header['deliveryDate']; ?>">

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

                                    @include('Inventory.MaterialReceive.Functions.Header.HeaderMaterialReceiveRevision')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FILE ATTACHMENT -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            File Attachment
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
                                                        <?php if ($header['fileID']) { ?>
                                                            <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none" value="<?= $header['fileID']; ?>">
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                                $varAPIWebToken,
                                                                'dataInput_Log_FileUpload',
                                                                $header['fileID'],
                                                                'dataInput_Return'
                                                                ).
                                                            ''; ?>
                                                        <?php } else { ?>
                                                            <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                            $varAPIWebToken,
                                                            'dataInput_Log_FileUpload',
                                                            null,
                                                            'dataInput_Return'
                                                            ).
                                                            ''; ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MATERIAL RECEIVE DETAIL -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Material Receive Detail
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @include('Inventory.MaterialReceive.Functions.Table.TableRevisionMaterialResource')
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
                                            <textarea name="var_remark" id="remark" class="form-control">
                                                <?= $header['remarks']; ?>
                                            </textarea>
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
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                </button>

                                <a class="btn btn-default btn-sm float-right" onclick="CancelRevisionMaterialReceive()" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.MaterialReceive.Functions.Footer.FooterMaterialReceiveRevision')
@endsection