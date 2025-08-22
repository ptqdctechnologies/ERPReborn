<!-- GET REIMBURSEMENT -->
<div id="myGetModalReimbursement" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Reimbursement Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalReimbursement">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Requester Code</th>
                                            <th>Requester Name</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalReimbursement">
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
                                        <tr class="errorModalReimbursementMessageContainerSecond">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalReimbursementMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalReimbursementMessageContainerSecond").hide();

    function getModalReimbursement() {
        $('#tableGetModalReimbursement tbody').empty();
        $(".loadingGetModalReimbursement").show();
        $(".errorModalReimbursementMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getReimbursementList") !!}',
            success: function(data) {
                $(".loadingGetModalReimbursement").hide();
                var no = 1;
                var table = $('#tableGetModalReimbursement').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_reimbursement' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_reimbursement" type="hidden">' + no++,
                            val.sys_Text || '-',
                            val.requesterCode || '-',
                            val.requesterName || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-'
                        ]).draw();
                    });

                    $("#tableGetModalReimbursement_length").show();
                    $("#tableGetModalReimbursement_filter").show();
                    $("#tableGetModalReimbursement_info").show();
                    $("#tableGetModalReimbursement_paginate").show();
                } else {
                    $(".errorModalReimbursementMessageContainerSecond").show();
                    $("#errorModalReimbursementMessageSecond").text(`Data not found.`);

                    $("#tableGetModalReimbursement_length").hide();
                    $("#tableGetModalReimbursement_filter").hide();
                    $("#tableGetModalReimbursement_info").hide();
                    $("#tableGetModalReimbursement_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalReimbursement tbody').empty();
                $(".loadingGetModalReimbursement").hide();
                $(".errorModalReimbursementMessageContainerSecond").show();
                $("#errorModalReimbursementMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalReimbursement();
    });
</script>