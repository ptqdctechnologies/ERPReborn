<div id="myPopUpBusinessTripSettlementRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:14%;font-weight:bold;">BUSINESS TRIP SETTLEMENT REVISION</span><br><br><br>

                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td><label>Revision Number&nbsp;</label></td>
                                        <td>
                                            <div class="input-group">
                                                <input id="searchBsfNumberRevisionId" style="border-radius:0;" name="searchBsfNumberRevisionId" type="hidden" class="form-control">
                                                <input id="searchBsfNumberRevisions" style="border-radius:0;" name="searchBsfNumberRevisions" type="text" class="form-control" required readonly>
                                                <div class="input-group-append">
                                                    <span style="border-radius:0;" class="input-group-text form-control" id="searchBsfNumberRevisionsIcon">
                                                        <a data-toggle="modal" data-target="#PopUpBusinessTripSettlementRevision"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
                    <a class="btn btn-sm btn-cancel" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<div id="PopUpBusinessTripSettlementRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose BSF</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchBusinessTripSettlement">
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
                                    <tbody>

                                    </tbody>
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
    $('#TableSearchBusinessTripSettlement tbody').on('click', 'tr', function() {

        $('#searchBsfNumberRevisions').css("border", "1px solid #ced4da");
        $('#searchBsfNumberRevisionsIcon').css("border", "1px solid #ced4da");

        $("#PopUpBusinessTripSettlementRevision").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_bsf_revision' + id).val();
        var code = row.find("td:nth-child(2)").text();
        console.log(sys_id);

        $("#searchBsfNumberRevisionId").val(sys_id);
        $("#searchBsfNumberRevisions").val(code);

    });
</script>

<script>
    $('.btn-edit').on('click', function() {

        var searchBsfNumberRevisionId = $('#searchBsfNumberRevisionId').val();

        if (searchBsfNumberRevisionId) {

            // ShowLoading();
            window.location.href = '/RevisionBusinessTripSettlementIndex?searchBsfNumberRevisionId=' + searchBsfNumberRevisionId;
        } else {
            $('#searchBsfNumberRevisions').focus();
            $('#searchBsfNumberRevisions').css("border", "1px solid red");
            $('#searchBsfNumberRevisionsIcon').css("border", "1px solid red");
        }

    });
</script>

<script>
    $('.btn-cancel').on('click', function() {
        $('#searchBsfNumberRevisionId').val("");
        $('#searchBsfNumberRevisions').val("");

    });
</script>