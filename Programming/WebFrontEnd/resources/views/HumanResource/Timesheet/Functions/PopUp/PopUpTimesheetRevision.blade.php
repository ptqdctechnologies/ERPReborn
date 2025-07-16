<div id="myPopUpTimesheetRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:35%;font-weight:bold;">
                        Timesheet Revision
                    </span>
                    <br><br><br>

                    <form action="{{ route('RevisionTimesheet.index') }}" method="post">
                    @csrf
                        <div class="card" style="margin-left: 8%;">
                            <div class="card-body"> 
                                <div class="form-group">
                                    <table>
                                        <tr>
                                            <td>
                                                <label>Timesheet Number&nbsp;</label>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input id="timesheet_RefID" style="border-radius:0;" name="timesheet_RefID" type="hidden" class="form-control">
                                                    <input id="timesheet_number" style="border-radius:0;" type="text" class="form-control" readonly>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control" id="timesheet_number_icon" style="cursor: pointer;">
                                                            <a data-toggle="modal" data-target="#myTimesheetNumber">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
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
                        <button type="submit" class="btn btn-sm" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                        </button>
                        <a class="btn btn-sm btn-cancel" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                        </a>
                    </form>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#timesheet_number_icon").on('click', function() {
        $('#myPopUpTimesheetRevision').modal('hide');
    });
</script>