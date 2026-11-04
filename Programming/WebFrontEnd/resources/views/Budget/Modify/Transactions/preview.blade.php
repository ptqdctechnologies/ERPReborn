@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Preview Modify Budget
                        </label>
                    </div>
                </div>

                <div class="card px-3 py-4">
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
                                <dd class="col">
                                    Q000062 - XL Microcell 2007
                                </dd>
                            </div>

                            <!-- SUB BUDGET CODE -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Sub Budget Code
                                </dt>
                                <dd class="col">
                                    240 - Cendana Andalas
                                </dd>
                            </div>
                        </div>
                        <div class="col">
                            <!-- CURRENCY -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Currency
                                </dt>
                                <dd class="col">
                                    USD - United States Dollar
                                </dd>
                            </div>

                            <!-- EXCHANGE RATE -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Exchange Rate
                                </dt>
                                <dd class="col">
                                    16,000.00
                                </dd>
                            </div>

                            <!-- REASON -->
                            <div class="row" style="gap: 4px;">
                                <dt class="col-lg-4">
                                    Reason
                                </dt>
                                <dd class="col">
                                    Reason for modify
                                </dd>
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
                                        <td
                                            class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                            <?= $dataTable['sectionOne']['thirdRow']['valuta']; ?>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Origin CO IDR + Origin CO Foreign Currency <br /> Origin CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['origin'], 2); ?> <br /> Origin CO Foreign Currency : <?= number_format($dataTable['sectionOne']['secondRow']['origin'], 2); ?> * Transaction's rate (<?= number_format($exchangeRate, 2); ?>) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionOne']['thirdRow']['origin'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Previous CO IDR + Previous CO Foreign Currency <br /> Previous CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['previous'], 2); ?> <br /> Previous CO Foreign Currency : <?= number_format($dataTable['sectionOne']['secondRow']['previous'], 2); ?> * <?= number_format($exchangeRate, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionOne']['thirdRow']['previous'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Add(subt) CO IDR + Add(subt) CO Foreign Currency <br /> Add(subt) CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['addSubt'], 2); ?> <br /> Add(subt) CO  Foreign Currency : <?= number_format($dataTable['sectionOne']['secondRow']['addSubt'], 2); ?> * <?= number_format($exchangeRate, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionOne']['thirdRow']['addSubt'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Total Current CO IDR + Total Current CO USD <br /> Total Current CO IDR : <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'], 2); ?> <br /> Total Current CO Foreign Currency : <?= number_format($dataTable['sectionOne']['secondRow']['totalCurrent'], 2); ?> * <?= number_format($exchangeRate, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionOne']['thirdRow']['totalCurrent'], 2); ?>
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
                                        <td class="text-center"><?= $dataTable['sectionTwo']['secondRow']['valuta']; ?></td>
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
                                    <tr>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <?= $dataTable['sectionTwo']['thirdRow']['description']; ?>
                                        </td>
                                        <td
                                            class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                            <?= $dataTable['sectionTwo']['thirdRow']['valuta']; ?>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Origin Add(Subt) Cost IDR + Origin Add(Subt) Cost Foreign Currency <br /> Origin Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['origin'], 2); ?> <br /> Origin Add(Subt) Cost Foreign Currency : <?= number_format($dataTable['sectionTwo']['secondRow']['origin'], 2); ?> * Transaction's rate (<?= number_format($exchangeRate, 2); ?>) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionTwo']['thirdRow']['origin'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Previous Add(Subt) Cost IDR + Recorded Cost Foreign Currency + Balance Budget Foreign Currency <br /> Previous Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['previous'], 2); ?> <br /> Recorded Cost Foreign Currency : 0.00 (<?= number_format($exchangeRate, 2); ?> * Transaction's exchange rate) <br /> Balance Budget Foreign Currency : 0.00 * <?= number_format($exchangeRate, 2); ?>"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionTwo']['thirdRow']['previous'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Add(Subt) Cost IDR + Add(Subt) Cost Foreign Currency <br /> Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['addSubt'], 2); ?> <br /> Add(Subt) Cost Foreign Currency : <?= number_format($dataTable['sectionTwo']['secondRow']['addSubt'], 2); ?> * <?= number_format($exchangeRate, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionTwo']['thirdRow']['addSubt'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Total Current Add(Subt) Cost IDR  + Recorded Cost Foreign Currency + Balance Budget Foreign Currency + Add(Subt) Cost Foreign Currency <br /> Total Current Add(Subt) Cost IDR : <?= number_format($dataTable['sectionTwo']['firstRow']['totalCurrent'], 2); ?> <br /> Recorded Cost Foreign Currency : 0.00 (<?= number_format($exchangeRate, 2); ?> * Transaction's exchange rate) <br /> Balance Budget Foreign Currency : 0.00 * <?= number_format($exchangeRate, 2); ?> <br /> Add(Subt) Cost Foreign Currency : <?= number_format($dataTable['sectionTwo']['secondRow']['totalCurrent'], 2); ?> * <?= number_format($exchangeRate, 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionTwo']['thirdRow']['totalCurrent'], 2); ?>
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
                                            <?= number_format($dataTable['sectionThree']['firstRow']['origin'], 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($dataTable['sectionThree']['firstRow']['previous'], 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($dataTable['sectionThree']['firstRow']['addSubt'], 2); ?>
                                        </td>
                                        <td class="text-right">
                                            <?= number_format($dataTable['sectionThree']['firstRow']['totalCurrent'], 2); ?>
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
                                            <?= number_format($dataTable['sectionThree']['secondRow']['origin'], 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format($dataTable['sectionThree']['secondRow']['previous'], 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format($dataTable['sectionThree']['secondRow']['addSubt'], 2); ?>
                                        </td>
                                        <td class="border_top_dotted text-right">
                                            <?= number_format($dataTable['sectionThree']['secondRow']['totalCurrent'], 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <?= $dataTable['sectionThree']['thirdRow']['description']; ?>
                                        </td>
                                        <td
                                            class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                            <?= $dataTable['sectionThree']['thirdRow']['valuta']; ?>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Origin Gross Margin IDR + Origin Gross Margin Foreign Currency <br /> Origin Gross Margin IDR : <?= number_format($dataTable['sectionThree']['firstRow']['origin'], 2); ?> <br /> Origin Gross Margin Foreign Currency : <?= number_format($dataTable['sectionThree']['secondRow']['origin'], 2); ?> * Transaction's rate (<?= number_format($exchangeRate, 2); ?>) <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionThree']['thirdRow']['origin'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Previous CO Total - Previous Add(Subt) Cost Total <br /> Previous CO Total : <?= number_format($dataTable['sectionOne']['thirdRow']['previous'], 2); ?> <br /> Previous Add(Subt) Cost Total : <?= number_format($dataTable['sectionTwo']['thirdRow']['previous'], 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionThree']['thirdRow']['previous'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Add(Subt) CO Total - Add(Subt) Add(Subt) Cost Total <br /> Add(Subt) CO Total : <?= number_format($dataTable['sectionThree']['firstRow']['addSubt'], 2); ?> <br /> Add(Subt) Cost Total : <?= number_format($dataTable['sectionThree']['secondRow']['addSubt'], 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionThree']['thirdRow']['addSubt'], 2); ?>
                                            </div>
                                        </td>
                                        <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="Total Current CO Total - Total Current Add(Subt) Cost Total <br /> Total Current CO Total : <?= number_format($dataTable['sectionOne']['firstRow']['totalCurrent'], 2); ?> <br /> Total Current Add(Subt) Cost Total : <?= number_format($dataTable['sectionTwo']['firstRow']['totalCurrent'], 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionThree']['thirdRow']['totalCurrent'], 2); ?>
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
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Origin Gross Margin Total / Origin CO Total) * 100% <br /> Origin Gross Margin Total : <?= number_format($dataTable['sectionThree']['thirdRow']['origin'], 2); ?> <br /> Origin CO Total : <?= number_format($dataTable['sectionOne']['thirdRow']['origin'], 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionFour']['firstRow']['origin'], 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Previous Gross Margin Total / Previous CO Total) * 100% <br /> Previous Gross Margin Total : <?= number_format($dataTable['sectionThree']['thirdRow']['previous'], 2); ?> <br /> Previous CO Total : <?= number_format($dataTable['sectionOne']['thirdRow']['previous'], 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionFour']['firstRow']['previous'], 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Total Current Gross Margin Total / Total Current CO Total) * 100% <br /> Total Current Gross Margin Total : <?= number_format($dataTable['sectionThree']['thirdRow']['totalCurrent'], 2); ?> <br /> Total Current CO Total : <?= number_format($dataTable['sectionOne']['thirdRow']['totalCurrent'], 2); ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionFour']['firstRow']['totalCurrent'], 2) . " %"; ?>
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
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Total Current Gross Margin % - Origin Gross Margin %) <br /> Total Current Gross Margin % : <?= number_format($dataTable['sectionFour']['firstRow']['totalCurrent'], 2) . " %"; ?> <br /> Origin Gross Margin % : <?= number_format($dataTable['sectionFour']['firstRow']['origin'], 2) . " %"; ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionFour']['secondRow']['origin'], 2) . " %"; ?>
                                            </div>
                                        </td>
                                        <td class="text-dark font-weight-bold">
                                            <div class="float-right border_bottom_dotted" data-toggle="tooltip"
                                                data-placement="bottom" data-html="true"
                                                title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : <?= number_format($dataTable['sectionFour']['firstRow']['totalCurrent'], 2) . " %"; ?> <br /> Previous Gross Margin % : <?= number_format($dataTable['sectionFour']['firstRow']['previous'], 2) . " %"; ?> <br />"
                                                style="width: max-content; cursor: help;">
                                                <?= number_format($dataTable['sectionFour']['secondRow']['previous'], 2) . " %"; ?>
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
                </div>
            </div>
        </section>
    </div>

    @include('Partials.footer')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/PreviewModifyBudget.css') }}">
@endpush