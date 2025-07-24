<div class="wrapper-budget table-responsive table-height">
    <table class="table table-striped table-hover table-sticky table-sm">
        <thead>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                        <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <th class="text-center" colspan="8" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background-color: white;">
                                Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                            </th>
                        @else
                            <th class="text-center" colspan="4" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                            </th>
                        @endif
                    @endfor
                @endif
            </tr>
            @if(sizeof($dataDetailGetTransactionHistory))
            <tr>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 0px;z-index: 10;position: sticky;background-color: white;">PR Number</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 125px;z-index: 10;position: sticky;background-color: white;">Product Code</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 250px;z-index: 10;position: sticky;background-color: white;">Product Name</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 40px;min-width: 40px;max-width: 40px;left: 375px;z-index: 10;position: sticky;background-color: white;">UOM</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;left: 415px;z-index: 10;position: sticky;background-color: white;">Qty</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 495px;z-index: 10;position: sticky;background-color: white;">Price</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 620px;z-index: 10;position: sticky;background-color: white;">Total</th>
                <th class="text-center" style="position: sticky;vertical-align: middle;width: 125px;min-width: 125px;max-width: 125px;left: 745px;z-index: 10;position: sticky;background-color: white;">Note</th>

                @for($i = 1; $i < count($dataDetailGetTransactionHistory[0]); $i++) 
                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;">Qty</th>
                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;">Price</th>
                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 80px;min-width: 80px;max-width: 80px;">Total</th>
                    <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 150px;min-width: 150px;max-width: 150px;">Note</th>
                @endfor
            </tr>
            @endif
        </thead>

        <tbody>
            @if(sizeof($dataDetailGetTransactionHistory))
                @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                    <?php $quantity = $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['quantity']; $price = $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['productUnitPriceCurrencyValue']; ?>
                    <tr>
                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 0px;z-index: 10;">-</td>
                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 125px;z-index: 10;">-</td>
                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 250px;z-index: 10;">-</td>
                        <td style="padding: 8px;width: 40px;min-width: 40px;max-width: 40px;position: sticky;background-color: white;left: 375px;z-index: 10;">-</td>
                        <td style="padding: 8px;width: 80px;min-width: 80px;max-width: 80px;position: sticky;background-color: white;left: 415px;z-index: 10;">{{ number_format($quantity, 2) }}</td>
                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 495px;z-index: 10;">{{ number_format($price, 2) }}</td>
                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 620px;z-index: 10;">{{ number_format($quantity * $price, 2) }}</td>
                        <td style="padding: 8px;width: 125px;min-width: 125px;max-width: 125px;position: sticky;background-color: white;left: 745px;z-index: 10;">{{ $dataDetailGetTransactionHistory[$i][count($dataDetailGetTransactionHistory[$i]) - 1]['content']['remarks'] }}</td>

                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <?php $quantities = $dataDetailGetTransactionHistory[$i][$n]['content']['quantity']; $prices = $dataDetailGetTransactionHistory[$i][$n]['content']['productUnitPriceCurrencyValue']; ?>
                                <td style="padding: 8px;">{{ number_format($quantities, 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($prices, 2) }}</td>
                                <td style="padding: 8px;">{{ number_format($quantities * $prices, 2) }}</td>
                                <td style="padding: 8px;">{{ $dataDetailGetTransactionHistory[$i][$n]['content']['remarks'] }}</td>
                            @endif
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

                @if(sizeof($dataDetailGetTransactionHistory))
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <th colspan="2" style="padding: 8px;">VAT</th>
                                <th style="padding: 8px;">-</th>
                                <th style="padding: 8px;"></th>
                            @endif
                        @endfor
                    @endfor
                @endif
            </tr>
            <tr style="height: 40px;">
                <th colspan="6" style="padding: 8px;position: sticky;background-color: white;width: 495px;min-width: 495px;max-width: 495px;left: 0px;z-index: 10;">GRAND TOTAL</th>
                <th style="padding: 8px;position: sticky;background-color: white;width: 125px;min-width: 125px;max-width: 125px;left: 620px;z-index: 10;">-</th>
                <th style="padding: 8px;position: sticky;background-color: white;width: 125px;min-width: 125px;max-width: 125px;left: 745px;z-index: 10;"></th>

                @if(sizeof($dataDetailGetTransactionHistory))
                    @for($i = count($dataDetailGetTransactionHistory) - 1; $i >= 0; $i--)
                        @for($n = count($dataDetailGetTransactionHistory[$i]) - 1; $n >= 0; $n--)
                            @if ($n !== count($dataDetailGetTransactionHistory[$i]) - 1)
                                <th colspan="2" style="padding: 8px;">GRAND TOTAL</th>
                                <th style="padding: 8px;">-</th>
                                <th style="padding: 8px;"></th>
                            @endif
                        @endfor
                    @endfor
                @endif
            </tr>
        </tfoot>
    </table>
</div>