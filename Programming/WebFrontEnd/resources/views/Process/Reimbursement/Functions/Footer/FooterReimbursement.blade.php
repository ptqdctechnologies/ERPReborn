<script>
    let dataStore       = [];
    const budgetCode    = document.getElementById("project_id_second");
    const siteCode      = document.getElementById("site_id_second");
    const customerID    = document.getElementById("customer_id");
    // const dateCustomer  = document.getElementById("customer_id");
    const beneficiaryID = document.getElementById("beneficiary_second_id");
    const bankID        = document.getElementById("bank_name_second_id");
    const bankAccountID = document.getElementById("bank_accounts_id");

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#tableGetBudgetDetails tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty   = document.getElementById(`qty_req${index}`)?.value.trim();
            const price = document.getElementById(`price_req${index}`)?.value.trim();
            const total = document.getElementById(`total_req${index}`)?.value.trim();

            if (qty !== "" && price !== "" && total !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const qtyEl   = document.getElementById(`qty_req${index}`);
            const priceEl = document.getElementById(`price_req${index}`);
            const totalEl = document.getElementById(`total_req${index}`);

            if (hasFullRow) {
                $(qtyEl).css("border", "1px solid #ced4da");
                $(priceEl).css("border", "1px solid #ced4da");
                $(totalEl).css("border", "1px solid #ced4da");
                $("#budgetDetailsMessage").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || priceEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(priceEl).css("border", "1px solid red");
                            $(totalEl).css("border", "1px solid red");
                            $("#budgetDetailsMessage").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(priceEl).css("border", "1px solid #ced4da");
                            $(totalEl).css("border", "1px solid #ced4da");
                            $("#budgetDetailsMessage").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && priceEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(priceEl).css("border", "1px solid #ced4da");
                        $(totalEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(qtyEl).css("border", "1px solid red");
                    $(priceEl).css("border", "1px solid red");
                    $(totalEl).css("border", "1px solid red");
                    $("#budgetDetailsMessage").show();
                }
            }
        });

        return hasFullRow;
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableRemList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[4];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[5].value}): ${decimalFormat(total)}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tableGetBudgetDetails').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableRemList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const combinedBudgetSectionDetailRefID  = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const productRefID                      = row.querySelector('input[id^="product_RefID"]');
            const quantityUnitRefID                 = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID     = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const qtyInput                          = row.querySelector('input[id^="qty_req"]');
            const priceInput                        = row.querySelector('input[id^="price_req"]');
            const totalInput                        = row.querySelector('input[id^="total_req"]');

            if (
                qtyInput && priceInput &&  
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== ''
            ) {
                const productCode = row.children[4].innerText.trim();
                const productName = row.children[5].innerText.trim();
                const currency    = row.children[6].innerText.trim();

                const price = priceInput.value.trim();
                const qty   = qtyInput.value.trim();
                const total = totalInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[0]?.innerText?.trim();
                    const targetName = targetRow.children[1]?.innerText?.trim();

                    if (targetCode == productCode && targetName == productName) {
                        targetRow.children[2].innerText = price;
                        targetRow.children[3].innerText = qty;
                        targetRow.children[4].innerText = total;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: 1
                                }
                            }
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                        <input type="hidden" name="currency[]" value="${currency}">
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                            product_RefID: parseInt(productRefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: 1
                        }
                    });
                }
            } else {
                const productCode = row.children[4].innerText.trim();
                const productName = row.children[5].innerText.trim();
                const existingRows = targetTable.getElementsByTagName('tr');
                
                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[0]?.innerText?.trim();
                    const targetName = targetRow.children[1]?.innerText?.trim();

                    if (targetCode == productCode && targetName == productName) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => item.entities.combinedBudgetSectionDetail_RefID != combinedBudgetSectionDetailRefID.value);
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        updateGrandTotal();
    }

    function validationForm() {
        const isBudgetCodeNotEmpty      = budgetCode.value.trim() !== '';
        const isSiteCodeNotEmpty        = siteCode.value.trim() !== '';
        const isCustomerIDNotEmpty    = customerID.value.trim() !== '';
        const isBeneficiaryIDNotEmpty   = beneficiaryID.value.trim() !== '';
        const isBankIDNotEmpty          = bankID.value.trim() !== '';
        const isBankAccountIDNotEmpty   = bankAccountID.value.trim() !== '';
        const isTableNotEmpty           = checkOneLineBudgetContents();

        if (isBudgetCodeNotEmpty && isSiteCodeNotEmpty && isCustomerIDNotEmpty && isBeneficiaryIDNotEmpty && isBankIDNotEmpty && isBankAccountIDNotEmpty && isTableNotEmpty) {
            $('#reimbursementFormModal').modal('show');
            summaryData();
        } else {
            if (!isBudgetCodeNotEmpty && !isSiteCodeNotEmpty && !isCustomerIDNotEmpty && !isBeneficiaryIDNotEmpty && !isBankIDNotEmpty && !isBankAccountIDNotEmpty && !isTableNotEmpty) {
                $("#project_code_second").css("border", "1px solid red");
                $("#project_name_second").css("border", "1px solid red");
                $("#site_code_second").css("border", "1px solid red");
                $("#site_name_second").css("border", "1px solid red");
                $("#customer_code").css("border", "1px solid red");
                $("#customer_name").css("border", "1px solid red");
                $("#beneficiary_second_person_position").css("border", "1px solid red");
                $("#beneficiary_second_person_name").css("border", "1px solid red");
                $("#bank_name_second_name").css("border", "1px solid red");
                $("#bank_name_second_detail").css("border", "1px solid red");
                $("#bank_accounts").css("border", "1px solid red");
                $("#bank_accounts_detail").css("border", "1px solid red");

                $("#budgetMessage").show();
                $("#subBudgetMessage").show();
                $("#customerMessage").show();
                $("#beneficiaryMessage").show();
                $("#bankNameMessage").show();
                $("#bankAccountMessage").show();
                return;
            }
            if (!isBudgetCodeNotEmpty) {
                $("#project_code_second").css("border", "1px solid red");
                $("#project_name_second").css("border", "1px solid red");
                $("#budgetMessage").show();
                // Swal.fire("Please Complete the Form", "Budget cannot be empty.", "error");
                return;
            }
            if (!isSiteCodeNotEmpty) {
                $("#site_code_second").css("border", "1px solid red");
                $("#site_name_second").css("border", "1px solid red");
                $("#subBudgetMessage").show();
                // Swal.fire("Please Complete the Form", "Sub Budget cannot be empty.", "error");
                return;
            } 
            if (!isCustomerIDNotEmpty) {
                $("#customer_code").css("border", "1px solid red");
                $("#customer_name").css("border", "1px solid red");
                $("#customerMessage").show();
                // Swal.fire("Please Complete the Form", "Delivery To cannot be empty.", "error");
                return;
            } 
            if (!isBeneficiaryIDNotEmpty) {
                $("#beneficiary_second_person_position").css("border", "1px solid red");
                $("#beneficiary_second_person_name").css("border", "1px solid red");
                $("#beneficiaryMessage").show();
                // Swal.fire("Please Complete the Form", "Date of Delivery cannot be empty.", "error");
                return;
            }
            if (!isBankIDNotEmpty) {
                $("#bank_name_second_name").css("border", "1px solid red");
                $("#bank_name_second_detail").css("border", "1px solid red");
                $("#bankNameMessage").show();
                // Swal.fire("Please Complete the Form", "Date of Delivery cannot be empty.", "error");
                return;
            }
            if (!isBankAccountIDNotEmpty) {
                $("#bank_accounts").css("border", "1px solid red");
                $("#bank_accounts_detail").css("border", "1px solid red");
                $("#bankAccountMessage").show();
                // Swal.fire("Please Complete the Form", "Date of Delivery cannot be empty.", "error");
                return;
            }
            if (!isTableNotEmpty) {
                $("#budgetDetailsMessage").show();
                // Swal.fire("Please Complete the Form", "Budget Details must be filled in at least 1 item.", "error");
                return;
            }
        }
    }

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        // total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalBudgetSelected').textContent = decimalFormat(total);
    }

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
                                <input id="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                                <input id="product_RefID${key}" value="${val2.product_RefID}" type="hidden" />
                                <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                                <input id="productUnitPriceCurrency_RefID${key}" value="${val2.priceCurrency_RefID}" type="hidden" />

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
                            checkOneLineBudgetContents(key);
                            calculateTotal();
                        });

                        $(`#price_req${key}`).on('keyup', function() {
                            let price_req   = $(this).val().replace(/,/g, '');
                            let qty_req     = $(`#qty_req${key}`).val().replace(/,/g, '');
                            let total_req   = parseFloat(qty_req || 1) * parseFloat(price_req || 0);

                            $(`#total_req${key}`).val(currencyTotal(total_req));
                            checkOneLineBudgetContents(key);
                            calculateTotal();
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

    function SelectWorkFlow(formatData) {
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
                ShowLoading();
                ReimbursementStore({...formatData, comment: result.value});
            }
        });
    }

    function ReimbursementStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("Reimbursement.store") }}',
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
                        ShowLoading();
                        window.location.href = '/Reimbursement?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function cancelReimbursement() {
        ShowLoading();
        window.location.href = "{{ route('Reimbursement.index', ['var' => 1]) }}";
    }

    function submitForm() {
        $('#reimbursementFormModal').modal('hide');

        let action = $('#FormSubmitReimbursement').attr("action");
        let method = $('#FormSubmitReimbursement').attr("method");
        let form_data = new FormData($('#FormSubmitReimbursement')[0]);
        form_data.append('reimbursementDetail', JSON.stringify(dataStore));

        ShowLoading();

        $.ajax({
            url: action,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: method,
            success: function(response) {
                HideLoading();

                if (response.message == "WorkflowError") {
                    $("#submitRem").prop("disabled", false);
                    CancelNotif("You don't have access", '/Reimbursement?var=1');
                } else if (response.message == "MoreThanOne") {
                    $('#getWorkFlow').modal('toggle');

                    let t = $('#tableGetWorkFlow').DataTable();
                    t.clear();
                    $.each(response.data, function(key, val) {
                        t.row.add([
                            '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                            '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                        ]).draw();
                    });
                } else {
                    const formatData = {
                        workFlowPath_RefID: response.workFlowPath_RefID, 
                        nextApprover: response.nextApprover_RefID, 
                        approverEntity: response.approverEntity_RefID, 
                        documentTypeID: response.documentTypeID,
                        storeData: response.storeData
                    };

                    SelectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                $("#submitRem").prop("disabled", false);
                CancelNotif("You don't have access", '/Reimbursement?var=1');
            }
        });
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

        $("#beneficiary_second_person_position").css("border", "1px solid #ced4da");
        $("#beneficiary_second_person_name").css("border", "1px solid #ced4da");
        $("#beneficiaryMessage").hide();

        $("#bank_name_second_name").css("border", "1px solid #ced4da");
        $("#bank_name_second_detail").css("border", "1px solid #ced4da");
        $("#bankNameMessage").hide();

        $("#bank_accounts").css("border", "1px solid #ced4da");
        $("#bank_accounts_detail").css("border", "1px solid #ced4da");
        $("#bankAccountMessage").hide();

        getBankSecond(personRefId);
    });

    $('#tableGetBankSecond').on('click', 'tbody tr', function() {
        var sysId                   = $(this).find('input[data-trigger="sys_id_bank_second"]').val();
        var beneficiaryPersonRefID  = document.getElementById("beneficiary_second_person_ref_id");

        $("#myBankAccountTrigger").prop("disabled", false);

        $("#bank_accounts").val("");
        $("#bank_accounts_id").val("");
        $("#bank_accounts_detail").val("");

        $("#bank_name_second_name").css("border", "1px solid #ced4da");
        $("#bank_name_second_detail").css("border", "1px solid #ced4da");
        $("#bankNameMessage").hide();

        getBankAccountData(sysId, beneficiaryPersonRefID.value);
    });
    
    $('#tableGetBankAccount').on('click', 'tbody tr', function() {
        $("#bank_accounts").css("border", "1px solid #ced4da");
        $("#bank_accounts_detail").css("border", "1px solid #ced4da");
        $("#bankAccountMessage").hide();
    });

    $('#tableGetModalReimbursement').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_modal_reimbursement"]').val();
        var trano           = $(this).find('td:nth-child(2)').text();

        $("#modal_reimbursement_id").val(sysId);
        $("#modal_reimbursement_document_number").val(trano);
        $('#myGetModalReimbursement').modal('hide');
    });

    $('#tableGetCustomer').on('click', 'tbody tr', function() {
        var sysId   = $(this).find('input[data-trigger="sys_id_modal_customer"]').val();
        var code    = $(this).find('td:nth-child(2)').text();
        var name    = $(this).find('td:nth-child(3)').text();

        $("#customer_id").val(sysId);
        $("#customer_code").val(code);
        $('#customer_name').val(name);
        $('#myCustomer').modal('hide');
    });

    $(window).one('load', function(e) {
        getDocumentType("Reimbursement Form");
        $(".loadingBudgetDetails").hide();
    });
</script>