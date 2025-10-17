<script>
    let indexPurchaseOrder          = 0;
    let totalPurchaseOrder          = 0;
    let vat                         = document.getElementById("vatOption");
    let dataStore                   = [];
    let msrIDList                   = [];
    const combinedBudgetTrigger     = document.getElementById("var_combinedBudget_RefID");
    const msrNumber                 = document.getElementById("modal_purchase_requisition_document_numbers");
    const deliveryTo                = document.getElementById("delivery_to");
    const deliveryToDuplicate       = document.getElementById("deliveryToDuplicate");
    const deliveryToDuplicateRefID  = document.getElementById("deliveryToDuplicate_RefID");
    const deliveryToRefID           = document.getElementById("deliveryTo_RefID");
    const supplierCode              = document.getElementById("supplier_code");
    const ppn                       = document.getElementById('ppn');
    const TotalBudgetSelecteds      = document.getElementById('TotalBudgetSelected');
    const TotalBudgetSelectedPpn    = document.getElementById('TotalBudgetSelectedPpn');
    const TotalPpns                 = document.getElementById('TotalPpn');
    const downPaymentValue          = document.getElementById('downPaymentValue');
    const termOfPaymentOption       = document.getElementById('termOfPaymentOption');
    const tablePurchaseOrderLists   = document.querySelector("#tablePurchaseOrderList tbody");
    const submitPurchaseOrder       = document.getElementById("submitPurchaseOrder");

    if (downPaymentValue) {
        downPaymentValue.addEventListener('input', function () {
            let value = parseInt(this.value);
            if (value > 100) this.value = 100;
            if (value < 0) this.value = 0;
        });
    }

    if (ppn) {
        ppn.addEventListener('change', function () {
            if (this.value == "Yes") {
                $('#containerValuePPN').show();
            } else {
                TotalBudgetSelectedPpn.textContent = TotalBudgetSelecteds.textContent;
                TotalPpns.textContent = "0.00";
                $('#tariffCurrencyValue').val('0.00');
                $('#vatOption').val('Select a VAT');
                $('#containerValuePPN').hide();
            }
        });
    }

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#tablePurchaseOrderDetail tbody tr");
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
        const rows = document.querySelectorAll('#tablePurchaseOrderList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[9];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[6].innerText}): ${decimalFormat(total)}`;
        document.getElementById('GrandVAT').innerText = `VAT: ${TotalPpns.innerText}`;
        document.getElementById('GrandTotalVAT').innerText = `Total (${rows[0].children[6].innerText}) + VAT: ${decimalFormat(total + parseFloat(TotalPpns.innerText))}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tablePurchaseOrderDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tablePurchaseOrderList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const qtyInput                                      = row.querySelector('input[id^="qty_req"]');
            const priceInput                                    = row.querySelector('input[id^="price_req"]');
            const totalInput                                    = row.querySelector('input[id^="total_req"]');
            const balanceInput                                  = row.querySelector('input[id^="balance"]');
            const noteInput                                     = row.querySelector('textarea[id^="note"]');
            const quantityUnit_RefID                            = row.querySelector('input[id^="quantityUnit_RefID"]');
            const purchaseRequisitionDetail_RefID               = row.querySelector('input[id^="purchaseRequisitionDetail_RefID"]');
            const productUnitPriceCurrency_RefID                = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const productUnitPriceCurrencyExchangeRate          = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');
            const productUnitPriceDiscountCurrency_RefID        = row.querySelector('input[id^="productUnitPriceDiscountCurrency_RefID"]');
            const productUnitPriceDiscountCurrencyValue         = row.querySelector('input[id^="productUnitPriceDiscountCurrencyValue"]');
            const productUnitPriceDiscountCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceDiscountCurrencyExchangeRate"]');

            if (
                qtyInput && priceInput && totalInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== ''
            ) {
                const documentNumber    = row.children[0].value.trim();
                const productCode       = row.children[9].value.trim();
                const productName       = row.children[10].value.trim();
                const uom               = row.children[13].value.trim();
                const currency          = row.children[15].value.trim();
                const qtyAvail          = row.children[12].value.trim();
                const priceAvail        = row.children[14].value.trim();

                const qty   = qtyInput.value.trim();
                const price = priceInput.value.trim();
                const total = totalInput.value.trim();
                const note  = noteInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetDocNumber   = targetRow.children[2].innerText.trim();
                    const targetCode        = targetRow.children[1].value.trim();

                    if (targetDocNumber === documentNumber && targetCode === productCode) {
                        found                           = true;
                        targetRow.children[7].innerText = price;
                        targetRow.children[8].innerText = qty;
                        targetRow.children[9].innerText = total;

                        // update dataStore
                        const indexToUpdate = dataStore.findIndex(item => item.entities.documentNumber === documentNumber && item.entities.product_RefID === productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    purchaseRequisitionDetail_RefID: parseInt(purchaseRequisitionDetail_RefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnit_RefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseFloat(productUnitPriceCurrencyExchangeRate.value.replace(/,/g, '')),
                                    productUnitPriceDiscountCurrency_RefID: parseInt(productUnitPriceDiscountCurrency_RefID.value),
                                    productUnitPriceDiscountCurrencyValue: parseFloat(productUnitPriceDiscountCurrencyValue.value.replace(/,/g, '')),
                                    productUnitPriceDiscountCurrencyExchangeRate: parseFloat(productUnitPriceDiscountCurrencyExchangeRate.value.replace(/,/g, '')),
                                    remarks: note || null,
                                    documentNumber: documentNumber,
                                    product_RefID: productCode
                                },
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                        <input type="hidden" name="product_code[]" value="${productCode}">
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${documentNumber}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 40px;" hidden>${currency}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${total}</td>
                        <input type="hidden" name="price_avail[]" value="${priceAvail}">
                    `;
                    targetTable.appendChild(newRow);

                    // push to dataStore
                    dataStore.push({
                        entities: {
                            purchaseRequisitionDetail_RefID: parseInt(purchaseRequisitionDetail_RefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnit_RefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseFloat(productUnitPriceCurrencyExchangeRate.value.replace(/,/g, '')),
                            productUnitPriceDiscountCurrency_RefID: parseInt(productUnitPriceDiscountCurrency_RefID.value),
                            productUnitPriceDiscountCurrencyValue: parseFloat(productUnitPriceDiscountCurrencyValue.value.replace(/,/g, '')),
                            productUnitPriceDiscountCurrencyExchangeRate: parseFloat(productUnitPriceDiscountCurrencyExchangeRate.value.replace(/,/g, '')),
                            remarks: note || null,
                            documentNumber: documentNumber,
                            product_RefID: productCode
                        }
                    });
                }
            } else {
                const documentNumber    = row.children[0].value.trim();
                const productCode       = row.children[9].value.trim();
                const existingRows      = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetDocNumber   = targetRow.children[2].innerText.trim();
                    const targetCode        = targetRow.children[1].value.trim();

                    if (targetDocNumber == documentNumber && targetCode == productCode) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.entities.documentNumber === documentNumber && item.entities.product_RefID === productCode);
                });
            }
        }

        updateGrandTotal();
    }

    function validationForm() {
        const isMSRNumberNotEmpty                   = msrNumber.value.trim() !== '';
        const isDeliveryToNotEmpty                  = deliveryTo.value.trim() !== '';
        const isSupplierCodeNotEmpty                = supplierCode.value.trim() !== '';
        const isDownPaymentValueNotEmpty            = downPaymentValue.value.trim() !== '';
        const isTermOfPaymentOptionValueNotEmpty    = termOfPaymentOption.value.trim() !== 'Select a TOP';
        const isTableNotEmpty                       = checkOneLineBudgetContents();

        if (isMSRNumberNotEmpty && isDeliveryToNotEmpty && isSupplierCodeNotEmpty && isDownPaymentValueNotEmpty && isTermOfPaymentOptionValueNotEmpty && isTableNotEmpty) {
            $('#purchaseOrderFormModal').modal('show');
            summaryData();
        } else {
            if (!isMSRNumberNotEmpty && !isDeliveryToNotEmpty && !isSupplierCodeNotEmpty && !isDownPaymentValueNotEmpty && !isTermOfPaymentOptionValueNotEmpty && !isTableNotEmpty) {
                $("#modal_purchase_requisition_document_numbers").css("border", "1px solid red");
                $("#delivery_to").css("border", "1px solid red");
                $("#supplier_code").css("border", "1px solid red");
                $("#supplier_name").css("border", "1px solid red");
                $("#downPaymentValue").css("border", "1px solid red");
                $("#termOfPaymentOption").css("border", "1px solid red");

                $("#prNumberMessage").show();
                $("#deliveryToMessage").show();
                $("#supplierMessage").show();
                $("#dpMessage").show();
                $("#topMessage").show();
                $("#purchaseOrderDetailMessage").show();
                return;
            }
            if (!isMSRNumberNotEmpty) {
                $("#modal_purchase_requisition_document_numbers").css("border", "1px solid red");
                $("#prNumberMessage").show();
                return;
            }
            if (!isDeliveryToNotEmpty) {
                $("#delivery_to").css("border", "1px solid red");
                $("#deliveryToMessage").show();
                return;
            }
            if (!isSupplierCodeNotEmpty) {
                $("#supplier_code").css("border", "1px solid red");
                $("#supplier_name").css("border", "1px solid red");
                $("#supplierMessage").show();
                return;
            }
            if (!isDownPaymentValueNotEmpty) {
                $("#downPaymentValue").css("border", "1px solid red");
                $("#dpMessage").show();
                return;
            }
            if (!isTermOfPaymentOptionValueNotEmpty) {
                $("#termOfPaymentOption").css("border", "1px solid red");
                $("#topMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#purchaseOrderDetailMessage").show();
                return;
            }
        }
    }

    function getPaymentTerm() {
        $('#containerSelectTOP').hide();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPaymentTerm") !!}',
            success: function(data) {
                $('#containerLoadingTOP').hide();

                if (data && Array.isArray(data)) {
                    $('#containerSelectTOP').show();

                    $('#termOfPaymentOption').empty();
                    $('#termOfPaymentOption').append('<option disabled selected>Select a TOP</option>');

                    data.forEach(function(project) {
                        $('#termOfPaymentOption').append('<option value="' + project.sys_ID + '">' + project.name + '</option>');
                    });
                } else {
                    console.log('Data top code not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getPaymentTerm error: ', textStatus, errorThrown);
            }
        });
    }

    function getVAT() {
        $('#containerSelectPPN').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function(data) {
                $('#containerLoadingPPN').hide();

                if (data && Array.isArray(data)) {
                    $('#containerSelectPPN').show();

                    $('#vatOption').empty();
                    $('#vatOption').append('<option disabled selected value="Select a VAT">Select a VAT</option>');

                    data.forEach(function(project) {
                        $('#vatOption').append('<option value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
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

    function calculateTotal() {
        var total   = 0;
        document.querySelectorAll('input[id^="total_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        if (vat.options[vat.selectedIndex].text !== "Select a VAT" && total > 0) {
            let result = (vat.options[vat.selectedIndex].text / 100) * total;

            $('#tariffCurrencyValue').val(currencyTotal(result));
            document.getElementById('TotalPpn').textContent = currencyTotal(result);
            document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
            document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(result + total);
        } else {
            document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
            document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(total);
        }
    }

    function updatePRUI(prNumber, prID, data) {
        const splitDateOfDelivery = data[0].deliveryDateTimeTZ.split(' ')[0];

        msrIDList.push(data[0].purchaseRequisition_RefID);
        $("#modal_purchase_requisition_document_numbers").val(prNumber);
        $("#modal_purchase_requisition_ids").val(prID);
        $("#budget_value").val(data[0].combinedBudgetCode + ' - ' + data[0].combinedBudgetName);
        $("#sub_budget_value").val(data[0].combinedBudgetSectionCode + ' - ' + data[0].combinedBudgetSectionName);
        $("#deliveryToDuplicate_RefID").val(data[0].deliveryTo_RefID);
        $("#deliveryTo_RefID").val(data[0].deliveryTo_RefID);
        $("#deliveryToDuplicate").val(data[0].deliveryToName);
        $("#delivery_to").val(data[0].deliveryToName);
        $("#dateOfDelivery").val(splitDateOfDelivery);

        $("#prNumberMessage").hide();
        $("#deliveryToMessage").hide();
        $("#modal_purchase_requisition_document_numbers").css({"border": "1px solid #ced4da", "background-color": "#e9ecef"});
        $("#delivery_to").css("border", "1px solid #ced4da");
    }

    function getDetailPurchaseRequisition(purchase_requisition_number, purchase_requisition_id) {
        $("#tablePurchaseOrderDetail tbody").hide();
        $(".loadingPurchaseOrderTable").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseRequisitionDetail") !!}?purchase_requisition_id=' + purchase_requisition_id,
            success: async function(data) {
                if (data && Array.isArray(data) && data.length > 0) {
                    const documentTypeID = document.getElementById("DocumentTypeID");

                    if (documentTypeID.value) {
                        var checkWorkFlow = await checkingWorkflow(data[0].combinedBudget_RefID, documentTypeID.value);

                        if (!checkWorkFlow) {
                            $(".loadingPurchaseOrderTable").hide();
                            return;
                        }
                    }

                    $(".loadingPurchaseOrderTable").hide();
                    $("#tablePurchaseOrderDetail tbody").show();

                    const isDuplicateMsr        = msrIDList.includes(data[0].purchaseRequisition_RefID);
                    const currentBudget         = combinedBudgetTrigger.value;

                    if (currentBudget && currentBudget != data[0].combinedBudget_RefID) {
                        Swal.fire("Error", "Budget must be the same!", "error");
                        return;
                    }

                    if (isDuplicateMsr) {
                        Swal.fire("Error", "PR number has been selected!", "error");
                        return;
                    }

                    if (msrIDList.length == 0) {
                        $("#var_combinedBudget_RefID").val(data[0].combinedBudget_RefID);
                        $("#supplier_code2").prop("disabled", false);
                        updatePRUI(purchase_requisition_number, purchase_requisition_id, data);
                    }

                    if (msrIDList.length > 0 && currentBudget == data[0].combinedBudget_RefID && !isDuplicateMsr) {
                        updatePRUI(purchase_requisition_number, purchase_requisition_id, data);
                    }

                    let tbody = $('#tablePurchaseOrderDetail tbody');

                    let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${purchase_requisition_number}</td>`;

                    $.each(data, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="msr_number${indexPurchaseOrder}" value="${purchase_requisition_number}" type="hidden" />
                                <input id="purchaseRequisitionDetail_RefID${indexPurchaseOrder}" value="${val2.sys_ID}" type="hidden" />
                                <input id="quantityUnit_RefID${indexPurchaseOrder}" value="${val2.quantityUnit_RefID}" type="hidden" />
                                <input id="productUnitPriceCurrency_RefID${indexPurchaseOrder}" value="${val2.productUnitPriceCurrency_RefID}" type="hidden" />
                                <input id="productUnitPriceCurrencyValue${indexPurchaseOrder}" value="${val2.productUnitPriceCurrencyValue}" type="hidden" />
                                <input id="productUnitPriceCurrencyExchangeRate${indexPurchaseOrder}" value="${val2.productUnitPriceCurrencyExchangeRate}" type="hidden" />
                                <input id="productUnitPriceDiscountCurrency_RefID${indexPurchaseOrder}" value="${val2.productUnitPriceCurrency_RefID}" type="hidden" />
                                <input id="productUnitPriceDiscountCurrencyValue${indexPurchaseOrder}" value="0" type="hidden" />
                                <input id="productUnitPriceDiscountCurrencyExchangeRate${indexPurchaseOrder}" value="1" type="hidden" />
                                <input id="product_code${indexPurchaseOrder}" value="${val2.productCode}" type="hidden" />
                                <input id="product_name${indexPurchaseOrder}" value="${val2.productName}" type="hidden" />
                                <input id="qty_msr${indexPurchaseOrder}" value="${val2.quantity}" type="hidden" />
                                <input id="qty_available${indexPurchaseOrder}" value="${val2.quantity}" type="hidden" />
                                <input id="uom${indexPurchaseOrder}" value="${val2.quantityUnitName}" type="hidden" />
                                <input id="unit_price${indexPurchaseOrder}" value="${val2.productUnitPriceBaseCurrencyValue}" type="hidden" />
                                <input id="currency${indexPurchaseOrder}" value="${val2.priceCurrencyISOCode}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center; padding: 10px !important;">${val2.combinedBudgetSectionCode + ' - ' + val2.combinedBudgetSectionName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productCode}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productName}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.qtyAvail)}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.productUnitPriceBaseCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity * val2.productUnitPriceBaseCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productUnitPriceCurrencyISOCode}</td>
                                <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="qty_req${indexPurchaseOrder}" data-index=${indexPurchaseOrder} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="price_req${indexPurchaseOrder}" data-index=${indexPurchaseOrder} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="total_req${indexPurchaseOrder}" data-default="" autocomplete="off" style="border-radius:0px;" disabled />
                                </td>
                                <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="balance${indexPurchaseOrder}" data-default="" autocomplete="off" style="border-radius:0px;" disabled />
                                </td>
                                <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                    <textarea id="note${indexPurchaseOrder}" data-default="" class="form-control"></textarea>
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_req${indexPurchaseOrder}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var price_req = $(`#price_req${data_index}`).val();
                            var total_req = parseFloat(qty_req || 0) * parseFloat(price_req.replace(/,/g, '') || 0);
                            var countBalance = data_total_request - total_req;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            if (qty_req > val2.qtyAvail) {
                                $(this).val(0);
                                $(`#total_req${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Qty Req is over !");
                            } else {
                                $(`#total_req${data_index}`).val(currencyTotal(total_req));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                calculateTotal();
                            }

                            checkOneLineBudgetContents(data_index);
                        });

                        $(`#price_req${indexPurchaseOrder}`).on('keyup', function() {
                            var price_req = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var qty_req = $(`#qty_req${data_index}`).val();
                            var total_req = parseFloat(qty_req.replace(/,/g, '') || 0) * parseFloat(price_req || 0);
                            var countBalance = data_total_request - total_req;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            if (parseFloat(price_req) > val2.productUnitPriceBaseCurrencyValue) {
                                $(this).val(0);
                                $(`#total_req${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Price Req is over !");
                            } else {
                                $(`#total_req${data_index}`).val(currencyTotal(total_req));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                calculateTotal();
                            }

                            checkOneLineBudgetContents(data_index);
                        });

                        indexPurchaseOrder += 1;
                    });
                } else {
                    $(".loadingPurchaseOrderTable").hide();
                    $(".errorPurchaseOrderTable").show();
                    $("#errorPurchaseOrderMessageTable").text(`Data not found.`);
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
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
                PurchaseOrderStore({...formatData, comment: result.value});
            }
        });
    }

    function PurchaseOrderStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("PurchaseOrder.store") }}',
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
                        window.location.href = '/PurchaseOrder?var=1';
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
        $('#purchaseOrderFormModal').modal('hide');

        var action = $("#FormSubmitPurchaseOrder").attr("action");
        var method = $("#FormSubmitPurchaseOrder").attr("method");
        var form_data = new FormData($("#FormSubmitPurchaseOrder")[0]);
        form_data.append('purchaseOrderDetail', JSON.stringify(dataStore));

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
                if (response.message == "WorkflowError") {
                    HideLoading();
                    $("#submitPurchaseOrder").prop("disabled", false);

                    CancelNotif("You don't have access", "{{ route('PurchaseOrder.index', ['var' => 1]) }}");
                } else if (response.message == "MoreThanOne") {
                    HideLoading();

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

                    HideLoading();

                    SelectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                $("#submitPurchaseOrder").prop("disabled", false);
                CancelNotif("You don't have access", '/PurchaseOrder?var=1');
            }
        });
    }

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId     = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code      = $(this).find('td:nth-child(2)').text();
        const name      = $(this).find('td:nth-child(3)').text();
        const address   = $(this).find('td:nth-child(4)').text();

        $("#supplier_id").val(sysId);
        $("#supplier_code").val(code);
        $("#supplier_name").val(`(${code}) ${name} - ${address}`);

        $("#supplier_code").css("border", "1px solid #ced4da");
        $("#supplier_name").css({"border": "1px solid #ced4da", "background-color":"#e9ecef"});
        $("#supplierMessage").hide();

        $('#mySuppliers').modal('hide');
    });

    $('#tableGetModalPurchaseRequisition').on('click', 'tbody tr', function () {
        const $row  = $(this);
        const sysId = $row.find('input[data-trigger="sys_id_modal_purchase_requisition"]').val();
        const trano = $row.find('td:nth-child(2)').text();

        getDetailPurchaseRequisition(trano, sysId);
    });
    
    $('#delivery_to').on('input', function(e) {
        if (e.target.value == deliveryToDuplicate.value) {
            $("#deliveryTo_RefID").val(deliveryToDuplicateRefID.value);
        } else {
            $("#deliveryTo_RefID").val("");
        }
    });

    $('#downPaymentValue').on('input', function(e) {
        if (!e.target.value) {
            $("#dpMessage").show();
            $("#downPaymentValue").css("border", "1px solid red");
        } else {
            $("#dpMessage").hide();
            $("#downPaymentValue").css("border", "1px solid #ced4da");
        }
    });

    $('#termOfPaymentOption').on('change', function(e) {
        if (e.target.value) {
            $("#topMessage").hide();
            $("#termOfPaymentOption").css("border", "1px solid #ced4da");
        }
    });

    $(window).one('load', function(e) {
        getPaymentTerm();
        getVAT();
        getDocumentType("Purchase Order Form");

        $('#containerValuePPN').hide();
        $(".loadingPurchaseOrderTable").hide();
        $(".errorPurchaseOrderTable").hide();
        $("#supplier_code2").prop("disabled", true);

        $('#startDate').datetimepicker({
            format: 'L'
        });
    });
</script>