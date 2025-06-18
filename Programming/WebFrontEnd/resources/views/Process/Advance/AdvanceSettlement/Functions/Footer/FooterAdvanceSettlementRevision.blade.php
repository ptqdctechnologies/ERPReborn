<script>
    let dataStore           = [];
    let totalAdvanceDetail  = 0;
    let trigger             = 0;
    const dataTable         = document.getElementById('data_table');

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

            let totalRequest = val2.quantity * val2.productUnitPriceCurrencyValue;
            let totalExpense = val2.expenseQuantity * val2.expenseProductUnitPriceCurrencyValue;
            let totalCompany = val2.refundQuantity * val2.refundProductUnitPriceCurrencyValue;
            let balanced = (totalRequest - totalExpense) + totalCompany;

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
                var qty_settlement = $(this).val().replace(/,/g, '');
                var data_index = $(this).data('index');
                var data_total_request = $(this).data('total-request');
                var price_settlement = $(`#price_settlement${data_index}`).val();
                var total_settlements = parseFloat(qty_settlement || 0) * parseFloat(price_settlement.replace(/,/g, '') || 0);
                var countBalance = data_total_request - total_settlements;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (parseFloat(qty_settlement) > val2.quantity) {
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

            $(`#price_settlement${key}`).on('keyup', function() {
                var price_settlement = $(this).val().replace(/,/g, '');
                var data_index = $(this).data('index');
                var data_total_request = $(this).data('total-request');
                var qty_settlement = $(`#qty_settlement${data_index}`).val();
                var total_settlements = parseFloat(qty_settlement.replace(/,/g, '') || 0) * parseFloat(price_settlement || 0);
                var countBalance = data_total_request - total_settlements;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (parseFloat(price_settlement) > val2.productUnitPriceCurrencyValue) {
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

            $(`#qty_settlement_company${key}`).on('keyup', function() {
                var qty_settlement_company = $(this).val().replace(/,/g, '');
                var data_index = $(this).data('index');
                var data_total_request = $(this).data('total-request');
                var price_settlement_company = $(`#price_settlement_company${data_index}`).val();
                var total_settlement_company = parseFloat(qty_settlement_company || 0) * parseFloat(price_settlement_company.replace(/,/g, '') || 0);
                var countBalance = data_total_request - total_settlement_company;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (parseFloat(qty_settlement_company) > val2.quantity) {
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

            $(`#price_settlement_company${key}`).on('keyup', function() {
                var price_settlement_company = $(this).val().replace(/,/g, '');
                var data_index = $(this).data('index');
                var data_total_request = $(this).data('total-request');
                var qty_settlement_company = $(`#qty_settlement_company${data_index}`).val();
                var total_settlement_company = parseFloat(qty_settlement_company.replace(/,/g, '') || 0) * parseFloat(price_settlement_company || 0);
                var countBalance = data_total_request - total_settlement_company;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (parseFloat(price_settlement_company) > val2.productUnitPriceCurrencyValue) {
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

            let rowList = `
                <tr>
                    <input type="hidden" name="qty_expense_avail[]" value="${val2.expenseQuantity}">
                    <input type="hidden" name="price_expense_avail[]" value="${val2.expenseProductUnitPriceCurrencyValue}">
                    <input type="hidden" name="qty_company_avail[]" value="${val2.refundQuantity}">
                    <input type="hidden" name="price_company_avail[]" value="${val2.refundProductUnitPriceCurrencyValue}">
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.UOM || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.currency || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.expenseQuantity || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.expenseProductUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(totalExpense || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.refundQuantity || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.refundProductUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(totalCompany || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(balanced || 0)}</td>
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
            const totalExpenseCell = row.children[10];
            const totalCompanyCell = row.children[13];
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
            RevisionAdvanceSettlementStore({...formatData, comment: result.value});
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
            const balanceInput                                  = row.querySelector('input[id^="balance"]');

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
                const productCode   = row.children[8].innerText.trim();
                const productName   = row.children[9].innerText.trim();
                const uom           = row.children[10].innerText.trim();
                const currency      = row.children[11].innerText.trim();
                const qtyAvail      = row.children[12].innerText.trim();
                const priceAvail    = row.children[13].innerText.trim();

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
                    const targetProductCode = targetRow.children[4].innerText.trim();
                    const targetProductName = targetRow.children[5].innerText.trim();

                    if (targetProductCode == productCode) {
                        targetRow.children[8].innerText     = qtyExpense || '-';
                        targetRow.children[9].innerText     = priceExpense || '-';
                        targetRow.children[10].innerText     = totalExpense || '-';
                        targetRow.children[11].innerText     = qtyCompany || '-';
                        targetRow.children[12].innerText     = priceCompany || '-';
                        targetRow.children[13].innerText     = totalCompany || '-';
                        targetRow.children[14].innerText    = balance;
                        found = true;

                        // update dataStore
                        const indexToUpdate = dataStore.findIndex(item => item.entities.productCode == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                advanceSettlement_RefID: advanceSettlement_RefID.value,
                                recordID: parseInt(advanceDetail_RefID.value),
                                entities: {
                                    expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')),
                                    expenseProductUnitPriceCurrency_RefID: parseInt(expenseProductUnitPriceCurrency_RefID.value),
                                    expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                                    expenseProductUnitPriceCurrencyExchangeRate: parseFloat(expenseProductUnitPriceCurrencyExchangeRate.value),
                                    expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                                    refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')),
                                    refundProductUnitPriceCurrency_RefID: parseInt(refundProductUnitPriceCurrency_RefID.value),
                                    refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
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
                        <input type="hidden" name="qty_expense_avail[]" value="${qtyAvail}">
                        <input type="hidden" name="price_expense_avail[]" value="${priceAvail}">
                        <input type="hidden" name="qty_company_avail[]" value="${qtyAvail}">
                        <input type="hidden" name="price_company_avail[]" value="${priceAvail}">
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
                        <td style="text-align: center;padding: 0.8rem;">${balance}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        advanceSettlement_RefID: advanceSettlement_RefID.value,
                        recordID: parseInt(advanceDetail_RefID.value),
                        entities: {
                            expenseQuantity: parseFloat(qtyExpense.replace(/,/g, '')),
                            expenseProductUnitPriceCurrency_RefID: parseInt(expenseProductUnitPriceCurrency_RefID.value),
                            expenseProductUnitPriceCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                            expenseProductUnitPriceCurrencyExchangeRate: parseFloat(expenseProductUnitPriceCurrencyExchangeRate.value),
                            expenseProductUnitPriceBaseCurrencyValue: parseFloat(priceExpense.replace(/,/g, '')),
                            refundQuantity: parseFloat(qtyCompany.replace(/,/g, '')),
                            refundProductUnitPriceCurrency_RefID: parseInt(refundProductUnitPriceCurrency_RefID.value),
                            refundProductUnitPriceCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                            refundProductUnitPriceCurrencyExchangeRate: parseFloat(refundProductUnitPriceCurrencyExchangeRate.value),
                            refundProductUnitPriceBaseCurrencyValue: parseFloat(priceCompany.replace(/,/g, '')),
                            remarks: null,
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
        $("#advanceSettlementDetail").val(JSON.stringify(dataStore));

        document.getElementById('GrandTotal').textContent = totalsAdvanceDetail;
        document.getElementById('TotalAdvanceDetail').textContent = "0.00";
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
        $('#advanceSettlementDetail').val("");
        dataStore = [];

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalAdvanceDetail').textContent = trigger;
    });

    $("#FormRevisionAdvanceSettlement").on("submit", function(e) {
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
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/AdvanceSettlement?var=1');
            }
        });
    });

    document.querySelector('#tableAdvanceList tbody').addEventListener('click', function (e) {
        const row = e.target.closest('tr');
        if (!row) return;

        if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;

        const qtyExpenseAvail      = row.children[0];
        const priceExpenseAvail    = row.children[1];
        const qtyCompanyAvail      = row.children[2];
        const priceCompanyAvail    = row.children[3];

        const qtyExpenseReq    = row.children[8];
        const priceExpenseReq  = row.children[9];
        const totalExpenseReq  = row.children[10];
        const qtyCompanyReq    = row.children[11];
        const priceCompanyReq  = row.children[12];
        const totalCompanyReq  = row.children[13];

        if (row.classList.contains('editing-row')) {
            const newQtyExpenseReq     = qtyExpenseReq.querySelector('input')?.value || '';
            const newPriceExpenseReq   = priceExpenseReq.querySelector('input')?.value || '';
            const newTotalExpenseReq   = totalExpenseReq.querySelector('input')?.value || '';
            const newQtyCompanyReq     = qtyCompanyReq.querySelector('input')?.value || '';
            const newPriceCompanyReq   = priceCompanyReq.querySelector('input')?.value || '';
            const newTotalCompanyReq   = totalCompanyReq.querySelector('input')?.value || '';

            qtyExpenseReq.innerHTML    = newQtyExpenseReq;
            priceExpenseReq.innerHTML  = newPriceExpenseReq;
            totalExpenseReq.innerHTML  = newTotalExpenseReq;
            qtyCompanyReq.innerHTML    = newQtyCompanyReq;
            priceCompanyReq.innerHTML  = newPriceCompanyReq;
            totalCompanyReq.innerHTML  = newTotalCompanyReq;

            row.classList.remove('editing-row');

            const productCode = row.children[4].innerText.trim();
            const storeItem = dataStore.find(item => item.entities.productCode == productCode);
            if (storeItem) {
                storeItem.entities.expenseQuantity                      = parseFloat(newQtyExpenseReq.replace(/,/g, ''));
                storeItem.entities.expenseProductUnitPriceCurrencyValue = parseFloat(newPriceExpenseReq.replace(/,/g, ''));
                storeItem.entities.refundQuantity                       = parseFloat(newQtyCompanyReq.replace(/,/g, ''));
                storeItem.entities.refundProductUnitPriceCurrencyValue  = parseFloat(newPriceCompanyReq.replace(/,/g, ''));

                $("#advanceSettlementDetail").val(JSON.stringify(dataStore));
            }
        } else {
            const currentQtyExpense     = qtyExpenseReq.innerText.trim();
            const currentPriceExpense   = priceExpenseReq.innerText.trim();
            const currentTotalExpense   = totalExpenseReq.innerText.trim();
            const currentQtyCompany     = qtyCompanyReq.innerText.trim();
            const currentPriceCompany   = priceCompanyReq.innerText.trim();
            const currentTotalCompany   = totalCompanyReq.innerText.trim();

            qtyExpenseReq.innerHTML = `<input class="form-control number-without-negative qty-expense-input" value="${currentQtyExpense}" autocomplete="off" style="border-radius:0px;width:100px;">`;
            priceExpenseReq.innerHTML = `<input class="form-control number-without-negative price-expense-input" value="${currentPriceExpense}" autocomplete="off" style="border-radius:0px;width:100px;">`;
            totalExpenseReq.innerHTML = `<input class="form-control number-without-negative total-expense-input" value="${currentTotalExpense}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;
            qtyCompanyReq.innerHTML = `<input class="form-control number-without-negative qty-company-input" value="${currentQtyCompany}" autocomplete="off" style="border-radius:0px;width:100px;">`;
            priceCompanyReq.innerHTML = `<input class="form-control number-without-negative price-company-input" value="${currentPriceCompany}" autocomplete="off" style="border-radius:0px;width:100px;">`;
            totalCompanyReq.innerHTML = `<input class="form-control number-without-negative total-company-input" value="${currentTotalCompany}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;

            row.classList.add('editing-row');

            const qtyExpenseInput   = qtyExpenseReq.querySelector('.qty-expense-input');
            const priceExpenseInput = priceExpenseReq.querySelector('.price-expense-input');
            const totalExpenseInput = totalExpenseReq.querySelector('.total-expense-input');
            const qtyCompanyInput   = qtyCompanyReq.querySelector('.qty-company-input');
            const priceCompanyInput = priceCompanyReq.querySelector('.price-company-input');
            const totalCompanyInput = totalCompanyReq.querySelector('.total-company-input');

            function updateTotalExpenseClaim() {
                var price   = parseFloat(priceExpenseInput.value.replace(/,/g, '')) || 0;
                var qty     = parseFloat(qtyExpenseInput.value.replace(/,/g, '')) || 0;
                var total   = price * qty;

                const qtyAvailValue     = parseFloat(qtyExpenseAvail?.value.replace(/,/g, '')) || 0;
                const priceAvailValue   = parseFloat(priceExpenseAvail?.value.replace(/,/g, '')) || 0;

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

                const qtyAvailValue     = parseFloat(qtyCompanyAvail?.value.replace(/,/g, '')) || 0;
                const priceAvailValue   = parseFloat(priceCompanyAvail?.value.replace(/,/g, '')) || 0;

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

            document.getElementById('GrandTotal').innerText = parseFloat(totalCompanyInput?.value.replace(/,/g, '')) + parseFloat(totalExpenseInput?.value.replace(/,/g, ''));
        }
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).on('load', function() {
        const data = JSON.parse(dataTable.value);

        getDetailAdvanceSettlement(data);
        getDocumentType("Advance Settlement Form");
    });
</script>