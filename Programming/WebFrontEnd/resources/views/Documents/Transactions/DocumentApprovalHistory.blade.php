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
                    @foreach($dataWorkflow['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'] as $dataWorkflows)
                    <ul>
                        <li>
                        <span style="text-transform:uppercase;font-weight:bold;">{{ $dataWorkflows['entities']['workFlowPathActionName'] }}</span> {{ date('d/m/Y H:m:s', strtotime($dataWorkflows['entities']['approvalDateTimeTZ'])) }} : {{ $dataWorkflows['entities']['approverEntityName'] }} ({{ $dataWorkflows['entities']['approverEntityDepartmentName'] }}) <br>
                            Comment : {{ $dataWorkflows['entities']['remarks'] }}
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>