<script>
    let clickedAt           = "";
    let dataStore           = [];
    let totalNextApprover   = 0;
    let dataWorkflow        = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    const documentTypeID    = document.getElementById("DocumentTypeID");
    const budgetID          = document.getElementById("project_id");
    const loanType          = document.getElementById("loan_type");
    const accountNumberID   = document.getElementById("bank_account_id");
    const creditorID        = document.getElementById("creditor_id");
    const debitorID         = document.getElementById("debitor_id");
    const currencyID        = document.getElementById("currency_id");
    const loanDate          = document.getElementById("loanDates");
    const loanPrinciple     = document.getElementById("principle_loan");
    const fileID            = document.getElementById("dataInput_Log_FileUpload");
    const lendingRate       = document.getElementById("lending_rate");
    const loanTotal         = document.getElementById("total_loan");
    const loanTerm          = document.getElementById("loan_term");
    const coaID             = document.getElementById("coa_id");
    const remark            = document.getElementById("remark");

    function countLoanTotal() {
        const principal = parseFloat(loanPrinciple.value.replace(/,/g, '')) || 0;
        const rate      = parseFloat(lendingRate.value) / 100 || 0;
        const term      = parseFloat(loanTerm.value) || 0;

        const result = principal * rate * term;

        loanTotal.value = currencyTotal(principal + result);
    }

    function changeType(element) {
        if (element.value === "LENDING") {
            $(`#creditor_name`).css("background-color", "#e9ecef");
            $(`#creditor_name`).val("QDC Technologies");
            $(`#creditor_id`).val(123000000000001);
            $(`#creditor_trigger`).css("cursor", "not-allowed");
            $(`#creditor_trigger`).prop('disabled', true);
            $(`#debitor_name`).css("background-color", "#fff");
            $(`#debitor_name`).val("");
            $(`#debitor_id`).val("");
            $(`#debitor_trigger`).css("cursor", "pointer");
            $(`#debitor_trigger`).prop('disabled', false);
        } else {
            $(`#creditor_name`).css("background-color", "#fff");
            $(`#creditor_name`).val("");
            $(`#creditor_id`).val("");
            $(`#creditor_trigger`).css("cursor", "pointer");
            $(`#creditor_trigger`).prop('disabled', false);
            $(`#debitor_name`).css("background-color", "#e9ecef");
            $(`#debitor_name`).val("QDC Technologies");
            $(`#debitor_id`).val(123000000000001);
            $(`#debitor_trigger`).css("cursor", "not-allowed");
            $(`#debitor_trigger`).prop('disabled', true);
        }
    }

    function chooseSupplierBy(params) {
        clickedAt = params;
    }

    function getWorkflow(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: {
                businessDocumentType_RefID: documentTypeID.value,
                combinedBudget_RefID: combinedBudgetRefID
            },
            url: '{!! route("GetWorkflow") !!}',
            success: function(response) {
                if (response.status === 200) {
                    totalNextApprover = response.data[0].nextApproverPath.length;
                    dataWorkflow.workFlowPathRefID = response.data[0].sys_ID;
                    dataWorkflow.approverEntityRefID = response.data[0].submitterEntity_RefID;

                    getWorkflows(response.data[0].nextApproverPath);

                    $("#var_combinedBudget_RefID").val(combinedBudgetRefID);
                    $("#project_id").val(combinedBudgetRefID);
                    $("#project_code").val(combinedBudgetCode);
                    $("#project_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#project_name").css({"background-color":"#e9ecef"});
                } else {
                    Swal.fire("Error", "Workflow Error", "error");
                }

                $("#loadingBudget").css({"display":"none"});
                $("#myProjectTrigger").css({"display":"block"});
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");

                $("#loadingBudget").css({"display":"none"});
                $("#myProjectTrigger").css({"display":"block"});
            }
        });
    }

    function submitForm() {
        ShowLoading();

        $.ajax({
            type: "POST",
            data: {
                workFlowPath_RefID: dataWorkflow.workFlowPathRefID,
                approverEntity: dataWorkflow.approverEntityRefID, 
                comment: dataWorkflow.comment,
                storeData: {
                    budget_id: budgetID.value,
                    creditor_id: creditorID.value,
                    debitor_id: debitorID.value,
                    bank_account_id: accountNumberID.value,
                    loan_term: loanTerm.value,
                    dataInput_Log_FileUpload_1: fileID.value,
                    remark: remark.value,
                    principle_loan: parseFloat(loanPrinciple.value.replace(/,/g, '')),
                    lending_rate: lendingRate.value,
                    currency_id: currencyID.value,
                    total_loan: parseFloat(loanTotal.value.replace(/,/g, '')),
                    loan_date: loanDate.value,
                    loan_type: loanType.value,
                    coa_id: coaID.value
                }
            },
            url: "{{ route('Loan.store') }}",
            success: function(res) {
                HideLoading();

                if (res.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('Loan.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Process Error");
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                // CancelNotif("You don't have access", "{{ route('Loan.index', ['var' => 1]) }}");
            }
        });
    }

    function commentWorkflow() {
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'textarea',
            showCloseButton: false,
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                dataWorkflow.comment = result.value;
                ShowLoading();
                submitForm();
            }
        });
    }

    function selectWorkflow() {
        if (totalNextApprover > 1) {
            $('#myWorkflows').modal('show');
        } else {
            commentWorkflow();
        }
    }

    function validationForm() {
        const isLoanTypeValueNotEmpty   = loanType.value.trim() !== 'Select a Type';
        const isCreditorNotEmpty        = creditorID.value.trim() !== '';
        const isDebitorNotEmpty         = debitorID.value.trim() !== '';
        const isCurrencyNotEmpty        = currencyID.value.trim() !== '';
        const isLoanDateNotEmpty        = loanDate.value.trim() !== '';
        const isLoanPrincipleNotEmpty   = loanPrinciple.value.trim() !== '';
        const isLendingRateNotEmpty     = lendingRate.value.trim() !== '';
        const isLoanTotalNotEmpty       = loanTotal.value.trim() !== '';
        const isLoanTermNotEmpty        = loanTerm.value.trim() !== '';
        const isCoaIDNotEmpty           = coaID.value.trim() !== '';
        const isRemarkNotEmpty          = remark.value.trim() !== '';

        if (
            isLoanTypeValueNotEmpty &&
            isCreditorNotEmpty &&
            isDebitorNotEmpty &&
            isCurrencyNotEmpty &&
            isLoanDateNotEmpty &&
            isLoanPrincipleNotEmpty &&
            isLendingRateNotEmpty &&
            isLoanTotalNotEmpty &&
            isLoanTermNotEmpty &&
            isCoaIDNotEmpty &&
            isRemarkNotEmpty
        ) {
            if (budgetID.value.trim() !== '') {
                selectWorkflow();
            } else {
                submitForm();
            }
        } else {
            if (
                !isLoanTypeValueNotEmpty &&
                !isCreditorNotEmpty &&
                !isDebitorNotEmpty &&
                !isCurrencyNotEmpty &&
                !isLoanDateNotEmpty &&
                !isLoanPrincipleNotEmpty &&
                !isLendingRateNotEmpty &&
                !isLoanTotalNotEmpty &&
                !isLoanTermNotEmpty &&
                !isCoaIDNotEmpty &&
                !isRemarkNotEmpty
            ) {
                $("#loan_type").css("border", "1px solid red");
                $("#creditor_name").css("border", "1px solid red");
                $("#debitor_name").css("border", "1px solid red");
                $("#currency_name").css("border", "1px solid red");
                $("#loanDates").css("border", "1px solid red");
                $("#principle_loan").css("border", "1px solid red");
                $("#lending_rate").css("border", "1px solid red");
                $("#total_loan").css("border", "1px solid red");
                $("#loan_term").css("border", "1px solid red");
                $("#coa_name").css("border", "1px solid red");
                $("#remark").css("border", "1px solid red");

                $("#loan_type_message").show();
                $("#creditor_message").show();
                $("#debitor_message").show();
                $("#currency_message").show();
                $("#loan_date_message").show();
                $("#principle_loan_message").show();
                $("#lending_rate_message").show();
                $("#total_loan_message").show();
                $("#loan_term_message").show();
                $("#coa_message").show();
                $("#remark_message").show();

                return;
            }
            if (!isLoanTypeValueNotEmpty) {
                $("#loan_type").css("border", "1px solid red");
                $("#loan_type_message").show();
                return;
            }
            if (!isCreditorNotEmpty) {
                $("#creditor_name").css("border", "1px solid red");
                $("#creditor_message").show();
                return;
            }
            if (!isDebitorNotEmpty) {
                $("#debitor_name").css("border", "1px solid red");
                $("#debitor_message").show();
                return;
            }
            if (!isCurrencyNotEmpty) {
                $("#currency_name").css("border", "1px solid red");
                $("#currency_message").show();
                return;
            }
            if (!isLoanDateNotEmpty) {
                $("#loanDates").css("border", "1px solid red");
                $("#loan_date_message").show();
                return;
            }
            if (!isLoanPrincipleNotEmpty) {
                $("#principle_loan").css("border", "1px solid red");
                $("#principle_loan_message").show();
                return;
            }
            if (!isLendingRateNotEmpty) {
                $("#lending_rate").css("border", "1px solid red");
                $("#lending_rate_message").show();
                return;
            }
            if (!isLoanTotalNotEmpty) {
                $("#total_loan").css("border", "1px solid red");
                $("#total_loan_message").show();
                return;
            }
            if (!isLoanTermNotEmpty) {
                $("#loan_term").css("border", "1px solid red");
                $("#loan_term_message").show();
                return;
            }
            if (!isCoaIDNotEmpty) {
                $("#coa_name").css("border", "1px solid red");
                $("#coa_message").show();
                return;
            }
            if (!isRemarkNotEmpty) {
                $("#remark").css("border", "1px solid red");
                $("#remark_message").show();
                return;
            }
        }
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        const sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code    = $(this).find('td:nth-child(2)').text();
        const name    = $(this).find('td:nth-child(3)').text();

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectTrigger").css({"display":"none"});

        getWorkflow(sysId, code, name);

        $('#myProjects').modal('hide');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();
        let address = $(this).find('td:nth-child(4)').text();

        if (clickedAt === "creditor") {
            $(`#creditor_id`).val(sysId);
            $(`#creditor_name`).val(`${code} - ${name}`);
            $(`#creditor_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
            $("#creditor_message").hide();
        } else {
            $(`#debitor_id`).val(sysId);
            $(`#debitor_name`).val(`${code} - ${name}`);
            $(`#debitor_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
            $("#debitor_message").hide();
        }
        
        $("#mySuppliers").modal('toggle');
    });

    $('#tableCurrencies').on('click', 'tbody tr', function() {
        let sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        $(`#currency_id`).val(sysId);
        $(`#currency_name`).val(`${code} - ${name}`);
        $(`#currency_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        $("#currency_message").hide();

        $("#myCurrencies").modal('toggle');
    });

    $('#tableGetBankList').on('click', 'tbody tr', function() {
        let sysId = $(this).find('input[data-trigger="sys_id_bank_list"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        $(`#bank_name_id`).val(sysId);
        $(`#bank_name`).val(`${code} - ${name}`);
        $(`#bank_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        $("#bank_name_message").hide();

        $(`#bank_account_id`).val("");
        $(`#bank_account_name`).val("");

        getBanksAccount(sysId);

        $("#myGetBankList").modal('toggle');
    });

    $('#tableBanksAccount').on('click', 'tbody tr', function() {
        const sysId           = $(this).find('input[data-trigger="sys_id_bank_account_list"]').val();
        const acronym         = $(this).find('td:nth-child(2)').text();
        const accountNumber   = $(this).find('td:nth-child(3)').text();
        const accountName     = $(this).find('td:nth-child(4)').text();

        $(`#bank_account_id`).val(sysId);
        $(`#bank_account_name`).val(`${accountNumber} - ${accountName}`);
        $(`#bank_account_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        $("#bank_account_message").hide();

        $("#myBanksAccount").modal('toggle');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        $(`#coa_id`).val(sysId);
        $(`#coa_name`).val(`${code} - ${name}`);
        $(`#coa_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        $("#coa_message").hide();

        $("#myGetChartOfAccount").modal('toggle');
    });

    $('#tableLoans').on('click', 'tbody tr', function() {
        let sysId = $(this).find('input[data-trigger="sys_id_loans"]').val();
        let name  = $(this).find('td:nth-child(2)').text();

        $(`#modal_loan_id`).val(sysId);
        $(`#modal_loan_document_number`).val(name);
        $(`#modal_loan_document_number`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        
        $("#myLoans").modal('toggle');
    });

    $('#principle_loan').on('input', function(e) {
        if (e.target.value) {
            $("#principle_loan_message").hide();
            $("#principle_loan").css("border", "1px solid #ced4da");
        } else {
            $("#principle_loan_message").show();
            $("#principle_loan").css("border", "1px solid red");
        }
    });

    $('#lending_rate').on('input', function(e) {
        if (e.target.value) {
            $("#lending_rate_message").hide();
            $("#lending_rate").css("border", "1px solid #ced4da");
        } else {
            $("#lending_rate_message").show();
            $("#lending_rate").css("border", "1px solid red");
        }
    });

    $('#total_loan').on('input', function(e) {
        if (e.target.value) {
            $("#total_loan_message").hide();
            $("#total_loan").css("border", "1px solid #ced4da");
        } else {
            $("#total_loan_message").show();
            $("#total_loan").css("border", "1px solid red");
        }
    });

    $('#loan_term').on('input', function(e) {
        if (e.target.value) {
            $("#loan_term_message").hide();
            $("#loan_term").css("border", "1px solid #ced4da");
        } else {
            $("#loan_term_message").show();
            $("#loan_term").css("border", "1px solid red");
        }
    });

    $('#loan_type').on('change', function(e) {
        if (e.target.value) {
            $("#loan_type_message").hide();
            $("#loan_type").css("border", "1px solid #ced4da");
        }
    });

    $('#remark').on('input', function(e) {
        if (e.target.value) {
            $("#remark_message").hide();
            $("#remark").css("border", "1px solid #ced4da");
        } else {
            $("#remark_message").show();
            $("#remark").css("border", "1px solid red");
        }
    });

    $(window).one('load', function(e) {
        getBanksAccount('', '');

        $('#loanDate').datetimepicker({
            format: 'L'
        });
        
        $('#loanDate').on('change.datetimepicker', function (e) {
            if (loanDate.value) {
                $("#loanDates").css({
                    "background-color": "#e9ecef",
                    "border": "1px solid #ced4da"
                });
                $("#loan_date_message").hide();
            }
        });
    });
</script>