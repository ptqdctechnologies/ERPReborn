<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const budgetName    = document.getElementById("budget_name");
    const subBudgetID   = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const subBudgetName = document.getElementById("sub_budget_name");
    const supplierID    = document.getElementById("supplier_id");
    const supplierName  = document.getElementById("supplier_name");
    const poDate        = document.getElementById("purchase_order_date_range_container");
    const printType     = document.getElementById("print_type");

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
            success: function(response) {
                if (response.status === 200 && response.data[0]) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

                    let totalValuePO                = 0;
                    let totalVATPO                  = 0;
                    let totalValuePOOtherCurrency   = 0;
                    let totalVATPOOtherCurrency     = 0;
                    let totalValuePOEquivalentIDR   = 0;
                    let totalVATPOEquivalentIDR     = 0;

                    data.forEach(function(row) {
                        totalValuePO                += parseFloat(row.total_Idr_WithoutVat) || 0;
                        totalVATPO                  += parseFloat(row.total_Vat_IDR) || 0;
                        totalValuePOOtherCurrency   += parseFloat(row.total_Other_Currency_WithoutVat) || 0;
                        totalVATPOOtherCurrency     += parseFloat(row.total_Vat_Other_Currency) || 0;
                        totalValuePOEquivalentIDR   += parseFloat(row.total_Equivalent_Value) || 0;
                        totalVATPOEquivalentIDR     += parseFloat(row.total_Equivalent_Vat) || 0;
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
                                render: function (data, type, row, meta) {
                                    return `${data.supplier_Code} - ${data.supplier_Name}`;
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Idr_WithoutVat);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Vat_IDR);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Other_Currency_WithoutVat);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Vat_Other_Currency);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Equivalent_Value);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Equivalent_Vat);
                                }
                            }
                        ],
                        drawCallback: function(settings) {
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
                } else {
                    $('#table_container').hide(); 
                    $('#table_summary tbody').empty();
                    $('#table_summary tfoot').empty();
                    ErrorNotif("Error");
                }

                HideLoading();
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    function exportDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{!! route("PurchaseOrder.PrintExportReportPurchaseOrderSummary") !!}',
            type: 'POST',
            data: {
                dataReport,
                budgetName: budgetName.value,
                subBudgetName: subBudgetName.value,
                supplierName: supplierName.value,
                poDate: poDate.value,
                printType: printType.value
            },
            xhrFields: { 
                responseType: 'blob'
            },
            success: function(response) {
                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report Purchase Request Summary.pdf";
                } else {
                    link.download = "Export Report Purchase Request Summary.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                HideLoading();
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('hide');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function() {
        const sysId             = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const supplierCode      = $(this).find('td:nth-child(2)').text();
        const supplierName      = $(this).find('td:nth-child(3)').text();
        const supplierAddress   = $(this).find('td:nth-child(4)').text();

        $("#supplier_id").val(sysId);
        $("#supplier_code").val(supplierCode);
        $("#supplier_name").val(`${supplierCode} - ${supplierName}`);
        $("#supplier_name").css('background-color', '#e9ecef');

        $('#mySuppliers').modal('hide');
    });

    $(window).one('load', function() {
        $('#purchase_order_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#purchase_order_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#purchase_order_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#purchase_order_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#purchase_order_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#purchase_order_date_range_container_icon').on('click', function () {
            $('#purchase_order_date_range').trigger('click');
        });
    });
</script>