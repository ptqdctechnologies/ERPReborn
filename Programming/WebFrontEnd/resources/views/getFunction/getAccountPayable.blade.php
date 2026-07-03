<div id="myAccountPayables" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true"
    style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Account Payable</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0" style="min-height: 400px;">
                                <table class="table table-responsive w-100" id="tableAccountPayables">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Status</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Supplier Code</th>
                                            <th>Supplier Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingAccountPayables">
                                            <td colspan="7" class="p-0" style="height: 22rem;">
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
    function getAccountPayable() {
        let table = $('#tableAccountPayables').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("AccountPayable.DataPickLists") !!}',
                type: 'GET',
                data: function (d) {
                    // d.combinedBudgetCode = combinedBudgetCode;
                    // d.combinedBudgetSectionCode = combinedBudgetSectionCode;

                    return d;
                },
                beforeSend: function () {
                    $('#tableAccountPayables tbody').empty();
                    $("#loadingAccountPayables").show();
                },
                complete: function () {
                    $("#loadingAccountPayables").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#loadingAccountPayables").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_account_payable' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_account_payable" type="hidden">' + (meta.row + meta.settings._iDisplayStart + 1);
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
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.latestWorkFlowStatus
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.combinedBudgetCode
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.combinedBudgetName
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    // render: function (data, type, row, meta) {
                    //     return data.additionalData.combinedBudgetName
                    // }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    // render: function (data, type, row, meta) {
                    //     return data.additionalData.combinedBudgetName
                    // }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#tableAccountPayables_filter');
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

                if ($('#searchHintAccountPayable').length === 0) {
                    $filter.append(
                        '<small id="searchHintAccountPayable" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }

            }
        });
    }
</script>

<!-- <script>
    function getAccountPayable() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("AccountPayable.DataPickLists") !!}',
        })
            .done(function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

                $('#tableAccountPayables').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_account_payable' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_account_payable" type="hidden">' + (meta.row + 1);
                            }
                        },
                        {
                            data: 'sys_Text',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'combinedBudgetCode',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'combinedBudgetName',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'supplierCode',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'supplierName',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingAccountPayables").hide();
            });
    }
</script> -->