@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWarehouse')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Modify Budget Summary Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @include("Budget.Budget.Functions.Header.HeaderReportModifyBudgetSummary")
                        </div>
                        <?php if ($dataReport) { ?>
                            <div class="col-12 ShowTableReportDOSummary">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                        <td><b>:</b></td>
                                                        <td><b><?= $dataReport['dataHeader']['budget']; ?></b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 ShowTableReportDOSummary">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportDOSummary" id="DefaultFeatures">
                                            {{-- <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;" rowspan="2">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="2">Product</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">After Additional</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">After Saving</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ID</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                </tr>
                                            </thead> --}}
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Transaction Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Modify Budget (IDR)</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PIC</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status Approval</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>MB/QDC/2025/0000001</td>
                                                    {{-- <td>Bus Bar 300 x 100 x 10 + Isolator Keramik 40 x 50 ( 2ea )</td> --}}
                                                    <td>04 April 2025</td>
                                                    <td>500,000.00</td>
                                                    <td>Abdul Rahman Sitompul</td>
                                                    <td>Reject</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>MB/QDC/2025/0000002</td>
                                                    {{-- <td>Pole SDP 3 inch x 2 mtr HDG</td> --}}
                                                    <td>05 April 2025</td>
                                                    <td>5,000,000.00</td>
                                                    <td>Budi Pranata Sinaga</td>
                                                    <td>Approved</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>MB/QDC/2025/0000003</td>
                                                    {{-- <td>Material Handling & Delivery</td> --}}
                                                    <td>06 April 2025</td>
                                                    <td>1,500,000.00</td>
                                                    <td>Fitriastuti Kurnia</td>
                                                    <td>Approved</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>MB/QDC/2025/0000004</td>
                                                    {{-- <td>Panel ACPDB 7.7 KVA 1P</td> --}}
                                                    <td>10 April 2025</td>
                                                    <td>2,500,000.00</td>
                                                    <td>Maradona Manurung</td>
                                                    <td>Reject</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>MB/QDC/2025/0000005</td>
                                                    {{-- <td>Install Kabel grounding BCC 50mm</td> --}}
                                                    <td>12 April 2025</td>
                                                    <td>-800,000.00</td>
                                                    <td>Suyanto</td>
                                                    <td>Approved</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;">Grand Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;">8,800,000.00</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }; Session::forget("isButtonReportModifyBudgetSummarySubmit"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Budget.Budget.Functions.Footer.FooterReportModifyBudgetSummary')
@endsection