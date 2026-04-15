<script>
    let dataReport = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const subBudgetID = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const requesterID = document.getElementById("requester_id");
    const beneficiaryID = document.getElementById("beneficiary_id");
    const brfDate = document.getElementById("business_trip_date_range");
    const printType = document.getElementById("print_type");

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(id);

        $("#mySitesTrigger").css('cursor', 'pointer');
        $("#mySitesTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#mySites"
        });
    }

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

        $("#business_trip_date_range").css('background-color', '#fff');
        $(`#business_trip_date_range`).val("");

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
        ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");
        ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
        ErrorHandler.hideErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("BusinessTripRequest.ReportBusinessTripRequestSummaryStore") !!}',
            data: {
                budget_code: budgetCode.value,
                site_code: subBudgetCode.value,
                requester_id: requesterID.value,
                beneficiary_id: beneficiaryID.value,
                brfDate: brfDate.value
            },
            dataType: 'json',
            success: function (response) {
                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                let totalBRF = data.reduce((total, row) => {
                    return total +
                        Utils.parseFloatSafe(row.totalTravelFares || 0) +
                        Utils.parseFloatSafe(row.totalAllowance || 0) +
                        Utils.parseFloatSafe(row.totalEntertainment || 0) +
                        Utils.parseFloatSafe(row.totalOther || 0);
                }, 0);

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
                            data: 'brfNumber',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            className: "text-nowrap",
                            render: function (data, type, row, meta) {
                                return `${data.combinedBudgetSectionCode || ''} - ${data.combinedBudgetSectionName || ''}`;
                            }
                        },
                        {
                            data: 'departurePoint',
                            defaultContent: '-'
                        },
                        {
                            data: 'destinationPoint',
                            defaultContent: '-'
                        },
                        {
                            data: 'brfDate',
                            defaultContent: '-'
                        },
                        {
                            data: 'currencyISOCode',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return Utils.formatCurrency(Utils.parseFloatSafe(
                                    (data.totalTravelFares || 0) +
                                    (data.totalAllowance || 0) +
                                    (data.totalEntertainment || 0) +
                                    (data.totalOther || 0)
                                ));
                            }
                        },
                        {
                            data: 'remarks',
                            className: "text-wrap",
                            defaultContent: '-'
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(Utils.formatCurrency(totalBRF));
                    }
                });

                $('#table_summary').css("width", "100%");
                $('#table_container').css("display", "block");

                HideLoading();
            },
            error: function (xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        })
    }

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            url: '{!! route("BusinessTripRequest.PrintExportReportBusinessTripRequestSummary") !!}',
            type: 'POST',
            data: {
                dataReport: JSON.stringify(dataReport),
                printType: printType.value
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function (response) {
                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report Business Trip Summary.pdf";
                } else {
                    link.download = "Export Report Business Trip Summary.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                HideLoading();
            },
            error: function (xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    function validateShowButton() {
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isSubBudgetIDNotEmpty = subBudgetID.value.trim() !== '';
        const isRequesterIDNotEmpty = requesterID.value.trim() !== '';
        const isBeneficiaryIDNotEmpty = beneficiaryID.value.trim() !== '';
        const isBrfDateNotEmpty = brfDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isRequesterIDNotEmpty ||
            isBeneficiaryIDNotEmpty ||
            isBrfDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");
            ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
            ErrorHandler.hideErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#requester_name", "#requesterMessage");
            // ErrorHandler.showErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
            ErrorHandler.showErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorNotif("No data available to export. Please display the data first.");
        }
    }

    function getWorkflow(combinedBudgetID, combinedBudgetCode, combinedBudgetName) {
        $.ajax({
            type: 'POST',
            url: '{!! route("GetWorkflow") !!}',
            data: {
                businessDocumentType_RefID: documentTypeID.value,
                combinedBudget_RefID: combinedBudgetID
            }
        })
            .done(function (data, textStatus, jqXHR) {
                console.log("Success:", data);

                if (data.status == 200) {
                    $("#budget_id").val(combinedBudgetID);
                    $("#budget_code").val(combinedBudgetCode);
                    $("#budget_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#budget_name").css('background-color', '#e9ecef');

                    getSites(combinedBudgetID);

                    $("#mySitesTrigger").css('cursor', 'pointer');
                    $("#mySitesTrigger").attr({
                        "data-toggle": "modal",
                        "data-target": "#mySites"
                    });
                } else {
                    ErrorHandler.notifToast(
                        'error',
                        'You are not included in this budget',
                        'Error!'
                    );
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingBudget").hide();
                $("#iconBudget").show();
            });
    }

    $('#tableProjects').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        if (Utils.isUserAuthorizedForReport()) {
            selectBudget(sysId, code, name);
        } else {
            $("#loadingBudget").show();
            $("#iconBudget").hide();

            getWorkflow(sysId, code, name);
        }

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#sub_budget_name", "#subBudgetMessage");

        $('#mySites').modal('hide');
    });

    $('#tableRequesters').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const position = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");

        $('#myRequesters').modal('hide');
    });

    $('#tableBeneficiaries').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const position = $(this).find('td:nth-child(3)').text();

        $("#beneficiary_id").val(sysId);
        $("#beneficiary_name").val(`${position} - ${name}`);
        $("#beneficiary_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");

        $('#myBeneficiaries').modal('hide');
    });

    $(document).ready(function () {
        $('#business_trip_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#business_trip_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#business_trip_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");
        });

        $('#business_trip_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#business_trip_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#business_trip_date_range_container_icon').on('click', function () {
            $('#business_trip_date_range').trigger('click');
        });

        getRequesters();
        getBeneficiaries();
    });
</script>