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

    $('#containerValuePPN').hide();
    $(".loadingPurchaseOrderTable").hide();
    $(".errorPurchaseOrderTable").hide();
    $("#supplier_code2").prop("disabled", true);

    function checkTableDataPO() {
        const isMSRNumberNotEmpty                   = msrNumber.value.trim() !== '';
        const isDeliveryToNotEmpty                  = deliveryTo.value.trim() !== '';
        const isSupplierCodeNotEmpty                = supplierCode.value.trim() !== '';
        const isDownPaymentValueNotEmpty            = downPaymentValue.value.trim() !== '';
        const isTermOfPaymentOptionValueNotEmpty    = termOfPaymentOption.value.trim() !== 'Select a TOP';
        const isTableNotEmpty                       = tablePurchaseOrderLists.rows.length > 0;

        if (isMSRNumberNotEmpty && isDeliveryToNotEmpty && isSupplierCodeNotEmpty && isDownPaymentValueNotEmpty && isTermOfPaymentOptionValueNotEmpty && isTableNotEmpty) {
            submitPurchaseOrder.disabled = false;
        } else {
            submitPurchaseOrder.disabled = true;
        }
    }

    if (tablePurchaseOrderLists && msrNumber && deliveryTo && supplierCode && downPaymentValue && termOfPaymentOption) {
        const observertablePurchaseOrderList = new MutationObserver(checkTableDataPO);
        observertablePurchaseOrderList.observe(tablePurchaseOrderLists, { childList: true });

        msrNumber.addEventListener('input', checkTableDataPO);
        deliveryTo.addEventListener('input', checkTableDataPO);
        supplierCode.addEventListener('input', checkTableDataPO);
        downPaymentValue.addEventListener('input', checkTableDataPO);
        termOfPaymentOption.addEventListener('change', checkTableDataPO);
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
                                ErrorNotif("Qty Req is over Qty Avail !");
                            } else {
                                $(`#total_req${data_index}`).val(currencyTotal(total_req));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                calculateTotal();
                            }
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
                                ErrorNotif("Price Req is over Unit Price !");
                            } else {
                                $(`#total_req${data_index}`).val(currencyTotal(total_req));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                calculateTotal();
                            }
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

    function CancelPurchaseOrder() {
        ShowLoading();
        window.location.href = '/PurchaseOrder?var=1';
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
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#7A7A73',
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

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tablePurchaseOrderList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[8];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        // document.getElementById('TotalPpn').textContent = currencyTotal(0.00);
        // document.getElementById('TotalBudgetSelected').textContent = currencyTotal(0.00);
        // document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(0.00);
        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function SubmitForm() {
        $('#purchaseOrderFormModal').modal('hide');

        var action = $("#FormSubmitPurchaseOrder").attr("action");
        var method = $("#FormSubmitPurchaseOrder").attr("method");
        var form_data = new FormData($("#FormSubmitPurchaseOrder")[0]);

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

                    CancelNotif("You don't have access", '/PurchaseOrder?var=1');
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

    $('#tableGetModalPurchaseRequisition').on('click', 'tbody tr', function () {
        const $row  = $(this);
        const sysId = $row.find('input[data-trigger="sys_id_modal_purchase_requisition"]').val();
        const trano = $row.find('td:nth-child(2)').text();

        getDetailPurchaseRequisition(trano, sysId);
    });

    $('#purchase-details-add').on('click', function() {
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
                qtyInput && priceInput && totalInput && balanceInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== '' &&
                balanceInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
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
                    const targetDocNumber = targetRow.children[2].innerText.trim();
                    const targetCode = targetRow.children[1].value.trim();

                    if (targetDocNumber === documentNumber && targetCode === productCode) {
                        targetRow.children[6].innerText = price;
                        targetRow.children[7].innerText = qty;
                        targetRow.children[8].innerText = total;
                        targetRow.children[9].innerText = note;
                        found = true;

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
                                    remarks: note,
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
                        <td style="text-align: center;padding: 0.8rem;">${documentNumber}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productCode + ' - ' + productName}</td>
                        <td style="text-align: center;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: center;padding: 0.8rem;">${currency}</td>
                        <td style="text-align: center;padding: 0.8rem;">${price}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: center;padding: 0.8rem;">${total}</td>
                        <td style="text-align: center;padding: 0.8rem;">${note}</td>
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
                            remarks: note,
                            documentNumber: documentNumber,
                            product_RefID: productCode
                        }
                    });
                }

                // qtyInput.value = '';
                // priceInput.value = '';
                // totalInput.value = '';
                // noteInput.value = '';
                // balanceInput.value = balanceInput.getAttribute('data-default');
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);
        $("#purchaseOrderDetail").val(JSON.stringify(dataStore));

        updateGrandTotal();

        // document.getElementById('GrandTotal').textContent = TotalBudgetSelecteds.innerText;
        // document.getElementById('TotalPpn').textContent = currencyTotal(0.00);
        // document.getElementById('TotalBudgetSelected').textContent = currencyTotal(0.00);
        // document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(0.00);
    });

    $('#purchase-details-reset').on('click', function() {
        const targetTableBody = document.querySelector('#tablePurchaseOrderList tbody');

        targetTableBody.innerHTML = '';

        dataStore = [];

        document.getElementById('GrandTotal').innerText = '0.00';

        $("#purchaseOrderDetail").val("");
    });

    if (tablePurchaseOrderLists) {
        // document.querySelector('#tablePurchaseOrderList tbody').addEventListener('click', function (e) {
        //     const row = e.target.closest('tr');
        //     if (!row) return;

        //     if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;

        //     const qtyAvail      = row.children[0];
        //     const priceAvail    = row.children[10];
        //     const priceCell     = row.children[6];
        //     const qtyCell       = row.children[7];
        //     const totalCell     = row.children[8];
        //     const remarkCell    = row.children[9];

        //     if (row.classList.contains('editing-row')) {
        //         const newPrice  = priceCell.querySelector('input')?.value || '';
        //         const newQty    = qtyCell.querySelector('input')?.value || '';
        //         const newTotal  = totalCell.querySelector('input')?.value || '';
        //         const newRemark = remarkCell.querySelector('textarea')?.value || '';

        //         priceCell.innerHTML = newPrice;
        //         qtyCell.innerHTML   = newQty;
        //         totalCell.innerHTML = newTotal;

        //         const hidden = remarkCell.querySelector('input[type="hidden"]');
        //         remarkCell.innerHTML = `${newRemark}`;
        //         if (hidden) remarkCell.appendChild(hidden);

        //         row.classList.remove('editing-row');

        //         const documentNumber = row.children[1].innerText.trim();
        //         const productCode = row.children[2].innerText.trim();
        //         const storeItem = dataStore.find(item => item.entities.documentNumber === documentNumber && item.entities.product_RefID === productCode);

        //         if (storeItem) {
        //             storeItem.entities.quantity = parseFloat(newQty.replace(/,/g, ''));
        //             storeItem.entities.productUnitPriceCurrencyValue = parseFloat(newPrice.replace(/,/g, ''));
        //             storeItem.entities.remarks = newRemark;

        //             $("#purchaseOrderDetail").val(JSON.stringify(dataStore));
        //         }
        //     } else {
        //         const currentPrice = priceCell.innerText.trim();
        //         const currentQty = qtyCell.innerText.trim();
        //         const currentTotal = totalCell.innerText.trim();

        //         const hiddenInput = remarkCell.querySelector('input[type="hidden"]');
        //         const currentRemark = remarkCell.childNodes[0]?.nodeValue?.trim() || '';

        //         priceCell.innerHTML = `<input class="form-control number-without-negative price-input" value="${currentPrice}" autocomplete="off" style="border-radius:0px;width:100px;">`;
        //         qtyCell.innerHTML = `<input class="form-control number-without-negative qty-input" value="${currentQty}" autocomplete="off" style="border-radius:0px;width:100px;">`;
        //         totalCell.innerHTML = `<input class="form-control number-without-negative total-input" value="${currentTotal}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;
        //         remarkCell.innerHTML = `
        //             <textarea class="form-control" style="width:100px;">${currentRemark}</textarea>
        //         `;
        //         if (hiddenInput) remarkCell.appendChild(hiddenInput);

        //         row.classList.add('editing-row');

        //         const priceInput = priceCell.querySelector('.price-input');
        //         const qtyInput = qtyCell.querySelector('.qty-input');
        //         const totalInput = totalCell.querySelector('.total-input');

        //         function updateTotal() {
        //             var price = parseFloat(priceInput.value.replace(/,/g, '')) || 0;
        //             var qty = parseFloat(qtyInput.value.replace(/,/g, '')) || 0;
        //             var total = price * qty;

        //             const qtyAvailValue = parseFloat(qtyAvail?.value.replace(/,/g, '')) || 0;
        //             const priceAvailValue = parseFloat(priceAvail?.value.replace(/,/g, '')) || 0;

        //             if (qty > qtyAvailValue) {
        //                 total = price * qtyAvailValue;
        //                 qty = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        //                 qtyInput.value = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        //                 ErrorNotif("Qty Req is over Qty Avail !");
        //             }

        //             if (price > priceAvailValue) {
        //                 total               = priceAvailValue * qtyAvailValue;
        //                 price               = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        //                 priceInput.value    = priceAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

        //                 ErrorNotif("Price Req is over Price Avail !");
        //             }

        //             totalInput.value = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        //         }

        //         priceInput.addEventListener('input', updateTotal);
        //         qtyInput.addEventListener('input', updateTotal);

        //         document.getElementById('GrandTotal').innerText = totalInput.value;
        //     }

        //     updateGrandTotal();
        // });
    }

    $("#FormSubmitPurchaseOrder").on("submit", function(e) {
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
                        if (response.message == "WorkflowError") {
                            HideLoading();
                            $("#submitPurchaseOrder").prop("disabled", false);

                            CancelNotif("You don't have access", '/PurchaseOrder?var=1');
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
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/PurchaseOrder?var=1');
            }
        });
    });

    $('#delivery_to').on('input', function(e) {
        if (e.target.value == deliveryToDuplicate.value) {
            $("#deliveryTo_RefID").val(deliveryToDuplicateRefID.value);
        } else {
            $("#deliveryTo_RefID").val("");
        }
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getPaymentTerm();
        getVAT();
        getDocumentType("Purchase Order Form");
    });
</script>