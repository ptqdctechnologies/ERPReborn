@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">Report Material Receive Summary</label>
                </div>
            </div>
            <div class="card">
                <div class="tab-content p-3" id="nav-tabContent">
                    @if($statusHeader == "Yes")
                    <div class="row">
                        <div class="col-12">
                            <div class="row p-1" style="row-gap: 1rem;">
                                @include('Inventory.MaterialReceive.Functions.Header.HeaderReportMaterialReceiveSummary')
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if($statusDetail == 1 && $dataMR)
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row py-2 px-1" style="gap: 1rem;">
                                            <label class="p-0 text-bold mb-0">Budget</label>
                                              :  
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
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">MR Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Reference Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Delivery From</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Delivery To</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Receive At</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($dataMR as $key => $dataDetail)
                                                    <tr>
                                                        <td style="text-align: center;">{{ $key + 1 }}</td>
                                                        <td>{{ $dataDetail['MR_Number'] }}</td>
                                                        <td>{{ date('Y-m-d', strtotime($dataDetail['date'])) }}</td>
                                                        <td>{{ $dataDetail['referenceNumber'] }}</td>
                                                        <td>{{ $dataDetail['deliveryFrom_NonRefID']['address'] ?? '-' }}</td>
                                                        <td>{{ $dataDetail['deliveryFrom_NonRefID']['address'] ?? '-' }}</td>
                                                        <td>{{ $dataDetail['receiveAt'] }}</td>
                                                        <td>{{ $dataDetail['remarks'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <!-- <tr>
                                                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;">GRAND TOTAL</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: left;background-color:#4B586A;color:white;"></th>
                                                </tr> -->
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
@include('Inventory.MaterialReceive.Functions.Footer.FooterReportMaterialReceiveSummary')
@endsection