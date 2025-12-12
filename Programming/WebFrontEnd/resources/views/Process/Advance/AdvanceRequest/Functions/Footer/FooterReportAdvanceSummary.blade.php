<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const subBudgetID   = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const requesterID   = document.getElementById("requester_id");
    const beneficiaryID = document.getElementById("beneficiary_id");
    const arfDate       = document.getElementById("advance_summary_date_range");

    function getDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("AdvanceRequest.ReportAdvanceSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                requester_id: requesterID.value,
                beneficiary_id: beneficiaryID.value,
                arfDate: arfDate.value
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 200 && response.data[0]) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

                    let totalIDR            = 0;
                    let totalOtherCurrency  = 0;
                    let totalEquivalentIDR  = 0;

                    data.forEach(function(row) {
                        totalIDR            += parseFloat(row.total_IDR) || 0;
                        totalOtherCurrency  += parseFloat(row.total_Other_Currency) || 0;
                        totalEquivalentIDR  += parseFloat(row.total_Equivalent_IDR) || 0;
                    });

                    $('#table_summary').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return (meta.row + 1);
                                }
                            },
                            {
                                data: 'advanceNumber',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return `${data.combinedBudgetSectionCode} - ${data.combinedBudgetSectionName}`;
                                }
                            },
                            {
                                data: 'advanceDate',
                                defaultContent: '-'
                            },
                            {
                                data: 'requesterName',
                                defaultContent: '-'
                            },
                            {
                                data: 'beneficiaryName',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_IDR);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Other_Currency);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Equivalent_IDR);
                                }
                            },
                            {
                                data: 'remarks',
                                defaultContent: '-'
                            }
                        ],
                        drawCallback: function(settings) {
                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalIDR));
                            $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalOtherCurrency)); 
                            $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalEquivalentIDR));
                        }
                    });

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");
                } else {
                    $('#table_container').hide();  // This will hide the table
                    $('#table_summary tbody').empty();  // Optional: Empty the table's body
                    $('#table_summary tfoot').empty();  // Optional: Empty the table's body
                    ErrorNotif("Error");
                }

                HideLoading();
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('hide');
    });

    $('#tableRequesters').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        let name        = $(this).find('td:nth-child(2)').text();
        let position    = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        $('#myRequesters').modal('hide');
    });

    $('#tableBeneficiaries').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
        let name        = $(this).find('td:nth-child(2)').text();
        let position    = $(this).find('td:nth-child(3)').text();

        $("#beneficiary_id").val(sysId);
        $("#beneficiary_name").val(`${position} - ${name}`);
        $("#beneficiary_name").css('background-color', '#e9ecef');

        $('#myBeneficiaries').modal('hide');
    });

    $(window).one('load', function() {
        $('#advance_summary_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#advance_summary_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#advance_summary_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#advance_summary_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#advance_summary_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#advance_summary_date_range_container_icon').on('click', function () {
            $('#advance_summary_date_range').trigger('click');
        });
    });
</script>