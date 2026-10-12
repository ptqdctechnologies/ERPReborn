<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Account Number
    </label>
    <div class="col-5 d-flex">
        <div>
            <!-- data-toggle="modal" data-target="#account_number_modal" -->
            <span id="account_number_container" class="input-group-text form-control"
                style="border-radius:0;cursor:not-allowed;">
                <i id="account_number_icon" class="fas fa-gift"></i>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="account_number_preview" class="form-control"
                    value="<?= isset($account_number['preview']) ? $account_number['preview'] : ''; ?>"
                    style="border-radius:0; background-color: <?= isset($account_number['preview']) ? '#e9ecef' : '#fff' ?>;"
                    readonly />
                <input type="hidden" class="form-control" id="account_number_id" name="account_number_id"
                    value="<?= isset($account_number['id']) ? $account_number['id'] : ''; ?>" />
                <input type="hidden" class="form-control" id="account_number_name" name="account_number_name"
                    value="<?= isset($account_number['name']) ? $account_number['name'] : ''; ?>" />
                <input type="hidden" class="form-control" id="account_number_code" name="account_number_code"
                    value="<?= isset($account_number['code']) ? $account_number['code'] : ''; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="account_number_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="account_number_message_text"></div>
</div>

<!-- MODAL -->
<div class="modal fade" id="account_number_modal" tabindex="-1" aria-labelledby="account_number_modal_label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="account_number_modal_label"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Account Number
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
                                <table class="table table-head-fixed w-100" id="account_number_list_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="account_number_list_loading_table">
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
    function getBankAccounts(bankName, accountNumber) {
        let table = $('#account_number_list_table').DataTable({
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
                dataSrc: function (json) {

                    // simpan seluruh response
                    if (json.data.length === 1) {
                        $('#account_number_preview').val(json.data[0].sys_Text);
                        $('#account_number_id').val(json.data[0].sys_ID);
                        $('#account_number_code').val(json.data[0].additionalData.bankName);
                        $('#account_number_name').val(json.data[0].sys_Text);

                        $('#account_number_preview').css("background-color", "#e9ecef");
                    }

                    // wajib return data untuk DataTable
                    return json.data;
                },
                beforeSend: function () {
                    $('#account_number_list_table tbody').empty();
                    $("#account_number_list_loading_table").show();
                },
                complete: function () {
                    $("#account_number_list_loading_table").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#account_number_list_loading_table").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_bank_account' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bank_account" type="hidden">' +
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

                let $filter = $('#account_number_list_table_filter');
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

    $(document).ready(function () {
        $('#account_number_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>