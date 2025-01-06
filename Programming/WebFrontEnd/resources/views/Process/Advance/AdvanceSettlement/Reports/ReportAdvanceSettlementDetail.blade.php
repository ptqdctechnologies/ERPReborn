@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getAdvance')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Settlement Report Detail</label>
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
                                        @include('Process.Advance.AdvanceSettlement.Functions.Header.HeaderReportAdvanceSettlementDetail')
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
                                        <div class="row p-1" style="line-height: 14px; row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        ASF Number
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= 'ASF01-24000082' ?? $dataReport['dataHeader']['number']; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Date
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Budget
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['budgetCode'] . " - " . $dataReport['budgetName']; ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Sub Budget
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['siteCode'] . " - " . $dataReport['siteName']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Currency
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Requester
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerName'] ?? '-'; ?>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-bottom: 1rem;">
                                                    <div class="col-sm-3 col-md-3 p-0 text-bold">
                                                        Beneficiary
                                                    </div>
                                                    <div class="col-sm-9 col-md-9 p-0">
                                                        : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerName'] ?? '-'; ?>
                                                    </div>
                                                </div>
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
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product ID</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Description & Spesifications</th>
                                                    <!-- <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit Price</th> -->
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Expense Claim Cart</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Amount Due to Company Cart</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Advance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataReport['dataDetails']['details']['itemList'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= "111448-0000" ?? $dataDetail['entities']['product_RefID']; ?></td>
                                                        <td><?= "Terpal" ?? $dataDetail['entities']['productName']; ?></td>
                                                        <!-- <td><?php $dataDetail['entities']['quantity']; ?></td> -->
                                                        <!-- <td><?php number_format($dataDetail['entities']['priceBaseCurrencyValue'], 2, '.', ','); ?></td> -->
                                                        <td>213,932.00</td>
                                                        <td>456,123.00</td>
                                                        <td><?= number_format(670055, 2, '.', ','); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">213,932.00</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">456,123.00</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(670055, 2, '.', ','); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportAdvanceSettlementDetailSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Advance.AdvanceSettlement.Functions.Footer.FooterReportAdvanceSettlementDetail')
@endsection