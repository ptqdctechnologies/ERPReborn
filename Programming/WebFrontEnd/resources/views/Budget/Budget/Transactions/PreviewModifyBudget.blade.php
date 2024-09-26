@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITTLE -->
            <div class="row mb-1 title-pages">
                <div class="col-sm-6 title">
                    Preview Modify Budget
                </div>
            </div>

            <!-- CONTENT -->
            <div class="card px-3 py-4">
                <!-- TITLE CARD -->
                <div class="row mb-3">
                    <!-- <div class="col">
                        <a
                            class="btn btn-default btn-sm button-submit"
                            id="submitButton"
                            style="width: max-content;"
                            href="{{ route('Budget.ModifyBudget', [
                                'budgetID'          => $budgetID,
                                'budgetCode'        => $budgetCode,
                                'budgetName'        => $budgetName,
                                'subBudgetID'       => $subBudgetID,
                                'subBudgetCode'     => $subBudgetCode,
                                'subBudgetName'     => $subBudgetName,
                                'reason'            => $reason,
                                'additionalCO'      => $additionalCO,
                                'currencyID'        => $currencyID,
                                'currencySymbol'    => $currencySymbol,
                                'currencyName'      => $currencyName,
                                'idrRate'           => $valueIDRRate,
                                'valueAdditionalCO' => $valueAdditionalCO,
                                'valueDeductiveCO'  => $valueDeductiveCO,
                                'dataModifyBudget'  => $dataModifyBudget
                            ]) }}"
                        >
                            <i class="fas fa-arrow-left"></i>
                            <div class="ml-1">Back</div>
                        </a>
                    </div> -->

                    <div class="col text-center font-weight-bold d-flex align-items-center justify-content-center" style="font-size: 18px;">
                        PREVIEW MODIFY BUDGET
                    </div>

                    <!-- <div class="col invisible">
                        <button class="btn btn-default btn-sm button-submit">
                            <i class="fas fa-arrow-left"></i>
                            <div>Back</div>
                        </button>
                    </div> -->
                </div>

                <!-- INFORMASI -->
                <div class="row">
                    <div class="col">
                        <!-- SUBMITTED DATE -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                Submitted Date
                            </dt>
                            <dd class="col">
                                <?= date('j F Y'); ?>
                            </dd>
                        </div>

                        <!-- PIC -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                PIC
                            </dt>
                            <dd class="col">
                                <?= $pic; ?>
                            </dd>
                        </div>

                        <!-- BUDGET -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                Budget
                            </dt>
                            <dd class="col" style="line-height: 15px;">
                                <?= $budgetCode; ?> - <?= $budgetName; ?>
                            </dd>
                        </div>

                        <!-- SITE -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                Sub Budget
                            </dt>
                            <dd class="col" style="line-height: 15px;">
                                <?= $subBudgetCode; ?>
                            </dd>
                        </div>
                    </div>

                    <div class="col">
                        <!-- CURRENCY -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                Currency
                            </dt>
                            <dd class="col">
                                <?= $currencySymbol . " - " . $currencyName; ?>
                            </dd>
                        </div>

                        <!-- EXCHANGE RATE -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                Exchange Rate
                            </dt>
                            <dd class="col">
                                <?= $idrRate; ?>
                            </dd>
                        </div>

                        <!-- REASON -->
                        <div class="row information_approval" style="gap: 4px;">
                            <dt class="col-lg-4">
                                Reason
                            </dt>
                            <dd class="col" style="line-height: 15px;">
                                <?= $reason; ?>
                            </dd>
                        </div>
                    </div>
                </div>

                <!-- ATTACHMENT FILE -->
                <div class="row container_attachment">
                    <div class="col-12 title_attachment">
                        Attachment Files For Additional Revenue:
                    </div>

                    <div class="col-12 mt-2">
                        @if($files)
                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile( \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'dataInput_Log_FileUpload_1',
                            $files,
                            'dataInput_Return'
                            ).
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
                                        <?= $dataTable['sectionOne']['firstRow']['description']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $dataTable['sectionOne']['firstRow']['valuta']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionOne']['firstRow']['origin'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionOne']['firstRow']['previous'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionOne']['firstRow']['addSubt'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border_top_dotted">
                                        <?= $dataTable['sectionOne']['secondRow']['description']; ?>
                                    </td>
                                    <td class="border_top_dotted text-center">
                                        <?= $dataTable['sectionOne']['secondRow']['valuta']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['origin'], 2); ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['previous'], 2); ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['addSubt'], 2); ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <?= $dataTable['sectionOne']['thirdRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                        <?= $dataTable['sectionOne']['thirdRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div 
                                            class="float-right border_bottom_dotted" 
                                            data-toggle="tooltip" 
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Origin CO IDR + Origin CO Cross Currency <br /> Origin CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['origin'], 2); ?> <br /> Origin CO Cross Currency : <?= number_format($dataTable['sectionOne']['secondRow']['origin'], 2); ?> * Transaction's rate (0.00) <br />" 
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format($dataTable['sectionOne']['firstRow']['origin'] + $dataTable['sectionOne']['secondRow']['origin'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Previous CO IDR + Previous CO Cross Currency <br /> Previous CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['previous'], 2); ?> <br /> Previous CO Cross Currency : <?= number_format($dataTable['sectionOne']['secondRow']['previous'], 2); ?> * 0.00 <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format($dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Add(subt) CO IDR + Add(subt) CO Cross Currency <br /> Add(subt) CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['addSubt'], 2); ?> <br /> Add(subt) CO  Cross Currency : <?= number_format($dataTable['sectionOne']['secondRow']['addSubt'], 2); ?> * 0.00 <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format($dataTable['sectionOne']['firstRow']['addSubt'] + $dataTable['sectionOne']['secondRow']['addSubt'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Total Current CO IDR + Total Current CO USD <br /> Total Current CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'], 2); ?> <br /> Total Current CO Cross Currency : <?= number_format($dataTable['sectionOne']['secondRow']['totalCurrent'], 2); ?> * 0.00 <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'], 2); ?>
                                        </div>
                                    </td>
                                </tr>

                                <!-- SECTION TWO -->
                                <tr style="color: #404040;">
                                    <td>
                                        <?= $dataTable['sectionTwo']['firstRow']['description']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $dataTable['sectionTwo']['firstRow']['valuta']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['firstRow']['origin'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['firstRow']['previous'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['firstRow']['addSubt'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['firstRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <tr style="color: #404040;">
                                    <td>
                                        <?= $dataTable['sectionTwo']['secondRow']['description']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $dataTable['sectionTwo']['secondRow']['valuta']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['secondRow']['origin'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['secondRow']['previous'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['secondRow']['addSubt'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionTwo']['secondRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <?php $dataTable['sectionTwo']['thirdRow']['description']; ?>
                                    </td>
                                    <td>
                                        <?php $dataTable['sectionTwo']['thirdRow']['valuta']; ?>
                                    </td>
                                    <td class="font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="ASF Claim + BSF Claim + Piecemeal + OCA + RPI(to site) + DO - (Material Return + Material Cancel) - Cancel RPI" style="width: max-content; cursor: help;">
                                            <?php $dataTable['sectionTwo']['thirdRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="text-right" style="color: #404040;">
                                        <?php number_format($dataTable['sectionTwo']['thirdRow']['previous'], 2); ?>
                                    </td>
                                    <td>
                                        <?php $dataTable['sectionTwo']['thirdRow']['addSubt']; ?>
                                    </td>
                                    <td>
                                        <?php $dataTable['sectionTwo']['thirdRow']['totalCurrent']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php $dataTable['sectionTwo']['fourthRow']['description']; ?>
                                    </td>
                                    <td>
                                        <?php $dataTable['sectionTwo']['fourthRow']['valuta']; ?>
                                    </td>
                                    <td class="font-weight-bold text-dark">
                                        <div class="float-right" style="width: max-content;">
                                            <?php $dataTable['sectionTwo']['fourthRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="text-right" style="color: #404040;">
                                        <?php number_format($dataTable['sectionTwo']['fourthRow']['previous'], 2); ?>
                                    </td>
                                    <td>
                                        <?php $dataTable['sectionTwo']['fourthRow']['addSubt']; ?>
                                    </td>
                                    <td>
                                        <?php $dataTable['sectionTwo']['fourthRow']['totalCurrent']; ?>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <?= $dataTable['sectionTwo']['fifthRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                        <?= $dataTable['sectionTwo']['fifthRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Origin Add(Subt) Cost IDR + Origin Add(Subt) Cost Cross Currency <br /> Origin Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['origin'], 2); ?> <br /> Origin Add(Subt) Cost Cross Currency : <?= number_format($dataTable['sectionTwo']['secondRow']['origin'], 2); ?> * Transaction's rate (0.00) <br />"
                                            style="width: max-content; cursor: help;">
                                            <?= number_format($dataTable['sectionTwo']['firstRow']['origin'] + $dataTable['sectionTwo']['secondRow']['origin'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Previous Add(Subt) Cost IDR + Recorded Cost Cross Currency + Balance Budget Cross Currency <br /> Previous Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['previous'], 2); ?> <br /> Recorded Cost Cross Currency : 0.00 (0.00 * Transaction's exchange rate) <br /> Balance Budget Cross Currency : 0.00 * 0.00"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format($dataTable['sectionTwo']['firstRow']['previous'] + $dataTable['sectionTwo']['secondRow']['previous'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Add(Subt) Cost IDR + Add(Subt) Cost Cross Currency <br /> Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['addSubt'], 2); ?> <br /> Add(Subt) Cost Cross Currency : <?= number_format($dataTable['sectionTwo']['secondRow']['addSubt'], 2); ?> * 0.00 <br />"
                                            style="width: max-content; cursor: help;">
                                            <?= number_format($dataTable['sectionTwo']['firstRow']['addSubt'] + $dataTable['sectionTwo']['secondRow']['addSubt'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Total Current Add(Subt) Cost IDR  + Recorded Cost Cross Currency + Balance Budget Cross Currency + Add(Subt) Cost Cross Currency <br /> Total Current Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['totalCurrent'], 2); ?> <br /> Recorded Cost Cross Currency : 0.00 (0.00 * Transaction's exchange rate) <br /> Balance Budget Cross Currency : 0.00 * 0.00 <br /> Add(Subt) Cost Cross Currency : <?= number_format($dataTable['sectionTwo']['secondRow']['totalCurrent'], 2); ?> * 0.00 <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format($dataTable['sectionTwo']['firstRow']['totalCurrent'] + $dataTable['sectionTwo']['secondRow']['totalCurrent'], 2); ?>
                                        </div>
                                    </td>
                                </tr>

                                <!-- SECTION THREE -->
                                <tr style="color: #404040;">
                                    <td>
                                        <?= $dataTable['sectionThree']['firstRow']['description']; ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $dataTable['sectionThree']['firstRow']['valuta']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionOne']['firstRow']['previous'] - $dataTable['sectionTwo']['firstRow']['previous'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format($dataTable['sectionThree']['firstRow']['addSubt'], 2); ?>
                                    </td>
                                    <td class="text-right">
                                        <?= number_format(($dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent']) - ($dataTable['sectionTwo']['firstRow']['totalCurrent'] + $dataTable['sectionTwo']['secondRow']['totalCurrent']), 2); ?>
                                    </td>
                                </tr>
                                <tr style="color: #404040;">
                                    <td class="border_top_dotted">
                                        <?= $dataTable['sectionThree']['secondRow']['description']; ?>
                                    </td>
                                    <td class="border_top_dotted text-center">
                                        <?= $dataTable['sectionThree']['secondRow']['valuta']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin'], 2); ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['previous'] - $dataTable['sectionTwo']['secondRow']['previous'], 2); ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['addSubt'] - $dataTable['sectionTwo']['secondRow']['addSubt'], 2); ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <?= $dataTable['sectionThree']['thirdRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                        <?= $dataTable['sectionThree']['thirdRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Origin Gross Margin IDR + Origin Gross Margin Cross Currency <br /> Origin Gross Margin IDR : <?= number_format($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin'], 2); ?> <br /> Origin Gross Margin Cross Currency : <?= number_format($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin'], 2); ?> * Transaction's rate (0.00) <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format(($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin']) + ($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin']), 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Previous CO Total - Previous Add(Subt) Cost Total <br /> Previous CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous'], 2); ?> <br /> Previous Add(Subt) Cost Total : <?= number_format($dataTable['sectionTwo']['firstRow']['previous'] + $dataTable['sectionTwo']['secondRow']['previous'], 2); ?> <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format(($dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous']) - ($dataTable['sectionTwo']['firstRow']['previous'] + $dataTable['sectionTwo']['secondRow']['previous']), 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Add(Subt) CO Total - Add(Subt) Add(Subt) Cost Total <br /> Add(Subt) CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['addSubt'] + $dataTable['sectionOne']['secondRow']['addSubt'], 2); ?> <br /> Add(Subt) Cost Total : <?= number_format($dataTable['sectionTwo']['firstRow']['addSubt'] + $dataTable['sectionTwo']['secondRow']['addSubt'], 2); ?> <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format(($dataTable['sectionOne']['firstRow']['addSubt'] + $dataTable['sectionOne']['secondRow']['addSubt']) - ($dataTable['sectionTwo']['firstRow']['addSubt'] + $dataTable['sectionTwo']['secondRow']['addSubt']), 2); ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="Total Current CO Total - Total Current Add(Subt) Cost Total <br /> Total Current CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'], 2); ?> <br /> Total Current Add(Subt) Cost Total : <?= number_format($dataTable['sectionTwo']['firstRow']['totalCurrent'] + $dataTable['sectionTwo']['secondRow']['totalCurrent'], 2); ?> <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?= number_format(($dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent']) - ($dataTable['sectionTwo']['firstRow']['totalCurrent'] + $dataTable['sectionTwo']['secondRow']['totalCurrent']), 2); ?>
                                        </div>
                                    </td>
                                </tr>

                                <!-- SECTION FOUR -->
                                <tr>
                                    <td class="font-weight-bold text-danger">
                                        <?= $dataTable['sectionFour']['firstRow']['description']; ?>
                                    </td>
                                    <td class="font-weight-bold text-danger text-center">
                                        <?= $dataTable['sectionFour']['firstRow']['valuta']; ?>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="(Origin Gross Margin Total / Origin CO Total) * 100% <br /> Origin Gross Margin Total : <?= number_format(($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin']) + ($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin']), 2); ?> <br /> Origin CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['origin'] + $dataTable['sectionOne']['secondRow']['origin'], 2); ?> <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?php 
                                                $grossMarginOriginTotal     = ($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin']) + ($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin']);
                                                $customerOrderOriginTotal   = $dataTable['sectionOne']['firstRow']['origin'] + $dataTable['sectionOne']['secondRow']['origin'];
                                                $result                     = $grossMarginOriginTotal / $customerOrderOriginTotal;
                                                
                                                echo number_format($result, 2) . " %";
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="(Previous Gross Margin Total / Previous CO Total) * 100% <br /> Previous Gross Margin Total : <?= number_format(($dataTable['sectionOne']['firstRow']['previous'] - $dataTable['sectionTwo']['firstRow']['previous']) + ($dataTable['sectionOne']['secondRow']['previous'] - $dataTable['sectionTwo']['secondRow']['previous']), 2); ?> <br /> Previous CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous'], 2); ?> <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?php 
                                                $grossMarginPreviousTotal     = ($dataTable['sectionOne']['firstRow']['previous'] - $dataTable['sectionTwo']['firstRow']['previous']) + ($dataTable['sectionOne']['secondRow']['previous'] - $dataTable['sectionTwo']['secondRow']['previous']);
                                                $customerOrderPreviousTotal   = $dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous'];
                                                $result                     = $grossMarginPreviousTotal / $customerOrderPreviousTotal;
                                                
                                                echo number_format($result, 2) . " %";
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionFour']['firstRow']['addSubt']; ?>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div
                                            class="float-right border_bottom_dotted"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            data-html="true"
                                            title="(Total Current Gross Margin Total / Total Current CO Total) * 100% <br /> Total Current Gross Margin Total : <?= number_format(($dataTable['sectionOne']['firstRow']['totalCurrent'] - $dataTable['sectionTwo']['firstRow']['totalCurrent']) + ($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent']), 2); ?> <br /> Total Current CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'], 2); ?> <br />"
                                            style="width: max-content; cursor: help;"
                                            >
                                            <?php 
                                                $grossMarginTotalCurrent     = ($dataTable['sectionOne']['firstRow']['totalCurrent'] - $dataTable['sectionTwo']['firstRow']['totalCurrent']) + ($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent']);
                                                $customerOrderTotalCurrent   = $dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'];
                                                $result                     = $grossMarginTotalCurrent / $customerOrderTotalCurrent;
                                                
                                                echo number_format($result, 2) . " %";
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="background-color: #ffff00;">
                                    <td class="font-weight-bold text-danger">
                                        <?= $dataTable['sectionFour']['secondRow']['description']; ?>
                                    </td>
                                    <td class="font-weight-bold text-danger text-center">
                                        <?= $dataTable['sectionFour']['secondRow']['valuta']; ?>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Origin Gross Margin %) <br /> Total Current Gross Margin % : <?php
                                                // TOTAL CURRENT
                                                $grossMarginTotalCurrent     = ($dataTable['sectionOne']['firstRow']['totalCurrent'] - $dataTable['sectionTwo']['firstRow']['totalCurrent']) + ($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent']);
                                                $customerOrderTotalCurrent   = $dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'];
                                                $result                     = $grossMarginTotalCurrent / $customerOrderTotalCurrent;
                                                
                                                echo number_format($result, 2) . " %";
                                            ?> <br /> Origin Gross Margin % : <?php 
                                            // ORIGIN
                                            $grossMarginOriginTotal     = ($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin']) + ($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin']);
                                            $customerOrderOriginTotal   = $dataTable['sectionOne']['firstRow']['origin'] + $dataTable['sectionOne']['secondRow']['origin'];
                                            $resultOriginGrossMargin    = $grossMarginOriginTotal / $customerOrderOriginTotal;

                                            echo number_format($resultOriginGrossMargin, 2) . " %";
                                        ?> <br />" style="width: max-content; cursor: help;">
                                            <?php 
                                                // ORIGIN
                                                $grossMarginOriginTotal     = ($dataTable['sectionOne']['firstRow']['origin'] - $dataTable['sectionTwo']['firstRow']['origin']) + ($dataTable['sectionOne']['secondRow']['origin'] - $dataTable['sectionTwo']['secondRow']['origin']);
                                                $customerOrderOriginTotal   = $dataTable['sectionOne']['firstRow']['origin'] + $dataTable['sectionOne']['secondRow']['origin'];
                                                $resultOriginGrossMargin    = $grossMarginOriginTotal / $customerOrderOriginTotal;

                                                // TOTAL CURRENT
                                                $grossMarginTotalCurrent     = ($dataTable['sectionOne']['firstRow']['totalCurrent'] - $dataTable['sectionTwo']['firstRow']['totalCurrent']) + ($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent']);
                                                $customerOrderTotalCurrent   = $dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'];
                                                $result                     = $grossMarginTotalCurrent / $customerOrderTotalCurrent;
                                                
                                                echo number_format($result - $resultOriginGrossMargin, 2) . " %";
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : <?php 
                                                // TOTAL CURRENT
                                                $grossMarginTotalCurrent     = ($dataTable['sectionOne']['firstRow']['totalCurrent'] - $dataTable['sectionTwo']['firstRow']['totalCurrent']) + ($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent']);
                                                $customerOrderTotalCurrent   = $dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'];
                                                $result                     = $grossMarginTotalCurrent / $customerOrderTotalCurrent;
                                                
                                                echo number_format($result, 2) . " %";
                                            ?> <br /> Previous Gross Margin % : <?php 
                                            // PREVIOUS
                                            $grossMarginOriginTotal     = ($dataTable['sectionOne']['firstRow']['previous'] - $dataTable['sectionTwo']['firstRow']['previous']) + ($dataTable['sectionOne']['secondRow']['previous'] - $dataTable['sectionTwo']['secondRow']['previous']);
                                            $customerOrderOriginTotal   = $dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous'];
                                            $resultOriginGrossMargin    = $grossMarginOriginTotal / $customerOrderOriginTotal;

                                            echo number_format($resultOriginGrossMargin, 2) . " %";
                                        ?> <br />" style="width: max-content; cursor: help;">
                                            <?php 
                                                // PREVIOUS
                                                $grossMarginOriginTotal     = ($dataTable['sectionOne']['firstRow']['previous'] - $dataTable['sectionTwo']['firstRow']['previous']) + ($dataTable['sectionOne']['secondRow']['previous'] - $dataTable['sectionTwo']['secondRow']['previous']);
                                                $customerOrderOriginTotal   = $dataTable['sectionOne']['firstRow']['previous'] + $dataTable['sectionOne']['secondRow']['previous'];
                                                $resultOriginGrossMargin    = $grossMarginOriginTotal / $customerOrderOriginTotal;

                                                // TOTAL CURRENT
                                                $grossMarginTotalCurrent     = ($dataTable['sectionOne']['firstRow']['totalCurrent'] - $dataTable['sectionTwo']['firstRow']['totalCurrent']) + ($dataTable['sectionOne']['secondRow']['totalCurrent'] - $dataTable['sectionTwo']['secondRow']['totalCurrent']);
                                                $customerOrderTotalCurrent   = $dataTable['sectionOne']['firstRow']['totalCurrent'] + $dataTable['sectionOne']['secondRow']['totalCurrent'];
                                                $result                     = $grossMarginTotalCurrent / $customerOrderTotalCurrent;
                                                
                                                echo number_format($result - $resultOriginGrossMargin, 2) . " %";
                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionFour']['secondRow']['addSubt']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionFour']['secondRow']['totalCurrent']; ?>
                                    </td>
                                </tr>

                                <!-- SECTION FIVE -->
                                <tr style="color: #404040;">
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['firstRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top text-center">
                                        <?= $dataTable['sectionFive']['firstRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['firstRow']['origin']; ?>
                                    </td>
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['firstRow']['previous']; ?>
                                    </td>
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['firstRow']['addSubt']; ?>
                                    </td>
                                    <td class="border-dark border-top text-right">
                                        <?= number_format($dataTable['sectionFive']['firstRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <tr style="color: #404040;">
                                    <td class="border_top_dotted">
                                        <?= $dataTable['sectionFive']['secondRow']['description']; ?>
                                    </td>
                                    <td class="border_top_dotted text-center">
                                        <?= $dataTable['sectionFive']['secondRow']['valuta']; ?>
                                    </td>
                                    <td class="border_top_dotted">
                                        <?= $dataTable['sectionFive']['secondRow']['origin']; ?>
                                    </td>
                                    <td class="border_top_dotted">
                                        <?= $dataTable['sectionFive']['secondRow']['previous']; ?>
                                    </td>
                                    <td class="border_top_dotted">
                                        <?= $dataTable['sectionFive']['secondRow']['addSubt']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= number_format($dataTable['sectionFive']['secondRow']['totalCurrent'], 2); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top font-weight-bold text-dark">
                                        <?= $dataTable['sectionFive']['thirdRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-dark text-center">
                                        <?= $dataTable['sectionFive']['thirdRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-dark">
                                        <?= $dataTable['sectionFive']['thirdRow']['origin']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-dark">
                                        <?= $dataTable['sectionFive']['thirdRow']['previous']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-dark">
                                        <?= $dataTable['sectionFive']['thirdRow']['addSubt']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-dark text-right">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Recorded Cost IDR + Recorded Cost Cross Currency <br /> Recorded Cost IDR : 28,847,447 <br /> Recorded Cost Cross Currency : 0 (0.00 * Transaction's exchange rate) <br />" style="width: max-content; cursor: help;">
                                            <?= number_format($dataTable['sectionFive']['thirdRow']['totalCurrent'], 2); ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top font-weight-bold text-red">
                                        <?= $dataTable['sectionFive']['fourthRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-red text-center">
                                        <?= $dataTable['sectionFive']['fourthRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['fourthRow']['origin']; ?>
                                    </td>
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['fourthRow']['previous']; ?>
                                    </td>
                                    <td class="border-dark border-top">
                                        <?= $dataTable['sectionFive']['fourthRow']['addSubt']; ?>
                                    </td>
                                    <td class="border-dark border-top font-weight-bold text-dark text-right">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="([Total Current CO * % Progress - Total Recorded Cost]/Total Current CO * % Progress)*100% Total Current CO : 11,073,733,917 <br /> % Progress : 0.00 % <br /> Total Recorded Cost : 28,847,447 <br />" style="width: max-content; cursor: help;">
                                            <?= number_format($dataTable['sectionFive']['fourthRow']['totalCurrent'], 2); ?>
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
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="2">PRODUCT</th>
                                    <th class="text-center" colspan="3">BUDGET</th>
                                    <th class="text-center" colspan="3">AFTER ADDITIONAL</th>
                                    <th class="text-center" colspan="3">AFTER SAVING</th>
                                </tr>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">QTY</th>
                                    <th class="text-center">PRICE</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center">QTY</th>
                                    <th class="text-center">PRICE</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center">QTY</th>
                                    <th class="text-center">PRICE</th>
                                    <th class="text-center">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataModifyBudget as $data) { ?>                       
                                    <tr>
                                        <td class="text-center">
                                            <?= $data['productID']; ?>
                                        </td>
                                        <td class="text-wrap" style="line-height: 15px;">
                                            <?= $data['productName']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['qtyBudget']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['price']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['totalBudget']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['qtyAdditionals']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['priceAdditionals']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['totalAdditionals']; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['qtySavings'] != "0.00" ? $data['qtySavings'] : '-'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['priceSavings'] != "0.00" ? $data['priceSavings'] : '-'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?= $data['totalSavings'] != "0.00" ? $data['totalSavings'] : '-' ; ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <!-- FOOTER -->
                                <tr>
                                    <td colspan="7" class="font-weight-bold" style="font-size: 12px;">
                                        TOTAL
                                    </td>
                                    <td class="text-right">
                                        <?= $totalAdditional; ?>
                                    </td>
                                    <td colspan="2"></td>
                                    <td class="text-right">
                                        <?= $totalSaving != "0.00" ? $totalSaving : '-'; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- BUTTON CANCEL OR SUBMIT -->
                <div class="row pt-2" style="margin-top: 1rem;">
                    <div class="col d-flex justify-content-end" style="gap: 8px;">
                        <a
                            class="btn btn-default btn-sm button-submit"
                            id="submitButton"
                            style="width: max-content;"
                            href="{{ route('Budget.ModifyBudget', [
                                'files'             => $files,
                                'budgetID'          => $budgetID,
                                'budgetCode'        => $budgetCode,
                                'budgetName'        => $budgetName,
                                'subBudgetID'       => $subBudgetID,
                                'subBudgetCode'     => $subBudgetCode,
                                'subBudgetName'     => $subBudgetName,
                                'reason'            => $reason,
                                'additionalCO'      => $additionalCO,
                                'currencyID'        => $currencyID,
                                'currencySymbol'    => $currencySymbol,
                                'currencyName'      => $currencyName,
                                'idrRate'           => $valueIDRRate,
                                'valueAdditionalCO' => $valueAdditionalCO,
                                'valueDeductiveCO'  => $valueDeductiveCO,
                                'dataModifyBudget'  => $dataModifyBudget
                            ]) }}"
                            >
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                            <div>Cancel</div>
                        </a>

                        <div style="display: flex;">
                            <button class="btn btn-default btn-sm button-submit" id="submitButton" type="submit" disabled>
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                                <div>Submit</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </sction>
</div>

@include('Partials.footer')
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
      container: 'body'
    });
  });
</script>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/PreviewModifyBudget.css') }}">
@endpush