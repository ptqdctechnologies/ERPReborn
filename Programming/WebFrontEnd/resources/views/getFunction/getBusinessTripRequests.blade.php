<div id="myBusinessTripRequest" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose BRF Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="table_brf">
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
                                        <tr class="loading_table_brf">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
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
                                        <tr class="error_table_brf">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="error_message_table_brf" class="mt-3 text-red"
                                                        style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".error_table_brf").hide();

    function getBusinessTripRequest() {
        $("#table_brf tbody").empty();
        $(".loading_table_brf").show();
        $(".error_table_brf").hide();

        $.ajax({
            type: 'GET',
            url: '{!! route("getBusinessTripList") !!}',
            success: function (data) {
                $(".loading_table_brf").hide();

                if (Array.isArray(data) && data.length > 0) {
                    $('#table_brf').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                className: "align-middle text-center",
                                render: function (data, type, row, meta) {
                                    return '<input id="sys_id_budget' + (meta.row + 1) + '" value="' + data.combinedBudget_RefID + '" data-trigger="sys_id_budget" type="hidden">' + '<input id="sys_id_brf' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_brf" type="hidden">' + (meta.row + 1);
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
                            {
                                data: 'combinedBudgetSectionCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetSectionName',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#table_brf').css("width", "100%");
                } else {
                    $(".error_table_brf").show();
                    $("#error_message_table_brf").text(`Data not found.`);

                    $("#table_brf_length").hide();
                    $("#table_brf_filter").hide();
                    $("#table_brf_info").hide();
                    $("#table_brf_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#table_brf tbody').empty();
                $(".loading_table_brf").hide();
                $(".error_table_brf").show();
                $("#error_message_table_brf").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }
</script>