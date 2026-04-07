<script>
    let isCreditorClicked = false;
    let dataReport = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const budgetName = document.getElementById("budget_name");
    const creditorID = document.getElementById("creditor_id");
    const debitorID = document.getElementById("debitor_id");
    const loanDate = document.getElementById("loan_date_range");
    const printType = document.getElementById("print_type");

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function resetForm() {
        isCreditorClicked = false;
        dataReport = [];

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#loan_date_range").css('background-color', '#fff');
        $(`#loan_date_range`).val("");

        $("#creditor_name").css('background-color', '#fff');
        $(`#creditor_name`).val("");
        $(`#creditor_id`).val("");
        $(`#creditor_code`).val("");

        $("#debitor_name").css('background-color', '#fff');
        $(`#debitor_name`).val("");
        $(`#debitor_id`).val("");
        $(`#debitor_code`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Loan.ReportLoanSummaryStore") !!}',
            data: {
                creditor_id: creditorID.value,
                debitor_id: debitorID.value,
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                loanDate: loanDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalPrincipalIDR = 0;
                let totalPrincipalOther = 0;
                let totalPrincipalEquivalent = 0;
                let totalIDR = 0;
                let totalOtherCurrency = 0;
                let totalEquivalent = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalPrincipalIDR += parseFloat(row.principleLoan_IDR) || 0;
                    totalPrincipalOther += parseFloat(row.principleLoan_Other_Currency) || 0;
                    totalPrincipalEquivalent += parseFloat(row.principleLoan_Equivalent_IDR) || 0;
                    totalIDR += parseFloat(row.totalLoan_IDR) || 0;
                    totalOtherCurrency += parseFloat(row.totalLoan_Other_Currency) || 0;
                    totalEquivalent += parseFloat(row.totalLoan_Equivalent_IDR) || 0;
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
                            data: 'loanNumber',
                            defaultContent: '-'
                        },
                        {
                            data: 'date',
                            defaultContent: '-'
                        },
                        {
                            data: 'type',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return data.creditorName ? data.creditorName : '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return data.debitorName ? data.debitorName : '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.principleLoan_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.principleLoan_Other_Currency || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.principleLoan_Equivalent_IDR || 0);
                            }
                        },
                        {
                            data: 'rate',
                            defaultContent: '-'
                        },
                        {
                            data: 'term',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.totalLoan_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.totalLoan_Other_Currency || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.totalLoan_Equivalent_IDR || 0);
                            }
                        },
                        {
                            data: 'notes',
                            defaultContent: '-'
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalPrincipalIDR));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalPrincipalOther));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalPrincipalEquivalent));
                        $('#table_summary tfoot th:nth-child(6)').text(currencyTotal(totalIDR));
                        $('#table_summary tfoot th:nth-child(7)').text(currencyTotal(totalOtherCurrency));
                        $('#table_summary tfoot th:nth-child(8)').text(currencyTotal(totalEquivalent));
                    }
                });

                $('#table_summary').css("width", "100%");
                $('#table_container').css("display", "block");

                HideLoading();
            },
            error: function (textStatus, errorThrown) {
                $('#table_summary').DataTable().clear().draw();
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            url: '{!! route("Loan.PrintExportReportLoanSummary") !!}',
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
                    link.download = "Export Report Loan Summary.pdf";
                } else {
                    link.download = "Export Report Loan Summary.xlsx";
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
        const isCreditorIDNotEmpty = creditorID.value.trim() !== '';
        const isDebitorIDNotEmpty = debitorID.value.trim() !== '';
        const isLoanDateNotEmpty = loanDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCreditorIDNotEmpty ||
            isDebitorIDNotEmpty ||
            isLoanDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.hideErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.hideErrorInputMessage("#loan_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.showErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.showErrorInputMessage("#loan_date_range", "#dateRangeMessage");
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
                    selectBudget(combinedBudgetID, combinedBudgetCode, combinedBudgetName);
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

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();
        const address = $(this).find('td:nth-child(4)').text();

        if (isCreditorClicked) {
            $(`#creditor_id`).val(sysId);
            $(`#creditor_code`).val(code);
            $(`#creditor_name`).val(`${code} - ${name}`);
            $(`#creditor_name`).css({ 'background-color': '#e9ecef', 'border': '1px solid #ced4da' });
            $("#creditor_message").hide();

            ErrorHandler.hideErrorInputMessage("#creditor_name", "#creditorMessage");
        } else {
            $(`#debitor_id`).val(sysId);
            $(`#debitor_code`).val(code);
            $(`#debitor_name`).val(`${code} - ${name}`);
            $(`#debitor_name`).css({ 'background-color': '#e9ecef', 'border': '1px solid #ced4da' });
            $("#debitor_message").hide();

            ErrorHandler.showErrorInputMessage("#debitor_name", "#debitorMessage");
        }

        $("#mySuppliers").modal('toggle');
    });

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

    $('#myCreditorsTrigger').on('click', function () {
        isCreditorClicked = true;
        $("#titleSuppliers").text('Choose Creditor');
    });

    $('#myDebitorsTrigger').on('click', function () {
        isCreditorClicked = false;
        $("#titleSuppliers").text('Choose Debitor');
    });

    $(window).one('load', function () {
        $('#loan_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#loan_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#loan_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#loan_date_range", "#dateRangeMessage");
        });

        $('#loan_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#loan_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#loan_date_range_container_icon').on('click', function () {
            $('#loan_date_range').trigger('click');
        });
    });
</script>