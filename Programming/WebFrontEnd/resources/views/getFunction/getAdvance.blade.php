<!-- GET ADVANCE -->
<div id="myGetModalAdvance" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Advance Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalAdvance">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Beneficiary</th>
                                            <th>Requester</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalAdvance">
                                            <td colspan="8" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalAdvanceMessageContainerSecond">
                                            <td colspan="8" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalAdvanceMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalAdvanceMessageContainerSecond").hide();

    function getModalAdvance(project_id, site_id) {
        $('#tableGetModalAdvance tbody').empty();
        $(".loadingGetModalAdvance").show();
        $(".errorModalAdvanceMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getAdvance") !!}?project_id=' + project_id + '&site_id=' + site_id,
            success: function(data) {
                $(".loadingGetModalAdvance").hide();

                var table = $('#tableGetModalAdvance').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $('#tableGetModalAdvance').DataTable({
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
                                        '<input id="sys_id_modal_advance' + (meta.row + 1) + '" value="' + data.Sys_ID + '" data-trigger="sys_id_modal_advance" type="hidden">' +
                                        '<input id="sys_id_budget_advance' + (meta.row + 1) + '" value="' + data.CombinedBudget_RefID + '" data-trigger="sys_id_budget_advance" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'Sys_Text',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'BeneficiaryWorkerName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'RequesterWorkerName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'CombinedBudgetCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'CombinedBudgetName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'CombinedBudgetSectionCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'CombinedBudgetSectionName',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetModalAdvance').css("width", "100%");
                } else {
                    $(".errorModalAdvanceMessageContainerSecond").show();
                    $("#errorModalAdvanceMessageSecond").text(`Data not found.`);

                    $("#tableGetModalAdvance_length").hide();
                    $("#tableGetModalAdvance_filter").hide();
                    $("#tableGetModalAdvance_info").hide();
                    $("#tableGetModalAdvance_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalAdvance tbody').empty();
                $(".loadingGetModalAdvance").hide();
                $(".errorModalAdvanceMessageContainerSecond").show();
                $("#errorModalAdvanceMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalAdvance();
    });
</script>