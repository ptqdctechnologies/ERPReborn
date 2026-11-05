@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getBudgetCode')
    @include('getFunction.getSiteCode')
    @include('getFunction.getCurrencies')
    @include('getFunction.getProductss')
    @include('getFunction.getWorks')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Modify Budget
                        </label>
                    </div>
                </div>

                @include('Budget.Modify.Functions.Menu.index')

                <form id="modifyBudgetForm" method="POST" action="{{ route('Budget.modify.preview') }}">
                    @csrf

                    <input type="hidden" id="workflow_path_id" name="workflow_path_id" />
                    <input type="hidden" id="workflow_comment" name="workflow_comment" />
                    <input type="hidden" id="total_modify_footer" name="total_modify_footer" />
                    <input type="hidden" id="total_price_footer" name="total_price_footer" />
                    <input type="hidden" id="total_amount_footer" name="total_amount_footer" />

                    <div class="card">
                        <!-- MODIFY BUDGET INFORMATION -->
                        <div class="tab-content px-3 pt-4 pb-2">
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
                                                    aria-label="Collapse Section Budget Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Modify.Functions.Header.information')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  MODIFY BUDGET HEADER -->
                        <div class="tab-content px-3 pb-2">
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
                                                    aria-label="Collapse Section Modify Budget Headers">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Modify.Functions.Header.header')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MODIFY BUDGET ATTACHMENT -->
                        <div class="tab-content px-3 pb-2">
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
                                                    aria-label="Collapse Section Modify Budget Attachments">
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
        'modify_budget_attachment',
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

                        <!--  CUSTOMER ORDER DETAILS -->
                        <div class="tab-content px-3 pb-2 d-none" id="customer_order_detail_tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Customer Order Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Modify Budget Headers">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Modify.Functions.Header.customerOrderDetail')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  MODIFY BUDGET DETAILS -->
                        <div class="tab-content px-3 pb-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Budget Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Modify Budget Headers">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Modify.Functions.Header.detail')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" id="modify_budget_submit_button"
                                        class="btn btn-default btn-sm float-right" data-toggle="modal"
                                        data-target="#modify_budget_summary_modal"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit"
                                            title="Submit to Modify Budget" />
                                        Submit
                                    </button>
                                    <button type="button" id="modify_budget_cancel_button"
                                        class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('Budget.modify') }}')"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13"
                                            alt="cancel" title="Cancel to Modify Budget"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('Budget.Modify.Functions.Footer.create')
    @include('Partials.footer')
@endsection