<script>
    let dataReport = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetName = document.getElementById("budget_name");
    const budgetCode = document.getElementById("budget_code");
    const subBudgetID = document.getElementById("site_id");
    const subBudgetName = document.getElementById("site_name");
    const subBudgetCode = document.getElementById("site_code");
    const requesterID = document.getElementById("requester_id");
    const asfDate = document.getElementById("asfDate");
    const printType = document.getElementById("print_type");

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#site_name").css('background-color', '#fff');
        $(`#site_name`).val("");
        $(`#site_id`).val("");
        $(`#site_code`).val("");

        $("#requester_name").css('background-color', '#fff');
        $(`#requester_name`).val("");
        $(`#requester_id`).val("");

        $("#asfDate").css('background-color', '#fff');
        $(`#asfDate`).val("");

        hideErrorInputMessage("#budget_name", "#budgetMessage");
        hideErrorInputMessage("#requester_name", "#requesterMessage");
        hideErrorInputMessage("#asfDate", "#dateRangeMessage");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("AdvanceSettlement.ReportAdvanceSettlementSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_name: budgetName.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_name: subBudgetName.value,
                site_code: subBudgetCode.value,
                asfDate: asfDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalExpenseClaim = 0;
                let totalAmountDueCompany = 0;
                let totalAdvanceSettlement = 0;

                if (response.status === 200 && response.data[0]) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

                    data.forEach(function (row) {
                        totalExpenseClaim += parseFloat(row.total_Expense_Claim) || 0;
                        totalAmountDueCompany += parseFloat(row.total_Amount_Due_Company) || 0;
                        totalAdvanceSettlement += parseFloat(row.total_Advance_Settlement) || 0;
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
                                data: 'documentNumber',
                                defaultContent: '-',
                                className: "text-nowrap",
                            },
                            {
                                data: 'date',
                                defaultContent: '-',
                                className: "text-nowrap",
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Expense_Claim || '0');
                                }
                            },
                            {
                                data: null,
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
                                    return currencyTotal(data.total_Amount_Due_Company || '0');
                                }
                            },
                            {
                                data: null,
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
                                    return currencyTotal(data.total_Advance_Settlement || '0');
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: 'requester',
                                defaultContent: '-',
                                className: "text-nowrap",
                            },
                            {
                                data: 'remarks',
                                defaultContent: '-'
                            }
                        ],
                        drawCallback: function (settings) {
                            // Start of Menghitung total berdasarkan data yang tampil pada halaman aktif
                            // let api                         = this.api();
                            // let totalExpenseClaimPage       = 0;
                            // let totalAmountDueCompanyPage   = 0;
                            // let totalAdvanceSettlementPage  = 0;

                            // api.rows({ page: 'current' }).every(function(rowIdx, tableLoop, rowLine) {
                            //     let row                     = api.row(rowIdx).data();
                            //     totalExpenseClaimPage       += parseFloat(row.total_Expense_Claim) || 0;
                            //     totalAmountDueCompanyPage   += parseFloat(row.total_Amount_Due_Company) || 0;
                            //     totalAdvanceSettlementPage  += parseFloat(row.total_Advance_Settlement) || 0;
                            // });
                            // End of Menghitung total berdasarkan data yang tampil pada halaman aktif

                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalExpenseClaim));
                            $('#table_summary tfoot th:nth-child(3)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(4)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(totalAmountDueCompany));
                            $('#table_summary tfoot th:nth-child(6)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(7)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(8)').text(currencyTotal(totalAdvanceSettlement));
                            $('#table_summary tfoot th:nth-child(9)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(10)').text(currencyTotal('0'));
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
                        drawCallback: function (settings) {
                            // Start of Menghitung total berdasarkan data yang tampil pada halaman aktif
                            // let api                         = this.api();
                            // let totalExpenseClaimPage       = 0;
                            // let totalAmountDueCompanyPage   = 0;
                            // let totalAdvanceSettlementPage  = 0;

                            // api.rows({ page: 'current' }).every(function(rowIdx, tableLoop, rowLine) {
                            //     let row                     = api.row(rowIdx).data();
                            //     totalExpenseClaimPage       += parseFloat(row.total_Expense_Claim) || 0;
                            //     totalAmountDueCompanyPage   += parseFloat(row.total_Amount_Due_Company) || 0;
                            //     totalAdvanceSettlementPage  += parseFloat(row.total_Advance_Settlement) || 0;
                            // });
                            // End of Menghitung total berdasarkan data yang tampil pada halaman aktif

                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalExpenseClaim));
                            $('#table_summary tfoot th:nth-child(3)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(4)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(totalAmountDueCompany));
                            $('#table_summary tfoot th:nth-child(6)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(7)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(8)').text(currencyTotal(totalAdvanceSettlement));
                            $('#table_summary tfoot th:nth-child(9)').text(currencyTotal('0'));
                            $('#table_summary tfoot th:nth-child(10)').text(currencyTotal('0'));
                        }
                    });

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");
                }

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
            url: '{!! route("AdvanceSettlement.PrintExportReportAdvanceSettlementSummary") !!}',
            type: 'POST',
            data: {
                dataReport,
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
                    link.download = "Export Report Advance Settlement Summary.pdf";
                } else {
                    link.download = "Export Report Advance Settlement Summary.xlsx";
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
        const isRequesterIDNotEmpty = requesterID.value.trim() !== '';
        const isAsfDateNotEmpty = asfDate.value.trim() !== '';

        if (
            isBudgetIDNotEmpty ||
            isRequesterIDNotEmpty ||
            isAsfDateNotEmpty
        ) {
            hideErrorInputMessage("#budget_name", "#budgetMessage");
            hideErrorInputMessage("#requester_name", "#requesterMessage");
            hideErrorInputMessage("#asfDate", "#dateRangeMessage");

            if (
                !isBudgetIDNotEmpty && organizationalDepartmentName.value === 'Finance & Accounting' || (
                    organizationalJobPositionName.value === 'General Manager' ||
                    organizationalJobPositionName.value === 'Senior Manager' ||
                    organizationalJobPositionName.value === 'Director'
                )) {
                getDataReport();
            } else {
                if (isBudgetIDNotEmpty) {
                    getDataReport();
                } else {
                    showErrorInputMessage("#budget_name", "#budgetMessage");
                }
            }
        } else {
            showErrorInputMessage("#budget_name", "#budgetMessage");
            showErrorInputMessage("#requester_name", "#requesterMessage");
            showErrorInputMessage("#asfDate", "#dateRangeMessage");
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

        if (organizationalDepartmentName.value === 'Finance & Accounting' || (
            organizationalJobPositionName.value === 'General Manager' ||
            organizationalJobPositionName.value === 'Senior Manager' ||
            organizationalJobPositionName.value === 'Director'
        )) {
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
        } else {
            $("#loadingBudget").show();
            $("#iconBudget").hide();

            getWorkflow(sysId, code, name);
        }

        hideErrorInputMessage("#budget_name", "#budgetMessage");

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#site_id").val(sysId);
        $("#site_code").val(code);
        $("#site_name").val(`${code} - ${name}`);
        $("#site_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#sub_budget_name", "#subBudgetMessage");

        $("#mySites").modal('toggle');
    });

    $('#tableRequesters').on('click', 'tbody tr', function () {
        let sysId = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        let name = $(this).find('td:nth-child(2)').text();
        let position = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#requester_name", "#requesterMessage");

        $('#myRequesters').modal('hide');
    });

    $(document).ready(function () {
        $('#asfDate').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#asfDate').on('apply.daterangepicker', function (ev, picker) {
            $("#asfDate").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            hideErrorInputMessage("#asfDate", "#dateRangeMessage");
        });

        $('#asfDate').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        $('#asfDate-icon').on('click', function () {
            $('#asfDate').trigger('click');
        });

        getRequesters();
    });
</script>