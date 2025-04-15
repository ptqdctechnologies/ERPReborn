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
                                    <textarea id="note${indexPurchaseOrder}" class="form-control"></textarea>
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

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getPaymentTerm();
        getVAT();
    });
</script>