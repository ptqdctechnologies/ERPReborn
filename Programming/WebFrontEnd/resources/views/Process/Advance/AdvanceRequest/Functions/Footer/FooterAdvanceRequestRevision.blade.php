<script>
    var date                                    = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    var dataAdvance                             = $.parseJSON('<?= json_encode($dataAdvanceList) ?>');
    var totalDataAdvance                        = 0;
    var var_recordIDDetail                      = [];
    var var_product_id                          = [];
    var var_product_name                        = [];
    var var_quantity                            = [];
    var var_uom                                 = [];
    var var_qty_id                              = [];
    var var_currency_id                         = [];
    var var_price                               = [];
    var var_total                               = [];
    var var_currency                            = [];
    var var_combinedBudgetSectionDetail_RefID   = [];

    function getBudgetDetails() {
        var site_code = document.getElementById('site_id_second').value;

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

                let existsInDatas = false;
                let indexing = 0;

                dataAdvance.forEach(function(advanceItem, advIndex) {
                    let existsInData = data.some(dataItem => dataItem.product_RefID == advanceItem.Product_RefID);
                    let balanced = currencyTotal(advanceItem.Quantity || 0);
                    let totalBudget = (advanceItem.Quantity || 0) * (advanceItem.PriceBaseCurrencyValue || 0);
                    
                    if (!existsInData) {
                        existsInDatas = true;
                        let key = data.length + advIndex;
                        
                        let row = `
                            <tr>
                                <input id="productId${indexing}" name="productId${indexing}" data-product-id="productId" value="${advanceItem.Product_RefID}" type="hidden" />
                                <input id="recordIDDetail${indexing}" name="recordIDDetail${indexing}" value="${advanceItem.Sys_ID_AdvanceDetail}" type="hidden" />
                                <input id="productName${indexing}" name="productName${indexing}" value="${advanceItem.ProductName}" type="hidden" />
                                
                                <td style="padding: 8px;">
                                    <div class="input-group">
                                        <input id="product_id${indexing}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly value="${advanceItem.Product_RefID}" />
                                        <div class="input-group-append">
                                            <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                                <a id="product_id2${indexing}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${indexing})">
                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td id="product_name${indexing}" style="text-align: center;text-wrap: auto;" name="product_name">${advanceItem.ProductName}</td>
                                <td style="text-align: center;">${currencyTotal(advanceItem.Quantity || 0)}</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">${currencyTotal(advanceItem.PriceBaseCurrencyValue || 0)}</td>
                                <td style="text-align: center;">${advanceItem.QuantityUnitName || '-'}</td>
                                <td style="text-align: center;">${advanceItem.priceBaseCurrencyISOCode || '-'}</td>
                                <td style="text-align: center;">${currencyTotal((advanceItem.Quantity || 0) * (advanceItem.PriceBaseCurrencyValue || 0))}</td>
                                <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="qty_req${indexing}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(advanceItem.Quantity || 0)}" />
                                </td>
                                <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="price_req${indexing}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(advanceItem.ProductUnitPriceBaseCurrencyValue || 0)}" />
                                </td>
                                <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="total_req${indexing}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled value="${currencyTotal(advanceItem.PriceBaseCurrencyValue || 0)}" />
                                </td>
                                <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="balanced_qty${indexing}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" value="${currencyTotal(advanceItem.Quantity || 0)}" disabled />
                                </td>
                            </tr>
                        `;

                        $(`#product_id${indexing}`).data('default', $(`#product_id${indexing}`).val());
                        $(`#product_name${indexing}`).data('default', $(`#product_name${indexing}`).text());
                        $(`#qty_req${indexing}`).data('default', $(`#qty_req${indexing}`).val());
                        $(`#price_req${indexing}`).data('default', $(`#price_req${indexing}`).val());
                        $(`#total_req${indexing}`).data('default', $(`#total_req${indexing}`).val());
                        $(`#balanced_qty${indexing}`).data('default', $(`#balanced_qty${indexing}`).val());

                        tbody.append(row);

                        $(`#product_id${indexing}`).on('input', function() {
                            if ($(this).val().trim() !== '') {
                                $(`#qty_req${indexing}, #price_req${indexing}`).prop('disabled', false);
                            } else {
                                $(`#qty_req${indexing}, #price_req${indexing}`).prop('disabled', true);
                            }
                        });

                        $(`#qty_req${indexing}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${indexing}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(qty_req || 0) + parseFloat(balanced);

                            if (parseFloat(qty_req) > advanceItem.Quantity) { // quantityRemaining
                                $(`#qty_req${indexing}`).val('');
                                $(`#total_req${indexing}`).val('');
                                ErrorNotif("Qty Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${indexing}`).val('');
                                $(`#total_req${indexing}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                $(`#total_req${indexing}`).val(currencyTotal(total_req));
                                $(`#balanced_qty${indexing}`).val(currencyTotal(total));
                            }
                        });

                        $(`#price_req${indexing}`).on('keyup', function() {
                            var price_req = $(this).val().replace(/,/g, '');
                            var qty_req = $(`#qty_req${indexing}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 0) * parseFloat(price_req || 1);
                            var total = parseFloat(price_req || 0) + parseFloat(advanceItem.PriceBaseCurrencyValue);

                            if (parseFloat(price_req) > advanceItem.PriceBaseCurrencyValue) {
                                $(`#price_req${indexing}`).val('');
                                $(`#total_req${indexing}`).val('');
                                ErrorNotif("Price Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#price_req${indexing}`).val('');
                                $(`#total_req${indexing}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                $(`#total_req${indexing}`).val(currencyTotal(total_req));
                            }
                        });

                        indexing += 1;
                    }
                });

                $.each(data, function(key, val2) {
                    let isUnspecified = '';
                    let balanced = currencyTotal(val2.quantity || 0);
                    let totalBudget = (val2.quantity || 0) * (val2.priceBaseCurrencyValue || 0);
                    let matchedAdvance = dataAdvance.find(advance => advance.Product_RefID == val2.product_RefID);
                    let row = '';
                    let productColumn = `
                        <td style="text-align: center;">${val2.product_RefID}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;

                    if (existsInDatas && !val2.product_RefID) {
                        return;
                    } else if (!existsInDatas && !val2.product_RefID) {
                        balanced = '-';
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
                    }

                    if (matchedAdvance) {
                        row = `
                            <tr>
                                <input id="productId${key}" name="productId${key}" data-product-id="productId" value="${val2.product_RefID}" type="hidden" />
                                <input id="recordIDDetail${key}" name="recordIDDetail${key}" value="${matchedAdvance.Sys_ID_AdvanceDetail}" type="hidden" />
                                <input id="productName${key}" name="productName${key}" value="${val2.productName}" type="hidden" />
                                <input id="qtyId${key}" name="qtyId${key}" value="${val2.quantityUnit_RefID || ''}" type="hidden" />
                                <input id="qty${key}" name="qty${key}" value="${val2.quantity || ''}" type="hidden" />
                                <input id="price${key}" name="price${key}" value="${val2.priceBaseCurrencyValue || ''}" type="hidden" />
                                <input id="uom${key}" name="uom${key}" value="${val2.quantityUnitName || ''}" type="hidden" />
                                <input id="currency${key}" name="currency${key}" value="${val2.priceBaseCurrencyISOCode || ''}" type="hidden" />
                                <input id="currencyId${key}" name="currencyId${key}" value="${val2.sys_BaseCurrency_RefID || ''}" type="hidden" />
                                <input id="combinedBudgetSectionDetail_RefID${key}" name="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID || ''}" type="hidden" />
                                <input id="combinedBudget_RefID${key}" name="combinedBudget_RefID${key}" value="${val2.combinedBudget_RefID || ''}" type="hidden" />
                                
                                <td style="text-align: center;">${val2.product_RefID || '-'}</td>
                                <td style="text-align: center;">${val2.productName || '-'}</td>
                                <td style="text-align: center;">${currencyTotal(val2.quantity || 0)}</td>
                                <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantityRemaining || 0)}</td>
                                <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue || 0)}</td>
                                <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                                <td style="text-align: center;">${val2.priceBaseCurrencyISOCode || '-'}</td>
                                <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                                <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(matchedAdvance.Quantity || 0)}" />
                                </td>
                                <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(matchedAdvance.ProductUnitPriceBaseCurrencyValue || 0)}" />
                                </td>
                                <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled value="${currencyTotal(matchedAdvance.PriceBaseCurrencyValue || 0)}" />
                                </td>
                                <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" value="${balanced}" disabled />
                                </td>
                            </tr>
                        `;
                    } else {
                        row = `
                            <tr>
                                <input id="productId${key}" name="productId${key}" data-product-id="productId" value="${val2.product_RefID}" type="hidden" />
                                <input id="recordIDDetail${key}" name="recordIDDetail${key}" value="null" type="hidden" />
                                <input id="productName${key}" name="productName${key}" value="${val2.productName}" type="hidden" />
                                <input id="qtyId${key}" name="qtyId${key}" value="${val2.quantityUnit_RefID || ''}" type="hidden" />
                                <input id="qty${key}" name="qty${key}" value="${val2.quantity || ''}" type="hidden" />
                                <input id="price${key}" name="price${key}" value="${val2.priceBaseCurrencyValue || ''}" type="hidden" />
                                <input id="uom${key}" name="uom${key}" value="${val2.quantityUnitName || ''}" type="hidden" />
                                <input id="currency${key}" name="currency${key}" value="${val2.priceBaseCurrencyISOCode || ''}" type="hidden" />
                                <input id="currencyId${key}" name="currencyId${key}" value="${val2.sys_BaseCurrency_RefID || ''}" type="hidden" />
                                <input id="combinedBudgetSectionDetail_RefID${key}" name="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID || ''}" type="hidden" />
                                <input id="combinedBudget_RefID${key}" name="combinedBudget_RefID${key}" value="${val2.combinedBudget_RefID || ''}" type="hidden" />
                                
                                ${productColumn}
                                <td style="text-align: center;">${currencyTotal(val2.quantity || 0)}</td>
                                <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantityRemaining || 0)}</td>
                                <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue || 0)}</td>
                                <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                                <td style="text-align: center;">${val2.priceBaseCurrencyISOCode || '-'}</td>
                                <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                                <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                                </td>
                                <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                                </td>
                                <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled />
                                </td>
                                <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                    <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" value="${balanced}" disabled />
                                </td>
                            </tr>
                        `;
                    }

                    $(`#product_id${key}`).data('default', $(`#product_id${key}`).val());
                    $(`#product_name${key}`).data('default', $(`#product_name${key}`).text());
                    $(`#qty_req${key}`).data('default', $(`#qty_req${key}`).val());
                    $(`#price_req${key}`).data('default', $(`#price_req${key}`).val());
                    $(`#total_req${key}`).data('default', $(`#total_req${key}`).val());
                    $(`#balanced_qty${key}`).data('default', $(`#balanced_qty${key}`).val());

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
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }
                        });
                    } else {
                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(qty_req || 0) + parseFloat(balanced);

                            if (parseFloat(qty_req) > val2.quantity) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Qty Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
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
                            $(`#total_req${key}`).val(currencyTotal(total_req));
                        }
                    });

                    indexing += 1;
                });

                $(".loadingBudgetDetails").hide();
                $(".errorMessageContainerBudgetDetails").hide();
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetBudgetDetails tbody').empty();
                $(".loadingBudgetDetails").hide();
                $(".errorMessageContainerBudgetDetails").show();
                $("#errorMessageBudgetDetails").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function budgetDetailsTable() {
        dataAdvance.forEach((datas, key) => {
            totalDataAdvance += +(datas.PriceBaseCurrencyValue);

            var_recordIDDetail.push(datas.Sys_ID_AdvanceDetail);
            var_product_id.push(datas.Product_RefID);
            var_product_name.push(datas.ProductName);
            var_quantity.push(datas.Quantity);
            var_uom.push(datas.QuantityUnitName);
            var_qty_id.push(datas.QuantityUnit_RefID);
            var_currency_id.push(datas.ProductUnitPriceCurrency_RefID);
            var_price.push(datas.ProductUnitPriceBaseCurrencyValue);
            var_total.push(datas.PriceBaseCurrencyValue);
            var_currency.push(datas.ProductUnitPriceCurrencyISOCode);
            var_combinedBudgetSectionDetail_RefID.push(datas.CombinedBudgetSectionDetail_RefID);

            var html =
                '<tr>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.Product_RefID + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.ProductName + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.QuantityUnitName + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + datas.ProductUnitPriceCurrencyISOCode + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + currencyTotal(datas.ProductUnitPriceBaseCurrencyValue) + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + currencyTotal(datas.Quantity) + '</td>' +
                '<td style="text-align: center; padding: 0.8rem 0px;">' + currencyTotal(datas.PriceBaseCurrencyValue) + '</td>' +
                '</tr>';

            $('#tableAdvanceList tbody').append(html);
            
            $("#TotalBudgetSelected").html(currencyTotal(totalDataAdvance));
            $("#GrandTotal").html(currencyTotal(totalDataAdvance));
        });

        document.getElementById('var_product_id').value                         = JSON.stringify(var_product_id);
        document.getElementById('var_product_name').value                       = JSON.stringify(var_product_name);
        document.getElementById('var_quantity').value                           = JSON.stringify(var_quantity);
        document.getElementById('var_uom').value                                = JSON.stringify(var_uom);
        document.getElementById('var_qty_id').value                             = JSON.stringify(var_qty_id);
        document.getElementById('var_currency_id').value                        = JSON.stringify(var_currency_id);
        document.getElementById('var_price').value                              = JSON.stringify(var_price);
        document.getElementById('var_total').value                              = JSON.stringify(var_total);
        document.getElementById('var_currency').value                           = JSON.stringify(var_currency);
        document.getElementById('var_combinedBudgetSectionDetail_RefID').value  = JSON.stringify(var_combinedBudgetSectionDetail_RefID);
    }

    function CancelAdvance() {
        ShowLoading();
        window.location.href = '/AdvanceRequest?var=1';
    }

    function AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID, comment, Sys_ID_Advance) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = {
            workFlowPath_RefID      : workFlowPath_RefID,
            nextApprover_RefID      : nextApprover_RefID,
            approverEntity_RefID    : approverEntity_RefID,
            documentTypeID          : documentTypeID,
            Sys_ID_Advance          : Sys_ID_Advance,
            comment                 : comment
        };

        $.ajax({
            type: 'POST',
            data: data,
            url: '{!! route("AdvanceRequest.updates") !!}',
            success: function(data) {
                HideLoading();

                if(data.status == 200){
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been updated',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        ShowLoading();
                        window.location.href = '/AdvanceRequest?var=1';
                    });
                } else{
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
            }
        });
    }

    function SelectWorkFlow(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID, Sys_ID_Advance) {
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
            AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID, result.value, Sys_ID_Advance);
        });
    }

    const calculateTotal = () => {
        const totalReqInputs = document.querySelectorAll('[id^="total_req"]');
        let total = 0;

        totalReqInputs.forEach(input => {
            let value = input.value.trim().replace(/,/g, '');
            let number = parseFloat(value);

            if (!isNaN(number)) {
                total += number;
            }
        });

        document.getElementById('TotalBudgetSelected').textContent = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    $("#tableGetBudgetDetails").on('keyup', function(event) {
        const targetId = event.target.id;
        if (targetId.startsWith('qty_req') || targetId.startsWith('price_req')) {
            calculateTotal();
        }
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $("#budget-details-add").on('click', function() {
        var totals = 0;
        var var_recordIDDetail = [];
        var var_product_id = [];
        var var_product_name = [];
        var var_quantity = [];
        var var_uom = [];
        var var_qty_id = [];
        var var_currency_id = [];
        var var_price = [];
        var var_total = [];
        var var_currency = [];
        var var_combinedBudgetSectionDetail_RefID = [];

        $("#tableGetBudgetDetails tbody tr").each(function(index) {
            var recordIDDetail                      = $(this).find(`input[name="recordIDDetail${index}"]`).val();
            var productId                           = $(this).find(`input[name="productId${index}"]`).val();
            var productName                         = $(this).find(`input[name="productName${index}"]`).val();
            var qtyId                               = $(this).find(`input[name="qtyId${index}"]`).val();
            var uom                                 = $(this).find(`input[name="uom${index}"]`).val();
            var currency                            = $(this).find(`input[name="currency${index}"]`).val();
            var currencyId                          = $(this).find(`input[name="currencyId${index}"]`).val();
            var qtyReq                              = $(this).find(`input[id^="qty_req${index}"]`).val();
            var priceReq                            = $(this).find(`input[id^="price_req${index}"]`).val();
            var totalReq                            = $(this).find(`input[id^="total_req${index}"]`).val();
            var combinedBudgetSectionDetail_RefID   = $(this).find(`input[id^="combinedBudgetSectionDetail_RefID${index}"]`).val();

            if (totalReq) {
                totalReq = totalReq.replace(/,/g, ""); 
            } else {
                totalReq = 0;
            }

            if (!productId || !qtyReq || !priceReq || !totalReq) {
                return;
            }

            totals += parseFloat(totalReq);

            var rowToUpdate = null;

            $("#tableAdvanceList tbody tr").each(function() {
                var existingProductId = $(this).find("td:eq(0)").text();
                var existingQty = $(this).find("td:eq(5)").text();
                var existingPrice = $(this).find("td:eq(4)").text();

                if (existingProductId === productId) {
                    if (existingQty === qtyReq && existingPrice === priceReq) {
                        rowToUpdate = $(this);
                    } else {
                        rowToUpdate = $(this);
                    }
                    return false;
                }
            });

            if (rowToUpdate) {
                var_recordIDDetail.push(recordIDDetail);
                var_product_id.push(productId);
                var_product_name.push(productName);
                var_quantity.push(currencyTotal(qtyReq));
                var_uom.push(uom);
                var_qty_id.push(qtyId);
                var_currency_id.push(currencyId);
                var_price.push(currencyTotal(priceReq));
                var_total.push(currencyTotal(totalReq));
                var_currency.push(currency);
                var_combinedBudgetSectionDetail_RefID.push(combinedBudgetSectionDetail_RefID);

                rowToUpdate.find("td:eq(0)").text(productId);
                rowToUpdate.find("td:eq(1)").text(productName);
                rowToUpdate.find("td:eq(2)").text(uom);
                rowToUpdate.find("td:eq(3)").text(currency);
                rowToUpdate.find("td:eq(4)").text(currencyTotal(priceReq));
                rowToUpdate.find("td:eq(5)").text(currencyTotal(qtyReq));
                rowToUpdate.find("td:eq(6)").text(currencyTotal(totalReq));
            } else {
                var_recordIDDetail.push(recordIDDetail);
                var_product_id.push(productId);
                var_product_name.push(productName);
                var_quantity.push(currencyTotal(qtyReq));
                var_uom.push(uom);
                var_qty_id.push(qtyId);
                var_currency_id.push(currencyId);
                var_price.push(currencyTotal(priceReq));
                var_total.push(currencyTotal(totalReq));
                var_currency.push(currency);
                var_combinedBudgetSectionDetail_RefID.push(combinedBudgetSectionDetail_RefID);

                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productId}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currency}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(priceReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtyReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(totalReq)}</td>
                </tr>`;

                $("#tableAdvanceList").find("tbody").append(newRow);
            }
        });

        document.getElementById('GrandTotal').textContent = totals.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        document.getElementById('var_recordIDDetail').value = JSON.stringify(var_recordIDDetail);
        document.getElementById('var_product_id').value = JSON.stringify(var_product_id);
        document.getElementById('var_product_name').value = JSON.stringify(var_product_name);
        document.getElementById('var_quantity').value = JSON.stringify(var_quantity);
        document.getElementById('var_uom').value = JSON.stringify(var_uom);
        document.getElementById('var_qty_id').value = JSON.stringify(var_qty_id);
        document.getElementById('var_currency_id').value = JSON.stringify(var_currency_id);
        document.getElementById('var_price').value = JSON.stringify(var_price);
        document.getElementById('var_total').value = JSON.stringify(var_total);
        document.getElementById('var_currency').value = JSON.stringify(var_currency);
        document.getElementById('var_combinedBudgetSectionDetail_RefID').value = JSON.stringify(var_combinedBudgetSectionDetail_RefID);
    });

    $('#budget-details-reset').on('click', function() {
        $('input[id^="product_id"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="product_name"]').each(function() {
            $(this).text($(this).data('default'));
        });
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
        $(`#var_product_id`).val("");
        $(`#var_product_name`).val("");
        $(`#var_quantity`).val("");
        $(`#var_uom`).val("");
        $(`#var_qty_id`).val("");
        $(`#var_currency_id`).val("");
        $(`#var_price`).val("");
        $(`#var_total`).val("");
        $(`#var_currency`).val("");
        $(`#var_combinedBudgetSectionDetail_RefID`).val("");
        $('#tableAdvanceList tbody').empty();

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalBudgetSelected').textContent = "0.00";
    });

    $("#FormUpdateAdvance").on("submit", function(e) {
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
            ShowLoading();

            if (result.value) {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]); 
                var form = $(this);

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
                            $("#submitArf").prop("disabled", false);

                            CancelNotif("You don't have access", '/AdvanceRequest?var=1');
                        } else if (response.message == "MoreThanOne") {
                            $('#getWorkFlow').modal('toggle');

                            var t = $('#tableGetWorkFlow').DataTable();
                            t.clear();
                            $.each(response.data, function(key, val) {
                                t.row.add([
                                    '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\', \'' + response.Sys_ID_Advance + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                    '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                                ]).draw();
                            });
                        } else {
                            SelectWorkFlow(response.workFlowPath_RefID, response.nextApprover_RefID, response.approverEntity_RefID, response.documentTypeID, response.Sys_ID_Advance);
                        }
                    },
                    error: function(response) {
                        HideLoading();
                        $("#submitArf").prop("disabled", false);

                        CancelNotif("You don't have access", '/AdvanceRequest?var=1');
                    }
                });
            } else {
                HideLoading();

                CancelNotif("Data Cancel Inputed", '/AdvanceRequest?var=1');
            }
        });
    });

    $(window).one('load', function(e) {
        getBudgetDetails();
        budgetDetailsTable();

        $("#var_date").val(date);
    });
</script>