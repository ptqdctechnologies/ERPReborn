@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getWorker')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Report Loan to Loan Settlement</label>
                </div>
            </div>

            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Process.Loan.Functions.Header.HeaderReportLoantoLoanSettlement')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if ($dataloantosettle) { ?>
                        <!-- HEADER -->
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-2 px-1" style="gap: 1rem;">
                                            <label class="p-0 text-bold mb-0">Budget</label>
                                            <div>: </div>
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
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align:middle;">No</th>
                                                    <th colspan="7" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan</th>
                                                    <th colspan="5" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan Settlement</th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Debitor</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Creditor</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>

                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>

                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan to Payment</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Loan to Settlement</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Settlement to Payment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $counter = 1; 

                                                    $grand_totalIDRSettle=0;
                                                    $grand_totalOtherSettle=0;
                                                    $grand_totalEquiSettle=0;

                                                    $grand_totalloantoPay=0;
                                                    $grand_totalLoantoSettle=0;
                                                    $grand_totalSettletoPay=0;
                                                ?>
                                                <?php foreach ($dataloantosettle as $dataDetail) { ?>
                                                    <?php $grand_totalIDRSettle += $dataDetail['loanSettle_Total_IDR'];?>
                                                    <?php $grand_totalOtherSettle += $dataDetail['loanSettle_Total_Other_Currency'];?>
                                                    <?php $grand_totalEquiSettle += $dataDetail['loanSettle_Total_Equivalent_IDR'];?>
                                                    <?php $grand_totalloantoPay += $dataDetail['loanToPaymnet'];?>
                                                    <?php $grand_totalLoantoSettle += $dataDetail['loanToSettlement'];?>
                                                    <?php $grand_totalSettletoPay += $dataDetail['settlementToPayment'];?>
                                                    <tr>
                                                        <td><?= $counter++; ?></td>
                                                        <td>{{ $dataDetail['loanNumber'] }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($dataDetail['loanDate'])) }}</td>
                                                        <td>{{ $dataDetail['loanCreditorName'] }}</td>
                                                        <td>{{ $dataDetail['loanDebitorName'] }}</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>{{ $dataDetail['loanSettleNumber'] }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($dataDetail['loanSettleDate'])) }}</td>
                                                        <td>{{ number_format($dataDetail['loanSettle_Total_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['loanSettle_Total_Other_Currency'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['loanSettle_Total_Equivalent_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['loanToPaymnet'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['loanToSettlement'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format($dataDetail['settlementToPayment'], 2, '.', ',') }}</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalIDRSettle, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalOtherSettle, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalEquiSettle, 2, '.', ','); ?></th>

                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalloantoPay, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalLoantoSettle, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grand_totalSettletoPay, 2, '.', ','); ?></th>
                                               
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }; Session::forget("isButtonReportLoantoLoanSettlementSubmit"); ?>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Loan.Functions.Footer.FooterReportLoantoLoanSettlement')
@endsection