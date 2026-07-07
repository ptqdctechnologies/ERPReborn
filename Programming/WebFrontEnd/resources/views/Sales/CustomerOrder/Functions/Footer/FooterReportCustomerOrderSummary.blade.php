<script>
    let dataReport = [];
    const budgetID = document.getElementById("budget_id");
    const budgetName = document.getElementById("budget_name");
    const subBudgetID = document.getElementById("sub_budget_id");
    const subBudgetName = document.getElementById("sub_budget_name");
    const coDate = document.getElementById("customer_order_date_range");

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#customer_order_date_range").css('background-color', '#fff');
        $(`#customer_order_date_range`).val("");

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
        ErrorHandler.hideErrorInputMessage("#customer_order_date_range", "#dateRangeMessage");
    }

    function getDataReport() {
        let total = 0;

        $('#table_summary').DataTable({
            destroy: false, // true
            processing: false, // true
            serverSide: false, // true
            searching: false,
            ordering: false,
            lengthMenu: [
                [10, 20, 50, 100, -1],
                [10, 20, 50, 100, "All"]
            ],
            pageLength: 10, // 20
            ajax: {
                type: 'POST',
                url: '{!! route("CustomerOrder.ReportSummaryStore") !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    d.budget_id = budgetID.value;
                    d.budget_name = budgetName.value;
                    d.sub_budget_id = subBudgetID.value;
                    d.sub_budget_name = subBudgetName.value;
                    d.customer_order_date_range = coDate.value;

                    return d;
                },
                dataSrc: function (json) {

                    // simpan seluruh response
                    dataReport = json.data;

                    json.data.forEach(function (row) {
                        total += parseFloat(row.value) || 0;
                    });

                    return json.data;
                },
                beforeSend: function () {
                    Utils.showLoading();

                    $('#table_summary tbody').empty();
                    $('#table_container').css("display", "none");
                },
                complete: function () {
                    Utils.hideLoading();

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");
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
                    data: 'trano',
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
                        return currencyTotal(data.value || '0');
                    }
                },
                {
                    data: 'notes',
                    defaultContent: '-',
                    className: "text-nowrap",
                }
            ],
            drawCallback: function (settings) {
                $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(total));
            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $("#mySitesTrigger").css('cursor', 'pointer');
        $("#mySitesTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#mySites"
        });

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

        $("#myProjects").modal('toggle');
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

        $('#mySites').modal('toggle');
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
    });
</script>