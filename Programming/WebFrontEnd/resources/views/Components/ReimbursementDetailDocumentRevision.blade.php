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
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;">Product Code</th>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;">Product Name</th>
                    <th class="text-center" style="vertical-align: middle; width: 40px; min-width: 40px; max-width: 40px; left: 250px; z-index: 10;position: sticky; background-color: white;">UOM</th>
                    <th class="text-center" style="vertical-align: middle; width: 80px; min-width: 80px; max-width: 80px; left: 290px; z-index: 10;position: sticky; background-color: white;">Qty</th>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 370px; z-index: 10;position: sticky; background-color: white;">Price</th>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 495px; z-index: 10;position: sticky; background-color: white;">Total</th>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 620px; z-index: 10;position: sticky; background-color: white;">Note</th>
                </tr>
            </thead>
            <tbody>
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <?php $quantity = $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity']; $price = $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['productUnitPriceCurrencyValue']; ?>
                    <tr style="height: 40px;">
                        <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['product_RefID'] }}</td>
                        <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['productName'] }}</td>
                        <td style="padding: 8px; width: 40px; min-width: 40px; max-width: 40px; position: sticky; background-color: white; left: 250px; z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['quantityUnitName'] }}</td>
                        <td style="padding: 8px; width: 80px; min-width: 80px; max-width: 80px; position: sticky; background-color: white; left: 290px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity'], 2) }}</td>
                        <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 370px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['productUnitPriceCurrencyValue'], 2) }}</td>
                        <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 495px; z-index: 10;">{{ number_format($dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['priceCurrencyValue'], 2) }}</td>
                        <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 620px; z-index: 10;">-</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Kolom Scroll -->
    <div class="table-scroll" style="overflow-x: auto;">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    @if(sizeof($dataHeaderTransactionHistory))
                        @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                            <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                            @if ($i !== count($dataHeaderTransactionHistory) - 1)
                                <th class="text-center" colspan="4" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                    {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataDetailGetTransactionHistory[0]); $i++)
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Qty</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Price</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Total</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Note</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <?php $quantity = $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity']; $price = $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['productUnitPriceCurrencyValue']; ?>
                    <tr style="height: 40px;">
                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <td style="padding: 8px;border-right:1px solid #e9ecef;width: 60px; min-width: 60px; max-width: 60px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['quantity'], 2) }}</td>
                                <td style="padding: 8px;border-right:1px solid #e9ecef;width: 80px; min-width: 80px; max-width: 80px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['productUnitPriceCurrencyValue'], 2) }}</td>
                                <td style="padding: 8px;border-right:1px solid #e9ecef;width: 80px; min-width: 80px; max-width: 80px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['priceCurrencyValue'], 2) }}</td>
                                <td style="padding: 8px;border-right:1px solid #e9ecef;width: 150px; min-width: 150px; max-width: 150px;">-</td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>