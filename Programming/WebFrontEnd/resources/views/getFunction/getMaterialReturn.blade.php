<!-- GET ADVANCE -->
<div id="myGetModalMaterialReturn" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Material Return</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetModalMaterialReturn">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalMaterialReturn">
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
                                        <tr class="errorModalMaterialReturnMessageContainerSecond">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalMaterialReturnMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalMaterialReturnMessageContainerSecond").hide();

    function getModalMaterialReturn() {
        $('#tableGetModalMaterialReturn tbody').empty();
        $(".loadingGetModalMaterialReturn").show();
        $(".errorModalMaterialReturnMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("MaterialReturn.List") !!}',
            success: function(data) {
                console.log('data', data);
                
                $(".loadingGetModalMaterialReturn").hide();
                var no = 1;
                var table = $('#tableGetModalMaterialReturn').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_material_return' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_material_return" type="hidden">' + no++,
                            val.documentNumber || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                        ]).draw();
                    });

                    $("#tableGetModalMaterialReturn_length").show();
                    $("#tableGetModalMaterialReturn_filter").show();
                    $("#tableGetModalMaterialReturn_info").show();
                    $("#tableGetModalMaterialReturn_paginate").show();
                } else {
                    $(".errorModalMaterialReturnMessageContainerSecond").show();
                    $("#errorModalMaterialReturnMessageSecond").text(`Data not found.`);

                    $("#tableGetModalMaterialReturn_length").hide();
                    $("#tableGetModalMaterialReturn_filter").hide();
                    $("#tableGetModalMaterialReturn_info").hide();
                    $("#tableGetModalMaterialReturn_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetModalMaterialReturn tbody').empty();
                $(".loadingGetModalMaterialReturn").hide();
                $(".errorModalMaterialReturnMessageContainerSecond").show();
                $("#errorModalMaterialReturnMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalMaterialReturn();
    });
</script>