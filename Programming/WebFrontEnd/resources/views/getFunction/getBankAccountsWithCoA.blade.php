<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Account Number
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="bank_coa_container" class="input-group-text form-control" data-toggle="modal"
                data-target="#banks_coa_modal" style="border-radius: 0; cursor: pointer;">
                <i id="bank_coa_icon" class="fas fa-gift"></i>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="bank_coa_preview" class="form-control"
                    style="border-radius:0; background-color: #fff;" readonly />
                <input type="hidden" class="form-control" id="bank_coa_id" name="bank_coa_id" />
                <input type="hidden" class="form-control" id="bank_coa_name" name="bank_coa_name" />
                <input type="hidden" class="form-control" id="bank_coa_code" name="bank_coa_code" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="bank_coa_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="bank_coa_message_text"></div>
</div>

<!-- MODAL -->
<div class="modal fade" id="banks_coa_modal" tabindex="-1" aria-labelledby="banks_coa_modal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="banks_coa_modal_label"
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
                                <table class="table table-head-fixed w-100" id="banks_coa_list_table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="banks_coa_list_loading_table">
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
    function getBanksWithCoA() {
        let table = $('#banks_coa_list_table').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("getBanksWithCoA") !!}',
                type: 'GET',
                beforeSend: function () {
                    $('#banks_coa_list_table tbody').empty();
                    $("#banks_coa_list_loading_table").show();
                },
                complete: function () {
                    $("#banks_coa_list_loading_table").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#banks_coa_list_loading_table").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return (meta.row + meta.settings._iDisplayStart + 1);
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.code
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.name
                    }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#banks_coa_list_table_filter');
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

                if ($('#searchHintBankCoA').length === 0) {
                    $filter.append(
                        '<small id="searchHintBankCoA" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }

            }
        });
    }

    $(document).ready(function () {
        $('#banks_coa_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>