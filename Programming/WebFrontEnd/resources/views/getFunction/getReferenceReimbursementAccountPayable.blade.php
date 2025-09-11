<!-- GET REIMBURSEMENT AND ACCOUNT PAYABLE -->
<div id="myGetModalReimbursementAccountPayable" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Reference Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalReimbursementAccountPayable">
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
                                        <tr class="loadingGetModalReimbursementAccountPayable">
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
                                        <tr class="errorModalReimbursementAccountPayableMessageContainerSecond">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalReimbursementAccountPayableMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalReimbursementAccountPayableMessageContainerSecond").hide();

    function getModalReimbursementAccountPayable() {
        $('#tableGetModalReimbursementAccountPayable tbody').empty();
        $(".loadingGetModalReimbursementAccountPayable").show();
        $(".errorModalReimbursementAccountPayableMessageContainerSecond").hide();

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
                $(".loadingGetModalReimbursementAccountPayable").hide();
                var no = 1;
                var table = $('#tableGetModalReimbursementAccountPayable').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_reference' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_reference" type="hidden">' + no++,
                            val.sys_Text || '-',
                            val.requesterCode || '-',
                            val.requesterName || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-'
                        ]).draw();
                    });

                    $("#tableGetModalReimbursementAccountPayable_length").show();
                    $("#tableGetModalReimbursementAccountPayable_filter").show();
                    $("#tableGetModalReimbursementAccountPayable_info").show();
                    $("#tableGetModalReimbursementAccountPayable_paginate").show();
                } else {
                    $(".errorModalReimbursementAccountPayableMessageContainerSecond").show();
                    $("#errorModalReimbursementAccountPayableMessageSecond").text(`Data not found.`);

                    $("#tableGetModalReimbursementAccountPayable_length").hide();
                    $("#tableGetModalReimbursementAccountPayable_filter").hide();
                    $("#tableGetModalReimbursementAccountPayable_info").hide();
                    $("#tableGetModalReimbursementAccountPayable_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalReimbursementAccountPayable tbody').empty();
                $(".loadingGetModalReimbursementAccountPayable").hide();
                $(".errorModalReimbursementAccountPayableMessageContainerSecond").show();
                $("#errorModalReimbursementAccountPayableMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalReimbursementAccountPayable();
    });
</script>