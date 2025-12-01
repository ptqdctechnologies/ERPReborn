<script>
    let totalTaxBased                   = 0;
    let totalVAT                        = 0;
    let totalWHT                        = 0;
    let totalDeduction                  = {!! json_encode($header['deduction'] ?? []) !!};;
    let currentIndexPickCOA             = null;
    let dataStore                       = [];
    const supplierInvoiceNumber         = document.getElementById("supplier_invoice_number");
    const paymentTransferNumber         = document.getElementById("payment_transfer_number");
    const valueVAT                      = document.getElementById('ppn');
    const valueVATNumber                = document.getElementById('vat_number');
    const categoryNumber                = document.getElementById('category_number');
    const depreciationMethod            = document.getElementById('depreciation_method');
    const depreciationRatePercentage    = document.getElementById('depreciation_rate_percentage');
    const depreciationRateYears         = document.getElementById('depreciation_rate_years');
    const depreciationCOANumber         = document.getElementById('depreciation_coa_number');
    const deductionValue                = document.getElementById('budget_details_deduction');
    const accountPayableID              = {!! json_encode($header['accountPayable_RefID'] ?? []) !!};
    const vatValueOrigin                = {!! json_encode($header['VATPercentage'] ?? []) !!};
    const paymentTransferID             = document.getElementById('payment_transfer_id');
    const defaultValueVAT               = document.getElementById('ppnValue');
    const depreciationMethodIDs         = document.getElementById('depreciation_method_id');
    const categoryID                    = document.getElementById('category_id');

    function calculateGrandTotal() {
        let result = (
            (parseFloat(totalTaxBased)   || 0) +
            (parseFloat(totalVAT)        || 0)
        ) - (
            (parseFloat(totalWHT)        || 0) +
            (parseFloat(totalDeduction)  || 0)
        );

        $("#invoice_details_grand_total").text(`Grand Total: ${decimalFormat(result)}`);
    }

    function getDepreciationMethod() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDepreciationMethod") !!}',
            success: function(data) {
                $('#containerLoadingDepreciationMethod').hide();

                if (data && Array.isArray(data)) {
                    $('#containerDepreciationMethod').show();

                    $('#depreciation_method').empty();
                    $('#depreciation_method').append('<option disabled selected value="Select a Method">Select a Method</option>');

                    data.forEach(function(val) {
                        let isSelected = val.sys_ID == depreciationMethodIDs.value ? ' selected ' : ' ';
                        $('#depreciation_method').append('<option' + isSelected + 'value="' + val.sys_ID + '">' + val.name + '</option>');
                    });
                } else {
                    console.log('Data depreciation method not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getDepreciationMethod error: ', textStatus, errorThrown);
            }
        });
    }

    function getDepreciationRateYears(categoryID, depreciationMethodID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDepreciationRateYears") !!}?assetCategoryRef_ID=' + categoryID + '&depreciationMethodRef_ID=' + depreciationMethodID,
            success: function(data) {
                if (data && Array.isArray(data)) {
                    depreciationRateYearsIDValue = data[0]?.sys_ID;
                    depreciationRateValue = data[0]?.rate;
                    depreciationYearsValue = data[0]?.period;

                    $('#depreciation_rate_years_id').val(data[0]?.sys_ID);
                    $("#depreciation_rate_percentage").removeAttr("readonly");
                    $('#depreciation_rate_percentage').val(data[0]?.rate);
                    $("#depreciation_rate_years").removeAttr("readonly");
                    $('#depreciation_rate_years').val(data[0]?.period);

                    $("#containerDepreciationRate").show();
                    $("#containerLoadingDepreciationRate").hide();
                } else {
                    console.log('Data depreciation rate years not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getDepreciationRateYears error: ', textStatus, errorThrown);
            }
        });
    }

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#invoice_details_table tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty   = document.getElementById(`qty_ap${index}`)?.value.trim();
            const wht   = document.getElementById(`wht${index}`)?.value.trim();
            const coa   = document.getElementById(`coa_name${index}`)?.value.trim();

            if (qty !== "" && wht !== "" && coa !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const qtyEl = document.getElementById(`qty_ap${index}`);
            const whtEl = document.getElementById(`wht${index}`);
            const coaEl = document.getElementById(`coa_name${index}`);

            if (hasFullRow) {
                $(qtyEl).css("border", "1px solid #ced4da");
                $(whtEl).css("border", "1px solid #ced4da");
                $(coaEl).css("border", "1px solid #ced4da");
                $("#invoice_details_message").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || whtEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(whtEl).css("border", "1px solid red");
                            $(coaEl).css("border", "1px solid red");
                            $("#invoice_details_message").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(whtEl).css("border", "1px solid #ced4da");
                            $(coaEl).css("border", "1px solid #ced4da");
                            $("#invoice_details_message").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && whtEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(whtEl).css("border", "1px solid #ced4da");
                        $(coaEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(qtyEl).css("border", "1px solid red");
                    $(whtEl).css("border", "1px solid red");
                    $(coaEl).css("border", "1px solid red");
                    $("#invoice_details_message").show();
                }
            }
        });

        return hasFullRow;
    }

    function assetValue(params) {
        if (params.value == "no") {
            $(".asset-components").css("display", "none");
        } else {
            $(".asset-components").css("display", "flex");
        }

        $("#category_number").val("");
        $("#category_id").val("");
        $("#depreciation_rate_percentage").val("");
        $("#depreciation_rate_years").val("");
        $("#depreciation_coa_number").val("");
        $("#depreciation_coa_id").val("");
        $("#depreciation_method").val("Select a Method");
        calculateGrandTotal();
    }

    function vatValue(params) {
        if (params.value == "no") {
            $(".vat-components").css("display", "none");
            $("#invoice_details_total_vat").text(`Total VAT: 0.00`);
            calculateGrandTotal();
        } else {
            $(".vat-components").css("display", "flex");
        }

        $("#ppn").val("Sel..");
        $("#vat_number").val("");
    }

    function onChangeVAT(params) {
        totalVAT = (totalTaxBased * params.value) / 100;
        $("#ppn").css("border", "1px solid #ced4da");
        document.getElementById('invoice_details_total_vat').textContent = `Total VAT: ${decimalFormat((totalTaxBased * params.value) / 100)}`;
        calculateGrandTotal();
    }

    function getVAT() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function(data) {
                if (data && Array.isArray(data)) {
                    $('#ppn').empty();
                    $('#ppn').append('<option disabled selected value="Sel..">Sel..</option>');

                    data.forEach(function(project) {
                        let isSelected = project.tariffFixRate == defaultValueVAT.value ? ' selected ' : ' ';
                        $('#ppn').append('<option' + isSelected + 'value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getVAT error: ', textStatus, errorThrown);
            }
        });
    }

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function calculateTotal() {
        let total = 0;
        let valueVatFix = isNaN(valueVAT.value) ? 0 : valueVAT.value;
        
        document.querySelectorAll('input[id^="total_ap"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        totalTaxBased = total;
        totalVAT = (total * valueVatFix) / 100;
        
        document.getElementById('invoice_details_total').textContent = `Total Tax Based: ${decimalFormat(total)}`;
        document.getElementById('invoice_details_total_vat').textContent = `Total VAT: ${decimalFormat(totalVAT)}`;
    }

    function getAccountPayableDetails() {
        const dataTable = {!! json_encode($detail ?? []) !!};

        $.each(dataTable, function(key, val) {
            totalTaxBased += (val.quantity ?? 0) * (val.purchaseOrderDetailPrice ?? 0);
            totalWHT += ((val.wht ?? 0) * totalTaxBased) / 100;

            dataStore.push({
                recordID: parseInt(val.sys_ID),
                entities: {
                    combinedBudgetSectionDetail_RefID: parseInt(val.combinedBudgetSectionDetail_RefID),
                    chartOfAccount_RefID: parseInt(val.chartOfAccount_RefID),
                    product_RefID: parseInt(val.product_RefID),
                    quantityUnit_RefID: parseInt(val.quantityUnit_RefID),
                    quantity: parseFloat(val.quantity.replace(/,/g, '')),
                    productUnitPriceCurrency_RefID: parseInt(val.productUnitPriceCurrency_RefID),
                    productUnitPriceCurrencyValue: parseFloat(val.productUnitPriceCurrencyValue.replace(/,/g, '')),
                    productUnitPriceCurrencyExchangeRate: parseFloat(val.productUnitPriceBaseCurrencyValue.replace(/,/g, '')),
                    wht: parseFloat(val.wht.replace(/,/g, '')),
                    purchaseOrderDetail_RefID: parseInt(val.purchaseOrderDetail_RefID)
                }
            });

            let total = (val.purchaseOrderDetailQuantity ?? 0) * (val.purchaseOrderDetailPrice ?? 0);
            let row = `
                <tr>
                    <input type="hidden" id="record_RefID${key}" value="${val.sys_ID}" />
                    <input type="hidden" id="combinedBudgetSectionDetail_RefID${key}" value="${val.combinedBudgetSectionDetail_RefID}" />
                    <input type="hidden" id="product_RefID${key}" value="${val.product_RefID}" />
                    <input type="hidden" id="quantityUnit_RefID${key}" value="${val.quantityUnit_RefID}" />
                    <input type="hidden" id="productUnitPriceCurrency_RefID${key}" value="${val.productUnitPriceCurrency_RefID}" />
                    <input type="hidden" id="productUnitPriceCurrencyExchangeRate${key}" value="${val.productUnitPriceBaseCurrencyValue}" />
                    <input type="hidden" id="purchaseOrderDetail_RefID${key}" value="${val.purchaseOrderDetail_RefID}" />

                    <td style="text-align: center;">${val.productCode ?? ''} - ${val.productName ?? ''}</td>
                    <td style="text-align: center;">${currencyTotal(val.purchaseOrderDetailQuantity ?? 0)}</td>
                    <td style="text-align: center;">${currencyTotal(val.potoAPQuantityAvail ?? 0)}</td>
                    <td style="text-align: center;">${currencyTotal(val.purchaseOrderDetailPrice ?? 0)}</td>
                    <td style="text-align: center;">${val.uom ?? '-'}</td>
                    <td style="text-align: center;">${currencyTotal(total)}</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input id="qty_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" value="${decimalFormat(parseFloat(val.quantity))}" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input id="total_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" value="${decimalFormat(parseFloat(val.productUnitPriceCurrencyValue))}" readonly />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input id="wht${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" value="${decimalFormat(parseFloat(val.wht))}" />
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                    <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${key})">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                </span>
                            </div>
                            <input id="coa_id${key}" style="border-radius:0;width:130px;" class="form-control" value="${val.chartOfAccount_RefID}" hidden />
                            <input id="coa_name${key}" style="border-radius:0;width:130px;" class="form-control" value="${val.chartOfAccountCode} - ${val.chartOfAccountName}" readonly />
                        </div>
                    </td>
                </tr>
            `;

            $('#invoice_details_table tbody').append(row);

            $(`#qty_ap${key}`).on('keyup', function() {
                let qty_ap      = $(this).val().replace(/,/g, '');
                let wht_ap      = $(`#wht${key}`).val().replace(/,/g, '');
                let total_ap    = parseFloat(qty_ap || 0) * val.purchaseOrderDetailPrice;

                if (parseFloat(qty_ap) > val.qtyAvail) {
                    $(this).val("");
                    ErrorNotif("Qty AP is over!");
                } else {
                    $(`#total_ap${key}`).val(currencyTotal(total_ap));

                    if (wht_ap) {
                        let result = (total_ap * wht_ap) / 100;
                        totalWHT = result;

                        document.getElementById('invoice_details_total_wht').textContent = `Total WHT: ${currencyTotal(result)}`;
                    }
                    
                }

                calculateTotal();
                calculateGrandTotal();
            });

            $(`#wht${key}`).on('input', function () {
                let val         = this.value.replace(/[^\d]/g, '');
                let total_ap    = $(`#total_ap${key}`).val().replace(/,/g, '');

                if (parseInt(val) > 100) {
                    $(this).val("");
                    document.getElementById('invoice_details_total_wht').textContent = "Total WHT: 0.00";
                    ErrorNotif("WHT is over!");
                } else {
                    if (total_ap && total_ap != "0.00") {
                        let result = (val * total_ap) / 100;
                        totalWHT = result;

                        document.getElementById('invoice_details_total_wht').textContent = `Total WHT: ${currencyTotal(result)}`;
                    }
                }

                calculateGrandTotal();
            });

            let rowList = `
                <tr>
                    <input type="hidden" id="target_record_id[]" value="${val.sys_ID}" />
                    <input type="hidden" id="target_purchase_order_detail_id[]" value="${val.purchaseOrderDetail_RefID}" />

                    <td style="text-align: left;padding: 0.8rem 0.5rem;">${val.productCode} - ${val.productName}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${val.uom}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(val.quantity)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(val.productUnitPriceCurrencyValue)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(val.wht)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${val.chartOfAccountCode} - ${val.chartOfAccountName}</td>
                </tr>
            `;

            $('#account_payable_details_table tbody').append(rowList);
        });

        totalVAT = (totalTaxBased * vatValueOrigin) / 100;

        $('#invoice_details_total').text(`Total Tax Based: ${currencyTotal(totalTaxBased)}`);
        $('#invoice_details_total_vat').text(`Total VAT: ${currencyTotal(totalVAT)}`);
        $('#invoice_details_total_wht').text(`Total WHT: ${currencyTotal(totalWHT)}`);
        $('#invoice_details_total_deduction').text(`Total Deduction: ${currencyTotal(totalDeduction)}`);

        calculateGrandTotal();
    }

    function summaryData() {
        const sourceTable = document.getElementById('invoice_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('account_payable_details_table').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordRefID                           = row.querySelector('input[id^="record_RefID"]');
            const combinedBudgetSectionDetailRefID      = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const productRefID                          = row.querySelector('input[id^="product_RefID"]');
            const quantityUnitRefID                     = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID         = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');
            const purchaseOrderDetailRefID              = row.querySelector('input[id^="purchaseOrderDetail_RefID"]');
            const qtyInput                              = row.querySelector('input[id^="qty_ap"]');
            const totalInput                            = row.querySelector('input[id^="total_ap"]');
            const whtInput                              = row.querySelector('input[id^="wht"]');
            const coaRefID                              = row.querySelector('input[id^="coa_id"]');
            const coaInput                              = row.querySelector('input[id^="coa_name"]');

            if (
                qtyInput && whtInput && coaRefID && 
                qtyInput.value.trim() !== '' &&
                whtInput.value.trim() !== '' &&
                coaRefID.value.trim() !== ''
            ) {
                const product   = row.children[7].innerText.trim();
                const uom       = row.children[11].innerText.trim();

                const qtyValue      = qtyInput.value.trim();
                const totalValue    = totalInput.value.trim();
                const whtValue      = whtInput.value.trim();
                const coaValue      = coaInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordRefID                 = targetRow.children[0]?.value?.trim();
                    const targetPurchaseOrderDetailRefID    = targetRow.children[1]?.value?.trim();

                    if (targetRecordRefID == recordRefID.value && targetPurchaseOrderDetailRefID == purchaseOrderDetailRefID.value) {
                        targetRow.children[4].innerText = decimalFormat(qtyValue);
                        targetRow.children[5].innerText = decimalFormat(totalValue);
                        targetRow.children[6].innerText = decimalFormat(whtValue);
                        targetRow.children[7].innerText = coaValue;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value && item.entities.purchaseOrderDetail_RefID == purchaseOrderDetailRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                                    chartOfAccount_RefID: parseInt(coaRefID.value),
                                    product_RefID: parseInt(productRefID.value),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    quantity: parseFloat(qtyValue.replace(/,/g, '')),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(totalValue.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                                    wht: parseFloat(whtValue.replace(/,/g, '')),
                                    purchaseOrderDetail_RefID: parseInt(purchaseOrderDetailRefID.value),
                                }
                            }
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="target_record_id[]" value="${recordRefID.value}" />
                        <input type="hidden" id="target_purchase_order_detail_id[]" value="${purchaseOrderDetailRefID.value}" />

                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${product}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(qtyValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(totalValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(whtValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${coaValue}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: parseInt(recordRefID.value),
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                            chartOfAccount_RefID: parseInt(coaRefID.value),
                            product_RefID: parseInt(productRefID.value),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            quantity: parseFloat(qtyValue.replace(/,/g, '')),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyValue: parseFloat(totalValue.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            wht: parseFloat(whtValue.replace(/,/g, '')),
                            purchaseOrderDetail_RefID: parseInt(purchaseOrderDetailRefID.value),
                        }
                    });
                }
            }
        }
    }

    function validationForm() {
        let isValid                                 = true;
        const isSupplierInvoiceNumberNotEmpty       = supplierInvoiceNumber.value.trim() !== '';
        const isPaymentTransferNumberNotEmpty       = paymentTransferNumber.value.trim() !== '';
        const isReceiptInvoiceOriginNotEmpty        = document.querySelector('input[name="receipt_origin"]:checked');
        const isContractPOSignedNotEmpty            = document.querySelector('input[name="contract_signed"]:checked');
        const isVATOriginNotEmpty                   = document.querySelector('input[name="vat_origin"]:checked');
        const isValueVATNotEmpty                    = valueVAT.value.trim() !== 'Sel..';
        const isValueVATNumberNotEmpty              = valueVATNumber.value.trim() !== '';
        const isFATPATDOOriginNotEmpty              = document.querySelector('input[name="basft_origin"]:checked');
        const isAssetNotEmpty                       = document.querySelector('input[name="asset"]:checked');
        const isCategoryNumberNotEmpty              = categoryNumber.value.trim() !== '';
        const isDepreciationMethodNotEmpty          = depreciationMethod.value.trim() !== 'Select a Method';
        const isDepreciationRatePercentageNotEmpty  = depreciationRatePercentage.value.trim() !== '';
        const isDepreciationRateYearsNotEmpty       = depreciationRateYears.value.trim() !== '';
        const isDepreciationCOANumberNotEmpty       = depreciationCOANumber.value.trim() !== '';
        const isTableNotEmpty                       = checkOneLineBudgetContents();
        const isDeductionValueNotEmpty              = deductionValue.value.trim() !== '';

        if (
            isSupplierInvoiceNumberNotEmpty &&
            isPaymentTransferNumberNotEmpty &&
            isReceiptInvoiceOriginNotEmpty &&
            isContractPOSignedNotEmpty &&
            isVATOriginNotEmpty &&
            isFATPATDOOriginNotEmpty &&
            isAssetNotEmpty &&
            isTableNotEmpty
        ) {
            if (isVATOriginNotEmpty.value == "yes") {
                if (!isValueVATNotEmpty) {
                    $("#ppn").css("border", "1px solid red");
                    $("#vat_origin_message").show();
                    $("#vat_origin_text_message").text("VAT Value cannot be empty.");
                    isValid = false;
                } else if (!isValueVATNumberNotEmpty) {
                    $("#vat_number").css("border", "1px solid red");
                    $("#vat_number_message").show();
                    isValid = false;
                }
            }
            if (isAssetNotEmpty.value == "yes") {
                if (!isCategoryNumberNotEmpty) {
                    $("#category_number").css("border", "1px solid red");
                    $("#category_message").show();
                    isValid = false;
                } else if (!isDepreciationMethodNotEmpty) {
                    $("#depreciation_method").css("border", "1px solid red");
                    $("#depreciation_method_message").show();
                    isValid = false;
                } else if (!isDepreciationRatePercentageNotEmpty) {
                    $("#depreciation_rate_percentage").css("border", "1px solid red");
                    $("#depreciation_value_message").show();
                    $("#depreciation_value_text_message").text("Depreciation Rate cannot be empty.");
                    isValid = false;
                } else if (!isDepreciationRateYearsNotEmpty) { 
                    $("#depreciation_rate_years").css("border", "1px solid red");
                    $("#depreciation_value_message").show();
                    $("#depreciation_value_text_message").text("Depreciation Years cannot be empty.");
                    isValid = false;
                } else if (!isDepreciationCOANumberNotEmpty) { 
                    $("#depreciation_coa_number").css("border", "1px solid red");
                    $("#depreciation_coa_message").show();
                    isValid = false;
                }
            }
            if (isValid) {
                if (
                    (isVATOriginNotEmpty.value === "no" && isAssetNotEmpty.value === "no") ||
                    (isVATOriginNotEmpty.value === "yes" && isAssetNotEmpty.value === "no" && isValueVATNotEmpty && isValueVATNumberNotEmpty) ||
                    (isVATOriginNotEmpty.value === "no" && isAssetNotEmpty.value === "yes" && 
                    isCategoryNumberNotEmpty && isDepreciationMethodNotEmpty && 
                    isDepreciationRatePercentageNotEmpty && isDepreciationRateYearsNotEmpty && isDepreciationCOANumberNotEmpty) ||
                    (isVATOriginNotEmpty.value === "yes" && isAssetNotEmpty.value === "yes" &&
                    isValueVATNotEmpty && isValueVATNumberNotEmpty &&
                    isCategoryNumberNotEmpty && isDepreciationMethodNotEmpty &&
                    isDepreciationRatePercentageNotEmpty && isDepreciationRateYearsNotEmpty && isDepreciationCOANumberNotEmpty)
                ) {
                    summaryData();
                    $('#account_payable_submit_modal').modal('show');
                }
            }
        } else {
            if (
                !isSupplierInvoiceNumberNotEmpty && 
                !isPaymentTransferNumberNotEmpty &&
                !isReceiptInvoiceOriginNotEmpty && 
                !isContractPOSignedNotEmpty &&
                !isVATOriginNotEmpty &&
                !isFATPATDOOriginNotEmpty &&
                !isAssetNotEmpty
            ) {
                $("#supplier_invoice_number").css("border", "1px solid red");
                $("#payment_transfer_number").css("border", "1px solid red");
                $("#budget_details_deduction").css("border", "1px solid red");

                $("#supplier_invoice_number_message").show();
                $("#payment_transfer_message").show();
                $("#receipt_origin_message").show();
                $("#contract_signed_message").show();
                $("#vat_origin_message").show();
                $("#basft_origin_message").show();
                $("#asset_message").show();
                $("#budget_details_deduction_message").show();
                return;
            }
            if (!isSupplierInvoiceNumberNotEmpty) {
                $("#supplier_invoice_number").css("border", "1px solid red");
                $("#supplier_invoice_number_message").show();
                return;
            }
            if (!isPaymentTransferNumberNotEmpty) {
                $("#payment_transfer_number").css("border", "1px solid red");
                $("#payment_transfer_message").show();
                return;
            }
            if (!isReceiptInvoiceOriginNotEmpty) {
                $("#receipt_origin_message").show();
                return;
            }
            if (!isContractPOSignedNotEmpty) {
                $("#contract_signed_message").show();
                return;
            }
            if (!isVATOriginNotEmpty) {
                $("#vat_origin_message").show();
                return;
            } else {
                if (isVATOriginNotEmpty.value == "yes") {
                    if (!isValueVATNotEmpty) {
                        $("#ppn").css("border", "1px solid red");
                        $("#vat_origin_message").show();
                        $("#vat_origin_text_message").text("VAT Value cannot be empty.");
                        return;
                    }
                    if (!isValueVATNumberNotEmpty) {
                        $("#vat_number").css("border", "1px solid red");
                        $("#vat_number_message").show();
                        return;
                    }
                }
            }
            if (!isFATPATDOOriginNotEmpty) {
                $("#basft_origin_message").show();
                return;
            }
            if (!isAssetNotEmpty) {
                $("#asset_message").show();
                return;
            } else {
                if (isAssetNotEmpty.value == "yes") {
                    if (!isCategoryNumberNotEmpty) {
                        $("#category_number").css("border", "1px solid red");
                        $("#category_message").show();
                        return;
                    }
                    if (!isDepreciationMethodNotEmpty) {
                        $("#depreciation_method").css("border", "1px solid red");
                        $("#depreciation_method_message").show();
                        return;
                    }
                    if (!isDepreciationRatePercentageNotEmpty) {
                        $("#depreciation_rate_percentage").css("border", "1px solid red");
                        $("#depreciation_value_message").show();
                        $("#depreciation_value_text_message").text("Depreciation Rate cannot be empty.");
                        return;
                    }
                    if (!isDepreciationRateYearsNotEmpty) { 
                        $("#depreciation_rate_years").css("border", "1px solid red");
                        $("#depreciation_value_message").show();
                        $("#depreciation_value_text_message").text("Depreciation Years cannot be empty.");
                        return;
                    }
                    if (!isDepreciationCOANumberNotEmpty) { 
                        $("#depreciation_coa_number").css("border", "1px solid red");
                        $("#depreciation_coa_message").show();
                        return;
                    }
                }
            }
            if (!isTableNotEmpty) {
                $("#invoice_details_message").show();
                return;
            }
            if (!isDeductionValueNotEmpty) {
                $("#budget_details_deduction").css("border", "1px solid red");
                $("#budget_details_deduction_message").show();
                return;
            }
        }
    }

    function selectWorkFlow(formatData) {
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
                accountPayableRevision({...formatData, comment: result.value});
            }
        });
    }

    function accountPayableRevision(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("AccountPayable.UpdatesRevisionAccountPayable") }}',
            success: function(res) {
                HideLoading();

                if (res.status == 200) {
                    const swalWithBootstrapButtonsss = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtonsss.fire({
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
                        window.location.href = "{{ route('AccountPayable.index', ['var' => 1]) }}";
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

    function submitForm() {
        $('#account_payable_submit_modal').modal('hide');

        let action = $('#form_revision_account_payable').attr("action");
        let method = $('#form_revision_account_payable').attr("method");
        let form_data = new FormData($('#form_revision_account_payable')[0]);
        form_data.append('account_payable_detail', JSON.stringify(dataStore));
        form_data.append('account_payable_id', accountPayableID);

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
                    CancelNotif("You don't have access", "{{ route('AccountPayable.index', ['var' => 1]) }}");
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

                    selectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                CancelNotif("You don't have access", "{{ route('AccountPayable.index', ['var' => 1]) }}");
            }
        });
    }

    $('#tableGetCategory').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_category"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        $(`#category_id`).val(sysId);
        $(`#category_number`).val(`${code} - ${name}`);
        $(`#category_number`).css('background-color', '#e9ecef');
        
        $('#myGetCategory').modal('hide');

        if (depreciationMethod.value != "Select a Method") {
            $("#containerDepreciationRate").hide();
            $("#containerLoadingDepreciationRate").show();
            getDepreciationRateYears(sysId, depreciationMethod.value);
        }
    });

    $('#tableGetPaymentTransfer').on('click', 'tbody tr', async function() {
        let bankCode        = $(this).find('td:nth-child(4)').text();
        let bankAccount     = $(this).find('td:nth-child(6)').text();
        let accountNumber   = $(this).find('td:nth-child(7)').text();

        $(`#payment_transfer_number`).val(`${bankAccount} - (${bankCode}) ${accountNumber}`);
        $(`#payment_transfer_number`).css('background-color', '#e9ecef');
        
        $('#myGetPaymentTransfer').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        if (currentIndexPickCOA === null) {
            $(`#depreciation_coa_id`).val(sysId);
            $(`#depreciation_coa_number`).val(`${code} - ${name}`);
            $(`#depreciation_coa_number`).css({"background-color": "#e9ecef"});
        } else {
            $(`#coa_id${currentIndexPickCOA}`).val(sysId);
            $(`#coa_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
            $(`#coa_name${currentIndexPickCOA}`).css({"background-color": "#e9ecef"});

            currentIndexPickCOA = null;
        }

        $('#myGetChartOfAccount').modal('hide');
    });

    $(`#budget_details_deduction`).on('keyup', function(e) {
        let val = e.target.value.replace(/,/g, '');
        
        if (val <= totalTaxBased) {
            totalDeduction = val;
            $(`#invoice_details_total_deduction`).text(`Total Deduction: ${currencyTotal(val)}`);
        } else {
            totalDeduction = 0;
            $(this).val("");
        }

        calculateGrandTotal();
    });

    $('#tableAccountPayables').on('click', 'tbody tr', function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_modal_account_payable"]').val();
        let trano           = $(this).find('td:nth-child(2)').text();
        let budgetCode      = $(this).find('td:nth-child(3)').text();
        let budgetName      = $(this).find('td:nth-child(4)').text();

        $("#modal_account_payable_id").val(sysId);
        $("#modal_account_payable_document_number").val(trano);

        $('#myAccountPayables').modal('hide');
    });

    $('#depreciation_method').on('change', function(e) {
        const value = e.target.value;

        if (value) {
            if (categoryID.value) {
                $("#containerDepreciationRate").hide();
                $("#containerLoadingDepreciationRate").show();
                getDepreciationRateYears(categoryID.value, value);
            }

            $("#depreciation_method_message").hide();
            $("#depreciation_method").css("border", "1px solid #ced4da");
        }
    });

    $(window).one('load', function(e) {
        getVAT();
        getAccountPayableDetails();
        getPaymentTransfer(paymentTransferID.value);
        getDepreciationMethod();
    });
</script>