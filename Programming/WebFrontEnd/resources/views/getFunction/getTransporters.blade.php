<div id="myTransporters" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Transporter</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableTransporters">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingTransporters">
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
                                        <tr class="errorTransportersMessageContainer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorTransportersMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorTransportersMessageContainer").hide();

    function getTransporters() {
        $('#tableTransporters tbody').empty();
        $(".loadingTransporters").show();
        $(".errorTransportersMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getTransporter") !!}',
            success: function(data) {
                $(".loadingTransporters").hide();

                var no = 1;
                var table = $('#tableTransporters').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_transporters' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_transporters" type="hidden">' + 
                            '<input id="address_transporters' + keys + '" value="' + val.address + '" data-trigger="address_transporters" type="hidden">' + 
                            '<input id="mobile_phone_transporters' + keys + '" value="' + val.contactNumber_MobilePhone + '" data-trigger="mobile_phone_transporters" type="hidden">' + 
                            '<input id="office_phone_transporters' + keys + '" value="' + val.contactNumber_OfficePhone + '" data-trigger="office_phone_transporters" type="hidden">' + 
                            '<input id="fax_transporters' + keys + '" value="' + val.contactNumber_Faximile + '" data-trigger="fax_transporters" type="hidden">' + 
                            '<input id="email_transporters' + keys + '" value="' + val.EMailAccount_Business + '" data-trigger="email_transporters" type="hidden">' + 
                            no++,
                            val.code || '-',
                            val.sys_Text || '-',
                        ]).draw();
                    });

                    $("#tableTransporters_length").show();
                    $("#tableTransporters_filter").show();
                    $("#tableTransporters_info").show();
                    $("#tableTransporters_paginate").show();
                } else {
                    $(".errorTransportersMessageContainer").show();
                    $("#errorTransportersMessage").text(`Data not found.`);

                    $("#tableTransporters_length").hide();
                    $("#tableTransporters_filter").hide();
                    $("#tableTransporters_info").hide();
                    $("#tableTransporters_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableTransporters tbody').empty();
                $(".loadingTransporters").hide();
                $(".errorTransportersMessageContainer").show();
                $("#errorTransportersMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getTransporters();
    });
</script>