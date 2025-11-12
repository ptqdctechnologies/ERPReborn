<div class="table-budget-wrapper" style="display: flex;">
    <!-- Kolom Fixed -->
    <div class="table-fixed" style="flex: 0 0 auto;">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    @if(sizeof($dataHeaderTransactionHistory))
                        @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                            <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                            @if ($i === count($dataHeaderTransactionHistory) - 1)
                                <th class="text-center" colspan="7" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th class="text-center" style="vertical-align: middle; width: 170px; min-width: 170px; max-width: 170px; left: 0px; z-index: 10;position: sticky; background-color: white;">Product</th>
                    <th class="text-center" style="vertical-align: middle; width: 145px; min-width: 145px; max-width: 145px; left: 170px; z-index: 10;position: sticky; background-color: white;">UOM</th>
                    <th class="text-center" style="vertical-align: middle; width: 145px; min-width: 145px; max-width: 145px; left: 315px; z-index: 10;position: sticky; background-color: white;">Qty</th>
                    <th class="text-center" style="vertical-align: middle; width: 110px; min-width: 110px; max-width: 110px; left: 460px; z-index: 10;position: sticky; background-color: white;">WHT (%)</th>
                    <th class="text-center" style="vertical-align: middle; width: 110px; min-width: 110px; max-width: 110px; left: 570px; z-index: 10;position: sticky; background-color: white;">COA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        <td style="padding: 8px; width: 170px; min-width: 170px; max-width: 170px; position: sticky; background-color: white; left: 0px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['productName'] }}</td>
                        <td style="padding: 8px; width: 145px; min-width: 145px; max-width: 145px; position: sticky; background-color: white; left: 170px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['quantityUnitName'] }}</td>
                        <td style="padding: 8px; width: 145px; min-width: 145px; max-width: 145px; position: sticky; background-color: white; left: 315px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity'] }}</td>
                        <td style="padding: 8px; width: 110px; min-width: 110px; max-width: 110px; position: sticky; background-color: white; left: 460px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['WHT'] }}</td>
                        <td style="padding: 8px; width: 110px; min-width: 110px; max-width: 110px; position: sticky; background-color: white; left: 570px; z-index: 10;">-</td>
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Kolom Scroll -->
    <div class="table-scroll" style="overflow-x: auto; width: 100%;">
        <table class="table table-striped table-hover table-sm">
            <thead>
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
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px; min-width: 80px; max-width: 80px;">Qty</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;">WHT (%)</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;">COA</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <tr>
                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <td style="padding: 8px;width: 80px; min-width: 80px; max-width: 80px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['quantity'], 2) }}</td>
                                <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['WHT'], 2) }}</td>
                                <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">-</td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>