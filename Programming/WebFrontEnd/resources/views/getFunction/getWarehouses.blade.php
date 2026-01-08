<!-- GET WAREHOUSES -->
<div id="myGetModalWarehouses" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
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
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalWarehouses">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalWarehouses">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalWarehousesMessageContainerSecond">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalWarehousesMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalWarehousesMessageContainerSecond").hide();

    function getModalWarehouses() {
        $('#tableGetModalWarehouses tbody').empty();
        $(".loadingGetModalWarehouses").show();
        $(".errorModalWarehousesMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getWarehouseList") !!}',
            success: function(data) {
                $(".loadingGetModalWarehouses").hide();

                var table = $('#tableGetModalWarehouses').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
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
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_modal_warehouse' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_warehouse" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'sys_Text',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'address',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetModalWarehouses').css("width", "100%");
                } else {
                    $(".errorModalWarehousesMessageContainerSecond").show();
                    $("#errorModalWarehousesMessageSecond").text(`Data not found.`);

                    $("#tableGetModalWarehouses_length").hide();
                    $("#tableGetModalWarehouses_filter").hide();
                    $("#tableGetModalWarehouses_info").hide();
                    $("#tableGetModalWarehouses_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalWarehouses tbody').empty();
                $(".loadingGetModalWarehouses").hide();
                $(".errorModalWarehousesMessageContainerSecond").show();
                $("#errorModalWarehousesMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalWarehouses();
    });
</script>