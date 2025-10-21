<div class="table-budget-wrapper" style="display: flex;">
    <!-- Kolom Fixed -->
    <div class="table-fixed" style="flex: 0 0 auto;">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <?php if ($dataHeader['type']['text'] == "Stock Movement") { ?>
                    <tr>
                        @if(sizeof($dataHeaderTransactionHistory))
                            @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                                <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i === count($dataHeaderTransactionHistory) - 1)
                                    <th class="text-center" colspan="7" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                        Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                    </th>
                                @endif
                            @endfor
                        @endif
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;">Product Code</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;">Product Name</th>
                        <th class="text-center" style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 195px; z-index: 10;position: sticky; background-color: white;">UOM</th>
                        <th class="text-center" style="vertical-align: middle; width: 80px; min-width: 80px; max-width: 80px; left: 275px; z-index: 10;position: sticky; background-color: white;">Qty</th>
                        <th class="text-center" style="vertical-align: middle; width: 250px; min-width: 250px; max-width: 250px; left: 425px; z-index: 10;position: sticky; background-color: white;">Note</th>
                    </tr>
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    <tr>
                        @if(sizeof($dataHeaderTransactionHistory))
                            @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                                <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i === count($dataHeaderTransactionHistory) - 1)
                                    <th class="text-center" colspan="6" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                        Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                    </th>
                                @endif
                            @endfor
                        @endif
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;">Sub Budget</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;">Product Code</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 250px; z-index: 10;position: sticky; background-color: white;">Product Name</th>
                        <th class="text-center" style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 375px; z-index: 10;position: sticky; background-color: white;">UOM</th>
                        <th class="text-center" style="vertical-align: middle; width: 80px; min-width: 80px; max-width: 80px; left: 445px; z-index: 10;position: sticky; background-color: white;">Qty</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 525px; z-index: 10;position: sticky; background-color: white;">Note</th>
                    </tr>
                <?php } else { ?>
                    <tr>
                        @if(sizeof($dataHeaderTransactionHistory))
                            @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                                <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i === count($dataHeaderTransactionHistory) - 1)
                                    <th class="text-center" colspan="8" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                        Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                    </th>
                                @endif
                            @endfor
                        @endif
                    </tr>
                    <tr>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;">PO Number</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;">Sub Budget Code</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 250px; z-index: 10;position: sticky; background-color: white;">Product Code</th>
                        <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 375px; z-index: 10;position: sticky; background-color: white;">Product Name</th>
                        <th class="text-center" style="vertical-align: middle; width: 50px; min-width: 50px; max-width: 50px; left: 500px; z-index: 10;position: sticky; background-color: white;">UOM</th>
                        <th class="text-center" style="vertical-align: middle; width: 60px; min-width: 60px; max-width: 60px; left: 550px; z-index: 10;position: sticky; background-color: white;">Qty</th>
                        <th class="text-center" style="vertical-align: middle; width: 100px; min-width: 100px; max-width: 100px; left: 610px; z-index: 10;position: sticky; background-color: white;">Price</th>
                        <th class="text-center" style="vertical-align: middle; width: 100px; min-width: 100px; max-width: 100px; left: 710px; z-index: 10;position: sticky; background-color: white;">Total</th>
                    </tr>
                <?php } ?>
            </thead>
            <tbody>
                <?php if ($dataHeader['type']['text'] == "Stock Movement") { ?>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <tr>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['product_RefID'] }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['productName'] }}</td>
                            <td style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 195px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['quantityUnitName'] }}</td>
                            <td style="padding: 8px; width: 80px; min-width: 80px; max-width: 80px; position: sticky; background-color: white; left: 275px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity'], 2) }}</td>
                            <td style="padding: 8px; width: 250px; min-width: 250px; max-width: 250px; position: sticky; background-color: white; left: 425px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['remarks'] }}</td>
                        </tr>
                    @endfor
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <tr>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['product_RefID'] }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['productName'] }}</td>
                            <td style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 375px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['quantityUnitName'] }}</td>
                            <td style="padding: 8px; width: 80px; min-width: 80px; max-width: 80px; position: sticky; background-color: white; left: 445px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity'], 2) }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 525px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['remarks'] }}</td>
                        </tr>
                    @endfor
                <?php } else { ?>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <tr>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['product_RefID'] }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 375px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['productName'] }}</td>
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white; left: 500px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['quantityUnitName'] }}</td>
                            <td style="padding: 8px; width: 60px; min-width: 60px; max-width: 60px; position: sticky; background-color: white; left: 550px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity'], 2) }}</td>
                            <td style="padding: 8px; width: 100px; min-width: 100px; max-width: 100px; position: sticky; background-color: white; left: 610px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['productUnitPriceCurrencyValue'] ?? 0, 2) }}</td>
                            <td style="padding: 8px; width: 100px; min-width: 100px; max-width: 100px; position: sticky; background-color: white; left: 710px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['priceCurrencyValue'] ?? 0, 2) }}</td>
                        </tr>
                    @endfor
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Kolom Scroll -->
    <div class="table-scroll" style="overflow-x: auto; width: 100%;">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <?php if ($dataHeader['type']['text'] == "Stock Movement") { ?>
                    <tr>
                        @if(sizeof($dataHeaderTransactionHistory))
                            @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                                <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i !== count($dataHeaderTransactionHistory) - 1)
                                    <th class="text-center" colspan="2" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                        {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                    </th>
                                @endif
                            @endfor
                        @endif
                    </tr>
                    <tr>
                        @for($i = 1; $i < count($dataDetailGetTransactionHistory[0]); $i++)
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px; min-width: 80px; max-width: 80px;"> Qty</th>
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;"> Note</th>
                        @endfor
                    </tr>
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    <tr>
                        @if(sizeof($dataHeaderTransactionHistory))
                            @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                                <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i !== count($dataHeaderTransactionHistory) - 1)
                                    <th class="text-center" colspan="2" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                        {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                    </th>
                                @endif
                            @endfor
                        @endif
                    </tr>
                    <tr>
                        @for($i = 1; $i < count($dataDetailGetTransactionHistory[0]); $i++)
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px; min-width: 80px; max-width: 80px;"> Qty</th>
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;"> Note</th>
                        @endfor
                    </tr>
                <?php } else { ?>
                    <tr>
                        @if(sizeof($dataHeaderTransactionHistory))
                            @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                                <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i !== count($dataHeaderTransactionHistory) - 1)
                                    <th class="text-center" colspan="3" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                        {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                    </th>
                                @endif
                            @endfor
                        @endif
                    </tr>
                    <tr>
                        @for($i = 1; $i < count($dataDetailGetTransactionHistory[0]); $i++)
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px; min-width: 80px; max-width: 80px;"> Qty</th>
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;"> Price</th>
                            <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;"> Total</th>
                        @endfor
                    </tr>
                <?php } ?>
            </thead>
            <tbody>
                <?php if ($dataHeader['type']['text'] == "Stock Movement") { ?>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <tr>
                            @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                                @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                    <td style="padding: 8px;width: 80px; min-width: 80px; max-width: 80px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['quantity'], 2) }}</td>
                                    <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataDetailGetTransactionHistory[$i][$n]['content']['remarks'] }}</td>
                                @endif
                            @endfor
                        </tr>
                    @endfor
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <tr>
                            @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                                @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                    <td style="padding: 8px;width: 80px; min-width: 80px; max-width: 80px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['quantity'], 2) }}</td>
                                    <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataDetailGetTransactionHistory[$i][$n]['content']['remarks'] }}</td>
                                @endif
                            @endfor
                        </tr>
                    @endfor
                <?php } else { ?>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <tr>
                            @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                                @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                    <td style="padding: 8px;width: 80px; min-width: 80px; max-width: 80px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['quantity'], 2) }}</td>
                                    <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['productUnitPriceCurrencyValue'] ?? 0, 2) }}</td>
                                    <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['priceCurrencyValue'] ?? 0, 2) }}</td>
                                @endif
                            @endfor
                        </tr>
                    @endfor
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>