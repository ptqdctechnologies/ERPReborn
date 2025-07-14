<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT CODE</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT NAME</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">UOM</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY STOK</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">QTY REQ</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NOTE</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;">1</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">MAT-101</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Besi Hollow 4x4</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Batang</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(500, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(120, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                </tr>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;">2</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">MAT-202</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Cat Tembok Putih 5L</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Kaleng</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(300, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(60, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                </tr>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;">3</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">TOOL-010</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Bor Listrik Makita</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Unit</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(50, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(10, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                </tr>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;">4</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">SFTY-301</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Helm Proyek K3</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Pcs</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(200, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(50, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                </tr>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align: center;">5</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">ELEC-220</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Kabel NYY 2x1.5mm</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Roll</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(150, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"><?= number_format(30, 2); ?></td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">-</td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="5">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            <?= number_format(270, 2); ?>
                        </span>
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>