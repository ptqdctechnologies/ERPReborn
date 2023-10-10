<div class="col-12 ShowDocument">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                Last Status : Awaiting
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
                @php $no = 1; @endphp
                @foreach($dataWorkflow as $dataWorkflows)
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ date('D, m/d/Y H:m:s', strtotime($dataWorkflows['approvalDateTimeTZ'])) }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['name'] }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['workFlowPathActionName'] }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['remarks'] }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>