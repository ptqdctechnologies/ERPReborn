<div class="col-12 ApprovalHistory">
    <div class="row">
        <div class="col-md-12">
            @if($statusApprover == "Yes")
            <br>
            <a onclick="RejectButton({{ $businessDocument_ID }}, {{ $submitter_ID }})" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Reject"> Reject
            </a>
            <a onclick="ApproveButton({{ $businessDocument_ID }})" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right:10px;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Approve"> Approve
            </a>
            <br><br><br><br>
            @endif
        </div>
    </div>
</div>