<script>
    var dataStore               = [];
    var documentTypeID          = document.getElementById("DocumentTypeID");
    var siteCode                = document.getElementById("site_code_second");
    var requester               = document.getElementById("worker_name_second");
    var beneficiary             = document.getElementById("beneficiary_second_person_name");
    var remark                  = document.getElementById("remark");
    var budgetDetailsAdd        = document.getElementById("budget-details-add");
    var bankNameInput           = document.getElementById("bank_name_second_name");

    $(".loadingBudgetDetails").hide();
    $(".errorMessageContainerBudgetDetails").hide();
    $("#mySiteCodeSecondTrigger").prop("disabled", true);
    $("#myWorkerSecondTrigger").prop("disabled", true);
    $("#myBeneficiarySecondTrigger").prop("disabled", true);
    $("#myGetBankSecondTrigger").prop("disabled", true);
    $("#myBankAccountTrigger").prop("disabled", true);
    $("#budget-details-add").prop("disabled", true);

    function checkOneLineBudgetContents() {
        const rows          = document.querySelectorAll("#tableGetBudgetDetails tbody tr");
        let adaYangTerisi   = false;

        rows.forEach((row, index) => {
            const qty   = document.getElementById(`qty_req${index}`)?.value.trim();
            const price = document.getElementById(`price_req${index}`)?.value.trim();
            const total = document.getElementById(`total_req${index}`)?.value.trim();

            if (qty !== "" && price !== "" && total !== "") {
                adaYangTerisi = true;
            }
        });

        return adaYangTerisi;
    }

    function checkFormCompleted() {
        const isSiteCodeNotEmpty    = siteCode.value.trim() !== '';
        const isRequesterNotEmpty   = requester.value.trim() !== '';
        const isBeneficiaryNotEmpty = beneficiary.value.trim() !== '';
        const remarkNotEmpty        = remark.value.trim() !== '';
        const tableGetBudgetDetails = checkOneLineBudgetContents();

        if (isSiteCodeNotEmpty && isRequesterNotEmpty && isBeneficiaryNotEmpty && remarkNotEmpty && tableGetBudgetDetails) {
            budgetDetailsAdd.disabled = false;
        } else {
            budgetDetailsAdd.disabled = true;
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

        document.getElementById('TotalBudgetSelected').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableAdvanceList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[9];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        // document.getElementById('TotalBudgetSelected').innerText = "0.00";
        total = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[3].value}): ${total}`;
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
                    let isUnspecified = '';
                    let balanced = currencyTotal(val2.quantityRemaining);
                    let totalBudget = val2.quantity * val2.priceBaseCurrencyValue;
                    let productColumn = `
                        <td style="text-align: center;">${val2.productCode}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;

                    if (val2.productName === "Unspecified Product") {
                        productColumn = `
                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name">${val2.productName}</td>
                        `;
                        isUnspecified = 'disabled';
                        balanced = '-';
                    }

                    let row = `
                        <tr>
                            <input id="productId${key}" value="${val2.product_RefID}" type="hidden" />
                            <input id="productCode${key}" value="${val2.productCode}" type="hidden" />
                            <input id="qtyId${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                            <input id="currencyId${key}" value="${val2.sys_BaseCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                            
                            ${productColumn}
                            <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantityRemaining)}</td>
                            <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                            <td style="text-align: center;">${val2.priceBaseCurrencyISOCode}</td>
                            <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                            </td>
                            <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                            </td>
                            <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;" readonly />
                            </td>
                            <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;" data-default="${balanced}" value="${balanced}" readonly />
                            </td>
                        </tr>
                    `;

                    tbody.append(row);

                    $(`#product_id${key}`).data('default', $(`#product_id${key}`).val());
                    $(`#product_name${key}`).data('default', $(`#product_name${key}`).text());
                    $(`#qty_req${key}`).data('default', $(`#qty_req${key}`).val());
                    $(`#price_req${key}`).data('default', $(`#price_req${key}`).val());
                    $(`#total_req${key}`).data('default', $(`#total_req${key}`).val());
                    $(`#balanced_qty${key}`).data('default', $(`#balanced_qty${key}`).val());

                    if (val2.productName === "Unspecified Product") {
                        $(`#product_id${key}`).on('input', function() {
                            if ($(this).val().trim() !== '') {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', false);
                            } else {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', true);
                            }
                        });

                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(qty_req || 0) + parseFloat(balanced);

                            if (!qty_req) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }

                            checkFormCompleted();
                        });
                    } else {
                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 0) * parseFloat(price_req || 0);
                            var total = parseFloat(balanced) - parseFloat(qty_req || 0);

                            if (parseFloat(qty_req) > val2.quantityRemaining) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Qty Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                                $(`#balanced_qty${key}`).val(currencyTotal(total));
                            }

                            checkFormCompleted();
                        });
                    }

                    $(`#price_req${key}`).on('keyup', function() {
                        var price_req = $(this).val().replace(/,/g, '');
                        var qty_req = $(`#qty_req${key}`).val().replace(/,/g, '');
                        var total_req = parseFloat(qty_req || 0) * parseFloat(price_req || 0);
                        var total = parseFloat(price_req || 0) + parseFloat(val2.priceBaseCurrencyValue);

                        if (parseFloat(price_req) > val2.priceBaseCurrencyValue) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Price Req is over budget !");
                        } else if (parseFloat(qty_req * price_req) > totalBudget) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Total Req is over budget !");
                        } else {
                            calculateTotal();
                            $(`#total_req${key}`).val(currencyTotal(total_req));
                        }

                        checkFormCompleted();
                    });
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
                AdvanceRequestStore({...formatData, comment: result.value});
            }
        });
    }

    function AdvanceRequestStore(formatData) {
        var fileAttachments = $("#dataInput_Log_FileUpload").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{!! route("AdvanceRequest.store") !!}',
            success: function(res) {
                HideLoading();

                if (res.status == 200) {
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
                        window.location.href = '/AdvanceRequest?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                HideLoading();
                ErrorNotif("Data Cancel Inputed");
            }
        });
    }

    function CancelAdvance() {
        ShowLoading();
        window.location.href = '/AdvanceRequest?var=1';
    }

    function SubmitForm() {
        $('#advanceRequestFormModal').modal('hide');

        var action = $('#FormSubmitAdvance').attr("action");
        var method = $('#FormSubmitAdvance').attr("method");
        var form_data = new FormData($('#FormSubmitAdvance')[0]);
        form_data.append('advanceRequestDetail', JSON.stringify(dataStore));

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
                    $("#budget-details-add").prop("disabled", false);

                    CancelNotif("You don't have access", '/AdvanceRequest?var=1');
                } else if (response.message == "MoreThanOne") {
                    $('#getWorkFlow').modal('toggle');

                    var t = $('#tableGetWorkFlow').DataTable();
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
                HideLoading();
                $("#budget-details-add").prop("disabled", false);
                CancelNotif("You don't have access", '/AdvanceRequest?var=1');
            }
        });
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();
        var projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("");

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectSecondTrigger").css({"display":"none"});

        try {
            var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID.value);

            if (checkWorkFlow) {
                $("#var_combinedBudget_RefID").val(sysId);
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);
                $("#myProjectSecondTrigger").prop("disabled", true);

                getSiteSecond(sysId);
                $("#mySiteCodeSecondTrigger").prop("disabled", false);
            }

            $("#loadingBudget").css({"display":"none"});
            $("#myProjectSecondTrigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

        $("#myWorkerSecondTrigger").prop("disabled", false);
        $("#myBeneficiarySecondTrigger").prop("disabled", false);
        // $("#budget-details-add").prop("disabled", false);

        getBudgetDetails(sysId);
        $(".loadingBudgetDetails").show();
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

    $("#budget-details-add").on('click', function() {
        const sourceTable = document.getElementById('tableGetBudgetDetails').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableAdvanceList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const productCode                       = row.querySelector('input[id^="productCode"]');
            const productRefId                      = row.querySelector('input[id^="productId"]');
            const qtyUnitRefId                      = row.querySelector('input[id^="qtyId"]');
            const currencyRefId                     = row.querySelector('input[id^="currencyId"]');
            const combinedBudgetSectionDetailInput  = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const qtyInput                          = row.querySelector('input[id^="qty_req"]');
            const priceInput                        = row.querySelector('input[id^="price_req"]');
            const totalInput                        = row.querySelector('input[id^="total_req"]');
            const balanceInput                      = row.querySelector('input[id^="balanced_qty"]');

            if (
                qtyInput && priceInput && totalInput && 
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== ''
            ) {
                const productName   = row.children[6].innerText.trim();
                const qtyAvail      = row.children[8].innerText.trim();
                const uom           = row.children[9].innerText.trim();
                const priceAvail    = row.children[10].innerText.trim();
                const currency      = row.children[12].innerText.trim();

                const price = priceInput.value.trim();
                const qty   = qtyInput.value.trim();
                const total = totalInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[4].innerText.trim();
                    const targetName = targetRow.children[5].innerText.trim();
                    if (targetCode == productCode.value && targetName == productName) {
                        targetRow.children[7].innerText = price;
                        targetRow.children[8].innerText = qty;
                        targetRow.children[9].innerText = total;
                        found = true;

                        // update dataStore
                        const indexToUpdate = dataStore.findIndex(item => item.entities.product_RefID == productRefId.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailInput.value),
                                    product_RefID: parseInt(productRefId.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                                    productUnitPriceCurrency_RefID: parseInt(currencyRefId.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: 1,
                                    remarks: null
                                }
                            };
                        }
                        break;
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                        <input type="hidden" name="price_avail[]" value="${priceAvail}">
                        <input type="hidden" name="product_RefID[]" value="${productRefId.value}">
                        <input type="hidden" name="currency[]" value="${currency}">
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productCode.value}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                    `;
                    targetTable.appendChild(newRow);

                    // push to dataStore
                    dataStore.push({
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailInput.value),
                            product_RefID: parseInt(productRefId.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                            productUnitPriceCurrency_RefID: parseInt(currencyRefId.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: 1,
                            remarks: null
                        }
                    });
                }

                // qtyInput.value = '';
                // priceInput.value = '';
                // totalInput.value = '';
                // balanceInput.value = balanceInput.getAttribute('data-default');
            } else {
                const productName   = row.children[6].innerText.trim();
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[4]?.innerText?.trim();
                    const targetName = targetRow.children[5]?.innerText?.trim();

                    if (targetCode == productCode?.value && targetName == productName) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => item.entities.product_RefID != productRefId?.value);
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        updateGrandTotal();
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        checkFormCompleted();
    });

    $('#tableGetWorkerSecond').on('click', 'tbody tr', function() {
        checkFormCompleted();
    });

    $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
        checkFormCompleted();
    });

    $('#remark').on('input', function() {
        checkFormCompleted();
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType("Advance Form");
    });

    const observer = new MutationObserver(() => {
        const bankNameID                = document.getElementById("bank_name_second_id");
        const beneficiaryPersonRefID    = document.getElementById("beneficiary_second_person_ref_id");
        
        if (bankNameInput.value.trim() !== "") {
            $("#myBankAccountTrigger").prop("disabled", false);

            getBankAccountData(bankNameID.value, beneficiaryPersonRefID.value);
        }
    });
</script>