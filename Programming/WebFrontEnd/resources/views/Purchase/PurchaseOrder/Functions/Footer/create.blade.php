<script>
    let listBudgetID = null;
    let indexPurchaseOrder = 0;
    let listPurchaseRequestID = [];
    const currencyRefID = document.getElementById('currency_id');
    const currencyCode = document.getElementById('currency_code');
    const documentTypeRefID = {!! json_encode($documentTypeRefID ?? '') !!};
    const termOfPaymentOption = document.getElementById('term_of_payment_option');
    const purchaseRequisitionRefID = document.getElementById('purchase_requisition_id');

    function vatHandler(res) {
        if (res.value == "Yes") {
            $('#ppn_percentage_container').show();
        } else {
            $('#ppn_percentage_container').hide();
            $('#ppn_percentage_option').val('Select a VAT');
            calculateTotalIDRColumns();
        }
    }

    function vatPercentageHandler() {
        calculateTotalIDRColumns();
    }

    function showHideLoading(displayIcon, displayLoading) {
        $("#purchase_requisition_icon").css({ "display": displayIcon });
        $("#purchase_requisition_loading").css({ "display": displayLoading });
    }

    function showPurchaseOrderSummary() {
        const sourceTable = document.getElementById('purchase_order_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('purchase_order_summary_table').getElementsByTagName('tbody')[0];

        targetTable.innerHTML = '';

        const rows = sourceTable.getElementsByTagName('tr');

        if (rows.length === 0) {
            targetTable.append(`
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No data to display.
                    </td>
                </tr>
            `);
        }

        for (let row of rows) {
            const documentNumberInformation = row.querySelector('[data-field="document-number"]');
            const productInformation = row.querySelector('[data-field="product"]');
            const uomInformation = row.querySelector('[data-field="uom"]');
            const currencyInformation = row.querySelector('[data-field="currency"]');

            const qtyInput = row.querySelector('[data-field="qty_req"]');
            const priceInput = row.querySelector('[data-field="price_req"]');
            const totalInput = row.querySelector('[data-field="total_req"]');
            const assetSelect = row.querySelector('[data-field="asset"]');

            if (
                qtyInput &&
                priceInput &&
                totalInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== ''
            ) {
                const documentNumber = documentNumberInformation?.value?.trim();
                const product = productInformation?.value?.trim();
                const uom = uomInformation?.value?.trim();
                const currency = currencyInformation?.value?.trim();

                const price = priceInput.value.trim();
                const qty = qtyInput.value.trim();
                const total = totalInput.value.trim();
                const asset = assetSelect.value.trim();

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td style="text-wrap: auto;line-height: normal;padding: 0.8rem 0.5rem;">${documentNumber}</td>
                    <td style="text-wrap: auto;line-height: normal;padding: 0.8rem 0.5rem;">${product}</td>
                    <td style="padding: 0.8rem 0.5rem;">${uom}</td>
                    <td style="padding: 0.8rem 0.5rem;">${currency}</td>
                    <td style="padding: 0.8rem 0.5rem;">${asset == '0' ? 'No' : 'Yes'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${price}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${qty}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                `;

                targetTable.appendChild(newRow);
            }
        }

        if (targetTable.children.length === 0) {
            targetTable.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center text-muted" style="padding: 0.8rem 0.5rem;">
                        No data to display.
                    </td>
                </tr>
            `;
        }

        const totalRequestSourceTable = document.getElementById('purchase_order_total_request');
        const totalVatSourceTable = document.getElementById('purchase_order_total_vat');
        const totalRequestVatSourceTable = document.getElementById('purchase_order_total_request_vat');

        $("#tariff_currency_value").val(totalVatSourceTable.textContent);
        $("#purchase_order_summary_total_request_table").text(totalRequestSourceTable.textContent);
        $("#purchase_order_summary_total_vat_table").text(totalVatSourceTable.textContent);
        $("#purchase_order_summary_total_request_vat_table").text(totalRequestVatSourceTable.textContent);
    }

    function purchaseRequisitionCheck(id) {
        const result = listPurchaseRequestID.filter(val => val === id);

        if (result.length > 1) {
            Swal.fire("Error", "PR number has been selected!", "error");

            return true;
        }
    }

    function budgetCodeCheck(id) {
        if (listBudgetID !== id) {
            Swal.fire("Error", "Budget must be the same!", "error");

            return true;
        }
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
            success: function (response) {
                if (response && Array.isArray(response) && response.length > 0) {
                    $('#ppn_percentage_option').empty();
                    $('#ppn_percentage_option').append('<option disabled selected value="Select a VAT">Select a VAT</option>');

                    response.forEach(function (project) {
                        $('#ppn_percentage_option').append('<option value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Function getVAT error: ', jqXHR.responseJSON);
            }
        });
    }

    function getPaymentTerm() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPaymentTerm") !!}',
            beforeSend: function () {
                $('#term_of_payment_container').hide();
                $('#term_of_payment_loading_container').show();
            },
            success: function (response) {
                if (response && Array.isArray(response)) {
                    $('#term_of_payment_container').show();

                    $('#term_of_payment_option').empty();
                    $('#term_of_payment_option').append('<option disabled selected>Select a TOP</option>');
                    $('#term_of_payment_option').removeAttr('disabled');

                    response.forEach(function (project) {
                        $('#term_of_payment_option').append('<option value="' + project.sys_ID + '">' + project.name + '</option>');
                    });
                } else {
                    console.log('Data top code not found.');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            },
            complete: function (jqXHR, textStatus) {
                console.log(textStatus);

                $('#term_of_payment_container').show();
                $('#term_of_payment_loading_container').hide();
            }
        });
    }

    function renderPurchaseRequisitionColumns(data, indexPurchaseOrder) {
        let modifyColumnInput = '';

        if (currencyRefID.value == data.priceCurrency_RefID) {
            if (
                currencyCode.value == "IDR" &&
                data.priceCurrencyISOCode == "IDR"
            ) {
                modifyColumnInput = renderIDRColumns(indexPurchaseOrder);
            } else {
                modifyColumnInput = renderForeignCurrencyColumns(indexPurchaseOrder);
            }
        } else {
            modifyColumnInput = renderForeignCurrencyColumns(indexPurchaseOrder);
        }

        return modifyColumnInput;
    }

    function renderIDRColumns(indexPurchaseOrder) {
        $("#eighth-col-po-cont").hide();
        $("#seventh-col-po-cont").hide();
        $("#sixth-col-po-cont").show();
        $("#fifth-col-po-cont").show();
        $("#forth-col-po-cont").show();

        $("#sixth-col-po-cont").text('Qty Req');
        $("#fifth-col-po-cont").text('Price Req');
        $("#forth-col-po-cont").text('Total Req');

        return `
            <td class="sticky-col sixth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    type="text"
                    id="qty_req${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                    data-field="qty_req"
                    name="additionalData[${indexPurchaseOrder}][quantity]"
                    oninput="calculateTotalIDRColumnsLine(${indexPurchaseOrder})"
                />
            </td>

            <td class="sticky-col fifth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    type="text"
                    id="price_req${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                    data-field="price_req"
                    name="additionalData[${indexPurchaseOrder}][productUnitPriceCurrencyValue]"
                    oninput="calculateTotalIDRColumnsLine(${indexPurchaseOrder})"
                />
            </td>

            <td class="sticky-col forth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    disabled
                    data-field="total_req"
                    type="text"
                    id="total_req${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                    oninput="calculateTotalIDRColumnsLine(${indexPurchaseOrder})"
                />
            </td>
        `;
    }

    function renderForeignCurrencyColumns(indexPurchaseOrder) {
        $("#eighth-col-po-cont").show();
        $("#seventh-col-po-cont").show();
        $("#sixth-col-po-cont").show();
        $("#fifth-col-po-cont").show();
        $("#forth-col-po-cont").show();

        $("#eighth-col-po-cont").text('Qty Req');
        $("#seventh-col-po-cont").text('Price Req');
        $("#sixth-col-po-cont").text('Total Req');
        $("#fifth-col-po-cont").text('Price Req (IDR)');
        $("#forth-col-po-cont").text('Total Req (IDR)');

        return `
            <td class="sticky-col eighth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    type="text"
                    id="qty_req${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                />
            </td>

            <td class="sticky-col seventh-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    type="text"
                    id="price_req${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                />
            </td>

            <td class="sticky-col sixth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    disabled
                    type="text"
                    id="total_req${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                />
            </td>

            <td class="sticky-col fifth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    disabled
                    type="text"
                    id="price_req_idr${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                />
            </td>

            <td class="sticky-col forth-col-po"
                style="border:1px solid #e9ecef;background-color:white;">
                <input
                    disabled
                    type="text"
                    id="total_req_idr${indexPurchaseOrder}"
                    class="form-control number-without-negative"
                    autocomplete="off"
                    style="border-radius:0px;"
                />
            </td>
        `;
    }

    function calculateTotalIDRColumns() {
        let total = 0;
        const ppnPercentageOption = document.getElementById('ppn_percentage_option');

        document.querySelectorAll('input[data-field="total_req"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('purchase_order_total_request').textContent = currency(total);

        const totalVat = ppnPercentageOption.value === 'Select a VAT' ? 0.00 : (total * ppnPercentageOption.value) / 100;

        document.getElementById('purchase_order_total_vat').textContent = currency(totalVat);

        document.getElementById('purchase_order_total_request_vat').textContent = currency(total + totalVat);
    }

    function calculateTotalIDRColumnsLine(index) {
        const getValue = (field) =>
            Utils.parseFloatSafe(Utils.removeCommas($(`#${field}${index}`).val()));

        const qty = getValue('qty_req');
        const qtyAvailable = getValue('quantityAvailable');

        if (qty > qtyAvailable) {
            $(`#qty_req${index}`).val('');
            $(`#total_req${index}`).val('');
            $(`#balance_qty${index}`).val(currency(qtyAvailable));
            ErrorNotif("Qty Req is over budget !");

            calculateTotalIDRColumns();

            return;
        } else {
            $(`#balance_qty${index}`).val(
                currency(qtyAvailable - qty)
            );
        }

        const price = getValue('price_req');
        const priceAvailable = getValue('priceAvailable');

        if (price > priceAvailable) {
            $(`#price_req${index}`).val('');
            $(`#total_req${index}`).val('');
            ErrorNotif("Price Req is over budget !");

            calculateTotalIDRColumns();

            return;
        }

        $(`#total_req${index}`).val(
            currency(qty * price)
        );

        calculateTotalIDRColumns();
    }

    function getPurchaseRequisitionDetails() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseRequisitionDetail") !!}',
            data: {
                purchase_requisition_id: purchaseRequisitionRefID.value
            },
            beforeSend: function () {
                showHideLoading("block", "none");
                $('#purchase_order_details_table tbody').hide();
                $('#purchase_order_details_loading_table').show();
                $('#purchase_order_details_message_container_table').hide();
            },
            success: function (response) {
                if (response && Array.isArray(response) && response.length > 0) {
                    const data = response[0];
                    const splitDateOfDelivery = data.deliveryDateTimeTZ.split(' ')[0];

                    const resultPurchaseRequisitionCheck = purchaseRequisitionCheck(data.purchaseRequisition_RefID);

                    if (resultPurchaseRequisitionCheck) {
                        return;
                    }

                    const resultBudgetCodeCheck = budgetCodeCheck(data.combinedBudget_RefID);

                    if (resultBudgetCodeCheck) {
                        return;
                    }

                    $("#purchase_requisition_preview").val(data.documentNumber);
                    $("#purchase_requisition_preview").css('background-color', '#e9ecef');

                    $("#budget_preview").val(`${data.combinedBudgetCode} - ${data.combinedBudgetName}`);
                    $("#budget_id").val(data.combinedBudget_RefID);
                    $("#budget_name").val(data.combinedBudgetName);
                    $("#budget_code").val(data.combinedBudgetCode);

                    $("#delivery_to_id").val(data.deliveryTo_RefID);

                    $("#pr_delivery_date").val(splitDateOfDelivery);
                    $("#pr_delivery_to").val(data.deliveryToName);

                    let modifyColumn = `
                        <td rowspan="${response.length}" style="text-align: center; padding: 10px !important;">
                            ${data.documentNumber}
                        </td>
                    `;

                    let modifyColumnInput = renderPurchaseRequisitionColumns(
                        data,
                        indexPurchaseOrder
                    );

                    $.each(response, function (key, value) {
                        let row = `
                            <tr>
                                <input
                                    id="purchaseRequisitionDetailRefID${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][purchaseRequisitionDetail_RefID]"
                                    value="${value.sys_ID}"
                                />

                                <input
                                    id="workStructureRefID${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][workStructure_RefID]"
                                    value="${value.workStructure_RefID}"
                                />

                                <input
                                    id="quantityUnitRefID${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][quantityUnit_RefID]"
                                    value="${value.quantityUnit_RefID}"
                                />

                                <input
                                    id="productUnitPriceCurrencyRefID${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][productUnitPriceCurrency_RefID]"
                                    value="${value.productUnitPriceCurrency_RefID}"
                                />

                                <input
                                    id="productUnitPriceCurrencyExchangeRate${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][productUnitPriceCurrencyExchangeRate]"
                                    value="${value.productUnitPriceCurrencyExchangeRate}"
                                />

                                <input
                                    id="productUnitPriceDiscountCurrencyRefID${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][productUnitPriceDiscountCurrency_RefID]"
                                    value="${value.productUnitPriceCurrency_RefID}"
                                />

                                <input
                                    id="productUnitPriceDiscountCurrencyValue${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][productUnitPriceDiscountCurrencyValue]"
                                    value="0"
                                />

                                <input
                                    id="productUnitPriceDiscountCurrencyExchangeRate${indexPurchaseOrder}"
                                    type="hidden"
                                    name="additionalData[${indexPurchaseOrder}][productUnitPriceDiscountCurrencyExchangeRate]"
                                    value="1"
                                />

                                <input
                                    id="documentNumber${indexPurchaseOrder}"
                                    data-field="document-number"
                                    type="hidden"
                                    value="${value.documentNumber}"
                                />

                                <input
                                    id="product${indexPurchaseOrder}"
                                    data-field="product"
                                    type="hidden"
                                    value="${value.productCode || ''} - ${value.productName || ''}"
                                />

                                <input
                                    id="uom${indexPurchaseOrder}"
                                    data-field="uom"
                                    type="hidden"
                                    value="${value.quantityUnitName}"
                                />

                                <input
                                    id="currency${indexPurchaseOrder}"
                                    data-field="currency"
                                    type="hidden"
                                    value="${value.productUnitPriceCurrencyISOCode}"
                                />

                                <input
                                    type="hidden"
                                    id="quantityAvailable${indexPurchaseOrder}"
                                    value="${value.qtyAvail}"
                                />

                                <input
                                    type="hidden"
                                    id="priceAvailable${indexPurchaseOrder}"
                                    value="${value.productUnitPriceBaseCurrencyValue}"
                                />

                                ${key === 0 ? modifyColumn : ''}

                                <td style="text-align: center; padding: 10px !important;">
                                    ${value.workCode} - ${value.workName}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${value.combinedBudgetSectionCode} - ${value.combinedBudgetSectionName}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${value.productCode} - ${value.productName}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${Utils.formatCurrency(value.quantity || 0)}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${Utils.formatCurrency(value.qtyAvail || 0)}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${value.quantityUnitName || '-'}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${Utils.formatCurrency(value.productUnitPriceBaseCurrencyValue || 0)}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${Utils.formatCurrency((value.quantity * value.productUnitPriceBaseCurrencyValue) || 0)}
                                </td>

                                <td style="text-align: center; padding: 10px !important;">
                                    ${value.productUnitPriceCurrencyISOCode}
                                </td>

                                ${modifyColumnInput}

                                <td class="sticky-col third-col-po" style="border:1px solid #e9ecef;background-color:white;">
                                    <input 
                                        disabled
                                        type="text"
                                        id="balance_qty${indexPurchaseOrder}"
                                        class="form-control number-without-negative" 
                                        autocomplete="off" 
                                        style="border-radius:0px;" 
                                    />
                                </td>

                                <td class="sticky-col second-col-po" style="border:1px solid #e9ecef;background-color:white;">
                                    <select class="form-control" id="asset${indexPurchaseOrder}" data-field="asset" name="additionalData[${indexPurchaseOrder}][asset]">
                                        <option value="0" ${value.asset == '0' && 'selected'}>No</option>
                                        <option value="1" ${value.asset == '1' && 'selected'}>Yes</option>
                                    </select>
                                </td>

                                <td class="sticky-col first-col-po" style="border: 1px solid #e9ecef; background-color: white; padding-right: inherit;">
                                    <textarea 
                                        id="note${indexPurchaseOrder}" 
                                        class="form-control" 
                                        name="additionalData[${indexPurchaseOrder}][remarks]"
                                    ></textarea>
                                </td>
                            </tr>
                        `;

                        $('#purchase_order_details_table tbody').append(row);

                        indexPurchaseOrder += 1;
                    });
                } else {
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            },
            complete: function (jqXHR, textStatus) {
                console.log(textStatus);

                const totalDataSupplier = document.querySelectorAll('#tableSuppliers tbody tr').length;

                if (totalDataSupplier === 0) {
                    getSuppliers();
                }

                if (termOfPaymentOption.options.length === 1) {
                    getPaymentTerm();
                }

                $('#purchase_order_details_loading_table').hide();
                $('#purchase_order_details_table tbody').show();
                $("#supplier_container").css('cursor', 'pointer');
                $("#supplier_container").attr({
                    'data-target': '#mySuppliers'
                });
            }
        });
    }

    function getBudgetProgress(budgetCodeID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("BudgetProgress.lastWeekAvailable") !!}',
            data: {
                record_id: budgetCodeID
            },
            success: function (response) {
                if (response.status === 200 && response.isAvailable) {
                    listBudgetID = budgetCodeID;

                    getPurchaseRequisitionDetails();
                } else {
                    showHideLoading("block", "none");

                    Swal.fire("Error", "Budget progress from last week has not been entered yet", "error");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                showHideLoading("block", "none");
            }
        });
    }

    function getWorkflow(budgetCodeID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            data: {
                businessDocumentType_RefID: documentTypeRefID,
                combinedBudget_RefID: budgetCodeID
            },
            success: function (response) {
                if (response.status === 200 && response.data[0].signAccess) {
                    if (String(budgetCodeID).startsWith('103', 0)) {
                        listBudgetID = budgetCodeID;

                        showHideLoading("block", "none");
                    } else {
                        getBudgetProgress(budgetCodeID);
                    }

                    $("#workflow_path_id").val(response.data[0].workFlowPath_RefIDArray[0]);
                } else {
                    showHideLoading("block", "none");

                    Swal.fire("Error", "You are not included in this budget", "error");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                showHideLoading("block", "none");
            },
            complete: function (jqXHR, textStatus) {
                console.log(textStatus);

                $("#currency_container").removeAttr("data-target");
                $("#currency_container").css('cursor', 'not-allowed');
                $("#currency_container").attr('disabled', 'true');
            }
        });
    }

    function commentWorkflow() {
        const currentComment = document.getElementById('workflow_comment').value || "";

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
            inputValue: currentComment,
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
                $("#workflow_comment").val(result.value);

                document.getElementById('purchaseOrderForm').requestSubmit();
            }
        });

        $("#purchase_order_summary_modal").modal('toggle');
    }

    $('#purchaseOrderForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("PurchaseOrder.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                if (response.status == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + response.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('PurchaseOrder.index') }}");
                    });
                } else {
                    ErrorNotif("Create Purchase Order Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                // Utils.hideLoading();

                // if (jqXHR.status === 422) {
                //     let errors = jqXHR.responseJSON.errors;

                //     $.each(errors, function (key, value) {
                //         // console.log(key + ': ' + value[0]);

                //         if (formList[key]) {
                //             ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);
                //         }
                //     });
                // }
            },
            complete: function (jqXHR, textStatus) {
                Utils.hideLoading();
            }
        });
    });

    $('#down_payment').on('input', function () {
        let value = parseFloat(this.value);

        if (value > 100 || value < 0) {
            this.value = '';

            Swal.fire(
                "Error",
                "Down payment must be between 0% and 100%.",
                "error"
            );
        }
    });

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const table = $('#tableSuppliers').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;
            const address = dataRow.address;

            $("#supplier_id").val(id);
            $("#supplier_name").val(name);
            $("#supplier_code").val(code);
            $("#supplier_address").val(address);
            $("#supplier_preview").val(`${code} - ${name}`);
            $("#supplier_preview").css('background-color', '#e9ecef');
        }

        $('#mySuppliers').modal('toggle');
    });

    $('#tableGetModalPurchaseRequisition').on('click', 'tbody tr', function () {
        const table = $('#tableGetModalPurchaseRequisition').DataTable();
        const dataRow = table.row(this).data();

        $('#purchaseRequisitionModal').modal('toggle');

        if (!currencyRefID.value) {
            ErrorHandler.showErrorInputMessage(
                '#currency_preview',
                '#currency_message',
                '#currency_message_text',
                'The currency field is required.'
            );

            return;
        }

        if (dataRow) {
            const id = dataRow.sys_ID;
            const trano = dataRow.sys_Text;
            const budgetId = dataRow.additionalData.combinedBudget_RefID || 46000000000033;

            listPurchaseRequestID.push(id);

            showHideLoading("none", "block");

            getWorkflow(budgetId);

            $("#purchase_requisition_id").val(id);

            ErrorHandler.hideErrorInputMessage("#purchase_requisition_preview", "#purchase_requisition_message");
        }
    });

    $('#tableCurrencies tbody').on('click', 'tr', function () {
        const table = $('#tableCurrencies').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const currencyID = dataRow.sys_ID;
            const currencyExchangeRate = dataRow.exchangeRate;
            const currencyISOCode = dataRow.ISOCode;
            const currencyName = dataRow.name;

            if (!currencyExchangeRate) {
                Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");

                return;
            }

            $("#currency_id").val(currencyID);
            $("#currency_name").val(currencyName);
            $("#currency_code").val(currencyISOCode);
            $("#currency_preview").val(`${currencyISOCode} - ${currencyName}`);
            $("#currency_preview").css('background-color', '#e9ecef');

            $("#exchange_rate").val(Utils.formatCurrency(currencyExchangeRate));

            ErrorHandler.hideErrorInputMessage("#currency_preview", "#currency_message");
        }

        $("#myCurrencies").modal('toggle');
    });

    $(document).ready(function () {
        $("#term_of_payment_option").attr({
            "disabled": true
        });

        $("#supplier_container").removeAttr("data-target");
        $("#supplier_container").css('cursor', 'not-allowed');

        $('#budget_container').hide();

        $('#budget_preview').css('background-color', '#e9ecef');

        $('#date_of_delivery_picker').datetimepicker({
            format: 'L'
        });

        $('#date_of_delivery_picker').on('change.datetimepicker', function (e, picker) {
            $("#date_of_delivery").css('background-color', '#e9ecef');
        });

        getVAT();
        getModalPurchaseRequisition();
    });
</script>