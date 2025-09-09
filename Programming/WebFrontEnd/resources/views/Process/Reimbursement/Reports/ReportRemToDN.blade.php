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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Report Reimbursement to Debit Note</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        @include('Process.Reimbursement.Functions.Header.HeaderReportRemToDN')           
                    </div>

                    <?php if ($dataRemToDN) { ?>
                        

                        <!-- TABLE -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap" id="DefaultFeatures">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th colspan="8" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Reimbursement</th>
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Debit Note</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Customer</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">REM to Payment</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">REM to DN</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DN to Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['REM_Number']; ?></td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['REM_Date'])); ?></td>
                                                        <td>-</td>
                                                        <td>{{ $dataDetail['REM_CustomerCode'] }} - {{ $dataDetail['REM_CustomerName'] }}</td>
                                                        <td>{{ number_format($dataDetail['REM_Total_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['REM_Total_Other_Currency'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['REM_Total_Equivalent_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ $dataDetail['REM_Status'] }}</td>
                                                        <td>{{ $dataDetail['DN_Number'] }}</td>
                                                        <td><?= date('d-m-Y', strtotime($dataDetail['DN_Date'])); ?></td>
                                                        <td>{{ number_format($dataDetail['DN_Total_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Total_Other_Currency'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['DN_Total_Equivalent_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ $dataDetail['DN_Status'] }}</td>
                                                        <td>{{ number_format($dataDetail['balanceREM_ToPayment'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['balanceREM_ToDN'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format(0, 2, '.', ',') }}</td>
                                                    </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_REM_Total_IDR, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_REM_Total_Other_Currency, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_REM_Total_Equivalent_IDR, 2, '.', ','); ?></th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_DN_Total_IDR, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_DN_Total_Other_Currency, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_DN_Total_Equivalent_IDR, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_balanceREM_ToPayment, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_balanceREM_ToDN, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_, 2, '.', ','); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportRemToDNSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Reimbursement.Functions.Footer.FooterReportRemToDN')
@endsection