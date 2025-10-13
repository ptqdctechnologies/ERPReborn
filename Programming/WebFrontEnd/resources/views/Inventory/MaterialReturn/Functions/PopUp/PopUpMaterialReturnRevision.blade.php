<div id="myPopUpMaterialReturnRevision" class="modal fade" role="dialog" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:30%;font-weight:bold;">
                        MATERIAL RETURN REVISION
                    </span>
                    
                    <br><br><br>
                    
                    <form action="{{ route('MaterialReturn.RevisionMaterialReturnIndex') }}" method="POST">
                        @csrf
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
                                                    <input type="hidden" class="form-control" id="material_return_id" name="material_return_id" style="border-radius:0;" />
                                                    <input type="text" class="form-control" id="material_return_number" style="border-radius:0;" required readonly />
                                                    
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a data-toggle="modal" data-target="#myGetModalMaterialReturn" style="cursor: pointer;">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="material_return_box" />
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
                        <button type="reset" class="btn btn-sm" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="cancel" title="Cancel" /> Cancel
                        </button>
                        <button type="submit" class="btn btn-sm" style="background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="edit" title="Edit" /> Edit
                        </button>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>
