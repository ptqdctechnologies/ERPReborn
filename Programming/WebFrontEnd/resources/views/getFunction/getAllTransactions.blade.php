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
                        <select class="form-control select2" id="DocumentType"
                            onchange="getAllTransactions(this.value);" style="width: 100%;">
                            <option disabled>Select a Document Type</option>
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
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
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
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorAllTransactionsMessage" class="mt-3 text-red"
                                                        style="font-size: 1rem; font-weight: 700;"></div>
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
        const selectDocumentType = document.getElementById("DocumentType");
        const selectedDocumentTypeText = selectDocumentType.options[selectDocumentType.selectedIndex].text;

        let table = $('#tableAllTransactions').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("CheckDocument.ShowDocumentListData") !!}',
                type: 'GET',
                data: function (d) {
                    d.DocumentTypeID = businessDocumentTypeRefID;

                    return d;
                },
                beforeSend: function () {
                    $('#tableAllTransactions tbody').empty();
                    $(".loadingAllTransactions").show();
                    $(".errorAllTransactionsMessageContainer").hide();
                    $("#tableAllTransactions_length").hide();
                    $("#tableAllTransactions_filter").hide();
                    $("#tableAllTransactions_info").hide();
                    $("#tableAllTransactions_paginate").hide();
                },
                complete: function () {
                    $(".loadingAllTransactions").hide();
                    $("#tableAllTransactions_length").show();
                    $("#tableAllTransactions_filter").show();
                    $("#tableAllTransactions_info").show();
                    $("#tableAllTransactions_paginate").show();
                },
                error: function (xhr, error, thrown) {
                    $('#tableAllTransactions tbody').empty();
                    $(".loadingAllTransactions").hide();
                    $(".errorAllTransactionsMessageContainer").show();
                    $("#errorAllTransactionsMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            '<input id="sys_id_transaction' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_transaction" type="hidden">' +
                            '<input id="sys_id_budget' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.combinedBudget_RefID + '" data-trigger="sys_id_budget" type="hidden">' +
                            '<input id="selected_document_type_id' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + businessDocumentTypeRefID + '" data-trigger="selected_document_type_id" type="hidden">' +
                            '<input id="selected_document_type_name' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + selectedDocumentTypeText + '" data-trigger="selected_document_type_name" type="hidden">' +
                            (meta.row + meta.settings._iDisplayStart + 1)
                        )
                    }
                },
                {
                    data: 'sys_Text',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap text-center",
                    render: function (data, type, row, meta) {
                        return `${data.additionalData.combinedBudgetCode || '-'}`
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap text-center",
                    render: function (data, type, row, meta) {
                        return `${data.additionalData.combinedBudgetSectionCode || '-'}`
                    }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#tableAllTransactions_filter');
                let $searchLabel = $filter.find('label');
                let $searchInput = $filter.find('input');

                $searchLabel.css('margin-bottom', '0');
                $searchInput
                    .attr('placeholder', 'Search...')
                    .off('.DT')
                    .on('keypress', function (e) {
                        if (e.which === 13) {
                            api.search(this.value).draw();
                        }
                    });

                if ($('#searchHintAllTransactions').length === 0) {
                    $filter.append(
                        '<small id="searchHintAllTransactions" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }
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
            success: function (data) {
                if (data && Array.isArray(data)) {
                    $('#DocumentType').empty();
                    $('#DocumentType').append('<option disabled selected>Select a Project Code</option>');

                    data.forEach(function (document) {
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

    $(document).ready(function () {
        getAllDocumentType();
    });
</script>