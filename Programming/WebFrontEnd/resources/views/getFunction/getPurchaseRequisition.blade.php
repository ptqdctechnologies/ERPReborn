<!-- GET PURCHASE REQUISITION -->
<div id="purchaseRequisitionModal" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Purchase Request Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0" style="min-height: 400px;">
                                <table class="table table-head-fixed table-responsive w-100"
                                    id="tableGetModalPurchaseRequisition">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalPurchaseRequisition">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
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
    function getModalPurchaseRequisition() {
        let table = $('#tableGetModalPurchaseRequisition').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                type: 'GET',
                url: '{!! route("PurchaseRequisition.PurchaseRequisitionPickList") !!}',
                data: function (d) {
                    // d.combinedBudgetCode = combinedBudgetCode;
                    // d.combinedBudgetSectionCode = combinedBudgetSectionCode;

                    return d;
                },
                beforeSend: function () {
                    $('#tableGetModalPurchaseRequisition tbody').empty();
                    $("#loadingGetModalPurchaseRequisition").show();
                },
                complete: function () {
                    $("#loadingGetModalPurchaseRequisition").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#loadingGetModalPurchaseRequisition").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_modal_purchase_requisition' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_purchase_requisition" type="hidden">' +
                            '<input id="sys_id_combinedBudget_purchase_requisition' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.combinedBudget_RefID + '" data-trigger="sys_id_combinedBudget_purchase_requisition" type="hidden">' +
                            '<input id="workflow_status_purchase_request' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.latestWorkFlowStatus + '" data-trigger="workflow_status_purchase_request" type="hidden">' +
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

                let $filter = $('#tableGetModalPurchaseRequisition_filter');
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

                if ($('#searchHintPurchaseRequisition').length === 0) {
                    $filter.append(
                        '<small id="searchHintPurchaseRequisition" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }

            }
        });
    }

    // function getModalPurchaseRequisition() {
    //     $.ajax({
    //         type: 'POST',
    //         url: '{!! route("PurchaseRequisition.PurchaseRequisitionPickList") !!}'
    //     })
    //         .done(function (response) {
    //             let data = (response.status == 200 && response.data[0]) ? response.data : [];

    //             $('#tableGetModalPurchaseRequisition').DataTable({
    //                 destroy: true,
    //                 data: data,
    //                 deferRender: true,
    //                 scrollCollapse: true,
    //                 scroller: true,
    // columns: [
    //     {
    //         data: null,
    //         render: function (data, type, row, meta) {
    //             return '<input id="sys_id_modal_purchase_requisition' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_purchase_requisition" type="hidden">' +
    //                 '<input id="sys_id_combinedBudget_purchase_requisition' + (meta.row + 1) + '" value="' + data.combinedBudget_RefID + '" data-trigger="sys_id_combinedBudget_purchase_requisition" type="hidden">' +
    //                 (meta.row + 1)
    //         }
    //     },
    //     {
    //         data: 'sys_Text',
    //         defaultContent: '-',
    //         className: "align-middle text-nowrap"
    //     },
    //     {
    //         data: 'combinedBudgetCode',
    //         defaultContent: '-',
    //         className: "align-middle text-nowrap"
    //     },
    //     {
    //         data: 'combinedBudgetName',
    //         defaultContent: '-',
    //         className: "align-middle text-nowrap"
    //     },
    //     {
    //         data: 'combinedBudgetSectionCode',
    //         defaultContent: '-',
    //         className: "align-middle text-nowrap"
    //     },
    //     {
    //         data: 'combinedBudgetSectionName',
    //         defaultContent: '-',
    //         className: "align-middle text-nowrap"
    //     }
    // ]
    //             });
    //         })
    //         .fail(function (jqXHR, textStatus, errorThrown) {
    //             console.error("Error:", errorThrown);
    //         })
    //         .always(function (jqXHR, textStatus, errorThrown) {
    //             $("#loadingGetModalPurchaseRequisition").hide();
    //         });
    // }
</script>