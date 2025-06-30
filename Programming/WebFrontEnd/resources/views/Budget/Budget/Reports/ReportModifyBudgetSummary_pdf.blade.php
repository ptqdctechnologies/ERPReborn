<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>ERP Reborn</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="card-body table-responsive p-0">
        <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Modify Budget Summary Report</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

        <!-- HEADER -->
        <table style="margin: 30px 0px 10px 1px;">
            <tr>
                <!-- Budget -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="width: 5px; font-size: 12px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px; font-size: 12px;">
                                    <?= $dataReport['dataHeader']['budget'] . " - " . $dataReport['dataHeader']['budget_name']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <!-- Sub Budget -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Sub Budget
                                </div>
                            </td>
                            <td style="width: 5px; font-size: 12px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px; font-size: 12px;">
                                    <?= $dataReport['dataHeader']['sub_budget'] . " - " . $dataReport['dataHeader']['sub_budget_name']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- DETAIL -->
        <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%; margin-top: 10px;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Transaction Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Date
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Total (+/-)
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        PIC
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 4px 0px;">
                        Status Approval
                    </div>
                </td>
            </tr>

            <?php $counter = 1; ?>
            <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                <tr>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $counter++; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $dataDetail['documentNumber']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= date('d-m-Y', strtotime($dataDetail['date'])); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['total'], 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $dataDetail['pic']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px; text-transform: capitalize;">
                            <?= $dataDetail['status']; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td colspan="3" style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">Grand Total</div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['total'], 2, '.', ','); ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>