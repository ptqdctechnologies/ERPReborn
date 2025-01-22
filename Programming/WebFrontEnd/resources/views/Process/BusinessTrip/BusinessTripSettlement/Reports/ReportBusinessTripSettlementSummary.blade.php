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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Settlement Report Summary</label>
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
                                        @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Header.HeaderReportBusinessTripSettlementSummary')
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
                                                    <th class="header_table">No</th>
                                                    <th class="header_table">BSF Number</th>
                                                    <th class="header_table">Sub Budget</th>
                                                    <th class="header_table">Departing From</th>
                                                    <th class="header_table">Destination To</th>
                                                    <th class="header_table">Date</th>
                                                    <th class="header_table">Total Expense Claim</th>
                                                    <th class="header_table">Total Amount Due to Company</th>
                                                    <th class="header_table">Total BSF</th>
                                                    <th class="header_table">Currency</th>
                                                    <th class="header_table">Requester</th>
                                                    <th class="header_table">Beneficiary</th>
                                                    <th class="header_table">Direct to Vendor</th>
                                                    <th class="header_table">By Corp Card</th>
                                                    <th class="header_table">Remark</th>
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
                                                        <td><?= number_format($dataDetail['TotalExpenseClaimCart'] ?? '0', 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAmountDueToCompanyCart'] ?? '0', 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['TotalAdvance'] ?? '0', 2, '.', ','); ?></td>
                                                        <td><?= $dataDetail['CurrencyName']; ?></td>
                                                        <td><?= $dataDetail['RequesterWorkerName']; ?></td>
                                                        <td><?= $dataDetail['BeneficiaryWorkerName']; ?></td>
                                                        <td><?= $dataDetail['DirectToVendor']; ?></td>
                                                        <td><?= $dataDetail['ByCorpCard']; ?></td>
                                                        <td><?= $dataDetail['remark']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" class="footer_table">GRAND TOTAL</th>
                                                    <th class="footer_table"><?= number_format($dataReport['totalExpense'], 2, '.', ','); ?></th>
                                                    <th class="footer_table"><?= number_format($dataReport['totalAmount'], 2, '.', ','); ?></th>
                                                    <th class="footer_table"><?= number_format($dataReport['total'], 2, '.', ','); ?></th>
                                                    <th class="footer_table"></th>
                                                    <th class="footer_table"></th>
                                                    <th class="footer_table"></th>
                                                    <th class="footer_table"></th>
                                                    <th class="footer_table"></th>
                                                    <th class="footer_table"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportReportBusinessTripSettlementSummarySubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripSettlement.Functions.Footer.FooterReportBusinessTripSettlementSummary')
@endsection