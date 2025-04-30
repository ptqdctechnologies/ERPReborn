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
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetPurchaseOrderRevision">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorPurchaseOrderRevisionMessageContainer">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorPurchaseOrderRevisionMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
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
    $(".errorPurchaseOrderRevisionMessageContainer").hide();

    function getRevisionPOList() {
        $('#TableSearchPORevision tbody').empty();
        $(".loadingGetPurchaseOrderRevision").show();
        $(".errorPurchaseOrderRevisionMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseOrderList") !!}',
            success: function(data) {
                $(".loadingGetPurchaseOrderRevision").hide();

                var no = 1;
                var table = $('#TableSearchPORevision').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_po_revision' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_po_revision" type="hidden">' + no++,
                            val.documentNumber || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                            val.combinedBudgetSectionCode || '-',
                            val.combinedBudgetSectionName || '-',
                        ]).draw();
                    });

                    $("#TableSearchPORevision_length").show();
                    $("#TableSearchPORevision_filter").show();
                    $("#TableSearchPORevision_info").show();
                    $("#TableSearchPORevision_paginate").show();
                } else {
                    $(".errorPurchaseOrderRevisionMessageContainer").show();
                    $("#errorPurchaseOrderRevisionMessage").text(`Data not found.`);

                    $("#TableSearchPORevision_length").hide();
                    $("#TableSearchPORevision_filter").hide();
                    $("#TableSearchPORevision_info").hide();
                    $("#TableSearchPORevision_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
            }
        });
    }

    $('#TableSearchPORevision tbody').on('click', 'tr', function() {
        $('#purchaseOrder_number').css("border", "1px solid #ced4da");
        $('#purchaseOrder_number_icon').css("border", "1px solid #ced4da");

        $("#mySearchPO").modal('toggle');
        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var purchaseOrder_RefID = $('#sys_id_po_revision' + id).val();
        var code = row.find("td:nth-child(2)").text();

        $("#purchaseOrder_RefID").val(purchaseOrder_RefID);
        $("#purchaseOrder_number").val(code);
    });

    $(window).one('load', function(e) {
        getRevisionPOList();
    });
</script>