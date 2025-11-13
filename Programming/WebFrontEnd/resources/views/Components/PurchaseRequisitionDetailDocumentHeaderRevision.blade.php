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
                                <th class="text-center" colspan="4" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;text-wrap-mode: nowrap;position: sticky; background-color: white;">Delivery To</th>
                    <th class="text-center" style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;text-wrap-mode: nowrap;position: sticky; background-color: white;">Date of Delivery</th>
                    <th class="text-center" style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 250px; z-index: 10;text-wrap-mode: nowrap;position: sticky; background-color: white;">Currency</th>
                    <th class="text-center" style="vertical-align: middle; width: 425px; min-width: 425px; max-width: 425px; left: 320px; z-index: 10;position: sticky; background-color: white;">Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 250px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 425px; min-width: 425px; max-width: 425px; position: sticky; background-color: white; left: 320px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['remarks']; ?></td>
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
                                <th class="text-center" colspan="3" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                    {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++) 
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">Delivery To</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">Date of Delivery</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Remark</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i !== count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px;border-right:1px solid #e9ecef;width: 100px; min-width: 100px; max-width: 100px;">-</td>
                            <td style="padding: 8px;border-right:1px solid #e9ecef;width: 100px; min-width: 100px; max-width: 100px;">-</td>
                            <td style="padding: 8px;border-right:1px solid #e9ecef;width: 250px; min-width: 250px; max-width: 250px;">{{ $dataHeaderTransactionHistory[$i]['content']['remarks'] }}</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>