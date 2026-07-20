<div class="modal fade" id="businessTripSettlementListModal" tabindex="-1"
    aria-labelledby="businessTripSettlementListModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="businessTripSettlementListModalLabel"
                    style="font-size: 15px; font-weight:bold; text-align: center;">
                    Choose Business Trip Settlement
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
                                <table class="table table-head-fixed w-100" id="businessTripSettlementListTable">
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
                                        <tr id="businessTripSettlementListLoadingTable">
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
    function getBusinessTripSettlementList() {
        let table = $('#businessTripSettlementListTable').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("BusinessTripSettlement.picklist") !!}',
                type: 'GET',
                data: function (d) {
                    // d.combinedBudgetCode = combinedBudgetCode;
                    // d.combinedBudgetSectionCode = combinedBudgetSectionCode;

                    return d;
                },
                beforeSend: function () {
                    $('#businessTripSettlementListTable tbody').empty();
                    $("#businessTripSettlementListLoadingTable").show();
                },
                complete: function () {
                    $("#businessTripSettlementListLoadingTable").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#businessTripSettlementListLoadingTable").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_bsf' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_bsf" type="hidden">' +
                            '<input id="sys_id_budget' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.combinedBudget_RefID + '" data-trigger="sys_id_budget" type="hidden">' +
                            '<input id="workflow_status_business_trip' + (meta.row + meta.settings._iDisplayStart + 1) + '" value="' + data.additionalData.latestWorkFlowStatus + '" data-trigger="workflow_status_business_trip" type="hidden">' +
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

                let $filter = $('#businessTripSettlementListTable_filter');
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

                if ($('#searchHintBusinessTripSettlement').length === 0) {
                    $filter.append(
                        '<small id="searchHintBusinessTripSettlement" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }
            }
        });
    }
</script>