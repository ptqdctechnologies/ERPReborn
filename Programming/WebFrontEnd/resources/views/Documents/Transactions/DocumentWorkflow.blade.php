<div class="col-12 DocumentWorkflow">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                Last Status : 
                @if(isset($DataWorkflowHistory))
                    @if($statusDocument == 0)
                        Awaiting {{ $DataWorkflowHistory[count($DataWorkflowHistory)-1]['workFlowPathActionName'] }} from {{ $DataWorkflowHistory[count($DataWorkflowHistory)-1]['nextApproverEntityName'] }}
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

                    @if(count($dataWorkFlows) > 0)
                    @php $no = 1; @endphp
                    @foreach($dataWorkFlows as $dataWorkFlow)
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ date('D, m/d/Y H:m:s', strtotime($dataWorkFlow['approvalDateTimeTZ'])) }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkFlow['approverEntityName'] }} ({{ $dataWorkFlow['approverEntityFullJobPositionTitle'] }})</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkFlow['workFlowPathActionName'] }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{!! nl2br(e($dataWorkFlow['remarks'])) !!}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>