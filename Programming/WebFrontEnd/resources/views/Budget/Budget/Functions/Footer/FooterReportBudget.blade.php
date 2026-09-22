<script>
    let dataReport = [];
    const budgetCode = document.getElementById("budget_code");
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager

    function selectBudget(combinedBudgetID, combinedBudgetCode, combinedBudgetName) {
        // $("#budget_id").val(combinedBudgetID);
        $("#budget_code").val(combinedBudgetCode);
        $("#budget_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function resetForm() {
        $('#table_container').hide();

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_code`).val("");

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
    }

    function getDataReport() {
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
            pageLength: 20,
            ajax: {
                type: 'POST',
                url: '{!! route("Budget.ReportBudgetStore") !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    d.budget_code = budgetCode.value;

                    return d;
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
                    data: 'sub_budget',
                    defaultContent: '-',
                    className: "text-nowrap",
                },
                {
                    data: 'work_id',
                    defaultContent: '-',
                    className: "text-nowrap",
                },
                {
                    data: 'start_date',
                    defaultContent: '-',
                    className: "text-nowrap",
                },
                {
                    data: 'end_date',
                    defaultContent: '-',
                    className: "text-nowrap",
                }
            ]
        });
    }

    function validateShowButton() {
        const isBudgetIDNotEmpty = budgetCode.value.trim() !== '';
        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (isBudgetIDNotEmpty) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
        }
    }

    $('#tableProjects').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        // $("#budget_id").val("");
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

        $("#myProjects").modal('toggle');
    });
</script>