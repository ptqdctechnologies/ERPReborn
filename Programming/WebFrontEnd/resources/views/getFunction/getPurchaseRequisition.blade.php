<div id="purchaseRequisitionModal" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Purchase Request</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalPurchaseRequisition">
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
                                        <tr class="loadingGetModalPurchaseRequisition">
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
                                        <tr class="errorModalPurchaseRequisitionMessageContainerSecond">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalPurchaseRequisitionMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalPurchaseRequisitionMessageContainerSecond").hide();

    function getModalPurchaseRequisition() {
        $('#tableGetModalPurchaseRequisition tbody').empty();
        $(".loadingGetModalPurchaseRequisition").show();
        $(".errorModalPurchaseRequisitionMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseRequisitionList") !!}',
            success: function(data) {
                $(".loadingGetModalPurchaseRequisition").hide();

                // var no = 1;
                var table = $('#tableGetModalPurchaseRequisition').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    // $.each(data, function(key, val) {
                    //     keys += 1;
                    //     table.row.add([
                    //         '<input id="sys_id_modal_purchase_requisition' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_purchase_requisition" type="hidden">' + no++,
                    //         '<input id="sys_id_combinedBudget_purchase_requisition' + keys + '" value="' + val.combinedBudget_RefID + '" data-trigger="sys_id_combinedBudget_purchase_requisition" type="hidden">' + val.sys_Text || '-',
                    //         val.combinedBudgetCode || '-',
                    //         val.combinedBudgetName || '-',
                    //         val.combinedBudgetSectionCode || '-',
                    //         val.combinedBudgetSectionName || '-',
                    //     ]).draw();
                    // });

                    $('#tableGetProductss').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_modal_purchase_requisition' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_purchase_requisition" type="hidden">' +
                                        '<input id="sys_id_combinedBudget_purchase_requisition' + (meta.row + 1) + '" value="' + data.combinedBudget_RefID + '" data-trigger="sys_id_combinedBudget_purchase_requisition" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'sys_Text',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetSectionCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'combinedBudgetSectionName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                        ]
                    });

                    // $("#tableGetModalPurchaseRequisition_length").show();
                    // $("#tableGetModalPurchaseRequisition_filter").show();
                    // $("#tableGetModalPurchaseRequisition_info").show();
                    // $("#tableGetModalPurchaseRequisition_paginate").show();
                } else {
                    $(".errorModalPurchaseRequisitionMessageContainerSecond").show();
                    $("#errorModalPurchaseRequisitionMessageSecond").text(`Data not found.`);

                    $("#tableGetModalPurchaseRequisition_length").hide();
                    $("#tableGetModalPurchaseRequisition_filter").hide();
                    $("#tableGetModalPurchaseRequisition_info").hide();
                    $("#tableGetModalPurchaseRequisition_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
                
                $('#tableGetModalPurchaseRequisition tbody').empty();
                $(".loadingGetModalPurchaseRequisition").hide();
                $(".errorModalPurchaseRequisitionMessageContainerSecond").show();
                $("#errorModalPurchaseRequisitionMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalPurchaseRequisition();
    });

    $('#tableGetModalPurchaseRequisition').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_modal_purchase_requisition"]').val();
        var trano = $(this).find('td:nth-child(2)').text();

        $("#modal_purchase_requisition_id").val(sysId);
        $("#modal_purchase_requisition_document_number").val(trano);

        // adjustInputSize(document.getElementById("modal_purchase_requisition_document_number"), "string");

        $('#purchaseRequisitionModal').modal('hide');
    });
</script>