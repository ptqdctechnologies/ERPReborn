<div class="modal fade" id="referenceNumberModal" tabindex="-1" aria-labelledby="referenceNumberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Reference Number</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2" style="vertical-align: middle;">
                                    <label class="col-form-label p-0">
                                        Source
                                    </label>
                                </div>
                                <div class="col-4">
                                    <select class="form-control" onchange="getReferenceNumber(this);">
                                        <option disabled selected>Select a Source</option>
                                        <option value="PURCHASE_ORDER">Purchase Order</option>
                                        <option disabled value="INTERNAL_USE">Internal Use</option>
                                        {{-- <option disabled value="ORDER_PICKING">Order Picking</option> --}}
                                        <option disabled value="STOCK_MOVEMENT">Stock Movement</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap" id="referenceNumberTable">
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
                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="p-0" style="height: 22rem;"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingReferenceNumber">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div class="spinner-border" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                        Loading...
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="errorReferenceNumberMessageContainer">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorReferenceNumberMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getReferenceNumber(source) {
        let urls = '';

        if (source.value === "PURCHASE_ORDER") {
            urls = '{!! route("getPurchaseOrderList") !!}';
        } else if (source.value === "ORDER_PICKING") {
            urls = '';
        } else {
            urls = '';
        }

        if (urls) {
            $('#referenceNumberTable tbody').empty();
            $(".loadingReferenceNumber").show();
            $(".errorReferenceNumberMessageContainer").hide();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;
            $.ajax({
                type: 'GET',
                url: urls,
                success: function(data) {
                    $(".loadingReferenceNumber").hide();

                    var no = 1;
                    var table = $('#referenceNumberTable').DataTable();
                    table.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_reference_number' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_reference_number" type="hidden">' + no++,
                                '<input id="sys_combined_budget_RefID' + keys + '" value="' + val.combinedBudget_RefID[0] + '" data-trigger="sys_combined_budget_RefID" type="hidden">' + val.documentNumber || '-',
                                '<input id="sys_requester_RefID' + keys + '" value="' + val.requesterWorkerJobsPosition_RefID + '" data-trigger="sys_requester_RefID" type="hidden">' + val.combinedBudgetCode || '-',
                                val.combinedBudgetName || '-',
                                val.combinedBudgetSectionCode || '-',
                                val.combinedBudgetSectionName || '-',
                            ]).draw();
                        });

                        $("#referenceNumberTable_length").show();
                        $("#referenceNumberTable_filter").show();
                        $("#referenceNumberTable_info").show();
                        $("#referenceNumberTable_paginate").show();

                    } else {
                        $(".errorReferenceNumberMessageContainer").show();
                        $("#errorReferenceNumberMessage").text(`Data not found.`);

                        $("#referenceNumberTable_length").hide();
                        $("#referenceNumberTable_filter").hide();
                        $("#referenceNumberTable_info").hide();
                        $("#referenceNumberTable_paginate").hide();
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#referenceNumberTable tbody').empty();
                    $(".loadingReferenceNumber").hide();
                    $(".errorReferenceNumberMessageContainer").show();
                    $("#errorReferenceNumberMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                },
            });
        }
    }

    $(window).one('load', function(e) {
        $(".loadingReferenceNumber").hide();
        $(".errorReferenceNumberMessageContainer").hide();
    });
</script>