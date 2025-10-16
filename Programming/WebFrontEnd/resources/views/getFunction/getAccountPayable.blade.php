<div id="myAccountPayables" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Account Payable Number</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableAccountPayables">
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
                                        <tr class="loadingAccountPayables">
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
                                        <tr class="errorAccountPayablesMessageContainer">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorAccountPayablesMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorAccountPayablesMessageContainer").hide();

    function getAccountPayable() {
        $('#tableAccountPayables tbody').empty();
        $(".loadingAccountPayables").show();
        $(".errorAccountPayablesMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("AccountPayable.DataPickList") !!}',
            success: function(data) {
                $(".loadingAccountPayables").hide();

                var no = 1;
                var table = $('#tableAccountPayables').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_account_payable' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_account_payable" type="hidden">' + no++,
                            val.sys_Text || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                        ]).draw();
                    });

                    $("#tableAccountPayables_length").show();
                    $("#tableAccountPayables_filter").show();
                    $("#tableAccountPayables_info").show();
                    $("#tableAccountPayables_paginate").show();
                } else {
                    $(".errorAccountPayablesMessageContainer").show();
                    $("#errorAccountPayablesMessage").text(`Data not found.`);

                    $("#tableAccountPayables_length").hide();
                    $("#tableAccountPayables_filter").hide();
                    $("#tableAccountPayables_info").hide();
                    $("#tableAccountPayables_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableAccountPayables tbody').empty();
                $(".loadingAccountPayables").hide();
                $(".errorAccountPayablesMessageContainer").show();
                $("#errorAccountPayablesMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getAccountPayable();
    });
</script>