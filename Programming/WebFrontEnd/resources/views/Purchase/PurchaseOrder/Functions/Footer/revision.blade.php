<script>
    const budgetRefID = document.getElementById('budget_id');
    const currencyRefID = document.getElementById('currency_id');
    const currencyCode = document.getElementById('currency_code');
    const purchaseOrderDetails = {!! json_encode($details ?? []) !!};
    const dateOfDelivery = {!! json_encode($date_of_delivery ?? '') !!};
    const purchaseOrderNumber = {!! json_encode($purchaseOrder_number ?? '') !!};
    const ppnPercentage = {!! json_encode($ppn_percentage ?? '') !!};
    const documentTypeRefID = {!! json_encode($documentTypeRefID ?? '') !!};
    const termOfPaymentId = {!! json_encode($termOfPayment_id ?? '') !!};
    const isHaveAccountPayableValue = {!! json_encode($isHaveAccountPayableValue ?? '') !!};

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
        $("#purchase_order_icon").css({ "display": displayIcon });
        $("#purchase_order_loading").css({ "display": displayLoading });
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
                        $('#ppn_percentage_option').append(`<option value="${project.tariffFixRate}" ${project.tariffFixRate == ppnPercentage ? 'selected' : ''}>${project.tariffFixRate}</option>`);
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Function getVAT error: ', jqXHR.responseJSON);
            },
            complete: function (jqXHR, textStatus) {
                if (ppnPercentage > 0) {
                    vatHandler({ value: "Yes" });
                }
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

                    response.forEach(function (project) {
                        $('#term_of_payment_option').append(
                            `<option value="${project.sys_ID}" ${project.sys_ID == termOfPaymentId ? 'selected' : ''}>${project.name}</option>`
                        );
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

        if (currencyRefID.value == data.productUnitPriceCurrency_RefID) {
            if (
                currencyCode.value == "IDR" &&
                data.productUnitPriceCurrencyISOCode == "IDR"
            ) {
                modifyColumnInput = renderIDRColumns(data, indexPurchaseOrder);
            } else {
                modifyColumnInput = renderForeignCurrencyColumns(indexPurchaseOrder);
            }
        } else {
            modifyColumnInput = renderForeignCurrencyColumns(indexPurchaseOrder);
        }

        return modifyColumnInput;
    }

    function renderIDRColumns(data, indexPurchaseOrder) {
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
                    value="${Utils.formatCurrency(data.quantity)}"
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
                    value="${Utils.formatCurrency(data.productUnitPriceCurrencyValue)}"
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
                    value="${Utils.formatCurrency(data.quantity * data.productUnitPriceCurrencyValue)}"
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

    function showPurchaseOrderDetails() {
        $.each(purchaseOrderDetails, function (key, value) {
            const balanceQty = value.qtyAvail - value.quantity;

            let modifyColumnInput = renderPurchaseRequisitionColumns(
                value,
                key
            );

            let row = `
                <tr>
                    <input
                        id="recordID${key}"
                        type="hidden"
                        name="additionalData[${key}][recordID]"
                        value="${value.sys_ID}"
                    />

                    <input
                        id="purchaseRequisitionDetailRefID${key}"
                        type="hidden"
                        name="additionalData[${key}][purchaseRequisitionDetail_RefID]"
                        value="${value.purchaseRequisitionDetail_RefID}"
                    />

                    <input
                        id="workStructureRefID${key}"
                        type="hidden"
                        name="additionalData[${key}][workStructure_RefID]"
                        value="${value.workStructure_RefID}"
                    />

                    <input
                        id="quantityUnitRefID${key}"
                        type="hidden"
                        name="additionalData[${key}][quantityUnit_RefID]"
                        value="${value.quantityUnit_RefID}"
                    />

                    <input
                        id="productUnitPriceCurrencyRefID${key}"
                        type="hidden"
                        name="additionalData[${key}][productUnitPriceCurrency_RefID]"
                        value="${value.productUnitPriceCurrency_RefID}"
                    />

                    <input
                        id="productUnitPriceCurrencyExchangeRate${key}"
                        type="hidden"
                        name="additionalData[${key}][productUnitPriceCurrencyExchangeRate]"
                        value="${value.productUnitPriceCurrencyExchangeRate}"
                    />

                    <input
                        id="productUnitPriceDiscountCurrencyRefID${key}"
                        type="hidden"
                        name="additionalData[${key}][productUnitPriceDiscountCurrency_RefID]"
                        value="${value.productUnitPriceDiscountCurrency_RefID}"
                    />

                    <input
                        id="productUnitPriceDiscountCurrencyValue${key}"
                        type="hidden"
                        name="additionalData[${key}][productUnitPriceDiscountCurrencyValue]"
                        value="${value.productUnitPriceDiscountCurrencyValue}"
                    />

                    <input
                        id="productUnitPriceDiscountCurrencyExchangeRate${key}"
                        type="hidden"
                        name="additionalData[${key}][productUnitPriceDiscountCurrencyExchangeRate]"
                        value="${value.productUnitPriceDiscountCurrencyExchangeRate}"
                    />

                    <input
                        id="product${key}"
                        data-field="product"
                        type="hidden"
                        value="${value.productCode || ''} - ${value.productName || ''}"
                    />

                    <input
                        id="uom${key}"
                        data-field="uom"
                        type="hidden"
                        value="${value.quantityUnitName}"
                    />

                    <input
                        id="currency${key}"
                        data-field="currency"
                        type="hidden"
                        value="${value.productUnitPriceCurrencyISOCode}"
                    />

                    <input
                        type="hidden"
                        id="quantityAvailable${key}"
                        value="${value.qtyAvail}"
                    />

                    <input
                        type="hidden"
                        id="priceAvailable${key}"
                        value="${value.productUnitPriceCurrencyValue}"
                    />

                    <td style="text-align: center; padding: 10px !important;">
                        ${value.purchaseRequisitionNumber}
                    </td>

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
                        ${Utils.formatCurrency(value.qtyPR || 0)}
                    </td>

                    <td style="text-align: center; padding: 10px !important;">
                        ${Utils.formatCurrency(value.qtyAvail || 0)}
                    </td>

                    <td style="text-align: center; padding: 10px !important;">
                        ${value.quantityUnitName}
                    </td>

                    <td style="text-align: center; padding: 10px !important;">
                        ${Utils.formatCurrency(value.productUnitPriceCurrencyValue || 0)}
                    </td>

                    <td style="text-align: center; padding: 10px !important;">
                        ${Utils.formatCurrency((value.qtyPR * value.productUnitPriceCurrencyValue) || 0)}
                    </td>

                    <td style="text-align: center; padding: 10px !important;">
                        ${Utils.formatCurrency(value.ap_Value || 0)}
                    </td>

                    <td style="text-align: center; padding: 10px !important;">
                        ${value.productUnitPriceCurrencyISOCode}
                    </td>

                    ${modifyColumnInput}

                    <td class="sticky-col third-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <input 
                            disabled
                            type="text"
                            id="balance_qty${key}"
                            class="form-control number-without-negative" 
                            autocomplete="off" 
                            style="border-radius:0px;" 
                            value="${Utils.formatCurrency(balanceQty)}"
                        />
                    </td>

                    <td class="sticky-col second-col-po" style="border:1px solid #e9ecef;background-color:white;">
                        <select class="form-control" id="asset${key}" data-field="asset" name="additionalData[${key}][asset]">
                            <option value="0" ${value.asset == '0' && 'selected'}>No</option>
                            <option value="1" ${value.asset == '1' && 'selected'}>Yes</option>
                        </select>
                    </td>

                    <td class="sticky-col first-col-po" style="border: 1px solid #e9ecef; background-color: white; padding-right: inherit;">
                        <textarea 
                            id="note${key}" 
                            class="form-control" 
                            name="additionalData[${key}][remarks]"
                        >${value.note}</textarea>
                    </td>
                </tr>
            `;

            $('#purchase_order_details_table tbody').append(row);
        });

        calculateTotalIDRColumns();
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

                    showPurchaseOrderDetails();

                    showHideLoading("block", "none");

                    $("#purchase_order_container").hide();
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
            beforeSend: function () {
                showHideLoading("none", "block");
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
            type: 'PUT',
            url: '{!! route("PurchaseOrder.update", $purchaseOrder_id) !!}',
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
                    ErrorNotif("Revision Purchase Order Failed");
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

    $(document).ready(function () {
        $("#ap_value_field").show();

        $("#budget_container").hide();

        $("#remark").attr({
            "disabled": isHaveAccountPayableValue ? true : false
        });

        $("#term_of_payment_option").attr({
            "disabled": isHaveAccountPayableValue ? true : false
        });

        $('#date_of_delivery_picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        $('#date_of_delivery_picker').datetimepicker(
            'date',
            moment(dateOfDelivery, 'YYYY-MM-DD')
        );

        if (ppnPercentage > 0) {
            $('#ppn_option').val("Yes");
        }

        getVAT();
        getPaymentTerm();
        getWorkflow(budgetRefID.value);
    });
</script>