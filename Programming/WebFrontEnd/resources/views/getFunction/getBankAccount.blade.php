<div class="modal fade" id="bankAccountListModal" tabindex="-1" aria-labelledby="bankAccountListModalLabe
   l" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bankAccountListModalLabel"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Bank Account
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed w-100" id="bankAccountListTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="bankAccountListLoadingTable">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
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
    function getBankAccountList(bankName, accountNumber) {
        let table = $('#bankAccountListTable').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("Bank.Account.picklist") !!}',
                type: 'GET',
                data: function (d) {
                    d.bank_name = bankName;
                    d.account_number = accountNumber;

                    return d;
                },
                beforeSend: function () {
                    $('#bankAccountListTable tbody').empty();
                    $("#bankAccountListLoadingTable").show();
                },
                complete: function () {
                    $("#bankAccountListLoadingTable").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#bankAccountListLoadingTable").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_bank' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bank" type="hidden">' +
                            (meta.row + meta.settings._iDisplayStart + 1)
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-wrap",
                    render: function (data, type, row, meta) {
                        return '<span style="line-height: normal;">' +
                            data.additionalData.bankName +
                            '</span>';
                    }
                },
                {
                    data: "sys_Text",
                    defaultContent: '-',
                    className: "align-middle text-wrap",
                    render: function (data, type, row, meta) {
                        return '<span style="line-height: normal;">' +
                            data +
                            '</span>';
                    }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#bankAccountListTable_filter');
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

                if ($('#searchHintBankAccount').length === 0) {
                    $filter.append(
                        '<small id="searchHintBankAccount" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }
            }
        });
    }
</script>