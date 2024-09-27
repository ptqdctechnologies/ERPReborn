@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Modify Budget Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @include("Budget.Budget.Functions.Header.HeaderReportModifyBudgetDetail")
                        </div>
                        <?php if ($dataReport) { ?>
                            <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Modify Number&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['doNumber']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['budget'] . " - " . $dataReport['dataHeader']['budgetName']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Sub Budget&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['subBudget']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Date&nbsp;</label></th>
                                                            <td><?= $dataReport['dataHeader']['date']; ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <table>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Transporter&nbsp;</label></th>
                                                            <td>
                                                                <?= $dataReport['dataHeader']['transporter']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Delivery From&nbsp;</label></th>
                                                            <td>
                                                                <?= $dataReport['dataHeader']['deliveryFrom']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Delivery To&nbsp;</label></th>
                                                            <td>
                                                                <?= $dataReport['dataHeader']['deliveryTo']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>PIC&nbsp;</label></th>
                                                            <td>
                                                                <?= $dataReport['dataHeader']['PIC']; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;" rowspan="2">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="2">Product</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">After Additional</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">After Saving</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ID</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $dataDetail['no']; ?></td>
                                                        <td><?= $dataDetail['productID']; ?></td>
                                                        <td><?= $dataDetail['productName']; ?></td>
                                                        <td><?= number_format($dataDetail['no'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['price'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['total'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['no'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['price'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['total'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['no'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['price'], 2); ?></td>
                                                        <td><?= number_format($dataDetail['total'], 2); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="8" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;">Grand Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalQty']; ?>
                                                    </th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalQty']; ?>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }; Session::forget("isButtonReportModifyBudgetDetailSubmit"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@endsection