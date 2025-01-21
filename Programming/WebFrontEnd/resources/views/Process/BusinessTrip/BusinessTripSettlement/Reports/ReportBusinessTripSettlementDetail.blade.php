@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getBusinessTripSettlement')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Business Trip Settlement Report Detail</label>
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
                                        @include('Process.BusinessTrip.BusinessTripSettlement.Functions.Header.HeaderReportBusinessTripSettlementDetail')
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
                                            <div class="col-sm-12 col-md-4">
                                                <!-- BRF NUMBER -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        BRF Number
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['brfNumber']; ?>
                                                    </div>
                                                </div>
                                                <!-- BRF DATE -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        BRF Date
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['brfDate']; ?>
                                                    </div>
                                                </div>
                                                <!-- BRF TOTAL -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        BRF Total
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
                                                        Date
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <!-- BUDGET -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Budget
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['budgetCode'] . " - " . $dataReport['budgetName']; ?>
                                                    </div>
                                                </div>
                                                <!-- SUB BUDGET -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Sub Budget
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['siteCode'] . " - " . $dataReport['siteName']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <!-- CURRENCY -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Currency
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <!-- REQUESTER -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Requester
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <!-- BENEFICIARY -->
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Beneficiary
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerName'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <!-- BANK ACCOUNT -->
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Bank Account
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : (<?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym']; ?>) <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber']; ?> - <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DETAIL -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;">No</th>
                                                    <th rowspan="2" style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;">Product ID</th>
                                                    <th rowspan="2" style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;">Description & Spesifications</th>
                                                    <th colspan="4" style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;">Expense Claim</th>
                                                    <th colspan="4" style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;">Amount Due to Company</th>
                                                    <th rowspan="2" style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;">Total</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Travel & Fares</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Allowance</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Entertainment</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Other</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Travel & Fares</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Allowance</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Entertainment</th>
                                                    <th style="padding: 10px 26px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Other</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataReport['dataDetails']['details']['itemList'] as $dataDetail) { ?>
                                                    <?php $totalRowValue = $dataDetail['entities']['transport'] + $dataDetail['entities']['allowance'] + $dataDetail['entities']['entertainment'] + $dataDetail['entities']['other'] + $dataDetail['entities']['transport_company'] + $dataDetail['entities']['allowance_company'] + $dataDetail['entities']['entertainment_company'] + $dataDetail['entities']['other_company']; ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['entities']['product_RefID']; ?></td>
                                                        <td><?= $dataDetail['entities']['productName']; ?></td>
                                                        <td><?= number_format($dataDetail['entities']['transport'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['allowance'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['entertainment'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['other'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['transport_company'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['allowance_company'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['entertainment_company'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['other_company'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($totalRowValue, 2, '.', ','); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="11" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL BSF</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['totalBSF'], 2, '.', ','); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportBusinessTripSettlementDetailSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.BusinessTrip.BusinessTripSettlement.Functions.Footer.FooterReportBusinessTripSettlementDetail')
@endsection