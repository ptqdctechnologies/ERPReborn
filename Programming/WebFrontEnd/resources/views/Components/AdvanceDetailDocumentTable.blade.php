<div class="table-responsive">
    <table class="table table-head-fixed text-nowrap mb-0">
        <thead>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT ID</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UNIT PRICE</th>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1; $grand_total = 0; ?>
            <?php foreach ($dataHeader as $dataDetail) { ?>
                <?php $grand_total += $dataDetail['PriceBaseCurrencyValue'];  ?>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $no++; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['Product_RefID']; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['ProductName']; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['Quantity']; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['QuantityUnitName']; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['ProductUnitPriceBaseCurrencyValue']; ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['PriceBaseCurrencyValue']; ?></td>
                </tr>
            <?php } ?>
        </tbody>

        <tfoot>
            <tr>
                <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">
                    GRAND TOTAL
                </th>
                <td style="border:1px solid #4B586A;color:#4B586A;">
                    <span id="GrandTotal">
                        <?= number_format($grand_total, 2, '.', ''); ?>
                    </span>
                </td>
            </tr>
        </tfoot>
    </table>
</div>