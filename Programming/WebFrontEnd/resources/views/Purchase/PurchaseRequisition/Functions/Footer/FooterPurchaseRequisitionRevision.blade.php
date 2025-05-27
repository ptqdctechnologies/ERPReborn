<script>
    let dataStore   = [];
    const siteCode  = document.getElementById('site_id_second');
    const dataTable = document.getElementById('data_table');

    function getDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                const result = data.find(({ name }) => name === "Purchase Requisition Revision Form");

                if (Object.keys(result).length > 0) {
                    $("#DocumentTypeID").val(result.sys_ID);
                } else {
                    console.log('error get document type');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
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

        document.getElementById('TotalBudgetSelected').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function getBudget(site_code, dataDetail) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + site_code,
            success: function(data) {
                $(".loadingPRDetails").hide();

                let tbody = $('#tableGetPRDetails tbody');
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
                    let balanced = currencyTotal(val2.quantity);
                    let totalBudget = val2.quantity * val2.priceBaseCurrencyValue;
                    let findDataDetail = dataDetail.find(el => el.product_RefID == val2.product_RefID && el.productName == val2.productName);
                    let productColumn = `
                        <td style="text-align: center;">${val2.product_RefID}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;
                    let componentsInput = `
                        <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" data-default="" ${isUnspecified} />
                        </td>
                        <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" data-default="" ${isUnspecified} />
                        </td>
                        <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" data-default="" disabled />
                        </td>
                        <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                            <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" data-default="${balanced}" value="${balanced}" disabled />
                        </td>
                        <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                            <textarea id="remark${key}" class="form-control" data-default=""></textarea>
                        </td>
                        <input id="purchase_requisition_detail${key}" value="null" type="hidden" />
                    `;

                    if (!val2.product_RefID) {
                        productColumn = `
                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly data-default="" />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name" data-default="${val2.productName}">${val2.productName}</td>
                        `;
                        isUnspecified = 'disabled';
                        balanced = '-';
                    }

                    if (findDataDetail) {
                        let balancedDetail = val2.quantity - findDataDetail.quantity;
                        componentsInput = `
                            <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" data-default="${currencyTotal(findDataDetail.quantity)}" value="${currencyTotal(findDataDetail.quantity)}" />
                            </td>
                            <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" data-default="${currencyTotal(findDataDetail.productUnitPriceCurrencyValue)}" value="${currencyTotal(findDataDetail.productUnitPriceCurrencyValue)}" />
                            </td>
                            <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled data-default="${currencyTotal(findDataDetail.priceCurrencyValue)}" value="${currencyTotal(findDataDetail.priceCurrencyValue)}" />
                            </td>
                            <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" data-default="${currencyTotal(balancedDetail)}" value="${currencyTotal(balancedDetail)}" disabled />
                            </td>
                            <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <textarea id="remark${key}" class="form-control" data-default="${findDataDetail.notes}">${findDataDetail.notes}</textarea>
                            </td>
                            <input id="purchase_requisition_detail${key}" value="${findDataDetail.sys_ID}" type="hidden" />
                        `;
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
                            <td style="text-align: center;">${currencyTotal(val2.quantityRemaining)}</td>
                            <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                            <td style="text-align: center;">${val2.priceBaseCurrencyISOCode || '-'}</td>
                            ${componentsInput}
                        </tr>
                    `;

                    tbody.append(row);

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

                            if (parseFloat(qty_req) > val2.quantity) {
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
                $('#tableGetPRDetails tbody').empty();
                $(".loadingPRDetails").hide();
                $(".errorMessageContainerPRDetails").show();
                $("#errorMessagePRDetails").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tablePRDetailList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[7];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('TotalBudgetSelected').innerText = "0.00";
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
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            ShowLoading();
            RevisionPurchaseRequest({...formatData, comment: result.value});
        });
    }

    function RevisionPurchaseRequest(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("PurchaseRequisition.UpdatePurchaseRequest") }}',
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
                HideLoading();
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function GetPRNumberDetail(dataDetail) {
        let totalPRNumberDetail = 0;

        let tbodyList = $('#tablePRDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            dataStore.push({
                productCode: val2.product_RefID,
                recordID: val2.sys_ID,
                entities: {
                    combinedBudgetSectionDetail_RefID: val2.cmbBudgetSectDtl_RefID,
                    product_RefID: val2.product_RefID,
                    quantity: val2.quantity,
                    quantityUnit_RefID: val2.quantityUnit_RefID,
                    productUnitPriceCurrency_RefID: val2.productUnitPriceCurrency_RefID,
                    productUnitPriceCurrencyValue: val2.productUnitPriceCurrencyValue,
                    productUnitPriceCurrencyExchangeRate: val2.productUnitPriceCurrencyExchangeRate,
                    remarks: val2.remarks
                },
            });

            let totalRequest = val2.quantity * val2.productUnitPriceCurrencyValue;

            let rowList = `
                <tr>
                    <input type="hidden" name="qty_avail[]" value="${currencyTotal(val2.combinedBudget_Quantity)}">
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.product_RefID}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantityUnitName}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.priceCurrencyISOCode}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.productUnitPriceCurrencyValue)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.quantity)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(totalRequest)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.notes}</td>
                </tr>
            `;

            tbodyList.append(rowList);

            totalPRNumberDetail += totalRequest;
        });

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(totalPRNumberDetail);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalPRNumberDetail);
    }

    $('#purchase-request-details-add').on('click', function() {
        const sourceTable = document.getElementById('tableGetPRDetails').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tablePRDetailList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const qtyInput                          = row.querySelector('input[id^="qty_req"]');
            const priceInput                        = row.querySelector('input[id^="price_req"]');
            const totalInput                        = row.querySelector('input[id^="total_req"]');
            const balanceInput                      = row.querySelector('input[id^="balanced_qty"]');
            const remarkInput                       = row.querySelector('textarea[id^="remark"]');
            const qtyUnitRefId                      = row.querySelector('input[id^="qtyId"]');
            const currencyRefId                     = row.querySelector('input[id^="currencyId"]');
            const combinedBudgetSectionDetailInput  = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const purchaseRequisitionDetail         = row.querySelector('input[id^="purchase_requisition_detail"]');

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

                const price = priceInput.value.trim();
                const qty = qtyInput.value.trim();
                const total = totalInput.value.trim();
                const remark = remarkInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[1].innerText.trim();
                    if (targetCode === productCode) {
                        targetRow.children[5].innerText = price;
                        targetRow.children[6].innerText = qty;
                        targetRow.children[7].innerText = total;
                        targetRow.children[8].innerText = remark;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.productCode == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                productCode: productCode,
                                recordID: parseInt(purchaseRequisitionDetail.value),
                                entities: {
                                    combinedBudgetSectionDetail_RefID: combinedBudgetSectionDetailInput.value,
                                    product_RefID: productCode,
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: qtyUnitRefId.value,
                                    productUnitPriceCurrency_RefID: currencyRefId.value,
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
                        <td style="text-align: center;padding: 0.8rem;">${productCode}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productName}</td>
                        <td style="text-align: center;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: center;padding: 0.8rem;">${currency}</td>
                        <td style="text-align: center;padding: 0.8rem;">${price}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: center;padding: 0.8rem;">${total}</td>
                        <td style="text-align: center;padding: 0.8rem;">${remark}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        productCode: productCode,
                        recordID: parseInt(purchaseRequisitionDetail.value),
                        entities: {
                            combinedBudgetSectionDetail_RefID: combinedBudgetSectionDetailInput.value,
                            product_RefID: productCode,
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: qtyUnitRefId.value,
                            productUnitPriceCurrency_RefID: currencyRefId.value,
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: 1,
                            fulfillmentDeadlineDateTimeTZ: null,
                            remarks: remark,
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
        $("#purchaseRequisitionDetail").val(JSON.stringify(dataStore));

        updateGrandTotal();
    });

    $('#purchase-request-details-reset').on('click', function() {
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
        $('input[id^="balanced_qty"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="remark"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tablePRDetailList tbody').empty();

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('purchaseRequisitionDetail').value = "";
        calculateTotal();
    });

    $("#FormRevisionPurchaseRequest").on("submit", function(e) {
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
                            $("#submitRevisionPR").prop("disabled", false);

                            CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
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
                        $("#submitRevisionPR").prop("disabled", false);
                        CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
                    }
                });
            }  else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/PurchaseRequisition?var=1');
            }
        })
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        const data = JSON.parse(dataTable.value);

        $(".errorMessageContainerPRDetails").hide();

        getDocumentType();
        GetPRNumberDetail(data);
        getBudget(siteCode.value, data);
    });
</script>