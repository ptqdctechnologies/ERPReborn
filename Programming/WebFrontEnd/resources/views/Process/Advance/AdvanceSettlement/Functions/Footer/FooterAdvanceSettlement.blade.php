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
                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center; padding: 10px !important;">-</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName}</td>
                                <td style="text-align: center; padding: 10px !important;">${val2.productUnitPriceCurrencyISOCode}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.productUnitPriceCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="qty_settlement${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="price_settlement${indexAdvanceDetail}" data-index=${indexAdvanceDetail} data-total-request=${val2.priceBaseCurrencyValue} autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="total_settlement${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px;" readonly />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" id="balance${indexAdvanceDetail}" autocomplete="off" style="border-radius:0px;" readonly />
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