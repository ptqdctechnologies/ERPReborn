<div class="card-body p-0">
    <div class="table-responsive">
        <?php if ($dataHeader['type'] == 'Settlement') { ?>
            <table class="table table-head-fixed text-nowrap mb-0">
                <thead>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">SUB BUDGET</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">PRODUCT</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">COA</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">COA STATUS</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VALUE</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">1</td>
                        <td rowspan="2" style="border:1px solid #4B586A;color:#4B586A;">(Q000062) XL Microcell 2007</td>
                        <td rowspan="2" style="border:1px solid #4B586A;color:#4B586A;">240 - Cendana Andalas</td>
                        <td rowspan="2" style="border:1px solid #4B586A;color:#4B586A;">2000059 - PLN - Biaya Penyambungan</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">1-1102 - Bank</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">Debit</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">12,312,698.00</td>
                    </tr>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">2</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">1-1301 - Inventory</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">Credit</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">312,698.00</td>
                    </tr>
                </tbody>

                <!-- <tfoot>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">
                            GRAND TOTAL
                        </th>
                        <td style="border:1px solid #4B586A;color:#4B586A;">
                            <span id="GrandTotal">
                                -
                            </span>
                        </td>
                    </tr>
                </tfoot> -->
            </table>
        <?php } else { ?>
            <table class="table table-head-fixed text-nowrap mb-0">
                <thead>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">SUB BUDGET</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">COA</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">COA STATUS</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">VALUE</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">1</td>
                        <td rowspan="2" style="border:1px solid #4B586A;color:#4B586A;">(Q000062) XL Microcell 2007</td>
                        <td rowspan="2" style="border:1px solid #4B586A;color:#4B586A;">240 - Cendana Andalas</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">1-1102 - Bank</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">Debit</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">12,312,698.00</td>
                    </tr>
                </tbody>

                <!-- <tfoot>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;" colspan="6">
                            GRAND TOTAL
                        </th>
                        <td style="border:1px solid #4B586A;color:#4B586A;">
                            <span id="GrandTotal">
                                -
                            </span>
                        </td>
                    </tr>
                </tfoot> -->
            </table>
        <?php } ?>
    </div>
</div>