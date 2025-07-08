<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT CODE</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NOTE</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; $grand_total = 0; ?>
                <?php foreach ($dataDetails as $dataDetail) { ?>
                <?php $grand_total += $dataDetail['quantity'] ?? 0;  ?>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $no++; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productCode'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productName'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['quantityUnitName'] ?? '-'; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['quantity'] ?? 0; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['note'] ?? '-'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>

            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="4">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format($grand_total, 2); ?>
                        </span>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>