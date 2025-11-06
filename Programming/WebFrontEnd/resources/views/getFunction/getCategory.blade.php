<div id="myGetCategory" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Category</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetCategory">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalCategory">
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
                                        <tr class="errorModalCategoryMessageContainer" style="display: none;">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalCategoryMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalCategory() {
        $('#tableGetCategory tbody').empty();
        $(".loadingGetModalCategory").show();
        $(".errorModalCategoryMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getAssetCategory") !!}',
            success: function(data) {
                $(".loadingGetModalCategory").hide();

                var no = 1;
                var table = $('#tableGetCategory').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_category' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_category" type="hidden">' + no++,
                            val.code || '-',
                            val.name || '-',
                        ]).draw();
                    });

                    $("#tableGetCategory_length").show();
                    $("#tableGetCategory_filter").show();
                    $("#tableGetCategory_info").show();
                    $("#tableGetCategory_paginate").show();
                } else {
                    $('#tableGetCategory tbody').empty();
                    $(".errorModalCategoryMessageContainer").show();
                    $("#errorModalCategoryMessage").text(`Data not found.`);

                    $("#tableGetCategory_length").hide();
                    $("#tableGetCategory_filter").hide();
                    $("#tableGetCategory_info").hide();
                    $("#tableGetCategory_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetCategory tbody').empty();
                $(".loadingGetModalCategory").hide();
                $(".errorModalCategoryMessageContainer").show();
                $("#errorModalCategoryMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalCategory();
    });
</script>