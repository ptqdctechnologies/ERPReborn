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
    const supplierID = document.getElementById("supplier_id");
    const supplierName = document.getElementById("supplier_name");
    const poDate = document.getElementById("purchase_order_date_range");
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

        $("#supplier_name").css('background-color', '#fff');
        $(`#supplier_name`).val("");
        $(`#supplier_id`).val("");
        $(`#supplier_code`).val("");

        $("#purchase_order_date_range").css('background-color', '#fff');
        $(`#purchase_order_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("PurchaseOrder.ReportPurchaseOrderSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                supplier_id: supplierID.value,
                poDate: poDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalValuePO = 0;
                let totalVATPO = 0;
                let totalValuePOOtherCurrency = 0;
                let totalVATPOOtherCurrency = 0;
                let totalValuePOEquivalentIDR = 0;
                let totalVATPOEquivalentIDR = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalValuePO += parseFloat(row.total_Idr_WithoutVat) || 0;
                    totalVATPO += parseFloat(row.total_Vat_IDR) || 0;
                    totalValuePOOtherCurrency += parseFloat(row.total_Other_Currency_WithoutVat) || 0;
                    totalVATPOOtherCurrency += parseFloat(row.total_Vat_Other_Currency) || 0;
                    totalValuePOEquivalentIDR += parseFloat(row.total_Equivalent_Value) || 0;
                    totalVATPOEquivalentIDR += parseFloat(row.total_Equivalent_Vat) || 0;
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
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            className: "text-nowrap",
                            render: function (data, type, row, meta) {
                                return `${data.supplier_Code || ''} - ${data.supplier_Name || ''}`;
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Idr_WithoutVat || '0');
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Vat_IDR || '0');
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Other_Currency_WithoutVat || '0');
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Vat_Other_Currency || '0');
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Equivalent_Value || '0');
                            }
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return currencyTotal(data.total_Equivalent_Vat || '0');
                            }
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalValuePO));
                        $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalVATPO));
                        $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalValuePOOtherCurrency));
                        $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(totalVATPOOtherCurrency));
                        $('#table_summary tfoot th:nth-child(6)').text(currencyTotal(totalValuePOEquivalentIDR));
                        $('#table_summary tfoot th:nth-child(7)').text(currencyTotal(totalVATPOEquivalentIDR));
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
            url: '{!! route("PurchaseOrder.PrintExportReportPurchaseOrderSummary") !!}',
            type: 'POST',
            data: {
                dataReport: JSON.stringify(dataReport),
                budgetName: budgetName.value,
                subBudgetName: subBudgetName.value,
                supplierName: supplierName.value,
                poDate: poDate.value,
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
                    link.download = "Export Report Purchase Order Summary.pdf";
                } else {
                    link.download = "Export Report Purchase Order Summary.xlsx";
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
        const isSupplierIDNotEmpty = supplierID.value.trim() !== '';
        const isPoDateNotEmpty = poDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isSupplierIDNotEmpty ||
            isPoDateNotEmpty
        ) {
            hideErrorInputMessage("#budget_name", "#budgetMessage");
            hideErrorInputMessage("#supplier_name", "#supplierMessage");
            hideErrorInputMessage("#purchase_order_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            showErrorInputMessage("#budget_name", "#budgetMessage");
            showErrorInputMessage("#supplier_name", "#supplierMessage");
            showErrorInputMessage("#purchase_order_date_range", "#dateRangeMessage");
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

        hideErrorInputMessage("#budget_name", "#budgetMessage");

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

        hideErrorInputMessage("#sub_budget_name", "#subBudgetMessage");

        $('#mySites').modal('hide');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const supplierCode = $(this).find('td:nth-child(2)').text();
        const supplierName = $(this).find('td:nth-child(3)').text();
        const supplierAddress = $(this).find('td:nth-child(4)').text();

        $("#supplier_id").val(sysId);
        $("#supplier_code").val(supplierCode);
        $("#supplier_name").val(`${supplierCode} - ${supplierName}`);
        $("#supplier_name").css('background-color', '#e9ecef');

        hideErrorInputMessage("#supplier_name", "#supplierMessage");

        $('#mySuppliers').modal('hide');
    });

    $(window).one('load', function () {
        $('#purchase_order_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#purchase_order_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#purchase_order_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            hideErrorInputMessage("#purchase_order_date_range", "#dateRangeMessage");
        });

        $('#purchase_order_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#purchase_order_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#purchase_order_date_range_container_icon').on('click', function () {
            $('#purchase_order_date_range').trigger('click');
        });
    });
</script>