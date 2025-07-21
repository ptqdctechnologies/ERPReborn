<script>
    let dataStore           = [];
    let advanceID           = [];
    let arrAdvanceNumber    = [];
    let isValidatePass      = false;
    let budgetCodeTrigger   = "";
    let beneficiaryTrigger  = "";
    let indexAdvanceDetail  = 0;
    let totalAdvanceDetail  = 0;
    let tableAdvanceList    = document.getElementById("tableAdvanceList");

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

                            if (qty_settlement > val2.quantity) {
                                $(this).val(0);
                                $(`#total_settlement${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Qty Settlement is over Qty Request !");
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

                            if (price_settlement > val2.productUnitPriceCurrencyValue) {
                                $(this).val(0);
                                $(`#total_settlement${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Price Settlement is over Price Request !");
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

                            if (qty_settlement_company > val2.quantity) {
                                $(this).val(0);
                                $(`#total_settlement_company${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Qty Settlement is over Qty Request !");
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

                            if (price_settlement_company > val2.productUnitPriceCurrencyValue) {
                                $(this).val(0);
                                $(`#total_settlement_company${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Price Settlement is over Price Request !");
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
            const totalExpenseCell = row.children[9];
            const totalCompanyCell = row.children[12];
            const valueExpense = parseFloat(totalExpenseCell.innerText.replace(/,/g, '')) || 0;
            const valueCompany = parseFloat(totalCompanyCell.innerText.replace(/,/g, '')) || 0;
            total += valueExpense;
            total += valueCompany;
        });

        document.getElementById('TotalAdvanceDetail').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = currencyTotal(total);
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
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            ShowLoading();
            AdvanceSettlementStore({...formatData, comment: result.value});
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
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + res.documentNumber + '</span>',
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
                const productCode   = row.children[4].innerText.trim();
                const productName   = row.children[5].innerText.trim();
                const uom           = row.children[6].innerText.trim();
                const currency      = row.children[7].innerText.trim();
                const qtyAvail      = row.children[8].innerText.trim();
                const priceAvail    = row.children[9].innerText.trim();

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
                    const targetTransNumber = targetRow.children[2].innerText.trim();
                    const targetProductCode = targetRow.children[3].innerText.trim();

                    if (targetTransNumber === transNumber && targetProductCode === productCode) {
                        targetRow.children[7].innerText     = qtyExpense || '-';
                        targetRow.children[8].innerText     = priceExpense || '-';
                        targetRow.children[9].innerText     = totalExpense || '-';
                        targetRow.children[10].innerText    = qtyCompany || '-';
                        targetRow.children[11].innerText    = priceCompany || '-';
                        targetRow.children[12].innerText    = totalCompany || '-';
                        found = true;

                        // update dataStore
                        const indexToUpdate = dataStore.findIndex(item => item.entities.transactionNumber == transNumber && item.entities.productCode == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    advanceDetail_RefID: parseInt(advanceDetail_RefID.value),
                                    expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')),
                                    expenseProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                                    expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                                    expenseProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                                    expenseProductUnitPriceBaseCurrencyValue: null,
                                    // expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                                    refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')),
                                    refundProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                                    refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
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
                        <td style="text-align: center;padding: 0.8rem;">${transNumber}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productCode}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productName}</td>
                        <td style="text-align: center;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: center;padding: 0.8rem;">${currency}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qtyExpense || '-'}</td>
                        <td style="text-align: center;padding: 0.8rem;">${priceExpense || '-'}</td>
                        <td style="text-align: center;padding: 0.8rem;">${totalExpense || '-'}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qtyCompany || '-'}</td>
                        <td style="text-align: center;padding: 0.8rem;">${priceCompany || '-'}</td>
                        <td style="text-align: center;padding: 0.8rem;">${totalCompany || '-'}</td>
                    `;
                        // <td style="text-align: center;padding: 0.8rem;">${balance}</td>
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            advanceDetail_RefID: parseInt(advanceDetail_RefID.value),
                            expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')),
                            expenseProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                            expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                            expenseProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                            expenseProductUnitPriceBaseCurrencyValue: null,
                            // expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                            refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')),
                            refundProductUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                            refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                            refundProductUnitPriceCurrencyExchangeRate: parseFloat(1.00),
                            refundProductUnitPriceBaseCurrencyValue: null,
                            // refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                            remarks: null,
                            transactionNumber: transNumber,
                            productCode: productCode
                        }
                    });
                }

                qtyExpenseInput.value = '';
                priceExpenseInput.value = '';
                totalExpenseInput.value = '';
                qtyCompanyInput.value = '';
                priceCompanyInput.value = '';
                totalCompanyInput.value = '';
                balanceInput.value = balanceInput.getAttribute('data-default');
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

    if (tableAdvanceList) {
        document.querySelector('#tableAdvanceList tbody').addEventListener('click', function (e) {
            const row = e.target.closest('tr');
            if (!row) return;

            if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;

            const qtyAvail      = row.children[0];
            const priceAvail    = row.children[1];
            const qtyExpense    = row.children[7];
            const priceExpense  = row.children[8];
            const totalExpense  = row.children[9];
            const qtyCompany    = row.children[10];
            const priceCompany  = row.children[11];
            const totalCompany  = row.children[12];
            // const balance       = row.children[13];

            if (row.classList.contains('editing-row')) {
                const newQtyExpense     = qtyExpense.querySelector('input')?.value || '';
                const newPriceExpense   = priceExpense.querySelector('input')?.value || '';
                const newTotalExpense   = totalExpense.querySelector('input')?.value || '';
                const newQtyCompany     = qtyCompany.querySelector('input')?.value || '';
                const newPriceCompany   = priceCompany.querySelector('input')?.value || '';
                const newTotalCompany   = totalCompany.querySelector('input')?.value || '';
                // const newBalance        = balance.querySelector('input')?.value || '';

                qtyExpense.innerHTML    = newQtyExpense;
                priceExpense.innerHTML  = newPriceExpense;
                totalExpense.innerHTML  = newTotalExpense;
                qtyCompany.innerHTML    = newQtyCompany;
                priceCompany.innerHTML  = newPriceCompany;
                totalCompany.innerHTML  = newTotalCompany;
                // balance.innerHTML       = newBalance;

                row.classList.remove('editing-row');

                const transNumber = row.children[2].innerText.trim();
                const productCode = row.children[3].innerText.trim();
                const storeItem = dataStore.find(item => item.entities.transactionNumber === transNumber && item.entities.productCode === productCode);
                if (storeItem) {
                    storeItem.entities.expenseQuantity                      = parseFloat(newQtyExpense.replace(/,/g, ''));
                    storeItem.entities.expenseProductUnitPriceCurrencyValue = parseFloat(newPriceExpense.replace(/,/g, ''));
                    storeItem.entities.refundQuantity                       = parseFloat(newQtyCompany.replace(/,/g, ''));
                    storeItem.entities.refundProductUnitPriceCurrencyValue  = parseFloat(newPriceCompany.replace(/,/g, ''));
                }
            } else {
                const currentQtyExpense     = qtyExpense.innerText.trim();
                const currentPriceExpense   = priceExpense.innerText.trim();
                const currentTotalExpense   = totalExpense.innerText.trim();
                const currentQtyCompany     = qtyCompany.innerText.trim();
                const currentPriceCompany   = priceCompany.innerText.trim();
                const currentTotalCompany   = totalCompany.innerText.trim();
                // const currentBalance        = balance.innerText.trim();

                qtyExpense.innerHTML = `<input class="form-control number-without-negative qty-expense-input" value="${currentQtyExpense}" autocomplete="off" style="border-radius:0px;width:100px;">`;
                priceExpense.innerHTML = `<input class="form-control number-without-negative price-expense-input" value="${currentPriceExpense}" autocomplete="off" style="border-radius:0px;width:100px;">`;
                totalExpense.innerHTML = `<input class="form-control number-without-negative total-expense-input" value="${currentTotalExpense}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;
                qtyCompany.innerHTML = `<input class="form-control number-without-negative qty-company-input" value="${currentQtyCompany}" autocomplete="off" style="border-radius:0px;width:100px;">`;
                priceCompany.innerHTML = `<input class="form-control number-without-negative price-company-input" value="${currentPriceCompany}" autocomplete="off" style="border-radius:0px;width:100px;">`;
                totalCompany.innerHTML = `<input class="form-control number-without-negative total-company-input" value="${currentTotalCompany}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;
                // balance.innerHTML = `<input class="form-control number-without-negative balance-company-input" value="${currentBalance}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;

                row.classList.add('editing-row');

                const qtyExpenseInput   = qtyExpense.querySelector('.qty-expense-input');
                const priceExpenseInput = priceExpense.querySelector('.price-expense-input');
                const totalExpenseInput = totalExpense.querySelector('.total-expense-input');
                const qtyCompanyInput   = qtyCompany.querySelector('.qty-company-input');
                const priceCompanyInput = priceCompany.querySelector('.price-company-input');
                const totalCompanyInput = totalCompany.querySelector('.total-company-input');
                // const balanceInput      = balance.querySelector('.balance-company-input');

                function updateTotalExpenseClaim() {
                    var price   = parseFloat(priceExpenseInput.value.replace(/,/g, '')) || 0;
                    var qty     = parseFloat(qtyExpenseInput.value.replace(/,/g, '')) || 0;
                    var total   = price * qty;

                    const qtyAvailValue     = parseFloat(qtyAvail?.value.replace(/,/g, '')) || 0;
                    const priceAvailValue   = parseFloat(priceAvail?.value.replace(/,/g, '')) || 0;

                    if (qty > qtyAvailValue) {
                        total                   = priceAvailValue * qtyAvailValue;
                        qty                     = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        qtyExpenseInput.value   = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                        ErrorNotif("Qty Expense Claim is over Qty Avail !");
                    }

                    if (price > priceAvailValue) {
                        total                   = qtyAvailValue * priceAvailValue;
                        price                   = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        priceExpenseInput.value = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                        ErrorNotif("Price Expense Claim is over Price Avail !");
                    }

                    totalExpenseInput.value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }

                priceExpenseInput.addEventListener('input', updateTotalExpenseClaim);
                qtyExpenseInput.addEventListener('input', updateTotalExpenseClaim);

                function updateTotalCompanyClaim() {
                    var price   = parseFloat(priceCompanyInput.value.replace(/,/g, '')) || 0;
                    var qty     = parseFloat(qtyCompanyInput.value.replace(/,/g, '')) || 0;
                    var total   = price * qty;

                    const qtyAvailValue     = parseFloat(qtyAvail?.value.replace(/,/g, '')) || 0;
                    const priceAvailValue   = parseFloat(priceAvail?.value.replace(/,/g, '')) || 0;

                    if (qty > qtyAvailValue) {
                        total                   = priceAvailValue * qtyAvailValue;
                        qty                     = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        qtyCompanyInput.value   = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                        ErrorNotif("Qty Amount to the Company is over Qty Avail !");
                    }

                    if (price > priceAvailValue) {
                        total                   = qtyAvailValue * priceAvailValue;
                        price                   = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        priceCompanyInput.value = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                        ErrorNotif("Price Amount to the Company is over Price Avail !");
                    }

                    totalCompanyInput.value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }

                priceCompanyInput.addEventListener('input', updateTotalCompanyClaim);
                qtyCompanyInput.addEventListener('input', updateTotalCompanyClaim);

                // document.getElementById('GrandTotal').innerText = parseFloat(totalCompanyInput?.value.replace(/,/g, '')) + parseFloat(totalExpenseInput?.value.replace(/,/g, ''));
            }
            updateGrandTotal();
        });
    }

    $('#tableGetModalAdvance').on('click', 'tbody tr', function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_modal_advance"]').val();
        let trano           = $(this).find('td:nth-child(2)').text();

        getAdvanceDetail(sysId, trano);
    });

    $("#FormStoreAdvanceSettlement").on("submit", function(e) {
        e.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "Save this data?",
            type: 'question',
            showCancelButton: true,
            confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
            cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
            confirmButtonColor: '#e9ecef',
            cancelButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);
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
                            $("#submitPR").prop("disabled", false);
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
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/AdvanceSettlement?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType("Advance Settlement Form");
    });
</script>