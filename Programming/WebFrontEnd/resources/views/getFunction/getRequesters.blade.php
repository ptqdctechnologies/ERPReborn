<div id="myRequesters" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Requester</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableRequesters">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingRequesters">
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
                                        <tr class="errorRequestersMessageContainer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorRequestersMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorRequestersMessageContainer").hide();

    function getRequesters() {
        $('#tableRequesters tbody').empty();
        $(".loadingRequesters").show();
        $(".errorRequestersMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getWorker") !!}',
            success: function(data) {
                $(".loadingRequesters").hide();

                var no = 1;
                var table = $('#tableRequesters').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_requesters' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_requesters" type="hidden">' + no++,
                            val.personName || '-',
                            val.organizationalJobPositionName || '-',
                        ]).draw();
                    });

                    $("#tableRequesters_length").show();
                    $("#tableRequesters_filter").show();
                    $("#tableRequesters_info").show();
                    $("#tableRequesters_paginate").show();
                } else {
                    $(".errorRequestersMessageContainer").show();
                    $("#errorRequestersMessage").text(`Data not found.`);

                    $("#tableRequesters_length").hide();
                    $("#tableRequesters_filter").hide();
                    $("#tableRequesters_info").hide();
                    $("#tableRequesters_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableRequesters tbody').empty();
                $(".loadingRequesters").hide();
                $(".errorRequestersMessageContainer").show();
                $("#errorRequestersMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getRequesters();
    });
</script>