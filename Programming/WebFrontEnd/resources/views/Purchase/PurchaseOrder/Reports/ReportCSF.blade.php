@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">CFS Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        @if($var == 1)
                            <div class="col-12 ShowDocument">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                            <td>
                                                                <div class="input-group">
                                                                    <input id="budget_id" style="border-radius:0;" class="form-control" name="budget_id" type="hidden">
                                                                    <input id="budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProject">
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                                                            <td>
                                                                  <div class="input-group">
                                                                    <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                                                                    <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="sub_budget" readonly data-toggle="modal" data-target="#myProject">
                                                                    <div class="input-group-append">
                                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                                            <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-default btn-sm" type="submit">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <select name="" id="" class="form-control">
                                                                    <option value="PDF">PDF</option>
                                                                    <option value="Excel">Excel</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                &nbsp;&nbsp;<span><img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt=""></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <center> -->
                                            <table>
                                                <tr>
                                                    <th style="padding-top: 7px;"><label>COST ANALYSIS REPORT</label></th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 7px;"><label>Q000195</label></th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 7px;"><label>13 Mar - 29 Jan 2024</label></th>
                                                </tr>
                                            </table>
                                        <!-- </center> -->
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <!-- <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th> -->
                                                    <!-- <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date Added to CFS</th> -->
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Site/Code</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px llsolid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                    <th colspan="3" class="sticky-col eight-col-asf-expense" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Costumer Order</th>
                                                    <th colspan="2" class="sticky-col seven-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Progress</th>
                                                    <th colspan="2" class="sticky-col six-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Billing</th>
                                                    <th colspan="7" class="sticky-col five-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Budget</th>
                                                    <th colspan="5" class="sticky-col four-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Cost</th>
                                                    <th colspan="1" class="sticky-col three-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Forecast</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Current Margin</th>
                                                    <th colspan="3" class="sticky-col one-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Final Margin</th>
                                                </tr>
                                                <tr> 
                                                    <th class="sticky-col eight-col-asf-expense-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Origin CO</th>
                                                    <th class="sticky-col eight-col-asf-expense-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Variations</th>
                                                    <th class="sticky-col eight-col-asf-expense-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Revised CO</th>

                                                    <th class="sticky-col seven-col-asf-expense-total" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">% Progress</th>
                                                    <th class="sticky-col seven-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Amount</th>
                                                
                                                    <th class="sticky-col six-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Invoiced</th>
                                                    <th class="sticky-col six-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Received</th>
                                                   
                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Product Id</th>
                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Qty</th>
                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Cost</th>
                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">UOM</th>

                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Origin Budget</th>
                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Variations</th>
                                                    <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Revised Budget</th>

                                                    <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Committed Cost</th>
                                                    <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Previous Month Cost to Date</th>
                                                    <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Movement this Month Cost</th>
                                                    <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Current Cost</th>
                                                    <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Paid Cost</th>

                                                    <th class="sticky-col three-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Forecast Final Cost</th>

                                                    <th class="sticky-col one-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Final Margin</th>
                                                    <th class="sticky-col one-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Final %</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th colspan="21">100 OVERHEADS</th>
                                                </tr>
                                                <tr>
                                                    <!-- <td>1</td> -->
                                                    <td>101</td>
                                                    <td>Salaries</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>78.00%</td>
                                                    <td>9,700,768,399.81</td>
                                                    <td>12,283,500,831.00</td>
                                                    <td>10,906,181,962.75</td>
                                                    <td>9,516,061,362.72</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>7,389,089,394.30</td>
                                                    <td>6,515,594,020.15</td>
                                                    <td>291,515,608.87</td>
                                                    <td>-</td>
                                                    <td>6,348,068,811.52</td>
                                                    <td>9,516,061,362.72</td>
                                                    <td>2,278,240,536.89</td>
                                                    <td>2,920,821,201.14</td>
                                                    <td>23.49%</td>
                                                </tr>
                                                <tr>
                                                    <!-- <td>2</td> -->
                                                    <td>102</td>
                                                    <td>Jamsostek</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>100.00%</td>
                                                    <td>340,375,175.84</td>
                                                    <td>340,375,175.84</td>
                                                    <td>5,320,952,323.64</td>
                                                    <td>495,947,429.47</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>454,247,133.50</td>
                                                    <td>412,303,612.70	</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>430,955,517.93</td>
                                                    <td>495,947,429.47</td>
                                                    <td>(155,572,253.63)</td>
                                                    <td>(155,572,253.63)</td>
                                                    <td>(45.71)%</td>
                                                </tr>
                                                <tr>
                                                    <!-- <td>3</td> -->
                                                    <td>103</td>
                                                    <td>Bonus Provision</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>100.00%</td>
                                                    <td>340,375,175.84</td>
                                                    <td>340,375,175.84</td>
                                                    <td>5,320,952,323.64</td>
                                                    <td>495,947,429.47</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>454,247,133.50</td>
                                                    <td>412,303,612.70	</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>430,955,517.93</td>
                                                    <td>495,947,429.47</td>
                                                    <td>(155,572,253.63)</td>
                                                    <td>(155,572,253.63)</td>
                                                    <td>(45.71)%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <th colspan="21">Total</th>
                                                </tr>
                                                <tr>
                                                    <td colspan="21">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="21">200 MATERIALS</th>
                                                         </tr>
                                                <tr>
                                                    <td>201</td>
                                                    <td>Conductors, Incl Joint & Jumper</td>
                                                    <td>472,110,164.00</td>
                                                    <td>0</td>
                                                    <td>472,110,164.00</td>
                                                    <td>98.00%</td>
                                                    <td>462,667,960.72</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>444,359,800.00</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>364,988,492.03</td>
                                                    <td>326,841,741.03</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>354,569,465.97</td>
                                                    <td>444,359,800.00</td>
                                                    <td>27,195,356.72</td>
                                                    <td>27,750,364.00</td>
                                                    <td>5.88%</td>
                                                </tr>
                                                <tr>
                                                    <td>202</td>
                                                    <td>Damping System</td>
                                                    <td>81,944,542.34</td>
                                                    <td>0</td>
                                                    <td>81,944,542.34</td>
                                                    <td>0.00%</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0.34</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>0</td>
                                                    <td>0.34</td>
                                                    <td>0</td>
                                                    <td>81,944,542.00</td>
                                                    <td>100.00%</td>
                                                </tr>
                                                <tr>
                                                    <td>203</td>
                                                    <td>Temporary Lines</td>
                                                    <td>340,375,175.84</td>
                                                    <td>-</td>
                                                    <td>340,375,175.84</td>
                                                    <td>100.00%</td>
                                                    <td>340,375,175.84</td>
                                                    <td>340,375,175.84</td>
                                                    <td>5,320,952,323.64</td>
                                                    <td>495,947,429.47</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>454,247,133.50</td>
                                                    <td>412,303,612.70	</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>430,955,517.93</td>
                                                    <td>495,947,429.47</td>
                                                    <td>(155,572,253.63)</td>
                                                    <td>(155,572,253.63)</td>
                                                    <td>(45.71)%</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <th colspan="21">Total</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('Partials.footer')
@endsection