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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Report Advance to Advance Settlement</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    

                    @if($statusHeader == "Yes")
                    <div class="row">
                        @include('Process.Advance.AdvanceToASF.Functions.Header.HeaderReportAdvanceToASF')
                    </div>
                    @endif
                    @if(!empty($dataArftoASF) && isset($dataArftoASF[0]))
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-2 px-1" style="gap: 1rem;">
                                            <label class="p-0 text-bold mb-0">Budget</label>
                                              :  {{ $dataArftoASF[0]['combinedBudgetCode'] }} - {{ $dataArftoASF[0]['combinedBudgetName'] }}
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
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Advance Request</th>
                                                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Advance Settlement</th>
                                                    <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Requester</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>

                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Expense Claim</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Amount to the Company</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>

                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Advance to Payment</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Advance to Settlement</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            // Grouping data berdasarkan ARF_Number + ARF_Date
                                            $groupedData = [];
                                            foreach ($dataArftoASF as $row) {
                                                $groupKey = $row['ARF_Number'] . '|' . $row['ARF_Date'];
                                                if (!isset($groupedData[$groupKey])) {
                                                    $groupedData[$groupKey] = [];
                                                }
                                                $groupedData[$groupKey][] = $row;
                                            }

                                            $counter = 1;
                                            $totalAdvance= 0;
                                            $totalpayment=0;
                                            $totalexpenseASF=0;
                                            $totalamountASF=0;
                                            $totalASF=0;
                                            $totalarftoPayment=0;
                                            $totalarftoASF=0;
                                        ?>

                                        <tbody>
                                            @foreach ($groupedData as $groupKey => $rows)
                                                <?php
                                                    $rowspan = count($rows);
                                                    $firstRow = true;
                                                ?>
                                                @foreach ($rows as $dataDetail)
                                                    <?php
                                                        $totalAdvance += $dataDetail['ARF_Total_IDR'];
                                                        $totalpayment +=$dataDetail['ARF_Payment'];
                                                        $totalexpenseASF +=$dataDetail['expense_Claim_IDR'];
                                                        $totalamountASF +=$dataDetail['amount_Due_Company_IDR'];
                                                        $totalASF +=$dataDetail['ASF_Total'];
                                                        $totalarftoPayment +=$dataDetail['advance_ToPayment'];
                                                        $totalarftoASF +=$dataDetail['advance_ToSettlement'];
                                                    ?>
                                                    <tr>
                                                        <td>{{ $counter++ }}</td>
                                                        @if ($firstRow)
                                                            <td rowspan="{{ $rowspan }}">{{ $dataDetail['ARF_Number'] ?: '-' }}</td>
                                                            <td rowspan="{{ $rowspan }}">{{ $dataDetail['ARF_Date'] ? date('d-m-Y', strtotime($dataDetail['ARF_Date'])) : '-' }}</td>
                                                            <?php $firstRow = false; ?>
                                                        @else
                                                            <td style="display:none"></td>
                                                            <td style="display:none"></td>
                                                            <td style="display:none"></td>
                                                        @endif
                                                        <td>{{ $dataDetail['ARF_Requester'] }}</td>
                                                        <td>{{ number_format($dataDetail['ARF_Total_IDR'], 2, '.', ',') }}</td>
                                                        <td>{{ $dataDetail['ARF_Payment'] ?: '-' }}</td>
                                                        <td>{{ $dataDetail['ARF_Status'] ?: '-' }}</td>

                                                        <td>{{ $dataDetail['ASF_Number'] ?: '-' }}</td>
                                                        <td>{{ $dataDetail['ASF_Date'] ? date('d-m-Y', strtotime($dataDetail['ASF_Date'])) : '-' }}</td>
                                                        <td>{{ $dataDetail['expense_Claim_IDR'] ? number_format($dataDetail['expense_Claim_IDR'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['amount_Due_Company_IDR'] ? number_format($dataDetail['amount_Due_Company_IDR'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['ASF_Total'] ? number_format($dataDetail['ASF_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['ASF_Status'] ?: '-' }}</td>
                                                        <td>{{ $dataDetail['advance_ToPayment'] ? number_format($dataDetail['advance_ToPayment'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['advance_ToSettlement'] ? number_format($dataDetail['advance_ToSettlement'], 2, '.', ',') : '-' }}</td>
                                                    </tr>
                                                @endforeach
                                        @endforeach
                                        </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalAdvance, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalpayment, 2, '.', ','); ?></th>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalexpenseASF, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalamountASF, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalASF, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalarftoPayment, 2, '.', ','); ?></th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($totalarftoASF, 2, '.', ','); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.Advance.AdvanceToASF.Functions.Footer.FooterReportAdvanceToASF')
@endsection