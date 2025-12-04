<div id="myProductss" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Products</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetProductss">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalProductss">
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
                                        <tr class="errorModalProductssMessageContainer" style="display: none;">
                                            <td colspan="4" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalProductssMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getProductss() {
        $('#tableGetProductss tbody').empty();
        $(".loadingGetModalProductss").show();
        $(".errorModalProductssMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getProduct") !!}',
            success: function(data) {
                $(".loadingGetModalProductss").hide();

                // var no = 1;
                var table = $('#tableGetProductss').DataTable();
                table.clear();

                if (Array.isArray(data.data.data) && data.data.data.length > 0) {
                    // $.each(data.data.data, function(key, val) {
                    //     keys += 1;
                    //     table.row.add([
                    //         '<input id="sys_id_productss' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_productss" type="hidden">' + no++,
                    //         val.code || '-',
                    //         val.name || '-',
                    //         val.quantityUnitName || '-',
                    //     ]).draw();
                    // });

                    $('#tableGetProductss').DataTable({
                        destroy: true,
                        data: data.data.data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_product' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_productss" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'code',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                data: 'name',
                                defaultContent: '-',
                                className: "align-middle text-wrap"
                            },
                            {
                                data: 'quantityUnitName',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetProductss').css("width", "revert-layer");

                    $("#tableGetProductss_length").show();
                    $("#tableGetProductss_filter").show();
                    $("#tableGetProductss_info").show();
                    $("#tableGetProductss_paginate").show();
                } else {
                    $('#tableGetProductss tbody').empty();
                    $(".errorModalProductssMessageContainer").show();
                    $("#errorModalProductssMessage").text(`Data not found.`);

                    $("#tableGetProductss_length").hide();
                    $("#tableGetProductss_filter").hide();
                    $("#tableGetProductss_info").hide();
                    $("#tableGetProductss_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetProductss tbody').empty();
                $(".loadingGetModalProductss").hide();
                $(".errorModalProductssMessageContainer").show();
                $("#errorModalProductssMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    // $(window).one('load', function(e) {
    //     getProductss();
    // });
</script>