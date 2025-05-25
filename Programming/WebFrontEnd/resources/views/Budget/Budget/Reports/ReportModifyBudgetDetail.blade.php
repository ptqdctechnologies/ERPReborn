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
                                                            <td>Q000062 - XL Microcell 2007</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="padding-top: 7px;"><label>Sub Budget&nbsp;</label></th>
                                                            <td>235 - Ampang Kuranji - Padang</td>
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
                                                                Abdul Rahman Sitompul
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
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Code</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Origin</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Previous</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty(+/-)</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Add(subt)</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total(+/-)</th>
                                                </tr>

                                                {{-- <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white; vertical-align: middle;" rowspan="2">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="2">Product</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" colspan="3">Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;" rowspan="2">Qty(+/-)</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ID</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                </tr> --}}
                                            </thead>
                                            <tbody>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                <?php } ?>

                                                <tr>
                                                    <td>1</td>
                                                    <td>1000416</td>
                                                    <td>Double Nipple 3/4 Besi</td>
                                                    <td>127,427,636.00</td>
                                                    <td>127,427,636.00</td>
                                                    <td>-80.30</td>
                                                    <td>23.00</td>
                                                    <td>-1,846.90</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>313344-0000</td>
                                                    <td>110V DC FUSE BOX</td>
                                                    <td>117,427,636.00</td>
                                                    <td>117,427,636.00</td>
                                                    <td>-50.30</td>
                                                    <td>13.00</td>
                                                    <td>-653.90</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>410056-RSBG</td>
                                                    <td>Splitter 3 Way</td>
                                                    <td>97,427,636.00</td>
                                                    <td>97,427,636.00</td>
                                                    <td>39.30</td>
                                                    <td>15.00</td>
                                                    <td>589.50</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="7" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;color:white;">Grand Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                                                        -1,911.40
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