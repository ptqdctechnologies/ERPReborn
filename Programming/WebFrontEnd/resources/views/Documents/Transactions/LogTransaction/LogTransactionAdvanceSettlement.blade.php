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
                                <div class="wrapper-budget card-body table-responsive p-0 table-height">
                                    <table class="table table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++) 
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        @if ($i === 0)
                                                            <th colspan="6" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;" class="text-center">
                                                                Actual - {{ $dataHeader[count($dataHeader) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                                            </th>
                                                        @endif

                                                        <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataHeader))
                                                <tr>
                                                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;" class="text-center">Requester</th>
                                                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;" class="text-center">Beneficiary</th>
                                                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 250px; z-index: 10;" class="text-center">Bank Name</th>
                                                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 375px; z-index: 10;" class="text-center">Account Number</th>
                                                    <th style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 500px; z-index: 10;" class="text-center">Currency</th>
                                                    <th style="vertical-align: middle; width: 250px; min-width: 250px; max-width: 250px; left: 570px; z-index: 10;" class="text-center">Remark</th>

                                                    @for($i = 1; $i < count($dataHeader); $i++) 
                                                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 250px; min-width: 250px; max-width: 250px;">Remark</th>
                                                    @endfor
                                                </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 375px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 500px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 250px; min-width: 250px; max-width: 250px; position: sticky; background-color: white; left: 570px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['content']['remarks']; ?></td>

                                                @if(sizeof($dataHeader))
                                                    @foreach(array_slice($dataHeader, 0, count($dataHeader) - 1) as $dataHeaders)
                                                        <td style="padding: 8px;width: 250px; min-width: 250px; max-width: 250px;">{{ $dataHeaders['content']['remarks'] }}</td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="card">
                            <div id="container">
                                <div class="table-responsive table-height">
                                    <table class="table table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;" class="text-center" rowspan="3">Product Code</th>
                                                <th style="text-align: center;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;" class="text-center" rowspan="3">Product Name</th>
                                                <th style="text-align: center;vertical-align: middle;width: 40px; min-width: 40px; max-width: 40px; left: 250px; z-index: 10;" class="text-center" rowspan="3">UOM</th>
                                                <th style="text-align: center;vertical-align: middle;width: 320px; min-width: 320px; max-width: 320px; left: 290px; z-index: 10;" class="text-center" colspan="3" rowspan="2">Request</th>

                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++)
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        @if ($i === 0)
                                                            <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="6">
                                                                Actual - {{ $dataHeader[count($dataHeader) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                                            </th>
                                                        @endif

                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="6">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader)); $i++)
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3">Expense Claim</th>
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3">Amount to the Company</th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr>
                                                <th style="text-align: center;vertical-align: middle;width: 70px; min-width: 70px; max-width: 70px; left: 290px; z-index: 10;" class="text-center">Qty</th>
                                                <th style="text-align: center;vertical-align: middle;width: 100px; min-width: 100px; max-width: 100px; left: 360px; z-index: 10;" class="text-center">Price</th>
                                                <th style="text-align: center;vertical-align: middle;width: 150px; min-width: 150px; max-width: 150px; left: 460px; z-index: 10;" class="text-center">Total</th>

                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader)); $i++)
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Qty</th>
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Price</th>
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Total</th>
                                                    @endfor
                                                @endif

                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader)); $i++)
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Qty</th>
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Price</th>
                                                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Total</th>
                                                    @endfor
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(sizeof($dataDetail))
                                                @for($i = 0; $i < count($dataDetail); $i++)
                                                    <tr>
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;">-</td>
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;">-</td>
                                                        <td style="padding: 8px;width: 40px; min-width: 40px; max-width: 40px; left: 250px; z-index: 10;position: sticky; background-color: white;">-</td>

                                                        <!-- REQUEST -->
                                                        <td style="padding: 8px;width: 70px; min-width: 70px; max-width: 70px; left: 290px; z-index: 10;position: sticky; background-color: white;">-</td>
                                                        <td style="padding: 8px;width: 100px; min-width: 100px; max-width: 100px; left: 360px; z-index: 10;position: sticky; background-color: white;">-</td>
                                                        <td style="padding: 8px;width: 150px; min-width: 150px; max-width: 150px; left: 460px; z-index: 10;position: sticky; background-color: white;">-</td>

                                                        @for($n = 0; $n < (count($dataDetail[$i]) - 1); $n++)
                                                            @if ($n === 0)
                                                                <!-- EXPENSE CLAIM -->
                                                                <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$n]) - 1]['content']['expenseQuantity'], 2) }}</td>
                                                                <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$n]) - 1]['content']['expenseProductUnitPriceCurrencyValue'], 2) }}</td>
                                                                <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$n]) - 1]['content']['expensePriceCurrencyValue'], 2) }}</td>

                                                                <!-- AMOUNT TO THE COMPANY -->
                                                                <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$n]) - 1]['content']['refundQuantity'], 2) }}</td>
                                                                <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$n]) - 1]['content']['refundProductUnitPriceCurrencyValue'], 2) }}</td>
                                                                <td style="padding: 8px;">{{ number_format($dataDetail[$i][count($dataDetail[$n]) - 1]['content']['refundPriceCurrencyValue'], 2) }}</td>
                                                            @endif

                                                            <!-- EXPENSE CLAIM -->
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['expenseQuantity'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['expenseProductUnitPriceCurrencyValue'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['expensePriceCurrencyValue'], 2) }}</td>

                                                            <!-- AMOUNT TO THE COMPANY -->
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['refundQuantity'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['refundProductUnitPriceCurrencyValue'], 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($dataDetail[$i][$n]['content']['refundPriceCurrencyValue'], 2) }}</td>
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            @endif
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