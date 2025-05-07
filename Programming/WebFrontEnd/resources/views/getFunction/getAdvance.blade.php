<!-- GET ADVANCE -->
<div id="myGetModalAdvance" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                        <tr class="errorModalAdvanceMessageContainerSecond">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
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
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getAdvance") !!}?project_id=' + project_id + '&site_id=' + site_id,
            success: function(data) {
                $(".loadingGetModalAdvance").hide();

                var no = 1;
                var table = $('#tableGetModalAdvance').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    console.log('data', data);
                    
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_advance' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_advance" type="hidden">' + no++,
                            '<input value="' + val.beneficiaryBankAccountName + '" data-trigger="beneficiary_bank_account_name" type="hidden">' + val.documentNumber || '-',
                            val.beneficiaryWorkerName || '-',
                            val.requesterWorkerName || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                            val.combinedBudgetSectionCode || '-',
                            val.combinedBudgetSectionName || '-',
                        ]).draw();
                    });

                    $("#tableGetModalAdvance_length").show();
                    $("#tableGetModalAdvance_filter").show();
                    $("#tableGetModalAdvance_info").show();
                    $("#tableGetModalAdvance_paginate").show();
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

    $('#tableGetModalAdvance').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_modal_advance"]').val();
        var trano           = $(this).find('td:nth-child(2)').text();
        var beneficiary     = $(this).find('td:nth-child(3)').text();
        var requester       = $(this).find('td:nth-child(4)').text();
        var budgetCode      = $(this).find('td:nth-child(5)').text();
        var budgetName      = $(this).find('td:nth-child(6)').text();
        var subBudgetCode   = $(this).find('td:nth-child(7)').text();
        var subBudgetName   = $(this).find('td:nth-child(8)').text();

        $("#modal_advance_id").val(sysId);
        $("#modal_advance_document_number").val(trano);
        $("#modal_advance_budget_code").val(trano);

        adjustInputSize(document.getElementById("modal_advance_document_number"), "string");

        $('#myGetModalAdvance').modal('hide');
    });
</script>