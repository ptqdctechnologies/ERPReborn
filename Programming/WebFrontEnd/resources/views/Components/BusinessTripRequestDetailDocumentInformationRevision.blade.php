<div class="wrapper-budget table-height">
    <table class="table table-striped table-hover table-sticky table-sm">
        <thead>
            <tr>
                @if(sizeof($dataHeaderTransactionHistory))
                    @for($i = 2; $i >= 1; $i--)
                                <?php        $entryDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Entry_DateTimeTZ'];
                        $editDateTime = $dataHeaderTransactionHistory[$i]['content']['sys_Data_Edit_DateTimeTZ']; ?>

                                @if ($i === count($dataHeaderTransactionHistory) - 1)
                                    <th style="vertical-align: middle;left: 0px;z-index: 10;line-height: normal;position: sticky; background-color: white;"
                                        class="text-center">
                                        Rev {{ $i }} (Actual) -
                                        {{ $dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['submitterWorkerName'] }}
                                        <br /> (
                                        {{ date('Y-m-d', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }}
                                        {{ date('H:i', strtotime($dataHeaderTransactionHistory[count($dataHeaderTransactionHistory) - 1]['content']['sys_Data_Edit_DateTimeTZ'])) }}
                                        )
                                    </th>
                                @else
                                    <th
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
                        Payment Instruction
                    </th>

                    @for($i = 1; $i < 2; $i++)
                        <th class="text-center"
                            style="background-color:#4B586A;color:white;border-right:1px solid #e9ecef;vertical-align: middle;text-wrap-mode: nowrap;">
                            Payment Instruction
                        </th>
                    @endfor
                </tr>
            @endif
        </thead>
        <tbody>
            <tr style="height: 40px;">
                <td class="bg-white">
                    <!-- DIRECT TO VENDOR -->
                    <div class="row ml-0" style="margin-bottom: 1rem;">
                        <div class="col-sm-4 col-md-5 p-0 text-bold">
                            Direct to Vendor
                        </div>
                        <div class="col-sm-8 col-md-7 p-0">
                            : 555,000.00 to BCA 2173050101 a.n. PT QDC TECHNOLOGIES
                        </div>
                    </div>

                    <!-- BY CORP CARD -->
                    <div class="row ml-0" style="margin-bottom: 1rem;">
                        <div class="col-sm-4 col-md-5 p-0 text-bold">
                            By Corp Card
                        </div>
                        <div class="col-sm-8 col-md-7 p-0">
                            : 1,295,000.00 to BRI 4173050102 a.n. CITILINK
                        </div>
                    </div>

                    <!-- TO OTHER -->
                    <div class="row ml-0">
                        <div class="col-sm-4 col-md-5 p-0 text-bold">
                            To Other
                        </div>
                        <div class="col-sm-8 col-md-7 p-0">
                            : -
                        </div>
                    </div>
                </td>
                <td class="bg-white">
                    <!-- DIRECT TO VENDOR -->
                    <div class="row ml-0" style="margin-bottom: 1rem;">
                        <div class="col-sm-4 col-md-5 p-0 text-bold">
                            Direct to Vendor
                        </div>
                        <div class="col-sm-8 col-md-7 p-0">
                            : 555,000.00 to BCA 2173050101 a.n. PT QDC TECHNOLOGIES
                        </div>
                    </div>

                    <!-- BY CORP CARD -->
                    <div class="row ml-0" style="margin-bottom: 1rem;">
                        <div class="col-sm-4 col-md-5 p-0 text-bold">
                            By Corp Card
                        </div>
                        <div class="col-sm-8 col-md-7 p-0">
                            : 1,295,000.00 to BRI 4173050102 a.n. CITILINK
                        </div>
                    </div>

                    <!-- TO OTHER -->
                    <div class="row ml-0">
                        <div class="col-sm-4 col-md-5 p-0 text-bold">
                            To Other
                        </div>
                        <div class="col-sm-8 col-md-7 p-0">
                            : -
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>