<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <?php if ($dataHeader['type']['text'] == "Stock Movement") { ?>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT CODE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY STOK</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY REQ</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NOTE</th>
                    </tr>
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    <tr>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">NO</th>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">SUB BUDGET</th>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">PRODUCT CODE</th>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">PRODUCT NAME</th>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">UOM</th>
                        <th colspan="4" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET</th>
                        <th colspan="3" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">STOK</th>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">QTY REQ</th>
                        <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;vertical-align: middle;">NOTE</th>
                    </tr>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY AVAIL</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRICE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRICE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">TOTAL</th>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT CODE</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY AVAIL</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY REQ</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NOTE</th>
                    </tr>
                <?php } ?>
            </thead>

            <tbody>
                <?php $no = 1; $grand_total = 0; ?>
                <?php if ($dataHeader['type']['text'] == "Stock Movement") { ?>
                    <?php foreach ($dataDetails as $dataDetail) { ?>
                    <?php $grand_total += $dataDetail['qtyReq'];  ?>
                        <tr>
                            <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;"><?= $no++; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productCode'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productName'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['quantityUnitName'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['qtyReq'] ?? 0; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['notes']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    <?php foreach ($dataDetails as $dataDetail) { ?>
                    <?php $grand_total += $dataDetail['qtyReq'];  ?>
                        <tr>
                            <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;"><?= $no++; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productCode'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productName'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['quantityUnitName'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['qtyReq'] ?? 0; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['notes']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <?php foreach ($dataDetails as $dataDetail) { ?>
                    <?php $grand_total += $dataDetail['qtyReq'];  ?>
                        <tr>
                            <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;"><?= $no++; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productCode'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['productName'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['quantityUnitName'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['qtyAvail'] ?? '-'; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['qtyReq'] ?? 0; ?></td>
                            <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['notes']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>

                
            </tbody>

            <tfoot>
                <?php if ($dataHeader['type']['text'] == "Stock Movement" || $dataHeader['type']['text'] == "Purchase Order") { ?>
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
                    </tr>
                <?php } else if ($dataHeader['type']['text'] == "Internal Use") { ?>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">
                            GRAND TOTAL
                        </th>
                        <td style="border:1px solid #4B586A;color:#4B586A;">
                            <span id="GrandTotal">
                                <?php number_format($grand_total, 2); ?>
                            </span>
                        </td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                    </tr>
                <?php } ?>
            </tfoot>
        </table>
    </div>
</div>