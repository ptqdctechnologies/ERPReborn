<div id="myDeliveryOrder" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Delivery Order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetDeliveryOrder">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingGetDeliveryOrder">
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
                                        <tr class="errorDeliveryOrderMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorDeliveryOrderMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorDeliveryOrderMessageContainerSecond").hide();

    function getDeliveryOrder() {
        $('#tableGetDeliveryOrder tbody').empty();
        $(".loadingGetDeliveryOrder").show();
        $(".errorDeliveryOrderMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDeliveryOrderList") !!}',
            success: function(data) {
                $(".loadingGetDeliveryOrder").hide();

                var table = $('#tableGetDeliveryOrder').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $('#tableGetDeliveryOrder').DataTable({
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
                                        '<input id="sys_id_delivery_order' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_delivery_order" type="hidden">' +
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
                                data: 'combinedBudgetCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                        ]
                    });

                    $('#tableGetDeliveryOrder').css("width", "100%");
                } else {
                    $(".errorDeliveryOrderMessageContainerSecond").show();
                    $("#errorDeliveryOrderMessageSecond").text(`Data not found.`);

                    $("#tableGetDeliveryOrder_length").hide();
                    $("#tableGetDeliveryOrder_filter").hide();
                    $("#tableGetDeliveryOrder_info").hide();
                    $("#tableGetDeliveryOrder_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetDeliveryOrder tbody').empty();
                $(".loadingGetDeliveryOrder").hide();
                $(".errorDeliveryOrderMessageContainerSecond").show();
                $("#errorDeliveryOrderMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getDeliveryOrder();
    });
</script>