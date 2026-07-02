<!-- GET ADVANCE SETTLEMENT -->
<div id="myGetModalAdvanceSettlement" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Advance Settlement</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="min-height: 400px;">
                                <table class="table table-head-fixed w-100" id="tableGetModalAdvanceSettlement">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalAdvanceSettlement">
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
    function getModalAdvanceSettlement() {
        let table = $('#tableGetModalAdvanceSettlement').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("AdvanceSettlement.AdvanceSettlementPickList") !!}',
                type: 'GET',
                data: function (d) {
                    return d;
                },
                beforeSend: function () {
                    $('#tableGetModalAdvanceSettlement tbody').empty();
                    $("#loadingGetModalAdvanceSettlement").show();
                },
                complete: function () {
                    $("#loadingGetModalAdvanceSettlement").hide();
                },
                error: function () {
                    $("#loadingGetModalAdvanceSettlement").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_modal_advance_settlement' +
                            (meta.row + 1) +
                            '" value="' +
                            data.sys_ID +
                            '" data-trigger="sys_id_modal_advance_settlement" type="hidden">' +
                            (meta.row + 1);
                    }
                },
                {
                    data: 'sys_Text',
                    defaultContent: '-',
                    className: "align-middle text-wrap"
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data) {
                        return data.additionalData.combinedBudgetCode;
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data) {
                        return data.additionalData.combinedBudgetName;
                    }
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#tableGetModalAdvanceSettlement_filter');
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

    // function getModalAdvanceSettlement() {
    //     $('#tableGetModalAdvanceSettlement').DataTable({
    //         processing: true,
    //         serverSide: true,
    //         destroy: true,
    //         info: true,
    //         paging: true,
    //         searching: true,
    //         lengthChange: true,
    //         searchDelay: 1000,
    //         pageLength: 10,
    //         ajax: {
    //             url: '{!! route("AdvanceSettlement.AdvanceSettlementPickList") !!}',
    //             type: 'GET',
    //             data: function (d) {
    //                 // d.combinedBudgetCode = combinedBudgetCode;
    //                 // d.combinedBudgetSectionCode = combinedBudgetSectionCode;

    //                 return d;
    //             },
    //             beforeSend: function () {
    //                 $('#tableGetModalAdvanceSettlement tbody').empty();
    //                 $("#loadingGetModalAdvanceSettlement").show();
    //             },
    //             complete: function () {
    //                 $("#loadingGetModalAdvanceSettlement").hide();
    //             },
    //             error: function (xhr, error, thrown) {
    //                 $("#loadingGetModalAdvanceSettlement").hide();
    //             }
    //         },
    //         columns: [
    //             {
    //                 data: null,
    //                 render: function (data, type, row, meta) {
    //                     return '<input id="sys_id_modal_advance_settlement' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_advance_settlement" type="hidden">' + (meta.row + 1)
    //                 }
    //             },
    //             {
    //                 data: 'sys_Text',
    //                 defaultContent: '-',
    //                 className: "align-middle text-wrap"
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
    //             }
    //         ]
    //     });
    // }
</script>