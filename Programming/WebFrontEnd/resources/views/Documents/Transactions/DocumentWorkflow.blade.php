<div class="col-12 DocumentWorkflow">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                @if(isset($dataWorkflow))
                Last Status : Awaiting approval from {{ $dataWorkflow[count($dataWorkflow)-1]['NextApproverEntityName'] }}
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

                    @if(isset($dataWorkflow))
                    @php $no = 1; @endphp
                    @foreach($dataWorkflow as $dataWorkflows)
                    <tr>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ date('D, m/d/Y H:m:s', strtotime($dataWorkflows['ApprovalDateTimeTZ'])) }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['CurrentApproverEntityName'] }} ({{ $dataWorkflows['CurrentApproverEntityFullJobPositionTitle'] }})</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['CurrentWorkFlowPathActionName'] }}</td>
                        <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['CurrentRemarks'] }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>