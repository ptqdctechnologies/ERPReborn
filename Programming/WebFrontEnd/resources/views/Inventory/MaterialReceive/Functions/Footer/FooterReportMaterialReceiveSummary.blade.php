<script>
    let dataReport = [];
    let triggerWarehouse = null;
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const budgetName = document.getElementById("budget_name");
    const receivedID = document.getElementById("received_id");
    const receivedName = document.getElementById("received_name");
    const deliveryFromID = document.getElementById("delivery_from_id");
    const deliveryFromName = document.getElementById("delivery_from_name");
    const deliveryToID = document.getElementById("delivery_to_id");
    const deliveryToName = document.getElementById("delivery_to_name");
    const mrDate = document.getElementById("material_receive_date_range");
    const printType = document.getElementById("print_type");

    function changeTriggerWarehouse(params) {
        triggerWarehouse = params;
    }

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function resetForm() {
        triggerWarehouse = null;
        dataReport = [];

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#received_name").css('background-color', '#fff');
        $(`#received_name`).val("");
        $(`#received_id`).val("");

        $("#delivery_from_name").css('background-color', '#fff');
        $(`#delivery_from_name`).val("");
        $(`#delivery_from_id`).val("");

        $("#delivery_to_name").css('background-color', '#fff');
        $(`#delivery_to_name`).val("");
        $(`#delivery_to_id`).val("");

        $("#material_receive_date_range").css('background-color', '#fff');
        $(`#material_receive_date_range`).val("");
    }

    function getDataReport() {
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("MaterialReceive.ReportMaterialReceiveSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                received_id: receivedID.value,
                delivery_from_id: deliveryFromID.value,
                delivery_to_id: deliveryToID.value,
                mrDate: mrDate.value
            },
            dataType: 'json',
            success: function (response) {
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
                            data: 'MR_Number',
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
                            data: 'combinedBudgetName',
                            defaultContent: '-'
                        },
                        {
                            data: 'referenceNumber',
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
                            data: 'receiveAt',
                            defaultContent: '-'
                        },
                        {
                            data: 'remarks',
                            defaultContent: '-'
                        }
                    ]
                });

                $('#table_summary').css("width", "100%");
                $('#table_container').css("display", "block");

                Utils.hideLoading();
            },
            error: function (xhr, status, error) {
                console.log('xhr, status, error', xhr, status, error);

                Utils.hideLoading();
                ErrorHandler.notifToast(
                    'error',
                    'An error occurred while processing the received data. Please try again later',
                    'Error!'
                );
            }
        });
    }

    function exportDataReport() {
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("MaterialReceive.PrintExportReportMaterialReceiveSummary") !!}',
            data: {
                dataReport: JSON.stringify(dataReport),
                budgetName: budgetName.value,
                receivedName: receivedName.value,
                deliveryFromName: deliveryFromName.value,
                deliveryToName: deliveryToName.value,
                mrDate: mrDate.value,
                printType: printType.value
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function (response) {
                let blob = new Blob([response], { type: response.type });
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = 'Report Material Receive Summary.pdf';
                } else {
                    link.download = 'Report Material Receive Summary.xlsx';
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                Utils.hideLoading();
            },
            error: function (xhr, status, error) {
                console.log('xhr, status, error', xhr, status, error);

                Utils.hideLoading();
                ErrorHandler.notifToast(
                    'error',
                    'An error occurred while processing the received data. Please try again later',
                    'Error!'
                );
            }
        });
    }

    function validateShowButton() {
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isReceivedIDNotEmpty = receivedID.value.trim() !== '';
        const isDeliveryFromIDNotEmpty = deliveryFromID.value.trim() !== '';
        const isDeliveryToIDNotEmpty = deliveryToID.value.trim() !== '';
        const isMaterialDateNotEmpty = mrDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isReceivedIDNotEmpty ||
            isDeliveryFromIDNotEmpty ||
            isDeliveryToIDNotEmpty ||
            isMaterialDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#received_name", "#receivedAtMessage");
            ErrorHandler.hideErrorInputMessage("#delivery_from_name", "#deliveryFromMessage");
            ErrorHandler.hideErrorInputMessage("#delivery_to_name", "#deliveryToMessage");
            ErrorHandler.hideErrorInputMessage("#material_receive_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#received_name", "#receivedAtMessage");
            ErrorHandler.showErrorInputMessage("#delivery_from_name", "#deliveryFromMessage");
            ErrorHandler.showErrorInputMessage("#delivery_to_name", "#deliveryToMessage");
            ErrorHandler.showErrorInputMessage("#material_receive_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorHandler.notifToast(
                'error',
                'No data available to export. Please display the data first',
                'Error!'
            );
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

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const address = $(this).find('td:nth-child(3)').text();

        if (triggerWarehouse === "RECEIVED_AT") {
            $("#received_id").val(sysId);
            $("#received_name").val(`${name} - ${address}`);
            $("#received_name").css('background-color', '#e9ecef');

            ErrorHandler.hideErrorInputMessage("#received_name", "#receivedAtMessage");
        } else if (triggerWarehouse === "DELIVERY_TO") {
            $("#delivery_to_id").val(sysId);
            $("#delivery_to_name").val(`${name} - ${address}`);
            $("#delivery_to_name").css('background-color', '#e9ecef');

            ErrorHandler.hideErrorInputMessage("#delivery_to_name", "#deliveryToMessage");
        }

        $('#myGetModalWarehouses').modal('toggle');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();
        const address = $(this).find('td:nth-child(4)').text();

        $("#delivery_from_id").val(sysId);
        $("#delivery_from_name").val(`${code} - ${name}`);
        $("#delivery_from_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#delivery_from_name", "#deliveryFromMessage");

        $('#mySuppliers').modal('toggle');
    });

    $(document).ready(function () {
        $('#material_receive_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#material_receive_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#material_receive_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#material_receive_date_range", "#dateRangeMessage");
        });

        $('#material_receive_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#material_receive_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#material_receive_date_range_container_icon').on('click', function () {
            $('#material_receive_date_range').trigger('click');
        });

        getSuppliers();
    });
</script>