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
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const subBudgetID = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const requesterID = document.getElementById("requester_id");
    const beneficiaryID = document.getElementById("beneficiary_id");
    const brfDate = document.getElementById("business_trip_date_range");
    const printType = document.getElementById("print_type");
    const TABLE_ROW_HEIGHT_PX = 41;
    const TABLE_VISIBLE_ROWS = 10;
    const TABLE_SCROLL_Y_PX = TABLE_ROW_HEIGHT_PX * TABLE_VISIBLE_ROWS; // 410px

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

        $('#table_container').hide();

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#mySitesTrigger").prop("disabled", true);
        $("#mySitesTrigger").css({ "cursor": "not-allowed" });
        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#requester_name").css('background-color', '#fff');
        $(`#requester_name`).val("");
        $(`#requester_id`).val("");

        $("#beneficiary_name").css('background-color', '#fff');
        $(`#beneficiary_name`).val("");
        $(`#beneficiary_id`).val("");

        $("#business_trip_date_range").css('background-color', '#fff');
        $(`#business_trip_date_range`).val("");

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
        ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");
        ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
        ErrorHandler.hideErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");
    }

    function getDataReport() {
        let totalBRF = 0;

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
                url: '{!! route("BusinessTripRequest.ReportBusinessTripRequestSummaryStore") !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    d.budget_code = budgetCode.value;
                    d.site_code = subBudgetCode.value;
                    d.requester_id = requesterID.value;
                    d.beneficiary_id = beneficiaryID.value;
                    d.brfDate = brfDate.value;

                    return d;
                },
                dataSrc: function (json) {
                    dataReport = json.data;

                    json.data.forEach(function (row) {
                        totalBRF += parseFloat(row.brfTotal) || 0;
                    });

                    return json.data;
                },
                beforeSend: function () {
                    Utils.showLoading();

                    totalBRF = 0;

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
                    render: function (data, type, row, meta) {
                        return (meta.row + meta.settings._iDisplayStart + 1);
                    }
                },
                {
                    data: 'brfNumber',
                    defaultContent: '-',
                    className: "text-wrap"
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        return `${data.combinedBudgetSectionCode || ''} - ${data.combinedBudgetSectionName || ''}`;
                    }
                },
                {
                    data: 'departurePoint',
                    defaultContent: '-',
                    className: "text-wrap"
                },
                {
                    data: 'destinationPoint',
                    defaultContent: '-',
                    className: "text-wrap"
                },
                {
                    data: 'brfDate',
                    defaultContent: '-',
                    className: "text-wrap"
                },
                {
                    data: 'currencyISOCode',
                    defaultContent: '-',
                    className: "text-wrap"
                },
                {
                    data: 'requesterName',
                    defaultContent: '-',
                    className: "text-wrap"
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "text-wrap",
                    render: function (data, type, row, meta) {
                        return Utils.formatCurrency(Utils.parseFloatSafe(data.brfTotal));
                    }
                },
                {
                    data: null,
                    defaultContent: '0.00',
                    className: "text-wrap"
                },
                {
                    data: null,
                    defaultContent: '0.00',
                    className: "text-wrap"
                },
                {
                    data: 'remarks',
                    defaultContent: '-',
                    className: "text-wrap"
                }
            ],
            drawCallback: function (settings) {
                // $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalBRF));
                $('#grandTotalIDR').text(currencyTotal(totalBRF));
                $('#grandTotalEquivalentIDR').text(currencyTotal(0));
            }
        });
    }

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            url: '{!! route("BusinessTripRequest.PrintExportReportBusinessTripRequestSummary") !!}',
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
                    link.download = "Export Report Business Trip Summary.pdf";
                } else {
                    link.download = "Export Report Business Trip Summary.xlsx";
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
        const isSubBudgetIDNotEmpty = subBudgetID.value.trim() !== '';
        const isRequesterIDNotEmpty = requesterID.value.trim() !== '';
        const isBeneficiaryIDNotEmpty = beneficiaryID.value.trim() !== '';
        const isBrfDateNotEmpty = brfDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isRequesterIDNotEmpty ||
            isBeneficiaryIDNotEmpty ||
            isBrfDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");
            ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
            ErrorHandler.hideErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#requester_name", "#requesterMessage");
            // ErrorHandler.showErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");
            ErrorHandler.showErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");
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

    $('#tableSites').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#sub_budget_name", "#subBudgetMessage");

        $('#mySites').modal('hide');
    });

    $('#tableRequesters').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const position = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");

        $('#myRequesters').modal('hide');
    });

    $('#tableBeneficiaries').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const position = $(this).find('td:nth-child(3)').text();

        $("#beneficiary_id").val(sysId);
        $("#beneficiary_name").val(`${position} - ${name}`);
        $("#beneficiary_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#beneficiary_name", "#beneficiaryMessage");

        $('#myBeneficiaries').modal('hide');
    });

    $(document).ready(function () {
        $('#business_trip_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#business_trip_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#business_trip_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#business_trip_date_range", "#dateRangeMessage");
        });

        $('#business_trip_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#business_trip_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#business_trip_date_range_container_icon').on('click', function () {
            $('#business_trip_date_range').trigger('click');
        });

        getRequesters();
        // getBeneficiaries();

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