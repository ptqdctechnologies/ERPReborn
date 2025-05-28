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

            let qtyRequest = val2.expenseQuantity + val2.refundQuantity;
            let priceRequest = val2.expenseProductUnitPriceCurrencyValue + val2.refundProductUnitPriceCurrencyValue;
            let totalRequest = qtyRequest * priceRequest;
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
                    <td style="text-align: center;border:1px solid #e9ecef;">${'-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${'-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(qtyRequest) || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(priceRequest) || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(totalRequest) || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
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

                if (qty_settlement > qtyRequest) {
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

                if (price_settlement > priceRequest) {
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

                if (qty_settlement_company > qtyRequest) {
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

                if (price_settlement_company > priceRequest) {
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
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${'-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${'-'}</td>
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
            // const expenseProductUnitPriceBaseCurrencyValue      = row.querySelector('input[id^="expenseProductUnitPriceBaseCurrencyValue"]');
            const refundProductUnitPriceCurrency_RefID          = row.querySelector('input[id^="refundProductUnitPriceCurrency_RefID"]');
            const refundProductUnitPriceCurrencyExchangeRate    = row.querySelector('input[id^="refundProductUnitPriceCurrencyExchangeRate"]');
            // const refundProductUnitPriceBaseCurrencyValue       = row.querySelector('input[id^="refundProductUnitPriceBaseCurrencyValue"]');
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
                    const targetProductCode = targetRow.children[0].innerText.trim();

                    if (targetProductCode === productCode) {
                        targetRow.children[4].innerText     = qtyExpense || '-';
                        targetRow.children[5].innerText     = priceExpense || '-';
                        targetRow.children[6].innerText     = totalExpense || '-';
                        targetRow.children[7].innerText     = qtyCompany || '-';
                        targetRow.children[8].innerText     = priceCompany || '-';
                        targetRow.children[9].innerText     = totalCompany || '-';
                        targetRow.children[10].innerText    = balance;
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
                        <input type="hidden" id="qty_avail[]" value="${qtyAvail}">
                        <input type="hidden" id="price_avail[]" value="${priceAvail}">
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

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).on('load', function() {
        const data = JSON.parse(dataTable.value);

        getDetailAdvanceSettlement(data);
        getDocumentType("Advance Settlement Form");
    });
</script>