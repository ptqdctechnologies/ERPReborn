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
                                <th class="text-center" colspan="6" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th colspan="6" style="vertical-align: middle; width: 50px; min-width: 50px; max-width: 50px; left: 0px; z-index: 10;position: sticky; background-color: white;" class="text-center">Depreciation</th>
                </tr>
                <tr>
                    <th style="vertical-align: middle; width: 50px; min-width: 50px; max-width: 50px; left: 0px; z-index: 10;position: sticky; background-color: white;" class="text-center">Asset</th>
                    <th style="vertical-align: middle; width: 100px; min-width: 100px; max-width: 100px; left: 50px; z-index: 10;position: sticky; background-color: white;" class="text-center">Category</th>
                    <th style="vertical-align: middle; width: 130px; min-width: 130px; max-width: 130px; left: 150px; z-index: 10;position: sticky; background-color: white;" class="text-center">Method</th>
                    <th style="vertical-align: middle; width: 130px; min-width: 130px; max-width: 130px; left: 280px; z-index: 10;position: sticky; background-color: white;" class="text-center">Rate (%)</th>
                    <th style="vertical-align: middle; width: 120px; min-width: 120px; max-width: 120px; left: 410px; z-index: 10;position: sticky; background-color: white;" class="text-center">Years</th>
                    <th style="vertical-align: middle; width: 150px; min-width: 150px; max-width: 150px; left: 530px; z-index: 10;position: sticky; background-color: white;" class="text-center">COA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white; left: 0px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['assetStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px; width: 100px; min-width: 100px; max-width: 100px; position: sticky; background-color: white; left: 50px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 130px; min-width: 130px; max-width: 130px; position: sticky; background-color: white; left: 150px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 130px; min-width: 130px; max-width: 130px; position: sticky; background-color: white; left: 280px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['rate'] }}</td>
                            <td style="padding: 8px; width: 120px; min-width: 120px; max-width: 120px; position: sticky; background-color: white; left: 410px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['period'] }}</td>
                            <td style="padding: 8px; width: 150px; min-width: 150px; max-width: 150px; position: sticky; background-color: white; left: 530px; z-index: 10;">-</td>
                        @endif
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
                                <th class="text-center" colspan="6" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                    {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++)
                        <th class="text-center" colspan="6" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 50px; min-width: 50px; max-width: 50px;">Depreciation</th>
                    @endfor
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++)
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 50px; min-width: 50px; max-width: 50px;">Asset</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 100px; min-width: 100px; max-width: 100px;">Category</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 130px; min-width: 130px; max-width: 130px;">Method</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 130px; min-width: 130px; max-width: 130px;">Rate</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 120px; min-width: 120px; max-width: 120px;">Years</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 130px; min-width: 130px; max-width: 130px;">COA</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i !== count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px;width: 50px; min-width: 50px; max-width: 50px;">{{ $dataHeaderTransactionHistory[$i]['content']['assetStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px;width: 100px; min-width: 100px; max-width: 100px;">-</td>
                            <td style="padding: 8px;width: 130px; min-width: 130px; max-width: 130px;">-</td>
                            <td style="padding: 8px;width: 130px; min-width: 130px; max-width: 130px;">{{ $dataHeaderTransactionHistory[$i]['content']['rate'] }}</td>
                            <td style="padding: 8px;width: 120px; min-width: 120px; max-width: 120px;">{{ $dataHeaderTransactionHistory[$i]['content']['period'] }}</td>
                            <td style="padding: 8px;width: 130px; min-width: 130px; max-width: 130px;">-</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>