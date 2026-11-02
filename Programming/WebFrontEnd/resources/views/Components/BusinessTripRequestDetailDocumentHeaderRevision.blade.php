<div class="wrapper-budget table-responsive table-height">
    <table class="table table-striped table-hover table-sticky table-sm">
        <thead>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = 2; $i >= 1; $i--)
                                <?php        $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ'];
                        $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i === count($dataHeaderTransactionHistory) - 1)
                                    <th colspan="5"
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
                                    <th colspan="5"
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
                        style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;text-wrap-mode: nowrap;">
                        Date Commence Travel</th>
                    <th class="text-center"
                        style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky; background-color: white;text-wrap-mode: nowrap;">
                        Date End Travel</th>
                    <th class="text-center"
                        style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 250px; z-index: 10;position: sticky; background-color: white;">
                        Departing From</th>
                    <th class="text-center"
                        style="vertical-align: middle; width: 50px; min-width: 50px; max-width: 50px; left: 320px; z-index: 10;position: sticky; background-color: white;">
                        Destination To</th>
                    <th class="text-center"
                        style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 370px; z-index: 10;position: sticky; background-color: white;">
                        Reason to Travel</th>

                    @for($i = 1; $i < 2; $i++)
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">
                            Date Commence Travel</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">
                            Date End Travel</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">
                            Departing From</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">
                            Destination To</th>
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">
                            Reason to Travel</th>
                    @endfor
                </tr>
            @endif
        </thead>
        <tbody>
            <tr style="height: 40px;">
                <td
                    style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">
                    2026-09-03
                </td>
                <td
                    style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">
                    2026-09-04
                </td>
                <td
                    style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 250px; z-index: 10;">
                    Jekardah
                </td>
                <td
                    style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white; left: 320px; z-index: 10;">
                    Medan
                </td>
                <td
                    style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 370px; z-index: 10;">
                    -
                </td>
                <td
                    style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">
                    2026-09-03
                </td>
                <td
                    style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">
                    2026-09-04
                </td>
                <td
                    style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 250px; z-index: 10;">
                    Jekardah
                </td>
                <td
                    style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white; left: 320px; z-index: 10;">
                    Medan
                </td>
                <td
                    style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 370px; z-index: 10;">
                    -
                </td>
            </tr>
        </tbody>
    </table>
</div>