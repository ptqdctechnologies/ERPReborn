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

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSupplier") !!}?supplier_id=' + supplierID,
            success: function(data) {
                $(".loadingGetModalPaymentTransfer").hide();

                var no = 1;
                var table = $('#tableGetPaymentTransfer').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_payment' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_payment" type="hidden">' + no++,
                            val.code || '-',
                            val.name || '-',
                            val.address || '-',
                            val.bankCode || '-',
                            val.bankName || '-',
                            val.bankAccount || '-',
                            val.accountNumber || '-',
                        ]).draw();
                    });

                    $("#tableGetPaymentTransfer_length").show();
                    $("#tableGetPaymentTransfer_filter").show();
                    $("#tableGetPaymentTransfer_info").show();
                    $("#tableGetPaymentTransfer_paginate").show();
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