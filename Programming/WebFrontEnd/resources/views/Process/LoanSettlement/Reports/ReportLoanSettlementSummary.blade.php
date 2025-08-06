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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Process.LoanSettlement.Functions.Header.HeaderReportLoanSettlementSummary')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($dataReport) { ?>
                        <!-- HEADER -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-2 px-1" style="gap: 1rem;">
                                            <label class="p-0 text-bold mb-0">Budget</label>
                                            <div>: <?php $dataReport['budgetCode']; ?> - <?php $dataReport['budgetName']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BRF Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Sub Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Departing From</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Destination To</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Requester</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Beneficiary</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Direct to Vendor</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">By Corp Card</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['DocumentNumber']; ?></td>
                                                        <td><?= $dataDetail['CombinedBudgetSectionName']; ?></td>
                                                        <td><?= $dataDetail['DepartingFrom']; ?></td>
                                                        <td><?= $dataDetail['DestinationTo']; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?></td>
                                                        <td></td>
                                                        <td><?= $dataDetail['CurrencyName']; ?></td>
                                                        <td><?= $dataDetail['RequesterWorkerName']; ?></td>
                                                        <td><?= $dataDetail['BeneficiaryWorkerName']; ?></td>
                                                        <td><?= number_format($dataDetail['DirectToVendor'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['ByCorpCard'], 2, '.', ','); ?></td>
                                                        <td><?= $dataDetail['remark']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['total'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportLoanSummarySubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.LoanSettlement.Functions.Footer.FooterReportLoanSettlementSummary')
@endsection