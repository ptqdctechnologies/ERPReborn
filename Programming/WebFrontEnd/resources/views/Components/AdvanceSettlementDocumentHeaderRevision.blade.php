<div class="wrapper-budget card-body table-responsive p-0 table-height">
    <table class="table table-striped table-hover table-sticky table-sm">
        <thead>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--) 
                        <?php $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ']; $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <th colspan="6" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal; position: sticky; background-color: white;" class="text-center">
                                Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                            </th>
                        @else
                            <th style="text-align: center;background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle;">
                                {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                            </th>
                        @endif
                    @endfor
                @endif
            </tr>
            @if(sizeof($dataHeaderTransactionHistory))
                <tr>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10; position: sticky; background-color: white;" class="text-center">Requester</th>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 125px; z-index: 10; position: sticky; background-color: white;" class="text-center">Beneficiary</th>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 250px; z-index: 10; position: sticky; background-color: white;" class="text-center">Bank Name</th>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 375px; z-index: 10; position: sticky; background-color: white;" class="text-center">Bank Account</th>
                    <th style="vertical-align: middle; width: 70px; min-width: 70px; max-width: 70px; left: 500px; z-index: 10; position: sticky; background-color: white;" class="text-center">Currency</th>
                    <th style="vertical-align: middle; width: 250px; min-width: 250px; max-width: 250px; left: 570px; z-index: 10; position: sticky; background-color: white;" class="text-center">Remark</th>

                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++) 
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 250px; min-width: 250px; max-width: 250px;">Remark</th>
                    @endfor
                </tr>
            @endif
        </thead>
        <tbody>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['requesterWorkerName']; ?></td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 125px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['beneficiaryWorkerName']; ?></td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 250px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['requesterWorkerName']; ?></td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 375px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['beneficiaryWorkerName']; ?></td>
                            <td style="padding: 8px; width: 70px; min-width: 70px; max-width: 70px; position: sticky; background-color: white; left: 500px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['beneficiaryWorkerName']; ?></td>
                            <td style="padding: 8px; width: 250px; min-width: 250px; max-width: 250px; position: sticky; background-color: white; left: 570px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['remarks']; ?></td>
                        @else
                            <td style="padding: 8px;">{{ $dataHeaderTransactionHistory[$i]['content']['remarks'] }}</td>
                        @endif
                    @endfor
                @endif
            </tr>
        </tbody>
    </table>
</div>