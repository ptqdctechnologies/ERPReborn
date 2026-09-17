<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NO</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        CODE</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NAME</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        UNIT</th>
                    <?php if ($dataHeader['type'] == "ALL") { ?>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        WAREHOUSE</th>
                    <?php } ?>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        GOOD</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        REJECT</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        TOTAL</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        STATUS</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        OWNER</th>
                    <th
                        style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">
                        NOTE</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;text-align:center;">
                        1
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        2000219
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        Site Preparation
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        m2
                    </td>
                    <?php if ($dataHeader['type'] == "ALL") { ?>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        WH-MAPG - Head Office - Gudang Mampang
                    </td>
                    <?php } ?>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        30.00
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        20.00
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        50.00
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        -
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        -
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        -
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #4B586A;color:#4B586A;"
                        colspan="<?= $dataHeader['type'] == "ALL" ? '5' : '4'; ?>">
                        GRAND TOTAL
                    </th>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        30.00
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        20.00
                    </td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">
                        50.00
                    </td>
                    <td colspan="3" style="border:1px solid #4B586A;color:#4B586A;"></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>