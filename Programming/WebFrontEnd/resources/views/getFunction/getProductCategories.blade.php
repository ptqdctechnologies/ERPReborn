<div id="myProductCategory" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;'">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Category Product</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap w-100" id="tableGetProductCategory">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalProductCategory">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
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
    function getProductCategory() {
        const categories = [
            { sys_ID: "305000000000001", name: "Electrical" },
            { sys_ID: "305000000000001", name: "Elektronik" },
            { sys_ID: "305000000000001", name: "Mechanical" },
            { sys_ID: "305000000000001", name: "Vehicle" },
            { sys_ID: "305000000000001", name: "Software" },
            { sys_ID: "305000000000001", name: "Service/Jasa" },
            { sys_ID: "305000000000001", name: "Civil" },
            { sys_ID: "305000000000001", name: "Tools" },
            { sys_ID: "305000000000001", name: "Instrument/Alat Ukur" },
            { sys_ID: "305000000000001", name: "Safety" },
            { sys_ID: "305000000000001", name: "Agriculture/Pertanian" },
            { sys_ID: "305000000000001", name: "Office Supplies" },
            { sys_ID: "305000000000001", name: "Medical & Healthcare" },
            { sys_ID: "305000000000001", name: "Telecommunication" },
            { sys_ID: "305000000000001", name: "Hardware" },
            { sys_ID: "305000000000001", name: "Consumer Goods" },
            { sys_ID: "305000000000001", name: "Textile & Garment" },
            { sys_ID: "305000000000001", name: "Chemical" }
        ];

        $('#tableGetProductCategory').DataTable({
            destroy: true,
            data: categories,
            deferRender: true,
            scrollCollapse: true,
            scroller: true,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_product_category' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_product_category" type="hidden">' + (meta.row + 1)
                    }
                },
                {
                    data: 'name',
                    defaultContent: '-',
                    className: "align-middle"
                }
            ]
        });

        $("#loadingGetModalProductCategory").hide();
    }
</script>