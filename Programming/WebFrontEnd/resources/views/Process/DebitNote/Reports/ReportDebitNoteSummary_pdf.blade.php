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
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Debit Note Summary</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>
    </div>
    
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
                                <?= $customerName; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
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
                                <?= $subBudgetName; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>

            <!-- DATE -->
            <td style="width: 300px;">
                <table>
                    <tr>
                        <td style="width: 75px; height: 20px;">
                            <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                Date
                            </div>
                        </td>
                        <td style="font-size: 12px; width: 5px;">
                            :
                        </td>
                        <td style="height: 20px;">
                            <div style="font-size: 12px; line-height: 14px;">
                                <?= $dnDate; ?>
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
                <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        DN Number
                    </div>
                </td>
                <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Budget
                    </div>
                </td>
                <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Sub Budget
                    </div>
                </td>
                <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Date
                    </div>
                </td>
                <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Customer
                    </div>
                </td>
                <td colspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        DN IDR
                    </div>
                </td>
                <td colspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        DN Other Currency
                    </div>
                </td>
                <td colspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px solid black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        DN Equivalent IDR
                    </div>
                </td>
            </tr>
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="width: 20px; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total
                    </div>
                </td>
                <td style="width: 20px; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        VAT
                    </div>
                </td>
                <td style="width: 20px; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total
                    </div>
                </td>
                <td style="width: 20px; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        VAT
                    </div>
                </td>
                <td style="width: 20px; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Total
                    </div>
                </td>
                <td style="width: 20px; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        VAT
                    </div>
                </td>
            </tr>
        </thead>
        <tbody>
            <?php 
                $counter                    = 1;
                $grandTotalIDR              = 0;
                $grandVatIDR                = 0;
                $grandTotalOtherCurrency    = 0;
                $grandVatOtherCurrency      = 0;
                $grandTotalEquivalentIDR    = 0;
                $grandVatEquivalentIDR      = 0;
            ?>
            <?php foreach ($dataDN as $dataDetail) { ?>
                <?php $grandTotalIDR            += $dataDetail['DN_Total_IDR'] ?? 0; ?>
                <?php $grandVatIDR              += $dataDetail['DN_Tax_IDR'] ?? 0; ?>
                <?php $grandTotalOtherCurrency  += $dataDetail['DN_Total_Other_Currency'] ?? 0; ?>
                <?php $grandVatOtherCurrency    += $dataDetail['DN_Tax_OtherCurrency'] ?? 0; ?>
                <?php $grandTotalEquivalentIDR  += $dataDetail['DN_Total_Equivalent_IDR'] ?? 0; ?>
                <?php $grandVatEquivalentIDR    += $dataDetail['DN_Tax_Equivalent'] ?? 0; ?>

                <tr>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $counter++; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= $dataDetail['DN_Number'] ?? '-'; ?>
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
                            <?= $dataDetail['supplierCode'] ?? ''; ?> - <?= $dataDetail['supplierName'] ?? ''; ?> 
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['DN_Total_IDR'] ?? 0, 2); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['DN_Tax_IDR'] ?? 0, 2); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['DN_Total_Other_Currency'] ?? 0, 2); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['DN_Tax_OtherCurrency'] ?? 0, 2); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['DN_Total_Equivalent_IDR'] ?? 0, 2); ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px; font-size: 12px;">
                            <?= number_format($dataDetail['DN_Tax_Equivalent'] ?? 0, 2); ?>
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
                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalIDR, 2); ?></div>
            </td>
            <td style="height: 20px;">
                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandVatIDR, 2); ?></div>
            </td>
            <td style="height: 20px;">
                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalOtherCurrency, 2); ?></div>
            </td>
            <td style="height: 20px;">
                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandVatOtherCurrency, 2); ?></div>
            </td>
            <td style="height: 20px;">
                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalEquivalentIDR, 2); ?></div>
            </td>
            <td style="height: 20px;">
                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandVatEquivalentIDR, 2); ?></div>
            </td>
        </tr>
    </table>
</body>

</html>