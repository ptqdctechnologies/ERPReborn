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
                                                <input id="searchBrfNumberRevisionId" style="border-radius:0;" name="searchBrfNumberRevisionId" type="hidden" class="form-control">
                                                <input id="siteCodeRevAsfBefore" style="border-radius:0;" name="siteCodeRevArfBefore" class="form-control" type="hidden">
                                                <input required="" id="searchBrfNumberRevisions" style="border-radius:0;" name="searchBrfNumberRevisions" type="text" class="form-control" required readonly>
                                                </form>
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" id="searchBrfNumberRevisionsIcon">
                                                        <a data-toggle="modal" data-target="#PopUpTableBusinessTripRevision">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
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

                    <a class="btn btn-sm btn-edit" style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13" alt="" title="Edit"> Edit
                    </a>
                    <a class="btn btn-sm btn-cancel" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                </div>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<div id="PopUpTableBusinessTripRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">
                    Choose Bussines Trip Form
                </label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchBusinessTripRevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getDOList() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getBusinessTripList") !!}',
            success: function(data) {
                console.log('data', data);
            },
            error: function (textStatus, errorThrown) {
                
            }
        });
    }

    $(window).one('load', function(e) {
        getDOList();
    });
</script>