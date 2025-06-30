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
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Modify Budget Detail Report</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

        <!-- HEADER -->
        <table style="margin: 30px 0px 15px 1px; font-size: 12px;">
            <tr>
                <!-- MODIFY NUMBER -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-weight: bold; line-height: 14px;">
                                    Modify Number
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['modifyNumber']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- DATE -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-weight: bold; line-height: 14px;">
                                    Date
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['date']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- BUDGET -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['budget_code'] . " - " . $dataReport['dataHeader']['budget_name']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- PIC -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-weight: bold; line-height: 14px;">
                                    PIC
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['PIC']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- SUB BUDGET -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-weight: bold; line-height: 14px;">
                                    Sub Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['sub_budget_code'] . " - " . $dataReport['dataHeader']['sub_budget_name']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- DETAIL -->
        <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%; font-size: 12px;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Product Code
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Product Name
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Origin
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Previous
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Qty(+/-)
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Add(subt)
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total(+/-)
                    </div>
                </td>
            </tr>

            <?php $counter = 1; ?>
            <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                <tr>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $counter++; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['productCode']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['productName']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= number_format($dataDetail['origin'], 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= number_format($dataDetail['previous'], 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= number_format($dataDetail['qty'], 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= number_format($dataDetail['addSubt'], 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= number_format($dataDetail['total'], 2, '.', ','); ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td colspan="7" style="height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;">Total</div>
                </td>
                <td style="height: 20px;">
                    <div style="font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['total'], 2, '.', ','); ?></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>