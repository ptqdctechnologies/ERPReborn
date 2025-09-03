@extends('Partials.app')
@section('main')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <center>
                        <div style="text-align: center; font-size: 20px; font-weight: bold;">Report Debit Note Summary</div>
                    </center>
                    <br><br>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">

                        <div class="col-12 ShowTableReportAdvanceSummary">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="TableReportAdvanceSummary" id="TableReportAdvanceSummary" style="font-size: 13px;width:100%;border: 1px solid #ced4da;border-collapse: collapse;">
                                        <thead>
                                            <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">No</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">DN Number</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Budget</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Sub Budget</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                                                <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Customer</th>
                                                <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">DN IDR</th>
                                                <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">DN Other Currency</th>
                                                <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">DN Equivalent IDR</th>
                                            </tr>
                                            <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                                            </tr>
                                        </thead>
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
                                        <tbody>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $counter++; ?></td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['DN_Number'] }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['combinedBudgetCode']}} - {{ $dataDetail['combinedBudgetName']}}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['combinedBudgetSectionCode']}} - {{ $dataDetail['combinedBudgetSectionName']}}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('Y-m-d', strtotime($dataDetail['date'])) }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['supplierCode']}} - {{ $dataDetail['supplierName']}}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['DN_Total_IDR'], 2, '.', ',') }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['DN_Tax_IDR'], 2, '.', ',') }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['DN_Total_Other_Currency'], 2, '.', ',') }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['DN_Tax_OtherCurrency'], 2, '.', ',') }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['DN_Total_Equivalent_IDR'], 2, '.', ',') }}</td>
                                            <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['DN_Tax_Equivalent'], 2, '.', ',') }}</td>
                                        
                                        </tbody>
                                        <?php } ?>

                                        <tfoot>
                                            <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="6">GRAND TOTAL</td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grand_dntotalidr, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grand_dntaxidr, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grand_dntotalothercurrency, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grand_dntaxothercurrency, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grand_dntotalequivalent, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grand_dntaxequivalent, 2, '.', ','); ?></td> 
                                            </tr>
                                        </tfoot>
                            

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
