<script>
    let dataWorkflow = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    const formList = {
        budget_id: {
            component: '#budget_name',
            containerMessageId: '#budgetMessage',
            messageId: '#budgetMessageText'
        },
        budget_progress_date_range: {
            component: '#budget_progress_date_range',
            containerMessageId: '#dateRangeMessage',
            messageId: '#dateRangeMessageText'
        },
        additionalData: {
            component: '',
            containerMessageId: '#budgetDetailsMessage',
            messageId: '#budgetDetailsMessageText'
        }
    };

    function getWorkflow(budgetRefID, budgetCode, budgetName) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            data: {
                businessDocumentType_RefID: 77000000000057,
                combinedBudget_RefID: budgetRefID
            },
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            success: function (response) {
                if (response.status === 200 && !response.data[0].signAccess) {
                    dataWorkflow.workFlowPathRefID = response.data[0].workFlowPath_RefIDArray[0];

                    $("#budget_id").val(budgetRefID);
                    $("#budget_name").val(`${budgetCode} - ${budgetName}`);
                    $("#budget_name").css("background-color", "#e9ecef");

                    ErrorHandler.hideErrorInputMessage(formList.budget_id.component, formList.budget_id.containerMessageId);

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
                            <input
                                type="hidden"
                                id="projectProgress_RefID${key}"
                                name="additionalData[${key}][entities][projectProgress_RefID]"
                                value=""
                            />

                            <input
                                type="hidden"
                                id="projectSectionItem_RefID${key}"
                                name="additionalData[${key}][entities][projectSectionItem_RefID]"
                                value="${value.Sys_ID}"
                            />

                            <input
                                type="hidden"
                                id="annotation${key}"
                                name="additionalData[${key}][entities][annotation]"
                                value=""
                            />

                            <td style="text-align: center;">
                                ${value.Code}
                            </td>

                            <td>
                                ${value.Name}
                            </td>

                            <td>
                                <div class="progress-group" style="margin-top: .5rem;">
                                    <span class="float-right" style="margin-left: .5rem;">
                                        <b>78.00%</b>
                                    </span>

                                    <div class="progress progress-sm">
                                        <div
                                            class="progress-bar bg-primary"
                                            style="width: 80%">
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td
                                class="d-flex align-items-center justify-content-center"
                                style="gap: .5rem; padding-right: 4px;"
                            >
                                <input
                                    type="text"
                                    class="form-control number-only"
                                    id="current_progress${key}"
                                    autocomplete="off"
                                    style="border-radius:0px; max-width: 30%;"
                                    name="additionalData[${key}][entities][progressCompletion]"
                                /> %
                            </td>
                        </tr>
                    `;

                    tbody.append(row);
                });

                ErrorHandler.hideErrorInputMessage(formList.additionalData.component, formList.additionalData.containerMessageId);
            },
            error: function (textStatus, errorThrown) {
                $("#loadingTableBudgetProgress").hide();
            }
        });
    }

    $('#budgetProgressForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("BudgetProgress.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                Utils.hideLoading();

                if (response.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + response.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('BudgetProgress.index') }}");
                    });
                } else {
                    throw new Error("Create Budget Progress Faild");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                Utils.hideLoading();

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        // console.log(key + ': ' + value[0]);

                        if (formList[key]) {
                            ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);
                        }
                    });
                }
            }
        });
    });

    $('#tableProjects').on('click', 'tbody tr', async function () {
        const id = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#loadingBudget").css({ "display": "block" });
        $("#iconBudget").css({ "display": "none" });

        getWorkflow(id, code, name);

        $("#myProjects").modal('toggle');
    });

    $(document).ready(function () {
        $('#budget_progress_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#budget_progress_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#budget_progress_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage(formList.budget_progress_date_range.component, formList.budget_progress_date_range.containerMessageId);
        });

        $('#budget_progress_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#budget_progress_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#budget_progress_date_range_container_icon').on('click', function () {
            $('#budget_progress_date_range').trigger('click');
        });
    });
</script>