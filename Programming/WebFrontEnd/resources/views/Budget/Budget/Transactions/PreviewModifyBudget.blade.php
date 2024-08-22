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
                <div style="text-align: center; font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                    APPROVAL FOR EXPENDITURE
                </div>

                <!-- INFORMASI -->
                <div class="row">
                    <div class="col">
                        <!-- SUBMITTED DATE -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                Submitted Date
                            </div>
                            <div class="col">
                                31 Jul 2024
                            </div>
                        </div>

                        <!-- FINAL APPROVED DATE -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                Final Approved Date
                            </div>
                            <div class="col">
                                31 Jul 2024
                            </div>
                        </div>

                        <!-- AFE NUMBER -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                AFE Number
                            </div>
                            <div class="col">
                                AFE-24000080
                            </div>
                        </div>

                        <!-- PIC -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                PIC
                            </div>
                            <div class="col">
                                caesarandi
                            </div>
                        </div>

                        <!-- PROJECT -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
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
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                Currency
                            </div>
                            <div class="col">
                                EUR
                            </div>
                        </div>

                        <!-- EXCHANGE RATE -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                Exchange Rate
                            </div>
                            <div class="col">
                                17,725
                            </div>
                        </div>

                        <!-- SITE -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
                            <div class="col-lg-3">
                                Site
                            </div>
                            <div class="col" style="line-height: 15px;">
                                2000 - Material Gardu Induk 150 kV Siak Sri Indrapura Ext 2 Line Bay
                            </div>
                        </div>

                        <!-- REASON -->
                        <div class="row" style="font-size: 12px; font-weight: bold; margin-bottom: 5px;">
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
                <div class="row" style="background-color: #E0ECEE; border: solid 1px #DEDEDE; padding: 4px; margin: 10px 0px;">
                    <div class="col-12" style="color: #C15119; font-size: 12px; font-weight: bold;">
                        Attachment Files For Additional Revenue :
                    </div>
                    
                    <div class="col-12 mt-2">
                        <ul class="mb-0" style="padding-left: 11px; line-height: 20px;">
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
                        <table class="table table-hover text-nowrap" style="width: max-content; border: 1px solid #000;">
                            <thead>
                                <tr>
                                    <th style="font-weight: bold; color: #FFF; text-align: center; background-color: #4b586a;">Description</th>
                                    <th style="font-weight: bold; color: #FFF; text-align: center; background-color: #4b586a;">Valuta</th>
                                    <th style="font-weight: bold; color: #FFF; text-align: center; background-color: #4b586a;">Origin</th>
                                    <th style="font-weight: bold; color: #FFF; text-align: center; background-color: #4b586a;">Previous</th>
                                    <th style="font-weight: bold; color: #FFF; text-align: center; background-color: #4b586a;">Add(subt)</th>
                                    <th style="font-weight: bold; color: #FFF; text-align: center; background-color: #4b586a;">Total Current</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color: #404040;">Customer Order (CO)</td>
                                    <td style="color: #404040; text-align: center;">IDR</td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td style="color: #404040; text-align: right;">456,000,000</td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td style="color: #404040; text-align: right;">456,000,000</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px dotted #6699CC;"></td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: center;">Cross Currency</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">Total</td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: center;">IDR</td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            456,000,000
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            456,000,000
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color: #404040;">Add(Subt) Cost</td>
                                    <td style="color: #404040; text-align: center;">IDR</td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td style="color: #404040; text-align: right;">376,712,000</td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td style="color: #404040; text-align: right;">376,712,000</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td style="color: #404040; text-align: center;">Cross Currency</td>
                                    <td style="color: #404040; text-align: right;">0.00</td>
                                    <td style="color: #404040; text-align: right;">0.00</td>
                                    <td style="color: #404040; text-align: right;">0.00</td>
                                    <td style="color: #404040; text-align: right;">0.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            Recorded Cost
                                        </div>
                                    </td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            Balanced Budget
                                        </div>
                                    </td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">Total</td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: center;">IDR</td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            376,712,000
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            376,712,000
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color: #404040;">Gross Margin</td>
                                    <td style="color: #404040; text-align: center;">IDR</td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td style="color: #404040; text-align: right;">79,288,000</td>
                                    <td style="color: #404040; text-align: right;">0</td>
                                    <td style="color: #404040; text-align: right;">79,288,000</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px dotted #6699CC;"></td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: center;">Cross Currency</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">Total</td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: center;">IDR</td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            79,288,000
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            79,288,000
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="color: red; font-weight: bold;">Gross Margin</td>
                                    <td style="color: red; text-align: center; font-weight: bold;">%</td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0.00 %
                                        </div>
                                    </td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            17.39 %
                                        </div>
                                    </td>
                                    <td></td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            17.39 %
                                        </div>
                                    </td>
                                </tr>
                                <tr style="background-color: #ffff00;">
                                    <td style="color: red; font-weight: bold;">Gross Margin Movement</td>
                                    <td style="color: red; text-align: center; font-weight: bold;">%</td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            17.39 %
                                        </div>
                                    </td>
                                    <td style="color: #000000; font-weight: bold;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0.00 %
                                        </div>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td style="border-top: 1px solid #000; color: #404040;">Recorded Cost</td>
                                    <td style="border-top: 1px solid #000; color: #404040; text-align: center;">IDR</td>
                                    <td style="border-top: 1px solid #000;"></td>
                                    <td style="border-top: 1px solid #000;"></td>
                                    <td style="border-top: 1px solid #000;"></td>
                                    <td style="border-top: 1px solid #000; color: #404040; text-align: right;">0</td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px dotted #6699CC;"></td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: center;">Cross Currency</td>
                                    <td style="border-top: 1px dotted #6699CC;"></td>
                                    <td style="border-top: 1px dotted #6699CC;"></td>
                                    <td style="border-top: 1px dotted #6699CC;"></td>
                                    <td style="border-top: 1px dotted #6699CC; color: #404040; text-align: right;">0.00</td>
                                </tr>

                                <tr>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold;">Total</td>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold; text-align: center;">IDR</td>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold;">
                                        
                                    </td>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold;">
                                        
                                    </td>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        
                                    </td>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
                                            0
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top: 1px solid #000000; color: red; font-weight: bold;">Actual Gross Margin</td>
                                    <td style="border-top: 1px solid #000000; color: red; font-weight: bold; text-align: center;">%</td>
                                    <td style="border-top: 1px solid #000000;"></td>
                                    <td style="border-top: 1px solid #000000;"></td>
                                    <td style="border-top: 1px solid #000000;"></td>
                                    <td style="border-top: 1px solid #000000; color: #000000; font-weight: bold; text-align: right;">
                                        <div class="float-right" style="border-bottom: 1px dotted #000; width: max-content;">
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
                    <div class="text-center font-weight-bold" style="width: 100%; font-size: 14px; margin: 10px 0px; ">
                        AFE Additional Table
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">NO</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">SITE <br /> CODE</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">CFS <br /> CODE</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">WORK <br /> ID</th>
                                    <th style="vertical-align: middle;">NAME MATERIAL</th>
                                    <th style="text-align: center; vertical-align: middle;">UOM</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">QTY <br /> (BOQ3)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">UNIT PRICE <br /> (BOQ3)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">TOTAL <br /> (BOQ3)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">QTY <br /> (REQUEST)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">UNIT PRICE <br /> (REQUEST)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">TOTAL <br /> (REQUEST)</th>
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
                    <div class="text-center font-weight-bold" style="width: 100%; font-size: 14px; margin: 10px 0px; ">
                        AFE Saving Table
                    </div>

                    <div class="card-body p-0">
                        <table class="table table-bordered table-hover text-nowrap" style="border: 2px solid #e9e9e9;">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">NO</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">SITE <br /> CODE</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">CFS <br /> CODE</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">WORK <br /> ID</th>
                                    <th style="vertical-align: middle;">NAME MATERIAL</th>
                                    <th style="text-align: center; vertical-align: middle;">UOM</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">QTY <br /> (BOQ3)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">UNIT PRICE <br /> (BOQ3)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">TOTAL <br /> (BOQ3)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">QTY <br /> (REQUEST)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">UNIT PRICE <br /> (REQUEST)</th>
                                    <th style="text-align: center; vertical-align: middle; line-height: 15px;">TOTAL <br /> (REQUEST)</th>
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