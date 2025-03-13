<script>
    var advanceID           = [];
    var advanceNumber       = [];
    var beneficiaryTrigger  = "";

    $(".loadingAdvanceSettlementTable").hide();
    $(".errorAdvanceSettlementTable").hide();

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
                                    <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; padding: 10px !important; width: 120px;">
                                    <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" readonly />
                                </td>
                            </tr>
                        `;

                        tbody.append(row);
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