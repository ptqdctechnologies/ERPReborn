<!-- GET ADVANCE -->
<div id="myGetModalAdvance" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Advance Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0" style="min-height: 400px;">
                                <table class="table table-head-fixed table-responsive w-100" id="tableGetModalAdvance">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Status</th>
                                            <th>Beneficiary</th>
                                            <th>Requester</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalAdvance">
                                            <td colspan="9" class="p-0" style="height: 22rem;">
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
    function getModalAdvance(combinedBudgetCode, combinedBudgetSectionCode) {
        let table = $('#tableGetModalAdvance').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("AdvanceRequest.AdvancePickList") !!}',
                type: 'GET',
                data: function (d) {
                    d.combinedBudgetCode = combinedBudgetCode;
                    d.combinedBudgetSectionCode = combinedBudgetSectionCode;

                    return d;
                },
                beforeSend: function () {
                    $('#tableGetModalAdvance tbody').empty();
                    $("#loadingGetModalAdvance").show();
                },
                complete: function () {
                    $("#loadingGetModalAdvance").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#loadingGetModalAdvance").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_modal_advance' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_advance" type="hidden">' +
                            '<input id="sys_id_budget_advance' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.combinedBudget_RefID + '" data-trigger="sys_id_budget_advance" type="hidden">' +
                            (meta.row + meta.settings._iDisplayStart + 1)
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
                        return data.additionalData.beneficiaryWorkerName
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.requesterWorkerName
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
                    render: function (data, type, row, meta) {
                        return data.additionalData.combinedBudgetSectionCode
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.combinedBudgetSectionName
                    }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#tableGetModalAdvance_filter');
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

                if ($('#searchHintAdvance').length === 0) {
                    $filter.append(
                        '<small id="searchHintAdvance" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }

            }
        });
    }

    // function getModalAdvance(combinedBudgetCode, combinedBudgetSectionCode) {
    //     $('#tableGetModalAdvance').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         destroy: true,
    //         info: true,
    //         paging: true,
    //         searching: true,
    //         lengthChange: true,
    //         pageLength: 10,
    //         ajax: {
    //             url: '{!! route("AdvanceRequest.AdvancePickList") !!}',
    //             type: 'GET',
    //             data: function (d) {
    //                 d.combinedBudgetCode = combinedBudgetCode;
    //                 d.combinedBudgetSectionCode = combinedBudgetSectionCode;

    //                 return d;
    //             },
    //             beforeSend: function () {
    //                 $('#tableGetModalAdvance tbody').empty();
    //                 $("#loadingGetModalAdvance").show();
    //             },
    //             complete: function () {
    //                 $("#loadingGetModalAdvance").hide();
    //             },
    //             error: function (xhr, error, thrown) {
    //                 $("#loadingGetModalAdvance").hide();
    //             }
    //         },
    //         columns: [
    //             {
    //                 data: null,
    //                 render: function (data, type, row, meta) {
    //                     return '<input id="sys_id_modal_advance' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_advance" type="hidden">' +
    //                         '<input id="sys_id_budget_advance' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.combinedBudget_RefID + '" data-trigger="sys_id_budget_advance" type="hidden">' +
    //                         (meta.row + meta.settings._iDisplayStart + 1)
    //                 }
    //             },
    //             {
    //                 data: 'sys_Text',
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap"
    //             },
    //             {
    //                 data: null,
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap",
    //                 render: function (data, type, row, meta) {
    //                     return data.additionalData.beneficiaryWorkerName
    //                 }
    //             },
    //             {
    //                 data: null,
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap",
    //                 render: function (data, type, row, meta) {
    //                     return data.additionalData.requesterWorkerName
    //                 }
    //             },
    //             {
    //                 data: null,
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap",
    //                 render: function (data, type, row, meta) {
    //                     return data.additionalData.combinedBudgetCode
    //                 }
    //             },
    //             {
    //                 data: null,
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap",
    //                 render: function (data, type, row, meta) {
    //                     return data.additionalData.combinedBudgetName
    //                 }
    //             },
    //             {
    //                 data: null,
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap",
    //                 render: function (data, type, row, meta) {
    //                     return data.additionalData.combinedBudgetSectionCode
    //                 }
    //             },
    //             {
    //                 data: null,
    //                 defaultContent: '-',
    //                 className: "align-middle text-nowrap",
    //                 render: function (data, type, row, meta) {
    //                     return data.additionalData.combinedBudgetSectionName
    //                 }
    //             }
    //         ]
    //     });
    // }
</script>