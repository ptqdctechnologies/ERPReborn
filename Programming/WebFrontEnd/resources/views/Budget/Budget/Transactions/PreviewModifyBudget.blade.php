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

                        <!-- MODIFY BUDGET NUMBER -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Modify Budget Number
                            </dt>
                            <dd class="col">
                                Budget-24000080
                            </dd>
                        </div>

                        <!-- PIC -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                PIC
                            </dt>
                            <dd class="col">
                                caesarandi
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
                    </div>

                    <div class="col">
                        <!-- CURRENCY -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Currency
                            </dt>
                            <dd class="col">
                                <?= $currencyName; ?>
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

                        <!-- SITE -->
                        <div class="row information_approval">
                            <dt class="col-lg-4">
                                Sub Budget
                            </dt>
                            <dd class="col" style="line-height: 15px;">
                                <?= $subBudgetCode; ?> - <?= $subBudgetName; ?>
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
                                <tr style="color: #404040;">
                                    <td>Customer Order (CO)</td>
                                    <td class="text-center">IDR</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">456,000,000</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">456,000,000</td>
                                </tr>
                                <tr>
                                    <td class="border_top_dotted"></td>
                                    <td class="border_top_dotted text-center">Cross Currency</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">Total</td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">IDR</td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Origin CO IDR + Origin CO Cross Currency <br /> Origin CO IDR : 11,073,733,917 <br /> Origin CO Cross Currency : 0.00 * Transaction's rate (16,165) <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Previous CO IDR + Previous CO Cross Currency <br /> Previous CO IDR : 11,073,733,917 <br /> Previous CO Cross Currency : 0.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            456,000,000
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Add(subt) CO IDR + Add(subt) CO Cross Currency <br /> Add(subt) CO IDR : 0 <br /> Add(subt) CO  Cross Currency : 0.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Total Current CO IDR + Total Current CO USD <br /> Total Current CO IDR : 11,073,733,917 <br /> Total Current CO Cross Currency : 0.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            456,000,000
                                        </div>
                                    </td>
                                </tr>

                                <tr style="color: #404040;">
                                    <td>Add(Subt) Cost</td>
                                    <td class="text-center">IDR</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">376,712,000</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">376,712,000</td>
                                </tr>
                                <tr style="color: #404040;">
                                    <td></td>
                                    <td class="text-center">Cross Currency</td>
                                    <td class="text-right">0.00</td>
                                    <td class="text-right">0.00</td>
                                    <td class="text-right">0.00</td>
                                    <td class="text-right">0.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="ASF Claim + BSF Claim + Piecemeal + OCA + RPI(to site) + DO - (Material Return + Material Cancel) - Cancel RPI" style="width: max-content; cursor: help;">
                                            Recorded Cost
                                        </div>
                                    </td>
                                    <td class="text-right" style="color: #404040;">0</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right" style="width: max-content;">
                                            Balanced Budget
                                        </div>
                                    </td>
                                    <td class="text-right" style="color: #404040;">0</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">Total</td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">IDR</td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Origin Add(Subt) Cost IDR + Origin Add(Subt) Cost Cross Currency <br /> Origin Add(Subt) Cost IDR : 9,938,409,279 <br /> Origin Add(Subt) Cost Cross Currency : 0.00 * Transaction's rate (15,245) <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Previous Add(Subt) Cost IDR + Recorded Cost Cross Currency + Balance Budget Cross Currency <br /> Previous Add(Subt) Cost IDR : 9,906,620,083 <br /> Recorded Cost Cross Currency : 0.00 (0.00 * Transaction's exchange rate) <br /> Balance Budget Cross Currency : 0.00 * 17,632" style="width: max-content; cursor: help;">
                                            376,712,000
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Add(Subt) Cost IDR + Add(Subt) Cost Cross Currency <br /> Add(Subt) Cost IDR : 0 <br /> Add(Subt) Cost Cross Currency : 6.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Total Current Add(Subt) Cost IDR  + Recorded Cost Cross Currency + Balance Budget Cross Currency + Add(Subt) Cost Cross Currency <br /> Total Current Add(Subt) Cost IDR : 9,906,620,083 <br /> Recorded Cost Cross Currency : 0.00 (0.00 * Transaction's exchange rate) <br /> Balance Budget Cross Currency : 0.00 * 17,632 <br /> Add(Subt) Cost Cross Currency : 6.00 * 17,632 <br />" style="width: max-content; cursor: help;">
                                            376,712,000
                                        </div>
                                    </td>
                                </tr>

                                <tr style="color: #404040;">
                                    <td>Gross Margin</td>
                                    <td class="text-center">IDR</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">79,288,000</td>
                                    <td class="text-right">0</td>
                                    <td class="text-right">79,288,000</td>
                                </tr>
                                <tr style="color: #404040;">
                                    <td class="border_top_dotted"></td>
                                    <td class="border_top_dotted text-center">Cross Currency</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">Total</td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark text-center">IDR</td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Origin Gross Margin IDR + Origin Gross Margin Cross Currency <br /> Origin Gross Margin IDR : 1,135,324,639 <br /> Origin Gross Margin Cross Currency : 0.00 * Transaction's rate (15,245) <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Previous CO Total - Previous Add(Subt) Cost Total <br /> Previous CO Total : 11,073,733,917 <br /> Previous Add(Subt) Cost Total : 9,906,620,083 <br />" style="width: max-content; cursor: help;">
                                            79,288,000
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Add(Subt) CO Total - Add(Subt) Add(Subt) Cost Total <br /> Add(Subt) CO Total : 0 <br /> Add(Subt) Add(Subt) Cost Total : 105,792 <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Total Current CO Total - Total Current Add(Subt) Cost Total <br /> Total Current CO Total : 11,073,733,917 <br /> Total Current Add(Subt) Cost Total : 9,906,725,875 <br />" style="width: max-content; cursor: help;">
                                            79,288,000
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-danger">Gross Margin</td>
                                    <td class="font-weight-bold text-danger text-center">%</td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Origin Gross Margin Total / Origin CO Total) * 100% <br /> Origin Gross Margin Total : 1,135,324,638.63 <br /> Origin CO Total : 11,073,733,917.13 <br />" style="width: max-content; cursor: help;">
                                            0.00 %
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Previous Gross Margin Total / Previous CO Total) * 100% <br /> Previous Gross Margin Total : 1,167,113,834.63 <br /> Previous CO Total : 11,073,733,917.13 <br />" style="width: max-content; cursor: help;">
                                            17.39 %
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin Total / Total Current CO Total) * 100% <br /> Total Current Gross Margin Total : 1,167,008,042.63 <br /> Total Current CO Total : 11,073,733,917.13 <br />" style="width: max-content; cursor: help;">
                                            17.39 %
                                        </div>
                                    </td>
                                </tr>
                                <tr style="background-color: #ffff00;">
                                    <td class="font-weight-bold text-danger">Gross Margin Movement</td>
                                    <td class="font-weight-bold text-danger text-center">%</td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Origin Gross Margin %) <br /> Total Current Gross Margin % : 10.54 % <br /> Origin Gross Margin % : 10.25 % <br />" style="width: max-content; cursor: help;">
                                            17.39 %
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="(Total Current Gross Margin % - Previous Gross Margin %) <br /> Total Current Gross Margin % : 10.54 % <br /> Previous Gross Margin % : 10.54 % <br />" style="width: max-content; cursor: help;">
                                            0.00 %
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr style="color: #404040;">
                                    <td class="border-dark border-top">Recorded Cost</td>
                                    <td class="border-dark border-top text-center">IDR</td>
                                    <td class="border-dark border-top"></td>
                                    <td class="border-dark border-top"></td>
                                    <td class="border-dark border-top"></td>
                                    <td class="border-dark border-top text-right">0</td>
                                </tr>
                                <tr style="color: #404040;">
                                    <td class="border_top_dotted"></td>
                                    <td class="border_top_dotted text-center">Cross Currency</td>
                                    <td class="border_top_dotted"></td>
                                    <td class="border_top_dotted"></td>
                                    <td class="border_top_dotted"></td>
                                    <td class="border_top_dotted text-right">0.00</td>
                                </tr>

                                <tr>
                                    <td class="border-dark border-top font-weight-bold text-dark">Total</td>
                                    <td class="border-dark border-top font-weight-bold text-dark text-center">IDR</td>
                                    <td class="border-dark border-top font-weight-bold text-dark"></td>
                                    <td class="border-dark border-top font-weight-bold text-dark"></td>
                                    <td class="border-dark border-top font-weight-bold text-dark"></td>
                                    <td class="border-dark border-top font-weight-bold text-dark text-right">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="Recorded Cost IDR + Recorded Cost Cross Currency <br /> Recorded Cost IDR : 28,847,447 <br /> Recorded Cost Cross Currency : 0 (0.00 * Transaction's exchange rate) <br />" style="width: max-content; cursor: help;">
                                            0
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-dark border-top font-weight-bold text-red">Actual Gross Margin</td>
                                    <td class="border-dark border-top font-weight-bold text-red text-center">%</td>
                                    <td class="border-dark border-top"></td>
                                    <td class="border-dark border-top"></td>
                                    <td class="border-dark border-top"></td>
                                    <td class="border-dark border-top font-weight-bold text-dark text-right">
                                        <div class="float-right border_bottom_dotted" data-toggle="tooltip" data-placement="bottom" data-html="true" title="([Total Current CO * % Progress - Total Recorded Cost]/Total Current CO * % Progress)*100% Total Current CO : 11,073,733,917 <br /> % Progress : 0.00 % <br /> Total Recorded Cost : 28,847,447 <br />" style="width: max-content; cursor: help;">
                                            0.00 %
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- AFE ADDITIONAL TABLE -->
                <div class="row mx-0" style="margin-top: 30px;">
                    <div class="text-center font-weight-bold table_title">
                        Modify Budget Table
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">NO</th>
                                    <th class="align-middle">NAME MATERIAL</th>
                                    <th class="text-center align-middle">UOM</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">QTY <br /> (BOQ3)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">UNIT PRICE <br /> (BOQ3)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">TOTAL <br /> (BOQ3)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">QTY <br /> (REQUEST)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">UNIT PRICE <br /> (REQUEST)</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">TOTAL <br /> (REQUEST)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="text-wrap" style="line-height: 15px;">129461-0000 - Pengambilan Undisturbed Sample Tanah</td>
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
                                    <td colspan="5" class="font-weight-bold" style="font-size: 12px;">
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
                                    <td colspan="8" class="font-weight-bold" style="font-size: 12px;">
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