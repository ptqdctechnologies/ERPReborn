<script>
    let dataStore                   = [];
    let vat                         = document.getElementById("vatOption");
    const termOfPaymentID           = document.getElementById('termOfPaymentID');
    const vatOptionValue            = document.getElementById('vatOptionValue');
    const dataTable                 = {!! json_encode($detail ?? []) !!};
    const deliveryToID              = {!! json_encode($header['deliveryToID'] ?? []) !!};
    const deliveryToAddress         = {!! json_encode($header['deliveryTo'] ?? []) !!};
    const ppn                       = document.getElementById('ppn');
    const TotalBudgetSelecteds      = document.getElementById('TotalBudgetSelected');
    const TotalBudgetSelectedPpn    = document.getElementById('TotalBudgetSelectedPpn');
    const TotalPpns                 = document.getElementById('TotalPpn');

    $(".errorPurchaseOrderTable").hide();

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

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tablePurchaseOrderList tbody tr');
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

        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
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
                RevisionPurchaseOrder({...formatData, comment: result.value});
            }
        });
    }

    function RevisionPurchaseOrder(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
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
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;">' + res.documentNumber + '</span>',
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

    function CancelPurchaseOrder() {
        ShowLoading();
        window.location.href = '/PurchaseOrder?var=1';
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
                    remarks: val2.note,
                    productCode: val2.productCode
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
                    <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-total-request=${totalReq} data-default="${currencyTotal(val2.quantity || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.quantity || 0)}" />
                    </td>
                    <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="price_req${key}" data-index=${key} data-total-request=${totalReq} data-default="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}" />
                    </td>
                    <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="total_req${key}" data-default="${currencyTotal(totalReq || 0)}" autocomplete="off" style="border-radius:0px;" disabled value="${currencyTotal(totalReq || 0)}" />
                    </td>
                    <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="balance${key}" data-default="${currencyTotal(balanced || 0)}" autocomplete="off" style="border-radius:0px;" disabled value="${currencyTotal(balanced || 0)}" />
                    </td>
                    <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
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
            });

            let rowList = `
                <tr>
                    <input type="hidden" name="record_RefID[]" value="${val2.sys_ID}">
                    <input type="hidden" name="qty_avail[]" value="${currencyTotal(val2.quantity || 0)}">
                    <input type="hidden" name="price_avail[]" value="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}">
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 100px;">${val2.purchaseRequisitionNumber || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${val2.productCode + ' - ' + val2.productName}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 20px;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 40px;">${val2.productUnitPriceCurrencyISOCode || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 50px;">${currencyTotal(val2.quantity || 0)}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;width: 100px;">${currencyTotal(totalReq || 0)}</td> 
                    <td style="text-align: left;padding: 0.8rem 0.5rem;width: 150px;">${val2.note || '-'}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        let allTotal = totalRequest + parseFloat(dataDetail[0].tariffCurrencyValue.replace(/,/g, ''))

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(totalRequest);
        document.getElementById('TotalPpn').textContent = currencyTotal(dataDetail[0].tariffCurrencyValue);
        document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(allTotal);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalRequest);
    }

    function SubmitForm() {
        $('#purchaseOrderRevisionFormModal').modal('hide');

        var action = $("#FormSubmitRevisionPurchaseOrder").attr("action");
        var method = $("#FormSubmitRevisionPurchaseOrder").attr("method");
        var form_data = new FormData($("#FormSubmitRevisionPurchaseOrder")[0]);

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
                    $("#submitRevisionPurchaseOrder").prop("disabled", false);

                    CancelNotif("You don't have access", '/PurchaseOrder?var=1');
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
                $("#submitRevisionPurchaseOrder").prop("disabled", false);
                CancelNotif("You don't have access", '/PurchaseOrder?var=1');
            }
        });
    }

    $('#revision-po-details-add').on('click', function() {
        const sourceTable = document.getElementById('tablePurchaseOrderDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tablePurchaseOrderList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
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
                qtyInput && priceInput && totalInput && balanceInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== '' &&
                balanceInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
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

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const recordID = targetRow.children[0].value.trim();

                    if (recordID == recordRefID.value) {
                        targetRow.children[7].innerText = currencyTotal(price);
                        targetRow.children[8].innerText = currencyTotal(qty);
                        targetRow.children[9].innerText = currencyTotal(total);
                        targetRow.children[10].innerText = note;
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
                                    remarks: note,
                                    productCode: productCode
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
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${productCode + ' - ' + productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${uom}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${currency}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${price}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${note}</td>
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
                            remarks: note,
                            productCode: productCode
                        }
                    });
                }
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);
        $("#purchaseOrderDetail").val(JSON.stringify(dataStore));

        $('#tariffCurrencyValue').val(TotalPpns.textContent);

        updateGrandTotal();
    });

    $('#revision-po-details-reset').on('click', function() {
        dataStore = [];

        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="price_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="total_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="note"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tablePurchaseOrderList tbody').empty();
        if (vatOptionValue.value) {
            $('#vatOption').val(parseInt(vatOptionValue.value));
            $('#ppn').val("Yes");
            $('#containerValuePPN').show();
        } else {
            $('#vatOption').val("Select a PPN");
            $('#ppn').val("No");
            $('#containerValuePPN').hide();
        }

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('purchaseOrderDetail').value = "";
        calculateTotal();
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        if (vatOptionValue.value != "0.00") {
            $('#containerValuePPN').show();
        } else {
            $('#containerValuePPN').hide();
        }

        getPaymentTerm();
        getVAT();
        getDocumentType("Purchase Order Revision Form");
        viewPurchaseOrderDetail(dataTable);
    });

    $('#delivery_to').on('input', function(e) {
        if (e.target.value == deliveryToAddress) {
            $("#delivery_to_id").val(deliveryToID);
        } else {
            $("#delivery_to_id").val("");
        }
    });
</script>