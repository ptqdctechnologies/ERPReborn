@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getWorker')
@include('getFunction.getProject')
@include('getFunction.getWorkFlow')
@include('getFunction.getWarehouses')
@include('getFunction.getTransporters')
@include('getFunction.getPurchaseOrder')
@include('Inventory.DeliveryOrder.Functions.PopUp.PopUpDoRevision')
@include('Inventory.DeliveryOrder.Functions.PopUp.PopUpDoSummaryData')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Delivery Order
                    </label>
                </div>
            </div>

            @include('Inventory.DeliveryOrder.Functions.Menu.MenuDeliveryOrder')

            @if($var == 0)
            <div class="card">
                <form method="post" enctype="multipart/form-data" action="{{ route('SelectWorkFlow') }}" id="delivery_order_submit_form">
                    @csrf
                    <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentType_RefID; ?>">
                    <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">
                    
                    <!-- TRANSPORTER DETAIL -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
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

                                    @include('Inventory.DeliveryOrder.Functions.Header.HeaderDoDetail')
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

                    <!-- DELIVERY ORDER -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Delivery Order
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
                    </div>

                    <!-- REFERENCE DETAIL -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Reference Detail
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    @include('Inventory.DeliveryOrder.Functions.Table.TableReferenceNumberDetail')
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
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                </button>

                                <a onclick="cancelForm('{{ route('DeliveryOrder.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
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

@include('Partials.footer')
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDeliveryOrder')
@endsection