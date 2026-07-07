<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>ERP Reborn</title>
</head>

<body>
    <div class="card-body table-responsive p-0">
        <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Customer Order</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

        <!-- HEADER -->
        <table style="margin: 30px 0px 15px 1px;">
            <tr>
                <!-- BUDGET -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 50px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; line-height: 14px;">
                                    -
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- DATE RANGE -->
                <td style="width: 350px;">
                    <table>
                        <tr>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Date Range
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; line-height: 14px;">
                                    -
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- DETAIL -->
        <table style="margin-left: 1px; width: 100%;">
            <thead>
                <tr style=" border-top: 1px solid black; border-bottom: 1px dotted black;">
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            No
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            CO Number
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Date
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Total
                        </div>
                    </td>
                    <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Notes
                        </div>
                    </td>
                </tr>
            </thead>

            <tbody>
                <?php $counter = 1;
$total = 0; ?>
                <?php foreach ($dataCustomerOrder as $dataDetail) { ?>
                <?php    $total += $dataDetail['value']; ?>

                <tr>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $counter++; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            -
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $dataDetail['date'] ?? '-'; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['value'] ?? 0, 2, '.', ','); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $dataDetail['notes'] ?? '-'; ?>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td style="height: 20px; text-align: left;" colspan="3">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        <?= number_format($total, 2, '.', ','); ?>
                    </div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>