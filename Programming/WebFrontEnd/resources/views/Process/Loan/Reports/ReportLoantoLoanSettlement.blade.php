@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Report Loan to Loan Settlement
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
                                        @include('Process.Loan.Functions.Header.HeaderReportLoantoLoanSettlement')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" id="table_container" style="display: none;">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-head-fixed w-100" id="table_summary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">No</th>
                                                    <th colspan="13" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan</th>
                                                    <th colspan="14" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan Settlement</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Debitor</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Creditor</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Rate (%)</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Term</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Principal Loan</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Loan</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Debitor</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Creditor</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Settlement Value</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Penalty Value</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Interest Value</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Principal Loan to Payment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Principal Loan to Settlement</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Settlement to Payment</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
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
@include('Process.Loan.Functions.Footer.FooterReportLoantoLoanSettlement')
@endsection