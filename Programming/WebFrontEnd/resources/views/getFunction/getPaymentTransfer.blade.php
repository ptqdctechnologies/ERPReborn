<div id="myGetPaymentTransfer" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle"
    aria-hidden="true">
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
                            <div class="card-body p-0">
                                <table class="table table-head-fixed table-responsive w-100"
                                    id="tableGetPaymentTransfer">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Bank Code</th>
                                            <th>Bank Name</th>
                                            <th>Account Name</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingGetModalPaymentTransfer">
                                            <td colspan="8" class="p-0" style="height: 22rem;">
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
    let otherRow = {
        code: '-',
        name: 'Others',
        address: '-',
        bankCode: '-',
        bankName: '-',
        bankAccount: '-',
        accountNumber: '-',
        sys_ID: '-'
    };

    function getPaymentTransfer(supplierID) {
        $.ajax({
            type: 'POST',
            url: '{!! route("Supplier.SupplierPickList") !!}?supplier_id=' + supplierID,
        })
            .done(function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

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
                                return '<input id="sys_id_payment' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_payment" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'address',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'bankCode',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'bankName',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'bankAccount',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'accountNumber',
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
                $("#loadingGetModalPaymentTransfer").hide();
            });
    }
</script>