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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">CFS Report</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="row">
                        @if($var == 1)
                            <div class="col-12 ShowDocument">
                                @include('Purchase.PurchaseOrder.Functions.Header.headerReportCFS')
                            </div>

                            @if ($dataReport)
                                <div class="col-12 ShowTableReportAdvanceSummary">
                                    <div class="card">
                                        <div class="card-body">
                                            <!-- <center> -->
                                                <table>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>COST ANALYSIS REPORT</label></th>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label><?= $dataReport['dataHeader']['budgetName']; ?></label></th>
                                                    </tr>
                                                    <tr>
                                                        <th style="padding-top: 7px;"><label>13 Mar - 29 Jan 2024</label></th>
                                                    </tr>
                                                </table>
                                            <!-- </center> -->
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                                                <thead>
                                                    <tr>
                                                        <!-- <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th> -->
                                                        <!-- <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date Added to CFS</th> -->
                                                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Site/Code</th>
                                                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px llsolid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                                                        <th colspan="3" class="sticky-col eight-col-asf-expense" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Customer Order</th>
                                                        <th colspan="2" class="sticky-col seven-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Progress</th>
                                                        <th colspan="2" class="sticky-col six-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Billing</th>
                                                        <th colspan="7" class="sticky-col five-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Budget</th>
                                                        <th colspan="5" class="sticky-col four-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Cost</th>
                                                        <th colspan="1" class="sticky-col three-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Forecast</th>
                                                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Current Margin</th>
                                                        <th colspan="3" class="sticky-col one-col-asf-amount" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Final Margin</th>
                                                    </tr>
                                                    <tr> 
                                                        <th class="sticky-col eight-col-asf-expense-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Origin CO</th>
                                                        <th class="sticky-col eight-col-asf-expense-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Variations</th>
                                                        <th class="sticky-col eight-col-asf-expense-price" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Revised CO</th>

                                                        <th class="sticky-col seven-col-asf-expense-total" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">% Complete</th>
                                                        <th class="sticky-col seven-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Amount</th>
                                                    
                                                        <th class="sticky-col six-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Invoiced</th>
                                                        <th class="sticky-col six-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Received</th>
                                                    
                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Product Id</th>
                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Qty</th>
                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Cost</th>
                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">UOM</th>

                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Origin Budget</th>
                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Variations</th>
                                                        <th class="sticky-col five-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Revised Budget</th>

                                                        <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Committed Cost</th>
                                                        <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Previous Month Cost to Date</th>
                                                        <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Movement this Month Cost</th>
                                                        <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Current Cost</th>
                                                        <th class="sticky-col four-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Paid Cost</th>

                                                        <th class="sticky-col three-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Forecast Final Cost</th>

                                                        <th class="sticky-col one-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Final Margin</th>
                                                        <th class="sticky-col one-col-asf-amount-qty" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Final %</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                                                        <tr>
                                                            <th colspan="25"><?= $dataDetail['title']; ?></th>
                                                        </tr>

                                                        <?php foreach ($dataDetail['data'] as $data) { ?>
                                                            <tr>
                                                                <td><?= $data['site']; ?></td>
                                                                <td><?= $data['name']; ?></td>
                                                                <td><?= $data['originCO']; ?></td>
                                                                <td><?= $data['variationsCO']; ?></td>
                                                                <td><?= $data['revisedCO']; ?></td>
                                                                <td><?= $data['completeProgress']; ?></td>
                                                                <td><?= $data['amountProgress']; ?></td>
                                                                <td><?= $data['invoicedBilling']; ?></td>
                                                                <td><?= $data['receivedBilling']; ?></td>
                                                                <td><?= $data['productIdBudget']; ?></td>
                                                                <td><?= $data['qtyBudget']; ?></td>
                                                                <td><?= $data['costBudget']; ?></td>
                                                                <td><?= $data['uomBudget']; ?></td>
                                                                <td><?= $data['originBudget']; ?></td>
                                                                <td><?= $data['variationsBudget']; ?></td>
                                                                <td><?= $data['revisedBudget']; ?></td>
                                                                <td><?= $data['committedCost']; ?></td>
                                                                <td><?= $data['previousCost']; ?></td>
                                                                <td><?= $data['movementCost']; ?></td>
                                                                <td><?= $data['currentCost']; ?></td>
                                                                <td><?= $data['paidCost']; ?></td>
                                                                <td><?= $data['finalForecast']; ?></td>
                                                                <td><?= $data['currentMargin']; ?></td>
                                                                <td><?= $data['finalMargin']; ?></td>
                                                                <td><?= $data['final%Margin']; ?></td>
                                                            </tr>
                                                        <?php } ?>

                                                        <tr>
                                                            <td></td>
                                                            <th colspan="25">Total</th>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="25">&nbsp;</td>
                                                        </tr>
                                                    <?php }; Session::forget("isButtonReportCFSSubmit"); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.footerReportCFS')
@endsection