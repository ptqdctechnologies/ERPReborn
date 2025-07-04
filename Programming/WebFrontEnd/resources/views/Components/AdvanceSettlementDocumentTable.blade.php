<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">No</th>
                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Product Code</th>
                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Product Name</th>
                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">UOM</th>
                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Currency</th>
                    <th colspan="4" rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Request</th>
                    <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Settlement</th>
                    <th rowspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white; padding-right: 0px;">Balance</th>
                </tr>
                <tr>
                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">
                        Expense Claim
                    </th>
                    <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">
                        Amount To The Company
                    </th>
                </tr>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Qty</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Price</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Total</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Balance</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Qty</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Price</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Total</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Qty</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Price</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center; vertical-align: middle;background-color:#4B586A;color: white;">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 0; $grandTotalRequest = 0; $grandTotalExpense = 0; $grandTotalCompany = 0; ?>
                <?php foreach ($dataDetails as $dataDetail) { ?>
                    <?php $no++;  ?>
                    <?php $requestTotal = $dataDetail['quantity'] * $dataDetail['productUnitPriceCurrencyValue'];  ?>
                    <?php $expenseTotal = $dataDetail['expenseQuantity'] * $dataDetail['expenseProductUnitPriceCurrencyValue'];  ?>
                    <?php $companyTotal = $dataDetail['refundQuantity'] * $dataDetail['refundProductUnitPriceCurrencyValue'];  ?>
                    <?php $balanceSettlement = ($requestTotal - $expenseTotal) + $companyTotal;  ?>
                    <?php $grandTotalRequest += $requestTotal ?? 0;  ?>
                    <?php $grandTotalExpense += $expenseTotal ?? 0;  ?>
                    <?php $grandTotalCompany += $companyTotal ?? 0;  ?>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $no; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productCode'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productName'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['quantityUnitName'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['currency'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['quantity'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['productUnitPriceCurrencyValue'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($requestTotal ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['balance'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['expenseQuantity'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['expenseProductUnitPriceCurrencyValue'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($expenseTotal ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['refundQuantity'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($dataDetail['refundProductUnitPriceCurrencyValue'] ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($companyTotal ?? 0, 2); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format($balanceSettlement ?? 0, 2); ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">
                        GRAND TOTAL
                    </th>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format($grandTotalRequest, 2); ?>
                        </span>
                    </td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format($grandTotalExpense, 2); ?>
                        </span>
                    </td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format($grandTotalCompany, 2); ?>
                        </span>
                    </td>
                    <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>