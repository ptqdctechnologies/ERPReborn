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
                            <div class="card-header d-flex">
                                <div class="text-center" style="width: 100%;">
                                    <h3 style="text-transform: uppercase; font-weight: bold;">
                                        Revision History for {{ $documentName }} : {{ $documentNumber }}
                                    </h3>
                                </div>
                                <div class="d-flex" style="flex-direction: column; justify-content: center;">
                                    <form id="showDocumentForm" method="POST" action="{{ route('CheckDocument.ShowDocument') }}" style="display: inline;">
                                    @csrf
                                        <input type="hidden" name="businessDocument_RefID" value="<?= $dataHeader[0]['content']['sys_PID']; ?>" />
                                        <input type="hidden" name="businessDocumentType_Name" value="<?= $documentName; ?>" />
                                        <input type="hidden" name="businessDocumentNumber" value="<?= $documentNumber; ?>" />
                                        <button type="submit" class="btn btn-default btn-sm" style="border:1px solid #ced4da;">
                                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="">
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div id="container">
                                <div class="table-responsive table-height">
                                    <table class="table table-bordered table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Product Code</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Product Name</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> UOM</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Qty</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2">Price</th>
                                                <th style="padding-bottom:15px;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2">Total</th>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 1; $i < count($dataHeader); $i++) 
                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;">
                                                            Rev {{ $i }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ'])) }}  )
                                                        </th>
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
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['productName'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['quantityUnitName'] }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['quantity'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['productUnitPriceCurrencyValue'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['priceCurrencyValue'], 2) }}</td>
                                                    
                                                        @for($n = 1; $n < count($dataDetail[$i]); $n++)
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['quantity'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['productUnitPriceCurrencyValue'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['priceCurrencyValue'], 2) }}</td>
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
                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;">
                                                            Rev {{ $i }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ'])) }}  )
                                                        </th>
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
                                                        <td style="padding: 8px;">{{ $dataHeaders['requesterWorkerName'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataHeaders['beneficiaryWorkerName'] }}</td>
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