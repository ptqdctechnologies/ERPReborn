@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('getFunction.getWarehouse')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">DOR Summary Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        
                        <div class="col-12 ShowDocument">
                            @include("Inventory.DeliveryOrderRequest.Functions.Header.HeaderReportDORSummary")
                        </div>

                        <?php if ($dataReport) { ?>
                            <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group">
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                        <td><?= $dataReport['dataHeader']['budget']; ?></td>
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
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DOR Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $dataDetail['no']; ?></td>
                                                        <td><?= $dataDetail['DORNumber']; ?></td>
                                                        <td><?= $dataDetail['date']; ?></td>
                                                        <td><?= $dataDetail['total']; ?></td>
                                                        <td><?= $dataDetail['totalOtherCurrency']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfooter>
                                                <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: right;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['total']; ?>
                                                    </th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        <?= $dataReport['totalOtherCurrency']; ?>
                                                    </th>
                                                </tr>
                                            </tfooter>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }; Session::forget("isButtonReportDORSummarySubmit"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.DeliveryOrderRequest.Functions.Footer.FooterDORSummary')
@endsection