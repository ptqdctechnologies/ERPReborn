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
                                    <form id="showDocumentForm" method="POST" action="{{ route($urlPage) }}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="businessDocumentType_Name" value="<?= $documentName; ?>" />
                                        <input type="hidden" name="businessDocument_RefID" value="<?= $dataHeader[0]['content']['sys_PID']; ?>" />
                                        <input type="hidden" name="businessDocumentNumber" value="<?= $documentNumber; ?>" />
                                        <input type="hidden" name="businessDocumentTypeName" value="<?= $documentName; ?>" />
                                        <input type="hidden" name="formDocumentNumber_RefID" value="<?= $dataHeader[0]['content']['sys_PID']; ?>" />
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
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> Product Code</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> Product Name</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> UOM</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" colspan="6"> Settlement</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" rowspan="3"> Balance</th>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 1; $i < count($dataHeader); $i++)
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="6">
                                                            Rev {{ $i }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ'])) }}  )
                                                        </th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" rowspan="3">
                                                            Balance
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" colspan="3"> Expense Claim</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center" colspan="3">Amount to the Company</th>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 1; $i < count($dataHeader); $i++)
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3"> Expense Claim</th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3">Amount to the Company</th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Qty</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Price</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Total</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Qty</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Price</th>
                                                <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;" class="text-center"> Total</th>

                                                @if(sizeof($dataHeader))
                                                    @for($i = 1; $i < count($dataHeader); $i++)
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Qty</th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Price</th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Total</th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Qty</th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Price</th>
                                                        <th style="border:1px solid #e9ecef;text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center"> Total</th>
                                                    @endfor
                                                @endif
                                            </tr>
                                        </thead>
                                            
                                        <tbody>
                                            @if(sizeof($dataDetail))
                                                @for($i = 0; $i < count($dataDetail); $i++)
                                                    <tr>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['content']['product_RefID'] ?? '-' }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['productName'] ?? '-' }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][0]['quantityUnitName'] ?? '-' }}</td>
                                                        
                                                        <!-- EXPENSE CLAIM -->
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['expenseQuantity'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['expenseProductUnitPriceCurrencyValue'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['expensePriceCurrencyValue'], 2) }}</td>

                                                        <!-- AMOUNT TO THE COMPANY -->
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['refundQuantity'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['refundProductUnitPriceCurrencyValue'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][0]['content']['refundPriceCurrencyValue'], 2) }}</td>

                                                        <!-- BALANCE -->
                                                        <td style="padding: 8px;">-</td>

                                                        @for($n = 1; $n < count($dataDetail[$i]); $n++)
                                                            <!-- EXPENSE CLAIM -->
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['expenseQuantity'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['expenseProductUnitPriceCurrencyValue'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['expensePriceCurrencyValue'], 2) }}</td>

                                                            <!-- AMOUNT TO THE COMPANY -->
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['refundQuantity'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['refundProductUnitPriceCurrencyValue'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['refundPriceCurrencyValue'], 2) }}</td>

                                                            <!-- BALANCE -->
                                                            <td style="padding: 8px;">-</td>
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
                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;">
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
                                                        <td style="padding: 8px;">{{ $dataHeaders['requesterWorkerName'] ?? '-' }}</td>
                                                        <td style="padding: 8px;">{{ $dataHeaders['beneficiaryWorkerName'] ?? '-' }}</td>
                                                        <td style="padding: 8px;">{{ $dataHeaders['content']['remarks'] ?? '-' }}</td>
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