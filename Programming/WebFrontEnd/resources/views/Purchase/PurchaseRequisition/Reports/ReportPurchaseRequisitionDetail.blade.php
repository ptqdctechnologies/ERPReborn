@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Requisition Detail Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            @include('Purchase.PurchaseRequisition.Functions.Header.HeaderReportPurchaseRequisitionDetail')
                        </div>
                        <div class="col-12 ShowTableReportAdvanceSummary">
                            <?php if ($dataDetail) { ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                                                <td>
                                                    2023 GMO (General Management Opex)
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="padding-top: 7px;"><label>Sub Budget Code&nbsp;</label></th>
                                                <td>
                                                    2023_GMO_HSE_QA_Q2	HSE & QA 2023 Q2
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="padding-top: 7px;"><label>PR Number&nbsp;</label></th>
                                                <td>
                                                    PR02-23000210
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="padding-top: 7px;"><label>Date&nbsp;</label></th>
                                                <td>
                                                    11/15/2023
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Work ID</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Work Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Id</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Material Name</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Unit Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?= $dataDetail['number']; ?></td>
                                                    <td><?= $dataDetail['recordID']; ?></td>
                                                    <td><?= $dataDetail['date']; ?></td>
                                                    <td><?= $dataDetail['recordID']; ?></td>
                                                    <td><?= $dataDetail['businessDocumentType_RefID']; ?></td>
                                                    <td><?= $dataDetail['date']; ?></td>
                                                    <td><?= $dataDetail['recordID']; ?></td>
                                                    <td><?= $dataDetail['businessDocumentType_RefID']; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php }; Session::forget("isButtonReportPurchaseRequisitionDetailSubmit"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPurchaseRequisitionDetail')
@endsection