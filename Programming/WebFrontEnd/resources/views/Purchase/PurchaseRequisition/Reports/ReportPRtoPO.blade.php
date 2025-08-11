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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Request to Purchase Order Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                     <div class="col-12 ShowDocument">
                        <div class="card">
                            <div class="card-body">
                                <div class="row p-1" style="row-gap: 1rem;">
                                    @include("Purchase.PurchaseRequisition.Functions.Header.HeaderReportPRtoPO")
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <?php if ($dataPRtoPO) { ?>
                    <!-- HEADER -->
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row py-2 px-1" style="gap: 1rem;">
                                        <label class="p-0 text-bold mb-0">Budget</label>
                                        <div>: <?= $dataPRtoPO[0]['combinedBudgetCode']; ?> - <?= $dataPRtoPO[0]['combinedBudgetName']; ?></div>
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
                                                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Purchase Requisition</th>
                                                <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Purchase Order</th>
                                                <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                                            </tr>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Name</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            // Grouping data berdasarkan PR_Number + PR_Date
                                            $groupedData = [];
                                            foreach ($dataPRtoPO as $row) {
                                                $groupKey = $row['PR_Number'] . '|' . $row['PR_Date'];
                                                if (!isset($groupedData[$groupKey])) {
                                                    $groupedData[$groupKey] = [];
                                                }
                                                $groupedData[$groupKey][] = $row;
                                            }

                                            $counter = 1;
                                            $grandTotal_PR = 0;
                                            $grandTotal_PO = 0;
                                            $grandTotal_qtyPO = 0;
                                            $grandTotal_Balance = 0;
                                        ?>

                                        <tbody>
                                            @foreach ($groupedData as $groupKey => $rows)
                                                <?php
                                                    $rowspan = count($rows);
                                                    $firstRow = true;
                                                ?>
                                                @foreach ($rows as $dataDetail)
                                                    <?php
                                                        $grandTotal_PR += $dataDetail['PR_Total'];
                                                        $grandTotal_PO += $dataDetail['PO_Total'];
                                                        $grandTotal_qtyPO += $dataDetail['PO_Qty'];
                                                        $grandTotal_Balance += $dataDetail['balance'];
                                                    ?>
                                                    <tr>
                                                        <td>{{ $counter++ }}</td>
                                                        @if ($firstRow)
                                                            
                                                            <td rowspan="{{ $rowspan }}">{{ $dataDetail['PR_Number'] ?: '-' }}</td>
                                                            <td rowspan="{{ $rowspan }}">{{ $dataDetail['PR_Date'] ? date('d-m-Y', strtotime($dataDetail['PR_Date'])) : '-' }}</td>
                                                            <?php $firstRow = false; ?>
                                                        @else
                                                            <td style="display:none"></td>
                                                            <td style="display:none"></td>
                                                            <td style="display:none"></td>
                                                        @endif

                                                        <td>{{ $dataDetail['product_Code'] }} - {{ $dataDetail['product_Name'] }}</td>
                                                        <td>{{ number_format($dataDetail['PR_Total'], 2, '.', ',') }}</td>
                                                        <td>{{ number_format(0, 2, '.', ',') }}</td>
                                                        <td>{{ number_format(0, 2, '.', ',') }}</td>
                                                        <td>{{ $dataDetail['PO_Number'] ?: '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Date'] ? date('d-m-Y', strtotime($dataDetail['PO_Date'])) : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Qty'] ? number_format($dataDetail['PO_Qty'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['balance'] }}</td>
                                                    </tr>
                                                @endforeach
                                        @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_PR, 2, '.', ','); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                <th colspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_qtyPO, 2, '.', ','); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_PO, 2, '.', ','); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_Balance, 2, '.', ','); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }; Session::forget("isButtonReportPRtoPOSubmit"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPRtoPO')
@endsection