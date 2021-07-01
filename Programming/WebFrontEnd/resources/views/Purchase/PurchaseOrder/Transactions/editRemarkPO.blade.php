<div id="editRemarkPO" class="modal fade" role="dialog" style="margin-top: 100px;margin-left:8px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <form action="{{ route('PO.editExistingOverhead') }}" method="post">
                    @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label>Select Trano</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input required="" style="border-radius:0;" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchSelectTrano" class="fas fa-gift" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Remarks</label></td>
                                            <td>
                                                <textarea name="" id="" cols="30" rows="5"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Term Of Payment</label></td>
                                            <td>
                                                <textarea name="" id="" cols="30" rows="5"></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline btn-success btn-sm" style="margin-left: 180px;">
                            <i class="fa fa-pencil" aria-hidden="true">Edit</i>
                        </button>
                        <button type="reset" class="btn btn-outline btn-danger btn-sm">
                            <i class="fa fa-time" aria-hidden="true">cancel</i>
                        </button>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>