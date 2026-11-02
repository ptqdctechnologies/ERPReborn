<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Transaction Type
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="transaction_type_container" class="input-group-text form-control" data-toggle="modal"
                data-target="<?= isset($transactionType['preview']) ? '' : '#transaction_type_modal'; ?>"
                style="border-radius: 0; cursor: <?= isset($transactionType['preview']) ? 'not-allowed' : 'pointer'; ?>;">
                <i id="transaction_type_icon" class="fas fa-gift"></i>

                <div id="transaction_type_loading" class="spinner-border spinner-border-sm" role="status"
                    style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="transaction_type_preview" class="form-control"
                    value="<?= isset($transactionType['preview']) ? $transactionType['preview'] : ''; ?>"
                    style="border-radius:0; background-color: <?= isset($transactionType['preview']) ? '#e9ecef' : '#fff' ?>;"
                    readonly />
                <input type="hidden" class="form-control" id="transaction_type_id" name="transaction_type_id"
                    value="<?= isset($transactionType['id']) ? $transactionType['id'] : ''; ?>" />
                <input type="hidden" class="form-control" id="transaction_type_name" name="transaction_type_name"
                    value="<?= isset($transactionType['name']) ? $transactionType['name'] : ''; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="transaction_type_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="transaction_type_message_text"></div>
</div>

<!-- MODAL -->
<div class="modal fade" id="transaction_type_modal" tabindex="-1" aria-labelledby="transaction_type_modal_label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction_type_modal_label"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Transaction Type
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
                                <table class="table table-head-fixed w-100" id="transaction_type_list_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="transaction_type_list_loading_table">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
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
    function getTransactionType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
        })
            .done(function (response) {
                console.log('response', response);

                let data = Array.isArray(response) && response.length > 0 ? response : [];

                $('#transaction_type_list_table').DataTable({
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
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            })
            .always(function () {
                $("#transaction_type_list_loading_table").hide();
            });
    }

    $(document).ready(function () {
        $('#transaction_type_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>