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
                    @if(isset($dataWorkflow))
                    @foreach($dataWorkflow as $dataWorkflows)
                    <ul>
                        <li>
                            <span style="text-transform:uppercase;font-weight:bold;">{{ $dataWorkflows['CurrentWorkFlowPathActionName'] }}</span> {{ date('D, m/d/Y H:m:s', strtotime($dataWorkflows['ApprovalDateTimeTZ'])) }} : {{ $dataWorkflows['CurrentApproverEntityName'] }} ({{ $dataWorkflows['CurrentApproverEntityFullJobPositionTitle'] }}) <br>
                            Comment : {{ $dataWorkflows['CurrentRemarks'] }}
                        </li>
                    </ul>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>