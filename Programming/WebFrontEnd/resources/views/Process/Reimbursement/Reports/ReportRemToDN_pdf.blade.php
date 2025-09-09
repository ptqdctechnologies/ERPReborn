@extends('Partials.app')
@section('main')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-12">
                    <center>
                        <div style="text-align: center; font-size: 20px; font-weight: bold;">Report Reimbursement To Debit Note</div>
                    </center>
                    <table style="float:right;">
                        <!-- <tr>
                        <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/AdminLTE-master/dist/img/qdc.png'))) }}" width="180"></td>
                        </tr> -->
                        </tr>
                    </table>
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
                                                <th colspan="8" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Reimbursement</th>
                                                <th colspan="6" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Debit Note</th>
                                                <th colspan="3" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Balance</th>
                                            </tr>
                                            <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Number</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Budget</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Customer</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total IDR</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Other Currency</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Equivalent IDR</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Status</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Number</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total IDR</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Other Currency</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Equivalent IDR</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Status</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">REM to Payment</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">REM to DN</th>
                                                <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">DN to Payment</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $counter = 1; 
                                            $grandTotal_REM_Total_IDR=0;
                                            $grandTotal_REM_Total_Other_Currency=0;
                                            $grandTotal_REM_Total_Equivalent_IDR=0;
                                            $grandTotal_DN_Total_IDR=0;
                                            $grandTotal_DN_Total_Other_Currency=0;
                                            $grandTotal_DN_Total_Equivalent_IDR=0;
                                            $grandTotal_balanceREM_ToPayment=0;
                                            $grandTotal_balanceREM_ToDN=0;
                                            $grandTotal_=0;
                                        ?>
                                        <?php foreach ($dataRemToDN as $dataDetail) { ?>
                                            <?php $grandTotal_REM_Total_IDR += $dataDetail['REM_Total_IDR'];?>
                                            <?php $grandTotal_REM_Total_Other_Currency += $dataDetail['REM_Total_Other_Currency'];?>
                                            <?php $grandTotal_REM_Total_Equivalent_IDR += $dataDetail['REM_Total_Equivalent_IDR'];?>
                                            <?php $grandTotal_DN_Total_IDR += $dataDetail['DN_Total_IDR'];?>
                                            <?php $grandTotal_DN_Total_Other_Currency += $dataDetail['DN_Total_Other_Currency'];?>
                                            <?php $grandTotal_DN_Total_Equivalent_IDR += $dataDetail['DN_Total_Equivalent_IDR'];?>
                                            <?php $grandTotal_balanceREM_ToPayment += $dataDetail['balanceREM_ToPayment'];?>
                                            <?php $grandTotal_balanceREM_ToDN += $dataDetail['balanceREM_ToDN'];?>
                                            <?php $grandTotal_ += 0;?>
                                            <tbody>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $counter++; ?></td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['REM_Number'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('d-m-Y', strtotime($dataDetail['REM_Date'])) }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['REM_CustomerCode'] }} - {{ $dataDetail['REM_CustomerName'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['REM_Total_IDR'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['REM_Total_Other_Currency'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['REM_Total_Equivalent_IDR'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['REM_Status'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['DN_Number'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('d-m-Y', strtotime($dataDetail['DN_Date'])) }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['DN_Total_IDR'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['DN_Total_Other_Currency'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['DN_Total_Equivalent_IDR'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['DN_Status'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['balanceREM_ToPayment'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['balanceREM_ToDN'] }}</td>
                                                <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format(0, 2, '.', ',') }}</td>

                                            </tbody>
                                        <?php } ?>

                                        <tfoot>
                                            <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="5">GRAND TOTAL</td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_REM_Total_IDR, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_REM_Total_Other_Currency, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_REM_Total_Equivalent_IDR, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="3"></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_DN_Total_IDR, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_DN_Total_Other_Currency, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_DN_Total_Equivalent_IDR, 2, '.', ','); ?></td> 
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;"></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_balanceREM_ToPayment, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_balanceREM_ToDN, 2, '.', ','); ?></td>
                                                <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($grandTotal_, 2, '.', ','); ?></td> 
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
