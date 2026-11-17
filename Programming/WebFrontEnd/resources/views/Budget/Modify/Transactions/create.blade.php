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

                <input type="hidden" id="workflow_path_id" name="workflow_path_id" />
                <input type="hidden" id="workflow_comment" name="workflow_comment" />
                <input type="hidden" id="total_modify_footer" name="total_modify_footer" />
                <input type="hidden" id="total_price_footer" name="total_price_footer" />
                <input type="hidden" id="total_amount_footer" name="total_amount_footer" />

                <div id="container-create-modify" class="card">
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
                                <button type="button" id="modify_budget_submit_button"
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
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="cancel"
                                        title="Cancel to Modify Budget"> Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="container-preview-modify" class="card px-3 py-4 d-none">
                    <!-- TITLE CARD -->
                    <div class="row mb-3">
                        <p class="col text-center font-weight-bold" style="font-size: 18px;">
                            PREVIEW MODIFY BUDGET
                        </p>
                    </div>

                    <!-- INFORMATION -->
                    <div class="row">
                        <div class="col">
                            <!-- SUBMITTED DATE -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Submitted Date
                                </dt>
                                <dd class="col">
                                    <?= date('j F Y'); ?>
                                </dd>
                            </div>

                            <!-- PIC -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    PIC
                                </dt>
                                <dd class="col">
                                    Icha Mailinda Syamsoedin
                                </dd>
                            </div>

                            <!-- BUDGET -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Budget Code
                                </dt>
                                <dd id="budget_label" class="col"></dd>
                            </div>

                            <!-- SUB BUDGET CODE -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Sub Budget Code
                                </dt>
                                <dd id="sub_budget_label" class="col"></dd>
                            </div>
                        </div>
                        <div class="col">
                            <!-- CURRENCY -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Currency
                                </dt>
                                <dd id="currency_label" class="col"></dd>
                            </div>

                            <!-- EXCHANGE RATE -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Exchange Rate
                                </dt>
                                <dd id="exchange_rate_label" class="col"></dd>
                            </div>

                            <!-- REASON -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Reason
                                </dt>
                                <dd id="reason_for_modify_label" class="col"></dd>
                            </div>
                        </div>
                    </div>

                    <!-- ATTACHMENT FILE -->
                    <div class="row"
                        style="background-color: #e0ecee; border: 1px solid #dedede; padding: 4px; margin: 10px 0px;">
                        <div class="col-12" style="color: #c15119; font-size: 12px; font-weight: bold;">
                            Attachment Files For Additional Revenue:
                        </div>

                        <div class="col-12 mt-2">
                            @if(isset($files))
                                                    <?php    echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                    $token,
                                    'dataInput_Log_FileUpload_1',
                                    $files,
                                    'dataInput_Return'
                                ) .
                                    ''; ?>
                            @else
                                <p>-</p>
                            @endif
                        </div>
                    </div>

                    <!-- TABLE -->
                    <div class="row m-0">
                        <div class="card-body p-0 d-flex justify-content-center">
                            <table class="table table-hover text-nowrap border border-dark" style="width: max-content;">
                                <thead>
                                    <tr style="background-color: #4b586a;">
                                        <th class="font-weight-bold text-white text-center">Description</th>
                                        <th class="font-weight-bold text-white text-center">Valuta</th>
                                        <th class="font-weight-bold text-white text-center">Origin</th>
                                        <th class="font-weight-bold text-white text-center">Previous</th>
                                        <th class="font-weight-bold text-white text-center">Add(subt)</th>
                                        <th class="font-weight-bold text-white text-center">Total Current</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- SECTION ONE -->
                                    <tr style="color: #404040;">
                                        <td>
                                            Customer Order (CO)
                                        </td>
                                        <td class="text-center">
                                            IDR
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border_top_dotted"></td>
                                        <td class="border_top_dotted text-center">
                                            Foreign Currency
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            Total Equivalent
                                        </td>
                                        <td
                                            class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                            IDR
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Origin CO IDR + Origin CO Foreign Currency <br /> Origin CO IDR : <?= number_format(0, 2); ?> <br /> Origin CO Foreign Currency : <?= number_format(0, 2); ?> * Transaction's rate (<?= number_format(0, 2); ?>) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Previous CO IDR + Previous CO Foreign Currency <br /> Previous CO IDR : <?= number_format(0, 2); ?> <br /> Previous CO Foreign Currency : <?= number_format(0, 2); ?> * <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Add(subt) CO IDR + Add(subt) CO Foreign Currency <br /> Add(subt) CO IDR : <?= number_format(0, 2); ?> <br /> Add(subt) CO  Foreign Currency : <?= number_format(0, 2); ?> * <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Total Current CO IDR + Total Current CO USD <br /> Total Current CO IDR : <?= number_format(0, 2); ?> <br /> Total Current CO Foreign Currency : <?= number_format(0, 2); ?> * <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- SECTION TWO -->
                                    <tr style="color: #404040;">
                                        <td>
                                            Add(Subt) Cost
                                        </td>
                                        <td class="text-center">
                                            IDR
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr style="color: #404040;">
                                        <td></td>
                                        <td class="text-center">Foreign Currency</td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            Total Equivalent
                                        </td>
                                        <td
                                            class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                            IDR
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Origin Add(Subt) Cost IDR + Origin Add(Subt) Cost Foreign Currency <br /> Origin Add(Subt) Cost IDR : <?= number_format(0, 2); ?> <br /> Origin Add(Subt) Cost Foreign Currency : <?= number_format(0, 2); ?> * Transaction's rate (<?= number_format(0, 2); ?>) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Previous Add(Subt) Cost IDR + Recorded Cost Foreign Currency + Balance Budget Foreign Currency <br /> Previous Add(Subt) Cost IDR : <?= number_format(0, 2); ?> <br /> Recorded Cost Foreign Currency : 0.00 (<?= number_format(0, 2); ?> * Transaction's exchange rate) <br /> Balance Budget Foreign Currency : 0.00 * <?= number_format(0, 2); ?>"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Add(Subt) Cost IDR + Add(Subt) Cost Foreign Currency <br /> Add(Subt) Cost IDR : <?= number_format(0, 2); ?> <br /> Add(Subt) Cost Foreign Currency : <?= number_format(0, 2); ?> * <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Total Current Add(Subt) Cost IDR  + Recorded Cost Foreign Currency + Balance Budget Foreign Currency + Add(Subt) Cost Foreign Currency <br /> Total Current Add(Subt) Cost IDR : <?= number_format(0, 2); ?> <br /> Recorded Cost Foreign Currency : 0.00 (<?= number_format(0, 2); ?> * Transaction's exchange rate) <br /> Balance Budget Foreign Currency : 0.00 * <?= number_format(0, 2); ?> <br /> Add(Subt) Cost Foreign Currency : <?= number_format(0, 2); ?> * <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- SECTION THREE -->
                                    <tr style="color: #404040;">
                                        <td>
                                            Gross Margin
                                        </td>
                                        <td class="text-center">
                                            IDR
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr style="color: #404040;">
                                        <td class="border_top_dotted"></td>
                                        <td class="border_top_dotted text-center">
                                            Foreign Currency
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            Total Equivalent
                                        </td>
                                        <td
                                            class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                            IDR
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Origin Gross Margin IDR + Origin Gross Margin Foreign Currency <br /> Origin Gross Margin IDR : <?= number_format(0, 2); ?> <br /> Origin Gross Margin Foreign Currency : <?= number_format(0, 2); ?> * Transaction's rate (<?= number_format(0, 2); ?>) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Previous CO Total - Previous Add(Subt) Cost Total <br /> Previous CO Total : <?= number_format(0, 2); ?> <br /> Previous Add(Subt) Cost Total : <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Add(Subt) CO Total - Add(Subt) Add(Subt) Cost Total <br /> Add(Subt) CO Total : <?= number_format(0, 2); ?> <br /> Add(Subt) Cost Total : <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Total Current CO Total - Total Current Add(Subt) Cost Total <br /> Total Current CO Total : <?= number_format(0, 2); ?> <br /> Total Current Add(Subt) Cost Total : <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- SECTION FOUR -->
                                    <tr>
                                        <td class="font-weight-bold text-danger">
                                            Gross Margin
                                        </td>
                                        <td class="font-weight-bold text-danger text-center">
                                            %
                                        </td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Origin Gross Margin Total / Origin CO Total) * 100% <br /> Origin Gross Margin Total : <?= number_format(0, 2); ?> <br /> Origin CO Total : <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Previous Gross Margin Total / Previous CO Total) * 100% <br /> Previous Gross Margin Total : <?= number_format(0, 2); ?> <br /> Previous CO Total : <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Total Current Gross Margin Total / Total Current CO Total) * 100% <br /> Total Current Gross Margin Total : <?= number_format(0, 2); ?> <br /> Total Current CO Total : <?= number_format(0, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2) . " %"; ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #ffff00;">
                                        <td class="font-weight-bold text-danger">
                                            Gross Margin Movement
                                        </td>
                                        <td class="font-weight-bold text-danger text-center">
                                            %
                                        </td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Total Current Gross Margin % - Origin Gross Margin %) <br /> Total Current Gross Margin % : <?= number_format(0, 2) . " %"; ?> <br /> Origin Gross Margin % : <?= number_format(0, 2) . " %"; ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : <?= number_format(0, 2) . " %"; ?> <br /> Previous Gross Margin % : <?= number_format(0, 2) . " %"; ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <!-- SECTION FIVE -->
                                    <tr style="color: #404040;">
                                        <td class="border-dark border-top">
                                            Recorded Cost
                                        </td>
                                        <td class="border-dark border-top text-center">
                                            IDR
                                        </td>
                                        <td class="border-dark border-top"></td>
                                        <td class="border-dark border-top"></td>
                                        <td class="border-dark border-top"></td>
                                        <td class="border-dark border-top text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr style="color: #404040;">
                                        <td class="border_top_dotted"></td>
                                        <td class="border_top_dotted text-center">
                                            Foreign Currency
                                        </td>
                                        <td class="border_top_dotted"></td>
                                        <td class="border_top_dotted"></td>
                                        <td class="border_top_dotted"></td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format(0, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-dark border-top font-weight-bold text-dark">
                                            Total Equivalent
                                        </td>
                                        <td class="border-dark border-top font-weight-bold text-dark text-center">
                                            IDR
                                        </td>
                                        <td class="border-dark border-top font-weight-bold text-dark"></td>
                                        <td class="border-dark border-top font-weight-bold text-dark"></td>
                                        <td class="border-dark border-top font-weight-bold text-dark"></td>
                                        <td class="border-dark border-top font-weight-bold text-dark text-right">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Recorded Cost IDR + Recorded Cost Foreign Currency <br /> Recorded Cost IDR : 28,847,447 <br /> Recorded Cost Foreign Currency : 0 (0.00 * Transaction's exchange rate) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-dark border-top font-weight-bold text-red">
                                            Actual Gross Margin
                                        </td>
                                        <td class="border-dark border-top font-weight-bold text-red text-center">
                                            %
                                        </td>
                                        <td class="border-dark border-top"></td>
                                        <td class="border-dark border-top"></td>
                                        <td class="border-dark border-top"></td>
                                        <td class="border-dark border-top font-weight-bold text-dark text-right">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="([Total Current CO * % Progress - Total Recorded Cost]/Total Current CO * % Progress)*100% Total Current CO : 11,073,733,917 <br /> % Progress : 0.00 % <br /> Total Recorded Cost : 28,847,447 <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format(0, 2); ?>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- MODIFY BUDGET TABLE -->
                    <div class="row mx-0" style="margin-top: 30px;">
                        <div class="text-center font-weight-bold table_title">
                            MODIFY BUDGET LIST (CART)
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="preview_details_table" class="table table-bordered table-hover text-nowrap"
                                style="border: 2px solid #e9e9e9;">
                                <thead>
                                    <tr>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Origin</th>
                                        <th class="text-center">Previous</th>
                                        <th class="text-center">Qty(+/-)</th>
                                        <th class="text-center">Add(subt)</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="font-weight-bold text-left" style="font-size: 12px;">
                                            GRAND TOTAL
                                        </td>
                                        <td id="preview_total" class="font-weight-bold text-left">
                                            0
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <!-- BUTTON CANCEL OR SUBMIT -->
                    <div class="row pt-2" style="margin-top: 1rem;">
                        <div class="col d-flex justify-content-end" style="gap: 8px;">
                            <div style="display: flex;">
                                <button type="button" id="preview_budget_cancel_button"
                                    class="btn btn-default btn-sm button-submit">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                                    <div>Cancel</div>
                                </button>
                            </div>
                            <div style="display: flex;">
                                <button type="button" id="preview_budget_submit_button"
                                    class="btn btn-default btn-sm button-submit" disabled>
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                                    <div>Submit</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('Budget.Modify.Functions.Footer.create')
    @include('Partials.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/PreviewModifyBudget.css') }}">
@endpush