<div id="myDebitNote" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Debit Note</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableDebitNote">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Partner Code</th>
                                            <th>Partner Name</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalDebitNote">
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
                                        <tr class="errorModalDebitNoteMessageContainer" style="display: none;">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalDebitNoteMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalDebitNote() {
        $('#tableDebitNote tbody').empty();
        $(".loadingGetModalDebitNote").show();
        $(".errorModalDebitNoteMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("DebitNote.DataPickList") !!}',
            success: function(data) {
                $(".loadingGetModalDebitNote").hide();

                let no = 1;
                let table = $('#tableDebitNote').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        table.row.add([
                            '<input data-trigger="sys_id_modal_dn" value="' + val.sys_ID + '" type="hidden">' + no++,
                            val.sys_Text || '-',
                            val.partnerCode || '-',
                            val.partnerName || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                        ]).draw();
                    });
                } else {
                    $(".errorModalDebitNoteMessageContainer").show();
                    $("#errorModalDebitNoteMessage").text(`Data not found.`);

                    $("#tableDebitNote_length").hide();
                    $("#tableDebitNote_filter").hide();
                    $("#tableDebitNote_info").hide();
                    $("#tableDebitNote_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableDebitNote tbody').empty();
                $(".loadingGetModalDebitNote").hide();
                $(".errorModalDebitNoteMessageContainer").show();
                $("#errorModalDebitNoteMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalDebitNote();
    });
</script>