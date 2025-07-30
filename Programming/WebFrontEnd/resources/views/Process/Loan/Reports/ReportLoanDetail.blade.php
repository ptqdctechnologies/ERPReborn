@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getLoan')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Loan Report Detail</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Process.Loan.Functions.Header.HeaderReportLoanDetail')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($dataReport) { ?>
                        <!-- HEADER -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="line-height: 14px;">
                                            <div class="col-sm-12 col-md-6">
                                                <!-- BRF NUMBER -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Loan Number
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['brfNumber']; ?>
                                                    </div>
                                                </div>
                                                <!-- BRF DATE -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Loan Type
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['brfDate']; ?>
                                                    </div>
                                                </div>
                                                <!-- BRF TOTAL -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Loan Term
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= number_format($dataReport['totalBSF'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Creditors
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= number_format($dataReport['totalBSF'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Debitors
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= number_format($dataReport['totalBSF'], 2, '.', ','); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <!-- DATE -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Bank
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Principal Loan
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Lending Rate
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <!-- BUDGET -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Total Loan
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['budgetCode'] . " - " . $dataReport['budgetName']; ?>
                                                    </div>
                                                </div>
                                                <!-- SUB BUDGET -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        COA
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['siteCode'] . " - " . $dataReport['siteName']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    <?php }; Session::forget("isButtonReportLoanDetailSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Loan.Functions.Footer.FooterReportLoanDetail')
@endsection