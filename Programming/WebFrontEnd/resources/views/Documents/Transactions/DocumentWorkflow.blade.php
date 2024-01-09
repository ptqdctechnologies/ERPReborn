<div class="col-12 DocumentWorkflow">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                Last Status : 
                @if(isset($DataWorkflowHistory))
                    @if($statusDocument == 0)
                        Awaiting {{ $DataWorkflowHistory['data'][count($DataWorkflowHistory['data'])-1]['workFlowPathActionName'] }} from {{ $DataWorkflowHistory['data'][count($DataWorkflowHistory['data'])-1]['nextApproverEntityName'] }}
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

                    @if($DataWorkflowHistory['metadata']['HTTPStatusCode'] == 200)
                    @php $no = 1; @endphp
                    @foreach($DataWorkflowHistory['data'] as $DataWorkflowHistorys)
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ date('D, m/d/Y H:m:s', strtotime($DataWorkflowHistorys['approvalDateTimeTZ'])) }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $DataWorkflowHistorys['approverEntityName'] }} ({{ $DataWorkflowHistorys['approverEntityFullJobPositionTitle'] }})</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $DataWorkflowHistorys['workFlowPathActionName'] }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{!! nl2br(e($DataWorkflowHistorys['remarks'])) !!}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>