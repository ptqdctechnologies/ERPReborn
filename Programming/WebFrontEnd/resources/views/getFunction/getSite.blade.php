@if (request()->is('ReportPOtoAP') ||request()->is('ReportInvoiceToCN') ||request()->is('ReportRemToDN') || (request()->is('Reimbursement') || request()->is('ReportDebitNoteSummary') || request()->is('ReportCNtoDN') ||request()->is('ReportAccountPayableSummary') || request()->is('ReportMaterialReceiveSummary') ||request()->is('ReportLoantoLoanSettlement') ||request()->is('ReportLoanSettlementSummary') ||request()->is('ReportCreditNoteSummary') ||request()->is('ReportReimbursementSummary') ||request()->is('ReportLoanSummary') ||request()->is('ReportBusinessTripRequestSummary') ||request()->is('ReportPRtoPO') || request()->is('ReportDeliveryOrderSummary') || request()->is('ReportPurchaseOrderSummary') || request()->is('ReportPurchaseRequisitionSummary') || request()->is('ReportBusinessTripRequestDetail') || request()->is('ReportBusinessTripSettlementSummary') || request()->is('ReportBusinessTripSettlementDetail') || request()->is('ReportAdvanceSettlementSummary') || request()->is('ReportAdvanceSettlementDetail') || request()->is('BusinessTripRequest') || request()->is('AdvanceRequest') || request()->is('ReportPRtoPO') || request()->is('ReportAdvanceToASF') || request()->is('ReportBusinessTripToBSF') || request()->is('PurchaseRequisition') || request()->is('ReportPOtoAP') || request()->is('ReportTimesheetSummary') || request()->is('ReportPOtoDO') || request()->is('ReportDOToMaterialReceive'))
    <div id="mySiteCodeSecond" class="modal fade" role="dialog">
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
                                    <table class="table table-head-fixed text-nowrap" id="tableGetSiteSecond">
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
                                            <tr class="loadingGetSiteSecond">
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
                                            <tr class="errorSiteMessageContainerSecond">
                                                <td colspan="3" class="p-0" style="height: 22rem;">
                                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                        <div id="errorSiteMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
        $(".errorSiteMessageContainerSecond").hide();

        function getSiteSecond(Project_RefID) {
            $('#tableGetSiteSecond tbody').empty();
            $(".loadingGetSiteSecond").show();
            $(".errorSiteMessageContainerSecond").hide();

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
                    $(".loadingGetSiteSecond").hide();

                    var no = 1;
                    var table = $('#tableGetSiteSecond').DataTable();
                    table.clear();

                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            keys += 1;
                            table.row.add([
                                '<input id="sys_id_site_second' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_site_second" type="hidden">' + no++,
                                val.Code || '-',
                                val.Name || '-',
                            ]).draw();
                        });

                        $("#tableGetSiteSecond_length").show();
                        $("#tableGetSiteSecond_filter").show();
                        $("#tableGetSiteSecond_info").show();
                        $("#tableGetSiteSecond_paginate").show();
                    } else {
                        $(".errorSiteMessageContainerSecond").show();
                        $("#errorSiteMessageSecond").text(`No Data Available in Table.`);

                        $("#tableGetSiteSecond_length").hide();
                        $("#tableGetSiteSecond_filter").hide();
                        $("#tableGetSiteSecond_info").hide();
                        $("#tableGetSiteSecond_paginate").hide();
                    }
                },
                error: function (textStatus, errorThrown) {
                    $('#tableGetSiteSecond tbody').empty();
                    $(".loadingGetSiteSecond").hide();
                    $(".errorSiteMessageContainerSecond").show();
                    $("#errorSiteMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
                }
            });
        }

        // $(window).one('load', function(e) {
        //     getSiteSecond();
        // });

        $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
            var sysId       = $(this).find('input[data-trigger="sys_id_site_second"]').val();
            var siteCode    = $(this).find('td:nth-child(2)').text();
            var siteName    = $(this).find('td:nth-child(3)').text();

            $("#site_id_second").val(sysId);
            $("#site_code_second").val(siteCode);
            $("#site_name_second").val(siteName);

            // adjustInputSize(document.getElementById("site_code_second"), "string");

            $('#mySiteCodeSecond').modal('hide');
        });
    </script>
@else
    <div id="mySiteCode" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Choose Sub Budget Code</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0" style="height: 400px;">
                                    <table class="table table-head-fixed text-nowrap" id="tableGetSite">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Sub Budget Code</th>
                                                <th>Sub Budget Name</th>
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
            $('.mySiteCodeFrom').one('click', function(e) {
                e.preventDefault();
                // ShowLoading();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var keys = 0;
                $.ajax({
                    type: 'GET',
                    url: '{!! route("getSite") !!}',
                    success: function(data) {
                        var no = 1;
                        var t = $('#tableGetSite').DataTable();
                        t.clear();
                        $.each(data, function(key, val) {
                            keys += 1;
                            t.row.add([
                                '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                                '<td>' + val.Code + '</td>',
                                '<td>' + val.Name + '</td></tr></tbody>'
                            ]).draw();
                        });
                    }
                });

                $('#tableGetSite tbody').on('click', 'tr', function() {

                    $("#mySiteCode").modal('toggle');

                    var row = $(this).closest("tr");
                    var id = row.find("td:nth-child(1)").text();
                    var sys_id_site = $('#sys_id_site' + id).val();
                    var code = row.find("td:nth-child(2)").text();
                    var name = row.find("td:nth-child(3)").text();

                    $("#site_from_id").val(sys_id_site);
                    $("#site_from").val(code  + ' - ' + name);

                });

            });
        });
    </script>

    <script>
        $(function() {
            $('.mySiteCodeTo').one('click', function(e) {
                e.preventDefault();
                // ShowLoading();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var keys = 0;
                $.ajax({
                    type: 'GET',
                    url: '{!! route("getSite") !!}',
                    success: function(data) {

                        var no = 1;
                        var t = $('#tableGetSite').DataTable();
                        t.clear();
                        $.each(data, function(key, val) {
                            keys += 1;
                            t.row.add([
                                '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                                '<td>' + val.Code + '</td>',
                                '<td>' + val.Name + '</td></tr></tbody>'
                            ]).draw();
                        });
                    }
                });

                $('#tableGetSite tbody').on('click', 'tr', function() {

                    $("#mySiteCode").modal('toggle');

                    var row = $(this).closest("tr");
                    var id = row.find("td:nth-child(1)").text();
                    var sys_id_site = $('#sys_id_site' + id).val();
                    var code = row.find("td:nth-child(2)").text();
                    var name = row.find("td:nth-child(3)").text();

                    $("#site_to_id").val(sys_id_site);
                    $("#site_to").val(code  + ' - ' + name);

                });

            });
        });
    </script>
@endif
