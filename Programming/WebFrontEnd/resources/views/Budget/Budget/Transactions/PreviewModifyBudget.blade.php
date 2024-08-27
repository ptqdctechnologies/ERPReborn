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
                <div class="text-center font-weight-bold title_approval">
                    PREVIEW MODIFY BUDGET
                </div>

                <!-- INFORMASI -->
                <div class="row">
                    <div class="col">
                        <!-- SUBMITTED DATE -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Submitted Date
                            </dt>
                            <dd class="col">
                                <?= date('j F Y'); ?>
                            </dd>
                        </div>

                        <!-- PIC -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                PIC
                            </dt>
                            <dd class="col">
                                <?= $pic; ?>
                            </dd>
                        </div>

                        <!-- BUDGET -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Budget
                            </dt>
                            <dd class="col" style="line-height: 15px;">
                                <?= $budgetCode; ?> - <?= $budgetName; ?>
                            </dd>
                        </div>

                        <!-- SITE -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Sub Budget
                            </dt>
                            <dd class="col" style="line-height: 15px;">
                                <?= $subBudgetCode; ?> - <?= $subBudgetName; ?>
                            </dd>
                        </div>
                    </div>

                    <div class="col">
                        <!-- CURRENCY -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Currency
                            </dt>
                            <dd class="col">
                                <?= $currencySymbol; ?> - <?= $currencyName; ?>
                            </dd>
                        </div>

                        <!-- EXCHANGE RATE -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Exchange Rate
                            </dt>
                            <dd class="col">
                                16,054
                            </dd>
                        </div>

                        <!-- REASON -->
                        <div class="row information_approval">
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
                        Attachment Files For Additional Revenue :
                    </div>
                    
                    <div class="col-12 mt-2">
                        <ul class="mb-0 container_attachment_list">
                            <li>
                                
                            </li>
                        </ul>
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
                                        <?= $dataTable['sectionOne']['firstRow']['origin']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionOne']['firstRow']['previous']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionOne']['firstRow']['addSubt']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionOne']['firstRow']['totalCurrent']; ?>
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
                                        <?= $dataTable['sectionOne']['secondRow']['origin']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= $dataTable['sectionOne']['secondRow']['previous']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= $dataTable['sectionOne']['secondRow']['addSubt']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= $dataTable['sectionOne']['secondRow']['totalCurrent']; ?>
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
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Origin CO IDR + Origin CO Cross Currency <br /> Origin CO IDR : 11,073,733,917 <br /> Origin CO Cross Currency : 0.00 * Transaction's rate (16,165) <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionOne']['thirdRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Previous CO IDR + Previous CO Cross Currency <br /> Previous CO IDR : 11,073,733,917 <br /> Previous CO Cross Currency : 0.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionOne']['thirdRow']['previous']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Add(subt) CO IDR + Add(subt) CO Cross Currency <br /> Add(subt) CO IDR : 0 <br /> Add(subt) CO  Cross Currency : 0.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionOne']['thirdRow']['addSubt']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Total Current CO IDR + Total Current CO USD <br /> Total Current CO IDR : 11,073,733,917 <br /> Total Current CO Cross Currency : 0.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionOne']['thirdRow']['totalCurrent']; ?>
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
                                        <?= $dataTable['sectionTwo']['firstRow']['origin']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionTwo']['firstRow']['previous']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionTwo']['firstRow']['addSubt']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionTwo']['firstRow']['totalCurrent']; ?>
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
                                        <?= $dataTable['sectionTwo']['secondRow']['origin']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionTwo']['secondRow']['previous']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionTwo']['secondRow']['addSubt']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionTwo']['secondRow']['totalCurrent']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $dataTable['sectionTwo']['thirdRow']['description']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionTwo']['thirdRow']['valuta']; ?>
                                    </td>
                                    <td class="font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="ASF Claim + BSF Claim + Piecemeal + OCA + RPI(to site) + DO - (Material Return + Material Cancel) - Cancel RPI" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionTwo']['thirdRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="text-right" style="color: #404040;">
                                        <?= $dataTable['sectionTwo']['thirdRow']['previous']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionTwo']['thirdRow']['addSubt']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionTwo']['thirdRow']['totalCurrent']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?= $dataTable['sectionTwo']['fourthRow']['description']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionTwo']['fourthRow']['valuta']; ?>
                                    </td>
                                    <td class="font-weight-bold text-dark">
                                        <div class="float-right" style="width: max-content;">
                                            <?= $dataTable['sectionTwo']['fourthRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="text-right" style="color: #404040;">
                                        <?= $dataTable['sectionTwo']['fourthRow']['previous']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionTwo']['fourthRow']['addSubt']; ?>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionTwo']['fourthRow']['totalCurrent']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <?= $dataTable['sectionTwo']['fifthRow']['description']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">
                                        <?= $dataTable['sectionTwo']['fifthRow']['valuta']; ?>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Origin Add(Subt) Cost IDR + Origin Add(Subt) Cost Cross Currency <br /> Origin Add(Subt) Cost IDR : 9,938,409,279 <br /> Origin Add(Subt) Cost Cross Currency : 0.00 * Transaction's rate (15,245) <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionTwo']['fifthRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Previous Add(Subt) Cost IDR + Recorded Cost Cross Currency + Balance Budget Cross Currency <br /> Previous Add(Subt) Cost IDR : 9,906,620,083 <br /> Recorded Cost Cross Currency : 0.00 (0.00 * Transaction's exchange rate) <br /> Balance Budget Cross Currency : 0.00 * 17,632" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionTwo']['fifthRow']['previous']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Add(Subt) Cost IDR + Add(Subt) Cost Cross Currency <br /> Add(Subt) Cost IDR : 0 <br /> Add(Subt) Cost Cross Currency : 6.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionTwo']['fifthRow']['addSubt']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Total Current Add(Subt) Cost IDR  + Recorded Cost Cross Currency + Balance Budget Cross Currency + Add(Subt) Cost Cross Currency <br /> Total Current Add(Subt) Cost IDR : 9,906,620,083 <br /> Recorded Cost Cross Currency : 0.00 (0.00 * Transaction's exchange rate) <br /> Balance Budget Cross Currency : 0.00 * 17,632 <br /> Add(Subt) Cost Cross Currency : 6.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionTwo']['fifthRow']['totalCurrent']; ?>
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
                                        <?= $dataTable['sectionThree']['firstRow']['origin']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionThree']['firstRow']['previous']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionThree']['firstRow']['addSubt']; ?>
                                    </td>
                                    <td class="text-right">
                                        <?= $dataTable['sectionThree']['firstRow']['totalCurrent']; ?>
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
                                        <?= $dataTable['sectionThree']['secondRow']['origin']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= $dataTable['sectionThree']['secondRow']['previous']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= $dataTable['sectionThree']['secondRow']['addSubt']; ?>
                                    </td>
                                    <td class="border_top_dotted text-right">
                                        <?= $dataTable['sectionThree']['secondRow']['totalCurrent']; ?>
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
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Origin Gross Margin IDR + Origin Gross Margin Cross Currency <br /> Origin Gross Margin IDR : 1,135,324,639 <br /> Origin Gross Margin Cross Currency : 0.00 * Transaction's rate (15,245) <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionThree']['thirdRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Previous CO Total - Previous Add(Subt) Cost Total <br /> Previous CO Total : 11,073,733,917 <br /> Previous Add(Subt) Cost Total : 9,906,620,083 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionThree']['thirdRow']['previous']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Add(Subt) CO Total - Add(Subt) Add(Subt) Cost Total <br /> Add(Subt) CO Total : 0 <br /> Add(Subt) Add(Subt) Cost Total : 105,792 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionThree']['thirdRow']['addSubt']; ?>
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Total Current CO Total - Total Current Add(Subt) Cost Total <br /> Total Current CO Total : 11,073,733,917 <br /> Total Current Add(Subt) Cost Total : 9,906,725,875 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionThree']['thirdRow']['totalCurrent']; ?>
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
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Origin Gross Margin Total / Origin CO Total) * 100% <br /> Origin Gross Margin Total : 1,135,324,638.63 <br /> Origin CO Total : 11,073,733,917.13 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionFour']['firstRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Previous Gross Margin Total / Previous CO Total) * 100% <br /> Previous Gross Margin Total : 1,167,113,834.63 <br /> Previous CO Total : 11,073,733,917.13 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionFour']['firstRow']['previous']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $dataTable['sectionFour']['firstRow']['addSubt']; ?>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin Total / Total Current CO Total) * 100% <br /> Total Current Gross Margin Total : 1,167,008,042.63 <br /> Total Current CO Total : 11,073,733,917.13 <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionFour']['firstRow']['totalCurrent']; ?>
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
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Origin Gross Margin %) <br /> Total Current Gross Margin % : 10.54 % <br /> Origin Gross Margin % : 10.25 % <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionFour']['secondRow']['origin']; ?>
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : 10.54 % <br /> Previous Gross Margin % : 10.54 % <br />" style="width: max-content; cursor: help;">
                                            <?= $dataTable['sectionFour']['secondRow']['previous']; ?>
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
                                        <?= $dataTable['sectionFive']['firstRow']['totalCurrent']; ?>
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
                                        <?= $dataTable['sectionFive']['secondRow']['totalCurrent']; ?>
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
                                            <?= $dataTable['sectionFive']['thirdRow']['totalCurrent']; ?>
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
                                            <?= $dataTable['sectionFive']['fourthRow']['totalCurrent']; ?>
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
                        Modify Budget Table
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th>PRODUCT ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>QTY BUDGET</th>
                                    <th>QTY AVAIL</th>
                                    <th>PRICE</th>
                                    <th>CURRENCY</th>
                                    <th>BALANCE BUDGET</th>
                                    <th>TOTAL BUDGET</th>
                                    <th>QTY ADDITIONAL</th>
                                    <th>PRICE ADDITIONAL</th>
                                    <th>TOTAL ADDITIONAL</th>
                                    <th>QTY SAVING</th>
                                    <th>PRICE SAVING</th>
                                    <th>TOTAL SAVING</th>
                                    <!-- <th class="text-center align-middle">PRODUCT ID</th>
                                    <th class="align-middle">PRODUCT NAME</th>
                                    <th class="text-center align-middle">QTY BUDGET</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">QTY <br /> (BOQ3)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">UNIT PRICE <br /> (BOQ3)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">TOTAL <br /> (BOQ3)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">QTY <br /> (REQUEST)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">UNIT PRICE <br /> (REQUEST)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">TOTAL <br /> (REQUEST)</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td style="line-height: 15px;">129461-0000 - Pengambilan Undisturbed Sample Tanah</td>
                                    <td>MI</td>
                                    <td class="text-right">0.00</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">2.00</td>
                                    <td class="text-right">2,000,000</td>
                                    <td class="text-right">4,000,000</td>
                                </tr>

                                <!-- FOOTER -->
                                <tr>
                                    <td colspan="10" class="font-weight-bold" style="font-size: 12px;">
                                        Total
                                    </td>
                                    <td class="text-right">
                                        0
                                    </td>
                                    <td colspan="2"></td>
                                    <td class="text-right">
                                        4,000,000
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10" class="font-weight-bold" style="font-size: 12px;">
                                        Total Additional Costs
                                    </td>
                                    <td class="text-right">
                                        4,000,000
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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