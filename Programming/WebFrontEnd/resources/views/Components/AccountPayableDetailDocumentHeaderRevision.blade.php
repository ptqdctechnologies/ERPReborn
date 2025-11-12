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
                                <th class="text-center" colspan="9" style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky;background: #FFF;">
                                    Rev {{ $i }} (Actual) - {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }} <br /> ( {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">Supp. Inv.</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">Payment To</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">Rept./ Inv.</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">Cont. Sign.</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">VAT</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">VAT (%)</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">VAT Num.</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">FAT/PAT</th>
                    <th style="vertical-align: middle; position: sticky; background-color: white;" class="text-center">Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i === count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px; width: 100px; min-width: 100px; max-width: 100px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['supplierInvoiceNumber'] }}</td>
                            <td style="padding: 8px; width: 100px; min-width: 100px; max-width: 100px; position: sticky; background-color: white;">-</td>
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['receiptStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['contractStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['vatStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['vatValue'] }}</td>
                            <td style="padding: 8px; width: 100px; min-width: 100px; max-width: 100px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['vatNumber'] }}</td>
                            <td style="padding: 8px; width: 50px; min-width: 50px; max-width: 50px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['fatPatDoStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px; width: 125px; min-width: 125px; max-width: 125px; position: sticky; background-color: white;">{{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['remarks'] }}</td>
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
                                <th class="text-center" colspan="9" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;line-height: normal;vertical-align: middle; min-width: 320px;">
                                    {{ !empty($editDateTime) ? 'Rev ' . $i : 'Original' }} - {{ $dataHeaderTransactionHistory[$i]['submitterWorkerName'] }} <br /> ( {{ !empty($editDateTime) ? date('Y-m-d', strtotime($editDateTime)) . " " . date('H:i', strtotime($editDateTime)) : date('Y-m-d', strtotime($entryDateTime)) . " " . date('H:i', strtotime($entryDateTime)) }} )
                                </th>
                            @endif
                        @endfor
                    @endif
                </tr>
                <tr>
                    @for($i = 1; $i < count($dataHeaderTransactionHistory); $i++)
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Supp. Inv.</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Payment To</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Rept./ <br /> Inv.</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Cont. Sign.</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">FAT/PAT</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">VAT</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">VAT (%)</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">VAT Num.</th>
                        <th class="text-center" style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;">Notes</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                <tr>
                    @for($i = count($dataHeaderTransactionHistory) - 1; $i >= 0; $i--)
                        @if ($i !== count($dataHeaderTransactionHistory) - 1)
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['supplierInvoiceNumber'] }}</td>
                            <td style="padding: 8px;width: 130px; min-width: 130px; max-width: 130px;">-</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['receiptStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['contractStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['vatStatus'] == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['vatValue'] }}</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['vatNumber'] }}</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['fatPatDoStatus']  == "0" ? "No" : "Yes" }}</td>
                            <td style="padding: 8px;width: 125px; min-width: 125px; max-width: 125px;">{{ $dataHeaderTransactionHistory[$i]['content']['remarks'] }}</td>
                        @endif
                    @endfor
                </tr>
            </tbody>
        </table>
    </div>
</div>