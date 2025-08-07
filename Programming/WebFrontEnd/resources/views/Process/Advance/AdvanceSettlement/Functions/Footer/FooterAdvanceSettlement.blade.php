<script>
    let dataStore           = [];
    let advanceID           = [];
    let arrAdvanceNumber    = [];
    let isValidatePass      = false;
    let budgetCodeTrigger   = "";
    let beneficiaryTrigger  = "";
    let indexAdvanceDetail  = 0;
    let totalAdvanceDetail  = 0;

    $(".loadingAdvanceSettlementTable").hide();
    $(".errorAdvanceSettlementTable").hide();

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_settlement"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalAdvanceDetail').textContent = currencyTotal(total);
    }

    function updateAdvanceUI(result, advanceRefID, advanceNumber) {
        $("#advance_id").val(advanceRefID);
        $("#advance_number").val(advanceNumber);
        $("#var_combinedBudget_RefID").val(result[0].combinedBudget_RefID);
        $("#beneficiary_name").val(result[0].beneficiaryBankAccountName);
        $("#bank_name").val(result[0].beneficiaryBankName);
        $("#bank_account").val(result[0].beneficiaryBankAccountNumber);
        $("#budget_value").val(result[0].combinedBudgetCode + ' - ' + result[0].combinedBudgetName);
        $("#sub_budget_value").val(result[0].combinedBudgetSectionCode + ' - ' + result[0].combinedBudgetSectionName);
    }

    function showError(message) {
        Swal.fire("Error", message, "error");
    }

    function getAdvanceDetail(advanceRefID, advanceNumber) {
        $("#tableAdvanceDetail tbody").hide();
        $(".loadingAdvanceSettlementTable").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route(name: "getAdvanceDetail") !!}?advanceRefID=' + advanceRefID,
            success: async function(response) {
                if (response.metadata.HTTPStatusCode === 200) {
                    const result            = response.data.data;
                    const documentTypeID    = document.getElementById("DocumentTypeID");

                    if (documentTypeID.value) {
                        var checkWorkFlow = await checkingWorkflow(result[0].combinedBudget_RefID, documentTypeID.value);

                        if (!checkWorkFlow) {
                            $(".loadingAdvanceSettlementTable").hide();
                            return;
                        }
                    }

                    $(".loadingAdvanceSettlementTable").hide();
                    $("#tableAdvanceDetail tbody").show();

                    const isDuplicate       = arrAdvanceNumber.includes(result[0].businessDocumentNumber);
                    const sameBeneficiary   = beneficiaryTrigger == result[0].beneficiaryBankAccountName;
                    const sameBudget        = budgetCodeTrigger == result[0].combinedBudget_RefID;

                    if (arrAdvanceNumber.length == 0) {
                        advanceID.push(result[0].advance_RefID);
                        arrAdvanceNumber.push(result[0].businessDocumentNumber);
                        beneficiaryTrigger = result[0].beneficiaryBankAccountName;
                        budgetCodeTrigger = result[0].combinedBudget_RefID;
                        updateAdvanceUI(result, advanceRefID, advanceNumber);
                    } else {
                        if (!isDuplicate && !sameBeneficiary && !sameBudget) {
                            showError("Beneficiary, & Budget cannot be different !");
                            return;
                        } 
                    }

                    if (!isDuplicate && sameBeneficiary && sameBudget) {
                        advanceID.push(result[0].advance_RefID);
                        arrAdvanceNumber.push(result[0].businessDocumentNumber);
                        updateAdvanceUI(result, advanceRefID, advanceNumber);
                    } else if (!isDuplicate && !sameBeneficiary && sameBudget) {
                        showError("Beneficiary cannot be different !");
                        return;
                    } else if (!isDuplicate && sameBeneficiary && !sameBudget) {
                        showError("Budget cannot be different !");
                        return;
                    } else if (isDuplicate && sameBeneficiary && sameBudget) {
                        showError("Advance number has been selected !");
                        return;
                    } 

                    let tbody = $('#tableAdvanceDetail tbody');

                    let modifyColumn = `<td rowspan="${result.length}" style="text-align: center; padding: 10px !important;">${advanceNumber}</td>`;

                    $.each(result, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="advanceDetail_RefID${indexAdvanceDetail}" value="${val2.sys_ID}" type="hidden" />
                                <input id="productUnitPriceCurrency_RefID${indexAdvanceDetail}" value="${val2.productUnitPriceCurrency_RefID}" type="hidden" />
                                <input id="transNumber${indexAdvanceDetail}" value="${advanceNumber}" type="hidden" />

                                ${key === 0 ? modifyColumn : `<td style="text-align: center; padding: 10px !important; display: none;">${advanceNumber}</td>`}
                                <td style="text-align: center; padding: 10px !important;">${val2.combinedBudgetSectionCode + ' - ' + val2.combinedBudgetSectionName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productCode}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productUnitPriceCurrencyISOCode}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.productUnitPriceCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important;">-</td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="qty_settlement${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px; width: 75px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="price_settlement${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px; width: 75px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="total_settlement${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px; width: 75px;" data-default="" readonly />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="qty_settlement_company${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px; width: 75px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="price_settlement_company${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px; width: 75px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="total_settlement_company${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px; width: 75px;" data-default="" readonly />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="balance${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px; width: 75px;" data-default="" readonly />
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_settlement${indexAdvanceDetail}`).on('keyup', function() {
                            var qty_settlement = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var price_settlement = $(`#price_settlement${data_index}`).val();
                            var total_settlements = parseFloat(qty_settlement || 0) * parseFloat(price_settlement.replace(/,/g, '') || 0);
                            var countBalance = data_total_request - total_settlements;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            // if (qty_settlement > val2.quantity) {
                            if (total_settlements > data_total_request) {
                                $(this).val(0);
                                $(`#total_settlement${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Total Expense Claim is over Total Request !");
                                // ErrorNotif("Qty Settlement is over Qty Request !");
                            } else {
                                $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                                calculateTotal();
                            }
                        });

                        $(`#price_settlement${indexAdvanceDetail}`).on('keyup', function() {
                            var price_settlement = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var qty_settlement = $(`#qty_settlement${data_index}`).val();
                            var total_settlements = parseFloat(qty_settlement.replace(/,/g, '') || 0) * parseFloat(price_settlement || 0);
                            var countBalance = data_total_request - total_settlements;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            // if (price_settlement > val2.productUnitPriceCurrencyValue) {
                            if (total_settlements > data_total_request) {
                                $(this).val(0);
                                $(`#total_settlement${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Total Expense Claim is over Total Request !");
                                // ErrorNotif("Price Settlement is over Price Request !");
                            } else {
                                $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                                calculateTotal();
                            }
                        });

                        $(`#qty_settlement_company${indexAdvanceDetail}`).on('keyup', function() {
                            var qty_settlement_company = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var price_settlement_company = $(`#price_settlement_company${data_index}`).val();
                            var total_settlement_company = parseFloat(qty_settlement_company || 0) * parseFloat(price_settlement_company.replace(/,/g, '') || 0);
                            var countBalance = data_total_request - total_settlement_company;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            // if (qty_settlement_company > val2.quantity) {
                            if (total_settlement_company > data_total_request) {
                                $(this).val(0);
                                $(`#total_settlement_company${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                // ErrorNotif("Qty Settlement is over Qty Request !");
                                ErrorNotif("Total Return is over Total Request !");
                            } else {
                                $(`#total_settlement_company${data_index}`).val(currencyTotal(total_settlement_company));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                                calculateTotal();
                            }
                        });

                        $(`#price_settlement_company${indexAdvanceDetail}`).on('keyup', function() {
                            var price_settlement_company = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var qty_settlement_company = $(`#qty_settlement_company${data_index}`).val();
                            var total_settlement_company = parseFloat(qty_settlement_company.replace(/,/g, '') || 0) * parseFloat(price_settlement_company || 0);
                            var countBalance = data_total_request - total_settlement_company;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            // if (price_settlement_company > val2.productUnitPriceCurrencyValue) {
                            if (total_settlement_company > data_total_request) {
                                $(this).val(0);
                                $(`#total_settlement_company${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                // ErrorNotif("Price Settlement is over Price Request !");
                                ErrorNotif("Total Return is over Total Request !");
                            } else {
                                $(`#total_settlement_company${data_index}`).val(currencyTotal(total_settlement_company));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                                calculateTotal();
                            }
                        });

                        indexAdvanceDetail += 1;
                    });
                } else {
                    console.log('error');
                    $(".loadingAdvanceSettlementTable").hide();
                    $(".errorAdvanceSettlementTable").show();
                    $("#errorAdvanceSettlementMessageTable").text(`Data not found.`);
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableAdvanceList tbody tr');

        rows.forEach(row => {
            const totalExpenseCell = row.children[3];
            const totalCompanyCell = row.children[4];
            const valueExpense = parseFloat(totalExpenseCell.value.replace(/,/g, '')) || 0;
            const valueCompany = parseFloat(totalCompanyCell.value.replace(/,/g, '')) || 0;
            total += valueExpense;
            total += valueCompany;
        });

        // document.getElementById('TotalAdvanceDetail').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
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
                AdvanceSettlementStore({...formatData, comment: result.value});
            }
        });
    }

    function AdvanceSettlementStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("AdvanceSettlement.store") }}',
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
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        ShowLoading();
                        window.location.href = '/AdvanceSettlement?var=1';
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

    function CancelAdvance() {
        ShowLoading();
        window.location.href = '/AdvanceSettlement?var=1';
    }

    $("#advance-details-add").on('click', function() {
        const sourceTable = document.getElementById('tableAdvanceDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableAdvanceList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const advanceDetail_RefID               = row.querySelector('input[id^="advanceDetail_RefID"]');
            const productUnitPriceCurrency_RefID    = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const qtyExpenseInput                   = row.querySelector('input[id^="qty_settlement"]');
            const priceExpenseInput                 = row.querySelector('input[id^="price_settlement"]');
            const totalExpenseInput                 = row.querySelector('input[id^="total_settlement"]');
            const qtyCompanyInput                   = row.querySelector('input[id^="qty_settlement_company"]');
            const priceCompanyInput                 = row.querySelector('input[id^="price_settlement_company"]');
            const totalCompanyInput                 = row.querySelector('input[id^="total_settlement_company"]');
            const balanceInput                      = row.querySelector('input[id^="balance"]');

            if (
                (qtyExpenseInput && priceExpenseInput && totalExpenseInput &&
                    qtyExpenseInput.value.trim() !== '' && 
                    priceExpenseInput.value.trim() !== '' && 
                    totalExpenseInput.value.trim() !== '') ||
                (qtyCompanyInput && priceCompanyInput && totalCompanyInput &&
                    qtyCompanyInput.value.trim() !== '' && 
                    priceCompanyInput.value.trim() !== '' && 
                    totalCompanyInput.value.trim() !== ''
                )
            ) {
                const transNumber   = row.children[3].innerText.trim();
                const productCode   = row.children[5].innerText.trim();
                const productName   = row.children[6].innerText.trim();
                const uom           = row.children[7].innerText.trim();
                const currency      = row.children[8].innerText.trim();
                const qtyAvail      = row.children[9].innerText.trim();
                const priceAvail    = row.children[10].innerText.trim();

                const qtyExpense    = qtyExpenseInput.value.trim();
                const priceExpense  = priceExpenseInput.value.trim();
                const totalExpense  = totalExpenseInput.value.trim();
                const qtyCompany    = qtyCompanyInput.value.trim();
                const priceCompany  = priceCompanyInput.value.trim();
                const totalCompany  = totalCompanyInput.value.trim();
                const balance       = balanceInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetProductCode = targetRow.children[2].value.trim();
                    const targetTransNumber = targetRow.children[5].innerText.trim();

                    if (targetTransNumber === transNumber && targetProductCode === productCode) {
                        targetRow.children[9].innerText     = `Expence Claim: Rp ${totalExpense || '0.00'}`;
                        targetRow.children[10].innerText    = `Return to the Company: Rp ${totalCompany || '0.00'}`;
                        found = true;

                        // update dataStore
                        const indexToUpdate = dataStore.findIndex(item => item.entities.transactionNumber == transNumber && item.entities.productCode == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    advanceDetail_RefID: parseInt(advanceDetail_RefID.value),
                                    expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')) || 0,
                                    expenseProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                                    expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')) || 0,
                                    expenseProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                                    expenseProductUnitPriceBaseCurrencyValue: null,
                                    // expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                                    refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')) || 0,
                                    refundProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                                    refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                                    refundProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                                    refundProductUnitPriceBaseCurrencyValue: null,
                                    // refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                                    remarks: null,
                                    transactionNumber: transNumber,
                                    productCode: productCode
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="qty_avail[]" value="${qtyAvail}">
                        <input type="hidden" id="price_avail[]" value="${priceAvail}">
                        <input type="hidden" id="product_code[]" value="${productCode}">
                        <input type="hidden" id="total_expense[]" value="${totalExpense}">
                        <input type="hidden" id="total_company[]" value="${totalCompany}">

                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${transNumber}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode + ' - ' + productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 40px;">${currency}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">Expence Claim: Rp ${totalExpense || '0.00'}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">Return to the Company: Rp ${totalCompany || '0.00'}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            advanceDetail_RefID: parseInt(advanceDetail_RefID.value),
                            expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')) || 0,
                            expenseProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                            expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')) || 0,
                            expenseProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                            expenseProductUnitPriceBaseCurrencyValue: null,
                            // expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                            refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')) || 0,
                            refundProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                            refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                            refundProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                            refundProductUnitPriceBaseCurrencyValue: null,
                            // refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                            remarks: null,
                            transactionNumber: transNumber,
                            productCode: productCode
                        }
                    });
                }
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        updateGrandTotal();
    });

    $('#advance-details-reset').on('click', function() {
        $('input[id^="qty_settlement"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="price_settlement"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="total_settlement"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="qty_settlement_company"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="price_settlement_company"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="total_settlement_company"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableAdvanceList tbody').empty();
        dataStore = [];

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalAdvanceDetail').textContent = "0.00";
    });

    $('#tableGetModalAdvance').on('click', 'tbody tr', function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_modal_advance"]').val();
        let trano           = $(this).find('td:nth-child(2)').text();

        getAdvanceDetail(sysId, trano);
    });

    function SubmitForm() {
        $('#advanceSettlementFormModal').modal('hide');

        var action = $("#FormStoreAdvanceSettlement").attr("action");
        var method = $("#FormStoreAdvanceSettlement").attr("method");
        var form_data = new FormData($("#FormStoreAdvanceSettlement")[0]);
        form_data.append('advanceSettlementDetail', JSON.stringify(dataStore));

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
                    $("#submitArf").prop("disabled", false);
                    CancelNotif("You don't have access", '/AdvanceSettlement?var=1');
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
                console.log('response error', response);
                
                HideLoading();
                $("#submitArf").prop("disabled", false);
                CancelNotif("You don't have access", '/AdvanceSettlement?var=1');
            }
        });
    }

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType("Advance Settlement Form");
    });
</script>