<div id="myPopUpDebitNote" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:17%;font-weight:bold;">DEBIT NOTE REVISION</span><br><br><br>
                    <form action="{{ route('DebitNote.RevisionDebitNote') }}" method="post">
                        @csrf
                        <div class="card" style="margin-left: 8%;">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td style="padding-top: 20px;"><label>Revision Number &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="debit_note_id" style="border-radius:0;" name="debit_note_id" type="hidden" class="form-control" />
                                                    <input id="debit_note_number" style="border-radius:0;" type="text" class="form-control" readonly />
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                                            <a data-toggle="modal" data-target="#myDebitNote">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box_revision" />
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
                        <button type="submit" class="btn btn-sm" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                        </button>
                        <button type="reset" class="btn btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Edit"> Cancel
                        </button>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>