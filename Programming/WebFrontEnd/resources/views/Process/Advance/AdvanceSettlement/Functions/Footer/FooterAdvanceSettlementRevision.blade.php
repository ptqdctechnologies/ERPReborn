<script>
    let dataStore           = [];
    let totalAdvanceDetail  = 0;
    let trigger             = 0;
    const dataTable         = {!! json_encode($dataDetail ?? []) !!};

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
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productName || '-'}</td>
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

                // if (parseFloat(qty_settlement) > val2.quantity) {
                if (total_settlements > data_total_request) {
                    $(this).val(currencyTotal(val2.expenseQuantity));
                    $(`#total_settlement${data_index}`).val(currencyTotal(totalExpense));
                    $(`#balance${data_index}`).val(currencyTotal(balanced));
                    ErrorNotif("Total Expense Claim is over Total Request !");
                    // ErrorNotif("Qty Settlement is over Qty Request !");
                } else {
                    $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                    calculateTotal();
                }
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

                // if (parseFloat(price_settlement) > val2.productUnitPriceCurrencyValue) {
                if (total_settlements > data_total_request) {
                    $(this).val(currencyTotal(val2.expenseProductUnitPriceCurrencyValue));
                    $(`#total_settlement${data_index}`).val(currencyTotal(totalExpense));
                    $(`#balance${data_index}`).val(currencyTotal(balanced));
                    // ErrorNotif("Price Settlement is over Price Request !");
                    ErrorNotif("Total Expense Claim is over Total Request !");
                } else {
                    $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                    calculateTotal();
                }
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

                // if (parseFloat(qty_settlement_company) > val2.quantity) {
                if (total_settlement_company > data_total_request) {
                    $(this).val(currencyTotal(val2.refundQuantity));
                    $(`#total_settlement_company${data_index}`).val(currencyTotal(totalCompany));
                    $(`#balance${data_index}`).val(currencyTotal(balanced));
                    // ErrorNotif("Qty Settlement is over Qty Request !");
                    ErrorNotif("Total Return is over Total Request !");
                } else {
                    $(`#total_settlement_company${data_index}`).val(currencyTotal(total_settlement_company));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                    calculateTotal();
                }
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

                // if (parseFloat(price_settlement_company) > val2.productUnitPriceCurrencyValue) {
                if (total_settlement_company > data_total_request) {
                    $(this).val(currencyTotal(val2.refundProductUnitPriceCurrencyValue));
                    $(`#total_settlement_company${data_index}`).val(currencyTotal(totalCompany));
                    $(`#balance${data_index}`).val(currencyTotal(balanced));
                    // ErrorNotif("Price Settlement is over Price Request !");
                    ErrorNotif("Total Return is over Total Request !");
                } else {
                    $(`#total_settlement_company${data_index}`).val(currencyTotal(total_settlement_company));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                    calculateTotal();
                }
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

                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${val2.ARFNumber || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${val2.productCode + ' - ' + val2.productName}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${val2.UOM || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 40px;">${val2.currency || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">Expence Claim: Rp ${totalExpense || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">Return to the Company: Rp ${totalCompany || '-'}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        trigger = currencyTotal(totalExpenseClaim + totalAmountCompany);
        document.getElementById('TotalAdvanceDetail').textContent = currencyTotal(totalExpenseClaim + totalAmountCompany);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalExpenseClaim + totalAmountCompany);
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableAdvanceList tbody tr');

        rows.forEach(row => {
            const totalExpenseCell = row.children[11];
            const totalCompanyCell = row.children[14];
            const valueExpense = parseFloat(totalExpenseCell.innerText.replace(/,/g, '')) || 0;
            const valueCompany = parseFloat(totalCompanyCell.innerText.replace(/,/g, '')) || 0;
            total += valueExpense;
            total += valueCompany;
        });

        // document.getElementById('TotalAdvanceDetail').innerText = "0.00";
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
                    const targetARFNumber   = targetRow.children[7].innerText.trim();

                    if (targetARFNumber == arfNumber && targetProductCode == productCode) {
                        targetRow.children[11].innerText    = `Expence Claim: Rp ${totalExpense || '0.00'}`;
                        targetRow.children[12].innerText    = `Return to the Company: Rp ${totalCompany || '0.00'}`;
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
                                    expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                                    refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')) || 0,
                                    refundProductUnitPriceCurrency_RefID: parseInt(refundProductUnitPriceCurrency_RefID.value),
                                    refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                                    refundProductUnitPriceCurrencyExchangeRate: parseFloat(refundProductUnitPriceCurrencyExchangeRate.value),
                                    refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
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

                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${transNumber}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode + ' - ' + productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 40px;">${currency}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">Expence Claim: Rp ${totalExpense || '0.00'}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">Return to the Company: Rp ${totalCompany || '0.00'}</td>
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
                            expenseProductUnitPriceCurrencyExchangeRate: parseFloat(expenseProductUnitPriceCurrencyExchangeRate.value),
                            expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                            refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')) || 0,
                            refundProductUnitPriceCurrency_RefID: parseInt(refundProductUnitPriceCurrency_RefID.value),
                            refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')) || 0,
                            refundProductUnitPriceCurrencyExchangeRate: parseFloat(refundProductUnitPriceCurrencyExchangeRate.value),
                            refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                            remarks: null,
                            productCode: productCode
                        }
                    });
                }
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        document.getElementById('GrandTotal').textContent = totalsAdvanceDetail;
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
        document.getElementById('TotalAdvanceDetail').textContent = trigger;
    });

    function SubmitForm() {
        $('#advanceSettlementRevisionFormModal').modal('hide');

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
                    $("#submitAsf").prop("disabled", false);

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
                $("#submitAsf").prop("disabled", false);
                CancelNotif("You don't have access", '/AdvanceSettlement?var=1');
            }
        });
    }

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).on('load', function() {
        // const data = JSON.parse(dataTable.value);

        getDetailAdvanceSettlement(dataTable);
        getDocumentType("Advance Settlement Form");
    });
</script>