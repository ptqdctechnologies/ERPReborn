<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">WHT (%)</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">COA</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; $grand_total = 0; ?>
                <?php foreach ($dataDetails as $dataDetail) { ?>
                    <?php $grand_total += number_format($dataDetail['quantity'] ?? 0, 2);  ?>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;"><?= $no++; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productCode'] ?? ''; ?> - <?= $dataDetail['productName'] ?? ''; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;"><?= $dataDetail['uOM'] ?? ''; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;"><?= $dataDetail['quantity'] ?? ''; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;"><?= $dataDetail['wHT'] ?? ''; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['chartOfAccountCode'] ?? ''; ?> - <?= $dataDetail['chartOfAccountName'] ?? ''; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="3">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">
                        <span id="GrandTotal">
                            <?= number_format($grand_total, 2); ?>
                        </span>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>