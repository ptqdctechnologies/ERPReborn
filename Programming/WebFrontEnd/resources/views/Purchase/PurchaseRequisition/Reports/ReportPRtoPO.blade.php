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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Purchase.PurchaseRequisition.Functions.Header.HeaderReportPRtoPO')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <?php if ($dataPRtoPO) { ?>
                    <!-- HEADER -->
                    <div class="row">
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
                    </div>

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
                                        <tbody>
                                            <?php
                                                $counter = 1;
                                                $grandTotal_PR = 0;
                                                $grandTotal_PO = 0;
                                                $grandTotal_qtyPO = 0;
                                                $grandTotal_Balance = 0;
                                                $previousPR = null;
                                                $previousPO = null;
                                                $renderedPRs = [];
                                                $prRowspans = [];
                                                $renderedPOs = [];
                                                $poRowspans = [];

                                                foreach ($dataPRtoPO as $row) {
                                                    $prRowspans[$row['PR_Number']] = ($prRowspans[$row['PR_Number']] ?? 0) + 1;
                                                    $poRowspans[$row['PO_Number']] = ($poRowspans[$row['PO_Number']] ?? 0) + 1;
                                                }
                                            ?>

                                            <?php foreach ($dataPRtoPO as $dataDetail): ?>
                                                <?php
                                                    $grandTotal_PR += $dataDetail['PR_Total'];
                                                    $grandTotal_PO += $dataDetail['PO_Total'];
                                                    $grandTotal_qtyPO += $dataDetail['PO_Qty'];
                                                    $grandTotal_Balance += $dataDetail['balance'];

                                                    $isNewPR = $dataDetail['PR_Number'] !== $previousPR;
                                                    $isNewPO = $dataDetail['PO_Number'] !== $previousPO;
                                                ?>
                                                <tr>
                                                    <td><?= $counter++; ?></td> 
                                                    <?php if ($isNewPR): ?>
                                                        @if (!in_array($dataDetail['PR_Number'], $renderedPRs))
                                                            <td rowspan="{{ $prRowspans[$dataDetail['PR_Number']] }}">{{ $dataDetail['PR_Number'] }}</td>
                                                            <td rowspan="{{ $prRowspans[$dataDetail['PR_Number']] }}">{{ date('d-m-Y', strtotime($dataDetail['PR_Date'])) }}</td>
                                                            @php $renderedPRs[] = $dataDetail['PR_Number']; @endphp
                                                        @endif
                                                        <td>{{ $dataDetail['product_Code'] }} - {{ $dataDetail['product_Name'] }}</td>
                                                        <td>{{ number_format($dataDetail['PR_Total'], 2, '.', ',') }}</td>
                                                        <td><?= number_format(0, 2, '.', ',') ?></td>
                                                        <td><?= number_format(0, 2, '.', ',') ?></td>
                                                        <td>{{ $dataDetail['PO_Number'] ?: '-' }}</td>
                                                        <!-- @if (!in_array($row['PO_Number'], $renderedPOs))
                                                            <td rowspan="{{ $poRowspans[$dataDetail['PO_Number']] }}">{{ $dataDetail['PO_Number'] }}</td>
                                                            @php $renderedPOs[] = $dataDetail['PO_Number']; @endphp
                                                        @endif -->
                                                        <td>{{ $dataDetail['PO_Date'] ? date('d-m-Y', strtotime($dataDetail['PO_Date'])) : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Qty'] ? number_format($dataDetail['PO_Qty'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>

                                                        <td>{{$dataDetail['balance']}}</td>
                                                        
                                                    <?php else: ?>
                                                        @if (!in_array($dataDetail['PR_Number'], $renderedPRs))
                                                            <td rowspan="{{ $prRowspans[$dataDetail['PR_Number']] }}">{{ $dataDetail['PR_Number'] }}</td>
                                                            <td rowspan="{{ $prRowspans[$dataDetail['PR_Number']] }}">{{ date('d-m-Y', strtotime($dataDetail['PR_Date'])) }}</td>
                                                            @php $renderedPRs[] = $dataDetail['PR_Number']; @endphp
                                                        @endif
                                                        <td>{{ $dataDetail['product_Code'] }} - {{ $dataDetail['product_Name'] }}</td>
                                                        <td>{{ number_format($dataDetail['PR_Total'], 2, '.', ',') }}</td>
                                                        <td><?= number_format(0, 2, '.', ',') ?></td>
                                                        <td><?= number_format(0, 2, '.', ',') ?></td>
                                                        <td>{{ $dataDetail['PO_Number'] ?: '-' }}</td>
                                                        <!-- @if (!in_array($row['PO_Number'], $renderedPOs))
                                                            <td rowspan="{{ $poRowspans[$dataDetail['PO_Number']] }}">{{ $dataDetail['PO_Number'] }}</td>
                                                            @php $renderedPOs[] = $dataDetail['PO_Number']; @endphp
                                                        @endif -->
                                                        <td>{{ $dataDetail['PO_Date'] ? date('d-m-Y', strtotime($dataDetail['PO_Date'])) : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Qty'] ? number_format($dataDetail['PO_Qty'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>
                                                        <td>{{ $dataDetail['PO_Total'] ? number_format($dataDetail['PO_Total'], 2, '.', ',') : '-' }}</td>

                                                        <td>{{$dataDetail['balance']}}</td>
                                                    <?php endif; ?>
                                                    
                                                    
                                                </tr>
                                                <?php $previousPR = $dataDetail['PR_Number']; ?>
                                                <?php $previousPO = $dataDetail['PO_Number']; ?>
                                            <?php endforeach; ?>

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
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format(0, 2, '.', ','); ?></th> -->
                                                <!-- <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;background-color:#4B586A;"></th> -->
                                                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"><?= number_format($grandTotal_Balance, 2, '.', ','); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }; Session::forget("isButtonReportPRtoPOSubmit"); ?>
                            <!-- <div class="col-12 ShowTableReportAdvanceSummary">
                                <div class="card">
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <th style="padding-top: 7px;"><label>Budget : &nbsp;</label></th>
                                                <td>
                                                    Q000172 - PLN UIP JBT2 150 kV Transmisi Cibatu Baru THK	
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PO No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Value</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Inv No</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Value</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance PO-Inv</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VAT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment Inv</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment VAT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Payment WHT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance Inv Payment</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance VAT</th>
                                                    <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Proforma/Origin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>PO01-23000503</td>
                                                    <td>2,180,180</td>
                                                    <td>RPI01-23000733</td>
                                                    <td>2,180,180</td>
                                                    <td>0</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterReportPRtoPO')
@endsection