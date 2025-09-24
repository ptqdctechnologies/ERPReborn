<!-- GET MATERIAL RECEIVE -->
<div id="myGetModalMaterialReceive" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Material Receive Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalMaterialReceive">
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
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalMaterialReceive">
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
                                        <tr class="errorModalMaterialReceiveMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalMaterialReceiveMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalMaterialReceiveMessageContainerSecond").hide();

    function getModalMaterialReceive() {
        $('#tableGetModalMaterialReceive tbody').empty();
        $(".loadingGetModalMaterialReceive").show();
        $(".errorModalMaterialReceiveMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("MaterialReceive.MaterialReceiveList") !!}',
            success: function(data) {
                $(".loadingGetModalMaterialReceive").hide();

                var no = 1;
                var table = $('#tableGetModalMaterialReceive').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_material_receive' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_material_receive" type="hidden">' + no++,
                            val.documentNumber || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                            // val.combinedBudgetSectionCode || '-',
                            // val.combinedBudgetSectionName || '-',
                        ]).draw();
                    });

                    $("#tableGetModalMaterialReceive_length").show();
                    $("#tableGetModalMaterialReceive_filter").show();
                    $("#tableGetModalMaterialReceive_info").show();
                    $("#tableGetModalMaterialReceive_paginate").show();
                } else {
                    $(".errorModalMaterialReceiveMessageContainerSecond").show();
                    $("#errorModalMaterialReceiveMessageSecond").text(`Data not found.`);

                    $("#tableGetModalMaterialReceive_length").hide();
                    $("#tableGetModalMaterialReceive_filter").hide();
                    $("#tableGetModalMaterialReceive_info").hide();
                    $("#tableGetModalMaterialReceive_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('textStatus, errorThrown', textStatus, errorThrown);
                
                $('#tableGetModalMaterialReceive tbody').empty();
                $(".loadingGetModalMaterialReceive").hide();
                $(".errorModalMaterialReceiveMessageContainerSecond").show();
                $("#errorModalMaterialReceiveMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalMaterialReceive();
    });

    $('#tableGetModalMaterialReceive').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_modal_material_receive"]').val();
        var trano           = $(this).find('td:nth-child(2)').text();
        var budgetCode      = $(this).find('td:nth-child(3)').text();
        var budgetName      = $(this).find('td:nth-child(4)').text();
        var subBudgetCode   = $(this).find('td:nth-child(5)').text();
        var subBudgetName   = $(this).find('td:nth-child(6)').text();

        $("#modal_material_receive_id").val(sysId);
        $("#modal_material_receive_document_number").val(trano);
        // $("#modal_material_receive_budget_code").val(trano);

        // adjustInputSize(document.getElementById("modal_material_receive_document_number"), "string");

        $('#myGetModalMaterialReceive').modal('hide');
    });
</script>