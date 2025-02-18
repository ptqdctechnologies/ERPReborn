<script>
    var documentTypeID = $("#DocumentTypeID").val();
    var testing = '';

    $(".loadingBudgetDetails").hide();
    $(".errorMessageContainerBudgetDetails").hide();
    $("#mySiteCodeSecondTrigger").prop("disabled", true);
    $("#myWorkerSecondTrigger").prop("disabled", true);
    $("#myBeneficiarySecondTrigger").prop("disabled", true);
    $("#myGetBankSecondTrigger").prop("disabled", true);
    $("#myBankAccountTrigger").prop("disabled", true);
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
                            <input id="productId${key}" name="productId${key}" data-product-id="productId" value="${val2.product_RefID}" type="hidden" />
                            <input id="productName${key}" name="productName${key}" value="${val2.productName}" type="hidden" />
                            <input id="qtyId${key}" name="qtyId${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                            <input id="qty${key}" name="qty${key}" value="${val2.quantity}" type="hidden" />
                            <input id="price${key}" name="price${key}" value="${val2.priceBaseCurrencyValue}" type="hidden" />
                            <input id="uom${key}" name="uom${key}" value="${val2.quantityUnitName}" type="hidden" />
                            <input id="currency${key}" name="currency${key}" value="${val2.priceBaseCurrencyISOCode}" type="hidden" />
                            <input id="currencyId${key}" name="currencyId${key}" value="${val2.sys_BaseCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" name="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                            <input id="combinedBudget_RefID${key}" name="combinedBudget_RefID${key}" value="${val2.combinedBudget_RefID}" type="hidden" />
                            <input id="quantityUnit_RefID${key}" name="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                            
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
        $("#myBeneficiarySecondTrigger").prop("disabled", false);
        $("#submitArf").prop("disabled", false);

        getBudgetDetails(sysId);
        $(".loadingBudgetDetails").show();
    });

    $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
        var personRefId = $(this).find('input[data-trigger="person_ref_id_beneficiary_second"]').val();

        $("#myGetBankSecondTrigger").prop("disabled", false);

        $("#bank_name_second_name").val("");
        $("#bank_name_second_id").val("");
        $("#bank_name_second_detail").val("");

        $("#bank_accounts").val("");
        $("#bank_accounts_id").val("");
        $("#bank_accounts_detail").val("");

        getBankSecond(personRefId);
    });

    $('#tableGetBankSecond').on('click', 'tbody tr', function() {
        var sysId                   = $(this).find('input[data-trigger="sys_id_bank_second"]').val();
        var beneficiaryPersonRefID  = document.getElementById("beneficiary_second_person_ref_id");

        $("#myBankAccountTrigger").prop("disabled", false);
        
        $("#bank_accounts").val("");
        $("#bank_accounts_id").val("");
        $("#bank_accounts_detail").val("");

        getBankAccountData(sysId, beneficiaryPersonRefID.value);
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

    $(".budget-details-add").on('click', function() {
        var totals = 0;
        $("#tableGetBudgetDetails tbody tr").each(function(index) {
            var productId = $(this).find(`input[name="productId${index}"]`).val();
            var productName = $(this).find(`input[name="productName${index}"]`).val();
            var qty = $(this).find('td:eq(2)').text(); 
            var uom = $(this).find('td:eq(3)').text();
            var currency = $(this).find('td:eq(4)').text();
            var price = $(this).find('td:eq(5)').text();
            var total = $(this).find('td:eq(6)').text();
            var qtyReq = $(this).find(`input[id^="qty_req${index}"]`).val();
            var priceReq = $(this).find(`input[id^="price_req${index}"]`).val();
            var totalReq = $(this).find(`input[id^="total_req${index}"]`).val();

            totalReq = totalReq.replace(/,/g, ""); 
            totalReq = parseFloat(totalReq) || 0;

            // Validasi: jika ada salah satu field yang kosong
            if ((productId && (!qtyReq || !priceReq || !totalReq)) || 
                (qtyReq && (!productId || !priceReq || !totalReq)) || 
                (priceReq && (!productId || !qtyReq || !totalReq)) || 
                (totalReq && (!productId || !qtyReq || !priceReq))) {
                // Swal.fire("Error", `Harap pastikan semua kolom pada baris ini terisi dengan benar ${productName}`, "error");
                return;  // Berhenti dan lanjutkan ke baris berikutnya
            }

            totals += totalReq;

            // Cek apakah productId sudah ada di tabel Advance List
            var isDuplicate = false;
            $("#tableAdvanceList tbody tr").each(function() {
                var existingProductId = $(this).find("td:eq(0)").text();  // Ambil ProductId dari tabel
                if (existingProductId == productId) {
                    isDuplicate = true;  // Jika ada duplikasi, set isDuplicate ke true
                    return false;  // Keluar dari loop
                }
            });

            if (isDuplicate) {
                return;  // Berhenti dan lanjutkan ke baris berikutnya
            }

            // Jika tidak ada duplikasi, tambahkan baris baru
            var newRow = `<tr>
                <td style="text-align: center;">${productId}</td>
                <td style="text-align: center;">${productName}</td>
                <td style="text-align: center;">${uom}</td>
                <td style="text-align: center;">${currency}</td>
                <td style="text-align: center;">${price}</td>
                <td style="text-align: center;">${qty}</td>
                <td style="text-align: center;">${total}</td>
            </tr>`;

            $("#tableAdvanceList").find("tbody").append(newRow);
        });

        document.getElementById('GrandTotal').textContent = totals.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    });

    const bankNameInput = document.getElementById("bank_name_second_name");
    const observer = new MutationObserver(() => {
        const bankNameID                = document.getElementById("bank_name_second_id");
        const beneficiaryPersonRefID    = document.getElementById("beneficiary_second_person_ref_id");
        
        if (bankNameInput.value.trim() !== "") {
            $("#myBankAccountTrigger").prop("disabled", false);

            getBankAccountData(bankNameID.value, beneficiaryPersonRefID.value);
        }
    });
    
    observer.observe(bankNameInput, { attributes: true, childList: true, subtree: true, characterData: true });
</script>