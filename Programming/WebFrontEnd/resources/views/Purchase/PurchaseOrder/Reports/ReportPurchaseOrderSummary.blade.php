@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getSupplier')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Order Summary Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @include('Purchase.PurchaseOrder.Functions.Header.HeaderReportPurchaseOrderSummary')
                        </div>

                        <div class="col-12 ShowTableReportAdvanceSummary">
                            <?php if ($dataReport) { ?>
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                        <td><?= $dataReport['dataHeader']['budget'] . " - " . $dataReport['dataHeader']['budgetName']; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- DETAIL -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PR Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Id</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Currency</th>
                                                </tr>

                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">With PPN</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Without PPN</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">With PPN</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Without PPN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $dataDetail['no']; ?></td>
                                                        <td><?= $dataDetail['prNumber']; ?></td>
                                                        <td><?= $dataDetail['productId'] . " - " . $dataDetail['productName']; ?></td>
                                                        <td><?= $dataDetail['qty']; ?></td>
                                                        <td><?= $dataDetail['price']; ?></td>
                                                        <td><?= $dataDetail['uom']; ?></td>
                                                        <td><?= $dataDetail['totalIDRWithPPN']; ?></td>
                                                        <td><?= $dataDetail['totalIDRWithoutPPN']; ?></td>
                                                        <td><?= $dataDetail['totalOtherCurrencyWithPPN']; ?></td>
                                                        <td><?= $dataDetail['totalOtherCurrencyWithoutPPN']; ?></td>
                                                        <td><?= $dataDetail['currency']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfooter>
                                                <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: right;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalQty']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalIDRWithPPN']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalIDRWithoutPPN']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalOtherCurrencyWithPPN']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalOtherCurrencyWithoutPPN']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
                                                </tr>
                                            </tfooter>
                                        </table>
                                    </div>
                                </div>
                            <?php }; Session::forget("isButtonReportPurchaseOrderSummarySubmit"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.FooterPurchaseOrderSummary')
@endsection