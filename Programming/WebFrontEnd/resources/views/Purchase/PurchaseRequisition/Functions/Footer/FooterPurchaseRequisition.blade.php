<script>
    let dataStore                   = [];
    const budgetCode                = document.getElementById("project_code_second");
    const siteCode                  = document.getElementById("site_code_second");
    const deliverCode               = document.getElementById("deliverCode");
    const dateDelivery              = document.getElementById("dateCommance");

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

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tablePurchaseRequisitionList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[8];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total (${rows[0].children[9].value}): ${decimalFormat(total)}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tableGetBudgetDetails').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tablePurchaseRequisitionList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const productCodeShow = row.querySelector('input[id^="productCodeShow"]');
            const qtyInput = row.querySelector('input[id^="qty_req"]');
            const priceInput = row.querySelector('input[id^="price_req"]');
            const totalInput = row.querySelector('input[id^="total_req"]');
            const balanceInput = row.querySelector('input[id^="balanced_qty"]');
            const remarkInput = row.querySelector('textarea[id^="remark"]');
            const qtyUnitRefId = row.querySelector('input[id^="qtyId"]');
            const currencyRefId = row.querySelector('input[id^="currencyId"]');
            const combinedBudgetSectionDetailInput = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');

            if (
                qtyInput && priceInput && totalInput && balanceInput && 
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== '' &&
                balanceInput.value.trim() !== ''
            ) {
                const productCode = row.children[0].value.trim();
                const productName = row.children[1].value.trim();
                const uom = row.children[5].value.trim();
                const currency = row.children[6].value.trim();
                const qtyAvail = row.children[13].innerText.trim();
                const priceAvail = row.children[15].innerText.trim();

                const price = priceInput.value.trim();
                const qty = qtyInput.value.trim();
                const total = totalInput.value.trim();
                const remark = remarkInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[2].innerText.trim();
                    
                    if (targetCode == productCode) {
                        targetRow.children[6].innerText = price;
                        targetRow.children[7].innerText = qty;
                        targetRow.children[8].innerText = total;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.product_RefID == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailInput.value),
                                    product_RefID: parseInt(productCode),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                                    productUnitPriceCurrency_RefID: parseInt(currencyRefId.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: 1,
                                    fulfillmentDeadlineDateTimeTZ: null,
                                    remarks: remark || null
                                }
                            };
                        }
                        break;
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                        <input type="hidden" name="price_avail[]" value="${priceAvail}">
                        <td style="text-align: center;padding: 0.8rem 0.5rem;" hidden>${productCode}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 80px;">${productCodeShow.value}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;"width: 50px;>${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${total}</td>
                        <input type="hidden" name="currency[]" value="${currency}">
                    `;
                    targetTable.appendChild(newRow);

                    // push to dataStore
                    dataStore.push({
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailInput.value),
                            product_RefID: parseInt(productCode),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                            productUnitPriceCurrency_RefID: parseInt(currencyRefId.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: 1,
                            fulfillmentDeadlineDateTimeTZ: null,
                            remarks: remark || null
                        }
                    });
                }
            } else {
                const productCode   = row.children[0].value.trim();
                const productName   = row.children[1].value.trim();
                const existingRows  = targetTable.getElementsByTagName('tr');
                
                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[2]?.innerText?.trim();
                    const targetName = targetRow.children[4]?.innerText?.trim();

                    if (targetCode == productCode && targetName == productName) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => item.entities.product_RefID != productCode);
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        updateGrandTotal();
    }

    function validationForm() {
        const isBudgetCodeNotEmpty      = budgetCode.value.trim() !== '';
        const isSiteCodeNotEmpty        = siteCode.value.trim() !== '';
        const isDeliverCodeNotEmpty     = deliverCode.value.trim() !== '';
        const isDateDeliveryNotEmpty    = dateDelivery.value.trim() !== '';
        const isTableNotEmpty           = checkOneLineBudgetContents();

        if (isBudgetCodeNotEmpty && isSiteCodeNotEmpty && isDeliverCodeNotEmpty && isDateDeliveryNotEmpty && isTableNotEmpty) {
            $('#purchaseRequestFormModal').modal('show');
            summaryData();
        } else {
            if (!isBudgetCodeNotEmpty && !isSiteCodeNotEmpty && !isDeliverCodeNotEmpty && !isDateDeliveryNotEmpty) {
                $("#project_code_second").css("border", "1px solid red");
                $("#project_name_second").css("border", "1px solid red");
                $("#site_code_second").css("border", "1px solid red");
                $("#site_name_second").css("border", "1px solid red");
                $("#deliverCode").css("border", "1px solid red");
                $("#deliverName").css("border", "1px solid red");
                $("#dateCommance").css("border", "1px solid red");
                
                $("#budgetMessage").show();
                $("#subBudgetMessage").show();
                $("#deliveryToMessage").show();
                $("#dateOfDeliveryMessage").show();
                // Swal.fire("Please Complete the Form", "Budget, Sub Budget, Delivery To, and Date of Delivery cannot be empty.", "error");
                return;
            } 
            if (!isBudgetCodeNotEmpty) {
                $("#project_code_second").css("border", "1px solid red");
                $("#project_name_second").css("border", "1px solid red");
                $("#budgetMessage").show();
                // Swal.fire("Please Complete the Form", "Budget cannot be empty.", "error");
                return;
            }
            if (!isSiteCodeNotEmpty) {
                $("#site_code_second").css("border", "1px solid red");
                $("#site_name_second").css("border", "1px solid red");
                $("#subBudgetMessage").show();
                // Swal.fire("Please Complete the Form", "Sub Budget cannot be empty.", "error");
                return;
            } 
            if (!isDeliverCodeNotEmpty) {
                $("#deliverCode").css("border", "1px solid red");
                $("#deliverName").css("border", "1px solid red");
                $("#deliveryToMessage").show();
                // Swal.fire("Please Complete the Form", "Delivery To cannot be empty.", "error");
                return;
            } 
            if (!isDateDeliveryNotEmpty) {
                $("#dateCommance").css("border", "1px solid red");
                $("#dateOfDeliveryMessage").show();
                // Swal.fire("Please Complete the Form", "Date of Delivery cannot be empty.", "error");
                return;
            }
            if (!isTableNotEmpty) {
                $("#budgetDetailsMessage").show();
                // Swal.fire("Please Complete the Form", "Budget Details must be filled in at least 1 item.", "error");
                return;
            }
        }
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

        document.getElementById('TotalBudgetSelected').textContent = decimalFormat(total);
    }

    function getBudgetDetails(site_code) {
        $('#tableGetBudgetDetails tbody').empty();
        $(".errorMessageContainerBudgetDetails").hide();

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
                    let productColumn = `
                        <td style="text-align: center;">${val2.productCode}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;

                    if (val2.productName === "Unspecified Product") {
                        productColumn = `
                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name">${val2.productName}</td>
                        `;
                        isUnspecified = 'disabled';
                        balanced = '-';
                    }

                    let row = `
                        <tr>
                            <input id="productId${key}" data-product-id="productId" value="${val2.product_RefID}" type="hidden" />
                            <input id="productName${key}" value="${val2.productName}" type="hidden" />
                            <input id="qtyId${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                            <input id="qty${key}" value="${val2.quantity}" type="hidden" />
                            <input id="price${key}" value="${val2.priceBaseCurrencyValue}" type="hidden" />
                            <input id="uom${key}" value="${val2.quantityUnitName}" type="hidden" />
                            <input id="currency${key}" value="${val2.priceBaseCurrencyISOCode}" type="hidden" />
                            <input id="currencyId${key}" value="${val2.sys_BaseCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                            <input id="combinedBudget_RefID${key}" value="${val2.combinedBudget_RefID}" type="hidden" />
                            
                            ${productColumn}
                            <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantityRemaining)}</td>
                            <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                            <td style="text-align: center;">${val2.priceBaseCurrencyISOCode}</td>
                            <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                            </td>
                            <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                            </td>
                            <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;" readonly />
                            </td>
                            <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;" data-default="${balanced}" value="${balanced}" readonly />
                            </td>
                            <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <textarea id="remark${key}" class="form-control"></textarea>
                            </td>

                            <input id="productCodeShow${key}" data-product-id="productCodeShow" value="${val2.productCode}" type="hidden" />
                        </tr>
                    `;

                    tbody.append(row);

                    $(`#product_id${key}`).data('default', $(`#product_id${key}`).val());
                    $(`#product_name${key}`).data('default', $(`#product_name${key}`).text());
                    $(`#qty_req${key}`).data('default', $(`#qty_req${key}`).val());
                    $(`#price_req${key}`).data('default', $(`#price_req${key}`).val());
                    $(`#total_req${key}`).data('default', $(`#total_req${key}`).val());
                    $(`#balanced_qty${key}`).data('default', $(`#balanced_qty${key}`).val());

                    if (val2.productName === "Unspecified Product") {
                        $(`#product_id${key}`).on('input', function() {
                            if ($(this).val().trim() !== '') {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', false);
                            } else {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', true);
                            }
                        });

                        $(`#qty_req${key}`).on('keyup', function() {
                            let qty_req     = $(this).val().replace(/,/g, '');
                            let price_req   = $(`#price_req${key}`).val().replace(/,/g, '');
                            let total_req   = parseFloat(qty_req || 0) * parseFloat(price_req || 1);

                            if (!qty_req) {
                                $(`#qty_req${key}`).val('');
                                if (total_req == 0) {
                                    $(`#total_req${key}`).val(decimalFormat(parseFloat(price_req || 0)));
                                } else {
                                    $(`#total_req${key}`).val(decimalFormat(total_req));
                                }
                                calculateTotal();
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }

                            checkOneLineBudgetContents(key);
                        });
                    } else {
                        $(`#qty_req${key}`).on('keyup', function() {
                            let qty_req     = $(this).val().replace(/,/g, '');
                            let price_req   = $(`#price_req${key}`).val().replace(/,/g, '');
                            let total_req   = parseFloat(qty_req || 0) * parseFloat(price_req || 1);
                            let total       = parseFloat(balanced) - parseFloat(qty_req || 0);

                            if (parseFloat(qty_req) > val2.quantityRemaining) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                $(`#balanced_qty${key}`).val(balanced);
                                ErrorNotif("Qty Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                $(`#balanced_qty${key}`).val(balanced);
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                if (total_req == 0) {
                                    $(`#total_req${key}`).val(decimalFormat(parseFloat(price_req || 0)));
                                } else {
                                    $(`#total_req${key}`).val(decimalFormat(total_req));
                                }
                                calculateTotal();
                                $(`#balanced_qty${key}`).val(decimalFormat(total));
                            }

                            checkOneLineBudgetContents(key);
                        });
                    }

                    $(`#price_req${key}`).on('keyup', function() {
                        let price_req   = $(this).val().replace(/,/g, '');
                        let qty_req     = $(`#qty_req${key}`).val().replace(/,/g, '');
                        let total_req   = parseFloat(qty_req || 1) * parseFloat(price_req || 0);
                        let total       = parseFloat(price_req || 0) + parseFloat(val2.priceBaseCurrencyValue);

                        if (parseFloat(price_req) > val2.priceBaseCurrencyValue) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Price Req is over budget !");
                        } else if (parseFloat(qty_req * price_req) > totalBudget) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Total Req is over budget !");
                        } else {
                            if (total_req == 0) {
                                $(`#total_req${key}`).val(decimalFormat(parseFloat(qty_req || 0)));
                            } else {
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }
                            calculateTotal();
                        }

                        checkOneLineBudgetContents(key);
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
                PurchaseRequisitionStore({...formatData, comment: result.value});
            }
        });
    }

    function PurchaseRequisitionStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("PurchaseRequisition.store") }}',
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
                        window.location.href = '/PurchaseRequisition?var=1';
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

    function CancelPurchaseRequisition() {
        ShowLoading();
        window.location.href = '/PurchaseRequisition?var=1';
    }

    function SubmitForm() {
        $('#purchaseRequestFormModal').modal('hide');

        let action = $('#FormSubmitPurchaseRequisition').attr("action");
        let method = $('#FormSubmitPurchaseRequisition').attr("method");
        let form_data = new FormData($('#FormSubmitPurchaseRequisition')[0]);
        form_data.append('purchaseRequisitionDetail', JSON.stringify(dataStore));

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
                    $("#submitPR").prop("disabled", false);
                    CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
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

                    SelectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                $("#submitPR").prop("disabled", false);
                CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
            }
        });
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        let projectCode     = $(this).find('td:nth-child(2)').text();
        let projectName     = $(this).find('td:nth-child(3)').text();
        let documentTypeID  = $("#DocumentTypeID").val();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("");

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectSecondTrigger").css({"display":"none"});

        try {
            let checkWorkFlow = await checkingWorkflow(sysId, documentTypeID);

            if (checkWorkFlow) {
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);
                $("#myProjectSecondTrigger").prop("disabled", true);
                $("#myProjectSecondTrigger").css("cursor", "not-allowed");
                $("#project_code_second").css("border", "1px solid #ced4da");
                $("#project_name_second").css("border", "1px solid #ced4da");
                $("#budgetMessage").hide();

                $("#var_combinedBudget_RefID").val(sysId);

                getSiteSecond(sysId);
                $("#mySiteCodeSecondTrigger").prop("disabled", false);
            }

            $("#loadingBudget").css({"display":"none"});
            $("#myProjectSecondTrigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        let sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

        getBudgetDetails(sysId);
        $("#site_code_second").css("border", "1px solid #ced4da");
        $("#site_name_second").css("border", "1px solid #ced4da");
        $("#subBudgetMessage").hide();
        $(".loadingBudgetDetails").show();
        $("#deliverModalTrigger").prop("disabled", false);
    });

    $('#tableGetDeliverTo').on('click', 'tbody tr', function() {
        $("#deliverCode").css("border", "1px solid #ced4da");
        $("#deliverName").css("border", "1px solid #ced4da");
        $("#deliveryToMessage").hide();
    });

    $('#dateCommance').on('change', function() {
        $("#dateCommance").css("border", "1px solid #ced4da");
        $("#dateOfDeliveryMessage").hide();
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType("Purchase Requisition Form");

        $(".loadingBudgetDetails").hide();
        $(".errorMessageContainerBudgetDetails").hide();
        $("#deliverModalTrigger").prop("disabled", true);
        $("#mySiteCodeSecondTrigger").prop("disabled", true);
        
        $("#budgetMessage").hide();
        $("#subBudgetMessage").hide();
        $("#deliveryToMessage").hide();
        $("#dateOfDeliveryMessage").hide();
        $("#budgetDetailsMessage").hide();
    });
</script>