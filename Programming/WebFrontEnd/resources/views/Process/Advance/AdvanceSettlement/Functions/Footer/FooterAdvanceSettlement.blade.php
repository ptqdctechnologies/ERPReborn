<script>
    var advanceID           = [];
    var advanceNumber       = [];
    var beneficiaryTrigger  = "";
    var indexAdvanceDetail  = 0;
    var totalAdvanceDetail  = 0;

    $(".loadingAdvanceSettlementTable").hide();
    $(".errorAdvanceSettlementTable").hide();

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_settlement"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalAdvanceDetail').textContent = currencyTotal(total);
    }

    function getAdvanceDetail(advanceRefID, advanceNumber) {
        $("#tableAdvanceDetail tbody").hide();
        $(".loadingAdvanceSettlementTable").show();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getAdvanceDetail") !!}?advanceRefID=' + advanceRefID,
            success: function(response) {
                $(".loadingAdvanceSettlementTable").hide();

                if (response.metadata.HTTPStatusCode === 200) {
                    $("#tableAdvanceDetail tbody").show();

                    var result = response.data;

                    let tbody = $('#tableAdvanceDetail tbody');

                    let modifyColumn = `<td rowspan="${result.length}" style="text-align: center; padding: 10px !important;">${advanceNumber}</td>`;

                    $.each(result, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="transNumber${indexAdvanceDetail}" name="transNumber${indexAdvanceDetail}" value="${advanceNumber}" type="hidden" />
                                <input id="productCode${indexAdvanceDetail}" name="productCode${indexAdvanceDetail}" value="${val2.product_RefID}" type="hidden" />
                                <input id="productName${indexAdvanceDetail}" name="productName${indexAdvanceDetail}" value="${val2.productName}" type="hidden" />
                                <input id="uom${indexAdvanceDetail}" name="uom${indexAdvanceDetail}" value="${val2.quantityUnitName}" type="hidden" />
                                <input id="currency${indexAdvanceDetail}" name="currency${indexAdvanceDetail}" value="${val2.productUnitPriceCurrencyISOCode}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center; padding: 10px !important;">${val2.product_RefID}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productUnitPriceCurrencyISOCode}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.productUnitPriceCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="qty_settlement${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="price_settlement${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="total_settlement${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px;" data-default="" readonly />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="balance${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px;" data-default="" readonly />
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_settlement${indexAdvanceDetail}`).on('keyup', function() {
                            var qty_settlement = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var price_settlement = $(`#price_settlement${data_index}`).val();
                            var total_settlements = parseFloat(qty_settlement || 0) * parseFloat(price_settlement.replace(/,/g, '') || 0);
                            var countBalance = data_total_request - total_settlements;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            if (qty_settlement > val2.quantity) {
                                $(this).val(0);
                                $(`#total_settlement${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Qty Settlement is over Qty Request !");
                            } else {
                                $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                                calculateTotal();
                            }
                        });

                        $(`#price_settlement${indexAdvanceDetail}`).on('keyup', function() {
                            var price_settlement = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('total-request');
                            var qty_settlement = $(`#qty_settlement${data_index}`).val();
                            var total_settlements = parseFloat(qty_settlement.replace(/,/g, '') || 0) * parseFloat(price_settlement || 0);
                            var countBalance = data_total_request - total_settlements;

                            countBalance = countBalance < 0.00 ? 0.00 : countBalance;

                            if (price_settlement > val2.productUnitPriceCurrencyValue) {
                                $(this).val(0);
                                $(`#total_settlement${data_index}`).val(0);
                                $(`#balance${data_index}`).val(0);
                                ErrorNotif("Price Settlement is over Price Request !");
                            } else {
                                $(`#total_settlement${data_index}`).val(currencyTotal(total_settlements));
                                $(`#balance${data_index}`).val(currencyTotal(countBalance));
                                $(`#TotalAdvanceDetail`).text(currencyTotal(totalAdvanceDetail));
                                calculateTotal();
                            }
                        });

                        indexAdvanceDetail += 1;
                    });
                } else {
                    console.log('error');
                    $(".errorAdvanceSettlementTable").show();
                    $("#errorAdvanceSettlementMessageTable").text(`Data not found.`);
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    $("#advance-details-add").on('click', function() {
        var totalAdvanceDetail = document.getElementById('TotalAdvanceDetail').textContent;
        
        $("#tableAdvanceDetail tbody tr").each(function(index) {
            var transNumber = $(this).find(`input[name="transNumber${index}"]`).val();
            var productCode = $(this).find(`input[name="productCode${index}"]`).val();
            var productName = $(this).find(`input[name="productName${index}"]`).val();
            var uom = $(this).find(`input[name="uom${index}"]`).val();
            var currency = $(this).find(`input[name="currency${index}"]`).val();
            var qtySettle = $(this).find(`input[id^="qty_settlement${index}"]`).val();
            var priceSettle = $(this).find(`input[id^="price_settlement${index}"]`).val();
            var totalSettle = $(this).find(`input[id^="total_settlement${index}"]`).val();
            var balance = $(this).find(`input[id^="balance${index}"]`).val();

            if (!qtySettle || !priceSettle) {
                return;
            }

            var rowToUpdate = null;

            $("#tableAdvanceList tbody tr").each(function() {
                var existingTransNumber = $(this).find("td:eq(0)").text();
                var existingProductCode = $(this).find("td:eq(1)").text();
                var existingProductName = $(this).find("td:eq(2)").text();
                var existingUOM = $(this).find("td:eq(3)").text();
                var existingCurrency = $(this).find("td:eq(4)").text();

                if (existingTransNumber === transNumber) {
                    if (existingProductCode === productCode && existingProductName === productName && existingUOM === uom && existingCurrency === currency) {
                        rowToUpdate = $(this);
                    }
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(5)").text(qtySettle);
                rowToUpdate.find("td:eq(6)").text(priceSettle);
                rowToUpdate.find("td:eq(7)").text(totalSettle);
                rowToUpdate.find("td:eq(8)").text(balance);
            } else {
                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${transNumber}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productCode}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currency}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtySettle)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(priceSettle)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(totalSettle)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(balance)}</td>
                </tr>`;

                $("#tableAdvanceList").find("tbody").append(newRow);
            }
        });

        document.getElementById('GrandTotal').textContent = totalAdvanceDetail;
    });

    $('#advance-details-reset').on('click', function() {
        $('input[id^="qty_settlement"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="price_settlement"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="total_settlement"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableAdvanceList tbody').empty();

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalAdvanceDetail').textContent = "0.00";
    });

    $('#tableGetModalAdvance').on('click', 'tbody tr', function() {
        var sysId               = $(this).find('input[data-trigger="sys_id_modal_advance"]').val();
        var bankAccount         = $(this).find('input[data-trigger="beneficiary_bank_account_name"]').val();
        var trano               = $(this).find('td:nth-child(2)').text();
        var beneficiary         = $(this).find('td:nth-child(3)').text();
        var requester           = $(this).find('td:nth-child(4)').text();
        var budgetCode          = $(this).find('td:nth-child(5)').text();
        var budgetName          = $(this).find('td:nth-child(6)').text();
        var subBudgetCode       = $(this).find('td:nth-child(7)').text();
        var subBudgetName       = $(this).find('td:nth-child(8)').text();
        var checkDoubleTrano    = advanceNumber.includes(trano);

        if (beneficiaryTrigger && beneficiaryTrigger === beneficiary && checkDoubleTrano === false) {
            advanceID.push(sysId);
            advanceNumber.push(trano);
            getAdvanceDetail(sysId, trano);
        } else if (beneficiaryTrigger && beneficiaryTrigger !== beneficiary && checkDoubleTrano === false) {
            Swal.fire("Error", "Beneficiary cannot be different !", "error");
        } else if (beneficiaryTrigger && beneficiaryTrigger === beneficiary && checkDoubleTrano === true) {
            Swal.fire("Error", "Advance number has been selected !", "error");
        }
        
        if (advanceNumber && advanceNumber.length === 0) {
            advanceID.push(sysId);
            advanceNumber.push(trano);
            beneficiaryTrigger = beneficiary;
            getAdvanceDetail(sysId, trano);
        }

        bankAccount = bankAccount.split(" ");

        $("#advance_id").val(advanceID.join(", "));
        $("#advance_number").val(advanceNumber.join(", "));
        $("#beneficiary_name").val(beneficiaryTrigger);
        $("#bank_name").val(bankAccount[0]);
        $("#bank_account").val(bankAccount[1]);

        document.getElementById("beneficiary_name").size = beneficiaryTrigger.length;
        document.getElementById("bank_name").size = bankAccount[0].length;
        document.getElementById("bank_account").size = bankAccount[1].length;

        $('#myGetModalAdvance').modal('hide');
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>