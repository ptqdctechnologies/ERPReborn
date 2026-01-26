<div id="myLoanSettlements" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Loan Settlement</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                             <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableLoanSettlements">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingLoanSettlements">
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
                                        <tr class="errorLoanSettlementsMessageContainer">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorLoanSettlementsMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorLoanSettlementsMessageContainer").hide();

    function getLoanSettlements() {
        $('#tableLoanSettlements tbody').empty();
        $(".loadingLoanSettlements").show();
        $(".errorLoanSettlementsMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getLoanSettlementList") !!}',
            success: function(data) {
                $(".loadingLoanSettlements").hide();

                var table = $('#tableLoanSettlements').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $('#tableLoanSettlements').DataTable({
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
                                        '<input id="sys_id_loan_settlements' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_loan_settlements" type="hidden">' +
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

                    $('#tableLoanSettlements').css("width", "100%");
                } else {
                    $('#tableLoanSettlements tbody').empty();

                    $(".errorLoanSettlementsMessageContainer").show();
                    $("#errorLoanSettlementsMessage").text(`Data not found.`);

                    $("#tableLoanSettlements_length").hide();
                    $("#tableLoanSettlements_filter").hide();
                    $("#tableLoanSettlements_info").hide();
                    $("#tableLoanSettlements_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableLoanSettlements tbody').empty();
                $(".loadingLoanSettlements").hide();
                $(".errorLoanSettlementsMessageContainer").show();
                $("#errorLoanSettlementsMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getLoanSettlements();
    });
</script>