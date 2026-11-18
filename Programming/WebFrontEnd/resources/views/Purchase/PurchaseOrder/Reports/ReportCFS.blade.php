@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getBudgetCode')
    @include('getFunction.getSiteCode')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            CFS Report
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-12 col-lg-3"
                                                style="display: flex; flex-direction: column; gap: 1rem;">
                                                <span>
                                                    <!-- BUDGET -->
                                                    @include('Components.Reports.budgetCode')
                                                </span>

                                                <span>
                                                    <!-- SUB BUDGET CODE -->
                                                    @include('Components.Reports.subBudgetCode')
                                                </span>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <!-- EXPORT -->
                                                <div class="row align-items-center"
                                                    style="margin-bottom: 1rem; gap: 0.5rem;">
                                                    <div>
                                                        <select name="print_type" id="print_type" class="form-control">
                                                            <option value="PDF">Export PDF</option>
                                                            <option value="EXCEL">Export Excel</option>
                                                        </select>
                                                    </div>
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        onclick="validateExportButton()">
                                                        <span>
                                                            <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}"
                                                                width="17" alt="" />
                                                        </span>
                                                    </button>
                                                </div>

                                                <!-- SUBMIT -->
                                                <div class="row" style="gap: 0.5rem;">
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        onclick="validateShowButton()" style="margin-top: -5px;">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}"
                                                            width="12" alt="show" title="Show">
                                                        Show
                                                    </button>
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        onclick="resetForm()" style="margin-top: -5px;">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="text-center text-bold">COST ANALYSIS REPORT</h3>
                                        <h4 id="budget_information" class="text-center text-bold"></h4>
                                        <h4 class="text-center text-bold">13 Mar - 29 Jan 2024</h4>

                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Site/Code
                                                        </th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Name
                                                        </th>
                                                        <th colspan="3"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Customer Order
                                                        </th>
                                                        <th colspan="2"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Progress
                                                        </th>
                                                        <th colspan="2"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Billing
                                                        </th>
                                                        <th colspan="3"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Budget
                                                        </th>
                                                        <th colspan="6"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Cost
                                                        </th>
                                                        <th colspan="1"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Forecast
                                                        </th>
                                                        <th rowspan="2"
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">
                                                            Current Margin
                                                        </th>
                                                        <th colspan="3"
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Final Margin
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Origin CO
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Variations
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Revised CO
                                                        </th>

                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            % Complete
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Amount
                                                        </th>

                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Invoiced Without VAT
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Received <!-- Invoiced With VAT -->
                                                        </th>

                                                        <!-- <th
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Product Id
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <th
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Qty
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <th
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Cost
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </th>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <th
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        UOM
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </th> -->

                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Origin Budget
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Variations
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Revised Budget
                                                        </th>

                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Committed Cost
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Previous Month Cost to Date
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Movement this Month Cost
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Current Cost
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Paid Cost
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Paid VAT
                                                        </th>

                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Forecast Final Cost
                                                        </th>

                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Final Margin
                                                        </th>
                                                        <th
                                                            style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
                                                            Final %
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>1000 OVERHEADS</th>
                                                    </tr>
                                                    <tr>
                                                        <th>1001</th>
                                                        <th>Overhead</th>
                                                        <th>850,000,000.00</th>
                                                        <th>0.00</th>
                                                        <th>850,000,000.00</th>
                                                        <th>72.00</th>
                                                        <th>612,000,000.00</th>
                                                        <th>559,980,000.00</th>
                                                        <th>503,982,000.00</th>
                                                        <th>680,000,000.00</th>
                                                        <th>0.00</th>
                                                        <th>680,000,000.00</th>
                                                        <th>578,000,000.00</th>
                                                        <th>455,600,000.00</th>
                                                        <th>34,000,000.00</th>
                                                        <th>489,600,000.00</th>
                                                        <th>416,160,000.00</th>
                                                        <th>45,777,600.00</th>
                                                        <th>680,000,000.00</th>
                                                        <th>122,400,000.00</th>
                                                        <th>170,000,000.00</th>
                                                        <th>20.00%</th>
                                                    </tr>
                                                    <tr>
                                                        <th>1002</th>
                                                        <th>Capex</th>
                                                        <th>11,056,882,563.86</th>
                                                        <th>1,380,000,000.00</th>
                                                        <th>12,436,882,563.86</th>
                                                        <th>78.00</th>
                                                        <th>9,700,768,399.81</th>
                                                        <th>9,250,000,000.00</th>
                                                        <th>8,325,000,000.00</th>
                                                        <th>9,515,561,362.72</th>
                                                        <th>0.00</th>
                                                        <th>9,515,561,362.72</th>
                                                        <th>8,218,004,381.57</th>
                                                        <th>7,493,536,249.29</th>
                                                        <th>320,812,329.00</th>
                                                        <th>7,814,348,578.29</th>
                                                        <th>7,030,000,000.00</th>
                                                        <th>773,300,000.00</th>
                                                        <th>9,515,561,362.72</th>
                                                        <th>1,886,419,821.52</th>
                                                        <th>2,921,321,201.14</th>
                                                        <th>23.49%</th>
                                                    </tr>
                                                    <tr>
                                                        <th>1003</th>
                                                        <th>Overhead TE Indorama</th>
                                                        <th>420,000,000.00</th>
                                                        <th>35,000,000.00</th>
                                                        <th>455,000,000.00</th>
                                                        <th>60.00</th>
                                                        <th>273,000,000.00</th>
                                                        <th>250,068,000.00</th>
                                                        <th>225,061,200.00</th>
                                                        <th>336,000,000.00</th>
                                                        <th>28,000,000.00</th>
                                                        <th>364,000,000.00</th>
                                                        <th>273,000,000.00</th>
                                                        <th>203,112,000.00</th>
                                                        <th>21,840,000.00</th>
                                                        <th>224,952,000.00</th>
                                                        <th>179,961,600.00</th>
                                                        <th>19,795,776.00</th>
                                                        <th>374,920,000.00</th>
                                                        <th>48,048,000.00</th>
                                                        <th>80,080,000.00</th>
                                                        <th>17.60%</th>
                                                    </tr>
                                                    <tr>
                                                        <th></th>
                                                        <th style="border-bottom: 1px solid #dee2e6;">Total 1000</th>
                                                        <th>12,326,882,563.86</th>
                                                        <th>1,415,000,000.00</th>
                                                        <th>13,741,882,563.86</th>
                                                        <th>77.03</th>
                                                        <th>10,585,768,399.81</th>
                                                        <th>10,060,048,000.00</th>
                                                        <th>9,054,043,200.00</th>
                                                        <th>10,531,561,362.72</th>
                                                        <th>28,000,000.00</th>
                                                        <th>10,559,561,362.72</th>
                                                        <th>9,069,004,381.57</th>
                                                        <th>8,152,248,249.29</th>
                                                        <th>376,652,329.00</th>
                                                        <th>8,528,900,578.29</th>
                                                        <th>7,626,121,600.00</th>
                                                        <th>838,873,376.00</th>
                                                        <th>10,570,481,362.72</th>
                                                        <th>2,056,867,821.52</th>
                                                        <th>3,171,401,201.14</th>
                                                        <th>23.08%</th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="22" style="border-bottom: 1px solid #dee2e6;"></td>
                                                    </tr>

                                                    <tr>
                                                        <th>2000 MATERIALS</th>
                                                    </tr>
                                                    <tr>
                                                        <th>2001</th>
                                                        <th>Tower T1 – T7</th>
                                                        <th>2,437,654,000.00</th>
                                                        <th>0.00</th>
                                                        <th>2,437,654,000.00</th>
                                                        <th>100.00</th>
                                                        <th>2,437,654,000.00</th>
                                                        <th>2,437,654,000.00</th>
                                                        <th>2,315,771,300.00</th>
                                                        <th>1,864,805,310.00</th>
                                                        <th>0.00</th>
                                                        <th>1,864,805,310.00</th>
                                                        <th>1,864,805,310.00</th>
                                                        <th>1,864,805,310.00</th>
                                                        <th>0.00</th>
                                                        <th>1,864,805,310.00</th>
                                                        <th>1,715,620,885.20</th>
                                                        <th>188,718,297.37</th>
                                                        <th>1,864,805,310.00</th>
                                                        <th>572,848,690.00</th>
                                                        <th>572,848,690.00</th>
                                                        <th>23.50%</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Set of Double OPGW 70</td>
                                                        <td>188,500,000.00</td>
                                                        <td>0.00</td>
                                                        <td>188,500,000.00</td>
                                                        <td>100.00</td>
                                                        <td>188,500,000.00</td>
                                                        <td>188,500,000.00</td>
                                                        <td>179,075,000.00</td>
                                                        <td rowspan="4">1,864,805,310.00</td> <!-- HERE -->
                                                        <td rowspan="4">0.00</td><!-- HERE -->
                                                        <td rowspan="4">1,864,805,310.00</td> <!-- HERE -->
                                                        <td rowspan="4">1,864,805,310.00</td> <!-- HERE -->
                                                        <td rowspan="4">1,864,805,310.00</td> <!-- HERE -->
                                                        <td rowspan="4">0.00</td> <!-- HERE -->
                                                        <td rowspan="4">1,864,805,310.00</td> <!-- HERE -->
                                                        <td rowspan="4">1,715,620,885.20</td> <!-- HERE -->
                                                        <td rowspan="4">188,718,297.37</td> <!-- HERE -->
                                                        <td rowspan="4">1,864,805,310.00</td> <!-- HERE -->
                                                        <td rowspan="4">572,848,690.00</td> <!-- HERE -->
                                                        <td rowspan="4">572,848,690.00</td> <!-- HERE -->
                                                        <td rowspan="4">23.50%</td> <!-- HERE -->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Conductor ACSR/AS 450-A1/SA1A-54/7</td>
                                                        <td>304,200,000.00</td>
                                                        <td>0.00</td>
                                                        <td>304,200,000.00</td>
                                                        <td>100.00</td>
                                                        <td>304,200,000.00</td>
                                                        <td>304,200,000.00</td>
                                                        <td>288,990,000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Tension set quadruple string</td>
                                                        <td>1,111,584,000.00</td>
                                                        <td>0.00</td>
                                                        <td>1,111,584,000.00</td>
                                                        <td>100.00</td>
                                                        <td>1,111,584,000.00</td>
                                                        <td>1,111,584,000.00</td>
                                                        <td>1,056,004,800.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Vee Suspension set double string</td>
                                                        <td>833,370,000.00</td>
                                                        <td>0.00</td>
                                                        <td>833,370,000.00</td>
                                                        <td>100.00</td>
                                                        <td>833,370,000.00</td>
                                                        <td>833,370,000.00</td>
                                                        <td>791,701,500.00</td>
                                                    </tr>

                                                    <tr>
                                                        <th>2002</th>
                                                        <th>Tower T8 – T19</th>
                                                        <th>4,010,717,000.00</th>
                                                        <th>17,550,000.00</th>
                                                        <th>4,028,267,000.00</th>
                                                        <th>78.26</th>
                                                        <th>3,152,361,900.00</th>
                                                        <th>2,521,889,520.00</th>
                                                        <th>2,143,606,092.00</th>
                                                        <th>3,068,198,505.00</th>
                                                        <th>13,425,750.00</th>
                                                        <th>3,081,624,255.00</th>
                                                        <th>2,835,094,314.60</th>
                                                        <th>2,223,984,704.22</th>
                                                        <th>192,924,548.28</th>
                                                        <th>2,416,909,252.50</th>
                                                        <th>1,885,189,216.95</th>
                                                        <th>207,370,813.86</th>
                                                        <th>3,089,858,715.00</th>
                                                        <th>735,452,647.50</th>
                                                        <th>938,408,285.00</th>
                                                        <th>23.30%</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Set of Double OPGW 70</td>
                                                        <td>322,625,000.00</td>
                                                        <td>0.00</td>
                                                        <td>322,625,000.00</td>
                                                        <td>60.00</td>
                                                        <td>193,575,000.00</td>
                                                        <td>154,860,000.00</td>
                                                        <td>131,631,000.00</td>
                                                        <td rowspan="4">3,068,198,505.00</td> <!-- HERE -->
                                                        <td rowspan="4">13,425,750.00</td><!-- HERE -->
                                                        <td rowspan="4">3,081,624,255.00</td> <!-- HERE -->
                                                        <td rowspan="4">2,835,094,314.60</td> <!-- HERE -->
                                                        <td rowspan="4">2,223,984,704.22</td> <!-- HERE -->
                                                        <td rowspan="4">192,924,548.28</td> <!-- HERE -->
                                                        <td rowspan="4">2,416,909,252.50</td> <!-- HERE -->
                                                        <td rowspan="4">1,885,189,216.95</td> <!-- HERE -->
                                                        <td rowspan="4">207,370,813.86</td> <!-- HERE -->
                                                        <td rowspan="4">3,089,858,715.00</td> <!-- HERE -->
                                                        <td rowspan="4">735,452,647.50</td> <!-- HERE -->
                                                        <td rowspan="4">938,408,285.00</td> <!-- HERE -->
                                                        <td rowspan="4">23.30%</td> <!-- HERE -->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Conductor ACSR/AS 450-A1/SA1A-54/7</td>
                                                        <td>520,650,000.00</td>
                                                        <td>17,550,000.00</td>
                                                        <td>538,200,000.00</td>
                                                        <td>65.00</td>
                                                        <td>349,830,000.00</td>
                                                        <td>279,864,000.00</td>
                                                        <td>237,884,400.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Tension set quadruple string</td>
                                                        <td>1,667,376,000.00</td>
                                                        <td>0.00</td>
                                                        <td>1,667,376,000.00</td>
                                                        <td>80.00</td>
                                                        <td>1,333,900,800.00</td>
                                                        <td>1,067,120,640.00</td>
                                                        <td>907,052,544.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Vee Suspension set double string</td>
                                                        <td>1,500,066,000.00</td>
                                                        <td>0.00</td>
                                                        <td>1,500,066,000.00</td>
                                                        <td>85.00</td>
                                                        <td>1,275,056,100.00</td>
                                                        <td>1,020,044,880.00</td>
                                                        <td>867,038,148.00</td>
                                                    </tr>

                                                    <tr>
                                                        <th>2003</th>
                                                        <th>Tower T20 – T31</th>
                                                        <th>4,039,142,000.00</th>
                                                        <th>0.00</th>
                                                        <th>4,039,142,000.00</th>
                                                        <th>41.05</th>
                                                        <th>1,658,017,200.00</th>
                                                        <th>829,008,600.00</th>
                                                        <th>580,306,020.00</th>
                                                        <th>3,089,943,630.00</th>
                                                        <th>0.00</th>
                                                        <th>3,089,943,630.00</th>
                                                        <th>2,162,960,541.00</th>
                                                        <th>1,116,177,179.04</th>
                                                        <th>152,205,978.96</th>
                                                        <th>1,268,383,158.00</th>
                                                        <th>761,029,894.80</th>
                                                        <th>83,713,288.43</th>
                                                        <th>3,089,943,630.00</th>
                                                        <th>389,634,042.00</th>
                                                        <th>949,198,370.00</th>
                                                        <th>23.50%</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Set of Double OPGW 70</td>
                                                        <td>333,500,000.00</td>
                                                        <td>0.00</td>
                                                        <td>333,500,000.00</td>
                                                        <td>15.00</td>
                                                        <td>50,025,000.00</td>
                                                        <td>25,012,500.00</td>
                                                        <td>17,508,750.00</td>
                                                        <td rowspan="4">3,089,943,630.00</td> <!-- HERE -->
                                                        <td rowspan="4">0.00</td><!-- HERE -->
                                                        <td rowspan="4">3,089,943,630.00</td> <!-- HERE -->
                                                        <td rowspan="4">2,162,960,541.00</td> <!-- HERE -->
                                                        <td rowspan="4">1,116,177,179.04</td> <!-- HERE -->
                                                        <td rowspan="4">152,205,978.96</td> <!-- HERE -->
                                                        <td rowspan="4">1,268,383,158.00</td> <!-- HERE -->
                                                        <td rowspan="4">761,029,894.80</td> <!-- HERE -->
                                                        <td rowspan="4">83,713,288.43</td> <!-- HERE -->
                                                        <td rowspan="4">3,089,943,630.00</td> <!-- HERE -->
                                                        <td rowspan="4">389,634,042.00</td> <!-- HERE -->
                                                        <td rowspan="4">949,198,370.00</td> <!-- HERE -->
                                                        <td rowspan="4">23.50%</td> <!-- HERE -->
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Conductor ACSR/AS 450-A1/SA1A-54/7</td>
                                                        <td>538,200,000.00</td>
                                                        <td>0.00</td>
                                                        <td>538,200,000.00</td>
                                                        <td>20.00</td>
                                                        <td>107,640,000.00</td>
                                                        <td>53,820,000.00</td>
                                                        <td>37,674,000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Tension set quadruple string</td>
                                                        <td>1,667,376,000.00</td>
                                                        <td>0.00</td>
                                                        <td>1,667,376,000.00</td>
                                                        <td>45.00</td>
                                                        <td>750,319,200.00</td>
                                                        <td>375,159,600.00</td>
                                                        <td>262,611,720.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Vee Suspension set double string</td>
                                                        <td>1,500,066,000.00</td>
                                                        <td>0.00</td>
                                                        <td>1,500,066,000.00</td>
                                                        <td>50.00</td>
                                                        <td>750,033,000.00</td>
                                                        <td>375,016,500.00</td>
                                                        <td>262,511,550.00</td>
                                                    </tr>

                                                    <tr>
                                                        <th></th>
                                                        <th style="border-bottom: 1px solid #dee2e6;">Total 2000</th>
                                                        <th>10,487,513,000.00</th>
                                                        <th>17,550,000.00</th>
                                                        <th>10,505,063,000.00</th>
                                                        <th>69.00</th>
                                                        <th>7,248,033,100.00</th>
                                                        <th>5,788,552,120.00</th>
                                                        <th>5,039,683,412.00</th>
                                                        <th>8,022,947,445.00</th>
                                                        <th>13,425,750.00</th>
                                                        <th>8,036,373,195.00</th>
                                                        <th>6,862,860,165.60</th>
                                                        <th>5,204,967,193.26</th>
                                                        <th>345,130,527.24</th>
                                                        <th>5,550,097,720.50</th>
                                                        <th>4,361,839,996.95</th>
                                                        <th>479,802,399.66</th>
                                                        <th>8,044,607,655.00</th>
                                                        <th>1,697,935,379.50</th>
                                                        <th>2,460,455,345.00</th>
                                                        <th>23.42%</th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="22" style="border-bottom: 1px solid #dee2e6;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('Partials.footer')
    @include('Purchase.PurchaseOrder.Functions.Footer.footerReportCFS')
@endsection