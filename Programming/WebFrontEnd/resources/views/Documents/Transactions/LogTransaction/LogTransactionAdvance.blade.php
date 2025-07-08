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
                                                <th style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Product Code</th>
                                                <th style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Product Name</th>
                                                <th style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> UOM</th>
                                                <th style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2"> Qty</th>
                                                <th style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2">Price</th>
                                                <th style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;" class="text-center" rowspan="2">Total</th>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++) 
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataDetail))
                                            <tr>
                                                @for($i = 1; $i < count($dataDetail[0]); $i++)
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;"> Qty</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;"> Price</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;"> Total</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>
                                            
                                        <tbody>
                                            @if(sizeof($dataDetail))
                                                @for($i = 0; $i < count($dataDetail); $i++)
                                                    <tr>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][count($dataDetail[$i]) - 1]['content']['product_RefID'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][count($dataDetail[$i]) - 1]['productName'] }}</td>
                                                        <td style="padding: 8px;">{{ $dataDetail[$i][count($dataDetail[$i]) - 1]['quantityUnitName'] }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$i]) - 1]['content']['quantity'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$i]) - 1]['content']['productUnitPriceCurrencyValue'], 2) }}</td>
                                                        <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$i]) - 1]['content']['priceCurrencyValue'], 2) }}</td>
                                                    
                                                        @for($n = 0; $n < (count($dataDetail[$i]) - 1); $n++)
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
                                                <th rowspan="2" style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;"> Requester</th>
                                                <th rowspan="2" style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;"> Beneficiary</th>
                                                <th rowspan="2" style="vertical-align: middle;border:1px solid #e9ecef;text-align: center;"> Note</th>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++) 
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        <th colspan="3" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataHeader))
                                            <tr>
                                                @for($i = 1; $i < count($dataHeader); $i++) 
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;"> Requester</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;"> Beneficiary</th>
                                                    <th class="text-center" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;"> Note</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 8px;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName']; ?></td>
                                                <td style="padding: 8px;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px;"><?= $dataHeader[count($dataHeader) - 1]['content']['remarks']; ?></td>
                                                @if(sizeof($dataHeader))
                                                    @foreach(array_slice($dataHeader, 0, count($dataHeader) - 1) as $dataHeaders)
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