<div id="PopUpTableAdvanceRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Advance Request</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchArfRevision">
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.PopUpTableAdvanceRevision').on('click', function(e) {
            e.preventDefault();

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("AdvanceRequest.AdvanceListData") !!}?project_id=' + $('#project_id').val() + '&site_id=' + $('#site_id').val(),
                
                success: function(data) {
                    var no = 1; t = $('#TableSearchArfRevision').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_advance_revision' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.DocumentNumber + '</td>',
                            '<td>' + val.CombinedBudgetCode + '</td>',
                            '<td>' + val.CombinedBudgetName + '</td>',
                            '<td>' + val.CombinedBudgetSectionCode + '</td>',
                            '<td>' + val.CombinedBudgetSectionName + '</td></tr></tbody>'
                        ]).draw();

                    });
                }
            });
        });

    });
</script>

<script>
    $('#TableSearchArfRevision tbody').on('click', 'tr', function() {

        $('#advance_number').css("border", "1px solid #ced4da");
        $('#advance_number_icon').css("border", "1px solid #ced4da");

        $("#PopUpTableAdvanceRevision").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var advance_RefID = $('#sys_id_advance_revision' + id).val();
        var code = row.find("td:nth-child(2)").text();

        $("#advance_RefID").val(advance_RefID);
        $("#advance_number").val(code);

    });
</script>



<script>
    $('.btn-edit').on('click', function() {

        var advance_RefID = $('#advance_RefID').val();

        if (advance_RefID) {

            ShowLoading();
            window.location.href = '/RevisionAdvanceIndex?advance_RefID=' + advance_RefID;
        } else {
            $('#advance_number').focus();
            $('#advance_number').css("border", "1px solid red");
            $('#advance_number_icon').css("border", "1px solid red");
        }

    });
</script>

<script>
    $('.btn-cancel').on('click', function() {
        $('#advance_RefID').val("");
        $('#advance_number').val("");

    });
</script>