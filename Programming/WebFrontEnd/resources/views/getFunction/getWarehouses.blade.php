<!-- GET WAREHOUSES -->
<div id="myGetModalWarehouses" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Warehouse</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed w-100" id="tableGetModalWarehouses">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalWarehouses">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
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
    function getModalWarehouses() {
        $.ajax({
            type: 'POST',
            url: '{!! route("Warehouse.WarehousePickList") !!}',
        })
            .done(function (response) {
                let data = (response.status == 200 && response.data[0]) ? response.data : [];

                $('#tableGetModalWarehouses').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_modal_warehouse' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_warehouse" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'sys_Text',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'address',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingGetModalWarehouses").hide();
            });
    }
</script>