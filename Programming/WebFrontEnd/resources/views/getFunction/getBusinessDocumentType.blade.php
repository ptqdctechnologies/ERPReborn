<div id="myBusinessDocumentType" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Business Document Type</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBusinessDocumentType">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalBusinessDocumentType">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalBusinessDocumentTypeMessageContainer" style="display: none;">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalBusinessDocumentTypeMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    function getBusinessDocumentType() {
        $('#tableGetBusinessDocumentType tbody').empty();
        $(".loadingGetModalBusinessDocumentType").show();
        $(".errorModalBusinessDocumentTypeMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                $(".loadingGetModalBusinessDocumentType").hide();

                var table = $('#tableGetBusinessDocumentType').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $('#tableGetBusinessDocumentType').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center" style="max-width: 30px;">' +
                                        '<input id="sys_id_business_document' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_business_document" type="hidden">' +
                                        (meta.row + 1) +
                                    '</td>';
                                }
                            },
                            {
                                data: 'name',
                                defaultContent: '-',
                                className: "align-middle"
                            }
                        ]
                    });

                    $('#tableGetBusinessDocumentType').css("width", "100%");
                } else {
                    $('#tableGetBusinessDocumentType tbody').empty();
                    $(".errorModalBusinessDocumentTypeMessageContainer").show();
                    $("#errorModalBusinessDocumentTypeMessage").text(`Data not found.`);

                    $("#tableGetBusinessDocumentType_length").hide();
                    $("#tableGetBusinessDocumentType_filter").hide();
                    $("#tableGetBusinessDocumentType_info").hide();
                    $("#tableGetBusinessDocumentType_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetBusinessDocumentType tbody').empty();
                $(".loadingGetModalBusinessDocumentType").hide();
                $(".errorModalBusinessDocumentTypeMessageContainer").show();
                $("#errorModalBusinessDocumentTypeMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }
</script>