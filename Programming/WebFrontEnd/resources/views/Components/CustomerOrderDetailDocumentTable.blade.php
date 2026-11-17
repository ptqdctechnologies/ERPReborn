<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <?php if ($dataHeader['type'] == 'SUB_BUDGET_BASE') { ?>
                <tr>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NO</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        SUB BUDGET</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        VALUE</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NOTES</th>
                </tr>
                <?php } else { ?>
                <tr>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NO</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        SUB BUDGET</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        WORK ID</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        PRODUCT</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        UOM</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        QTY</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        PRICE</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        TOTAL</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NOTES</th>
                </tr>
                <?php } ?>
            </thead>
            <tbody>
                <?php $no = 1;
$grandTotal = 0; ?>
                <?php foreach ($dataDetails as $dataDetail) { ?>
                <?php    if ($dataHeader['type'] == 'SUB_BUDGET_BASE') { ?>
                <?php        $grandTotal += $dataDetail['Value'] ?? 0; ?>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;"><?= $no++; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['CombinedBudgetSectionCode'] ?? ''; ?> -
                        <?= $dataDetail['CombinedBudgetSectionName'] ?? ''; ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= number_format($dataDetail['Value'] ?? 0, 2); ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['Notes'] ?? ''; ?>
                    </td>
                </tr>
                <?php    } else { ?>
                <?php        $grandTotal += $dataDetail['Quantity'] * $dataDetail['ProductUnitPriceCurrencyValue']; ?>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;"><?= $no++; ?></td>
                    <td class="text-wrap" style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['CombinedBudgetSectionCode'] ?? ''; ?> -
                        <?= $dataDetail['CombinedBudgetSectionName'] ?? ''; ?>
                    </td>
                    <td class="text-wrap" style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['WorkCode'] ?? ''; ?> -
                        <?= $dataDetail['WorkName'] ?? ''; ?>
                    </td>
                    <td class="text-wrap" style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['ProductCode'] ?? ''; ?> -
                        <?= $dataDetail['ProductName'] ?? ''; ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['UomName'] ?? ''; ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= number_format($dataDetail['Quantity'] ?? 0, 2); ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= number_format($dataDetail['ProductUnitPriceCurrencyValue'] ?? 0, 2); ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= number_format(($dataDetail['Quantity'] * $dataDetail['ProductUnitPriceCurrencyValue']), 2); ?>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <?= $dataDetail['Notes'] ?? ''; ?>
                    </td>
                </tr>
                <?php    } ?>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"
                        colspan="<?= $dataHeader['type'] == 'SUB_BUDGET_BASE' ? '2' : '7'; ?>">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format($grandTotal, 2); ?>
                        </span>
                    </td>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>