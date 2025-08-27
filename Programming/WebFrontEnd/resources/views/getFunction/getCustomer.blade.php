<div id="myCustomer" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Customer</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetCustomer">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalCustomer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalCustomerMessageContainer" style="display: none;">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalCustomerMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalCustomer() {
        $('#tableGetCustomer tbody').empty();
        $(".loadingGetModalCustomer").show();
        $(".errorModalCustomerMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getCustomerList") !!}',
            success: function(data) {
                $(".loadingGetModalCustomer").hide();

                let no = 1;
                let table = $('#tableGetCustomer').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        table.row.add([
                            '<input data-trigger="sys_id_modal_customer" value="' + val.sys_ID + '" type="hidden">' + no++,
                            val.code || '-',
                            val.sys_Text || '-',
                        ]).draw();
                    });
                } else {
                    $(".errorModalCustomerMessageContainer").show();
                    $("#errorModalCustomerMessage").text(`Data not found.`);

                    $("#tableGetCustomer_length").hide();
                    $("#tableGetCustomer_filter").hide();
                    $("#tableGetCustomer_info").hide();
                    $("#tableGetCustomer_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetCustomer tbody').empty();
                $(".loadingGetModalCustomer").hide();
                $(".errorModalCustomerMessageContainer").show();
                $("#errorModalCustomerMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalCustomer();
    });
</script>