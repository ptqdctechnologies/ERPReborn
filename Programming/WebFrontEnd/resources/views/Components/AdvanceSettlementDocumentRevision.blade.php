<div class="table-responsive table-height">
    <table class="table table-striped table-hover table-sticky table-sm">
        <thead>
            <tr>
                <th style="text-align: center;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;" class="text-center" rowspan="3">Product Code</th>
                <th style="text-align: center;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;" class="text-center" rowspan="3">Product Name</th>
                <th style="text-align: center;vertical-align: middle;width: 40px; min-width: 40px; max-width: 40px; left: 250px; z-index: 10;position: sticky; background-color: white;" class="text-center" rowspan="3">UOM</th>
                <th style="text-align: center;vertical-align: middle;width: 320px; min-width: 320px; max-width: 320px; left: 290px; z-index: 10;position: sticky; background-color: white;" class="text-center" colspan="3" rowspan="2">Request</th>

                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="6">
                                Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                            </th>
                        @else
                            <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="6">
                                {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                            </th>
                        @endif
                    @endfor
                @endif
            </tr>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = 0; $i < (count($dataHeaderTransactionHistory)); $i++)
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3">Expense Claim</th>
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center" colspan="3">Amount to the Company</th>
                    @endfor
                @endif
            </tr>
            <tr>
                <th style="text-align: center;vertical-align: middle;width: 70px; min-width: 70px; max-width: 70px; left: 290px; z-index: 10; position: sticky; background-color: white;" class="text-center">Qty</th>
                <th style="text-align: center;vertical-align: middle;width: 100px; min-width: 100px; max-width: 100px; left: 360px; z-index: 10; position: sticky; background-color: white;" class="text-center">Price</th>
                <th style="text-align: center;vertical-align: middle;width: 150px; min-width: 150px; max-width: 150px; left: 460px; z-index: 10; position: sticky; background-color: white;" class="text-center">Total</th>

                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = 0; $i < (count($dataHeaderTransactionHistory)); $i++)
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Qty</th>
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Price</th>
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Total</th>
                    @endfor
                @endif

                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = 0; $i < (count($dataHeaderTransactionHistory)); $i++)
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Qty</th>
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Price</th>
                        <th style="text-align: center;vertical-align: middle;background-color:#4B586A;color:white;" class="text-center">Total</th>
                    @endfor
                @endif
            </tr>
        </thead>
        <tbody>
            @if(sizeof($dataDetailGetTransactionHistory))
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <tr>
                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;">-</td>
                        <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;">-</td>
                        <td style="padding: 8px;width: 40px; min-width: 40px; max-width: 40px; left: 250px; z-index: 10;position: sticky; background-color: white;">-</td>

                        <!-- REQUEST -->
                        <td style="padding: 8px;width: 70px; min-width: 70px; max-width: 70px; left: 290px; z-index: 10;position: sticky; background-color: white;">-</td>
                        <td style="padding: 8px;width: 100px; min-width: 100px; max-width: 100px; left: 360px; z-index: 10;position: sticky; background-color: white;">-</td>
                        <td style="padding: 8px;width: 150px; min-width: 150px; max-width: 150px; left: 460px; z-index: 10;position: sticky; background-color: white;">-</td>

                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <!-- EXPENSE CLAIM -->
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['expenseQuantity'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['expenseProductUnitPriceCurrencyValue'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['expensePriceCurrencyValue'], 2) }}</td>

                                <!-- AMOUNT TO THE COMPANY -->
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['refundQuantity'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['refundProductUnitPriceCurrencyValue'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['refundPriceCurrencyValue'], 2) }}</td>
                            @else
                                <!-- EXPENSE CLAIM -->
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['expenseQuantity'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['expenseProductUnitPriceCurrencyValue'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['expensePriceCurrencyValue'], 2) }}</td>

                                <!-- AMOUNT TO THE COMPANY -->
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['refundQuantity'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['refundProductUnitPriceCurrencyValue'], 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($dataDetailGetTransactionHistory[$i][$n]['content']['refundPriceCurrencyValue'], 2) }}</td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            @endif
        </tbody>
    </table>
</div>