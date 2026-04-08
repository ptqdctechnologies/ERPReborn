<div id="myPopUpBusinessTripSettlementRevision" class="modal fade" role="dialog" aria-hidden="true"
    style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:15%;font-weight:bold;">
                        BUSINESS TRIP SETTLEMENT REVISION
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
                                                <form id="editForm"
                                                    action="{{ route('BusinessTripSettlement.RevisionBusinessTripSettlementIndex') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input id="bsf_number_id" style="border-radius:0;"
                                                        name="bsf_number_id" type="hidden" class="form-control">
                                                </form>
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;cursor:pointer;"
                                                        class="input-group-text form-control"
                                                        id="bsf_number_trano_icon">
                                                        <a data-toggle="modal" data-target="#myBusinessTripSettlement">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <input id="bsf_number_trano" style="border-radius:0;"
                                                    name="bsf_number_trano" type="text" class="form-control" required
                                                    readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-sm btn-cancel" data-dismiss="modal"
                        style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel">
                        Cancel
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
    $('.btn-edit').on('click', function () {
        const bsfNumberID = $('#bsf_number_id').val();

        if (bsfNumberID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#bsf_number_trano').focus();
            $('#bsf_number_trano').css("border", "1px solid red");
            $('#bsf_number_trano_Icon').css("border", "1px solid red");
        }
    });

    $('.btn-cancel').on('click', function () {
        $('#bsf_number_id').val("");
        $('#bsf_number_trano').val("");
    });
</script>