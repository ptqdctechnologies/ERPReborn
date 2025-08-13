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
                                <th class="text-center" colspan="5" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky;background-color: white;" class="text-center">Requester</th>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10;position: sticky;background-color: white;" class="text-center">Beneficiary</th>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 250px; z-index: 10;position: sticky;background-color: white;" class="text-center">Bank Name</th>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 375px; z-index: 10;position: sticky;background-color: white;" class="text-center">Bank Account</th>
                    <th style="vertical-align: middle; width: 150px; min-width: 150px; max-width: 150px; left: 500px; z-index: 10;position: sticky;background-color: white;" class="text-center">Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['requesterWorkerName'] }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['beneficiaryWorkerName'] }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['requesterWorkerName'] }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 375px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['beneficiaryWorkerName'] }}</td>
                            <td style="padding: 8px; width: 150px; min-width: 150px; max-width: 150px; position: sticky; background-color: white; left: 500px; z-index: 10;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['remarks'] }}</td>
                        @endif
                    @endfor
                </tr>
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
                                <th class="text-center" colspan="5" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                    {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++) 
                        <th class="text-center" style="width: 125px; min-width: 125px; max-width: 125px;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Requester</th>
                        <th class="text-center" style="width: 125px; min-width: 125px; max-width: 125px;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Beneficiary</th>
                        <th class="text-center" style="width: 125px; min-width: 125px; max-width: 125px;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">Bank Name</th>
                        <th class="text-center" style="width: 125px; min-width: 125px; max-width: 125px;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">Bank Account</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 250px; min-width: 250px; max-width: 250px;">Remark</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i !== count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px;">{{ $dataHeaderTransactionHistory[$i]['requesterWorkerName'] }}</td>
                            <td style="padding: 8px;">{{ $dataHeaderTransactionHistory[$i]['beneficiaryWorkerName'] }}</td>
                            <td style="padding: 8px;">{{ $dataHeaderTransactionHistory[$i]['requesterWorkerName'] }}</td>
                            <td style="padding: 8px;">{{ $dataHeaderTransactionHistory[$i]['beneficiaryWorkerName'] }}</td>
                            <td style="padding: 8px;">{{ $dataHeaderTransactionHistory[$i]['content']['remarks'] }}</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>