@extends('Partials.app')
@section('main')

<!-- Log Transaction css -->
<link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/log-transaction.min.css') }}">
  
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
                            <div id="container">
                                <div class="table-responsive table-height">
                                    <table class="table table-bordered table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Product ID</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Product Name</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> UOM</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Qty</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2">Price</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2">Total</th>
                                                @if(sizeof($dataDetail))
                                                    @for($i = 1; $i < count($dataDetail[0]); $i++) 
                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Rev {{ $i }} - Aldi Mulyadi ( {{ date('Y-m-d', strtotime($dataDetail[0][$i]['content']['sys_Data_Edit_DateTimeTZ'])) }} )</th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataDetail))
                                            <tr>
                                                @for($i = 1; $i < count($dataDetail[0]); $i++)
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Qty</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Price</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Total</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>
                                            
                                        <tbody>
                                            @if(sizeof($dataDetail))
                                                @for($i = 0; $i < count($dataDetail); $i++)
                                                    <tr>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['product_RefID'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['product_RefID'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['sys_PID'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['quantity'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['productUnitPriceCurrencyValue'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['priceCurrencyValue'] }}</td>
                                                    
                                                        @for($n = 1; $n < count($dataDetail[$i]); $n++)
                                                            <td style="padding: 8px;">{{ $dataDetail[$i][$n]['content']['quantity'] }}</td>
                                                            <td style="padding: 8px;">{{ $dataDetail[$i][$n]['content']['productUnitPriceCurrencyValue'] }}</td>
                                                            <td style="padding: 8px;">{{ $dataDetail[$i][$n]['content']['priceCurrencyValue'] }}</td>
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card">
                            <div id="container">
                                <div class="table-responsive table-height">
                                    <table class="table table-bordered table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Requester</th>
                                                <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Beneficiary</th>
                                                <th rowspan="2" style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;"> Note</th>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 1; $i < count($dataHeader); $i++) 
                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">Rev {{ $i }}</th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataHeader))
                                            <tr>
                                                @for($i = 1; $i < count($dataHeader); $i++) 
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Requester</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Beneficiary</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;top: 23px;"> Note</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @if(sizeof($dataHeader))
                                                    @foreach($dataHeader as $dataHeaders)
                                                        <td style="padding: 8px;">{{ $dataHeaders['content']['requesterWorkerJobsPosition_RefID'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataHeaders['content']['beneficiaryWorkerJobsPosition_RefID'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataHeaders['content']['remarks'] }}</td>
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
    </div>
</section>
@endsection