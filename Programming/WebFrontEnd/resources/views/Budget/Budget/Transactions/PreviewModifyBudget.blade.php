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
                    APPROVAL FOR EXPENDITURE
                </div>

                <!-- INFORMASI -->
                <div class="row">
                    <div class="col">
                        <!-- SUBMITTED DATE -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Submitted Date
                            </div>
                            <div class="col">
                                31 Jul 2024
                            </div>
                        </div>

                        <!-- FINAL APPROVED DATE -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Final Approved Date
                            </div>
                            <div class="col">
                                31 Jul 2024
                            </div>
                        </div>

                        <!-- AFE NUMBER -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                AFE Number
                            </div>
                            <div class="col">
                                AFE-24000080
                            </div>
                        </div>

                        <!-- PIC -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                PIC
                            </div>
                            <div class="col">
                                caesarandi
                            </div>
                        </div>

                        <!-- PROJECT -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Project
                            </div>
                            <div class="col" style="line-height: 15px;">
                                Q000197 - Pembangunan Gardu Induk 150 kV Siak Sri Indrapura Ext 2 Line Bay
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <!-- CURRENCY -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Currency
                            </div>
                            <div class="col">
                                EUR
                            </div>
                        </div>

                        <!-- EXCHANGE RATE -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Exchange Rate
                            </div>
                            <div class="col">
                                17,725
                            </div>
                        </div>

                        <!-- SITE -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Site
                            </div>
                            <div class="col" style="line-height: 15px;">
                                2000 - Material Gardu Induk 150 kV Siak Sri Indrapura Ext 2 Line Bay
                            </div>
                        </div>

                        <!-- REASON -->
                        <div class="row font-weight-bold information_approval">
                            <div class="col-lg-3">
                                Reason
                            </div>
                            <div class="col" style="line-height: 15px;">
                                AFE untuk menambah item pekerjaan Sondir
                            </div>
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
                                Testing
                            </li>
                            <li>
                                Testing
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            456,000,000
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            376,712,000
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            79,288,000
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td class="border-dark border-top border-bottom font-weight-bold text-dark">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            79,288,000
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold text-danger">Gross Margin</td>
                                    <td class="font-weight-bold text-danger text-center">%</td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            0.00 %
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            17.39 %
                                        </div>
                                    </td>
                                    <td></td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            17.39 %
                                        </div>
                                    </td>
                                </tr>
                                <tr style="background-color: #ffff00;">
                                    <td class="font-weight-bold text-danger">Gross Margin Movement</td>
                                    <td class="font-weight-bold text-danger text-center">%</td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
                                            17.39 %
                                        </div>
                                    </td>
                                    <td class="text-dark font-weight-bold">
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                                        <div class="float-right border_bottom_dotted" style="width: max-content;">
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
                        AFE Additional Table
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">NO</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">SITE <br /> CODE</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">CFS <br /> CODE</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">WORK <br /> ID</th>
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
                                    <td>2300</td>
                                    <td>5-3-4</td>
                                    <td>2030</td>
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
                                    <td colspan="8" class="font-weight-bold" style="font-size: 12px;">
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
                                    <td colspan="11" class="font-weight-bold" style="font-size: 12px;">
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

                <!-- AFE SAVINGS TABLE -->
                <div class="row mx-0">
                    <div class="text-center font-weight-bold table_title">
                        AFE Saving Table
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">NO</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">SITE <br /> CODE</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">CFS <br /> CODE</th>
                                    <th class="text-center align-middle" style="line-height: 15px;">WORK <br /> ID</th>
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
                                    <td>2300</td>
                                    <td>5-3-4</td>
                                    <td>2030</td>
                                    <td class="text-wrap" style="line-height: 15px;">129021-0000 - Soil Investigation Test and Report by Soil Borings, Undistrub Sampling and Laboratory Test</td>
                                    <td>ea</td>
                                    <td class="text-right">2.00</td>
                                    <td class="text-right">14,000,000</td>
                                    <td class="text-right">28,000,000</td>
                                    <td class="text-right">2.00</td>
                                    <td class="text-right">12,000,000</td>
                                    <td class="text-right">24,000,000</td>
                                </tr>

                                <!-- FOOTER -->
                                <tr>
                                    <td colspan="8" class="font-weight-bold" style="font-size: 12px;">
                                        Total
                                    </td>
                                    <td class="text-right">
                                        28,000,000
                                    </td>
                                    <td colspan="2"></td>
                                    <td class="text-right">
                                        24,000,000
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="11" class="font-weight-bold" style="font-size: 12px;">
                                        Total Saving to Compensate
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
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/PreviewModifyBudget.css') }}">
@endpush