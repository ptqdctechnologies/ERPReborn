<div class="col" style="max-height: 135px;overflow-y: scroll;">
    <?php foreach ($dataWorkFlows['itemList']['ungrouped'] as $workflow): ?>
        <?php
            $approval       = $workflow['entities']['currentApproval'] ?? [];
            $nextApproval   = $workflow['entities']['nextDefaultApproval'] ?? [];

            $actionMap = [
                'Rejection To Resubmit' => 'Reject',
                'Approval'              => 'Approved',
            ];

            $actionName = $actionMap[$approval['workFlowPathActionName'] ?? '']
                ?? ($approval['workFlowPathActionName'] ?? '-');

            $comment = $approval['remarks'] ?? '-';

            $approvalDate = !empty($approval['approvalDateTimeTZ'])
                ? date('D, m/d/Y H:i:s', strtotime($approval['approvalDateTimeTZ']))
                : '-';
        ?>

        <ul style="padding: 0 1rem;">
            <li>
                <div style="margin-bottom: .5rem;">
                    <span style="text-transform:uppercase;font-weight:bold;">
                        <?= e(strtoupper($nextApproval['approverEntity_RefID'] ? $actionName : 'Final Approval')); ?>
                    </span>
                    <?= e($approvalDate); ?> :
                    <?= e($approval['approverEntityName'] ?? '-'); ?>
                    (<?= e($approval['approverEntityFullJobPositionTitle'] ?? '-'); ?>)
                </div>

                <div class="workflow-comment">
                    <strong>Comment :</strong> <?= nl2br(e($comment)); ?>
                </div>
            </li>
        </ul>
    <?php endforeach; ?>
</div>
