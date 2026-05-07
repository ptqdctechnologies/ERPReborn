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
    const loanToSettlementDate = document.getElementById("loan_to_settlement_date_range");

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

        $("#loan_to_settlement_date_range").css('background-color', '#fff');
        $(`#loan_to_settlement_date_range`).val("");

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
            url: '{!! route("Loan.ReportLoantoLoanSettlementStore") !!}',
            data: {
                creditor_id: creditorID.value,
                debitor_id: debitorID.value,
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                loanToSettlementDate: loanToSettlementDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalPrincipalIDR = 0;
                let totalPrincipalOther = 0;
                let totalPrincipalEquivalent = 0;

                let totalLoanIDR = 0;
                let totalLoanOtherCurrency = 0;
                let totalLoanEquivalent = 0;

                let totalSettlementIDR = 0;
                let totalSettlementOtherCurrency = 0;
                let totalSettlementEquivalent = 0;

                let totalPenaltyIDR = 0;
                let totalPenaltyOtherCurrency = 0;
                let totalPenaltyEquivalent = 0;

                let totalInterestIDR = 0;
                let totalInterestOtherCurrency = 0;
                let totalInterestEquivalent = 0;

                let totalBalancePrincipalPayment = 0;
                let totalBalancePrincipalSettlement = 0;
                let totalBalanceSettlementPayment = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

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
                            data: 'loanDate',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return data.loanDebitorName ? data.loanDebitorName : '-';
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return data.loanCreditorName ? data.loanCreditorName : '-';
                            }
                        },
                        {
                            data: '-', // RATE
                            defaultContent: '-'
                        },
                        {
                            data: '-', // TERM
                            defaultContent: '-'
                        },
                        {
                            data: '-', // PRINCIPAL LOAN - TOTAL IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // PRINCIPAL LOAN - TOTAL OTHER CURRENCY
                            defaultContent: '-'
                        },
                        {
                            data: '-', // PRINCIPAL LOAN - TOTAL EQUIVALENT IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // TOTAL LOAN - TOTAL IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // TOTAL LOAN - TOTAL OTHER CURRENCY
                            defaultContent: '-'
                        },
                        {
                            data: '-', // TOTAL LOAN - TOTAL EQUIVALENT IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // LOAN REMARK
                            defaultContent: '-'
                        },
                        {
                            data: 'loanSettleNumber', // LOAN SETTLEMENT NUMBER
                            defaultContent: '-'
                        },
                        {
                            data: 'loanSettleDate', // LOAN SETTLEMENT DATE
                            defaultContent: '-'
                        },
                        {
                            data: '-', // LOAN SETTLEMENT DEBITOR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // LOAN SETTLEMENT CREDITOR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // SETTLEMENT VALUE - TOTAL IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // SETTLEMENT VALUE - TOTAL OTHER CURRENCY
                            defaultContent: '-'
                        },
                        {
                            data: '-', // SETTLEMENT VALUE - TOTAL EQUIVALENT IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // PENALTY VALUE - TOTAL IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // PENALTY VALUE - TOTAL OTHER CURRENCY
                            defaultContent: '-'
                        },
                        {
                            data: '-', // PENALTY VALUE - TOTAL EQUIVALENT IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // INTEREST VALUE - TOTAL IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // INTEREST VALUE - TOTAL OTHER CURRENCY
                            defaultContent: '-'
                        },
                        {
                            data: '-', // INTEREST VALUE - TOTAL EQUIVALENT IDR
                            defaultContent: '-'
                        },
                        {
                            data: '-', // REMARK
                            defaultContent: '-'
                        },
                        {
                            data: '-', // BALANCE - PRINCIPAL LOAN TO PAYMENT
                            defaultContent: '-'
                        },
                        {
                            data: '-', // BALANCE - PRINCIPAL LOAN TO SETTLEMENT
                            defaultContent: '-'
                        },
                        {
                            data: '-', // BALANCE - SETTLEMENT TO PAYMENT
                            defaultContent: '-'
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalPrincipalIDR));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalPrincipalOther));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalPrincipalEquivalent));
                        $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(totalLoanIDR));
                        $('#table_summary tfoot th:nth-child(6)').text(currencyTotal(totalLoanOtherCurrency));
                        $('#table_summary tfoot th:nth-child(7)').text(currencyTotal(totalLoanEquivalent));
                        $('#table_summary tfoot th:nth-child(9)').text(currencyTotal(totalSettlementIDR));
                        $('#table_summary tfoot th:nth-child(10)').text(currencyTotal(totalSettlementOtherCurrency));
                        $('#table_summary tfoot th:nth-child(11)').text(currencyTotal(totalSettlementEquivalent));
                        $('#table_summary tfoot th:nth-child(12)').text(currencyTotal(totalPenaltyIDR));
                        $('#table_summary tfoot th:nth-child(13)').text(currencyTotal(totalPenaltyOtherCurrency));
                        $('#table_summary tfoot th:nth-child(14)').text(currencyTotal(totalPenaltyEquivalent));
                        $('#table_summary tfoot th:nth-child(15)').text(currencyTotal(totalInterestIDR));
                        $('#table_summary tfoot th:nth-child(16)').text(currencyTotal(totalInterestOtherCurrency));
                        $('#table_summary tfoot th:nth-child(17)').text(currencyTotal(totalInterestEquivalent));
                        $('#table_summary tfoot th:nth-child(19)').text(currencyTotal(totalBalancePrincipalPayment));
                        $('#table_summary tfoot th:nth-child(20)').text(currencyTotal(totalBalancePrincipalSettlement));
                        $('#table_summary tfoot th:nth-child(21)').text(currencyTotal(totalBalanceSettlementPayment));
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
        const isLoanToSettlementDateNotEmpty = loanToSettlementDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCreditorIDNotEmpty ||
            isDebitorIDNotEmpty ||
            isLoanToSettlementDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.hideErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.hideErrorInputMessage("#loan_to_settlement_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.showErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.showErrorInputMessage("#loan_to_settlement_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorNotif("No data available to export. Please display the data first.");
        }
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

    $('#myCreditorsTrigger').on('click', function () {
        isCreditorClicked = true;
        $("#titleSuppliers").text('Choose Creditor');
    });

    $('#myDebitorsTrigger').on('click', function () {
        isCreditorClicked = false;
        $("#titleSuppliers").text('Choose Debitor');
    });

    $(document).ready(function () {
        $('#loan_to_settlement_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#loan_to_settlement_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#loan_to_settlement_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#loan_to_settlement_date_range", "#dateRangeMessage");
        });

        $('#loan_to_settlement_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#loan_to_settlement_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#loan_to_settlement_date_range_container_icon').on('click', function () {
            $('#loan_to_settlement_date_range').trigger('click');
        });

        getSuppliers();
    });
</script>