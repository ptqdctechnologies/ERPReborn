<div id="arfNumberPopUp" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 250px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">
                    <form action="{{ route('ARF.revisionArf') }}" method="post">
                    @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label style="margin-left: 65px;">ARF Number</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="searchArfNumberRevisionId" style="border-radius:0;" name="searchArfNumberRevisionId" type="hidden" class="form-control">
                                                    <input required="" id="searchArfNumberRevisions" style="border-radius:0;" name="searchArfNumberRevisions" type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#mySearchArfRevision" class="fas fa-gift" style="color:grey;"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>

                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline btn-warning btn-sm" style="margin-left: 160px;color:white;">
                            <i class="fas fa-edit" aria-hidden="true"> Edit</i>
                        </button>
                        <button type="reset" class="btn btn-outline btn-danger btn-sm">
                            <i class="far fa-times-circle" aria-hidden="true"> Cancel </i>
                        </button>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>
<!--|----------------------------------------------------------------------------------|
    |                            End Function Sub Project Code                         |
    |----------------------------------------------------------------------------------|-->