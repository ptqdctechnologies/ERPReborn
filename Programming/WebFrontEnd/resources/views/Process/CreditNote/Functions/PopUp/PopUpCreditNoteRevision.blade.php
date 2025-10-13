<div id="myPopUpCreditNote" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:17%;font-weight:bold;">CREDIT NOTE REVISION</span><br><br><br>
                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td style="padding-top: 20px;"><label>Revision Number &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                                        <td>
                                            <div class="input-group">
                                                <form id="edit_form" action="{{ route('CreditNote.RevisionCreditNote') }}" method="post">
                                                @csrf
                                                    <input id="creditNote_RefID" style="border-radius:0;" name="creditNote_RefID" type="hidden" class="form-control" />
                                                </form>

                                                <div class="input-group-append">
                                                    <span id="creditNoteNumberIcon" style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                                        <a data-toggle="modal" data-target="#myCreditNote">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                                                        </a>
                                                    </span>
                                                </div>
                                                
                                                <input id="creditNoteNumber" style="border-radius:0;" type="text" class="form-control" readonly />
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a id="cancel_button" class="btn btn-sm" data-dismiss="modal" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                    <a id="edit_button" class="btn btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                    </a>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#edit_button').on('click', function() {
        let creditNote_RefID = $('#creditNote_RefID').val();

        if (creditNote_RefID) {
            ShowLoading();

            $('#edit_form').submit();
        } else {
            $('#creditNoteNumber').focus();
            $('#creditNoteNumber').css("border", "1px solid red");
            $('#creditNoteNumberIcon').css("border", "1px solid red");
        }
    });

    $('#cancel_button').on('click', function() {
        $('#creditNote_RefID').val("");
        $('#creditNoteNumber').val("");
    });
</script>