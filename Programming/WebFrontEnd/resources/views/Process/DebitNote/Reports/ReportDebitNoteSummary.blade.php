@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getBeneficiary')
@include('getFunction.getWorker')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Debit Note Report Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        @include('Process.DebitNote.Functions.Header.HeaderReportDebitNoteSummary')
                                   
                    </div>

                    <?php if ($dataDN) { ?>

                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DN Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Budget</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Sub Budget</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Customer</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DN IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DN Other Currency</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DN Equivalent IDR</th>
                                                </tr>

                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $counter = 1; 
                                                    $grand_dntotalidr =0;    
                                                    $grand_dntaxidr =0;    
                                                    $grand_dntotalothercurrency =0;    
                                                    $grand_dntaxothercurrency =0;    
                                                    $grand_dntotalequivalent =0;    
                                                    $grand_dntaxequivalent =0;    
                                                ?>
                                                <?php foreach ($dataDN as $dataDetail) { ?>
                                                    <?php
                                                        $grand_dntotalidr +=$dataDetail['DN_Total_IDR'];    
                                                        $grand_dntaxidr +=$dataDetail['DN_Tax_IDR'];    
                                                        $grand_dntotalothercurrency +=$dataDetail['DN_Total_Other_Currency'];    
                                                        $grand_dntaxothercurrency +=$dataDetail['DN_Tax_OtherCurrency'];    
                                                        $grand_dntotalequivalent +=$dataDetail['DN_Total_Equivalent_IDR'];    
                                                        $grand_dntaxequivalent +=$dataDetail['DN_Tax_Equivalent'];
                                                    ?> 
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td>{{ $dataDetail['DN_Number'] }}</td>
                                                        <td>{{ $dataDetail['combinedBudgetCode'] }} - {{ $dataDetail['combinedBudgetName'] }}</td>
                                                        <td>{{ $dataDetail['combinedBudgetSectionCode'] }} - {{ $dataDetail['combinedBudgetSectionName'] }}</td>
                                                        <td>{{ date('d-m-Y', strtotime($dataDetail['date'])) }}</td>
                                                        <td>{{ $dataDetail['supplierCode'] }} - {{ $dataDetail['supplierName'] }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Total_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Tax_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Total_Other_Currency'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Tax_OtherCurrency'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Total_Equivalent_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Tax_Equivalent'], 2, '.', ',') }}</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_dntotalidr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_dntaxidr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_dntotalothercurrency, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_dntaxothercurrency, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_dntotalequivalent, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_dntaxequivalent, 2, '.', ','); ?></th>
                                                
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportDebitNoteSummarySubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.DebitNote.Functions.Footer.FooterReportDebitNoteSummary')
@endsection