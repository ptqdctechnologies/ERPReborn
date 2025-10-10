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
                                <th class="text-center" colspan="2" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br />( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th style="vertical-align: middle; width: 125px; min-width: 125px; max-width: 125px; left: 0px; z-index: 10;position: sticky; background-color: white;" class="text-center">Currency</th>
                    <th style="vertical-align: middle; width: 200px; min-width: 200px; max-width: 200px; left: 125px; z-index: 10;position: sticky; background-Barang Rusakcolor: white;" class="text-center">Remark</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white; left: 0px; z-index: 10;">-</td>
                            <td style="padding: 8px; width: 200px; min-width: 200px; max-width: 200px; position: sticky; background-color: white; left: 200px; z-index: 10;"><?= $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['remarks']; ?></td>
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
                                <th class="text-center" colspan="1" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                    {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++) 
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;width: 125px; min-width: 125px; max-width: 125px;">Remark</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i !== count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['remarks'] ?? '-' }}</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>