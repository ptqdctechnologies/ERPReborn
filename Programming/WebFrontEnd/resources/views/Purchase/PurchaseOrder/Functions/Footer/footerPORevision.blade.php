<script>
    let dataStore                   = [];
    let totalNextApprover           = 0;
    let dataWorkflow                = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    let triggerButtonModal          = null;
    let vat                         = document.getElementById("vatOption");
    const documentTypeID            = document.getElementById("DocumentTypeID");
    const budgetID                  = document.getElementById("var_combinedBudget_RefID");
    const deliveryToIDs             = document.getElementById("delivery_to_id");
    const termOfPaymentOption       = document.getElementById("termOfPaymentOption");
    const vatOptionValues           = document.getElementById("vatOption");
    const internalNote              = document.getElementById("internalNote");
    const transactionTaxDetailRefID = document.getElementById("transactionTaxDetail_RefID");
    const paymentNotes              = document.getElementById("paymentNotes");
    const remarkPO                  = document.getElementById("remarkPO");
    const tariffCurrencyValue       = document.getElementById("tariffCurrencyValue");
    const purchaseOrderRecordRefID  = document.getElementById("purchaseOrderRecord_RefID");
    const dateOfDelivery            = document.getElementById("dateOfDelivery");
    const fileID                    = document.getElementById("dataInput_Log_FileUpload");
    const termOfPaymentID           = document.getElementById('termOfPaymentID');
    const vatOptionValue            = document.getElementById('vatOptionValue');
    const downPaymentValue          = document.getElementById('downPaymentValue');
    const deliveryTo                = document.getElementById("delivery_to");
    const supplierID                = document.getElementById("supplier_id");
    const ppn                       = document.getElementById('ppn');
    const TotalBudgetSelecteds      = document.getElementById('TotalBudgetSelected');
    const TotalBudgetSelectedPpn    = document.getElementById('TotalBudgetSelectedPpn');
    const TotalPpns                 = document.getElementById('TotalPpn');
    const dataTable                 = {!! json_encode($detail ?? []) !!};
    const deliveryToID              = {!! json_encode($header['deliveryToID'] ?? []) !!};
    const deliveryToAddress         = {!! json_encode($header['deliveryTo'] ?? []) !!};

    ppn.addEventListener('change', function () {
        if (this.value == "Yes") {
            $('#containerValuePPN').show();
        } else {
            TotalBudgetSelectedPpn.textContent = TotalBudgetSelecteds.textContent;
            TotalPpns.textContent = "0.00";
            $('#tariffCurrencyValue').val('0.00');
            $('#vatOption').val('Select a PPN');
            $('#containerValuePPN').hide();
        }
    });

    function validateQtyAndPriceWithHighlight() {
        let isValid                 = true;
        const rows                  = document.querySelectorAll("#tablePurchaseOrderDetail tbody tr");
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
            const priceDetail   = qtyInput.getAttribute("data-default");

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

    function calculateTotal() {
        var total   = 0;
        document.querySelectorAll('input[id^="total_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        if (vat.options[vat.selectedIndex].text !== "Select a PPN" && total > 0) {
            let result = (vat.options[vat.selectedIndex].text / 100) * total;

            $('#tariffCurrencyValue').val(currencyTotal(result));
            document.getElementById('TotalPpn').textContent = result.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.getElementById('TotalBudgetSelected').textContent = total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
            document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(result + total);
        } else {
            document.getElementById('TotalBudgetSelected').textContent = total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });;
            document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(total);
        }
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tablePurchaseOrderList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[10];
            const input = totalCell.querySelector('input');
            
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            if (input) {
                const text = parseFloat(input.value.replace(/,/g, '')) || 0;
                total += text;
            }
            
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[7].innerText}): ${decimalFormat(total)}`;
        document.getElementById('GrandVAT').innerText = `VAT: ${TotalPpns.innerText}`;
        document.getElementById('GrandTotalVAT').innerText = `Total (${rows[0].children[7].innerText}) + VAT: ${decimalFormat(total + parseFloat(TotalPpns.innerText))}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tablePurchaseOrderDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tablePurchaseOrderList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const assetSelect   = row.querySelector('select[id^="asset"]');
            const qtyInput      = row.querySelector('input[id^="qty_req"]');
            const priceInput    = row.querySelector('input[id^="price_req"]');
            const totalInput    = row.querySelector('input[id^="total_req"]');
            const balanceInput  = row.querySelector('input[id^="balance"]');
            const noteInput     = row.querySelector('textarea[id^="note"]');

            const recordRefID                                   = row.querySelector('input[id^="record_RefID"]');
            const purchaseRequisitionDetailRefID                = row.querySelector('input[id^="purchaseRequisitionDetail_RefID"]');
            const quantityUnitRefID                             = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID                 = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const productUnitPriceCurrencyExchangeRate          = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');
            const productUnitPriceDiscountCurrencyRefID         = row.querySelector('input[id^="productUnitPriceDiscountCurrency_RefID"]');
            const productUnitPriceDiscountCurrencyValue         = row.querySelector('input[id^="productUnitPriceDiscountCurrencyValue"]');
            const productUnitPriceDiscountCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceDiscountCurrencyExchangeRate"]');

            if (
                qtyInput && priceInput && totalInput && balanceInput && assetSelect &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== '' &&
                balanceInput.value.trim() !== '' &&
                assetSelect.value.trim() !== ''
            ) {
                const prNumber      = row.children[8].innerText.trim();
                const productCode   = row.children[10].innerText.trim();
                const productName   = row.children[11].innerText.trim();
                const qtyAvail      = row.children[13].innerText.trim();
                const uom           = row.children[14].innerText.trim();
                const priceAvail    = row.children[15].innerText.trim();
                const currency      = row.children[17].innerText.trim();

                const qty   = qtyInput.value.trim();
                const price = priceInput.value.trim();
                const total = totalInput.value.trim();
                const note  = noteInput.value.trim();
                const asset = assetSelect.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const recordID = targetRow.children[0].value.trim();

                    if (recordID == recordRefID.value) {
                        targetRow.children[8].innerText = asset == '0' ? 'No' : 'Yes';
                        targetRow.children[9].innerText = currencyTotal(price);
                        targetRow.children[10].innerText = currencyTotal(qty);
                        targetRow.children[11].innerText = currencyTotal(total);
                        targetRow.children[12].innerText = note;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value);
                        
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    purchaseRequisitionDetail_RefID: parseInt(purchaseRequisitionDetailRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseFloat(productUnitPriceCurrencyExchangeRate.value.replace(/,/g, '')),
                                    productUnitPriceDiscountCurrency_RefID: parseInt(productUnitPriceDiscountCurrencyRefID.value),
                                    productUnitPriceDiscountCurrencyValue: parseFloat(productUnitPriceDiscountCurrencyValue.value.replace(/,/g, '')),
                                    productUnitPriceDiscountCurrencyExchangeRate: parseFloat(productUnitPriceDiscountCurrencyExchangeRate.value.replace(/,/g, '')),
                                    remarks: note || '-',
                                    productCode: productCode,
                                    asset: parseInt(asset)
                                }
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
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${prNumber}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${uom}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;" hidden>${currency}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${asset == '0' ? 'No' : 'Yes'}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;" hidden>${note}</td>
                    `;
                    targetTable.appendChild(newRow);

                    // push to dataStore
                    dataStore.push({
                        recordID: parseInt(recordRefID.value),
                        entities: {
                            purchaseRequisitionDetail_RefID: parseInt(purchaseRequisitionDetailRefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseFloat(productUnitPriceCurrencyExchangeRate.value.replace(/,/g, '')),
                            productUnitPriceDiscountCurrency_RefID: parseInt(productUnitPriceDiscountCurrencyRefID.value),
                            productUnitPriceDiscountCurrencyValue: parseFloat(productUnitPriceDiscountCurrencyValue.value.replace(/,/g, '')),
                            productUnitPriceDiscountCurrencyExchangeRate: parseFloat(productUnitPriceDiscountCurrencyExchangeRate.value.replace(/,/g, '')),
                            remarks: note || '-',
                            productCode: productCode,
                            asset: parseInt(asset)
                        }
                    });
                }
            } else {
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const recordID = targetRow.children[0].value.trim();

                    if (recordID == recordRefID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.recordID == recordRefID.value);
                });
            }
        }

        $('#tariffCurrencyValue').val(TotalPpns.textContent);

        updateGrandTotal();
    }

    function validationForm() {
        const isDeliveryToNotEmpty          = deliveryTo.value.trim() !== '';
        const isDownPaymentValueNotEmpty    = downPaymentValue.value.trim() !== '';
        const isTableNotEmpty               = checkOneLineBudgetContents();
        const isInputNotEmpty               = validateQtyAndPriceWithHighlight();

        if (isDeliveryToNotEmpty && isDownPaymentValueNotEmpty && isTableNotEmpty && isInputNotEmpty) {
            $('#purchaseOrderFormModal').modal('show');
            summaryData();
        } else {
            if (!isDeliveryToNotEmpty && !isDownPaymentValueNotEmpty && !isTableNotEmpty) {
                $("#delivery_to").css("border", "1px solid red");
                $("#downPaymentValue").css("border", "1px solid red");

                $("#deliveryToMessage").show();
                $("#dpMessage").show();
                $("#purchaseOrderDetailMessage").show();
                return;
            }
            if (!isDeliveryToNotEmpty) {
                $("#delivery_to").css("border", "1px solid red");
                $("#deliveryToMessage").show();
                return;
            }
            if (!isDownPaymentValueNotEmpty) {
                $("#downPaymentValue").css("border", "1px solid red");
                $("#dpMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#purchaseOrderDetailMessage").show();
                return;
            }
        }
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
                RevisionPurchaseOrder({...formatData, comment: result.value});
            }
        });
    }

    function RevisionPurchaseOrder() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: {
                workFlowPath_RefID: dataWorkflow.workFlowPathRefID,
                approverEntity: dataWorkflow.approverEntityRefID, 
                comment: dataWorkflow.comment,
                storeData: {
                    supplier_id: supplierID.value,
                    dateOfDelivery: dateOfDelivery.value,
                    purchaseOrderRecord_RefID: purchaseOrderRecordRefID.value,
                    delivery_to_id: deliveryToIDs.value,
                    remarkPO: remarkPO.value,
                    delivery_to: deliveryTo.value,
                    paymentNotes: paymentNotes.value,
                    internalNote: internalNote.value,
                    downPaymentValue: downPaymentValue.value,
                    termOfPaymentValue: termOfPaymentOption.value,
                    vatValue: vatOptionValues.value,
                    transactionTaxDetail_RefID: transactionTaxDetailRefID.value,
                    tariffCurrencyValue: tariffCurrencyValue.value,
                    dataInput_Log_FileUpload_1: fileID.value,
                    purchaseOrderDetail: JSON.stringify(dataStore)
                }
            },
            url: '{{ route("PurchaseOrder.UpdatePurchaseOrder") }}',
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
                HideLoading();
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
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
                        let isSelected = project.sys_ID == termOfPaymentID.value ? ' selected ' : ' ';
                        $('#termOfPaymentOption').append('<option' + isSelected + 'value="' + project.sys_ID + '">' + project.name + '</option>');
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
                    $('#vatOption').append('<option disabled selected value="Select a PPN">Select a PPN</option>');

                    data.forEach(function(project) {
                        let isSelected = project.tariffFixRate == vatOptionValue.value ? ' selected ' : ' ';
                        $('#vatOption').append('<option' + isSelected + 'value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
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

    function viewPurchaseOrderDetail(dataDetail) {
        $(".loadingPurchaseOrderTable").hide();
        $("#purchaseOrderRecord_RefID").val(dataDetail[0].purchaseOrder_RefID);

        let tbody = $('#tablePurchaseOrderDetail tbody');
        tbody.empty();

        let tbodyList = $('#tablePurchaseOrderList tbody');
        tbodyList.empty();

        let totalRequest = 0;

        $.each(dataDetail, function(key, val2) {
            let totalReq = val2.quantity * val2.productUnitPriceCurrencyValue;
            let balanced = totalReq - totalReq;

            dataStore.push({
                recordID: val2.sys_ID,
                entities: {
                    purchaseRequisitionDetail_RefID: parseInt(val2.purchaseRequisitionDetail_RefID),
                    quantity: parseFloat(val2.quantity.replace(/,/g, '')),
                    quantityUnit_RefID: parseInt(val2.quantityUnit_RefID),
                    productUnitPriceCurrency_RefID: parseInt(val2.productUnitPriceCurrency_RefID),
                    productUnitPriceCurrencyValue: parseFloat(val2.productUnitPriceCurrencyValue.replace(/,/g, '')),
                    productUnitPriceCurrencyExchangeRate: parseFloat(val2.productUnitPriceCurrencyExchangeRate.replace(/,/g, '')),
                    productUnitPriceDiscountCurrency_RefID: parseInt(val2.productUnitPriceDiscountCurrency_RefID),
                    productUnitPriceDiscountCurrencyValue: parseFloat(val2.productUnitPriceDiscountCurrencyValue || 1),
                    productUnitPriceDiscountCurrencyExchangeRate: parseFloat(val2.productUnitPriceDiscountCurrencyExchangeRate || 1),
                    remarks: val2.note || '-',
                    productCode: val2.productCode,
                    asset: parseInt(val2.asset)
                },
            });

            totalRequest += totalReq;
            let row = `
                <tr>
                    <input id="record_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                    <input id="purchaseRequisitionDetail_RefID${key}" value="${val2.purchaseRequisitionDetail_RefID}" type="hidden" />
                    <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                    <input id="productUnitPriceCurrency_RefID${key}" value="${val2.productUnitPriceCurrency_RefID}" type="hidden" />
                    <input id="productUnitPriceCurrencyExchangeRate${key}" value="${val2.productUnitPriceCurrencyExchangeRate}" type="hidden" />
                    <input id="productUnitPriceDiscountCurrency_RefID${key}" value="${val2.productUnitPriceDiscountCurrency_RefID}" type="hidden" />
                    <input id="productUnitPriceDiscountCurrencyValue${key}" value="${val2.productUnitPriceDiscountCurrencyValue || 1}" type="hidden" />
                    <input id="productUnitPriceDiscountCurrencyExchangeRate${key}" value="${val2.productUnitPriceDiscountCurrencyExchangeRate || 1}" type="hidden" />

                    <td style="text-align: center; padding: 10px !important;">${val2.purchaseRequisitionNumber || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.combinedBudgetSectionCode + ' - ' + val2.combinedBudgetSectionName}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productCode || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productName || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.qtyPR || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.qtyAvail || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(totalReq || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productUnitPriceCurrencyISOCode}</td>
                    <td class="sticky-col sixth-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-total-request=${totalReq} data-default="${currencyTotal(val2.quantity || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.quantity || 0)}" />
                    </td>
                    <td class="sticky-col fifth-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="price_req${key}" data-index=${key} data-total-request=${totalReq} data-default="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}" />
                    </td>
                    <td class="sticky-col forth-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="total_req${key}" data-default="${currencyTotal(totalReq || 0)}" autocomplete="off" style="border-radius:0px;" disabled value="${currencyTotal(totalReq || 0)}" />
                    </td>
                    <td class="sticky-col third-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="balance${key}" data-default="${currencyTotal(balanced || 0)}" autocomplete="off" style="border-radius:0px;" disabled value="${currencyTotal(balanced || 0)}" />
                    </td>
                    <td class="sticky-col second-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <select class="form-control" id="asset${key}">
                            <option value="0" ${val2.asset == '0' && 'selected'}>No</option>
                            <option value="1" ${val2.asset == '1' && 'selected'}>Yes</option>
                        </select>
                    </td>
                    <td class="sticky-col first-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <textarea id="note${key}" data-default="${val2.note || ''}" class="form-control">${val2.note || ''}</textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#qty_req${key}`).on('keyup', function() {
                var qty_req             = $(this).val().replace(/,/g, '');
                var data_index          = $(this).data('index');
                var data_total_request  = $(this).data('total-request');
                var price_req           = $(`#price_req${data_index}`).val().replace(/,/g, '');
                var total_req           = parseFloat(qty_req || 0) * parseFloat(price_req || 0);
                var countBalance        = data_total_request - total_req;
                var validate            = parseFloat((parseFloat(val2.qtyAvail) + parseFloat(val2.quantity)).toFixed(2));

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                // if (parseFloat(qty_req || 0) > parseFloat(val2.quantity || 0)) {
                if (parseFloat(qty_req || 0) > validate) {
                    $(this).val(currencyTotal(val2.quantity));
                    $(`#total_req${data_index}`).val(currencyTotal(val2.quantity * (price_req || 1)));
                    $(`#balance${data_index}`).val(0);
                    ErrorNotif("Qty Req is over Qty Avail !");
                } else {
                    $(`#total_req${data_index}`).val(currencyTotal(total_req));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    calculateTotal();
                }

                checkOneLineBudgetContents(key);
            });

            $(`#price_req${key}`).on('keyup', function() {
                var price_req           = $(this).val().replace(/,/g, '');
                var data_index          = $(this).data('index');
                var data_total_request  = $(this).data('total-request');
                var qty_req             = $(`#qty_req${data_index}`).val().replace(/,/g, '');
                var total_req           = parseFloat(qty_req || 0) * parseFloat(price_req || 0);
                var countBalance        = data_total_request - total_req;

                countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                if (parseFloat(price_req || 0) > parseFloat(val2.productUnitPriceCurrencyValue || 0)) {
                    $(this).val(currencyTotal(val2.productUnitPriceCurrencyValue));
                    $(`#total_req${data_index}`).val(currencyTotal((qty_req || 1) * val2.productUnitPriceCurrencyValue));
                    $(`#balance${data_index}`).val(0);
                    ErrorNotif("Price Req is over Unit Price !");
                } else {
                    $(`#total_req${data_index}`).val(currencyTotal(total_req));
                    $(`#balance${data_index}`).val(currencyTotal(countBalance));
                    calculateTotal();
                }

                checkOneLineBudgetContents(key);
            });

            let rowList = `
                <tr>
                    <input type="hidden" name="record_RefID[]" value="${val2.sys_ID}">
                    <input type="hidden" name="qty_avail[]" value="${currencyTotal(val2.quantity || 0)}">
                    <input type="hidden" name="price_avail[]" value="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}">
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${val2.purchaseRequisitionNumber || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${val2.productCode}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${val2.productName}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 40px;" hidden>${val2.productUnitPriceCurrencyISOCode || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${val2.asset == '0' ? 'No' : 'Yes'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${currencyTotal(val2.quantity || 0)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${currencyTotal(totalReq || 0)}</td> 
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 150px;" hidden>${val2.note || '-'}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        let allTotal = totalRequest + parseFloat(dataDetail[0].tariffCurrencyValue.replace(/,/g, ''))

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(totalRequest);
        document.getElementById('TotalPpn').textContent = currencyTotal(dataDetail[0].tariffCurrencyValue);
        document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(allTotal);
        // document.getElementById('GrandTotal').textContent = currencyTotal(totalRequest);
    }

    function commentWorkflow() {
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
                dataWorkflow.comment = result.value;
                ShowLoading();
                RevisionPurchaseOrder();
            }
        });
    }

    function SubmitForm(value) {
        triggerButtonModal = value;
        $('#purchaseOrderFormModal').modal('hide');

        $('#purchaseOrderFormModal').on('hidden.bs.modal', function (e) {
            if (triggerButtonModal === "SUBMIT") {
                if (totalNextApprover > 1) {
                    $('#myWorkflows').modal('show');
                } else {
                    commentWorkflow();
                }
            }
        });
    }

    function getWorkflow() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: {
                businessDocumentType_RefID: documentTypeID.value,
                combinedBudget_RefID: budgetID.value
            },
            url: '{!! route("GetWorkflow") !!}',
            success: function(response) {
                if (response.status === 200) {
                    totalNextApprover = response.data[0].nextApproverPath.length;
                    dataWorkflow.workFlowPathRefID = response.data[0].sys_ID;
                    dataWorkflow.approverEntityRefID = response.data[0].submitterEntity_RefID;

                    getWorkflows(response.data[0].nextApproverPath);
                } else {
                    $("#button_submit").prop("disabled", true);

                    Swal.fire("Error", "You don't have access", "error");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");
            }
        });
    }

    $('#delivery_to').on('input', function(e) {
        if (e.target.value == deliveryToAddress) {
            $("#delivery_to_id").val(deliveryToID);
        } else {
            $("#delivery_to_id").val("");
        }
    });

    $('#tableWorkflows').on('click', 'tbody tr', function() {
        const sysId             = $(this).find('input[data-trigger="sys_id_approver"]').val();
        const workflowName      = $(this).find('td:nth-child(2)').text();
        const workflowPosition  = $(this).find('td:nth-child(3)').text();

        dataWorkflow.approverEntityRefID = parseInt(sysId);

        $("#myWorkflows").modal('toggle');

        $('#myWorkflows').on('hidden.bs.modal', function () {
            commentWorkflow();
        });
    });

    $(window).one('load', function(e) {
        if (vatOptionValue.value != "0.00") {
            $('#containerValuePPN').show();
        } else {
            $('#containerValuePPN').hide();
        }

        $('#startDate').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $(".errorPurchaseOrderTable").hide();

        getWorkflow();
        getPaymentTerm();
        getVAT();
        viewPurchaseOrderDetail(dataTable);
    });
</script>