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
                                <th class="text-center" colspan="3" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky;background: #FFF;">CN Value</th>
                    <th class="text-center" style="vertical-align: middle; width: 155px; min-width: 155px; max-width: 155px; left: 125px; z-index: 10;position: sticky;background: #FFF;">CN Tax</th>
                    <th class="text-center" style="vertical-align: middle; width: 40px; min-width: 40px; max-width: 40px; left: 280px; z-index: 10;position: sticky;background: #FFF;">COA</th>
                </tr>
            </thead>
            <tbody>
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <tr>
                        <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity'] }}</td>
                        <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['productUnitPriceCurrencyValue'] }}</td>
                        <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['chartOfAccount_RefID'] }}</td>
                    </tr>
                @endfor
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
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">CN Value</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">CN Tax</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">COA</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <tr>
                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][$n]['content']['quantity'] }}</td>
                                <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][$n]['content']['productUnitPriceCurrencyValue'] }}</td>
                                <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][$n]['content']['chartOfAccount_RefID'] }}</td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>