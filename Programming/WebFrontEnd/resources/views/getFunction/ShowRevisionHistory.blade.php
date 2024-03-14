@extends('Partials.app')
@section('main')

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <center>
                                    <h3><span style="text-transform:uppercase;font-weight:bold;">Revision History for {{ $documentName }} : {{ $documentNumber }}</span></h3>
                                </center>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height:200px;">
                                <table class="table table-head-fixed text-nowrap table-bordered table-sm TableShowRevisionHistory" id="TableShowRevisionHistory" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;">Product ID</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;">Price</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;">Total</th>
                                            @if(isset($dataDetail))
                                                @for($i = 1; $i < count($dataDetail[0]); $i++) 
                                                    <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Rev {{ $i }} - Aldi Mulyadi ( {{ date('Y-m-d', strtotime($dataDetail[0][$i]['content']['sys_Data_Edit_DateTimeTZ'])) }} )</th>
                                                @endfor
                                            @endif
                                        </tr>
                                        @if(isset($dataDetail))
                                        <tr>
                                            @for($i = 1; $i < count($dataDetail[0]); $i++)
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Qty</th>
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Price</th>
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Total</th>
                                            @endfor
                                        </tr>
                                        @endif
                                    </thead>
                                    <tbody>
                                        @if(isset($dataDetail))
                                            @for($i = 0; $i < count($dataDetail); $i++)
                                                <tr>
                                                    <td>{{ $dataDetail[$i][0]['content']['product_RefID'] }}</td>
                                                    <td>{{ $dataDetail[$i][0]['content']['product_RefID'] }}</td>
                                                    <td>{{ $dataDetail[$i][0]['content']['sys_PID'] }}</td>
                                                    <td>{{ $dataDetail[$i][0]['content']['quantity'] }}</td>
                                                    <td>{{ $dataDetail[$i][0]['content']['productUnitPriceCurrencyValue'] }}</td>
                                                    <td>{{ $dataDetail[$i][0]['content']['priceCurrencyValue'] }}</td>
                                                
                                                
                                                    @for($n = 1; $n < count($dataDetail[$i]); $n++)
                                                        <td>{{ $dataDetail[$i][$n]['content']['quantity'] }}</td>
                                                        <td>{{ $dataDetail[$i][$n]['content']['productUnitPriceCurrencyValue'] }}</td>
                                                        <td>{{ $dataDetail[$i][$n]['content']['priceCurrencyValue'] }}</td>
                                                    @endfor
                                                </tr>
                                            @endfor
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap table-bordered table-sm" style="width: 100%;">
                                    <thead>
                                        <tr>

                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Requester</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Beneficiary</th>
                                            <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Note</th>
                                            @if(count($dataHeader) > 1)
                                                @for($i = 1; $i < count($dataHeader); $i++) 
                                                    <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Rev {{ $i }}</th>
                                                @endfor
                                            @endif
                                        </tr>
                                        @if(count($dataHeader) > 1)
                                        <tr>

                                            @for($i = 1; $i < count($dataHeader); $i++) 
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Requester</th>
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Beneficiary</th>
                                                <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;"> Note</th>
                                            @endfor
                                        </tr>
                                        @endif
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if(count($dataHeader) > 1)
                                                @foreach($dataHeader as $dataHeaders)
                                                    <td>{{ $dataHeaders['content']['requesterWorkerJobsPosition_RefID'] }}</td>
                                                    <td>{{ $dataHeaders['content']['beneficiaryWorkerJobsPosition_RefID'] }}</td>
                                                    <td>{{ $dataHeaders['content']['remarks'] }}</td>
                                                @endforeach
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</section>
@endsection