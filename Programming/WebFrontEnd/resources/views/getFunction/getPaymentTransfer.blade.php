<div id="myGetPaymentTransfer" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Payment Transfer</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetPaymentTransfer">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Bank Code</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalPaymentTransfer">
                                            <td colspan="8" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalPaymentTransferMessageContainer" style="display: none;">
                                            <td colspan="8" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalPaymentTransferMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalPaymentTransferMessageContainer").hide();

    function getPaymentTransfer(supplierID) {
        $('#tableGetPaymentTransfer tbody').empty();
        $(".loadingGetModalPaymentTransfer").show();
        $(".errorModalPaymentTransferMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getSupplier") !!}?supplier_id=' + supplierID,
            success: function(data) {
                $(".loadingGetModalPaymentTransfer").hide();

                var table = $('#tableGetPaymentTransfer').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    var otherRow = {
                        code: '-',
                        name: 'Others',
                        address: '-',
                        bankCode: '-',
                        bankName: '-',
                        bankAccount: '-',
                        accountNumber: '-',
                        sys_ID: '-'
                    };

                    data.unshift(otherRow);

                    $('#tableGetPaymentTransfer').DataTable({
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
                                        '<input id="sys_id_payment' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_payment" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'code',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'name',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'address',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'bankCode',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'bankName',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'bankAccount',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'accountNumber',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetPaymentTransfer').css("width", "100%");
                } else {
                    $(".errorModalPaymentTransferMessageContainer").show();
                    $("#errorModalPaymentTransferMessage").text(`Data not found.`);

                    $("#tableGetPaymentTransfer_length").hide();
                    $("#tableGetPaymentTransfer_filter").hide();
                    $("#tableGetPaymentTransfer_info").hide();
                    $("#tableGetPaymentTransfer_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetPaymentTransfer tbody').empty();
                $(".loadingGetModalPaymentTransfer").hide();
                $(".errorModalPaymentTransferMessageContainer").show();
                $("#errorModalPaymentTransferMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getPaymentTransfer();
    });
</script>