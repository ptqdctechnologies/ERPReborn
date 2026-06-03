<div id="myProductRevision" class="modal fade" role="dialog" aria-hidden="true"
    style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:35%;font-weight:bold;">
                        PRODUCT REVISION
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
                                                <form id="editForm" action="{{ route('Product.revision') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input id="modal_product_id" style="border-radius:0;"
                                                        name="modal_product_id" type="hidden" class="form-control">
                                                </form>

                                                <div class="input-group-append" style="cursor: pointer;">
                                                    <span style="border-radius:0;" class="input-group-text form-control"
                                                        id="modal_product_number_icon">
                                                        <a data-toggle="modal" data-target="#myProductss">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <input required="" id="modal_product_number" style="border-radius:0;"
                                                    name="modal_product_number" type="text" class="form-control"
                                                    required readonly>
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
        const productRefID = $('#modal_product_id').val();

        if (productRefID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#modal_product_number').focus();
            $('#modal_product_number').css("border", "1px solid red");
        }
    });

    $('.btn-cancel').on('click', function () {
        $('#modal_product_id').val("");
        $('#modal_product_number').val("");
    });
</script>