<div id="myGetChartOfAccount" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Chart of Account</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetChartOfAccount">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalChartOfAccount">
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
                                        <tr class="errorModalChartOfAccountMessageContainer" style="display: none;">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalChartOfAccountMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getModalChartOfAccount() {
        $('#tableGetChartOfAccount tbody').empty();
        $(".loadingGetModalChartOfAccount").show();
        $(".errorModalChartOfAccountMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getChartOfAccountList") !!}',
            success: function(data) {
                $(".loadingGetModalChartOfAccount").hide();

                // let no = 1;
                let table = $('#tableGetChartOfAccount').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    // $.each(data, function(key, val) {
                    //     table.row.add([
                    //         '<input data-trigger="sys_id_modal_coa" value="' + val.sys_ID + '" type="hidden">' + no++,
                    //         val.code || '-',
                    //         val.name || '-',
                    //     ]).draw();
                    // });

                    $('#tableGetChartOfAccount').DataTable({
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
                                        '<input id="sys_id_modal_coa' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_modal_coa" type="hidden">' +
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
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetChartOfAccount').css("width", "100%");
                } else {
                    $(".errorModalChartOfAccountMessageContainer").show();
                    $("#errorModalChartOfAccountMessage").text(`Data not found.`);

                    $("#tableGetChartOfAccount_length").hide();
                    $("#tableGetChartOfAccount_filter").hide();
                    $("#tableGetChartOfAccount_info").hide();
                    $("#tableGetChartOfAccount_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetChartOfAccount tbody').empty();
                $(".loadingGetModalChartOfAccount").hide();
                $(".errorModalChartOfAccountMessageContainer").show();
                $("#errorModalChartOfAccountMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getModalChartOfAccount();
    });
</script>