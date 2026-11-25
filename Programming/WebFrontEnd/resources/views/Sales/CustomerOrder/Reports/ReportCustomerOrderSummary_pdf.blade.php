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
                                    <?= $budget; ?>
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
                                    <?= $coDate; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- DETAIL -->
        <?php
            $counter = 1;
            $total = 0;
            $totalVAT = 0;
            $totalWithVAT = 0;
        ?>
        <table style="margin-left: 1px; width: 100%;">
            <thead>
                <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                    <?php
                        $headers = [
                            'No',
                            'CO Number',
                            'Budget',
                            'Date',
                            'Total',
                            'VAT',
                            'Total VAT',
                            'Total With VAT',
                            'Notes'
                        ];

                        foreach ($headers as $header) {
                    ?>
                        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                                <?= $header; ?>
                            </div>
                        </td>
                    <?php } ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dataCustomerOrder as $dataDetail) { ?>
                    <?php
                        $value = (float) ($dataDetail['value'] ?? 0);
                        $valueRatio = (float) ($dataDetail['vatRatio'] ?? 0);

                        $resultTotalVAT = ($value * $valueRatio) / 100;
                        $resultTotalWithVAT = $value + $resultTotalVAT;

                        $total += $value;
                        $totalVAT += $resultTotalVAT;
                        $totalWithVAT += $resultTotalWithVAT;
                    ?>
                    <tr>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $counter++; ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= htmlspecialchars($dataDetail['customerOrderNumber'] ?? '-'); ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= htmlspecialchars($dataDetail['combinedBudgetCode'] ?? ''); ?>
                                -
                                <?= htmlspecialchars($dataDetail['combinedBudgetName'] ?? ''); ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= htmlspecialchars($dataDetail['date'] ?? '-'); ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($value, 2, '.', ','); ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($valueRatio, 2, '.', ','); ?>%
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($resultTotalVAT, 2, '.', ','); ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($resultTotalWithVAT, 2, '.', ','); ?>
                            </div>
                        </td>

                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= htmlspecialchars($dataDetail['notes'] ?? '-'); ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

            <tfoot>
                <tr style="border-top: 1px solid black;">
                    <td colspan="4" style="height: 20px; text-align: left;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            GRAND TOTAL
                        </div>
                    </td>

                    <td style="height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            <?= number_format($total, 2, '.', ','); ?>
                        </div>
                    </td>

                    <td></td>

                    <td style="height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            <?= number_format($totalVAT, 2, '.', ','); ?>
                        </div>
                    </td>

                    <td style="height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            <?= number_format($totalWithVAT, 2, '.', ','); ?>
                        </div>
                    </td>

                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>