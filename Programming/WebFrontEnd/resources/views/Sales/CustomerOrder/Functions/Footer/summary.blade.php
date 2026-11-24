<style>
    /*
   * Fixed-height, sticky-header, vertical-scroll-only table.
   *
   * The height math: 10 body rows x 41px (row height incl. borders) = 410px.
   * We pin every header/body cell to that same 41px so the "±10 rows"
   * viewport stays true no matter which page-length (10/20/50/100/All)
   * is selected. Only the numbers below need to change if the table's
   * font-size/padding is redesigned later.
   */
    #table_summary_wrapper {
        /* prevents any stray horizontal scrollbar from the wrapper itself */
        overflow-x: hidden;
    }

    #table_summary thead th,
    #table_summary tbody td {
        height: 41px;
        /* box-sizing: border-box;
        padding-top: 8px;
        padding-bottom: 8px; */
    }

    /* DataTables' scrollY feature clones the header into its own table
     inside .dataTables_scrollHead, and wraps the real <tbody> in
     .dataTables_scrollBody. Constrain + isolate scrolling there: */
    #table_summary_wrapper .dataTables_scrollHead,
    #table_summary_wrapper .dataTables_scrollHeadInner,
    #table_summary_wrapper .dataTables_scrollHeadInner table {
        width: 100% !important;
    }

    #table_summary_wrapper .dataTables_scrollBody {
        /* only vertical scrolling is allowed inside the table body */
        overflow-x: hidden !important;
        overflow-y: auto !important;
    }

    #table_summary_wrapper .dataTables_scrollBody table {
        width: 100% !important;
    }

    /* Pagination + "Showing x of y" info live in the DataTables footer,
     which sits outside .dataTables_scroll and therefore never scrolls
     with the body -- no extra CSS is needed to "pin" it, this comment
     just documents why. */
</style>

<script>
    let dataReport = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const budgetCode = document.getElementById("budget_code");
    const budgetPreview = document.getElementById("budget_preview");
    const coDate = document.getElementById("customer_order_date_range");
    const printType = document.getElementById("print_type");
    const TABLE_ROW_HEIGHT_PX = 41;
    const TABLE_VISIBLE_ROWS = 10;
    const TABLE_SCROLL_Y_PX = TABLE_ROW_HEIGHT_PX * TABLE_VISIBLE_ROWS; // 410px

    function selectBudget(combinedBudgetID, combinedBudgetCode, combinedBudgetName) {
        $("#budget_id").val(combinedBudgetID);
        $("#budget_code").val(combinedBudgetCode);
        $("#budget_name").val(combinedBudgetName);
        $("#budget_preview").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
        $("#budget_preview").css('background-color', '#e9ecef');
    }

    function resetForm() {
        dataReport = [];

        $('#table_container').hide();

        $("#budget_preview").css('background-color', '#fff');
        $(`#budget_preview`).val("");
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#customer_order_date_range").css('background-color', '#fff');
        $(`#customer_order_date_range`).val("");

        ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
        ErrorHandler.hideErrorInputMessage("#customer_order_date_range", "#dateRangeMessage");
    }

    function getDataReport() {
        let total = 0;
        let totalVAT = 0;
        let totalWithVAT = 0;

        $('#table_summary').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            lengthMenu: [
                [10, 20, 50, 100, -1],
                [10, 20, 50, 100, "All"]
            ],
            pageLength: 10,
            scrollY: `${TABLE_SCROLL_Y_PX}px`,
            scrollCollapse: true,
            scrollX: false,
            ajax: {
                type: 'POST',
                url: '{!! route("CustomerOrder.ReportSummaryStore") !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    d.budget_code = budgetCode.value;
                    d.customer_order_date = coDate.value;

                    return d;
                },
                dataSrc: function (json) {
                    // simpan seluruh response
                    dataReport = json.data;

                    json.data.forEach(function (row) {
                        const value = Utils.parseFloatSafe(row.value);
                        const vatRatio = Utils.parseFloatSafe(row.vatRatio);

                        const resultTotalVAT = (value * vatRatio) / 100;
                        const resultTotalWithVAT = value + ((value * vatRatio) / 100);

                        total += value;
                        totalVAT += parseFloat(resultTotalVAT);
                        totalWithVAT += parseFloat(resultTotalWithVAT);
                    });

                    return json.data;
                },
                beforeSend: function () {
                    Utils.showLoading();

                    total = 0;
                    totalVAT = 0;
                    totalWithVAT = 0;

                    $('#table_summary tbody').empty();
                    $('#table_container').css("display", "none");
                },
                complete: function () {
                    Utils.hideLoading();

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");

                    $('#table_summary').DataTable().columns.adjust();
                },
            },
            columns: [
                {
                    data: null,
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        return (meta.row + meta.settings._iDisplayStart + 1);
                    }
                },
                {
                    data: 'customerOrderNumber',
                    defaultContent: '-',
                    className: "text-wrap",
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        return `${data.combinedBudgetCode} - ${data.combinedBudgetName}`;
                    }
                },
                {
                    data: 'date',
                    defaultContent: '-',
                    className: "text-wrap",
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        return currencyTotal(data.value || '0');
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        return `${currencyTotal(data.vatRatio || '0')} %`;
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        const result = (
                            Utils.parseFloatSafe(data.value) *
                            Utils.parseFloatSafe(data.vatRatio)
                        ) / 100;

                        return currencyTotal(result || 0);
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        const value = Utils.parseFloatSafe(data.value);
                        const vatRatio = Utils.parseFloatSafe(data.vatRatio);

                        const result = value + ((value * vatRatio) / 100);

                        return currencyTotal(result || 0);
                    }
                },
                {
                    data: 'notes',
                    defaultContent: '-',
                    className: "text-wrap",
                }
            ],
            drawCallback: function (settings) {
                // $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(total));
                $('#grandTotal').text(currencyTotal(total));
                $('#grandTotalVAT').text(currencyTotal(totalVAT));
                $('#grandTotalWithVAT').text(currencyTotal(totalWithVAT));
            }
        });
    }

    function exportDataReport() {
        Utils.showLoading();

        $.ajax({
            url: '{!! route("CustomerOrder.PrintExportReportCustomerOrder") !!}',
            type: 'POST',
            data: {
                budgetPreview: budgetPreview.value || '-',
                dataReport: JSON.stringify(dataReport),
                coDate: coDate.value || '-',
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
                    link.download = "Export Report Customer Order.pdf";
                } else {
                    link.download = "Export Report Customer Order.xlsx";
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
        const isBudgetCodeNotEmpty = budgetCode.value.trim() !== '';
        const isCoDateNotEmpty = coDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetCodeNotEmpty ||
            isCoDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
            ErrorHandler.hideErrorInputMessage("#customer_order_date_range", "#dateRangeMessage");

            if (isBudgetCodeNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_preview", "#budget_message");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_preview", "#budget_message");
            ErrorHandler.showErrorInputMessage("#customer_order_date_range", "#dateRangeMessage");
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

    $('#budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_id").val("");
            $("#budget_code").val("");
            $("#budget_name").val("");
            $("#budget_preview").val("");
            $("#budget_preview").css('background-color', '#fff');

            if (Utils.isUserAuthorizedForReport()) {
                selectBudget(id, code, name);
            } else {
                Utils.showBudgetLoading();

                userAllowedToInvolve(id, code, name, documentTypeID.value, selectBudget);
            }

            ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
        }

        $("#budget_code_modal").modal('toggle');
    });

    $(document).ready(function () {
        $('#customer_order_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#customer_order_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#customer_order_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#customer_order_date_range", "#dateRangeMessage");
        });

        $('#customer_order_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#customer_order_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#customer_order_date_range_container_icon').on('click', function () {
            $('#customer_order_date_range').trigger('click');
        });

        // Keep <thead>/<tbody>/<tfoot> column widths in sync with each
        // other whenever the viewport/container is resized. DataTables
        // already listens for window resize internally for scrollY
        // tables, but this is a cheap, explicit safeguard using the same
        // official columns.adjust() API (no hardcoded widths), debounced
        // so it doesn't fire on every pixel while the user drags.
        let tableResizeTimeout;
        $(window).on('resize', function () {
            clearTimeout(tableResizeTimeout);
            tableResizeTimeout = setTimeout(function () {
                if ($.fn.dataTable.isDataTable('#table_summary')) {
                    $('#table_summary').DataTable().columns.adjust();
                }
            }, 150);
        });
    });
</script>