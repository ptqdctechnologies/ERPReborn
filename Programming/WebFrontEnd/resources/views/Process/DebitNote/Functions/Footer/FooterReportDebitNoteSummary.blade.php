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
    const dnDate = document.getElementById("debit_note_date_range");
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

        $("#debit_note_date_range").css('background-color', '#fff');
        $(`#debit_note_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("DebitNote.ReportDebitNoteSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                sub_budget_id: subBudgetID.value,
                sub_budget_code: subBudgetCode.value,
                customer_id: customerID.value,
                dnDate: dnDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalIDR = 0;
                let vatIDR = 0;
                let totalOtherCurrency = 0;
                let vatOtherCurrency = 0;
                let totalEquivalentIDR = 0;
                let vatEquivalentIDR = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalIDR += parseFloat(row.DN_Total_IDR) || 0;
                    vatIDR += parseFloat(row.DN_Tax_IDR) || 0;
                    totalOtherCurrency += parseFloat(row.DN_Total_Other_Currency) || 0;
                    vatOtherCurrency += parseFloat(row.DN_Tax_OtherCurrency) || 0;
                    totalEquivalentIDR += parseFloat(row.DN_Total_Equivalent_IDR) || 0;
                    vatEquivalentIDR += parseFloat(row.DN_Tax_Equivalent) || 0;
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
                            data: 'DN_Number',
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
                                return `${data.supplierCode} - ${data.supplierName}`;
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.DN_Total_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.DN_Tax_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.DN_Total_Other_Currency) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.DN_Tax_OtherCurrency) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.DN_Total_Equivalent_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.DN_Tax_Equivalent) || '-';
                            }
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalIDR));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(vatIDR));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalOtherCurrency));
                        $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(vatOtherCurrency));
                        $('#table_summary tfoot th:nth-child(6)').text(currencyTotal(totalEquivalentIDR));
                        $('#table_summary tfoot th:nth-child(7)').text(currencyTotal(vatEquivalentIDR));
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
            type: 'POST',
            url: '{!! route("DebitNote.PrintExportReportDebitNoteSummary") !!}',
            data: {
                dataReport: JSON.stringify(dataReport),
                budgetName: budgetName.value,
                customerName: customerName.value,
                dnDate: dnDate.value,
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
                    link.download = "Export Report Debit Note Summary.pdf";
                } else {
                    link.download = "Export Report Debit Note Summary.xlsx";
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
        const isDnDateNotEmpty = dnDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCustomerIDNotEmpty ||
            isDnDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.hideErrorInputMessage("#debit_note_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.showErrorInputMessage("#debit_note_date_range", "#dateRangeMessage");
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

        $('#debit_note_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#debit_note_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#debit_note_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#debit_note_date_range", "#dateRangeMessage");
        });

        $('#debit_note_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#debit_note_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#debit_note_date_range_container_icon').on('click', function () {
            $('#debit_note_date_range').trigger('click');
        });
    });
</script>