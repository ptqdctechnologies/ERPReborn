<div id="myInvoice" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Invoice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetInvoice">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalInvoice">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalInvoiceMessageContainer" style="display: none;">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalInvoiceMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalInvoice() {
        $('#tableGetInvoice tbody').empty();
        $(".loadingGetModalInvoice").show();
        $(".errorModalInvoiceMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getInvoiceList") !!}',
            success: function(data) {
                $(".loadingGetModalInvoice").hide();

                let no = 1;
                let table = $('#tableGetInvoice').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        table.row.add([
                            '<input data-trigger="sys_id_modal_invoice" value="' + val.sys_ID + '" type="hidden">' + no++,
                            val.sys_Text || '-',
                        ]).draw();
                    });
                } else {
                    $(".errorModalInvoiceMessageContainer").show();
                    $("#errorModalInvoiceMessage").text(`Data not found.`);

                    $("#tableGetInvoice_length").hide();
                    $("#tableGetInvoice_filter").hide();
                    $("#tableGetInvoice_info").hide();
                    $("#tableGetInvoice_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetInvoice tbody').empty();
                $(".loadingGetModalInvoice").hide();
                $(".errorModalInvoiceMessageContainer").show();
                $("#errorModalInvoiceMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalInvoice();
    });
</script>