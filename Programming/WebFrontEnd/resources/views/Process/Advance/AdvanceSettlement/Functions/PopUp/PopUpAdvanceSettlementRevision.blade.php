<div id="myPopUpAdvanceSettlementRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:18%;font-weight:bold;">
                        ADVANCE SETTLEMENT REVISION
                    </span>
                    <br><br><br>
                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td>
                                            <label>Revision Number&nbsp;</label>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <form id="editForm" action="{{ route('AdvanceSettlement.RevisionAdvanceSettlementIndex') }}" method="POST">
                                                @csrf
                                                <input id="AdvanceSattlement_RefID" style="border-radius:0;" name="AdvanceSattlement_RefID" type="hidden" class="form-control">
                                                <input id="siteCodeRevAsfBefore" style="border-radius:0;" name="siteCodeRevArfBefore" class="form-control" type="hidden">
                                                </form>
                                                <input required="" id="AdvanceSattlement_Number" style="border-radius:0;" name="AdvanceSattlement_Number" type="text" class="form-control" required readonly>
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" id="AdvanceSattlement_Number_Icon">
                                                        <a data-toggle="modal" data-target="#PopUpTableAdvanceSettlementRevision">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-edit" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                    </a>
                    <a class="btn btn-sm btn-cancel" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<div id="PopUpTableAdvanceSettlementRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Advance Settlement</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchAsfRevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#TableSearchAsfRevision tbody').on('click', 'tr', function () {
        $('#AdvanceSattlement_Number').css("border", "1px solid #ced4da");
        $('#AdvanceSattlement_Number_Icon').css("border", "1px solid #ced4da");
        $("#PopUpTableAdvanceSettlementRevision").modal('toggle');
        
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_advance_settlemetn_revision = $('#sys_id_advance_settlemetn_revision' + id).val();
        var code = row.find("td:nth-child(2)").text();

        $("#AdvanceSattlement_RefID").val(sys_id_advance_settlemetn_revision);
        $("#AdvanceSattlement_Number").val(code);
    });

    $('.btn-edit').on('click', function() {
        var AdvanceSattlement_RefID = $('#AdvanceSattlement_RefID').val();

        if (AdvanceSattlement_RefID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#AdvanceSattlement_Number').focus();
            $('#AdvanceSattlement_Number').css("border", "1px solid red");
            $('#AdvanceSattlement_Number_Icon').css("border", "1px solid red");
        }
    });

    $('.btn-cancel').on('click', function() {
        $('#AdvanceSattlement_RefID').val("");
        $('#AdvanceSattlement_Number').val("");
    });
</script>