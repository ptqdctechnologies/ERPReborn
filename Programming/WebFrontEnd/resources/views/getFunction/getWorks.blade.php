<div id="myWorks" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Work</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableWorks">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalWorks">
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
                                        <tr class="errorModalWorksMessageContainer" style="display: none;">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalWorksMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalWorks() {
        $('#tableWorks tbody').empty();
        $(".loadingGetModalWorks").show();
        $(".errorModalWorksMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getWorks") !!}',
            success: function(data) {
                $(".loadingGetModalWorks").hide();

                var no = 1;
                var table = $('#tableWorks').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    // $.each(data, function(key, val) {
                    //     keys += 1;
                    //     table.row.add([
                    //         '<input id="sys_id_work' + keys + '" value="' + val.id + '" data-trigger="sys_id_work" type="hidden">' + no++,
                    //         val.code || '-',
                    //         val.name || '-',
                    //     ]).draw();
                    // });

                    dataWorks = data; // USE IN BUDGET PAGE

                    $('#tableWorks').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_work' + (meta.row + 1) + '" value="' + data.id + '" type="hidden">' +
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
                            }
                        ]
                    });

                    $("#tableWorks").css("width", "100%");

                    $("#tableWorks_length").show();
                    $("#tableWorks_filter").show();
                    $("#tableWorks_info").show();
                    $("#tableWorks_paginate").show();
                } else {
                    $('#tableWorks tbody').empty();
                    $(".errorModalWorksMessageContainer").show();
                    $("#errorModalWorksMessage").text(`Data not found.`);

                    $("#tableWorks_length").hide();
                    $("#tableWorks_filter").hide();
                    $("#tableWorks_info").hide();
                    $("#tableWorks_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableWorks tbody').empty();
                $(".loadingGetModalWorks").hide();
                $(".errorModalWorksMessageContainer").show();
                $("#errorModalWorksMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalWorks();
    });
</script>