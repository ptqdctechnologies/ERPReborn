@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getSuppliers')
    @include('getFunction.getCurrencies')
    @include('getFunction.getPurchaseOrder')
    @include('getFunction.getPurchaseRequisition')
    @include('Purchase.PurchaseOrder.Functions.PopUp.revision')
    @include('Purchase.PurchaseOrder.Functions.PopUp.summary')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Purchase Order
                        </label>
                    </div>
                </div>

                @include('Purchase.PurchaseOrder.Functions.Menu.index')

                <form id="purchaseOrderForm">
                    @csrf

                    <input type="hidden" id="workflow_path_id" name="workflow_path_id" />
                    <input type="hidden" id="workflow_comment" name="workflow_comment" />
                    <input type="hidden" id="delivery_to_id" name="delivery_to_id" />
                    <input type="hidden" id="tariff_currency_value" name="tariff_currency_value" />

                    <div class="card">
                        <!-- HEADER -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Header
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Header">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Purchase.PurchaseOrder.Functions.Header.header')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ATTACHMENT -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Attachment
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Attachment">
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
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $token,
        'purchase_order_attachment',
        null,
        'dataInput_Return'
    ) .
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

                        <!-- INFORMATION -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Information
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Purchase.PurchaseOrder.Functions.Header.information')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DETAIL -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Detail">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Purchase.PurchaseOrder.Functions.Header.detail')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="button" id="purchase_order_submit_button"
                                        class="btn btn-default btn-sm float-right" data-toggle="modal"
                                        data-target="#purchase_order_summary_modal" onclick="showPurchaseOrderSummary()"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit"
                                            title="Submit to Purchase Order" />
                                        Submit
                                    </button>
                                    <button type="button" id="purchase_order_cancel_button"
                                        class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('PurchaseOrder.index') }}')"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13"
                                            alt="cancel" title="Cancel to Purchase Order"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('Purchase.PurchaseOrder.Functions.Footer.index')
    @include('Purchase.PurchaseOrder.Functions.Footer.create')
    @include('Partials.footer')
@endsection