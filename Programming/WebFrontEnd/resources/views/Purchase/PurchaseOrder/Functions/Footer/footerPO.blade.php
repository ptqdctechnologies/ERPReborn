<script>
    var indexPurchaseOrder          = 0;
    var totalPurchaseOrder          = 0;
    var vat                         = document.getElementById("vatOption");
    const msrIDList                 = [];
    const ppn                       = document.getElementById('ppn');
    const TotalBudgetSelecteds      = document.getElementById('TotalBudgetSelected');
    const TotalBudgetSelectedPpn    = document.getElementById('TotalBudgetSelectedPpn');
    const TotalPpns                 = document.getElementById('TotalPpn');
    const downPaymentValue          = document.getElementById('downPaymentValue');
    
    downPaymentValue.addEventListener('input', function () {
        let value = parseInt(this.value);
        if (value > 100) this.value = 100;
        if (value < 0) this.value = 0;
    });

    ppn.addEventListener('change', function () {
        if (this.value == "Yes") {
            $('#containerValuePPN').show();
        } else {
            TotalBudgetSelectedPpn.textContent = TotalBudgetSelecteds.textContent;
            TotalPpns.textContent = "0.00";
            $('#vatOption').val('Select a PPN');
            $('#containerValuePPN').hide();
        }
    });

    $('#containerValuePPN').hide();
    $(".loadingPurchaseOrderTable").hide();
    $(".errorPurchaseOrderTable").hide();
    
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
                    $('#vatOption').append('<option disabled selected value="Select a PPN">Select a PPN</option>');

                    data.forEach(function(project) {
                        $('#vatOption').append('<option value="' + project.sys_PID + '">' + project.tariffFixRate + '</option>');
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

        if (vat.options[vat.selectedIndex].text !== "Select a PPN" && total > 0) {
            let result = (vat.options[vat.selectedIndex].text / 100) * total;

            document.getElementById('TotalPpn').textContent = currencyTotal(result);
            document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
            document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(result + total);
        } else {
            document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
            document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(total);
        }
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
            success: function(data) {
                $(".loadingPurchaseOrderTable").hide();

                if (data && Array.isArray(data) && data.length > 0) {
                    $("#tablePurchaseOrderDetail tbody").show();

                    let tbody = $('#tablePurchaseOrderDetail tbody');

                    let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${purchase_requisition_number}</td>`;

                    $.each(data, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="msr_number${indexPurchaseOrder}" value="${purchase_requisition_number}" type="hidden" />
                                <input id="product_code${indexPurchaseOrder}" value="${val2.product_RefID}" type="hidden" />
                                <input id="product_name${indexPurchaseOrder}" value="${val2.productName}" type="hidden" />
                                <input id="qty_msr${indexPurchaseOrder}" value="${val2.quantity}" type="hidden" />
                                <input id="qty_available${indexPurchaseOrder}" value="${val2.quantity}" type="hidden" />
                                <input id="uom${indexPurchaseOrder}" value="${val2.quantityUnitName}" type="hidden" />
                                <input id="unit_price${indexPurchaseOrder}" value="${val2.productUnitPriceBaseCurrencyValue}" type="hidden" />
                                <input id="currency${indexPurchaseOrder}" value="${val2.priceCurrencyISOCode}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center; padding: 10px !important;">${val2.sys_ID}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productName}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center; padding: 10px !important;">-</td>
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

                            if (qty_req > val2.quantity) {
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

                            if (price_req > val2.productUnitPriceCurrencyValue) {
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
                    console.log('error');
                    $(".errorPurchaseOrderTable").show();
                    $("#errorPurchaseOrderMessageTable").text(`Data not found.`);
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    $('#tableGetModalPurchaseRequisition').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_modal_purchase_requisition"]').val();
        var trano = $(this).find('td:nth-child(2)').text();
        var checkDoubleMsrID    = msrIDList.includes(sysId);

        if (checkDoubleMsrID) {
            Swal.fire("Error", "MSR number has been selected !", "error");
        } else {
            msrIDList.push(sysId);
            getDetailPurchaseRequisition(trano, sysId);
        }
    });

    $('#purchase-details-add').on('click', function() {
        $("#tablePurchaseOrderDetail tbody tr").each(function(index) {
            var msrNumber       = $(this).find(`input[id="msr_number${index}"]`).val();
            var productCode     = $(this).find(`input[id="product_code${index}"]`).val();
            var productName     = $(this).find(`input[id="product_name${index}"]`).val();
            var qtyMSR          = $(this).find(`input[id="qty_msr${index}"]`).val();
            var qtyAvailable    = $(this).find(`input[id="qty_available${index}"]`).val();
            var uom             = $(this).find(`input[id="uom${index}"]`).val();
            var unitPrice       = $(this).find(`input[id="unit_price${index}"]`).val();
            var currency        = $(this).find(`input[id="currency${index}"]`).val();
            var priceReq        = $(this).find(`input[id="price_req${index}"]`).val();
            var qtyReq          = $(this).find(`input[id="qty_req${index}"]`).val();
            var totalReq        = $(this).find(`input[id="total_req${index}"]`).val();
            var remark          = $(this).find(`textarea[id="note${index}"]`).val();

            if (!qtyReq && !priceReq) {
                return;
            }

            var rowToUpdate = null;

            $("#tablePurchaseOrderList tbody tr").each(function() {
                var existingMSRNumber   = $(this).find("td:eq(0)").text();
                var existingProductCode = $(this).find("td:eq(1)").text();
                var existingProductName = $(this).find("td:eq(2)").text();
                var existingUOM         = $(this).find("td:eq(3)").text();
                var existingCurrency    = $(this).find("td:eq(4)").text();

                if (existingMSRNumber === msrNumber) {
                    if (existingProductCode === productCode && existingProductName === productName && existingUOM === uom && existingCurrency === currency) {
                        rowToUpdate = $(this);
                    }
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(5)").text(priceReq);
                rowToUpdate.find("td:eq(6)").text(qtyReq);
                rowToUpdate.find("td:eq(7)").text(totalReq);
                rowToUpdate.find("td:eq(8)").text(remark);
            } else {
                var newRow = `
                    <tr>
                        <td style="text-align: center; padding: 0.8rem 0px;">${msrNumber}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${productCode}</td>
                        <td style="text-align: center; padding: 0.8rem 0px; text-wrap: auto;">${productName}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${currency}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(priceReq)}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtyReq)}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(totalReq)}</td>
                        <td style="text-align: center; padding: 0.8rem 0px;">${remark || '-'}</td>
                    </tr>
                `;

                $("#tablePurchaseOrderList").find("tbody").append(newRow);
            }
        });

        document.getElementById('GrandTotal').textContent = TotalBudgetSelectedPpn.textContent;
    });

    $('#purchase-details-reset').on('click', function() {
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
        $('#vatOption').val('Select a PPN');
        $('#ppn').val('No');
        $('#containerValuePPN').hide();

        document.getElementById('TotalPpn').textContent = "0.00";
        document.getElementById('TotalBudgetSelected').textContent = "0.00";
        document.getElementById('TotalBudgetSelectedPpn').textContent = "0.00";
        document.getElementById('GrandTotal').textContent = "0.00";
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getPaymentTerm();
        getVAT();
    });
</script>