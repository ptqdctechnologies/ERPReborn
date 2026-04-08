<div id="myBusinessTripSettlement" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose BSF Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="table_bsf">
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
                                        <tr class="loading_table_bsf">
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
                                        <tr class="error_table_bsf" style="display: none;">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="error_message_table_bsf" class="mt-3 text-red"
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
    function getBusinessTripSettlement() {
        $("#table_bsf tbody").empty();

        $.ajax({
            type: 'GET',
            url: '{!! route("BusinessTripSettlement.GetBusinessTripSettlementList") !!}',
            success: function (data) {
                $(".loading_table_bsf").hide();

                if (Array.isArray(data) && data.length > 0) {
                    $('#table_bsf').DataTable({
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
                                    return '<input id="sys_id_bsf' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bsf" type="hidden">' + (meta.row + 1);
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

                    $('#table_bsf').css("width", "100%");
                } else {
                    $(".error_table_bsf").show();
                    $("#error_message_table_bsf").text(`Data not found.`);

                    $("#table_bsf_length").hide();
                    $("#table_bsf_filter").hide();
                    $("#table_bsf_info").hide();
                    $("#table_bsf_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#table_bsf tbody').empty();
                $(".loading_table_bsf").hide();
                $(".error_table_bsf").show();
                $("#error_message_table_bsf").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }
</script>