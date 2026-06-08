<div id="myProductSubCategory" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;'">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Sub Category Product</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap w-100" id="tableGetProductSubCategory">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalProductSubCategory">
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
    function getProductSubCategory() {
        const subCategories = [
            { sys_ID: "306000000000001", name: "Admixture Beton" },
            { sys_ID: "306000000000001", name: "Waterproofing" },
            { sys_ID: "306000000000001", name: "Sealant" },
            { sys_ID: "306000000000001", name: "Adhesive & Bonding Agent" },
            { sys_ID: "306000000000001", name: "Grouting Material" },
            { sys_ID: "306000000000001", name: "Flooring Chemicals" },
            { sys_ID: "306000000000001", name: "Protective Coating" },
            { sys_ID: "306000000000001", name: "Repair & Rehabilitation" },
            { sys_ID: "306000000000001", name: "Curing Compound" },
            { sys_ID: "306000000000001", name: "Cleaning & Maintenance Chemicals" },
            { sys_ID: "306000000000001", name: "Injection Materials" },
            { sys_ID: "306000000000001", name: "Surface Treatment" },
            { sys_ID: "306000000000001", name: "Cable & Wire" },
            { sys_ID: "306000000000001", name: "Circuit Breaker" },
            { sys_ID: "306000000000001", name: "Panel Listrik" },
            { sys_ID: "306000000000001", name: "Transformer" },
            { sys_ID: "306000000000001", name: "Power Supply" },
            { sys_ID: "306000000000001", name: "Relay & Contactor" },
            { sys_ID: "306000000000001", name: "Switch & Socket" },
            { sys_ID: "306000000000001", name: "Lighting" }
        ];

        $('#tableGetProductSubCategory').DataTable({
            destroy: true,
            data: subCategories,
            deferRender: true,
            scrollCollapse: true,
            scroller: true,
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_product_sub_category' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_product_sub_category" type="hidden">' + (meta.row + 1)
                    }
                },
                {
                    data: 'name',
                    defaultContent: '-',
                    className: "align-middle"
                }
            ]
        });

        $("#loadingGetModalProductSubCategory").hide();
    }
</script>