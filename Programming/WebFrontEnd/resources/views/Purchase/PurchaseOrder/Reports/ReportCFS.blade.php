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
                                                        <th colspan="7"
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
                                                            Invoiced With VAT
                                                        </th>

                                                        <th
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
                                                        </th>

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
                                                        <th>100 OVERHEADS</th>
                                                    </tr>
                                                    <tr>
                                                        <td>101</td>
                                                        <td>Capital Expenditure</td>
                                                        <td>11,056,882,563.86</td>
                                                        <td>1,380,000,000.00</td>
                                                        <td>12,436,882,563.86</td>
                                                        <td>78.00</td>
                                                        <td>9,700,768,399.81</td>
                                                        <td>12,359,583,916.52</td>
                                                        <td>10,982,956,712.68</td>
                                                        <td>1</td>
                                                        <td>0</td>
                                                        <td>8,218,004,381.57</td>
                                                        <td>IDR</td>
                                                        <td>9,515,561,362.72</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>8,218,004,381.57</td>
                                                        <td>7,493,536,249.29</td>
                                                        <td>320,812,329.00</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>9,515,561,362.72</td>
                                                        <td>1,886,419,821.52</td>
                                                        <td>2,921,321,201.14</td>
                                                        <td>23.49%</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th colspan="25" style="border-bottom: 1px solid #dee2e6;">Total
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="26" style="border-bottom: 1px solid #dee2e6;"></td>
                                                    </tr>

                                                    <tr>
                                                        <th>200 MATERIALS</th>
                                                    </tr>
                                                    <tr>
                                                        <td>201</td>
                                                        <td>Material Office Building</td>
                                                        <td>2,285,978,029.66</td>
                                                        <td>0</td>
                                                        <td>2,285,978,029.66</td>
                                                        <td>100.00</td>
                                                        <td>2,285,978,029.66</td>
                                                        <td>2,853,964,221.66</td>
                                                        <td>2,879,909,350.95</td>
                                                        <td>2</td>
                                                        <td>0</td>
                                                        <td>2,853,713,721.20</td>
                                                        <td>IDR</td>
                                                        <td>2,285,978,029.66</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>2,853,713,721.20</td>
                                                        <td>2,733,782,327.39</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>0</td>
                                                        <td>2,895,173,756.65</td>
                                                        <td>609,195,726.99</td>
                                                        <td>609,195,726.99</td>
                                                        <td>26.65%</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <th colspan="25" style="border-bottom: 1px solid #dee2e6;">Total
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="26" style="border-bottom: 1px solid #dee2e6;"></td>
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