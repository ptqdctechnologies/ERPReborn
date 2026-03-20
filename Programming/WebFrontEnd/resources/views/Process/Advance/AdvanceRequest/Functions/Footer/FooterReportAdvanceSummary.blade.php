<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const subBudgetID   = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const requesterID   = document.getElementById("requester_id");
    const beneficiaryID = document.getElementById("beneficiary_id");
    const arfDate       = document.getElementById("advance_summary_date_range");
    const printType     = document.getElementById("print_type");

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#requester_name").css('background-color', '#fff');
        $(`#requester_name`).val("");
        $(`#requester_id`).val("");

        $("#beneficiary_name").css('background-color', '#fff');
        $(`#beneficiary_name`).val("");
        $(`#beneficiary_id`).val("");

        $("#advance_summary_date_range").css('background-color', '#fff');
        $(`#advance_summary_date_range`).val("");

        hideErrorInputMessage("#budget_name", "#budgetMessage");
        hideErrorInputMessage("#requester_name", "#requesterMessage");
        hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
        hideErrorInputMessage("#advance_summary_date_range", "#dateRangeMessage");
    }

    function getDataReport() {
        ShowLoading();

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
                let totalIDR            = 0;
                let totalOtherCurrency  = 0;
                let totalEquivalentIDR  = 0;

                if (response.status === 200 && response.data[0]) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

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
                                defaultContent: '-',
                                className: "text-nowrap",
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                className: "text-nowrap",
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
                                defaultContent: '-',
                                className: "text-nowrap",
                            },
                            {
                                data: 'beneficiaryName',
                                defaultContent: '-',
                                className: "text-nowrap",
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_IDR || '0');
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Other_Currency || '0');
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Equivalent_IDR || '0');
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
                    dataReport = [];

                    $('#table_summary').DataTable({
                        destroy: true,
                        data: [],
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        drawCallback: function(settings) {
                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalIDR));
                            $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalOtherCurrency)); 
                            $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalEquivalentIDR));
                        }
                    });

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");
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

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            url: '{!! route("AdvanceRequest.PrintExportReportAdvanceSummary") !!}',
            type: 'POST',
            data: {
                dataReport,
                printType: printType.value
            },
            xhrFields: { 
                responseType: 'blob'
            },
            success: function(response) {
                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report Advance Summary.pdf";
                } else {
                    link.download = "Export Report Advance Summary.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                HideLoading();
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    function validateShowButton() {
        const isBudgetIDNotEmpty        = budgetID.value.trim() !== '';
        const isSubBudgetIDNotEmpty     = subBudgetID.value.trim() !== '';
        const isRequesterIDNotEmpty     = requesterID.value.trim() !== '';
        const isBeneficiaryIDNotEmpty   = beneficiaryID.value.trim() !== '';
        const isArfDateNotEmpty         = arfDate.value.trim() !== '';

        if (
            isBudgetIDNotEmpty ||
            isRequesterIDNotEmpty ||
            isBeneficiaryIDNotEmpty ||
            isArfDateNotEmpty
        ) {
            hideErrorInputMessage("#budget_name", "#budgetMessage");
            hideErrorInputMessage("#requester_name", "#requesterMessage");
            hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
            hideErrorInputMessage("#advance_summary_date_range", "#dateRangeMessage");

            getDataReport();
        } else {
            showErrorInputMessage("#budget_name", "#budgetMessage");
            showErrorInputMessage("#requester_name", "#requesterMessage");
            showErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
            showErrorInputMessage("#advance_summary_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorNotif("No data available to export. Please display the data first.");
        }
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        const sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code    = $(this).find('td:nth-child(2)').text();
        const name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#budget_name", "#budgetMessage");
        getSites(sysId);

        $("#mySitesTrigger").css('cursor', 'pointer');
        $("#mySitesTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#mySites"
        });

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#sub_budget_name", "#subBudgetMessage");

        $('#mySites').modal('hide');
    });

    $('#tableRequesters').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        const name        = $(this).find('td:nth-child(2)').text();
        const position    = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#requester_name", "#requesterMessage");

        $('#myRequesters').modal('hide');
    });

    $('#tableBeneficiaries').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
        const name        = $(this).find('td:nth-child(2)').text();
        const position    = $(this).find('td:nth-child(3)').text();

        $("#beneficiary_id").val(sysId);
        $("#beneficiary_name").val(`${position} - ${name}`);
        $("#beneficiary_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");

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
            hideErrorInputMessage("#advance_summary_date_range", "#dateRangeMessage");
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