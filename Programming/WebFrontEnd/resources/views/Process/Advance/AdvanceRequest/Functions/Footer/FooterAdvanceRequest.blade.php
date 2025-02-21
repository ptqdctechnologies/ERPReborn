<script>
    var documentTypeID = $("#DocumentTypeID").val();
    var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

    $(".loadingBudgetDetails").hide();
    $(".errorMessageContainerBudgetDetails").hide();
    $("#mySiteCodeSecondTrigger").prop("disabled", true);
    $("#myWorkerSecondTrigger").prop("disabled", true);
    $("#myBeneficiarySecondTrigger").prop("disabled", true);
    $("#myGetBankSecondTrigger").prop("disabled", true);
    $("#myBankAccountTrigger").prop("disabled", true);
    $("#var_date").val(date);
    // $("#submitArf").prop("disabled", true);

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
                console.log('data getBudget', data);
                
                $(".loadingBudgetDetails").hide();

                let tbody = $('#tableGetBudgetDetails tbody');
                tbody.empty();

                $.each(data, function(key, val2) {
                    let isUnspecified = '';
                    let balanced = currencyTotal(val2.quantity);
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
                            
                            ${productColumn}
                            <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantityRemaining)}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
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

                    // Simpan nilai default untuk reset nanti
                    $(`#product_id${key}`).data('default', $(`#product_id${key}`).val());
                    $(`#product_name${key}`).data('default', $(`#product_name${key}`).val());
                    $(`#qty_req${key}`).data('default', $(`#qty_req${key}`).val());
                    $(`#price_req${key}`).data('default', $(`#price_req${key}`).val());
                    $(`#total_req${key}`).data('default', $(`#total_req${key}`).val());
                    $(`#balanced_qty${key}`).data('default', $(`#balanced_qty${key}`).val());

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

                            if (parseFloat(qty_req) > val2.quantity) {
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

    function SelectWorkFlow(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID) {
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
            AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID, result.value);
        })
    }

    function AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID, comment) {
        var fileAttachments = $("#dataInput_Log_FileUpload").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var data = {
            workFlowPath_RefID: workFlowPath_RefID,
            nextApprover_RefID: nextApprover_RefID,
            approverEntity_RefID: approverEntity_RefID,
            fileAttachment: fileAttachments,
            documentTypeID: documentTypeID,
            comment: comment
        };

        $.ajax({
            type: 'POST',
            data: data,
            url: '{!! route("AdvanceRequest.store") !!}',
            success: function(res) {
                HideLoading();

                if (res.status == 200) {
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
                        window.location.href = '/AdvanceRequest?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                HideLoading();
                ErrorNotif("Data Cancel Inputed");
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

    $("#budget-details-add").on('click', function() {
        var totals = 0;
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
            var productId = $(this).find(`input[name="productId${index}"]`).val();
            var productName = $(this).find(`input[name="productName${index}"]`).val();
            var qtyId = $(this).find(`input[name="qtyId${index}"]`).val();
            var uom = $(this).find(`input[name="uom${index}"]`).val();
            var currency = $(this).find(`input[name="currency${index}"]`).val();
            var currencyId = $(this).find(`input[name="currencyId${index}"]`).val();
            var qtyReq = $(this).find(`input[id^="qty_req${index}"]`).val();
            var priceReq = $(this).find(`input[id^="price_req${index}"]`).val();
            var totalReq = $(this).find(`input[id^="total_req${index}"]`).val();
            var combinedBudgetSectionDetail_RefID = $(this).find(`input[id^="combinedBudgetSectionDetail_RefID${index}"]`).val();

            totalReq = totalReq.replace(/,/g, ""); 
            totalReq = parseFloat(totalReq) || 0;

            // Validasi: jika ada salah satu field yang kosong
            if (!productId || !qtyReq || !priceReq || !totalReq) {
                return;  // Skip ke baris berikutnya jika ada field yang kosong
            }

            totals += totalReq;

            var rowToUpdate = null;

            $("#tableAdvanceList tbody tr").each(function() {
                var existingProductId = $(this).find("td:eq(0)").text();
                var existingQty = $(this).find("td:eq(5)").text();
                var existingPrice = $(this).find("td:eq(4)").text();

                if (existingProductId === productId) {
                    if (existingQty === qtyReq && existingPrice === priceReq) {
                        rowToUpdate = $(this); // Jika qty dan price sama, hanya update jika productId berubah
                    } else {
                        rowToUpdate = $(this); // Jika ada perbedaan, baris akan diperbarui
                    }
                    return false; // Stop looping
                }
            });

            if (rowToUpdate) {
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

                // Update baris yang sudah ada
                rowToUpdate.find("td:eq(0)").text(productId);
                rowToUpdate.find("td:eq(1)").text(productName);
                rowToUpdate.find("td:eq(2)").text(uom);
                rowToUpdate.find("td:eq(3)").text(currency);
                rowToUpdate.find("td:eq(4)").text(priceReq);
                rowToUpdate.find("td:eq(5)").text(qtyReq);
                rowToUpdate.find("td:eq(6)").text(totalReq);
            } else {
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

                // Jika tidak ada duplikasi, tambahkan baris baru
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
        // Reset semua input ke nilai default
        $('input[id^="product_id"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="product_name"]').each(function() {
            $(this).val($(this).data('default'));
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
    
    $("#FormSubmitAdvance").on("submit", function(e) { //id of form 
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
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method
                var form_data = new FormData($(this)[0]); // convert form into formdata 
                var form = $(this);

                ShowLoading();

                $.ajax({
                    url: action,
                    dataType: 'json', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {
                        if (response.message == "WorkflowError") {
                            HideLoading();
                            $("#submitArf").prop("disabled", false);
                            // CALL FUNCTION DO NOT HAVE ACCESS NOTIF
                            CancelNotif("You don't have access", '/AdvanceRequest?var=1');
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
                            HideLoading();
                            SelectWorkFlow(response.workFlowPath_RefID, response.nextApprover_RefID, response.approverEntity_RefID, response.documentTypeID);
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