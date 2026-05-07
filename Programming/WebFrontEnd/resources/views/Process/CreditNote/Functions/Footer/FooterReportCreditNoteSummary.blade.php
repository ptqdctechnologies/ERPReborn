<script>
    let dataReport = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const budgetName = document.getElementById("budget_name");
    const subBudgetID = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const subBudgetName = document.getElementById("sub_budget_name");
    const customerID = document.getElementById("customer_id");
    const customerCode = document.getElementById("customer_code");
    const customerName = document.getElementById("customer_name");
    const cnDate = document.getElementById("credit_note_summary_date_range");
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
        dataReport = [];

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#customer_name").css('background-color', '#fff');
        $(`#customer_name`).val("");
        $(`#customer_id`).val("");
        $(`#customer_code`).val("");

        $("#credit_note_summary_date_range").css('background-color', '#fff');
        $(`#credit_note_summary_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("CreditNote.ReportCreditNoteSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                customer_id: customerID.value,
                cnDate: cnDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalIdrCN = 0;
                let vatIdrCN = 0;
                let totalIdrCNOtherCurrency = 0;
                let vatIdrCNOtherCurrency = 0;
                let totalIdrCNEquivalentIDR = 0;
                let vatIdrCNEquivalentIDR = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalIdrCN += parseFloat(row.CN_Total_IDR) || 0;
                    vatIdrCN += parseFloat(row.CN_Tax_IDR) || 0;
                    totalIdrCNOtherCurrency += parseFloat(row.CN_Total_Other_Currency) || 0;
                    vatIdrCNOtherCurrency += parseFloat(row.CN_Tax_OtherCurrency) || 0;
                    totalIdrCNEquivalentIDR += parseFloat(row.CN_Total_Equivalent_IDR) || 0;
                    vatIdrCNEquivalentIDR += parseFloat(row.CN_Tax_Equivalent) || 0;
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
                            data: 'CN_Number',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return `${data.combinedBudgetCode} - ${data.combinedBudgetName}`;
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return `${data.combinedBudgetSectionCode} - ${data.combinedBudgetSectionName}`;
                            }
                        },
                        {
                            data: 'date',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return `${data.customerCode} - ${data.customerName}`;
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.CN_Total_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.CN_Tax_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.CN_Total_Other_Currency) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.CN_Tax_OtherCurrency) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.CN_Total_Equivalent_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.CN_Tax_Equivalent) || '-';
                            }
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalIdrCN));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(vatIdrCN));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalIdrCNOtherCurrency));
                        $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(vatIdrCNOtherCurrency));
                        $('#table_summary tfoot th:nth-child(6)').text(currencyTotal(totalIdrCNEquivalentIDR));
                        $('#table_summary tfoot th:nth-child(7)').text(currencyTotal(vatIdrCNEquivalentIDR));
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
        });
    }

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            url: '{!! route("CreditNote.PrintExportReportCreditNoteSummary") !!}',
            type: 'POST',
            data: {
                dataReport: JSON.stringify(dataReport),
                budgetName: budgetName.value,
                subBudgetName: subBudgetName.value,
                customerName: customerName.value,
                cnDate: cnDate.value,
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
                    link.download = "Export Report Credit Note Summary.pdf";
                } else {
                    link.download = "Export Report Credit Note Summary.xlsx";
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
        const isCustomerIDNotEmpty = customerID.value.trim() !== '';
        const isCnDateNotEmpty = cnDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCustomerIDNotEmpty ||
            isCnDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.hideErrorInputMessage("#credit_note_summary_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.showErrorInputMessage("#credit_note_summary_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorNotif("No data available to export. Please display the data first.");
        }
    }

    $('#tableProjects').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val("");
        $("#budget_code").val("");
        $("#budget_name").val("");
        $("#budget_name").css('background-color', '#fff');

        if (Utils.isUserAuthorizedForReport()) {
            selectBudget(sysId, code, name);
        } else {
            Utils.showBudgetLoading();

            userAllowedToInvolve(sysId, code, name, documentTypeID.value, selectBudget);
        }

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

        $('#myProjects').modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('toggle');
    });

    $('#tableGetCustomer').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_customer"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#customer_id").val(sysId);
        $("#customer_code").val(code);
        $("#customer_name").val(`${code} - ${name}`);
        $("#customer_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#customer_name", "#customerMessage");

        $('#myCustomers').modal('toggle');
    });

    $(document).ready(function () {
        getModalCustomers();

        $('#credit_note_summary_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#credit_note_summary_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#credit_note_summary_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#credit_note_summary_date_range", "#dateRangeMessage");
        });

        $('#credit_note_summary_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#credit_note_summary_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#credit_note_summary_date_range_container_icon').on('click', function () {
            $('#credit_note_summary_date_range').trigger('click');
        });
    });
</script>