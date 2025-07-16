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
                                                            <th colspan="8" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;" class="text-center">
                                                                Actual - {{ $dataHeader[count($dataHeader) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                                            </th>
                                                        @endif

                                                        <th colspan="7" style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataHeader))
                                            <tr>
                                                <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;text-wrap-mode: nowrap;">Delivery To</th>
                                                <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;text-wrap-mode: nowrap;">Date of Delivery</th>
                                                <th class="text-center" style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 250px; z-index: 10;">Currency</th>
                                                <th class="text-center" style="vertical-align: middle; width: 50px; min-width: 50px; max-width: 50px; left: 320px; z-index: 10;">DP</th>
                                                <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 370px; z-index: 10;">TOP</th>
                                                <th class="text-center" style="vertical-align: middle; width: 150px; min-width: 150px; max-width: 150px; left: 495px; z-index: 10;text-wrap-mode: nowrap;">Payment Note</th>
                                                <th class="text-center" style="vertical-align: middle; width: 150px; min-width: 150px; max-width: 150px; left: 645px; z-index: 10;text-wrap-mode: nowrap;">Internal Note</th>
                                                <th class="text-center" style="vertical-align: middle; width: 150px; min-width: 150px; max-width: 150px; left: 795px; z-index: 10;">Remark</th>

                                                @for($i = 1; $i < count($dataHeader); $i++) 
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">Delivery To</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">Date of Delivery</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">DP</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">TOP</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 150px; min-width: 150px; max-width: 150px;text-wrap-mode: nowrap;">Payment Note</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 150px; min-width: 150px; max-width: 150px;text-wrap-mode: nowrap;">Internal Note</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 150px; min-width: 150px; max-width: 150px;">Remark</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 250px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['requesterWorkerName'] ?? 'IDR'; ?></td>
                                                <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white; left: 320px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName'] ?? '100%'; ?></td>
                                                <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 370px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 150px; min-width: 150px; max-width: 150px; position: sticky; background-color: white; left: 495px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 150px; min-width: 150px; max-width: 150px; position: sticky; background-color: white; left: 645px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['beneficiaryWorkerName']; ?></td>
                                                <td style="padding: 8px; width: 150px; min-width: 150px; max-width: 150px; position: sticky; background-color: white; left: 795px; z-index: 10;"><?= $dataHeader[count($dataHeader) - 1]['content']['remarks']; ?></td>

                                                @if(sizeof($dataHeader))
                                                    @foreach(array_slice($dataHeader, 0, count($dataHeader) - 1) as $dataHeaders)
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaders['beneficiaryWorkerName'] }}</td>
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaders['requesterWorkerName'] }}</td>
                                                        <td style="padding: 8px;width: 70px; min-width: 70px; max-width: 70px;">{{ $dataHeaders['requesterWorkerName'] }}</td>
                                                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaders['beneficiaryWorkerName'] }}</td>
                                                        <td style="padding: 8px;width: 150px; min-width: 150px; max-width: 150px;">{{ $dataHeaders['beneficiaryWorkerName'] }}</td>
                                                        <td style="padding: 8px;width: 150px; min-width: 150px; max-width: 150px;">{{ $dataHeaders['beneficiaryWorkerName'] }}</td>
                                                        <td style="padding: 8px;width: 150px; min-width: 150px; max-width: 150px;">{{ $dataHeaders['content']['remarks'] }}</td>
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
                                <div class="wrapper-budget card-body table-responsive p-0 table-height">
                                    <table class="table table-striped table-hover table-sticky table-sm">
                                        <thead>
                                            <tr>
                                                @if(sizeof($dataHeader))
                                                    @for($i = 0; $i < (count($dataHeader) - 1); $i++) 
                                                        <?php $entryDateTime = $dataHeader[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeader[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                                        @if ($i === 0)
                                                            <th class="text-center" colspan="8" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;">
                                                                Actual - {{ $dataHeader[count($dataHeader) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeader[count($dataHeader) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                                            </th>
                                                        @endif

                                                        <th class="text-center" colspan="4" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                                            {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeader[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                                        </th>
                                                    @endfor
                                                @endif
                                            </tr>
                                            @if(sizeof($dataDetail))
                                            <tr>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 0px;z-index: 10;">PR Number</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 125px;z-index: 10;">Product Code</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 250px;z-index: 10;">Product Name</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 40px;min-width: 40px;max-width: 40px;left: 375px;z-index: 10;">UOM</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;left: 415px;z-index: 10;">Qty</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 495px;z-index: 10;">Price</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 620px;z-index: 10;">Total</th>
                                                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 745px;z-index: 10;">Note</th>

                                                @for($i = 1; $i < count($dataDetail[0]); $i++) 
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;">Qty</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;">Price</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;">Total</th>
                                                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 150px;min-width: 150px;max-width: 150px;">Note</th>
                                                @endfor
                                            </tr>
                                            @endif
                                        </thead>

                                        <tbody>
                                            @if(sizeof($dataDetail))
                                                @for($i = 0; $i < count($dataDetail); $i++) 
                                                    <?php $quantity = $dataDetail[$i][count($dataDetail[$i]) - 1]['content']['quantity']; $price = $dataDetail[$i][count($dataDetail[$i]) - 1]['content']['productUnitPriceCurrencyValue']; ?>
                                                    <tr>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 0px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 125px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 250px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 40px;min-width: 40px;max-width: 40px;position: sticky;background-color: white;left: 375px;z-index: 10;">-</td>
                                                        <td style="padding: 8px;width: 80px;min-width: 80px;max-width: 80px;position: sticky;background-color: white;left: 415px;z-index: 10;">{{ number_format($quantity, 2) }}</td>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 495px;z-index: 10;">{{ number_format($price, 2) }}</td>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 620px;z-index: 10;">{{ number_format($quantity * $price, 2) }}</td>
                                                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 745px;z-index: 10;">{{ $dataDetail[$i][count($dataDetail[$i]) - 1]['content']['remarks'] }}</td>

                                                        @for($n = 0; $n < (count($dataDetail[$i]) - 1); $n++)
                                                            <?php $quantities = $dataDetail[$i][$n]['content']['quantity']; $prices = $dataDetail[$i][$n]['content']['productUnitPriceCurrencyValue']; ?>
                                                            <td style="padding: 8px;">{{ number_format($quantities, 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($prices, 2) }}</td>
                                                            <td style="padding: 8px;">{{ number_format($quantities * $prices, 2) }}</td>
                                                            <td style="padding: 8px;">{{ $dataDetail[$i][$n]['content']['remarks'] }}</td>
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            @endif
                                        </tbody>

                                        <tfoot>
                                            <tr style="height: 40px;">
                                                <th colspan="6" style="padding: 8px;position: sticky;background-color: white;width: 495px;min-width: 495px;max-width: 495px;left: 0px;z-index: 10;">VAT</th>
                                                <th style="padding: 8px;position: sticky;background-color: white;width: 125px;min-width: 125px;max-width: 125px;left: 620px;z-index: 10;">-</th>
                                                <th style="padding: 8px;position: sticky;background-color: white;width: 125px;min-width: 125px;max-width: 125px;left: 745px;z-index: 10;"></th>

                                                @if(sizeof($dataDetail))
                                                    @for($i = 0; $i < count($dataDetail); $i++)
                                                        @for($n = 0; $n < (count($dataDetail[$i]) - 1); $n++)
                                                            <th colspan="2" style="padding: 8px;">VAT</th>
                                                            <th style="padding: 8px;">-</th>
                                                            <th style="padding: 8px;"></th>
                                                        @endfor
                                                    @endfor
                                                @endif
                                            </tr>
                                            <tr style="height: 40px;">
                                                <th colspan="6" style="padding: 8px;position: sticky;background-color: white;width: 495px;min-width: 495px;max-width: 495px;left: 0px;z-index: 10;">GRAND TOTAL</th>
                                                <th style="padding: 8px;position: sticky;background-color: white;width: 125px;min-width: 125px;max-width: 125px;left: 620px;z-index: 10;">-</th>
                                                <th style="padding: 8px;position: sticky;background-color: white;width: 125px;min-width: 125px;max-width: 125px;left: 745px;z-index: 10;"></th>

                                                @if(sizeof($dataDetail))
                                                    @for($i = 0; $i < count($dataDetail); $i++)
                                                        @for($n = 0; $n < (count($dataDetail[$i]) - 1); $n++)
                                                            <th colspan="2" style="padding: 8px;">GRAND TOTAL</th>
                                                            <th style="padding: 8px;">-</th>
                                                            <th style="padding: 8px;"></th>
                                                        @endfor
                                                    @endfor
                                                @endif
                                            </tr>
                                        </tfoot>
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