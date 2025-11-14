@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getSupplier')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Account Payable Summary Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12 ShowDocument">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include("Finance.AccountPayable.Functions.Header.HeaderReportAccountPayableSummary")
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($dataReport) { ?>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportDOSummary" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">AP Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Sub Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Supplier</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Tax Invoice Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Submitter</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 30px;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; $grandTotalIDR = 0; $grandTotalOtherCurrency = 0; $grandTotalEquivalentIDR = 0; ?>
                                                <?php foreach ($dataReport['data'] as $data) { ?>
                                                    <?php $grandTotalIDR += $data['totalIDR']; $grandTotalOtherCurrency += $data['totalOtherCurrency']; $grandTotalEquivalentIDR += $data['totalEquivalentIDR']; ?>
                                                    <tr>
                                                        <td class="text-center"><?= $counter++; ?></td>
                                                        <td><?= $data['documentNumber'] ?? '-'; ?></td>
                                                        <td><?= $data['sys_Data_Entry_DateTimeTZ'] ?? '-'; ?></td>
                                                        <td><?= $data['combinedBudgetSectionCode'] ?? ''; ?> - <?= $data['combinedBudgetSectionName'] ?? ''; ?></td>
                                                        <td><?= $data['supplierCode'] ?? ''; ?> - <?= $data['supplierName'] ?? ''; ?></td>
                                                        <td><?= number_format($data['totalIDR'] ?? 0, 2); ?></td>
                                                        <td><?= number_format($data['totalOtherCurrency'] ?? 0, 2); ?></td>
                                                        <td><?= number_format($data['totalEquivalentIDR'] ?? 0, 2); ?></td>
                                                        <td><?= $data['supplierInvoiceNumber'] ?? '-'; ?></td>
                                                        <td><?= $data['requesterName'] ?? '-'; ?></td>
                                                        <td><?= $data['workflowStatus'] ?? '-'; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotalIDR, 2); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotalOtherCurrency, 2); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotalEquivalentIDR, 2); ?></th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php }; Session::forget("isButtonReportAccountPayableSummary"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Finance.AccountPayable.Functions.Footer.FooterReportAccountPayable')
@endsection