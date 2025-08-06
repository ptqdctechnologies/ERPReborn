<div class="col" style="max-height: 135px;overflow-y: scroll;">
    <?php foreach ($dataWorkFlows as $dataWorkFlow) { ?>
        <?php $comment = $dataWorkFlow['remarks'] == "undefined" || !$dataWorkFlow['remarks'] ? '-' : $dataWorkFlow['remarks']; ?>
        <ul style="padding: 0 1rem;">
            <li>
                <div style="margin-bottom: .5rem;">
                    <span style="text-transform:uppercase;font-weight:bold;">
                        <?= $dataWorkFlow['workFlowPathActionName'] == "Rejection To Resubmit" ? "Reject" : $dataWorkFlow['workFlowPathActionName']; ?>
                    </span>
                    <?= date('D, m/d/Y H:i:s', strtotime($dataWorkFlow['approvalDateTimeTZ'])) ?> : <?= $dataWorkFlow['approverEntityName']; ?> (<?= $dataWorkFlow['approverEntityFullJobPositionTitle']; ?>)
                </div>
                <div>
                    Comment : <?= nl2br(e($comment)); ?>
                </div>
            </li>
        </ul>
    <?php } ?>
</div>