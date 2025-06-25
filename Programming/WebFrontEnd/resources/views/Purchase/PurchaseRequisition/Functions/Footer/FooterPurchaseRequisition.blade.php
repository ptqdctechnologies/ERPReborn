<script>
    var dataStore                   = [];
    var TotalBudgetSelected         = document.getElementById('TotalBudgetSelected');
    const siteCode                  = document.getElementById("site_code_second");
    const deliverCode               = document.getElementById("deliverCode");
    const dateDelivery              = document.getElementById("dateCommance");
    const tablePurchaseRequestLists = document.querySelector("#tablePurchaseRequisitionList tbody");

    $(".loadingBudgetDetails").hide();
    $(".errorMessageContainerBudgetDetails").hide();
    $("#submitPR").prop("disabled", true);
    $("#deliverModalTrigger").prop("disabled", true);
    $("#mySiteCodeSecondTrigger").prop("disabled", true);

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
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
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled />
                            </td>
                            <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" data-default="${balanced}" value="${balanced}" disabled />
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
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(qty_req || 0) + parseFloat(balanced);

                            if (!qty_req) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }
                        });
                    } else {
                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(balanced) - parseFloat(qty_req || 0);

                            if (parseFloat(qty_req) > val2.quantityRemaining) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Qty Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                                $(`#balanced_qty${key}`).val(currencyTotal(total));
                            }
                        });
                    }

                    $(`#price_req${key}`).on('keyup', function() {
                        var price_req = $(this).val().replace(/,/g, '');
                        var qty_req = $(`#qty_req${key}`).val().replace(/,/g, '');
                        var total_req = parseFloat(qty_req || 0) * parseFloat(price_req || 1);
                        var total = parseFloat(price_req || 0) + parseFloat(val2.priceBaseCurrencyValue);

                        if (parseFloat(price_req) > val2.priceBaseCurrencyValue) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Price Req is over budget !");
                        } else if (parseFloat(qty_req * price_req) > totalBudget) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Total Req is over budget !");
                        } else {
                            calculateTotal();
                            $(`#total_req${key}`).val(currencyTotal(total_req));
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
            PurchaseRequisitionStore({...formatData, comment: result.value});
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

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tablePurchaseRequisitionList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[9];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('TotalBudgetSelected').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function validationForm() {
        const isSiteCodeNotEmpty        = siteCode.value.trim() !== '';
        const isDeliverCodeNotEmpty     = deliverCode.value.trim() !== '';
        const isDateDeliveryNotEmpty    = dateDelivery.value.trim() !== '';
        const isTableNotEmpty           = tablePurchaseRequestLists.rows.length > 0;

        if (isSiteCodeNotEmpty && isDeliverCodeNotEmpty && isDateDeliveryNotEmpty && isTableNotEmpty) {
            $("#submitPR").prop("disabled", false);
        } else {
            $("#submitPR").prop("disabled", true);
        }
    }

    if (siteCode) {
        siteCode.addEventListener('input', validationForm);
    }

    if (deliverCode) {
        deliverCode.addEventListener('input', validationForm);
    }

    if (dateDelivery) {
        dateDelivery.addEventListener('input', validationForm);
    }

    if (tablePurchaseRequestLists) {
        const observertablePurchaseRequestList = new MutationObserver(validationForm);
        observertablePurchaseRequestList.observe(tablePurchaseRequestLists, { childList: true });

        document.querySelector('#tablePurchaseRequisitionList tbody').addEventListener('click', function (e) {
            const row = e.target.closest('tr');
            if (!row) return;

            if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;

            const qtyAvail = row.children[0];
            const priceAvail = row.children[1];
            const priceCell = row.children[7];
            const qtyCell = row.children[8];
            const totalCell = row.children[9];
            const remarkCell = row.children[10];

            if (row.classList.contains('editing-row')) {
                const newPrice = priceCell.querySelector('input')?.value || '';
                const newQty = qtyCell.querySelector('input')?.value || '';
                const newTotal = totalCell.querySelector('input')?.value || '';
                const newRemark = remarkCell.querySelector('textarea')?.value || '';

                priceCell.innerHTML = newPrice;
                qtyCell.innerHTML = newQty;
                totalCell.innerHTML = newTotal;

                const hidden = remarkCell.querySelector('input[type="hidden"]');
                remarkCell.innerHTML = `${newRemark}`;
                if (hidden) remarkCell.appendChild(hidden);

                row.classList.remove('editing-row');

                const productCode = row.children[2].innerText.trim();
                const storeItem = dataStore.find(item => item.entities.product_RefID === productCode);
                if (storeItem) {
                    storeItem.quantity = newQty;
                    storeItem.productUnitPriceCurrencyValue = newPrice;
                    storeItem.remarks = newRemark;
                }
            } else {
                const currentPrice = priceCell.innerText.trim();
                const currentQty = qtyCell.innerText.trim();
                const currentTotal = totalCell.innerText.trim();

                const hiddenInput = remarkCell.querySelector('input[type="hidden"]');
                const currentRemark = remarkCell.childNodes[0]?.nodeValue?.trim() || '';

                priceCell.innerHTML = `<input class="form-control number-without-negative price-input" value="${currentPrice}" autocomplete="off" style="border-radius:0px;width:100px;">`;
                qtyCell.innerHTML = `<input class="form-control number-without-negative qty-input" value="${currentQty}" autocomplete="off" style="border-radius:0px;width:100px;">`;
                totalCell.innerHTML = `<input class="form-control number-without-negative total-input" value="${currentTotal}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;
                remarkCell.innerHTML = `
                    <textarea class="form-control" style="width:100px;">${currentRemark}</textarea>
                `;
                if (hiddenInput) remarkCell.appendChild(hiddenInput);

                row.classList.add('editing-row');

                const priceInput = priceCell.querySelector('.price-input');
                const qtyInput = qtyCell.querySelector('.qty-input');
                const totalInput = totalCell.querySelector('.total-input');

                function updateTotal() {
                    var price = parseFloat(priceInput.value.replace(/,/g, '')) || 0;
                    var qty = parseFloat(qtyInput.value.replace(/,/g, '')) || 0;
                    var total = price * qty;

                    const qtyAvailValue = parseFloat(qtyAvail?.value.replace(/,/g, '')) || 0;
                    const priceAvailValue = parseFloat(priceAvail?.value.replace(/,/g, '')) || 0;

                    if (qty > qtyAvailValue) {
                        total = price * qtyAvailValue;
                        qty = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        qtyInput.value = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                        ErrorNotif("Qty Req is over Qty Avail !");
                    }

                    if (price > priceAvailValue) {
                        total = priceAvailValue * qtyAvailValue;
                        price = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        priceInput.value = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                        ErrorNotif("Price Req is over Price Avail !");
                    }

                    totalInput.value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                }

                priceInput.addEventListener('input', updateTotal);
                qtyInput.addEventListener('input', updateTotal);

                document.getElementById('GrandTotal').innerText = totalInput.value;
            }

            updateGrandTotal();
        });
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        var projectCode     = $(this).find('td:nth-child(2)').text();
        var projectName     = $(this).find('td:nth-child(3)').text();
        var documentTypeID  = $("#DocumentTypeID").val();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("");

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectSecondTrigger").css({"display":"none"});

        try {
            var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID);

            if (checkWorkFlow) {
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);

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
        var sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

        getBudgetDetails(sysId);
        $(".loadingBudgetDetails").show();
        $("#deliverModalTrigger").prop("disabled", false);
    });

    $("#budget-details-add").on('click', function() {
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
                qtyInput && priceInput && totalInput && balanceInput && remarkInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== '' &&
                balanceInput.value.trim() !== '' &&
                remarkInput.value.trim() !== ''
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
                        targetRow.children[7].innerText = price;
                        targetRow.children[8].innerText = qty;
                        targetRow.children[9].innerText = total;
                        targetRow.children[10].innerText = remark;
                        found = true;

                        // update dataStore
                        const indexToUpdate = dataStore.findIndex(item => item.entities.product_RefID === productCode);
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
                                    remarks: remark
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
                        <td style="text-align: center;padding: 0.8rem;" hidden>${productCode}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productCodeShow.value}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productName}</td>
                        <td style="text-align: center;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: center;padding: 0.8rem;">${currency}</td>
                        <td style="text-align: center;padding: 0.8rem;">${price}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: center;padding: 0.8rem;">${total}</td>
                        <td style="text-align: center;padding: 0.8rem;">${remark}</td>
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
                            remarks: remark
                        }
                    });
                }

                qtyInput.value = '';
                priceInput.value = '';
                totalInput.value = '';
                remarkInput.value = '';
                balanceInput.value = balanceInput.getAttribute('data-default');
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        updateGrandTotal();
    });

    $("#budget-details-reset").on('click', function() {
        const targetTableBody = document.querySelector('#tablePurchaseRequisitionList tbody');

        targetTableBody.innerHTML = '';

        dataStore = [];

        document.getElementById('GrandTotal').innerText = '0.00';
    });

    $("#FormSubmitPurchaseRequisition").on("submit", function(e) {
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
                        $("#submitPR").prop("disabled", false);
                        CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/PurchaseRequisition?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType("Purchase Requisition Form");
    });
</script>