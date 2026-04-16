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
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Credit Note Summary</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

        <!-- HEADER -->
        <table style="margin: 30px 0px 15px 1px;">
            <tr>
                <!-- BUDGET -->
                <td style="width: 300px;">
                    <table>
                        <tr>
                            <td style="width: 75px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="font-size: 12px; width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; line-height: 14px;">
                                    <?= $budgetName; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- SUB BUDGET -->
                <td style="width: 300px;">
                    <table>
                        <tr>
                            <td style="width: 75px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Sub Budget
                                </div>
                            </td>
                            <td style="font-size: 12px; width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; line-height: 14px;">
                                    <?= $subBudgetName ?? '-'; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- CUSTOMER -->
                <td style="width: 300px;">
                    <table>
                        <tr>
                            <td style="width: 75px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Customer
                                </div>
                            </td>
                            <td style="font-size: 12px; width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; line-height: 14px;">
                                    <?= $customerName ?? '-'; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- DATE -->
                <td style="width: 300px;">
                    <table>
                        <tr>
                            <td style="width: 50px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Date
                                </div>
                            </td>
                            <td style="font-size: 12px; width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; line-height: 14px;">
                                    <?= $cnDate ?? '-'; ?>
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
                <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                    <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            No
                        </div>
                    </td>
                    <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            CN Number
                        </div>
                    </td>
                    <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Budget
                        </div>
                    </td>
                    <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Sub Budget
                        </div>
                    </td>
                    <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Date
                        </div>
                    </td>
                    <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Customer
                        </div>
                    </td>
                    <td colspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px; text-align: center;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            CN IDR
                        </div>
                    </td>
                    <td colspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px; text-align: center;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            CN Other Currency
                        </div>
                    </td>
                    <td colspan="2" style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px; text-align: center;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            CN Equivalent IDR
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Total
                        </div>
                    </td>
                    <td style="border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            VAT
                        </div>
                    </td>
                    <td style="border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Total
                        </div>
                    </td>
                    <td style="border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            VAT
                        </div>
                    </td>
                    <td style="border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            Total
                        </div>
                    </td>
                    <td style="border-bottom: 1px dotted black; height: 20px;">
                        <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                            VAT
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $counter                        = 1;
                    $grandTotalIdrCN                = 0;
                    $grandVatIdrCN                  = 0;
                    $grandTotalIdrCNOtherCurrency   = 0;
                    $grandVatIdrCNOtherCurrency     = 0;
                    $grandTotalIdrCNEquivalentIDR   = 0;
                    $grandVatIdrCNEquivalentIDR     = 0;
                ?>
                <?php foreach ($dataCN as $dataDetail) { ?>
                    <?php $grandTotalIdrCN              += $dataDetail['CN_Total_IDR'] ?? 0; ?>
                    <?php $grandVatIdrCN                += $dataDetail['CN_Tax_IDR'] ?? 0; ?>
                    <?php $grandTotalIdrCNOtherCurrency += $dataDetail['CN_Total_Other_Currency'] ?? 0; ?>
                    <?php $grandVatIdrCNOtherCurrency   += $dataDetail['CN_Tax_OtherCurrency'] ?? 0; ?>
                    <?php $grandTotalIdrCNEquivalentIDR += $dataDetail['CN_Total_Equivalent_IDR'] ?? 0; ?>
                    <?php $grandVatIdrCNEquivalentIDR   += $dataDetail['CN_Tax_Equivalent'] ?? 0; ?>

                    <tr>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $counter++; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $dataDetail['CN_Number'] ?? '-'; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $dataDetail['combinedBudgetCode'] ?? ''; ?> - <?= $dataDetail['combinedBudgetName'] ?? ''; ?> 
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $dataDetail['combinedBudgetSectionCode'] ?? ''; ?> - <?= $dataDetail['combinedBudgetSectionName'] ?? ''; ?> 
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $dataDetail['date'] ?? '-'; ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= $dataDetail['customerCode'] ?? ''; ?> - <?= $dataDetail['customerName'] ?? ''; ?> 
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($dataDetail['CN_Total_IDR'] ?? 0, 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($dataDetail['CN_Tax_IDR'] ?? 0, 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($dataDetail['CN_Total_Other_Currency'] ?? 0, 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($dataDetail['CN_Tax_OtherCurrency'] ?? 0, 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($dataDetail['CN_Total_Equivalent_IDR'] ?? 0, 2); ?>
                            </div>
                        </td>
                        <td>
                            <div style="margin-top: 4px; font-size: 12px;">
                                <?= number_format($dataDetail['CN_Tax_Equivalent'] ?? 0, 2); ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td colspan="6" style="height: 20px; text-align: left;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalIdrCN, 2); ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandVatIdrCN, 2); ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalIdrCNOtherCurrency, 2); ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandVatIdrCNOtherCurrency, 2); ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalIdrCNEquivalentIDR, 2); ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandVatIdrCNEquivalentIDR, 2); ?></div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>