<script>
    let dataWorkflow = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };

    function getWorkflow(budgetRefID, budgetCode, budgetName) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: {
                businessDocumentType_RefID: 77000000000057,
                combinedBudget_RefID: budgetRefID
            },
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            success: function (response) {
                if (response.status === 200 && response.data[0].signAccess) {
                    dataWorkflow.workFlowPathRefID = response.data[0].workFlowPath_RefIDArray[0];

                    $("#budget_id").val(budgetRefID);
                    $("#budget_name").val(`${budgetCode} - ${budgetName}`);
                    $("#budget_name").css("background-color", "#e9ecef");

                    getSites(budgetRefID);
                } else {
                    Swal.fire("Error", "You are not included in this budget", "error");
                }

                $("#loadingBudget").css({ "display": "none" });
                $("#iconBudget").css({ "display": "block" });
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    }

    function getSites(budgetId) {
        $("#loadingTableBudgetProgress").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + budgetId,
            success: function (data) {
                $("#loadingTableBudgetProgress").hide();

                let tbody = $('#tableBudgetProgress tbody');
                tbody.empty();

                $.each(data, function (key, value) {
                    let row = `
                        <tr>
                            <td style="text-align: center;">${value.Code}</td>
                            <td>${value.Name}</td>
                            <td>
                                <div class="progress-group" style="margin-top: .5rem;">
                                    <span class="float-right" style="margin-left: .5rem;"><b>78.00%</b></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="d-flex align-items-center justify-content-center" style="gap: .5rem; padding-right: 4px;">
                                <input
                                    class="form-control number-only"
                                    id="current_progress${key}"
                                    autocomplete="off"
                                    style="border-radius:0px; max-width: 30%;"
                                    value="0"
                                /> %
                            </td>
                        </tr>
                    `;

                    tbody.append(row);
                });
            },
            error: function (textStatus, errorThrown) {
                $("#loadingTableBudgetProgress").hide();
            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', async function () {
        const id = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#loadingBudget").css({ "display": "block" });
        $("#iconBudget").css({ "display": "none" });

        getWorkflow(id, code, name);

        $("#myProjects").modal('toggle');
    });
</script>