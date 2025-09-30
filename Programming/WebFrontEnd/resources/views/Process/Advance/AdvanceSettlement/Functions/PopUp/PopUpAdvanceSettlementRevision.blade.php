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
                                                    <input id="advance_settlement_id" style="border-radius:0;" name="advance_settlement_id" type="hidden" class="form-control">
                                                </form>
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" id="advance_settlement_number_icon">
                                                        <a data-toggle="modal" data-target="#myGetModalAdvanceSettlement">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <input required="" id="advance_settlement_number" style="border-radius:0;" name="advance_settlement_number" type="text" class="form-control" required readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-cancel" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                    <a class="btn btn-sm btn-edit" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                    </a>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-edit').on('click', function() {
        var advanceSettlementID = $('#advance_settlement_id').val();

        if (advanceSettlementID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#advance_settlement_number').focus();
            $('#advance_settlement_number').css("border", "1px solid red");
            $('#advance_settlement_number_Icon').css("border", "1px solid red");
        }
    });

    $('#tableGetModalAdvanceSettlement').on('click', 'tbody tr', function() {
        $('#myPopUpAdvanceSettlementRevision').modal('show');
    });

    $('#advance_settlement_number_icon').on('click', function() {
        $('#myPopUpAdvanceSettlementRevision').modal('hide');
    });

    $('.btn-cancel').on('click', function() {
        $('#advance_settlement_id').val("");
        $('#advance_settlement_number').val("");
    });
</script>