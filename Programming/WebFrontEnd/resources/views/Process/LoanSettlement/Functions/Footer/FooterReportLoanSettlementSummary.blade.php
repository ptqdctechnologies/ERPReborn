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
    const loanSettlementDate = document.getElementById("loan_settlement_date_range");

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

        $("#loan_settlement_date_range").css('background-color', '#fff');
        $(`#loan_settlement_date_range`).val("");

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
            url: '{!! route("LoanSettlement.ReportLoanSettlementSummaryStore") !!}',
            data: {
                creditor_id: creditorID.value,
                debitor_id: debitorID.value,
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                loanSettlementDate: loanSettlementDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalSettlementIDR = 0;
                let totalSettlementOther = 0;
                let totalSettlementEquivalent = 0;
                let totalPenaltyIDR = 0;
                let totalPenaltyOther = 0;
                let totalPenaltyEquivalent = 0;
                let totalInterestIDR = 0;
                let totalInterestOther = 0;
                let totalInterestEquivalent = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalSettlementIDR += parseFloat(row.total_Settlement_IDR) || 0;
                    totalSettlementOther += parseFloat(row.total_Settlement_Other_Currency) || 0;
                    totalSettlementEquivalent += parseFloat(row.total_Settlement_Equivalent_IDR) || 0;
                    totalPenaltyIDR += parseFloat(row.total_Penalty_IDR) || 0;
                    totalPenaltyOther += parseFloat(row.total_Penalty_Other_Currency) || 0;
                    totalPenaltyEquivalent += parseFloat(row.total_Penalty_Equivalent_IDR) || 0;
                    totalInterestIDR += parseFloat(row.total_Interest_IDR) || 0;
                    totalInterestOther += parseFloat(row.total_Interest_Other_Currency) || 0;
                    totalInterestEquivalent += parseFloat(row.total_Interest_Equivalent_IDR) || 0;
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
                            data: 'loanSettlementNumber',
                            defaultContent: '-'
                        },
                        {
                            data: 'loanNumber',
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
                                return currencyTotal(data.total_Settlement_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Settlement_Other_Currency || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Settlement_Equivalent_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Penalty_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Penalty_Other_Currency || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Penalty_Equivalent_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Interest_IDR || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Interest_Other_Currency || 0);
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Interest_Equivalent_IDR || 0);
                            }
                        },
                        {
                            data: 'notes',
                            defaultContent: '-'
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalSettlementIDR));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalSettlementOther));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalSettlementEquivalent));
                        $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(totalPenaltyIDR));
                        $('#table_summary tfoot th:nth-child(6)').text(currencyTotal(totalPenaltyOther));
                        $('#table_summary tfoot th:nth-child(7)').text(currencyTotal(totalPenaltyEquivalent));
                        $('#table_summary tfoot th:nth-child(8)').text(currencyTotal(totalInterestIDR));
                        $('#table_summary tfoot th:nth-child(9)').text(currencyTotal(totalInterestOther));
                        $('#table_summary tfoot th:nth-child(10)').text(currencyTotal(totalInterestEquivalent));
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

    function validateShowButton() {
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isCreditorIDNotEmpty = creditorID.value.trim() !== '';
        const isDebitorIDNotEmpty = debitorID.value.trim() !== '';
        const isLoanSettlementDateNotEmpty = loanSettlementDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCreditorIDNotEmpty ||
            isDebitorIDNotEmpty ||
            isLoanSettlementDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.hideErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.hideErrorInputMessage("#loan_settlement_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.showErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.showErrorInputMessage("#loan_settlement_date_range", "#dateRangeMessage");
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
        $('#loan_settlement_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#loan_settlement_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#loan_settlement_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#loan_settlement_date_range", "#dateRangeMessage");
        });

        $('#loan_settlement_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#loan_settlement_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#loan_settlement_date_range_container_icon').on('click', function () {
            $('#loan_settlement_date_range').trigger('click');
        });
    });
</script>