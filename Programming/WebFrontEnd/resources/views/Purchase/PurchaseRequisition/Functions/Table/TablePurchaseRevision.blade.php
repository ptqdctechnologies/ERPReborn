<div id="PopUpTablePurchaseRequisitionRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Purchase Requisition</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchPurchaseRequisitionRevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transaction Number</th>
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
        $('.PopUpTablePurchaseRequisitionRevision').on('click', function(e) {
            e.preventDefault();

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("PurchaseRequisition.PurchaseRequisitionListData") !!}',
                success: function(data) {
                    console.log(data);
                    var no = 1; t = $('#TableSearchPurchaseRequisitionRevision').DataTable();
                    t.clear();
                    $.each(data.data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_pr_revision' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.documentNumber + '</td>',
                            '<td>' + val.combinedBudgetCode + '</td>',
                            '<td>' + val.combinedBudgetName + '</td>',
                            '<td>' + val.combinedBudgetSectionCode + '</td>',
                            '<td>' + val.combinedBudgetSectionName + '</td></tr></tbody>'
                        ]).draw();

                    });
                }
            });
        });

    });
</script>
<script>

    $('#TableSearchPurchaseRequisitionRevision tbody').on('click', 'tr', function () {

        $("#PopUpTablePurchaseRequisitionRevision").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();  
        var purchase_RefID = $('#sys_id_pr_revision' + id).val();
        var code = row.find("td:nth-child(2)").text();
        
        $("#purchase_RefID").val(purchase_RefID);
        $("#purchase_number").val(code);

    });
    
</script>