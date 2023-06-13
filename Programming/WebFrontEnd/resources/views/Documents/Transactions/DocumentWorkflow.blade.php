<div class="card ShowDocument">
    <table>
        <tr>
            <td>
                <a class="btn btn-default btn-sm float-right ViewDocument" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    View Document
                </a>
            </td>
        </tr>
    </table>
</div>
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
                @php $no = 1; $grand_total = 0; @endphp
                @foreach($dataWorkflow['content']['logBusinessDocumentWorkFlowPathHistory']['itemList']['ungrouped'] as $dataWorkflows)
                <tr>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $no++ }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ date('D, d/m/Y H:m:s', strtotime($dataWorkflows['entities']['approvalDateTimeTZ'])) }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['entities']['approverEntityName'] }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['entities']['workFlowPathActionName'] }}</td>
                    <td style="border:1px solid #4B586A;color:#4B586A;">{{ $dataWorkflows['entities']['approvalDateTimeTZ'] }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>