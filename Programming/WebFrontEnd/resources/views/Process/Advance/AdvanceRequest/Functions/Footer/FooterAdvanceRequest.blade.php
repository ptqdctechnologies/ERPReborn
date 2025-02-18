<script>
    var documentTypeID = $("#DocumentTypeID").val();
    var testing = '';

    $(".loadingBudgetDetails").hide();
    $(".errorMessageContainerBudgetDetails").hide();
    $("#mySiteCodeSecondTrigger").prop("disabled", true);
    $("#myWorkerSecondTrigger").prop("disabled", true);
    $("#beneficiary_second_popup").prop("disabled", true);
    $("#bank_list_popup_vendor").prop("disabled", true);
    $("#bank_accounts_popup_vendor").prop("disabled", true);
    $("#submitArf").prop("disabled", true);

    function getBudgetDetails(site_code) {
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

                $.each(data, function(key, val2) {
                    let isUnspecified = '';
                    let balanced = currencyTotal(val2.quantityRemaining);
                    let productColumn = `
                        <td style="text-align: center;">${val2.product_RefID}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;

                    if (val2.productName === "Unspecified Product") {
                        productColumn = `
                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name">${val2.productName}</td>
                        `;
                        isUnspecified = 'disabled';
                        balanced = '-';
                    }

                    let row = `
                        <tr>
                            <input name="productId" value="${val2.product_RefID}" type="hidden" />
                            <input name="productName" value="${val2.productName}" type="hidden" />
                            <input name="qtyId" value="${val2.quantityUnit_RefID}" type="hidden" />
                            <input name="qty" value="${val2.quantity}" type="hidden" />
                            <input name="price" value="${val2.priceBaseCurrencyValue}" type="hidden" />
                            <input name="uom" value="${val2.quantityUnitName}" type="hidden" />
                            <input name="currency" value="${val2.priceBaseCurrencyISOCode}" type="hidden" />
                            <input name="currencyId" value="${val2.sys_BaseCurrency_RefID}" type="hidden" />
                            <input name="combinedBudgetSectionDetail_RefID" value="${val2.sys_ID}" type="hidden" />
                            <input name="combinedBudget_RefID" value="${val2.combinedBudget_RefID}" type="hidden" />
                            
                            ${productColumn}
                            <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantityRemaining)}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${val2.priceBaseCurrencyISOCode}</td>
                            <td style="text-align: center;">${currencyTotal(val2.quantity * val2.priceBaseCurrencyValue)}</td>
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

                            if (parseFloat(qty_req) > val2.quantityRemaining) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Qty Req is over budget !");
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
                        } else {
                            $(`#total_req${key}`).val(currencyTotal(total_req));
                        }
                    });
                });
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetBudgetDetails tbody').empty();
                $(".loadingBudgetDetails").hide();
                $(".errorMessageContainerBudgetDetails").show();
                $("#errorMessageBudgetDetails").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();
        var projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("");

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectSecondTrigger").css({"display":"none"});

        try {
            var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID);

            if (checkWorkFlow) {
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);

                getSiteSecond(sysId);
                $("#mySiteCodeSecondTrigger").prop("disabled", false);
            }

            $("#loadingBudget").css({"display":"none"});
            $("#myProjectSecondTrigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

        $("#myWorkerSecondTrigger").prop("disabled", false);
        $("#beneficiary_second_popup").prop("disabled", false);
        $("#bank_list_popup_vendor").prop("disabled", false);
        $("#bank_accounts_popup_vendor").prop("disabled", false);
        $("#submitArf").prop("disabled", false);

        getBudgetDetails(sysId);
        $(".loadingBudgetDetails").show();
    });

    $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
        var personRefId = $(this).find('input[data-trigger="person_ref_id_beneficiary_second"]').val();

        testing = personRefId;
        getBankSecond(personRefId);

        $("#bank_name_second_name").val("");
        $("#bank_name_second_id").val("");
        $("#bank_name_second_detail").val("");

        $("#bank_accounts").val("");
        $("#bank_accounts_id").val("");
        $("#bank_accounts_detail").val("");
    });

    $('#tableGetBankSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_bank_second"]').val();

        getBankAccountData(sysId, testing);
    });

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

    document.addEventListener('keyup', (event) => {
        if (event.target.id?.startsWith('qty_req') || event.target.id?.startsWith('price_req')) {
            calculateTotal();
        }
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>