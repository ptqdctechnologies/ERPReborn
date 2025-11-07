<div id="myPopUpBusinessTripRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:15%;font-weight:bold;">
                        BUSINESS TRIP REQUEST REVISION
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
                                                <form id="editForm" action="{{ route('BusinessTripRequest.RevisionBusinessTripRequestIndex') }}" method="POST">
                                                @csrf
                                                    <input id="brf_number_id" style="border-radius:0;" name="brf_number_id" type="hidden" class="form-control">
                                                </form>
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" id="brf_number_trano_icon">
                                                        <a data-toggle="modal" data-target="#myGetModalBRFNumber">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <input id="brf_number_trano" style="border-radius:0;" name="brf_number_trano" type="text" class="form-control" required readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-sm btn-cancel" data-dismiss="modal" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
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
        var brfNumberID = $('#brf_number_id').val();

        if (brfNumberID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#brf_number_trano').focus();
            $('#brf_number_trano').css("border", "1px solid red");
            $('#brf_number_trano_Icon').css("border", "1px solid red");
        }
    });

    $('.btn-cancel').on('click', function() {
        $('#brf_number_id').val("");
        $('#brf_number_trano').val("");
    });
</script>