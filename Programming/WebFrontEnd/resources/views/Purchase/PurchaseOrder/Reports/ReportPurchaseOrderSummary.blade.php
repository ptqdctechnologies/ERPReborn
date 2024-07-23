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
                            <?php if ($dataDetail) { ?>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Transaction Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Supplier</th>
                                                    <th colspan="2" class="sticky-col third-col-asf-expense" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Total IDR</th>
                                                    <th colspan="2" class="sticky-col second-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Total Other Currency</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Currency</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PIC</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>
                                                </tr>
                                                <tr>
                                                    <th class="sticky-col second-col-asf-expense-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">With PPN</th>
                                                    <th class="sticky-col second-col-asf-expense-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Without PPN</th>

                                                    <th class="sticky-col first-col-asf-expense-total" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">With PPN</th>
                                                    <th class="sticky-col first-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Without PPN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><?= $dataDetail['number']; ?></td>
                                                    <td><?= $dataDetail['date']; ?></td>
                                                    <td>Agape Biomedi Investama</td>
                                                    <td class="sticky-col second-col-asf-expense-qty"><?= $dataDetail['recordID']; ?></td>
                                                    <td class="sticky-col second-col-asf-expense-price"><?= $dataDetail['businessDocumentType_RefID']; ?></td>
                                                    <td class="sticky-col first-col-asf-amount-qty"><?= $dataDetail['businessDocumentType_RefID']; ?></td>
                                                    <td class="sticky-col first-col-asf-amount-price"><?= $dataDetail['recordID']; ?></td>
                                                    <td>IDR</td>
                                                    <td>Ferdian</td>
                                                    <td>Final</td>
                                                </tr>
                                            </tbody>
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