<div id="myTimesheetNumber" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Timesheet</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableTimesheetNumber">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr class="loadingTimesheetNumber">
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
                                        <tr class="errorTimesheetNumberMessageContainerSecond">
                                            <td colspan="2" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorTimesheetNumberMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorTimesheetNumberMessageContainerSecond").hide();

    function getTimesheetNumber() {
        $('#tableTimesheetNumber tbody').empty();
        $(".loadingTimesheetNumber").show();
        $(".errorTimesheetNumberMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getTimesheetList") !!}',
            success: function(data) {
                $(".loadingTimesheetNumber").hide();

                var no = 1;
                var table = $('#tableTimesheetNumber').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_timesheet' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_timesheet" type="hidden">' + no++,
                            (val.sys_Text || '-'),
                        ]).draw();
                    });

                    $("#tableTimesheetNumber_length").show();
                    $("#tableTimesheetNumber_filter").show();
                    $("#tableTimesheetNumber_info").show();
                    $("#tableTimesheetNumber_paginate").show();
                } else {
                    $(".errorTimesheetNumberMessageContainerSecond").show();
                    $("#errorTimesheetNumberMessageSecond").text(`Data not found.`);

                    $("#tableTimesheetNumber_length").hide();
                    $("#tableTimesheetNumber_filter").hide();
                    $("#tableTimesheetNumber_info").hide();
                    $("#tableTimesheetNumber_paginate").hide();
                }

                console.log('data timesheet', data);
            },
            error: function (textStatus, errorThrown) {
                $('#tableTimesheetNumber tbody').empty();
                $(".loadingTimesheetNumber").hide();
                $(".errorTimesheetNumberMessageContainerSecond").show();
                $("#errorTimesheetNumberMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $(window).one('load', function(e) {
        getTimesheetNumber();
    });

    $('#tableTimesheetNumber').on('click', 'tbody tr', function() {
        var sysId                   = $(this).find('input[data-trigger="sys_id_timesheet"]').val();
        var timesheetNumber         = $(this).find('td:nth-child(2)').text();
        var popUpTimesheetRevision  = document.getElementById("myPopUpTimesheetRevision");

        $("#timesheet_RefID").val(sysId);
        $("#timesheet_number").val(timesheetNumber);

        $('#myTimesheetNumber').modal('hide');

        if (popUpTimesheetRevision) {
            $('#myPopUpTimesheetRevision').modal('show');
        }
    });
</script>