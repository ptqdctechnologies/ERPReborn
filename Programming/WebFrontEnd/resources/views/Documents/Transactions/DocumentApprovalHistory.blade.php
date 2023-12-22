<div class="col-12 ApprovalHistory">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                Approval History
            </label>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    @if($DataWorkflowHistory['metadata']['HTTPStatusCode'] == 200)
                        @foreach($DataWorkflowHistory['data'] as $DataWorkflowHistorys)
                        <ul>
                            <li>
                                <span style="text-transform:uppercase;font-weight:bold;">{{ $DataWorkflowHistorys['workFlowPathActionName'] }}</span> {{ date('D, m/d/Y H:m:s', strtotime($DataWorkflowHistorys['approvalDateTimeTZ'])) }} : {{ $DataWorkflowHistorys['approverEntityName'] }} ({{ $DataWorkflowHistorys['approverEntityFullJobPositionTitle'] }}) <br>
                                Comment : {{ $DataWorkflowHistorys['remarks'] }}
                            </li>
                        </ul>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>