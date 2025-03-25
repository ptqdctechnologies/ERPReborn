@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip To BSF Report</label>
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
                                        @include('Process.BusinessTrip.BusinessTripToBSF.Functions.Header.HeaderReportBusinessTripToBSF')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($dataReport) { ?>
                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">No</th>
                                                    <th colspan="11" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Business Trip</th>
                                                    <th colspan="16" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Settlement</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">BRF Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Requester</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Travel</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Allowance</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Entertainment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Other</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Payment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Status</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Date Commence Travel</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Date End Travel</th>

                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">BSF Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Travel</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Allowance</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Entertainment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Total Other</th>
                                                    <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Expense Claim</th>
                                                    <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Amount to the Company</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Description</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Status</th>

                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Business Trip to Payment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">Business Trip to Settlement</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Travel</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Allowance</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Entertainment</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Other</th>

                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Travel</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Allowance</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Entertainment</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Other</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['DocumentNumber']; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?></td>
                                                        <td style="text-wrap: auto;line-height:normal;"><?= $dataDetail['RequesterWorkerName']; ?></td>
                                                        <td><?= number_format($dataDetail['TotalTravel'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAllowance'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalEntertainment'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalOther'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalPayment'], 2, '.', ','); ?></td>
                                                        <td><?= $dataDetail['Status']; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DateCommenceTravel'])); ?></td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DateEndTravel'])); ?></td>
                                                        <td><?= $dataDetail['DocumentBSFNumber']; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DocumentBSFDateTimeTZ'])); ?></td>
                                                        <td><?= number_format($dataDetail['TotalBSFTravel'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalBSFAllowance'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalBSFEntertainment'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalBSFOther'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalExpenseClaimTravel'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalExpenseClaimAllowance'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalExpenseClaimEntertainment'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalExpenseClaimOther'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAmountToCompanyTravel'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAmountToCompanyAllowance'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAmountToCompanyEntertainment'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAmountToCompanyOther'], 2, '.', ','); ?></td>
                                                        <td style="text-wrap: auto;line-height:normal;"><?= $dataDetail['Description']; ?></td>
                                                        <td><?= $dataDetail['StatusBSF']; ?></td>
                                                        <td><?= number_format($dataDetail['TotalBusinessTripPayment'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalBusinessTripSettlement'], 2, '.', ','); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalTravel'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalAllowance'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalEntertainment'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalOther'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalPayment'], 2, '.', ','); ?></th>
                                                    <th colspan="5" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBSFTravel'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBSFAllowance'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBSFEntertainment'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBSFOther'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalExpenseClaimTravel'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalExpenseClaimAllowance'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalExpenseClaimEntertainment'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalExpenseClaimOther'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalAmountToCompanyTravel'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalAmountToCompanyAllowance'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalAmountToCompanyEntertainment'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalAmountToCompanyOther'], 2, '.', ','); ?></th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBusinessTripPayment'], 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBusinessTripSettlement'], 2, '.', ','); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportBusinessTripToBSFSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripToBSF.Functions.Footer.FooterReportBusinessTripToBSF')
@endsection