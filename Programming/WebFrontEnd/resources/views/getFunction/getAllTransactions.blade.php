<div id="myAllTransactions" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Transactions</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col-5">
                        <select class="form-control select2" id="DocumentType" onchange="getAllTransactions(this);" style="width: 100%;">
                            <option disabled selected>Select a Document Type</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 410px;">
                                <table class="table table-head-fixed text-nowrap" id="tableAllTransactions">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Project Code</th>
                                            <th>Site Code</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingAllTransactions" style="display: none;">
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
                                        <tr class="errorAllTransactionsMessageContainer" style="display: none;">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorAllTransactionsMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getAllTransactions(businessDocumentTypeRefID) {
        $('#tableAllTransactions tbody').empty();
        $(".loadingAllTransactions").show();
        $(".errorAllTransactionsMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getListTransactionByDocumentTypeID") !!}?businessDocumentTypeRef_ID=' + businessDocumentTypeRefID.value,
            success: function(data) {
                $(".loadingAllTransactions").hide();
                
                let table = $('#tableAllTransactions').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $('#tableAllTransactions').DataTable({
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
                                        '<input id="sys_id_transaction' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_transaction" type="hidden">' +
                                        '<input id="sys_id_budget' + (meta.row + 1) + '" value="' + data.combinedBudget_RefID + '" data-trigger="sys_id_budget" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'sys_Text',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetName',
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

                    $('#tableAllTransactions').css("width", "100%");
                } else {
                    $(".errorAllTransactionsMessageContainer").show();
                    $("#errorAllTransactionsMessage").text(`Data not found.`);

                    $("#tableAllTransactions_length").hide();
                    $("#tableAllTransactions_filter").hide();
                    $("#tableAllTransactions_info").hide();
                    $("#tableAllTransactions_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableAllTransactions tbody').empty();
                $(".loadingAllTransactions").hide();
                $(".errorAllTransactionsMessageContainer").show();
                $("#errorAllTransactionsMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function getAllDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                if (data && Array.isArray(data)) {
                    $('#DocumentType').empty();
                    $('#DocumentType').append('<option disabled selected>Select a Project Code</option>');

                    data.forEach(function(document) {
                        $('#DocumentType').append('<option value="' + document.sys_ID + '" data-name="' + document.name + '">' + document.name + '</option>');
                    });
                } else {
                    console.log('Data document type not found.');
                }
            },
            error: function (textStatus, errorThrown) {
            }
        });
    }

    $(window).one('load', function(e) {
        getAllDocumentType();
    });
</script>