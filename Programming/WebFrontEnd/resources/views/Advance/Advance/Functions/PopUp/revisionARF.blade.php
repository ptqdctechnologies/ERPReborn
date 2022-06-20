<div id="popUpAdvanceRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:33%;font-weight:bold;">ADVANCE REVISION</span><br><br><br>
                    <form action="{{ route('ARF.revisionArf') }}" method="post">
                    @csrf
                        <div class="card" style="margin-left: 8%;">
                            <div class="card-body"> 
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td><label>Advance Number &nbsp;</label></td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="searchArfNumberRevisionId" style="border-radius:0;" name="searchArfNumberRevisionId" type="hidden" class="form-control">
                                                    <input required="" id="searchArfNumberRevisions" style="border-radius:0;" name="searchArfNumberRevisions" type="text" class="form-control" required>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a data-toggle="modal" data-target="#mySearchArfRevision" class="fas fa-gift" style="color:grey;"></a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>

                                            
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline btn-sm" style="margin-left: 38%;color:white;background-color:#4B586A;">
                            <i class="fas fa-edit" aria-hidden="true"> Edit</i>
                        </button>
                        <button type="reset" class="btn btn-outline btn-sm" style="color:white;background-color:#4B586A;font-weight:bold;">
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