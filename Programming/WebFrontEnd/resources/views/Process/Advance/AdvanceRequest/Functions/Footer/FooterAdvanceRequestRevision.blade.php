<script>
    let dataStore           = [];
    let remark              = document.getElementById("remark");
    let budgetDetailsAdd    = document.getElementById("budget-details-add");
    const siteCode          = document.getElementById('site_id_second');
    const dataTable         = {!! json_encode($dataAdvanceList ?? []) !!};

    function validateQtyAndPriceWithHighlight() {
        let isValid                 = true;
        const rows                  = document.querySelectorAll("#tableGetBudgetDetails tbody tr");
        const budgetDetailsMessage  = document.getElementById("budgetDetailsMessage");

        if (budgetDetailsMessage) {
            budgetDetailsMessage.style.display = "none";
        }

        rows.forEach(row => {
            const qtyInput      = row.querySelector('input[id^="qty_req"]');
            const priceInput    = row.querySelector('input[id^="price_req"]');

            if (!qtyInput || !priceInput) return;

            const qty           = qtyInput.value.trim();
            const qtyDetail     = qtyInput.getAttribute("data-default");

            const price         = priceInput.value.trim();
            const priceDetail   = priceInput.getAttribute("data-default");

            const isQtyFilled   = qty !== "";
            const isPriceFilled = price !== "";

            qtyInput.style.border   = "1px solid #e9ecef";
            priceInput.style.border = "1px solid #e9ecef";

            if (
                (isQtyFilled && !isPriceFilled && qtyDetail && priceDetail) || 
                (!isQtyFilled && isPriceFilled && qtyDetail && priceDetail) || 
                (!isQtyFilled && !isPriceFilled && qtyDetail && priceDetail)
            ) {
                if (!isQtyFilled) {
                    qtyInput.style.border   = "1px solid red";
                }

                if (!isPriceFilled) {
                    priceInput.style.border = "1px solid red";
                }
                
                if (budgetDetailsMessage) {
                    budgetDetailsMessage.style.display = "block";
                }

                isValid = false;
            }
        });

        return isValid;
    }

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

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

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
            const input = totalCell.querySelector('input');

            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            if (input) {
                const text = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += text;
            }

            total += value;
        });

        total = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        // document.getElementById('TotalBudgetSelected').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[3].value}): ${total}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tableGetBudgetDetails').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableAdvanceList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordRefID                           = row.querySelector('input[id^="recordID"]');
            const productCode                           = row.querySelector('input[id^="productCode"]');
            const productRefID                          = row.querySelector('input[id^="product_RefID"]');
            const quantityUnitRefID                     = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID         = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const combinedBudgetSectionDetailRefID      = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');

            const qtyInput      = row.querySelector('input[id^="qty_req"]');
            const priceInput    = row.querySelector('input[id^="price_req"]');
            const totalInput    = row.querySelector('input[id^="total_req"]');
            const balanceInput  = row.querySelector('input[id^="balanced_qty"]');

            if (
                qtyInput && priceInput && totalInput && balanceInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== '' &&
                balanceInput.value.trim() !== ''
            ) {
                const productName = row.children[8].innerText.trim();
                const qtyAvail = row.children[10].innerText.trim();
                const uom = row.children[11].innerText.trim();
                const priceAvail = row.children[12].innerText.trim();
                const currency = row.children[14].innerText.trim();

                const price = priceInput.value.trim();
                const qty   = qtyInput.value.trim();
                const total = totalInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');
                for (let targetRow of existingRows) {
                    const targetRecordID    = targetRow.children[0].value.trim();
                    const targetProductCode = targetRow.children[4].innerText;
                    const targetProductName = targetRow.children[5].innerText;

                    if (targetRecordID == recordRefID.value && targetProductCode == productCode.value && targetProductName == productName) {
                        targetRow.children[7].innerText = price;
                        targetRow.children[8].innerText = qty;
                        targetRow.children[9].innerText = total;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value && item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseFloat(productUnitPriceCurrencyExchangeRate.value.replace(/,/g, '')),
                                    remarks: null
                                },
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" name="record_RefID[]" value="${recordRefID.value}">
                        <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                        <input type="hidden" name="price_avail[]" value="${priceAvail}">
                        <input type="hidden" name="currency[]" value="${currency}">
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productCode.value}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: parseInt(recordRefID.value) || null,
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                            product_RefID: parseInt(productRefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyExchangeRate: parseFloat(productUnitPriceCurrencyExchangeRate.value.replace(/,/g, '')),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            remarks: null
                        }
                    });
                }
            } else {
                const productName   = row.children[8].innerText.trim();
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[4]?.innerText?.trim();
                    const targetName = targetRow.children[5]?.innerText?.trim();

                    if (targetCode == productCode?.value && targetName == productName) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(
                        item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailRefID.value
                    );
                });
            }
        }
        
        updateGrandTotal();
    }

    function validationForm() {
        const isRemarkNotEmpty  = remark.value.trim() !== '';
        const isTableNotEmpty   = checkOneLineBudgetContents();
        const isInputNotEmpty   = validateQtyAndPriceWithHighlight();

        if (isRemarkNotEmpty && isTableNotEmpty && isInputNotEmpty) {
            $('#advanceRequestRevisionFormModal').modal('show');
            summaryData();
        } else {
            if (!isRemarkNotEmpty) {
                $("#remark").css("border", "1px solid red");
                $("#remarkMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#budgetDetailsMessage").show();
                return;
            }
        }
    }

    function getBudgetDetails(site_code, dataDetail) {
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

                    let findDataDetail = dataDetail.find(el => 
                        el.product_RefID == val2.product_RefID && 
                        el.productName == val2.productName);

                    let findDataMiscellaneous = dataDetail.find(el => 
                        el.combinedBudgetSubSectionLevel2_RefID == val2.combinedBudgetSubSectionLevel2_RefID && 
                        el.combinedBudgetSubSectionLevel2Name == val2.combinedBudgetSubSectionLevel2Name && 
                        el.product_RefID != val2.product_RefID && 
                        el.productName != val2.productName);

                    let productColumn = `
                        <input id="recordID${key}" value="-" type="hidden" />
                        <input id="productCode${key}" value="${val2.productCode}" type="hidden" />
                        <input id="product_RefID${key}" value="${val2.product_RefID}" type="hidden" />
                        <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                        <input id="productUnitPriceCurrency_RefID${key}" value="${val2.unitPriceCurrency_RefID}" type="hidden" />
                        <input id="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                        <input id="productUnitPriceCurrencyExchangeRate${key}" value="1" type="hidden" />

                        <td style="text-align: center;">${val2.productCode}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;

                    let componentsInput = `
                        <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" data-default="" ${isUnspecified} />
                        </td>
                        <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" data-default="" ${isUnspecified} />
                        </td>
                        <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;" data-default="" readonly />
                        </td>
                        <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;" data-default="${balanced}" value="${balanced}" readonly />
                        </td>
                    `;

                    if (!val2.product_RefID && !findDataMiscellaneous) {
                        isUnspecified = 'disabled';
                        balanced = '-';

                        productColumn = `
                            <input id="recordID${key}" value="-" type="hidden" />
                            <input id="productCode${key}" value="${val2.productCode}" type="hidden" />
                            <input id="product_RefID${key}" value="${val2.product_RefID}" type="hidden" />
                            <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                            <input id="productUnitPriceCurrency_RefID${key}" value="${val2.unitPriceCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                            <input id="productUnitPriceCurrencyExchangeRate${key}" value="1" type="hidden" />

                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly data-default="" />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name" data-default="${val2.productName}">${val2.productName}</td>
                        `;
                    } else if (!val2.product_RefID && findDataMiscellaneous) {
                        isUnspecified = 'disabled';
                        balanced = '-';

                        let balancedDetail = currencyTotal(val2.quantityRemaining);

                        productColumn = `
                            <input id="recordID${key}" value="${findDataMiscellaneous.sys_ID}" type="hidden" />
                            <input id="productCode${key}" value="${findDataMiscellaneous.productCode}" type="hidden" />
                            <input id="product_RefID${key}" value="${findDataMiscellaneous.product_RefID}" type="hidden" />
                            <input id="quantityUnit_RefID${key}" value="${findDataMiscellaneous.quantityUnit_RefID}" type="hidden" />
                            <input id="productUnitPriceCurrency_RefID${key}" value="${findDataMiscellaneous.productUnitPriceCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" value="${findDataMiscellaneous.combinedBudgetSectionDetail_RefID}" type="hidden" />
                            <input id="productUnitPriceCurrencyExchangeRate${key}" value="${findDataMiscellaneous.productUnitPriceCurrencyExchangeRate}" type="hidden" />

                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly data-default="${findDataMiscellaneous.productCode}" value="${findDataMiscellaneous.productCode}" />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name" data-default="${findDataMiscellaneous.productName}">${findDataMiscellaneous.productName}</td>
                        `;

                        componentsInput = `
                            <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" data-default="${currencyTotal(findDataMiscellaneous.quantity)}" value="${currencyTotal(findDataMiscellaneous.quantity)}" />
                            </td>
                            <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" data-default="${currencyTotal(findDataMiscellaneous.productUnitPriceCurrencyValue)}" value="${currencyTotal(findDataMiscellaneous.productUnitPriceCurrencyValue)}" />
                            </td>
                            <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;" readonly data-default="${currencyTotal(findDataMiscellaneous.priceCurrencyValue)}" value="${currencyTotal(findDataMiscellaneous.priceCurrencyValue)}" />
                            </td>
                            <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;" data-default="${currencyTotal(balancedDetail)}" value="${currencyTotal(balancedDetail)}" readonly />
                            </td>
                        `;
                    }

                    if (findDataDetail) {
                        let balancedDetail = currencyTotal(val2.quantityRemaining);

                        productColumn = `
                            <input id="recordID${key}" value="${findDataDetail.sys_ID}" type="hidden" />
                            <input id="productCode${key}" value="${findDataDetail.productCode}" type="hidden" />
                            <input id="product_RefID${key}" value="${findDataDetail.product_RefID}" type="hidden" />
                            <input id="quantityUnit_RefID${key}" value="${findDataDetail.quantityUnit_RefID}" type="hidden" />
                            <input id="productUnitPriceCurrency_RefID${key}" value="${findDataDetail.productUnitPriceCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" value="${findDataDetail.combinedBudgetSectionDetail_RefID}" type="hidden" />
                            <input id="productUnitPriceCurrencyExchangeRate${key}" value="${findDataDetail.productUnitPriceCurrencyExchangeRate}" type="hidden" />

                            <td style="text-align: center;">${val2.productCode}</td>
                            <td style="text-align: center;">${val2.productName}</td>
                        `;

                        componentsInput = `
                            <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" data-default="${currencyTotal(findDataDetail.quantity)}" value="${currencyTotal(findDataDetail.quantity)}" />
                            </td>
                            <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" data-default="${currencyTotal(findDataDetail.productUnitPriceCurrencyValue)}" value="${currencyTotal(findDataDetail.productUnitPriceCurrencyValue)}" />
                            </td>
                            <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;" readonly data-default="${currencyTotal(findDataDetail.priceCurrencyValue)}" value="${currencyTotal(findDataDetail.priceCurrencyValue)}" />
                            </td>
                            <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;" data-default="${currencyTotal(balancedDetail)}" value="${currencyTotal(balancedDetail)}" readonly />
                            </td>
                        `;
                    }

                    let row = `
                        <tr>
                            ${productColumn}
                            <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${currencyTotal(val2.quantityRemaining)}</td>
                            <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                            <td style="text-align: center;">${val2.priceBaseCurrencyISOCode || '-'}</td>
                            ${componentsInput}
                        </tr>
                    `;

                    tbody.append(row);

                    if (val2.productName === "Unspecified Product") {
                        $(`#product_id${key}`).on('input', function() {
                            if ($(this).val().trim() !== '') {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', false);
                            } else {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', true);
                            }
                        });

                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req     = $(this).val().replace(/,/g, '');
                            var price_req   = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req   = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total       = parseFloat(qty_req || 0) + parseFloat(balanced);

                            if (!qty_req) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                $(`#balanced_qty${key}`).val(currencyTotal(val2.quantityRemaining));
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }
                        });
                    } else {
                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req     = $(this).val().replace(/,/g, '');
                            var price_req   = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req   = parseFloat(qty_req || 0) * parseFloat(price_req || 0);
                            var default_req = $(this).data('default');
                            var default_total = $(`#total_req${key}`).data('default');
                            var total       = parseFloat(balanced) - parseFloat(qty_req || 0);
                            var validate    = findDataDetail && findDataDetail.quantity ? parseFloat((parseFloat(val2.quantityRemaining) + parseFloat(findDataDetail.quantity)).toFixed(2)) : val2.quantityRemaining;

                            if (parseFloat(qty_req) > validate) {
                                $(`#qty_req${key}`).val(default_req);
                                $(`#total_req${key}`).val(default_total);
                                $(`#balanced_qty${key}`).val(currencyTotal(val2.quantityRemaining));

                                ErrorNotif("Qty Req is over !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                $(`#balanced_qty${key}`).val(currencyTotal(val2.quantityRemaining));

                                ErrorNotif("Total Req is over !");
                            } else {
                                calculateTotal();
                                $(`#qty_req${key}`).css({"border": "1px solid #ced4da"});
                                $(`#budgetDetailsMessage`).css({"display": "none"});
                                $(`#total_req${key}`).val(currencyTotal(total_req));

                                if (Math.sign(total) == "-1") {
                                    $(`#balanced_qty${key}`).val(currencyTotal(0));
                                } else {
                                    if (findDataDetail && findDataDetail.quantity && !qty_req) {
                                        $(`#qty_req${key}`).css({"border": "1px solid red"});
                                        $(`#budgetDetailsMessage`).css({"display": "block"});
                                    } else {
                                        $(`#balanced_qty${key}`).val(total.toLocaleString('en-US', {
                                            minimumFractionDigits: 2,
                                            maximumFractionDigits: 2
                                        }));
    
                                        checkOneLineBudgetContents(key);
                                    }
                                }
                            }
                        });
                    }

                    $(`#price_req${key}`).on('keyup', function() {
                        var price_req   = $(this).val().replace(/,/g, '');
                        var qty_req     = $(`#qty_req${key}`).val().replace(/,/g, '');
                        var default_req = $(this).data('default');
                        var default_total = $(`#total_req${key}`).data('default');
                        var total_req   = parseFloat(qty_req || 0) * parseFloat(price_req || 0);
                        var total       = parseFloat(price_req || 0) + parseFloat(val2.priceBaseCurrencyValue);

                        if (findDataDetail && findDataDetail.productUnitPriceCurrencyValue && !price_req) {
                            $(`#price_req${key}`).css({"border": "1px solid red"});
                            $(`#budgetDetailsMessage`).css({"display": "block"});
                        } else {
                            if (parseFloat(price_req) > val2.priceBaseCurrencyValue) {
                                $(`#price_req${key}`).val(default_req);
                                $(`#total_req${key}`).val(default_total);

                                ErrorNotif("Price Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#price_req${key}`).val('');
                                $(`#total_req${key}`).val('');

                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                checkOneLineBudgetContents(key);
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }
                        }
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

    function GetARFNumberDetail(dataDetail) {
        let totalARFNumberDetail = 0;

        let tbodyList = $('#tableAdvanceList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            dataStore.push({
                recordID: parseInt(val2.sys_ID),
                entities: {
                    combinedBudgetSectionDetail_RefID: parseInt(val2.combinedBudgetSectionDetail_RefID),
                    product_RefID: parseInt(val2.product_RefID),
                    quantity: val2.quantity,
                    quantityUnit_RefID: parseInt(val2.quantityUnit_RefID),
                    productUnitPriceCurrency_RefID: parseInt(val2.productUnitPriceCurrency_RefID),
                    productUnitPriceCurrencyExchangeRate: val2.productUnitPriceCurrencyExchangeRate,
                    productUnitPriceCurrencyValue: val2.productUnitPriceCurrencyValue,
                    remarks: null
                }
            });

            let totalRequest = val2.quantity * val2.productUnitPriceCurrencyValue;

            let rowList = `
                <tr>
                    <input type="hidden" name="record_RefID[]" value="${val2.sys_ID}">
                    <input type="hidden" name="qty_avail[]" value="${currencyTotal(val2.quantity)}">
                    <input type="hidden" name="price_avail[]" value="${currencyTotal(val2.productUnitPriceCurrencyValue)}">
                    <input type="hidden" name="currency[]" value="${val2.priceCurrencyISOCode}">
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${val2.productCode}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">${val2.productName}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${val2.quantityUnitName}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${currencyTotal(val2.productUnitPriceCurrencyValue)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${currencyTotal(val2.quantity)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${currencyTotal(totalRequest)}</td>
                </tr>
            `;

            tbodyList.append(rowList);

            totalARFNumberDetail += totalRequest;
        });

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(totalARFNumberDetail);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalARFNumberDetail);
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
                RevisionAdvanceRequest({...formatData, comment: result.value});
            }
        });
    }

    function RevisionAdvanceRequest(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("AdvanceRequest.UpdatesAdvanceRequest") }}',
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
                        cancelForm("{{ route('AdvanceRequest.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                HideLoading();
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function SubmitForm() {
        $('#advanceRequestRevisionFormModal').modal('hide');

        var action = $('#FormUpdateAdvance').attr("action");
        var method = $('#FormUpdateAdvance').attr("method");
        var form_data = new FormData($('#FormUpdateAdvance')[0]);
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
                    CancelNotif("You don't have access", "{{ route('AdvanceRequest.index', ['var' => 1]) }}");
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
                console.log('error', response);

                HideLoading();
                CancelNotif("You don't have access", "{{ route('AdvanceRequest.index', ['var' => 1]) }}");
            }
        });
    }

    $('#remark').on('input', function(e) {
        e.preventDefault();

        $("#remark").css("border", "1px solid #ced4da");
        $("#remarkMessage").hide();
    });

    $(window).one('load', function(e) {
        GetARFNumberDetail(dataTable);
        getBudgetDetails(siteCode.value, dataTable);

        getDocumentType("Advance Settlement Form");
    });
</script>