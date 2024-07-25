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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Order Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @include('Purchase.PurchaseOrder.Functions.Header.HeaderReportPurchaseOrderDetail')
                        </div>
                        <div class="col-12 ShowTableReportAdvanceSummary">
                            <?php if ($dataReport) { ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['budget']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>PO Number&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['poNumber']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Date&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['date']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Payment Term&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['paymentTerm']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Revision&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['revision']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>File Attachment&nbsp;</label></th>
                                                            <td>
                                                                <a href="http://www.qdc.co.id/img1/pp-removebg-preview.png" target="_blank">
                                                                    <?= $dataReport['dataHeader']['file']; ?>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Vendor&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['vendor']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Invoice to&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['invoice']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Currency&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['currency']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>PIC Sourching&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['PIC']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Remark&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['remark']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Transaction Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit of Measure</th>
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
                                                        <td><?= $dataDetail['transactionNumber']; ?></td>
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
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: right;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalQty']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalPrice']; ?>
                                                    </th>
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
                            <?php }; Session::forget("isButtonReportPurchaseOrderDetailSubmit"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.FooterPurchaseOrderDetail')
@endsection