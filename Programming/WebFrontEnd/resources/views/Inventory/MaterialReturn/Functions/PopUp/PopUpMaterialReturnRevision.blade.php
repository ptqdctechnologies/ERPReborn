<div id="myPopUpMaterialReturnRevision" class="modal fade" role="dialog" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:30%;font-weight:bold;">
                        MATERIAL RETURN REVISION
                    </span>
                    <br><br><br>
                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td>
                                            <label>
                                                Revision Number&nbsp;
                                            </label>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <form id="editForm" action="{{ route('MaterialReturn.RevisionMaterialReturnIndex') }}" method="POST">
                                                @csrf
                                                    <input type="hidden" class="form-control" id="material_return_id" name="material_return_id" style="border-radius:0;" />
                                                </form>

                                                <div class="input-group-append">
                                                    <span style="border-radius:0;" class="input-group-text form-control" id="material_return_number_icon">
                                                        <a data-toggle="modal" data-target="#myGetModalMaterialReturn" style="cursor: pointer;">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="material_return_box" />
                                                        </a>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="material_return_number" style="border-radius:0;" required readonly />
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
        var materialReceiveRefID = $('#material_return_id').val();

        if (materialReceiveRefID) {
            ShowLoading();

            $('#editForm').submit();
        } else {
            $('#material_return_number').focus();
            $('#material_return_number').css("border", "1px solid red");
            $('#material_return_number_icon').css("border", "1px solid red");
        }
    });

    $('.btn-cancel').on('click', function() {
        $('#material_return_id').val("");
        $('#material_return_number').val("");
    });
</script>