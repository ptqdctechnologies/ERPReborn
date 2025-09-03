@if ( request()->is('ReportPOtoAP') || request()->is('ReportInvoiceToCN') ||request()->is('ReportRemToDN') || (request()->is('Reimbursement') || request()->is('ReportDebitNoteSummary') || request()->is('ReportCNtoDN') ||request()->is('ReportAccountPayableSummary') || request()->is('ReportMaterialReceiveSummary') ||request()->is('ReportLoantoLoanSettlement') ||request()->is('ReportLoanSettlementSummary') ||request()->is('ReportCreditNoteSummary') ||request()->is('ReportReimbursementSummary') ||request()->is('ReportLoanSummary') ||request()->is('ReportBusinessTripRequestSummary') ||request()->is('ReportPRtoPO') ||request()->is('ReportDeliveryOrderSummary') || request()->is('ReportPurchaseOrderSummary') || request()->is('ReportPurchaseRequisitionSummary') || request()->is('ReportBusinessTripRequestDetail') || request()->is('ReportBusinessTripSettlementSummary') || request()->is('ReportBusinessTripSettlementDetail') || request()->is('ReportAdvanceSettlementSummary') || request()->is('ReportAdvanceSettlementDetail') || request()->is('BusinessTripRequest') || request()->is('AdvanceRequest') || request()->is('ReportAdvanceToASF') || request()->is('ReportBusinessTripToBSF') || request()->is('PurchaseRequisition') || request()->is('ReportMatReturnSummary') || request()->is('ReportPOtoDO') || request()->is('ReportDOToMaterialReceive')) )
    <div id="myProjectSecond" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetProjectSecond">
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
                                            <tr class="loadingGetProjectSecond">
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
                                            <tr class="errorProjectMessageContainerSecond">
                                                <td colspan="3" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorProjectMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
        $(".errorProjectMessageContainerSecond").hide();

        function getProjectSecond() {
            $('#tableGetProjectSecond tbody').empty();
            $(".loadingGetProjectSecond").show();
            $(".errorProjectMessageContainerSecond").hide();

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
                    $(".loadingGetProjectSecond").hide();
                    
                    var no = 1;
                    var table = $('#tableGetProjectSecond').DataTable();
                    table.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_project_second' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_project_second" type="hidden">' + no++,
                                val.code || '-',
                                val.name || '-',
                            ]).draw();
                        });

                        $("#tableGetProjectSecond_length").show();
                        $("#tableGetProjectSecond_filter").show();
                        $("#tableGetProjectSecond_info").show();
                        $("#tableGetProjectSecond_paginate").show();
                    } else {
                        $(".errorProjectMessageContainerSecond").show();
                        $("#errorProjectMessageSecond").text(`Data not found.`);

                        $("#tableGetProjectSecond_length").hide();
                        $("#tableGetProjectSecond_filter").hide();
                        $("#tableGetProjectSecond_info").hide();
                        $("#tableGetProjectSecond_paginate").hide();
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#tableGetProjectSecond tbody').empty();
                    $(".loadingGetProjectSecond").hide();
                    $(".errorProjectMessageContainerSecond").show();
                    $("#errorProjectMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            });
        }

        $(window).one('load', function(e) {
            getProjectSecond();
        });

        $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
            var sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
            var projectCode = $(this).find('td:nth-child(2)').text();
            var projectName = $(this).find('td:nth-child(3)').text();

            $("#project_id_second").val(sysId);
            $("#project_code_second").val(projectCode);
            $("#project_name_second").val(projectName);

            // adjustInputSize(document.getElementById("project_code_second"), "string");

            $('#myProjectSecond').modal('hide');
        });
    </script>
@else 
    <div id="myProject" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Choose Budget</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 400px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetProject">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Budget Code</th>
                                                <th>Budget Name</th>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function() {
            $('.myProject').one('click', function(e) {
                e.preventDefault();

                var keys = 0;

                $.ajax({
                    type: 'GET',
                    url: '{!! route("getProject") !!}',
                    success: function(data) {
                        var no = 1;
                        var t = $('#tableGetProject').DataTable();
                        t.clear();
                        $.each(data, function(key, val) {
                            keys += 1;
                            t.row.add([
                                '<tbody><tr><input id="sys_id_budget' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                                '<td>' + val.code + '</td>',
                                '<td>' + val.name + '</td></span></tr></tbody>'
                            ]).draw();
                        });
                    }
                });

            });

        });
    </script>
@endif
