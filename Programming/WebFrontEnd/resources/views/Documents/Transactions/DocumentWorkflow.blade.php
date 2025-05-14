<div class="col-12 DocumentWorkflow">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                Last Status : 
                @if(isset($dataWorkFlows))
                    @if($statusDocument == 0)
                        Awaiting {{ $dataWorkFlows[count($dataWorkFlows)-1]['workFlowPathActionName'] }} from {{ $dataWorkFlows[count($dataWorkFlows)-1]['nextApproverEntityName'] }}
                    @elseif($statusDocument == 1)
                        Final Approved
                    @elseif($statusDocument == 2)
                        Document Doesn't Has Workflow
                    @endif
                @endif
            </label>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-head-fixed text-nowrap table-sm TableListDocument" id="TableListDocument">
                <thead>
                    <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Name</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($dataWorkFlows) > 0) { ?>
                        <?php $no = 1; ?>
                        <?php foreach ($dataWorkFlows as $dataWorkFlow) { ?>
                            <?php $statusWorkflow = $dataWorkFlow['workFlowPathActionName'] === "Rejection To Resubmit" ? "Reject" : $dataWorkFlow['workFlowPathActionName']; ?>
                            <tr>
                                <td style="border:1px solid #4B586A;color:#4B586A;"><?= $no++; ?></td>
                                <td style="border:1px solid #4B586A;color:#4B586A;"><?= date('D, m/d/Y H:i:s', strtotime($dataWorkFlow['approvalDateTimeTZ'])); ?></td>
                                <td style="border:1px solid #4B586A;color:#4B586A;"><?= $dataWorkFlow['approverEntityName']; ?> (<?= $dataWorkFlow['approverEntityFullJobPositionTitle']; ?>)</td>
                                <td style="border:1px solid #4B586A;color:#4B586A;"><?= $statusWorkflow; ?></td>
                                <td style="border:1px solid #4B586A;color:#4B586A;"><?= nl2br(e($dataWorkFlow['remarks'])); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>