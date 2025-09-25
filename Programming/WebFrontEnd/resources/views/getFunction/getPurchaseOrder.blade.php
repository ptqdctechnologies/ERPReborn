<div id="mySearchPO" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
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
                                <table class="table table-head-fixed text-nowrap" id="TableSearchPORevision" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            {{-- <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetPurchaseOrderRevision">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
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
                                            <td colspan="4" class="p-0" style="height: 22rem;">
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
        $('#TableSearchPORevision').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("getPurchaseOrderList") !!}',
                type: 'GET',
                data: function (d) {
                    return d;
                },
                beforeSend: function () {
                    $(".loadingGetPurchaseOrderRevision").show();
                    $(".errorPurchaseOrderRevisionMessageContainer").hide();
                    $('#TableSearchPORevision tbody').empty();
                },
                complete: function () {
                    $(".loadingGetPurchaseOrderRevision").hide();
                },
                error: function (xhr, error, thrown) {
                    $(".loadingGetPurchaseOrderRevision").hide();
                    $(".errorPurchaseOrderRevisionMessageContainer").show();
                    $("#errorPurchaseOrderRevisionMessage").text("Failed to load data.");
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    className: "align-middle text-center"
                },
                {
                    data: 'sys_Text',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    data: 'combinedBudgetCode',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    data: 'combinedBudgetName',
                    defaultContent: '-',
                    className: "align-middle"
                }
            ]
        });
    }

    $(window).one('load', function () {
        getRevisionPOList();
    });

    $('#TableSearchPORevision tbody').on('click', 'tr', function () {
        var table = $('#TableSearchPORevision').DataTable();
        var data = table.row(this).data();

        if (data) {
            $("#mySearchPO").modal('toggle');

            var purchaseOrder_RefID = data.sys_ID;
            var code = data.sys_Text;

            $("#purchaseOrder_RefID").val(purchaseOrder_RefID);
            $("#purchaseOrder_number").val(code);
        }
    });

</script>