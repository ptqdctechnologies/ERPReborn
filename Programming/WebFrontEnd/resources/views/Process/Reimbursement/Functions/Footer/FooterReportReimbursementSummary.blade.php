<script>
    let dataReport = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const budgetName = document.getElementById("budget_name");
    const customerID = document.getElementById("customer_id");
    const customerCode = document.getElementById("customer_code");
    const customerName = document.getElementById("customer_name");
    const remDate = document.getElementById("reimbursement_date_range");
    const printType = document.getElementById("print_type");

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function resetForm() {
        dataReport = [];

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#customer_name").css('background-color', '#fff');
        $(`#customer_name`).val("");
        $(`#customer_id`).val("");
        $(`#customer_code`).val("");

        $("#reimbursement_date_range").css('background-color', '#fff');
        $(`#reimbursement_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Reimbursement.ReportReimbursementSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                customer_id: customerID.value,
                remDate: remDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalIDR = 0;
                let totalOtherCurrency = 0;
                let totalEquivalentIDR = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalIDR += parseFloat(row.total_IDR) || 0;
                    totalOtherCurrency += parseFloat(row.total_Other_Currency) || 0;
                    totalEquivalentIDR += parseFloat(row.total_Equivalent_IDR) || 0;
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
                            data: 'reimbursementNumber',
                            defaultContent: '-'
                        },
                        {
                            data: 'date',
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
                                return `${data.vendorCode} - ${data.vendor}`;
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_IDR) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Other_Currency) || '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Equivalent_IDR) || '-';
                            }
                        },
                        {
                            data: 'remarks',
                            defaultContent: '-'
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalIDR));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalOtherCurrency));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalEquivalentIDR));
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
            url: '{!! route("Reimbursement.PrintExportReportReimbursementSummary") !!}',
            data: {
                dataReport: JSON.stringify(dataReport),
                budgetName: budgetName.value,
                customerName: customerName.value,
                remDate: remDate.value,
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
                    link.download = "Export Report Reimbursement Summary.pdf";
                } else {
                    link.download = "Export Report Reimbursement Summary.xlsx";
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
        const isRemDateNotEmpty = remDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCustomerIDNotEmpty ||
            isRemDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.hideErrorInputMessage("#reimbursement_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.showErrorInputMessage("#reimbursement_date_range", "#dateRangeMessage");
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

        $('#myProjects').modal('hide');
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

        $('#myCustomers').modal('hide');
    });

    $(document).ready(function () {
        getModalCustomers();

        $('#reimbursement_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#reimbursement_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#reimbursement_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#reimbursement_date_range", "#dateRangeMessage");
        });

        $('#reimbursement_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#reimbursement_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#reimbursement_date_range_container_icon').on('click', function () {
            $('#reimbursement_date_range').trigger('click');
        });
    });
</script>