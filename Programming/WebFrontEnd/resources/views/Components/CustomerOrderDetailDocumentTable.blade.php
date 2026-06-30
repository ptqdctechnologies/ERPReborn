<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <?php if ($dataHeader['type'] == 'Sub Budget Base') { ?>
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
                <?php if ($dataHeader['type'] == 'Sub Budget Base') { ?>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">1</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">256 - XL Center Banda Aceh</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">39,582,195.69</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Project Apartemen Gambir</td>
                </tr>
                <?php } else { ?>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">1</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">256 - XL Center Banda Aceh</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">8234 - Plafon</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">1002254 - Splitter 3way Pacific Wave</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">btg</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">39</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">40,325.39</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">1,572,690.21</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">Project Apartemen Gambir</td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"
                        colspan="<?= $dataHeader['type'] == 'Sub Budget Base' ? '2' : '7'; ?>">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        <span id="GrandTotal">
                            39,582,195.69
                        </span>
                    </td>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>