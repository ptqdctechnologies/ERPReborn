<div id="myMaterialServiceRequest" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Material Service Request</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <table class="table table-head-fixed text-nowrap" id="TableGetMaterialServiceRequest">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Sub Budget Code</th>
                                            <th>Requester</th>
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
    $(function() {
        $('.myMaterialServiceRequest').one('click', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("PurchaseRequisition.PurchaseRequisitionListData") !!}',
                success: function(data) {
                    console.log(data);
                    var no = 1;
                    var t = $('#TableGetMaterialServiceRequest').DataTable();
                    t.clear();
                    $.each(data.data.data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_msr' + keys + '" value="' + val.Sys_ID + '" type="hidden"<td>' + no++ + '</td>',
                            '<td>' + val.documentNumber + '</td>',
                            '<td>' + val.combinedBudgetCode + ' - ' + val.combinedBudgetName + '</td>',
                            '<td>' + val.combinedBudgetSectionCode + ' - ' + val.combinedBudgetSectionName + '</td>',
                            '<td>' + val.requesterWorkerName + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

        });
    });
</script>

<script>

    $('#TableGetMaterialServiceRequest tbody').on('click', 'tr', function () {

        $("#myMaterialServiceRequest").modal('toggle');

        var row = $(this).closest("tr");  
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_msr = $('#sys_id_msr' + id).val();
        var number = row.find("td:nth-child(2)").text();
        $("#msr_number").val(number);

    });
    
</script>