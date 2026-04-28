<div id="myPopUpDoRevision" class="modal fade" role="dialog" aria-hidden="true"
    style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:25%;font-weight:bold;">DELIVERY ORDER
                        REVISION</span><br><br><br>
                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td><label>Revision Number&nbsp;</label></td>
                                        <td>
                                            <div class="input-group">
                                                <form id="edit_form"
                                                    action="{{ route('DeliveryOrder.RevisionDeliveryOrderIndex') }}"
                                                    method="post">
                                                    @csrf
                                                    <input id="do_RefID" style="border-radius:0;" name="do_RefID"
                                                        type="hidden" class="form-control" hidden>
                                                </form>

                                                <div class="input-group-append">
                                                    <span id="do_number_icon" class="input-group-text form-control"
                                                        style="border-radius:0;cursor:pointer;">
                                                        <a data-toggle="modal" data-target="#myDeliveryOrder">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <input id="do_number" style="border-radius:0;" name="do_number"
                                                    class="form-control" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <a id="cancel_button" class="btn btn-sm" data-dismiss="modal"
                        style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel">
                        Cancel
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
    $('#edit_button').on('click', function () {
        let deliveryOrder_RefID = $('#do_RefID').val();

        if (deliveryOrder_RefID) {
            ShowLoading();

            $('#edit_form').submit();
        } else {
            $('#do_number').focus();
            $('#do_number').css("border", "1px solid red");
            $('#do_number_icon').css("border", "1px solid red");
        }
    });

    $('#cancel_button').on('click', function () {
        $('#do_RefID').val("");
        $('#do_number').val("");
    });
</script>