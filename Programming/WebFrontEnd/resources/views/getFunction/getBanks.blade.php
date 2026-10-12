<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Bank
    </label>
    <div class="col-5 d-flex">
        <div>
            <!-- data-toggle="modal" data-target="#bank_modal" -->
            <span id="bank_container" class="input-group-text form-control" style="border-radius:0;cursor:not-allowed;">
                <i id="bank_icon" class="fas fa-gift"></i>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="bank_preview" class="form-control"
                    value="<?= isset($bank['preview']) ? $bank['preview'] : ''; ?>"
                    style="border-radius:0; background-color: <?= isset($bank['preview']) ? '#e9ecef' : '#fff' ?>;"
                    readonly />
                <input type="hidden" class="form-control" id="bank_id" name="bank_id"
                    value="<?= isset($bank['id']) ? $bank['id'] : ''; ?>" />
                <input type="hidden" class="form-control" id="bank_name" name="bank_name"
                    value="<?= isset($bank['name']) ? $bank['name'] : ''; ?>" />
                <input type="hidden" class="form-control" id="bank_code" name="bank_code"
                    value="<?= isset($bank['code']) ? $bank['code'] : ''; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="bank_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="bank_message_text"></div>
</div>

<!-- MODAL -->
<div class="modal fade" id="bank_modal" tabindex="-1" aria-labelledby="bank_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bank_modal_label"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Bank
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
                                <table class="table table-head-fixed w-100" id="bank_list_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="bank_list_loading_table">
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
    function getBank(personID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBank") !!}?person_refID=' + personID
        })
            .done(function (response) {
                let data = response && response.length > 0 ? response : [];

                if (data.length === 1) {
                    $('#bank_preview').val(`${data[0].BankAcronym} - ${data[0].BankName}`);
                    $('#bank_id').val(data[0].Bank_RefID);
                    $('#bank_code').val(data[0].BankAcronym);
                    $('#bank_name').val(data[0].BankName);

                    $('#bank_preview').css("background-color", "#e9ecef");

                    $('#account_number_preview').val(data[0].FullBankAccountNumber);
                    $('#account_number_id').val(data[0].Sys_ID);
                    $('#account_number_code').val(`${data[0].BankAcronym} ${data[0].AccountNumber} a.n. ${data[0].AccountName}`);
                    $('#account_number_name').val(`${data[0].BankName} (${data[0].BankAcronym})`);

                    $('#account_number_preview').css("background-color", "#e9ecef");
                }

                $('#bank_list_table').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            data: 'BankAcronym',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'BankName',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function () {
                $("#bank_list_loading_table").hide();
            });
    }

    $(document).ready(function () {
        $('#bank_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>