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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">BRF Number</label>
                                                            </th>
                                                            <td>
                                                                : <?= 'BRF-24000201' ?? $dataReport['dataHeader']['number']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Date</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Budget</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['budgetCode'] . " - " . $dataReport['budgetName']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Sub Budget</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['siteCode'] . " - " . $dataReport['siteName']; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Currency</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Requester</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'] ?? '-'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Beneficiary</label>
                                                            </th>
                                                            <td>
                                                                : <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerFullName'] ?? '-'; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;">
                                                                <label style="margin-right: 1rem;">Bank Account</label>
                                                            </th>
                                                            <td>
                                                                : (<?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym']; ?>) <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber']; ?> - <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName']; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
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
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Advance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataReport['dataDetails']['details']['itemList'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['entities']['product_RefID']; ?></td>
                                                        <td><?= $dataDetail['entities']['productName']; ?></td>
                                                        <td><?= $dataDetail['entities']['quantity']; ?></td>
                                                        <td><?= number_format($dataDetail['entities']['priceBaseCurrencyValue'], 2, '.', ','); ?></td>
                                                        <td><?= number_format($dataDetail['entities']['quantity'] * $dataDetail['entities']['priceBaseCurrencyValue'], 2, '.', ','); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($dataReport['total'], 2, '.', ','); ?></th>
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