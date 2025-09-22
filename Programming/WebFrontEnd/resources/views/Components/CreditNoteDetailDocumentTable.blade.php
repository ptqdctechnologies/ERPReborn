<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">INVOICE</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">SUB BUDGET</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRICE</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN VALUE</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">CN TAX</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">COA</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; $grand_total = 0; ?>
                <?php foreach ($dataDetails as $dataDetail) { ?>
                <?php $grand_total += ($dataDetail['Quantity'] * $dataDetail['ProductUnitPriceCurrencyValue']);  ?>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;">-</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['CombinedBudgetCode'] ?? ''; ?> - <?= $dataDetail['CombinedBudgetName'] ?? ''; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['CombinedBudgetSectionCode'] ?? ''; ?> - <?= $dataDetail['CombinedBudgetSectionName'] ?? ''; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['Quantity'], 2, '.', ',') ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['ProductUnitPriceCurrencyValue'], 2, '.', ',') ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['Quantity'] * $dataDetail['ProductUnitPriceCurrencyValue'], 2, '.', ',') ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['COA_Code']; ?> - <?= $dataDetail['COA_Name']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format($grand_total, 2); ?>
                        </span>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>