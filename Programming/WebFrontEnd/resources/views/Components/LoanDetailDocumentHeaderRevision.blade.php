<div class="wrapper-budget table-responsive table-height">
    <table class="table table-striped table-hover table-sticky table-sm">
        <thead>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = 2; $i >= 1; $i--)
                                <?php        $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ'];
                        $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i === count($dataHeaderTransactionHistory) - 1)
                                    <th colspan="4"
                                        style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky; background-color: white;"
                                        class="text-center">
                                        Rev {{ $i }} (Actual) -
                                        {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }}
                                        <br /> (
                                        {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }}
                                        {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }}
                                        )
                                    </th>
                                @else
                                    <th colspan="4"
                                        style="text-align: center;background-color: <?= $i == 1 ? '#4B586A' : 'white'?>;color: <?= $i == 1 ? 'white' : 'black'?>;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                        {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} -
                                        {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> (
                                        {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }}
                                        )
                                    </th>
                                @endif
                    @endfor
                @endif
            </tr>
            @if(sizeof($dataHeaderTransactionHistory))
                <tr>
                    <th class="text-center"
                        style="vertical-align: middle; left: 0px; z-index: 10;position: sticky; background-color: white;text-wrap-mode: nowrap;">
                        Loan Principal</th>
                    <th class="text-center"
                        style="vertical-align: middle; left: 125px; z-index: 10;position: sticky; background-color: white;text-wrap-mode: nowrap;">
                        Lending Rate</th>
                    <th class="text-center"
                        style="vertical-align: middle; left: 250px; z-index: 10;position: sticky; background-color: white;">
                        Loan Term</th>
                    <th class="text-center"
                        style="vertical-align: middle; left: 320px; z-index: 10;position: sticky; background-color: white;">
                        Loan Total</th>

                    @for($i = 1; $i < 2; $i++)
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">
                            Loan Principal</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">
                            Lending Rate</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">
                            Loan Term</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">
                            Loan Total</th>
                    @endfor
                </tr>
            @endif
        </thead>
        <tbody>
            <tr style="height: 40px;">
                <td style="padding: 8px; position: sticky; background-color: white; left: 0px; z-index: 10;">
                    -
                </td>
                <td style="padding: 8px; position: sticky; background-color: white; left: 125px; z-index: 10;">
                    -
                </td>
                <td style="padding: 8px; position: sticky; background-color: white; left: 250px; z-index: 10;">
                    -
                </td>
                <td style="padding: 8px; position: sticky; background-color: white; left: 320px; z-index: 10;">
                    -
                </td>

                @for($i = 1; $i < 2; $i++)
                    <td style="padding: 8px; position: sticky; background-color: white; left: 0px; z-index: 10;">
                        -
                    </td>
                    <td style="padding: 8px; position: sticky; background-color: white; left: 125px; z-index: 10;">
                        -
                    </td>
                    <td style="padding: 8px; position: sticky; background-color: white; left: 250px; z-index: 10;">
                        -
                    </td>
                    <td style="padding: 8px; position: sticky; background-color: white; left: 320px; z-index: 10;">
                        -
                    </td>
                @endfor
            </tr>
        </tbody>
    </table>
</div>