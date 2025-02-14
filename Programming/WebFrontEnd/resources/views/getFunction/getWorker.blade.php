@if (request()->is('ReportBusinessTripRequestSummary') || request()->is('ReportBusinessTripSettlementSummary') || request()->is('ReportAdvanceSettlementSummary') || request()->is('AdvanceRequest'))
    <div id="myWorkerSecond" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="card-title">Select Worker</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 400px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetWorkerSecond">
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
                                            <tr class="loadingGetWorkerSecond">
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
                                            <tr class="errorWorkerMessageContainerSecond">
                                                <td colspan="3" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorWorkerMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
        $(".errorWorkerMessageContainerSecond").hide();

        function getWorkerSecond() {
            $('#tableGetWorkerSecond tbody').empty();
            $(".loadingGetWorkerSecond").show();
            $(".errorWorkerMessageContainerSecond").hide();

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
                    $(".loadingGetWorkerSecond").hide();

                    console.log('data', data);
                    
                    var no = 1;
                    var table = $('#tableGetWorkerSecond').DataTable();
                    table.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_worker_second' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_worker_second" type="hidden">' + no++,
                                val.PersonName || '-',
                                val.OrganizationalJobPositionName || '-',
                            ]).draw();
                        });

                        $("#tableGetWorkerSecond_length").show();
                        $("#tableGetWorkerSecond_filter").show();
                        $("#tableGetWorkerSecond_info").show();
                        $("#tableGetWorkerSecond_paginate").show();
                    } else {
                        $(".errorWorkerMessageContainerSecond").show();
                        $("#errorWorkerMessageSecond").text(`Data not found.`);

                        $("#tableGetWorkerSecond_length").hide();
                        $("#tableGetWorkerSecond_filter").hide();
                        $("#tableGetWorkerSecond_info").hide();
                        $("#tableGetWorkerSecond_paginate").hide();
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#tableGetWorkerSecond tbody').empty();
                    $(".loadingGetWorkerSecond").hide();
                    $(".errorWorkerMessageContainerSecond").show();
                    $("#errorWorkerMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            });
        }

        $(window).one('load', function(e) {
            getWorkerSecond();
        });

        $('#tableGetWorkerSecond').on('click', 'tbody tr', function() {
            var sysId           = $(this).find('input[data-trigger="sys_id_worker_second"]').val();
            var workerName      = $(this).find('td:nth-child(2)').text();
            var workerPosition  = $(this).find('td:nth-child(3)').text();

            $("#worker_id_second").val(sysId);
            $("#worker_name_second").val(workerName);
            $("#worker_position_second").val(workerPosition);

            // adjustInputSize(document.getElementById("worker_position_second"), "string");

            $('#myWorkerSecond').modal('hide');
        });
    </script>
@else 
    <div id="myWorker" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="card-title">Select Worker</label>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 425px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetWorker">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
        $(function() {
            $('.myWorker').one('click', function(e) {
                e.preventDefault();
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
                        var no = 1;
                        var t = $('#tableGetWorker').DataTable();
                        t.clear();
                        $.each(data, function(key, val) {
                            keys += 1;
                            t.row.add([
                                '<tbody><tr><input id="sys_id_requester' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="contact_number_requester' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                                '<td>' + val.PersonName + '</td>',
                                '<td>' + val.OrganizationalJobPositionName + '</td></tr></tbody>',
                            ]).draw();
                        });
                    }
                });

            });
        });
    </script>

    <script>

        $('#tableGetWorker tbody').on('click', 'tr', function () {

            $("#myWorker").modal('toggle');

            var row = $(this).closest("tr");  
            var id = row.find("td:nth-child(1)").text();  
            var sys_id_requester = $('#sys_id_requester' + id).val();
            var contact_number_requester = $('#contact_number_requester' + id).val();
            var name = row.find("td:nth-child(2)").text();
            var position = row.find("td:nth-child(3)").text();

            $("#requester_id").val(sys_id_requester);
            $("#requester").val(name);
            $("#requester_detail").val(position);
            $("#contactPhone").val(contact_number_requester);

            adjustInputSize(document.getElementById("requester_detail"), "string");

            MandatoryFormFunctionFalse("#requester", "#requester_detail");

        });
        
    </script>
@endif
