<script>
    let clickedBy           = "";
    let dataStore           = [];
    let totalNextApprover   = 0;
    let dataWorkflow        = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    const loanDetailRefID   = {!! json_encode($loanDetailRefID ?? 0) !!};
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

    function chooseSupplierBy(params) {
        clickedBy = params;
    }

    function submitForm() {
        ShowLoading();

        $.ajax({
            type: "PUT",
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
                    principle_loan: loanPrinciple.value,
                    lending_rate: lendingRate.value,
                    currency_id: currencyID.value,
                    total_loan: loanTotal.value,
                    loan_date: loanDate.value,
                    loan_type: loanType.value,
                    coa_id: coaID.value,
                    loan_detail_id: loanDetailRefID
                }
            },
            url: `{{ route('Loan.update', $loanRefID) }}`,
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

    function validationForm() {
        submitForm();
    }

    $('#tableSuppliers').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();
        let address = $(this).find('td:nth-child(4)').text();

        if (clickedBy === "creditor") {
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
        let sysId           = $(this).find('input[data-trigger="sys_id_bank_account_list"]').val();
        let acronym         = $(this).find('td:nth-child(2)').text();
        let accountNumber   = $(this).find('td:nth-child(3)').text();
        let accountName     = $(this).find('td:nth-child(4)').text();

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

    $(window).one('load', function(e) {
        getBanksAccount('', '');

        $('#loanDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>