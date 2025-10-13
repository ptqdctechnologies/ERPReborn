<div id="mySites" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Sub Budget Code</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSites">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingSites">
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
                                        <tr class="errorSitesMessageContainer">
                                            <td colspan="3" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorSitesMessage" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorSitesMessageContainer").hide();

    function getSites(Project_RefID) {
        $('#tableSites tbody').empty();
        $(".loadingSites").show();
        $(".errorSitesMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + Project_RefID,
            success: function(data) {
                $(".loadingSites").hide();

                var no = 1;
                var table = $('#tableSites').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_site" type="hidden">' + no++,
                            val.Code || '-',
                            val.Name || '-',
                        ]).draw();
                    });

                    $("#tableSites_length").show();
                    $("#tableSites_filter").show();
                    $("#tableSites_info").show();
                    $("#tableSites_paginate").show();
                } else {
                    $(".errorSitesMessageContainer").show();
                    $("#errorSitesMessage").text(`No Data Available in Table.`);

                    $("#tableSites_length").hide();
                    $("#tableSites_filter").hide();
                    $("#tableSites_info").hide();
                    $("#tableSites_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableSites tbody').empty();
                $(".loadingSites").hide();
                $(".errorSitesMessageContainer").show();
                $("#errorSitesMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    // $(window).one('load', function(e) {
    //     getSites();
    // });
</script>