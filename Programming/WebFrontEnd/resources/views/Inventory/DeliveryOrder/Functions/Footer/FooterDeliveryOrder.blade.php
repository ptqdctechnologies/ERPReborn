<script>
    let dataStore                   = [];
    let indexPurchaseOrderDetail    = 0;
    let indexInternalUseDetail      = 0;
    let deliveryType                = null;
    let deliveryDate                = null;
    const referenceTypeValue        = document.getElementById("reference_type");
    const transporterRefID          = document.getElementById("transporter_id");

    // PURCHASE ORDER
    const purchaseOrderRefID            = document.getElementById("purchase_order_id");
    const purchaseOrderDeliveryFrom     = document.getElementById("purchase_order_delivery_from");
    const purchaseOrderDeliveryTo       = document.getElementById("purchase_order_delivery_to");

    // INTERNAL USE
    const internalUseBudgetCodeRefID    = document.getElementById("internal_use_budget_id");
    const internalUseSubBudgetCodeRefID = document.getElementById("internal_use_site_id");
    const internalUseDeliveryFromRefID  = document.getElementById("internal_use_delivery_from_id");
    const internalUseDeliveryToRefID    = document.getElementById("internal_use_delivery_to_id");
    
    // STOCK MOVEMENT
    const stockMovementStatus               = document.getElementById('stock_movement_status');
    const stockMovementBudgetCodeRefID      = document.getElementById("stock_movement_budget_id");
    const stockMovementRequesterRefID       = document.getElementById("stock_movement_requester_id");
    const stockMovementDeliveryFromRefID    = document.getElementById("stock_movement_delivery_from_id");
    const stockMovementDeliveryToRefID      = document.getElementById("stock_movement_delivery_to_id");
    
    function referenceType(source) {
        dataStore = [];
        indexPurchaseOrderDetail = 0;
        indexInternalUseDetail = 0;
        stockMovementStatus.value = '';

        // PURCHASE ORDER
        $(`#purchase_order_number`).val("");
        $(`#purchase_order_id`).val("");
        $(`#purchase_order_budget`).val("");

        $(`#purchase_order_delivery_from_id_duplicate`).val("");
        $(`#purchase_order_delivery_from_id`).val("");
        $(`#purchase_order_delivery_from_duplicate`).val("");
        $(`#purchase_order_delivery_from`).val("");

        $("#purchase_order_delivery_from").css("border", "1px solid #ced4da");
        $("#purchase_order_delivery_from_message").hide();

        $("#purchase_order_delivery_to").css("border", "1px solid #ced4da");
        $("#purchase_order_delivery_to_message").hide();

        $("#purchase_order_number").css("border", "1px solid #ced4da");
        $("#purchase_order_message").hide();

        // INTERNAL USE
        $(`#internal_use_budget_code`).val("");
        $(`#internal_use_budget_id`).val("");
        $(`#internal_use_budget_name`).val("");
        $(`#internal_use_site_code`).val("");
        $(`#internal_use_site_id`).val("");
        $(`#internal_use_site_name`).val("");
        $(`#internal_use_delivery_from_name`).val("");
        $(`#internal_use_delivery_from_id`).val("");
        $(`#internal_use_delivery_from_address`).val("");
        $(`#internal_use_delivery_to_name`).val("");
        $(`#internal_use_delivery_to_id`).val("");
        $(`#internal_use_delivery_to_address`).val("");

        $("#internal_use_budget_code").css("border", "1px solid #ced4da");
        $("#internal_use_budget_name").css("border", "1px solid #ced4da");
        $("#internal_use_budget_message").hide();

        $("#internal_use_site_code").css("border", "1px solid #ced4da");
        $("#internal_use_site_name").css("border", "1px solid #ced4da");
        $("#internal_use_site_message").hide();

        $("#internal_use_delivery_from_name").css("border", "1px solid #ced4da");
        $("#internal_use_delivery_from_address").css("border", "1px solid #ced4da");
        $("#internal_use_delivery_from_message").hide();

        $("#internal_use_delivery_to_name").css("border", "1px solid #ced4da");
        $("#internal_use_delivery_to_address").css("border", "1px solid #ced4da");
        $("#internal_use_delivery_to_message").hide();

        // STOCK MOVEMENT
        $(`#stock_movement_budget_code`).val("");
        $(`#stock_movement_budget_id`).val("");
        $(`#stock_movement_budget_name`).val("");
        $(`#stock_movement_requester_position`).val("");
        $(`#stock_movement_requester_id`).val("");
        $(`#stock_movement_requester_name`).val("");
        $(`#stock_movement_delivery_from_name`).val("");
        $(`#stock_movement_delivery_from_id`).val("");
        $(`#stock_movement_delivery_from_address`).val("");
        $(`#stock_movement_delivery_to_name`).val("");
        $(`#stock_movement_delivery_to_id`).val("");
        $(`#stock_movement_delivery_to_address`).val("");

        $("#stock_movement_budget_code").css("border", "1px solid #ced4da");
        $("#stock_movement_budget_name").css("border", "1px solid #ced4da");
        $("#stock_movement_budget_message").hide();

        $("#stock_movement_requester_position").css("border", "1px solid #ced4da");
        $("#stock_movement_requester_name").css("border", "1px solid #ced4da");
        $("#stock_movement_requester_message").hide();

        $("#stock_movement_delivery_from_name").css("border", "1px solid #ced4da");
        $("#stock_movement_delivery_from_address").css("border", "1px solid #ced4da");
        $("#stock_movement_delivery_from_message").hide();

        $("#stock_movement_delivery_to_name").css("border", "1px solid #ced4da");
        $("#stock_movement_delivery_to_address").css("border", "1px solid #ced4da");
        $("#stock_movement_delivery_to_message").hide();
        
        $("#stock_movement_status").css("border", "1px solid #ced4da");
        $("#stock_movement_status_message").hide();

        $("#table_reference_type_detail tbody").empty();

        $("#reference_type").css("border", "1px solid #ced4da");
        $("#reference_type_message").hide();

        $("#total_reference_number").text("0.00");

        if (source.value == "0") {
            $(".purchase-order-components").css("display", "flex");
            $(".internal-use-components").css("display", "none");
            $(".stock-movement-components").css("display", "none");

            $(".thead-purchase-order").css("display", "table-row");
            $(".thead-internal-use").css("display", "none");
            $(".thead-stock-movement").css("display", "none");

            // getReferenceNumber(source);
        } else if (source.value == "1") {
            $(".purchase-order-components").css("display", "none");
            $(".internal-use-components").css("display", "flex");
            $(".stock-movement-components").css("display", "none");

            $(".thead-purchase-order").css("display", "none");
            $(".thead-internal-use").css("display", "table-row");
            $(".thead-stock-movement").css("display", "none");
        } else if (source.value == "2") {
            $(".purchase-order-components").css("display", "none");
            $(".internal-use-components").css("display", "none");
            $(".stock-movement-components").css("display", "flex");

            $(".thead-purchase-order").css("display", "none");
            $(".thead-internal-use").css("display", "none");
            $(".thead-stock-movement").css("display", "table-row");
        }
    }

    function stockMovementStatusValue(source) {
        $("#stock_movement_status").css("border", "1px solid #ced4da");
        $("#stock_movement_status_message").hide();
    }

    function deliveryTypeTrigger(value) {
        deliveryType = value;
    }

    function summaryData() {
        const sourceTable = document.getElementById('table_reference_type_detail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('delivery_order_list_table_modal').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        switch (referenceTypeValue.value) {
            case "0":
                for (let row of rows) {
                    const referenceRefID    = row.querySelector('input[id^="reference_ID"]');
                    const quantityUnitRefID = row.querySelector('input[id^="quantityUnit_RefID"]');
                    const productRefID      = row.querySelector('input[id^="product_RefID"]');
                    
                    const qtyInput          = row.querySelector('input[id^="qty_req"]');
                    const noteInput         = row.querySelector('textarea[id^="note"]');

                    if (qtyInput && qtyInput.value.trim() !== '') {
                        const refNumber     = row.children[3].innerText.trim();
                        const productCode   = row.children[5].innerText.trim();
                        const productName   = row.children[6].innerText.trim();
                        const uom           = row.children[7].innerText.trim();

                        const qty       = qtyInput.value.trim();
                        const note      = noteInput.value.trim();

                        let found = false;
                        const existingRows = targetTable.getElementsByTagName('tr');

                        for (let targetRow of existingRows) {
                            const targetReferenceRefID  = targetRow.children[0].value.trim();
                            const targetProductRefID    = targetRow.children[1].value.trim();

                            if (targetReferenceRefID == referenceRefID.value && targetProductRefID == productRefID.value) {
                                targetRow.children[6].innerText = qty;
                                found = true;

                                // update dataStore
                                const indexToUpdate = dataStore.findIndex(item => item.entities.reference_ID == referenceRefID.value && item.entities.product_RefID == productRefID.value);
                                if (indexToUpdate !== -1) {
                                    dataStore[indexToUpdate] = {
                                        entities: {
                                            product_RefID: parseInt(productRefID.value),
                                            quantity: parseFloat(qty.replace(/,/g, '')),
                                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                            remarks: note,
                                            reference_ID: parseInt(referenceRefID.value)
                                        }
                                    };
                                }

                                break;
                            }
                        }

                        if (!found) {
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                                <input type="hidden" id="reference_submit_modal_ID[]" value="${referenceRefID.value}">
                                <input type="hidden" id="product_submit_modal_ID[]" value="${productRefID.value}">
                                
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${refNumber}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productCode}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productName}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${uom}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${qty}</td>
                            `;
                            targetTable.appendChild(newRow);

                            dataStore.push({
                                entities: {
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    remarks: note,
                                    reference_ID: parseInt(referenceRefID.value)
                                }
                            });
                        }
                    } else {
                        const existingRows  = targetTable.getElementsByTagName('tr');

                        for (let targetRow of existingRows) {
                            const targetReferenceRefID  = targetRow.children[0].value.trim();
                            const targetProductRefID    = targetRow.children[1].value.trim();

                            if (targetReferenceRefID == referenceRefID.value && targetProductRefID == productRefID.value) {
                                targetRow.remove();
                                break;
                            }
                        }

                        dataStore = dataStore.filter(item => {
                            return !(item.entities.reference_ID == referenceRefID.value && item.entities.product_RefID == productRefID.value);
                        });
                    }
                }

                break;
            case "1":
                for (let row of rows) {
                    const referenceRefID    = row.querySelector('input[id^="reference_ID"]');
                    const quantityUnitRefID = row.querySelector('input[id^="quantityUnit_RefID"]');
                    const productRefID      = row.querySelector('input[id^="product_RefID"]');

                    const qtyInput          = row.querySelector('input[id^="internal_use_qty_req"]');
                    const noteInput         = row.querySelector('textarea[id^="internal_use_note"]');

                    if (qtyInput && qtyInput.value.trim() !== '') {
                        const subBudget     = row.children[3].innerText.trim();
                        const productCode   = row.children[4].innerText.trim();
                        const productName   = row.children[5].innerText.trim();
                        const uom           = row.children[6].innerText.trim();

                        const qty       = qtyInput.value.trim();
                        const note      = noteInput.value.trim();

                        let found = false;
                        const existingRows = targetTable.getElementsByTagName('tr');

                        for (let targetRow of existingRows) {
                            const targetReferenceRefID  = targetRow.children[0].value.trim();
                            const targetProductRefID    = targetRow.children[1].value.trim();

                            if (targetReferenceRefID == referenceRefID.value && targetProductRefID == productRefID.value) {
                                targetRow.children[6].innerText = qty;
                                found = true;

                                // update dataStore
                                const indexToUpdate = dataStore.findIndex(item => item.entities.reference_ID == referenceRefID.value && item.entities.product_RefID == productRefID.value);
                                if (indexToUpdate !== -1) {
                                    dataStore[indexToUpdate] = {
                                        entities: {
                                            product_RefID: parseInt(productRefID.value),
                                            quantity: parseFloat(qty.replace(/,/g, '')),
                                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                            remarks: note,
                                            reference_ID: parseInt(referenceRefID.value)
                                        }
                                    };
                                }

                                break;
                            }
                        }

                        if (!found) {
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                                <input type="hidden" id="reference_submit_modal_ID[]" value="${referenceRefID.value}">
                                <input type="hidden" id="product_submit_modal_ID[]" value="${productRefID.value}">

                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${subBudget}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productCode}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productName}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${uom}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${qty}</td>
                            `;
                            targetTable.appendChild(newRow);

                            dataStore.push({
                                entities: {
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    remarks: note,
                                    reference_ID: parseInt(referenceRefID.value)
                                }
                            });
                        }
                    } else {
                        const existingRows  = targetTable.getElementsByTagName('tr');

                        for (let targetRow of existingRows) {
                            const targetReferenceRefID  = targetRow.children[0].value.trim();
                            const targetProductRefID    = targetRow.children[1].value.trim();

                            if (targetReferenceRefID == referenceRefID.value && targetProductRefID == productRefID.value) {
                                targetRow.remove();
                                break;
                            }
                        }

                        dataStore = dataStore.filter(item => {
                            return !(item.entities.reference_ID == referenceRefID.value && item.entities.product_RefID == productRefID.value);
                        });
                    }
                }
                
                break;
            case "2":
                for (let row of rows) {
                    const referenceRefID    = row.querySelector('input[id^="reference_ID"]');
                    const quantityUnitRefID = row.querySelector('input[id^="quantityUnit_RefID"]');
                    const productRefID      = row.querySelector('input[id^="product_RefID"]');

                    const qtyInput          = row.querySelector('input[id^="stock_movement_qty_req"]');
                    const noteInput         = row.querySelector('textarea[id^="stock_movement_note_req"]');

                    if (qtyInput && qtyInput.value.trim() !== '') {
                        const productCode   = row.children[3].innerText.trim();
                        const productName   = row.children[4].innerText.trim();
                        const uom           = row.children[5].innerText.trim();

                        const qty       = qtyInput.value.trim();
                        const note      = noteInput.value.trim();

                        let found = false;
                        const existingRows = targetTable.getElementsByTagName('tr');

                        for (let targetRow of existingRows) {
                            const targetReferenceRefID  = targetRow.children[0].value.trim();
                            const targetProductRefID    = targetRow.children[1].value.trim();
                            
                            if (targetReferenceRefID == referenceRefID.value && targetProductRefID == productRefID.value) {
                                targetRow.children[5].innerText = qty;
                                found = true;

                                // update dataStore
                                const indexToUpdate = dataStore.findIndex(item => item.entities.reference_ID == referenceRefID.value && item.entities.product_RefID == productRefID.value);
                                if (indexToUpdate !== -1) {
                                    dataStore[indexToUpdate] = {
                                        entities: {
                                            product_RefID: parseInt(productRefID.value),
                                            quantity: parseFloat(qty.replace(/,/g, '')),
                                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                            remarks: note,
                                            reference_ID: parseInt(referenceRefID.value)
                                        }
                                    };
                                }

                                break;
                            }
                        }

                        if (!found) {
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                                <input type="hidden" id="reference_submit_modal_ID[]" value="${referenceRefID.value}">
                                <input type="hidden" id="product_submit_modal_ID[]" value="${productRefID.value}">

                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productCode}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${productName}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${uom}</td>
                                <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${qty}</td>
                            `;
                            targetTable.appendChild(newRow);

                            dataStore.push({
                                entities: {
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    remarks: note,
                                    reference_ID: parseInt(referenceRefID.value)
                                }
                            });
                        }
                    } else {
                        const existingRows  = targetTable.getElementsByTagName('tr');

                        for (let targetRow of existingRows) {
                            const targetReferenceRefID  = targetRow.children[0].value.trim();
                            const targetProductRefID    = targetRow.children[1].value.trim();

                            if (targetReferenceRefID == referenceRefID.value && targetProductRefID == productRefID.value) {
                                targetRow.remove();
                                break;
                            }
                        }

                        dataStore = dataStore.filter(item => {
                            return !(item.entities.reference_ID == referenceRefID.value && item.entities.product_RefID == productRefID.value);
                        });
                    }
                }

                break;            
            default:
                break;
        }
    }

    function validationForm() {
        const isReferenceTypeValueNotSelected   = referenceTypeValue.value.trim() !== 'Select a Source';
        const isTransporterRefIDNotEmpty        = transporterRefID.value.trim() !== '';

        // PURCHASE ORDER
        const isPurchaseOrderRefIDNotEmpty           = purchaseOrderRefID.value.trim() !== '';
        const isPurchaseOrderDeliveryFromNotEmpty    = purchaseOrderDeliveryFrom.value.trim() !== '';
        const isPurchaseOrderDeliveryToNotEmpty      = purchaseOrderDeliveryTo.value.trim() !== '';

        // INTERNAL USE
        const isInternalUseBudgetCodeRefIDNotEmpty      = internalUseBudgetCodeRefID.value.trim() !== '';
        const isInternalUseSubBudgetCodeRefIDNotEmpty   = internalUseSubBudgetCodeRefID.value.trim() !== '';
        const isInternalUseDeliveryFromRefIDNotEmpty    = internalUseDeliveryFromRefID.value.trim() !== '';
        const isInternalUseDeliveryToRefIDNotEmpty      = internalUseDeliveryToRefID.value.trim() !== '';
        
        // STOCK MOVEMENT
        const isStockMovementStatusNotEmpty             = stockMovementStatus.value.trim() !== '';
        const isStockMovementBudgetCodeRefIDNotEmpty    = stockMovementBudgetCodeRefID.value.trim() !== '';
        const isStockMovementRequesterRefIDNotEmpty     = stockMovementRequesterRefID.value.trim() !== '';
        const isStockMovementDeliveryFromRefIDNotEmpty  = stockMovementDeliveryFromRefID.value.trim() !== '';
        const isStockMovementDeliveryToRefIDNotEmpty    = stockMovementDeliveryToRefID.value.trim() !== '';

        if (!isReferenceTypeValueNotSelected) {
            $("#reference_type").css("border", "1px solid red");
            $("#reference_type_message").show();
            return;
        } else {
            switch (referenceTypeValue.value) {
                case "0":
                    if (isPurchaseOrderRefIDNotEmpty && isPurchaseOrderDeliveryFromNotEmpty && isPurchaseOrderDeliveryToNotEmpty && isTransporterRefIDNotEmpty) {
                        summaryData();
                        $('#delivery_order_submit_modal').modal('show');
                    } else {
                        if (!isPurchaseOrderRefIDNotEmpty && !isPurchaseOrderDeliveryFromNotEmpty && !isPurchaseOrderDeliveryToNotEmpty && !isTransporterRefIDNotEmpty) {
                            $("#transporter_name").css("border", "1px solid red");
                            $("#transporter_message").show();
                            
                            $("#purchase_order_delivery_from").css("border", "1px solid red");
                            $("#purchase_order_delivery_from_message").show();

                            $("#purchase_order_delivery_to").css("border", "1px solid red");
                            $("#purchase_order_delivery_to_message").show();

                            $("#purchase_order_number").css("border", "1px solid red");
                            $("#purchase_order_message").show();
                            return;
                        }
                        if (!isPurchaseOrderRefIDNotEmpty) {
                            $("#purchase_order_number").css("border", "1px solid red");
                            $("#purchase_order_message").show();
                            return;
                        }
                        if (!isPurchaseOrderDeliveryFromNotEmpty) {
                            $("#purchase_order_delivery_from").css("border", "1px solid red");
                            $("#purchase_order_delivery_from_message").show();
                            return;
                        }
                        if (!isPurchaseOrderDeliveryToNotEmpty) {
                            $("#purchase_order_delivery_to").css("border", "1px solid red");
                            $("#purchase_order_delivery_to_message").show();
                            return;
                        }
                        if (!isTransporterRefIDNotEmpty) {
                            $("#transporter_name").css("border", "1px solid red");
                            $("#transporter_message").show();
                            return;
                        }
                    }
                    break;
                case "1":
                    if (isInternalUseBudgetCodeRefIDNotEmpty && isInternalUseSubBudgetCodeRefIDNotEmpty && isInternalUseDeliveryFromRefIDNotEmpty && isInternalUseDeliveryToRefIDNotEmpty && isTransporterRefIDNotEmpty) {
                        summaryData();
                        $('#delivery_order_submit_modal').modal('show');
                    } else {
                        if (!isInternalUseBudgetCodeRefIDNotEmpty && !isInternalUseSubBudgetCodeRefIDNotEmpty && !isInternalUseDeliveryFromRefIDNotEmpty && !isInternalUseDeliveryToRefIDNotEmpty && !isTransporterRefIDNotEmpty) {
                            $("#transporter_name").css("border", "1px solid red");
                            $("#transporter_message").show();

                            $("#internal_use_budget_code").css("border", "1px solid red");
                            $("#internal_use_budget_name").css("border", "1px solid red");
                            $("#internal_use_budget_message").show();

                            $("#internal_use_site_code").css("border", "1px solid red");
                            $("#internal_use_site_name").css("border", "1px solid red");
                            $("#internal_use_site_message").show();

                            $("#internal_use_delivery_from_name").css("border", "1px solid red");
                            $("#internal_use_delivery_from_address").css("border", "1px solid red");
                            $("#internal_use_delivery_from_message").show();

                            $("#internal_use_delivery_to_name").css("border", "1px solid red");
                            $("#internal_use_delivery_to_address").css("border", "1px solid red");
                            $("#internal_use_delivery_to_message").show();

                            return;
                        }
                        if (!isInternalUseBudgetCodeRefIDNotEmpty) {
                            $("#internal_use_budget_code").css("border", "1px solid red");
                            $("#internal_use_budget_name").css("border", "1px solid red");
                            $("#internal_use_budget_message").show();
                            return;
                        }
                        if (!isInternalUseSubBudgetCodeRefIDNotEmpty) {
                            $("#internal_use_site_code").css("border", "1px solid red");
                            $("#internal_use_site_name").css("border", "1px solid red");
                            $("#internal_use_site_message").show();
                            return;
                        }
                        if (!isInternalUseDeliveryFromRefIDNotEmpty) {
                            $("#internal_use_delivery_from_name").css("border", "1px solid red");
                            $("#internal_use_delivery_from_address").css("border", "1px solid red");
                            $("#internal_use_delivery_from_message").show();
                            return;
                        }
                        if (!isInternalUseDeliveryToRefIDNotEmpty) {
                            $("#internal_use_delivery_to_name").css("border", "1px solid red");
                            $("#internal_use_delivery_to_address").css("border", "1px solid red");
                            $("#internal_use_delivery_to_message").show();
                            return;
                        }
                        if (!isTransporterRefIDNotEmpty) {
                            $("#transporter_name").css("border", "1px solid red");
                            $("#transporter_message").show();
                            return;
                        }
                    }
                    break;
                case "2":
                    if (isStockMovementStatusNotEmpty && isStockMovementBudgetCodeRefIDNotEmpty && isStockMovementRequesterRefIDNotEmpty && isStockMovementDeliveryFromRefIDNotEmpty && isStockMovementDeliveryToRefIDNotEmpty && isTransporterRefIDNotEmpty) {
                        summaryData();
                        $('#delivery_order_submit_modal').modal('show');
                    } else {
                        if (!isStockMovementStatusNotEmpty && !isStockMovementBudgetCodeRefIDNotEmpty && !isStockMovementRequesterRefIDNotEmpty && !isStockMovementDeliveryFromRefIDNotEmpty && !isStockMovementDeliveryToRefIDNotEmpty && !isTransporterRefIDNotEmpty) {
                            $("#transporter_name").css("border", "1px solid red");
                            $("#transporter_message").show();

                            $("#stock_movement_budget_code").css("border", "1px solid red");
                            $("#stock_movement_budget_name").css("border", "1px solid red");
                            $("#stock_movement_budget_message").show();

                            $("#stock_movement_requester_position").css("border", "1px solid red");
                            $("#stock_movement_requester_name").css("border", "1px solid red");
                            $("#stock_movement_requester_message").show();

                            $("#stock_movement_status").css("border", "1px solid red");
                            $("#stock_movement_status_message").show();

                            $("#stock_movement_delivery_from_name").css("border", "1px solid red");
                            $("#stock_movement_delivery_from_address").css("border", "1px solid red");
                            $("#stock_movement_delivery_from_message").show();

                            $("#stock_movement_delivery_to_name").css("border", "1px solid red");
                            $("#stock_movement_delivery_to_address").css("border", "1px solid red");
                            $("#stock_movement_delivery_to_message").show();

                            return;
                        }
                        if (!isStockMovementStatusNotEmpty) {
                            $("#stock_movement_status").css("border", "1px solid red");
                            $("#stock_movement_status_message").show();
                            return;
                        }
                        if (!isStockMovementBudgetCodeRefIDNotEmpty) {
                            $("#stock_movement_budget_code").css("border", "1px solid red");
                            $("#stock_movement_budget_name").css("border", "1px solid red");
                            $("#stock_movement_budget_message").show();
                            return;
                        }
                        if (!isStockMovementRequesterRefIDNotEmpty) {
                            $("#stock_movement_requester_position").css("border", "1px solid red");
                            $("#stock_movement_requester_name").css("border", "1px solid red");
                            $("#stock_movement_requester_message").show();
                            return;
                        }
                        if (!isStockMovementDeliveryFromRefIDNotEmpty) {
                            $("#stock_movement_delivery_from_name").css("border", "1px solid red");
                            $("#stock_movement_delivery_from_address").css("border", "1px solid red");
                            $("#stock_movement_delivery_from_message").show();
                            return;
                        }
                        if (!isStockMovementDeliveryToRefIDNotEmpty) {
                            $("#stock_movement_delivery_to_name").css("border", "1px solid red");
                            $("#stock_movement_delivery_to_address").css("border", "1px solid red");
                            $("#stock_movement_delivery_to_message").show();
                            return;
                        }
                        if (!isTransporterRefIDNotEmpty) {
                            $("#transporter_name").css("border", "1px solid red");
                            $("#transporter_message").show();
                            return;
                        }
                    }
                    break;
                default:
                    console.log('error');
                    break;
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
                deliveryOrderStore({...formatData, comment: result.value});
            }
        });
    }

    function deliveryOrderStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("DeliveryOrder.store") }}',
            success: function(res) {
                HideLoading();

                console.log('res', res);

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
                        cancelForm("{{ route('DeliveryOrder.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
                HideLoading();
                ErrorNotif("Data Cancel Inputed");
            }
        });
    }

    function submitForm() {
        $('#delivery_order_submit_modal').modal('hide');

        var action = $('#delivery_order_submit_form').attr("action");
        var method = $('#delivery_order_submit_form').attr("method");
        var form_data = new FormData($('#delivery_order_submit_form')[0]);
        form_data.append('delivery_order_details', JSON.stringify(dataStore));
        form_data.append('delivery_date', deliveryDate ? deliveryDate.split(" ")[0] : deliveryDate);

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
                    CancelNotif("You don't have access", "{{ route('DeliveryOrder.index', ['var' => 1]) }}");
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

                    selectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();

                CancelNotif("You don't have access", "{{ route('DeliveryOrder.index', ['var' => 1]) }}");
            }
        });
    }

    // START OF PURCHASE ORDER TYPE
        function calculateTotal() {
            let total = 0;
            
            document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
                let value = parseFloat(input.value.replace(/,/g, '')); 
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('total_reference_number').textContent = decimalFormat(parseFloat(total));
        }

        function checkOneLineBudgetContents(indexInput) {
            const rows = document.querySelectorAll("#table_reference_type_detail tbody tr");
            let hasFullRow = false;

            rows.forEach((row, index) => {
                const qty   = document.getElementById(`qty_req${index}`)?.value.trim();
                const note  = document.getElementById(`note${index}`)?.value.trim();

                if (qty !== "" && note !== "") {
                    hasFullRow = true;
                }
            });

            rows.forEach((row, index) => {
                const qtyEl     = document.getElementById(`qty_req${index}`);
                const noteEl    = document.getElementById(`note${index}`);

                if (hasFullRow) {
                    $(qtyEl).css("border", "1px solid #ced4da");
                    $(noteEl).css("border", "1px solid #ced4da");
                    $("#delivery_order_details_message").hide();
                } else {
                    if (indexInput > -1) {
                        if (indexInput == index) {
                            if (qtyEl.value.trim() != "" || noteEl.value.trim() != "") {
                                $(qtyEl).css("border", "1px solid red");
                                $(noteEl).css("border", "1px solid red");
                                $("#delivery_order_details_message").show();
                            } else {
                                $(qtyEl).css("border", "1px solid #ced4da");
                                $(noteEl).css("border", "1px solid #ced4da");
                                $("#delivery_order_details_message").hide();
                            }
                        }

                        if (indexInput != index && (qtyEl.value.trim() == "" && noteEl.value.trim() == "")) {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(noteEl).css("border", "1px solid #ced4da");
                        } 
                    } else {
                        $(qtyEl).css("border", "1px solid red");
                        $(noteEl).css("border", "1px solid red");
                        $("#delivery_order_details_message").show();
                    }
                }
            });

            return hasFullRow;
        }

        function getPurchaseOrderDetail(purchaseOrder_RefID, purchaseOrderNumber) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getPurchaseOrderDetail") !!}?purchase_order_id=' + purchaseOrder_RefID,
                success: async function(data) {
                    if (Array.isArray(data) && data.length > 0) {
                        deliveryDate = data[0].deliveryDateTimeTZ;
                        let deliveryFroms = `(${data[0]['supplierCode']}) ${data[0]['supplierName']} - ${data[0]['supplierAddress']}`;
                        let deliveryToNonRefIDs = data[0]['deliveryTo_NonRefID'] ? data[0]['deliveryTo_NonRefID'].Address : '';

                        $("#purchase_order_id").val(purchaseOrder_RefID);
                        $("#purchase_order_number").val(purchaseOrderNumber);
                        $("#purchase_order_budget").val(`${data[0]['combinedBudgetCode']} - ${data[0]['combinedBudgetName']}`);

                        $("#var_combinedBudget_RefID").val(data[0].combinedBudget_RefID);

                        $("#purchase_order_delivery_from_duplicate").val(deliveryFroms);
                        $("#purchase_order_delivery_from").val(deliveryFroms);
                        $("#purchase_order_delivery_from_id_duplicate").val(data[0]['supplier_RefID']);
                        $("#purchase_order_delivery_from_id").val(data[0]['supplier_RefID']);
                        $("#purchase_order_delivery_from").prop("disabled", false);

                        $("#purchase_order_delivery_to").val(deliveryToNonRefIDs);
                        $("#purchase_order_delivery_to_duplicate").val(deliveryToNonRefIDs);
                        $("#purchase_order_delivery_to_id").val(data[0]['deliveryTo_RefID']);
                        $("#purchase_order_delivery_to_id_duplicate").val(data[0]['deliveryTo_RefID']);
                        $("#purchase_order_delivery_to").prop("disabled", false);

                        $("#purchase_order_delivery_from").css("border", "1px solid #ced4da");
                        $("#purchase_order_delivery_from_message").hide();

                        $("#purchase_order_delivery_to").css("border", "1px solid #ced4da");
                        $("#purchase_order_delivery_to_message").hide();

                        $("#purchase_order_number").css("border", "1px solid #ced4da");
                        $("#purchase_order_message").hide();

                        let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${purchaseOrderNumber}</td>`;

                        $.each(data, function(key, val) {
                            let balanced = currencyTotal(val.quantity);
                            let row = `
                                <tr>
                                    <input id="product_RefID${indexPurchaseOrderDetail}" value="${val.product_RefID}" type="hidden" />
                                    <input id="quantityUnit_RefID${indexPurchaseOrderDetail}" value="${val.quantityUnit_RefID}" type="hidden" />
                                    <input id="reference_ID${indexPurchaseOrderDetail}" value="${val.sys_ID}" type="hidden" />

                                    ${key === 0 ? modifyColumn : `<td style="display: none;">${purchaseOrderNumber}</td>`}
                                    <td style="text-align: center;">${val.combinedBudgetSectionCode + ' - ' + val.combinedBudgetSectionName}</td>
                                    <td style="text-align: center;">${val.productCode}</td>
                                    <td style="text-align: center;">${val.productName}</td>
                                    <td style="text-align: center;">${val.quantityUnitName}</td>
                                    <td style="text-align: center;">${currencyTotal(val.quantity)}</td>
                                    <td style="text-align: center;">${currencyTotal(val.qtyAvail)}</td>
                                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                        <input id="qty_req${indexPurchaseOrderDetail}" class="form-control number-without-negative" data-index=${indexPurchaseOrderDetail} autocomplete="off" style="border-radius:0px;" />
                                    </td>
                                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                        <input id="balance${indexPurchaseOrderDetail}" class="form-control number-without-negative" data-index=${indexPurchaseOrderDetail} data-default="${balanced}" value="${balanced}" autocomplete="off" style="border-radius:0px;" disabled />
                                    </td>
                                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                                        <textarea id="note${indexPurchaseOrderDetail}" class="form-control" data-index=${indexPurchaseOrderDetail}></textarea>
                                    </td>
                                </tr>
                            `;

                            $('#table_reference_type_detail tbody').append(row);

                            $(`#qty_req${indexPurchaseOrderDetail}`).on('keyup', function() {
                                var qty_req     = $(this).val().replace(/,/g, '');
                                var data_index  = $(this).data('index');
                                var result      = val.quantity - qty_req;

                                if (parseFloat(qty_req) > val.quantity) {
                                    $(this).val("");
                                    $(`#balance${data_index}`).val(balanced);
                                    ErrorNotif("Qty Request is over !");
                                } else {
                                    $(`#balance${data_index}`).val(result.toFixed(2));
                                    calculateTotal();
                                }

                                checkOneLineBudgetContents(data_index);
                            });

                            $(`#note${indexPurchaseOrderDetail}`).on('keyup', function() {
                                var data_index = $(this).data('index');

                                checkOneLineBudgetContents(data_index);
                            });

                            indexPurchaseOrderDetail += 1;
                        });
                    } else {

                    }
                },
                error: function (textStatus, errorThrown) {
                }
            });
        }

        $('#TableSearchPORevision').on('click', 'tbody tr', function () {
            let table   = $('#TableSearchPORevision').DataTable();
            let data    = table.row(this).data();

            if (data) {
                $("#mySearchPO").modal('toggle');

                let purchaseOrder_RefID = data.sys_ID;
                let purchaseOrderNumber = data.sys_Text;

                getPurchaseOrderDetail(purchaseOrder_RefID, purchaseOrderNumber);
            }
        });
    // END OF PURCHASE ORDER TYPE

    // START OF INTERNAL USE TYPE
        function calculateTotalInternalUse() {
            let total = 0;
            
            document.querySelectorAll('input[id^="internal_use_qty_req"]').forEach(function(input) {
                let value = parseFloat(input.value.replace(/,/g, '')); 
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('total_reference_number').textContent = decimalFormat(parseFloat(total));
        }
        
        function getBudgetDetails(site_code) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getBudget") !!}?site_code=' + site_code,
                success: function(data) {
                    if (Array.isArray(data) && data.length > 0) {
                        $.each(data, function(key, val) {
                            if (val.product_RefID) {
                                let row = `
                                    <tr>
                                        <input id="product_RefID${indexInternalUseDetail}" value="${val.product_RefID}" type="hidden" />
                                        <input id="quantityUnit_RefID${indexInternalUseDetail}" value="${val.quantityUnit_RefID}" type="hidden" />
                                        <input id="reference_ID${indexInternalUseDetail}" value="${val.sys_ID}" type="hidden" />

                                        <td style="text-align: center;">${val.combinedBudgetSectionCode} - ${val.combinedBudgetSectionName}</td>
                                        <td style="text-align: center;">${val.productCode}</td>
                                        <td style="text-align: center;">${val.productName}</td>
                                        <td style="text-align: center;">${val.quantityUnitName}</td>
                                        <td style="text-align: center;">${currencyTotal(val.quantity)}</td>
                                        <td style="text-align: center;">${currencyTotal(val.quantityRemaining)}</td>
                                        <td style="text-align: center;">${currencyTotal(val.priceBaseCurrencyValue)}</td>
                                        <td style="text-align: center;">${currencyTotal(val.quantity * val.priceBaseCurrencyValue)}</td>
                                        <td style="text-align: center;">-</td>
                                        <td style="text-align: center;">-</td>
                                        <td style="text-align: center;">-</td>
                                        <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                            <input id="internal_use_qty_req${indexInternalUseDetail}" class="form-control number-without-negative" data-index=${indexInternalUseDetail} autocomplete="off" style="border-radius:0px;" />
                                        </td>
                                        <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                            <input id="internal_use_balance_req${indexInternalUseDetail}" class="form-control number-without-negative" data-index=${indexInternalUseDetail} autocomplete="off" style="border-radius:0px;" readonly />
                                        </td>
                                        <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                            <textarea id="internal_use_note${indexInternalUseDetail}" data-index=${indexInternalUseDetail} class="form-control"></textarea>
                                        </td>
                                    </tr>
                                `;

                                $('#table_reference_type_detail tbody').append(row);

                                $(`#internal_use_qty_req${indexInternalUseDetail}`).on('keyup', function() {
                                    let qty_req     = $(this).val().replace(/,/g, '');
                                    let data_index  = $(this).data('index');
                                    let result      = val.quantityRemaining - qty_req;

                                    if (parseFloat(qty_req) > val.quantityRemaining) {
                                        $(this).val("");
                                        $(`#internal_use_balance_req${data_index}`).val("");
                                        ErrorNotif("Qty Request is over !");
                                    } else {
                                        $(`#internal_use_balance_req${data_index}`).val(result);
                                        calculateTotalInternalUse();
                                    }

                                    // checkOneLineBudgetContents(indexInternalUseDetail);
                                });

                                indexInternalUseDetail += 1;
                            }
                        });
                    } else {

                    }
                },
                error: function (textStatus, errorThrown) {
                }
            });
        }

        $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
            let sysId    = $(this).find('input[data-trigger="sys_id_site_second"]').val();
            let siteCode = $(this).find('td:nth-child(2)').text();
            let siteName = $(this).find('td:nth-child(3)').text();

            $("#internal_use_site_id").val(sysId);
            $("#internal_use_site_code").val(siteCode);
            $("#internal_use_site_name").val(siteName);

            $("#internal_use_site_code").css("border", "1px solid #ced4da");
            $("#internal_use_site_name").css("border", "1px solid #ced4da");
            $("#internal_use_site_message").hide();

            getBudgetDetails(sysId);

            $("#mySiteCodeSecond").modal('toggle');
        });
    // END OF INTERNAL USE TYPE

    // START OF STOCK MOVEMENT TYPE
        function calculateTotalStockMovement() {
            let total = 0;
            
            document.querySelectorAll('input[id^="stock_movement_qty_req"]').forEach(function(input) {
                let value = parseFloat(input.value.replace(/,/g, '')); 
                if (!isNaN(value)) {
                    total += value;
                }
            });

            document.getElementById('total_reference_number').textContent = decimalFormat(parseFloat(total));
        }

        function getStockDetail(deliveryFrom_RefID) {
            let stockMovementBudget_RefID = document.getElementById("stock_movement_budget_id");

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("DeliveryOrder.StockDetail") !!}?combinedBudget_RefID=' + stockMovementBudget_RefID.value + '&warehouse_RefID=' + deliveryFrom_RefID,
                success: async function(data) {
                    if (Array.isArray(data) && data.length > 0) {
                        $('#table_reference_type_detail tbody').empty();

                        $.each(data, function(key, val) {
                            let row = `
                                <tr>
                                    <input id="product_RefID${indexInternalUseDetail}" value="${val.Product_RefID}" type="hidden" />
                                    <input id="quantityUnit_RefID${indexInternalUseDetail}" value="${val.QuantityUnit_RefID}" type="hidden" />
                                    <input id="reference_ID${indexInternalUseDetail}" value="${val.Warehouse_RefID}" type="hidden" />

                                    <td style="text-align: center;">${val.ProductCode || '-'}</td>
                                    <td style="text-align: center;">${val.ProductName || '-'}</td>
                                    <td style="text-align: center;">${val.QuantityUnitName || '-'}</td>
                                    <td style="text-align: center;">${val.QuantityStok || '-'}</td>
                                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                        <input id="stock_movement_qty_req${key}" class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                                    </td>
                                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                        <input id="stock_movement_balance_req${key}" class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" readonly />
                                    </td>
                                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                        <textarea id="stock_movement_note_req${key}" class="form-control"></textarea>
                                    </td>
                                </tr>
                            `;

                            $('#table_reference_type_detail tbody').append(row);

                            $(`#stock_movement_qty_req${key}`).on('keyup', function() {
                                let qty_req     = $(this).val().replace(/,/g, '');
                                let result      = val.QuantityStok - qty_req;

                                if (parseFloat(qty_req) > val.QuantityStok) {
                                    $(this).val("");
                                    $(`#balance${key}`).val("");
                                    ErrorNotif("Qty Request is over !");
                                } else {
                                    $(`#balance${key}`).val(result.toFixed(2));
                                    calculateTotalStockMovement();
                                }

                                // checkOneLineBudgetContents(key);
                            });

                            $(`#stock_movement_note_req${key}`).on('keyup', function() {
                                // var data_index = $(this).data('index');

                                // checkOneLineBudgetContents(data_index);
                            });
                        });
                    }
                },
                error: function (textStatus, errorThrown) {
                }
            });
        }
    // END OF STOCK MOVEMENT TYPE

    $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        let projectCode = $(this).find('td:nth-child(2)').text();
        let projectName = $(this).find('td:nth-child(3)').text();

        if (referenceTypeValue.value == "1") {
            $("#internal_use_budget_id").val(sysId);
            $("#internal_use_budget_code").val(projectCode);
            $("#internal_use_budget_name").val(projectName);

            $("#internal_use_budget_code").css("border", "1px solid #ced4da");
            $("#internal_use_budget_name").css("border", "1px solid #ced4da");
            $("#internal_use_budget_message").hide();

            getSiteSecond(sysId);
        } else if (referenceTypeValue.value == "2") {
            $("#stock_movement_budget_id").val(sysId);
            $("#stock_movement_budget_code").val(projectCode);
            $("#stock_movement_budget_name").val(projectName);

            $("#stock_movement_budget_code").css("border", "1px solid #ced4da");
            $("#stock_movement_budget_name").css("border", "1px solid #ced4da");
            $("#stock_movement_budget_message").hide();
        }

        $("#var_combinedBudget_RefID").val(sysId);

        $("#myProjectSecond").modal('toggle');
    });

    $('#tableGetWorkerSecond').on('click', 'tbody tr', function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_worker_second"]').val();
        let workerName      = $(this).find('td:nth-child(2)').text();
        let workerPosition  = $(this).find('td:nth-child(3)').text();

        $("#stock_movement_requester_id").val(sysId);
        $("#stock_movement_requester_name").val(workerName);
        $("#stock_movement_requester_position").val(workerPosition);

        $("#stock_movement_requester_position").css("border", "1px solid #ced4da");
        $("#stock_movement_requester_name").css("border", "1px solid #ced4da");
        $("#stock_movement_requester_message").hide();

        $("#myWorkerSecond").modal('toggle');
    });

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function() {
        let id      = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        let name    = $(this).find('td:nth-child(2)').text();
        let address = $(this).find('td:nth-child(3)').text();

        if (referenceTypeValue.value == "1") {
            if (deliveryType == "from_internal_use") {
                $("#internal_use_delivery_from_id").val(id);
                $("#internal_use_delivery_from_name").val(name);
                $("#internal_use_delivery_from_address").val(address);

                $("#internal_use_delivery_from_name").css("border", "1px solid #ced4da");
                $("#internal_use_delivery_from_address").css("border", "1px solid #ced4da");
                $("#internal_use_delivery_from_message").hide();
            } else if (deliveryType == "to_internal_use") {
                $("#internal_use_delivery_to_id").val(id);
                $("#internal_use_delivery_to_name").val(name);
                $("#internal_use_delivery_to_address").val(address);

                $("#internal_use_delivery_to_name").css("border", "1px solid #ced4da");
                $("#internal_use_delivery_to_address").css("border", "1px solid #ced4da");
                $("#internal_use_delivery_to_message").hide();
            }
        } else if (referenceTypeValue.value == "2") {
            if (deliveryType == "from_stock_movement") {
                $("#stock_movement_delivery_from_id").val(id);
                $("#stock_movement_delivery_from_name").val(name);
                $("#stock_movement_delivery_from_address").val(address);

                $("#stock_movement_delivery_from_name").css("border", "1px solid #ced4da");
                $("#stock_movement_delivery_from_address").css("border", "1px solid #ced4da");
                $("#stock_movement_delivery_from_message").hide();

                getStockDetail(id);
            } else if (deliveryType == "to_stock_movement") {
                $("#stock_movement_delivery_to_id").val(id);
                $("#stock_movement_delivery_to_name").val(name);
                $("#stock_movement_delivery_to_address").val(address);

                $("#stock_movement_delivery_to_name").css("border", "1px solid #ced4da");
                $("#stock_movement_delivery_to_address").css("border", "1px solid #ced4da");
                $("#stock_movement_delivery_to_message").hide();
            }
        }

        $("#myGetModalWarehouses").modal('toggle');
    });

    $('#tableGetTransporter tbody').on('click', 'tr', function () {
        let sysId               = $(this).find('input[data-trigger="sys_id_transporter"]').val();
        let fax                 = $(this).find('input[data-trigger="fax_transporter"]').val();
        let phone               = $(this).find('input[data-trigger="phone_transporter"]').val();
        let email               = $(this).find('input[data-trigger="email_transporter"]').val();
        let phoneOffice         = $(this).find('input[data-trigger="office_phone_transporter"]').val();
        let address             = $(this).find('input[data-trigger="address_transporter"]').val();
        let transporterNames    = $(this).find('td:nth-child(2)').text();

        $("#transporter_id").val(sysId);
        $("#transporter_name").val(transporterNames);
        $("#transporter_phone").val(phone);
        $("#transporter_fax").val(fax);
        $("#transporter_contact").val(email);
        $("#transporter_handphone").val(phoneOffice);
        $("#transporter_address").val(address);

        $("#transporter_name").css("border", "1px solid #ced4da");
        $("#transporter_message").hide();
    });

    $('#purchase_order_delivery_from').on('input', function(e) {
        let deliveryFromDuplicate       = document.getElementById("purchase_order_delivery_from_duplicate");
        let deliveryFromDuplicateRefID  = document.getElementById("purchase_order_delivery_from_id_duplicate");

        if (e.target.value) {
            if (e.target.value == deliveryFromDuplicate.value) {
                $("#purchase_order_delivery_from_id").val(deliveryFromDuplicateRefID.value);
            } else {
                $("#purchase_order_delivery_from_id").val("");
            }

            $("#purchase_order_delivery_from").css("border", "1px solid #ced4da");
            $("#purchase_order_delivery_from_message").hide();
        } else {
            $("#purchase_order_delivery_from").css("border", "1px solid red");
            $("#purchase_order_delivery_from_message").show();
        }
    });

    $('#purchase_order_delivery_to').on('input', function(e) {
        let deliveryToDuplicate         = document.getElementById("purchase_order_delivery_to_duplicate");
        let deliveryToDuplicateRefID    = document.getElementById("purchase_order_delivery_to_id_duplicate");
        
        if (e.target.value) {
            if (e.target.value == deliveryToDuplicate.value) {
                $("#purchase_order_delivery_to_id").val(deliveryToDuplicateRefID.value);
            } else {
                $("#purchase_order_delivery_to_id").val("");
            }

            $("#purchase_order_delivery_to").css("border", "1px solid #ced4da");
            $("#purchase_order_delivery_to_message").hide();
        } else {
            $("#purchase_order_delivery_to").css("border", "1px solid red");
            $("#purchase_order_delivery_to_message").show();
        }
    });
</script>