<div id="myProjects" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Budget</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableProjects">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingProjects">
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
                                        <tr class="errorProjectsMessageContainer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorProjectsMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorProjectsMessageContainer").hide();

    function getProjects() {
        $('#tableProjects tbody').empty();
        $(".loadingProjects").show();
        $(".errorProjectsMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getNewProject") !!}',
            success: function(data) {
                $(".loadingProjects").hide();

                var no = 1;
                var table = $('#tableProjects').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_project' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_project" type="hidden">' + no++,
                            val.code || '-',
                            val.name || '-',
                        ]).draw();
                    });

                    $("#tableProjects_length").show();
                    $("#tableProjects_filter").show();
                    $("#tableProjects_info").show();
                    $("#tableProjects_paginate").show();
                } else {
                    $(".errorProjectsMessageContainer").show();
                    $("#errorProjectsMessage").text(`Data not found.`);

                    $("#tableProjects_length").hide();
                    $("#tableProjects_filter").hide();
                    $("#tableProjects_info").hide();
                    $("#tableProjects_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableProjects tbody').empty();
                $(".loadingProjects").hide();
                $(".errorProjectsMessageContainer").show();
                $("#errorProjectsMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getProjects();
    });
</script>