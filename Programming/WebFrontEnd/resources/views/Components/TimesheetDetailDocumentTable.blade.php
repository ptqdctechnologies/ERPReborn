<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-head-fixed text-nowrap mb-0">
            <thead>
                <tr>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">NO</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">START TIME</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">END TIME</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">BUDGET</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">SUB BUDGET</th>
                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">ACTIVITY</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                <?php foreach ($dataDetails as $dataDetail) { ?>
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $no++; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= date('Y-m-d', strtotime($dataDetail['startDateTimeTZ'])) . " " . date('H:i', strtotime($dataDetail['startDateTimeTZ'])); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= date('Y-m-d', strtotime($dataDetail['finishDateTimeTZ'])) . " " . date('H:i', strtotime($dataDetail['finishDateTimeTZ'])); ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['combinedBudgetCode_Detail']; ?> - <?= $dataDetail['combinedBudgetName_Detail']; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataDetail['combinedBudgetSectionCode_Detail']; ?> - <?= $dataDetail['combinedBudgetSectionName_Detail']; ?></td>
                        <td style="border:1px solid #4B586A;color:#4B586A;"><?= nl2br(e($dataDetail['activity'])); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>