<div id="myTransporters" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Transporter</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <table class="table table-head-fixed w-100" id="tableTransporters">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr id="loadingTransporters">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
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
    function getTransporters() {
        $.ajax({
            type: 'POST',
            url: '{!! route("getTransporter") !!}',
        })
            .done(function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

                $('#tableTransporters').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_transporters' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_transporters" type="hidden">' +
                                    '<input id="address_transporters' + (meta.row + 1) + '" value="' + data.address + '" data-trigger="address_transporters" type="hidden">' +
                                    '<input id="mobile_phone_transporters' + (meta.row + 1) + '" value="' + data.contactNumber_MobilePhone + '" data-trigger="mobile_phone_transporters" type="hidden">' +
                                    '<input id="office_phone_transporters' + (meta.row + 1) + '" value="' + data.contactNumber_OfficePhone + '" data-trigger="office_phone_transporters" type="hidden">' +
                                    '<input id="fax_transporters' + (meta.row + 1) + '" value="' + data.contactNumber_Faximile + '" data-trigger="fax_transporters" type="hidden">' +
                                    '<input id="email_transporters' + (meta.row + 1) + '" value="' + data.EMailAccount_Business + '" data-trigger="email_transporters" type="hidden">' +
                                    (meta.row + 1)
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'sys_Text',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingTransporters").hide();
            });
    }
</script>