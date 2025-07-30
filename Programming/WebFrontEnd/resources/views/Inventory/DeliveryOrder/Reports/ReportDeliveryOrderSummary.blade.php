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
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Delivery Order Report Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    <!-- FORM -->
                    

                    @if($statusHeader == "Yes")
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row p-1" style="row-gap: 1rem;">
                                        @include('Inventory.DeliveryOrder.Functions.Header.HeaderReportDeliveryOrderSummary')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($statusDetail == 1 && $dataDO)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-2 px-1" style="gap: 1rem;">
                                            <label class="p-0 text-bold mb-0">Budget</label>
                                              :  <?= $dataDO[0]['combinedBudgetCode']; ?> - <?= $dataDO[0]['combinedBudgetName']; ?> 
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
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width:10px;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">DO Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Type</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Delivery From</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Delivery To</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Transporter</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $counter = 1; ?>
                                                <?php foreach ($dataDO as $dataDetail) { ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $counter++; ?></td>
                                                        <td><?= $dataDetail['documentNumber']; ?></td>
                                                        <td>{{ date('Y-m-d', strtotime($dataDetail['date'])) }}</td>
                                                        <td>{{ $dataDetail['type'] }}</td>
                                                        <td>{{ $dataDetail['deliveryFrom_NonRefID']['address'] ?? '-' }}</td>
                                                        <td>{{ $dataDetail['deliveryTo_NonRefID']['address'] ?? '-' }}</td>
                                                        <td>{{ $dataDetail['transporter_Code'] }} - {{ $dataDetail['transporter_Name'] }}</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                </tr>
                                            </tfoot> -->
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
@include('Inventory.DeliveryOrder.Functions.Footer.FooterReportDeliveryOrderSummary')
@endsection