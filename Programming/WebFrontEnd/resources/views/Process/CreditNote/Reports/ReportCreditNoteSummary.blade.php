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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Credit Note Report Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        @include('Process.CreditNote.Functions.Header.HeaderReportCreditNoteSummary') 
                    </div>

                    <?php if ($dataCN) { ?>
                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Number</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Budget</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Sub Budget</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Supplier/Customer</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN IDR</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Other Currency</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN Equivalent IDR</th>
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
                                                    $grandtotal_idr = 0;
                                                    $grandtotal_taxidr = 0;
                                                    $grandtotal_otheridr = 0;
                                                    $grandtotal_taxotheridr = 0;
                                                    $grandtotal_equidr = 0;
                                                    $grandtotal_taxequidr = 0;
                                                ?>
                                                <?php foreach ($dataCN as $dataDetail) { ?>
                                                    <?php
                                                        $grandtotal_idr += $dataDetail['CN_Total_IDR'];
                                                        $grandtotal_taxidr += $dataDetail['CN_Tax_IDR'];
                                                        $grandtotal_otheridr += $dataDetail['CN_Total_Other_Currency'];
                                                        $grandtotal_taxotheridr += $dataDetail['CN_Tax_OtherCurrency'];
                                                        $grandtotal_equidr += $dataDetail['CN_Total_Equivalent_IDR'];
                                                        $grandtotal_taxequidr += $dataDetail['CN_Tax_Equivalent'];
                                                    ?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['CN_Number']; ?></td>
                                                        <td>{{ $dataDetail['combinedBudgetCode'] }} - {{ $dataDetail['combinedBudgetName'] }}</td>
                                                        <td>{{ $dataDetail['combinedBudgetSectionCode'] }} - {{ $dataDetail['combinedBudgetSectionName'] }}</td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['date'])); ?></td>
                                                        <td>{{ $dataDetail['customerCode'] }} - {{ $dataDetail['customerName'] }}</td>
                                                        <td>{{ number_format($dataDetail['CN_Total_IDR'], 2, '.', ',')}} </td>
                                                        <td>{{ number_format($dataDetail['CN_Tax_IDR'], 2, '.', ',')}} </td>
                                                        <td>{{ number_format($dataDetail['CN_Total_Other_Currency'], 2, '.', ',')}} </td>
                                                        <td>{{ number_format($dataDetail['CN_Tax_OtherCurrency'], 2, '.', ',')}}</td>
                                                        <td>{{ number_format($dataDetail['CN_Total_Equivalent_IDR'], 2, '.', ',')}}</td>
                                                        <td>{{ number_format($dataDetail['CN_Tax_Equivalent'], 2, '.', ',')}}</td>
                                                        
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandtotal_idr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandtotal_taxidr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandtotal_otheridr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandtotal_taxotheridr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandtotal_equidr, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandtotal_taxequidr, 2, '.', ','); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportCreditNoteSummarySubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.CreditNote.Functions.Footer.FooterReportCreditNoteSummary')
@endsection