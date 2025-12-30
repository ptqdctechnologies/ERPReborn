<script>
    let dataStore           = [];
    let totalAdvanceDetail  = 0;
    let trigger             = 0;
    let remark              = document.getElementById("remark");
    let advanceDetailsAdd   = document.getElementById("advance-details-add");
    const dataTable         = {!! json_encode($dataDetail ?? []) !!};

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#tableAdvanceDetail tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty   = document.getElementById(`qty_settlement${index}`)?.value.trim();
            const price = document.getElementById(`price_settlement${index}`)?.value.trim();
            const total = document.getElementById(`total_settlement${index}`)?.value.trim();

            const qtyCompany   = document.getElementById(`qty_settlement_company${index}`)?.value.trim();
            const priceCompany = document.getElementById(`price_settlement_company${index}`)?.value.trim();
            const totalCompany = document.getElementById(`total_settlement_company${index}`)?.value.trim();

            if (qty !== "" && price !== "" && total !== "") {
                hasFullRow = true;
            }

            if (qtyCompany !== "" && priceCompany !== "" && totalCompany !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const qtyEl   = document.getElementById(`qty_settlement${index}`);
            const priceEl = document.getElementById(`price_settlement${index}`);
            const totalEl = document.getElementById(`total_settlement${index}`);

            const qtyCompanyEl   = document.getElementById(`qty_settlement_company${index}`);
            const priceCompanyEl = document.getElementById(`price_settlement_company${index}`);
            const totalCompanyEl = document.getElementById(`total_settlement_company${index}`);

            if (hasFullRow) {
                $(qtyEl).css("border", "1px solid #ced4da");
                $(priceEl).css("border", "1px solid #ced4da");
                $(totalEl).css("border", "1px solid #ced4da");

                $(qtyCompanyEl).css("border", "1px solid #ced4da");
                $(priceCompanyEl).css("border", "1px solid #ced4da");
                $(totalCompanyEl).css("border", "1px solid #ced4da");
                $("#advanceDetailsMessage").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if ((qtyEl.value.trim() != "" || priceEl.value.trim() != "") || (qtyCompanyEl.value.trim() != "" || priceCompanyEl.value.trim() != "")) {
                            $(qtyEl).css("border", "1px solid red");
                            $(priceEl).css("border", "1px solid red");
                            $(totalEl).css("border", "1px solid red");

                            $(qtyCompanyEl).css("border", "1px solid red");
                            $(priceCompanyEl).css("border", "1px solid red");
                            $(totalCompanyEl).css("border", "1px solid red");
                            $("#advanceDetailsMessage").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(priceEl).css("border", "1px solid #ced4da");
                            $(totalEl).css("border", "1px solid #ced4da");

                            $(qtyCompanyEl).css("border", "1px solid #ced4da");
                            $(priceCompanyEl).css("border", "1px solid #ced4da");
                            $(totalCompanyEl).css("border", "1px solid #ced4da");
                            $("#advanceDetailsMessage").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && priceEl.value.trim() == "") && (qtyCompanyEl.value.trim() == "" && priceCompanyEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(priceEl).css("border", "1px solid #ced4da");
                        $(totalEl).css("border", "1px solid #ced4da");

                        $(qtyCompanyEl).css("border", "1px solid #ced4da");
                        $(priceCompanyEl).css("border", "1px solid #ced4da");
                        $(totalCompanyEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(qtyEl).css("border", "1px solid red");
                    $(priceEl).css("border", "1px solid red");
                    $(totalEl).css("border", "1px solid red");

                    $(qtyCompanyEl).css("border", "1px solid red");
                    $(priceCompanyEl).css("border", "1px solid red");
                    $(totalCompanyEl).css("border", "1px solid red");
                    $("#advanceDetailsMessage").show();
                }
            }
        });

        return hasFullRow;
    }

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_settlement"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('TotalAdvanceDetail').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableAdvanceList tbody tr');

        rows.forEach(row => {
            const totalExpenseCell = row.children[5];
            const totalCompanyCell = row.children[6];
            const valueExpense = parseFloat(totalExpenseCell.value.replace(/,/g, '')) || 0;
            const valueCompany = parseFloat(totalCompanyCell.value.replace(/,/g, '')) || 0;
            total += valueExpense;
            total += valueCompany;
        });

        total = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[7].value}): ${total}`;
    }

    function summaryData() {
        const totalsAdvanceDetail   = document.getElementById('TotalAdvanceDetail').textContent;
        const sourceTable           = document.getElementById('tableAdvanceDetail').getElementsByTagName('tbody')[0];
        const targetTable           = document.getElementById('tableAdvanceList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const advanceSettlement_RefID                       = row.querySelector('input[id^="advanceSettlement_RefID"]');
            const advanceDetail_RefID                           = row.querySelector('input[id^="advanceDetail_RefID"]');
            const expenseProductUnitPriceCurrency_RefID         = row.querySelector('input[id^="expenseProductUnitPriceCurrency_RefID"]');
            const expenseProductUnitPriceCurrencyExchangeRate   = row.querySelector('input[id^="expenseProductUnitPriceCurrencyExchangeRate"]');
            const refundProductUnitPriceCurrency_RefID          = row.querySelector('input[id^="refundProductUnitPriceCurrency_RefID"]');
            const refundProductUnitPriceCurrencyExchangeRate    = row.querySelector('input[id^="refundProductUnitPriceCurrencyExchangeRate"]');
            const qtyExpenseInput                               = row.querySelector('input[id^="qty_settlement"]');
            const priceExpenseInput                             = row.querySelector('input[id^="price_settlement"]');
            const totalExpenseInput                             = row.querySelector('input[id^="total_settlement"]');
            const qtyCompanyInput                               = row.querySelector('input[id^="qty_settlement_company"]');
            const priceCompanyInput                             = row.querySelector('input[id^="price_settlement_company"]');
            const totalCompanyInput                             = row.querySelector('input[id^="total_settlement_company"]');

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
                const arfNumber     = row.children[8].innerText.trim();
                const productCode   = row.children[10].innerText.trim();
                const productName   = row.children[11].innerText.trim();
                const uom           = row.children[12].innerText.trim();
                const currency      = row.children[13].innerText.trim();
                const qtyAvail      = row.children[14].innerText.trim();
                const priceAvail    = row.children[15].innerText.trim();

                const qtyExpense    = qtyExpenseInput.value.trim();
                const priceExpense  = priceExpenseInput.value.trim();
                const totalExpense  = totalExpenseInput.value.trim();
                const qtyCompany    = qtyCompanyInput.value.trim();
                const priceCompany  = priceCompanyInput.value.trim();
                const totalCompany  = totalCompanyInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetProductCode = targetRow.children[4].value.trim();
                    const targetARFNumber   = targetRow.children[9].innerText.trim();

                    if (targetARFNumber == arfNumber && targetProductCode == productCode) {
                        targetRow.children[5].value         = totalExpense || 0;
                        targetRow.children[6].value         = totalCompany || 0;
                        targetRow.children[12].innerText    = `Expence Claim: Rp ${totalExpense || '0.00'}`;
                        targetRow.children[13].innerText    = `Return: Rp ${totalCompany || '0.00'}`;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == advanceDetail_RefID.value && item.entities.productCode == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                advanceRequestNumber: arfNumber,
                                advanceSettlement_RefID: parseInt(advanceSettlement_RefID.value),
                                recordID: parseInt(advanceDetail_RefID.value),
                                entities: {
                                    expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')) || 0,
                                    expenseProductUnitPriceCurrency_RefID: parseInt(expenseProductUnitPriceCurrency_RefID.value),
                                    expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')) || 0,
                                    expenseProductUnitPriceCurrencyExchangeRate: parseFloat(expenseProductUnitPriceCurrencyExchangeRate.value),
                                    expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')) || 0,
                                    refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')) || 0,
                                    refundProductUnitPriceCurrency_RefID: parseInt(refundProductUnitPriceCurrency_RefID.value),
                                    refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                                    refundProductUnitPriceCurrencyExchangeRate: parseFloat(refundProductUnitPriceCurrencyExchangeRate.value),
                                    refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                                    remarks: null,
                                    productCode: productCode
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="qty_expense_avail[]" value="${qtyAvail}">
                        <input type="hidden" id="price_expense_avail[]" value="${priceAvail}">
                        <input type="hidden" id="qty_company_avail[]" value="${qtyAvail}">
                        <input type="hidden" id="price_company_avail[]" value="${priceAvail}">
                        <input type="hidden" id="product_code[]" value="${productCode}">
                        <input type="hidden" id="total_expense[]" value="${totalExpense}">
                        <input type="hidden" id="total_company[]" value="${totalCompany}">
                        <input type="hidden" id="currency[]" value="${currency}">
                        <input type="hidden" id="product_name[]" value="${productName}">

                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${transNumber}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode + ' - ' + productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">Expence Claim: Rp ${totalExpense || '0.00'}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">Return: Rp ${totalCompany || '0.00'}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        advanceRequestNumber: arfNumber,
                        advanceSettlement_RefID: parseInt(advanceSettlement_RefID.value),
                        recordID: parseInt(advanceDetail_RefID.value),
                        entities: {
                            expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')) || 0,
                            expenseProductUnitPriceCurrency_RefID: parseInt(expenseProductUnitPriceCurrency_RefID.value),
                            expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')) || 0,
                            expenseProductUnitPriceCurrencyExchangeRate: parseFloat(expenseProductUnitPriceCurrencyExchangeRate.value) || 0,
                            expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')) || 0,
                            refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')) || 0,
                            refundProductUnitPriceCurrency_RefID: parseInt(refundProductUnitPriceCurrency_RefID.value),
                            refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                            refundProductUnitPriceCurrencyExchangeRate: parseFloat(refundProductUnitPriceCurrencyExchangeRate.value) || 0,
                            refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                            remarks: null,
                            productCode: productCode
                        }
                    });
                }
            } else {
                const arfNumber     = row.children[8].innerText.trim();
                const productCode   = row.children[10].innerText.trim();
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetProductCode = targetRow.children[4].value.trim();
                    const targetARFNumber   = targetRow.children[9].innerText.trim();

                    if (targetARFNumber == arfNumber && targetProductCode == productCode) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.recordID == advanceDetail_RefID.value);
                });
            }
        }

        updateGrandTotal();
    }

    function validationForm() {
        const isRemarkNotEmpty  = remark.value.trim() !== '';
        const isTableNotEmpty   = checkOneLineBudgetContents();

        if (isRemarkNotEmpty && isTableNotEmpty) {
            $('#advanceSettlementFormModal').modal('show');
            summaryData();
        } else {
            if (!isRemarkNotEmpty) {
                $("#remark").css("border", "1px solid red");
                $("#remarkMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#advanceDetailsMessage").show();
                return;
            }
        }
    }

    function getDetailAdvanceSettlement(dataDetail) {
        $(".loadingAdvanceSettlementTable").hide();
        $(".errorAdvanceSettlementTable").hide();
        $("#var_combinedBudget_RefID").val(dataDetail[0].combinedBudget_RefID);

        let totalExpenseClaim  = 0;
        let totalAmountCompany = 0;
        let tbody = $('#tableAdvanceDetail tbody');
        tbody.empty();

        let tbodyList = $('#tableAdvanceList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            totalExpenseClaim  += val2.expenseQuantity * val2.expenseProductUnitPriceCurrencyValue;
            totalAmountCompany += val2.refundQuantity * val2.refundProductUnitPriceCurrencyValue;

            dataStore.push({
                advanceRequestNumber: val2.ARFNumber,
                advanceSettlement_RefID: val2.advanceSettlement_RefID,
                recordID: val2.sys_ID,
                entities: {
                    expenseQuantity: val2.expenseQuantity,
                    expenseProductUnitPriceCurrency_RefID: val2.expenseProductUnitPriceCurrency_RefID,
                    expenseProductUnitPriceCurrencyValue: val2.expenseProductUnitPriceCurrencyValue,
                    expenseProductUnitPriceCurrencyExchangeRate: val2.expenseProductUnitPriceCurrencyExchangeRate,
                    expenseProductUnitPriceBaseCurrencyValue: val2.expenseProductUnitPriceBaseCurrencyValue,
                    refundQuantity: val2.refundQuantity,
                    refundProductUnitPriceCurrency_RefID: val2.refundProductUnitPriceCurrency_RefID,
                    refundProductUnitPriceCurrencyValue: val2.refundProductUnitPriceCurrencyValue,
                    refundProductUnitPriceCurrencyExchangeRate: val2.refundProductUnitPriceCurrencyExchangeRate,
                    refundProductUnitPriceBaseCurrencyValue: val2.refundProductUnitPriceBaseCurrencyValue,
                    remarks: null,
                    productCode: val2.productCode
                }
            });

            let totalRequest    = val2.quantity * val2.productUnitPriceCurrencyValue;
            let totalExpense    = val2.expenseQuantity * val2.expenseProductUnitPriceCurrencyValue;
            let totalCompany    = val2.refundQuantity * val2.refundProductUnitPriceCurrencyValue;
            let balanced        = (totalRequest - totalExpense) + totalCompany;

            let row = `
                <tr>
                    <input id="advanceSettlement_RefID${key}" value="${val2.advanceSettlement_RefID}" type="hidden" />
                    <input id="advanceDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                    <input id="expenseProductUnitPriceCurrency_RefID${key}" value="${val2.expenseProductUnitPriceCurrency_RefID}" type="hidden" />
                    <input id="expenseProductUnitPriceCurrencyExchangeRate${key}" value="${val2.expenseProductUnitPriceCurrencyExchangeRate}" type="hidden" />
                    <input id="expenseProductUnitPriceBaseCurrencyValue${key}" value="${val2.expenseProductUnitPriceBaseCurrencyValue}" type="hidden" />
                    <input id="refundProductUnitPriceCurrency_RefID${key}" value="${val2.refundProductUnitPriceCurrency_RefID}" type="hidden" />
                    <input id="refundProductUnitPriceCurrencyExchangeRate${key}" value="${val2.refundProductUnitPriceCurrencyExchangeRate}" type="hidden" />
                    <input id="refundProductUnitPriceBaseCurrencyValue${key}" value="${val2.refundProductUnitPriceBaseCurrencyValue}" type="hidden" />

                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.ARFNumber || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.combinedBudgetSectionCode + ' - ' + val2.combinedBudgetSectionName}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productCode || '-'}</td>
                    <td style="text-align: left;border:1px solid #e9ecef;">
                        <div style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 150px;">
                            ${val2.productName || '-'}
                        </div>
                    </td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.UOM || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.currency || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(val2.quantity) || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(val2.productUnitPriceCurrencyValue) || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(totalRequest) || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(val2.balance) || '-'}</td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="qty_settlement${key}" data-default=${currencyTotal(val2.expenseQuantity) || 0} data-index=${key} data-total-request=${totalRequest} autocomplete="off" value=${currencyTotal(val2.expenseQuantity) || 0} style="border-radius:0px; width: 75px;" />
                    </td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="price_settlement${key}" data-default=${currencyTotal(val2.expenseProductUnitPriceCurrencyValue) || 0} data-index=${key} data-total-request=${totalRequest} autocomplete="off" value=${currencyTotal(val2.expenseProductUnitPriceCurrencyValue) || 0} style="border-radius:0px; width: 75px;" />
                    </td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="total_settlement${key}" data-default=${(currencyTotal(totalExpense)) || 0} autocomplete="off" value=${(currencyTotal(totalExpense)) || 0} style="border-radius:0px; width: 75px;" readonly />
                    </td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="qty_settlement_company${key}" data-default=${currencyTotal(val2.refundQuantity) || 0} data-index=${key} data-total-request=${totalRequest} autocomplete="off" value=${currencyTotal(val2.refundQuantity) || 0} style="border-radius:0px; width: 75px;" />
                    </td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="price_settlement_company${key}" data-default=${currencyTotal(val2.refundProductUnitPriceCurrencyValue) || 0} data-index=${key} data-total-request=${totalRequest} autocomplete="off" value=${currencyTotal(val2.refundProductUnitPriceCurrencyValue) || 0} style="border-radius:0px; width: 75px;" />
                    </td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="total_settlement_company${key}" data-default=${(currencyTotal(totalCompany)) || 0} autocomplete="off" value=${(currencyTotal(totalCompany)) || 0} style="border-radius:0px; width: 75px;" readonly />
                    </td>
                    <td style="text-align: center; padding: 10px !important; width: 120px;">
                        <input class="form-control number-without-negative" id="balance${key}" data-default=${currencyTotal(balanced)} autocomplete="off" value=${currencyTotal(balanced)} style="border-radius:0px; width: 75px;" readonly />
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#qty_settlement${key}`).on('keyup', function() {
                var qty_settlement      = $(this).val().replace(/,/g, '');
                var data_index          = $(this).data('index');
                var data_total_request  = $(this).data('total-request');
                var price_settlement    = $(`#price_settlement${data_index}`).val();
                var total_company       = $(`#total_settlement_company${data_index}`).val().replace(/,/g, '');
                var total_settlements   = parseFloat(qty_settlement || 0) * parseFloat(price_settlement.replace(/,/g, '') || 0);
                var countBalance        = (totalRequest - total_settlements) + parseFloat(total_company || 0);

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (total_settlements > data_total_request) {
                    $(this).val('');
                    $(`#total_settlement${data_index}`).val('');
                    ErrorNotif("Total Expense Claim is over!");
                } else {
                    $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                }
                
                calculateTotal();
                checkOneLineBudgetContents(data_index);
            });

            $(`#price_settlement${key}`).on('keyup', function() {
                var price_settlement    = $(this).val().replace(/,/g, '');
                var data_index          = $(this).data('index');
                var data_total_request  = $(this).data('total-request');
                var qty_settlement      = $(`#qty_settlement${data_index}`).val();
                var total_company       = $(`#total_settlement_company${data_index}`).val().replace(/,/g, '');
                var total_settlements   = parseFloat(qty_settlement.replace(/,/g, '') || 0) * parseFloat(price_settlement || 0);
                var countBalance        = (totalRequest - total_settlements) + parseFloat(total_company || 0);

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (total_settlements > data_total_request) {
                    $(this).val('');
                    $(`#total_settlement${data_index}`).val('');
                    ErrorNotif("Total Expense Claim is over!");
                } else {
                    $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                }

                calculateTotal();
                checkOneLineBudgetContents(data_index);
            });

            $(`#qty_settlement_company${key}`).on('keyup', function() {
                var qty_settlement_company      = $(this).val().replace(/,/g, '');
                var data_index                  = $(this).data('index');
                var data_total_request          = $(this).data('total-request');
                var price_settlement_company    = $(`#price_settlement_company${data_index}`).val();
                var total_settlement            = $(`#total_settlement${data_index}`).val().replace(/,/g, '');
                var total_settlement_company    = parseFloat(qty_settlement_company || 0) * parseFloat(price_settlement_company.replace(/,/g, '') || 0);
                var countBalance                = (totalRequest - parseFloat(total_settlement || 0)) + total_settlement_company;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (total_settlement_company > data_total_request) {
                    $(this).val('');
                    $(`#total_settlement_company${data_index}`).val('');
                    ErrorNotif("Total Return is over!");
                } else {
                    $(`#total_settlement_company${data_index}`).val(currencyTotal(total_settlement_company));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                }

                calculateTotal();
                checkOneLineBudgetContents(data_index);
            });

            $(`#price_settlement_company${key}`).on('keyup', function() {
                var price_settlement_company    = $(this).val().replace(/,/g, '');
                var data_index                  = $(this).data('index');
                var data_total_request          = $(this).data('total-request');
                var qty_settlement_company      = $(`#qty_settlement_company${data_index}`).val();
                var total_settlement            = $(`#total_settlement${data_index}`).val().replace(/,/g, '');
                var total_settlement_company    = parseFloat(qty_settlement_company.replace(/,/g, '') || 0) * parseFloat(price_settlement_company || 0);
                var countBalance                = (totalRequest - parseFloat(total_settlement || 0)) + total_settlement_company;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (total_settlement_company > data_total_request) {
                    $(this).val('');
                    $(`#total_settlement_company${data_index}`).val('');
                    ErrorNotif("Total Return is over!");
                } else {
                    $(`#total_settlement_company${data_index}`).val(currencyTotal(total_settlement_company));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                }

                calculateTotal();
                checkOneLineBudgetContents(data_index);
            });

            let rowList = `
                <tr>
                    <input type="hidden" id="qty_expense_avail[]" value="${val2.expenseQuantity}">
                    <input type="hidden" id="price_expense_avail[]" value="${val2.expenseProductUnitPriceCurrencyValue}">
                    <input type="hidden" id="qty_company_avail[]" value="${val2.refundQuantity}">
                    <input type="hidden" id="price_company_avail[]" value="${val2.refundProductUnitPriceCurrencyValue}">
                    <input type="hidden" id="product_code[]" value="${val2.productCode}">
                    <input type="hidden" id="total_expense[]" value="${totalExpense}">
                    <input type="hidden" id="total_company[]" value="${totalCompany}">
                    <input type="hidden" id="currency[]" value="${val2.currency}">
                    <input type="hidden" id="product_name[]" value="${val2.productName}">

                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${val2.ARFNumber || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${val2.productCode + ' - ' + val2.productName}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${val2.UOM || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">Expence Claim: Rp ${totalExpense || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">Return: Rp ${totalCompany || '-'}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        trigger = currencyTotal(totalExpenseClaim + totalAmountCompany);
        document.getElementById('TotalAdvanceDetail').textContent = currencyTotal(totalExpenseClaim + totalAmountCompany);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalExpenseClaim + totalAmountCompany);
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
                RevisionAdvanceSettlementStore({...formatData, comment: result.value});
            }
        });
    }

    function RevisionAdvanceSettlementStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{!! route("AdvanceSettlement.UpdatesAdvanceSettlement") !!}',
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
                        cancelForm("{{ route('AdvanceSettlement.index', ['var' => 1]) }}");
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

    function SubmitForm() {
        $('#advanceSettlementFormModal').modal('hide');

        var action = $('#FormRevisionAdvanceSettlement').attr("action");
        var method = $('#FormRevisionAdvanceSettlement').attr("method");
        var form_data = new FormData($('#FormRevisionAdvanceSettlement')[0]);
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
                CancelNotif("You don't have access", '/AdvanceSettlement?var=1');
            }
        });
    }

    $('#remark').on('input', function(e) {
        e.preventDefault();

        $("#remark").css("border", "1px solid #ced4da");
        $("#remarkMessage").hide();
    });

    $(window).on('load', function() {
        getDetailAdvanceSettlement(dataTable);
    });
</script>