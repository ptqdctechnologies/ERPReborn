<script>

    function getBudgetDetails(site_code) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + site_code,
            success: function(data) {
                $(".loadingBudgetDetails").hide();
                $('#tableGetBudgetDetails tbody').empty();
                $(".errorMessageContainerBudgetDetails").hide();

                let tbody = $('#tableGetBudgetDetails tbody');
                tbody.empty();

                let unspecifiedProducts = data.filter(item => item.productName === "Unspecified Product");

                if (unspecifiedProducts.length > 1) {
                    let maxBudgetProduct = unspecifiedProducts.reduce((max, item) => {
                        let totalBudget = item.quantity * item.priceBaseCurrencyValue;
                        return totalBudget > (max.quantity * max.priceBaseCurrencyValue) ? item : max;
                    });

                    data = data.filter(item => 
                        item.productName !== "Unspecified Product" || 
                        (item.productName === "Unspecified Product" && item === maxBudgetProduct)
                    );
                }

                $.each(data, function(key, val2) {
                    if (val2.productName !== "Unspecified Product") {
                        let isUnspecified = '';
                        let balanced = currencyTotal(val2.quantityRemaining);
                        let totalBudget = val2.quantity * val2.priceBaseCurrencyValue;
                        
                        let row = `
                            <tr>
                                <td style="text-align: center;">${val2.productCode}</td>
                                <td style="text-align: center;">${val2.productName}</td>
                                <td style="text-align: center;">${val2.priceBaseCurrencyISOCode}</td>
                                <td style="text-align: center;">
                                    <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center;">
                                    <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center;">
                                    <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;" readonly />
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_req${key}`).on('keyup', function() {
                            let qty_req     = $(this).val().replace(/,/g, '');
                            let price_req   = $(`#price_req${key}`).val().replace(/,/g, '');
                            let total_req   = parseFloat(qty_req || 0) * parseFloat(price_req || 1);

                            $(`#total_req${key}`).val(decimalFormat(total_req));
                        });

                        $(`#price_req${key}`).on('keyup', function() {
                            let price_req   = $(this).val().replace(/,/g, '');
                            let qty_req     = $(`#qty_req${key}`).val().replace(/,/g, '');
                            let total_req   = parseFloat(qty_req || 1) * parseFloat(price_req || 0);

                            $(`#total_req${key}`).val(currencyTotal(total_req));
                        });
                    }
                });
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetBudgetDetails tbody').empty();
                $(".loadingBudgetDetails").hide();
                $(".errorMessageContainerBudgetDetails").show();
                $("#errorMessageBudgetDetails").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function cancelReimbursement() {
        ShowLoading();
        window.location.href = "{{ route('Reimbursement.index', ['var' => 1]) }}";
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        let projectCode     = $(this).find('td:nth-child(2)').text();
        let projectName     = $(this).find('td:nth-child(3)').text();
        let documentTypeID  = $("#DocumentTypeID").val();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("");

        // $("#loadingBudget").css({"display":"block"});
        // $("#myProjectSecondTrigger").css({"display":"none"});

        // try {
        //     let checkWorkFlow = await checkingWorkflow(sysId, documentTypeID);

        //     if (!checkWorkFlow) {
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);
                $("#myProjectSecondTrigger").prop("disabled", true);
                $("#myProjectSecondTrigger").css("cursor", "not-allowed");
                $("#project_code_second").css("border", "1px solid #ced4da");
                $("#project_name_second").css("border", "1px solid #ced4da");
                $("#budgetMessage").hide();

                $("#var_combinedBudget_RefID").val(sysId);

                getSiteSecond(sysId);
                $("#mySiteCodeSecondTrigger").prop("disabled", false);
        //     }

        //     $("#loadingBudget").css({"display":"none"});
        //     $("#myProjectSecondTrigger").css({"display":"block"});
        // } catch (error) {
        //     console.error('Error checking workflow:', error);

        //     Swal.fire("Error", "Error Checking Workflow", "error");
        // }
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        let sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

        getBudgetDetails(sysId);
        $("#site_code_second").css("border", "1px solid #ced4da");
        $("#site_name_second").css("border", "1px solid #ced4da");
        $("#subBudgetMessage").hide();
        $(".loadingBudgetDetails").show();
        $("#deliverModalTrigger").prop("disabled", false);
    });

    $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
        var personRefId = $(this).find('input[data-trigger="person_ref_id_beneficiary_second"]').val();

        $("#myGetBankSecondTrigger").prop("disabled", false);

        $("#bank_name_second_name").val("");
        $("#bank_name_second_id").val("");
        $("#bank_name_second_detail").val("");

        $("#bank_accounts").val("");
        $("#bank_accounts_id").val("");
        $("#bank_accounts_detail").val("");

        getBankSecond(personRefId);
    });

    $('#tableGetBankSecond').on('click', 'tbody tr', function() {
        var sysId                   = $(this).find('input[data-trigger="sys_id_bank_second"]').val();
        var beneficiaryPersonRefID  = document.getElementById("beneficiary_second_person_ref_id");

        $("#myBankAccountTrigger").prop("disabled", false);

        $("#bank_accounts").val("");
        $("#bank_accounts_id").val("");
        $("#bank_accounts_detail").val("");

        getBankAccountData(sysId, beneficiaryPersonRefID.value);
    });

    $(window).one('load', function(e) {
        getDocumentType("Reimbursement Form");
        $(".loadingBudgetDetails").hide();
    });
</script>