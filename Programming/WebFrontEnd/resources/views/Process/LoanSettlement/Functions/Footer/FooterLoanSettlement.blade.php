<script>
    let typeOfCOA                       = null;
    let dataLoan                        = {
        creditorRefID: null,
        debitorRefID: null,
        loanDetailRefID: 294000000000012,
        currencyRefID: null,
        currencyExchangeRate: null,
    };
    const dataInputLogFileUpload1       = document.getElementById("dataInput_Log_FileUpload_1");
    const principleSettlement           = document.getElementById("settlement_value");
    const penaltySettlement             = document.getElementById("penalty_value");
    const interestSettlement            = document.getElementById("interest_value");
    const chartOfAccountSettlementRefID = document.getElementById("coa_settlement_id");
    const chartOfAccountPenaltyRefID    = document.getElementById("coa_penalty_id");
    const chartOfAccountInterestRefID   = document.getElementById("coa_interest_id");
    const remark                        = document.getElementById("remark");

    function changeTypeOfCOA(value) {
        typeOfCOA = value;
    }

    function getLoanDetail(id, name) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('Loan.Detail') }}",
            type: "GET",
            data: {
                id
            },
            success: function (res) {
                if (Array.isArray(res) && res.length > 0) {
                    dataLoan.creditorRefID = res[0].Creditor_RefID;
                    dataLoan.debitorRefID = res[0].Debitor_RefID;
                    dataLoan.currencyRefID = res[0].Currency_RefID;
                    dataLoan.currencyExchangeRate = res[0].CurrencyExchangeRate;

                    $(`#loan_id`).val(id);
                    $(`#loan_name`).val(name);
                    $(`#loan_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
                    $(`#loan_type`).text(`: ${res[0].LoanType}`);
                    $(`#loan_credit`).text(`: ${res[0].CreditorName}`);
                    $(`#loan_debit`).text(`: ${res[0].DebitorName}`);
                    $(`#loan_currency`).text(`: ${res[0].ISOCode} - ${res[0].CurrencyName}`);
                    $(`#loan_account_bank`).text(`: ${res[0].BankAccountNumber} - ${res[0].BankAccountName}`);
                    $(`#loan_date`).text(`: ${res[0].LoanDate}`);
                    $(`#loan_coa`).text(`: ${res[0].COA_Code} - ${res[0].COA_Name}`);
                    $(`#loan_principle`).text(`: ${currencyTotal(res[0].PrincipleLoan)}`);
                    $(`#loan_lending_rate`).text(`: ${res[0].LendingRate}`);
                    $(`#loan_total`).text(`: ${currencyTotal(res[0].TotalLoan)}`);
                    $(`#loan_term`).text(`: ${res[0].LoanTerm}`);
                    $(`#loan_remark`).text(`: ${res[0].Notes}`);
                    $(`#total_loan`).val(currencyTotal(res[0].TotalLoan));
                    $(`#total_settlement`).val(0);
                    $(`#total_unsettlement`).val(0);
                    $(`#total_balance`).val(0);
                }
            },
            error: function(response) {
                console.log('response error', response);
            }
        });
    }

    function submitForm() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{{ route("LoanSettlement.store") }}',
            data: {
                creditor_RefID: dataLoan.creditorRefID,
                debitor_RefID: dataLoan.debitorRefID,
                dataInput_Log_FileUpload_1: dataInputLogFileUpload1.value,
                notes: remark.value,
                loanDetail_RefID: dataLoan.loanDetailRefID,
                principleSettlement: parseFloat(principleSettlement.value.replace(/,/g, '')),
                penaltySettlement: parseFloat(penaltySettlement.value.replace(/,/g, '')),
                interestSettlement: parseFloat(interestSettlement.value.replace(/,/g, '')),
                currency_RefID: dataLoan.currencyRefID,
                currencyExchangeRate: dataLoan.currencyExchangeRate,
                chartOfAccount_Settlement_RefID: chartOfAccountSettlementRefID.value,
                chartOfAccount_Penalty_RefID: chartOfAccountPenaltyRefID.value,
                chartOfAccount_Interest_RefID: chartOfAccountInterestRefID.value
            },
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
                        cancelForm("{{ route('LoanSettlement.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Process Error");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function validationForm() {
        submitForm();
    }

    $('#tableLoans').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_loans"]').val();
        const name  = $(this).find('td:nth-child(2)').text();

        getLoanDetail(sysId, name);
        
        $("#myLoans").modal('toggle');
    });

    $('#tableLoanSettlements').on('click', 'tbody tr', function() {
        const sysID = $(this).find('input[data-trigger="sys_id_loan_settlements"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $("#modal_loan_settlement_id").val(sysID);
        $("#modal_loan_settlement_document_number").val(trano);

        $('#myLoanSettlements').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        if (typeOfCOA === "SETTLEMENT") {
            $(`#coa_settlement_id`).val(sysId);
            $(`#coa_settlement_name`).val(`${code} - ${name}`);
            $(`#coa_settlement_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        } else if (typeOfCOA === "PENALTY") {
            $(`#coa_penalty_id`).val(sysId);
            $(`#coa_penalty_name`).val(`${code} - ${name}`);
            $(`#coa_penalty_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        } else if (typeOfCOA === "INTEREST") {
            $(`#coa_interest_id`).val(sysId);
            $(`#coa_interest_name`).val(`${code} - ${name}`);
            $(`#coa_interest_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
        }

        $("#myGetChartOfAccount").modal('toggle');
    });
</script>