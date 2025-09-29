@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getBeneficiary')
@include('getFunction.getWorker')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Loan Report Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        <!-- <div class="col-12 ShowDocument">
                            <div class="card"> -->
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Process.Loan.Functions.Header.HeaderReportLoanSummary')
                                    </div>
                                </div>
                            <!-- </div>
                        </div> -->
                    </div>

                    <?php if ($dataLoan) { ?>

                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Type</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Creditor</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Debitor</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Principle Loan</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Rate (%)</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Notes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $counter = 1; 
                                                    $grand_totalprincipleLoan=0;
                                                ?>
                                                <?php foreach ($dataLoan as $dataDetail) { ?>
                                                    <?php $grand_totalprincipleLoan += $dataDetail['principleLoan'];?>
                                                    <tr>
                                                        <td>{{ $counter++ }}</td>
                                                        <td>{{ $dataDetail['loanNumber'] }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($dataDetail['date'])) }}</td>
                                                        <td>{{ $dataDetail['type'] }}</td>
                                                        <td>{{ $dataDetail['creditorName'] }}</td>
                                                        <td>{{ $dataDetail['debitorName'] }}</td>
                                                        <td>{{ number_format($dataDetail['principleLoan'], 2, '.', ',') }}</td>
                                                        <td>{{ $dataDetail['rate'] }}</td>
                                                        <td>{{ $dataDetail['notes'] }}</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalprincipleLoan, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportReimbursementSummarySubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Reimbursement.Functions.Footer.FooterReportReimbursementSummary')
@endsection