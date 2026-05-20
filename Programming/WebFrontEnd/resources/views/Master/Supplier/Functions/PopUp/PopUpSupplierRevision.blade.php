<div id="mySupplierRevision" class="modal fade" role="dialog" aria-hidden="true"
    style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:35%;font-weight:bold;">
                        SUPPLIER REVISION
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
                                                <form id="editForm" action="{{ route('Supplier.revision') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input id="modal_supplier_id" style="border-radius:0;"
                                                        name="modal_supplier_id" type="hidden" class="form-control">
                                                </form>

                                                <div class="input-group-append" style="cursor: pointer;">
                                                    <span style="border-radius:0;" class="input-group-text form-control"
                                                        id="modal_supplier_number_icon">
                                                        <a data-toggle="modal" data-target="#mySuppliers">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}"
                                                                width="13" alt="">
                                                        </a>
                                                    </span>
                                                </div>
                                                <input required="" id="modal_supplier_number" style="border-radius:0;"
                                                    name="modal_supplier_number" type="text" class="form-control"
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
        const loanRefID = $('#modal_supplier_id').val();

        if (loanRefID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#modal_supplier_number').focus();
            $('#modal_supplier_number').css("border", "1px solid red");
        }
    });

    $('.btn-cancel').on('click', function () {
        $('#modal_supplier_id').val("");
        $('#modal_supplier_number').val("");
    });
</script>