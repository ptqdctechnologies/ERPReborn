<!-- GET BRF NUMBER -->
<div id="myGetModalBRFNumber" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose BRF Number</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap DefaultFeatures" id="BRFNumber">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr class="loadingGetModalBRFNumber">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
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
                                        <tr class="errorModalBRFNumberMessageContainerSecond">
                                            <td colspan="6" class="p-0" style="height: 22rem;">
                                                <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorModalBRFNumberMessageSecond" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
    $(".errorModalBRFNumberMessageContainerSecond").hide();

    function getModalBRFNumber(project_id, site_id) {
        $("#BRFNumber tbody").empty();
        $(".loadingGetModalBRFNumber").show();
        $(".errorModalBRFNumberMessageContainerSecond").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getBusinessTripList") !!}?project_id=' + project_id + '&site_id=' + site_id,
            success: function(data) {
                $(".loadingGetModalBRFNumber").hide();

                var no = 1;
                var table = $('#BRFNumber').DataTable();
                table.clear();

                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_modal_brf_number' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_modal_brf_number" type="hidden">' + no++,
                            val.sys_Text || '-',
                            val.combinedBudgetCode || '-',
                            val.combinedBudgetName || '-',
                            val.combinedBudgetSectionCode || '-',
                            val.combinedBudgetSectionName || '-',
                        ]).draw();
                    });

                    $("#BRFNumber_length").show();
                    $("#BRFNumber_filter").show();
                    $("#BRFNumber_info").show();
                    $("#BRFNumber_paginate").show();
                } else {
                    $(".errorModalBRFNumberMessageContainerSecond").show();
                    $("#errorModalBRFNumberMessageSecond").text(`Data not found.`);

                    $("#BRFNumber_length").hide();
                    $("#BRFNumber_filter").hide();
                    $("#BRFNumber_info").hide();
                    $("#BRFNumber_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#BRFNumber tbody').empty();
                $(".loadingGetModalBRFNumber").hide();
                $(".errorModalBRFNumberMessageContainerSecond").show();
                $("#errorModalBRFNumberMessageSecond").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $('#BRFNumber').on('draw.dt', function () {
        const searchInput = document.querySelector("#BRFNumber_filter label input[aria-controls='BRFNumber']");
        if (searchInput) {
            searchInput.setAttribute("placeholder", "Search by Trano, Budget Code, & Sub Budget Code");
        }
    });

    $(window).one('load', function(e) {
        getModalBRFNumber();
    });

    $('#BRFNumber').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_modal_brf_number"]').val();
        var trano           = $(this).find('td:nth-child(2)').text();
        var budgetCode      = $(this).find('td:nth-child(3)').text();
        var budgetName      = $(this).find('td:nth-child(4)').text();
        var subBudgetCode   = $(this).find('td:nth-child(5)').text();
        var subBudgetName   = $(this).find('td:nth-child(6)').text();

        $("#brf_number_id").val(sysId);
        $("#brf_number_trano").val(trano);
        $("#brf_number_budget").val(budgetCode);
        $("#brf_number_budget_name").val(budgetName);
        $("#brf_number_sub_budget").val(subBudgetCode);
        $("#brf_number_sub_budget_name").val(subBudgetName);

        adjustInputSize(document.getElementById("brf_number_trano"), "string");

        $('#myGetModalBRFNumber').modal('hide');
    });
</script>