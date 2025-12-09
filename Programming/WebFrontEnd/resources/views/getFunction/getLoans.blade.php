<div id="myLoans" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Loan</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                             <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableLoans">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingLoans">
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
                                        <tr class="errorLoansMessageContainer">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorLoansMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorLoansMessageContainer").hide();

    function getLoans() {
        $('#tableLoans tbody').empty();
        $(".loadingLoans").show();
        $(".errorLoansMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getLoanList") !!}',
            success: function(data) {
                $(".loadingLoans").hide();

                // var no = 1;
                var table = $('#tableLoans').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    // $.each(data, function(key, val) {
                    //     keys += 1;
                    //     table.row.add([
                    //         '<input id="sys_id_loans' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_loans" type="hidden">' + no++,
                    //         val.sys_Text || '-',
                    //     ]).draw();
                    // });

                    $('#tableLoans').DataTable({
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
                                        '<input id="sys_id_loans' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_loans" type="hidden">' +
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

                    $('#tableLoans').css("width", "100%");

                    // $("#tableLoans_length").show();
                    // $("#tableLoans_filter").show();
                    // $("#tableLoans_info").show();
                    // $("#tableLoans_paginate").show();
                } else {
                    $('#tableLoans tbody').empty();

                    $(".errorLoansMessageContainer").show();
                    $("#errorLoansMessage").text(`Data not found.`);

                    $("#tableLoans_length").hide();
                    $("#tableLoans_filter").hide();
                    $("#tableLoans_info").hide();
                    $("#tableLoans_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableLoans tbody').empty();
                $(".loadingLoans").hide();
                $(".errorLoansMessageContainer").show();
                $("#errorLoansMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getLoans();
    });
</script>