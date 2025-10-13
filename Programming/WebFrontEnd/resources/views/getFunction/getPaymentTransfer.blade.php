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
                                            <th>Bank Code</th>
                                            <th>Bank Name</th>
                                            <th>Bank Account</th>
                                            <th>Account Number</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalPaymentTransfer">
                                            <td colspan="7" class="p-0" style="height: 22rem;">
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
                                            <td colspan="7" class="p-0" style="height: 22rem;">
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
    function getModalPaymentTransfer() {
        $(".loadingGetModalPaymentTransfer").hide();

        const data = [
            {
                id: 0,
                code: 'VDR0001',
                name: 'Alumagada Jaya Mandiri',
                bankCode: 'BRI',
                bankName: 'Bank Rakyat Indonesia',
                bankAccount: 'Alumagada Jaya Mandiri',
                accountNumber: '005301004453305'
            },
            {
                id: 1,
                code: 'VDR0002',
                name: 'Alpine Cool Utama',
                bankCode: 'BCA',
                bankName: 'Bank Central Asia',
                bankAccount: 'Alpine Cool Utama',
                accountNumber: '7150306269'
            },
            {
                id: 2,
                code: 'VDR0003',
                name: 'Aledro Duta Jaya',
                bankCode: 'BNI',
                bankName: 'Bank Negara Indonesia',
                bankAccount: 'Aledro Duta Jaya',
                accountNumber: '8995885888'
            },
            {
                id: 3,
                code: 'VDR0004',
                name: 'Aji Perkasa',
                bankCode: 'BSI',
                bankName: 'Bank Syariah Indonesia',
                bankAccount: 'Aji Perkasa',
                accountNumber: '7240741347'
            }
        ];

        let no = 1;
        let table = $('#tableGetPaymentTransfer').DataTable();
        table.clear();

        $.each(data, function(key, val) {
            table.row.add([
                no++,
                val.code || '-',
                val.name || '-',
                val.bankCode || '-',
                val.bankName || '-',
                val.bankAccount || '-',
                val.accountNumber || '-'
            ]).draw();
        });
    }

    $(window).one('load', function(e) {
        getModalPaymentTransfer();
    });
</script>