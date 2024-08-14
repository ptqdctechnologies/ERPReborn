@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWarehouse')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">DO Summary Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @include("Inventory.DeliveryOrder.Functions.Header.HeaderReportDOSummary")
                        </div>
                        <?php if ($dataReport) { ?>
                            <div class="col-12 ShowTableReportDOSummary">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                        <td><b>:</b></td>
                                                        <td><b><?= $dataReport['dataHeader']['budget']; ?></b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 ShowTableReportDOSummary">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportDOSummary" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DO Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $dataDetail['no']; ?></td>
                                                        <td><?= $dataDetail['DONumber']; ?></td>
                                                        <td><?= $dataDetail['date']; ?></td>
                                                        <td><?= $dataDetail['total']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: right;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['total']; ?>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }; Session::forget("isButtonReportDOSummarySubmit"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDOSummary')
@endsection