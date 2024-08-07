<div id="mySearchPO" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose PO</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchPORevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
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
    $('#TableSearchPORevision tbody').on('click', 'tr', function() {

        $('#purchaseOrder_number').css("border", "1px solid #ced4da");
        $('#purchaseOrder_number_icon').css("border", "1px solid #ced4da");

        $("#mySearchPO").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var purchaseOrder_RefID = $('#sys_id_purchaseOrder_revision' + id).val();
        var code = row.find("td:nth-child(2)").text();

        $("#purchaseOrder_RefID").val(purchaseOrder_RefID);
        $("#purchaseOrder_number").val(code);

    });
</script>