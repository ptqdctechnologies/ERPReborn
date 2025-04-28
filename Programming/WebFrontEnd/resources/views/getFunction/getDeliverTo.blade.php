<!-- GET WAREHOUSE -->
<div id="myDeliverTo" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Warehouse</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetDeliverTo">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warehouse Code</th>
                                            <th>Warehouse Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalDeliverTo">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalDeliverToMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalDeliverToMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalDeliverToMessageContainerSecond").hide();

    function getModalDeliverTo() {
        $('#tableGetDeliverTo tbody').empty();
        $(".loadingGetModalDeliverTo").show();
        $(".errorModalDeliverToMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getDeliverTo") !!}',
            success: function(data) {
                $(".loadingGetModalDeliverTo").hide();

                var no = 1;
                var table = $('#tableGetDeliverTo').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_deliver_to' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_modal_deliver_to" type="hidden">' + no++,
                            (val.Code || '-'),
                            (val.Name || '-'),
                            (val.Address || '-'),
                        ]).draw();
                    });

                    $("#tableGetDeliverTo_length").show();
                    $("#tableGetDeliverTo_filter").show();
                    $("#tableGetDeliverTo_info").show();
                    $("#tableGetDeliverTo_paginate").show();
                } else {
                    $(".errorModalDeliverToMessageContainerSecond").show();
                    $("#errorModalDeliverToMessageSecond").text(`Data not found.`);

                    $("#tableGetDeliverTo_length").hide();
                    $("#tableGetDeliverTo_filter").hide();
                    $("#tableGetDeliverTo_info").hide();
                    $("#tableGetDeliverTo_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetDeliverTo tbody').empty();
                $(".loadingGetModalDeliverTo").hide();
                $(".errorModalDeliverToMessageContainerSecond").show();
                $("#errorModalDeliverToMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalDeliverTo();
    });

    $('#tableGetDeliverTo').on('click', 'tbody tr', function() {
        var sysId   = $(this).find('input[data-trigger="sys_id_modal_deliver_to"]').val();
        var code    = $(this).find('td:nth-child(2)').text();
        var name    = $(this).find('td:nth-child(3)').text();

        $("#deliver_RefID").val(sysId);
        $("#deliverCode").val(code);
        $("#deliverName").val(name);

        $('#myDeliverTo').modal('hide');
    });
</script>