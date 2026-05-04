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
    const warehouseID = document.getElementById("warehouse_id");
    const warehouseName = document.getElementById("warehouse_name");
    const doDate = document.getElementById("delivery_order_date_range");
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

        $("#warehouse_name").css('background-color', '#fff');
        $(`#warehouse_name`).val("");
        $(`#warehouse_id`).val("");

        $("#delivery_order_date_range").css('background-color', '#fff');
        $(`#delivery_order_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("DeliveryOrder.ReportDeliveryOrderSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                warehouse_id: warehouseID.value,
                doDate: doDate.value
            },
            dataType: 'json',
            success: function (response) {
                let totalQuantity = 0;

                let data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                data.forEach(function (row) {
                    totalQuantity += parseFloat(row.quantity) || 0;
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
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                let dateOrigin = new Date(data.date);
                                let formattedDate = dateOrigin.toISOString().split('T')[0];

                                return formattedDate;
                            }
                        },
                        {
                            data: 'type',
                            defaultContent: '-'
                        },
                        {
                            data: 'quantity',
                            defaultContent: '-'
                        },
                        {
                            data: 'deliveryFrom_NonRefID.address',
                            defaultContent: '-'
                        },
                        {
                            data: 'deliveryTo_NonRefID.address',
                            defaultContent: '-'
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            render: function (data, type, row, meta) {
                                return `${data.transporter_Code ? `${data.transporter_Code} -` : ''} ${data.transporter_Name || ''}`;
                            }
                        }
                    ],
                    drawCallback: function (settings) {
                        $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalQuantity));
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
            url: '{!! route("DeliveryOrder.PrintExportReportDeliveryOrderSummary") !!}',
            data: {
                dataReport: JSON.stringify(dataReport),
                budgetName: budgetName.value,
                subBudgetName: subBudgetName.value,
                warehouseName: warehouseName.value,
                doDate: doDate.value,
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
                    link.download = 'Report Delivery Order Summary.pdf';
                } else {
                    link.download = 'Report Delivery Order Summary.xlsx';
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
        const isWarehouseIDNotEmpty = warehouseID.value.trim() !== '';
        const isDeliveryDateNotEmpty = doDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isWarehouseIDNotEmpty ||
            isDeliveryDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#warehouse_name", "#warehouseMessage");
            ErrorHandler.hideErrorInputMessage("#delivery_order_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#warehouse_name", "#warehouseMessage");
            ErrorHandler.showErrorInputMessage("#delivery_order_date_range", "#dateRangeMessage");
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

        $('#mySites').modal('hide');
    });

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const address = $(this).find('td:nth-child(3)').text();

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(`${name} - ${address}`);
        $("#warehouse_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#warehouse_name", "#warehouseMessage");

        $('#myGetModalWarehouses').modal('toggle');
    });

    $(document).ready(function () {
        $('#delivery_order_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#delivery_order_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#delivery_order_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#delivery_order_date_range", "#dateRangeMessage");
        });

        $('#delivery_order_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#delivery_order_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#delivery_order_date_range_container_icon').on('click', function () {
            $('#delivery_order_date_range').trigger('click');
        });

        getModalWarehouses();
    });
</script>