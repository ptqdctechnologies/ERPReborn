<script>
    let dataStore   = [];
    const siteCode  = document.getElementById('site_id_second');
    const dataTable = document.getElementById('purchaseRequisitionDetail');

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
                const result = data.find(({ Name }) => Name === "Purchase Requisition Revision Form");

                if (Object.keys(result).length > 0) {
                    $("#DocumentTypeID").val(result.Sys_ID);
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

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
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
                        `;
                    }

                    let row = `
                        <tr>
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

    function GetPRNumberDetail(dataDetail) {
        let totalPRNumberDetail = 0;

        let tbodyList = $('#tablePRDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            dataStore.push({
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
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
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
        document.getElementById('TotalBudgetSelected').textContent = "0.00";
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