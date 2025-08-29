@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Report Invoice to Credit Note</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        @include('Process.Reimbursement.Functions.Header.HeaderReportInvoiceToCN')           
                    </div>

                    <?php if ($dataReport) { ?>
                        <!-- HEADER -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-2 px-1" style="gap: 1rem;">
                                            <label class="p-0 text-bold mb-0">Budget</label>
                                            <div>: <?php $dataReport['budgetCode']; ?> - <?php $dataReport['budgetName']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th colspan="10" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice</th>
                                                    <th colspan="8" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Credit Note</th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Budget</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Customer</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice Other Currency</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Invoice Equivalent IDR</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Other Currency</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Equivalent IDR</th>
                                                </tr>
                                                <tr><th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['DocumentNumber']; ?></td>
                                                        <td>{{ $dataDetail['CombinedBudgetCode'] }} - {{ $dataDetail['CombinedBudgetName'] }}</td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?></td>
                                                        <td>{{ $dataDetail['CombinedBudgetSectionCode'] }} - {{ $dataDetail['CombinedBudgetSectionName'] }}</td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>
                                                        <td><?= number_format(0, 2, '.', ','); ?></td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr style="font-weight:bold; background-color:#4B586A; color:white;">
                                                    <td colspan="5" style="text-align:center;">GRAND TOTAL</td>
                                                    
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td colspan="2"></td>
                                                    
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                    <td style="text-align:left;"><?= number_format(0, 2, '.', ','); ?></td>
                                                </tr>
                                            </tfoot>

                                            <!-- <tfoot>
                                                <tr>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                
                                                </tr>
                                            </tfoot> -->
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportInvoiceToCNSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Reimbursement.Functions.Footer.FooterReportInvoiceToCN')
@endsection