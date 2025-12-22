<div id="myJournal" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Journal</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetJournal">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalJournal">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalJournalMessageContainer" style="display: none;">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalJournalMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getJournal() {
        $('#tableGetJournal tbody').empty();
        $(".loadingGetModalJournal").show();
        $(".errorModalJournalMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("Journal.DataPickList") !!}',
            success: function(data) {
                $(".loadingGetModalJournal").hide();

                let table = $('#tableGetJournal').DataTable();
                table.clear();

                if (data.status === 200) {
                    $('#tableGetJournal').DataTable({
                        destroy: true,
                        data: data.data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_journal' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_journal" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'sys_Text',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetJournal').css("width", "100%");

                    $("#tableGetJournal_length").show();
                    $("#tableGetJournal_filter").show();
                    $("#tableGetJournal_info").show();
                    $("#tableGetJournal_paginate").show();
                } else {
                    $('#tableGetJournal tbody').empty();
                    $(".errorModalJournalMessageContainer").show();
                    $("#errorModalJournalMessage").text(`Data not found.`);

                    $("#tableGetJournal_length").hide();
                    $("#tableGetJournal_filter").hide();
                    $("#tableGetJournal_info").hide();
                    $("#tableGetJournal_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetJournal tbody').empty();
                $(".loadingGetModalJournal").hide();
                $(".errorModalJournalMessageContainer").show();
                $("#errorModalJournalMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    // $(window).one('load', function(e) {
    //     getJournal();
    // });
</script>