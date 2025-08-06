<div id="myDeliveryOrder" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Delivery Order</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetDeliveryOrder">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            {{-- <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingGetDeliveryOrder">
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
                                        <tr class="errorDeliveryOrderMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorDeliveryOrderMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorDeliveryOrderMessageContainerSecond").hide();

    function getDeliveryOrder() {
        $('#tableGetDeliveryOrder tbody').empty();
        $(".loadingGetDeliveryOrder").show();
        $(".errorDeliveryOrderMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getDeliveryOrderList") !!}',
            success: function(data) {
                $(".loadingGetDeliveryOrder").hide();

                var no = 1;
                var table = $('#tableGetDeliveryOrder').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_delivery_order' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_delivery_order" type="hidden">' + no++,
                            val.sys_Text || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                            // val.combinedBudgetSectionCode || '-',
                            // val.combinedBudgetSectionName || '-'
                        ]).draw();
                    });

                    $("#tableGetDeliveryOrder_length").show();
                    $("#tableGetDeliveryOrder_filter").show();
                    $("#tableGetDeliveryOrder_info").show();
                    $("#tableGetDeliveryOrder_paginate").show();
                } else {
                    $(".errorDeliveryOrderMessageContainerSecond").show();
                    $("#errorDeliveryOrderMessageSecond").text(`Data not found.`);

                    $("#tableGetDeliveryOrder_length").hide();
                    $("#tableGetDeliveryOrder_filter").hide();
                    $("#tableGetDeliveryOrder_info").hide();
                    $("#tableGetDeliveryOrder_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetDeliveryOrder tbody').empty();
                $(".loadingGetDeliveryOrder").hide();
                $(".errorDeliveryOrderMessageContainerSecond").show();
                $("#errorDeliveryOrderMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getDeliveryOrder();
    });

    $('#tableGetDeliveryOrder').on('click', 'tbody tr', function() {
        var sysId                       = $(this).find('input[data-trigger="sys_id_delivery_order"]').val();
        var projectCode                 = $(this).find('td:nth-child(2)').text();

        $("#delivery_order_id").val(sysId);
        $("#delivery_order_code").val(projectCode);

        $('#myDeliveryOrder').modal('hide');
    });
</script>