<script>
    const combinedBudgetRefID = document.getElementById('budget_id');
    const dataBudgetDetails = {!! json_encode($details ?? []) !!};
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
                    const findData = dataBudgetDetails.find(val => val.sub_budget_id == value.Sys_ID);

                    let row = `
                        <tr>
                            <input
                                type="hidden"
                                id="recordID${key}"
                                name="additionalData[${key}][entities][recordID]"
                                value="${findData ? findData.record_id : ''}"
                            />
                            
                            <input
                                type="hidden"
                                id="projectProgress_RefID${key}"
                                name="additionalData[${key}][entities][projectProgress_RefID]"
                                value="${findData ? findData.projectProgress_RefID : ''}"
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
                                value="${findData ? findData.annotation : ''}"
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
                                    class="form-control number-only current-progress"
                                    id="current_progress${key}"
                                    autocomplete="off"
                                    style="border-radius:0px; max-width: 30%;"
                                    name="additionalData[${key}][entities][progressCompletion]"
                                    value="${findData ? findData.progressCompletion : ''}"
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

    $('#budgetProgressForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PUT',
            url: '{!! route("BudgetProgress.update", $sys_id) !!}',
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
                    throw new Error("Update Budget Progress Faild");
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

    $(document).on('input', '.current-progress', function () {
        const value = parseFloat(this.value);

        if (value > 100) {
            this.value = 100;
        }

        if (value <= 0) {
            this.value = 0;
        }
    });

    $(document).ready(function () {
        const startDate = moment(<?= json_encode($start_date) ?>);
        const endDate = moment(<?= json_encode($end_date) ?>);

        getSites(combinedBudgetRefID.value);

        $("#containerChooseBudget").prop("disabled", true);
        $("#containerChooseBudget").css("cursor", "not-allowed");

        $('#budget_progress_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            startDate: startDate,
            endDate: endDate,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#budget_progress_date_range').val(
            startDate.format('MM/DD/YYYY') + ' - ' + endDate.format('MM/DD/YYYY')
        );

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