<script>
    let indexProduct = null;
    const documentTypeRefID = {!! json_encode($documentTypeRefID ?? '') !!};
    const formList = {
        budget_id: {
            component: '#budget_preview',
            containerMessageId: '#budget_message',
            messageId: '#budget_message_text'
        },
        sub_budget_id: {
            component: '#sub_budget_preview',
            containerMessageId: '#sub_budget_message',
            messageId: '#sub_budget_message_text'
        },
        requester_id: {
            component: '#requester_preview',
            containerMessageId: '#requester_message',
            messageId: '#requester_message_text'
        },
        beneficiary_id: {
            component: '#beneficiary_preview',
            containerMessageId: '#beneficiary_message',
            messageId: '#beneficiary_message_text'
        },
        bank_id: {
            component: '#bank_preview',
            containerMessageId: '#bank_message',
            messageId: '#bank_message_text'
        },
        account_number_id: {
            component: '#account_number_preview',
            containerMessageId: '#account_number_message',
            messageId: '#account_number_message_text'
        },
        additionalData: {
            component: '',
            containerMessageId: '#budget_details_message',
            messageId: '#budget_details_message_text'
        },
        remark: {
            component: '#remark',
            containerMessageId: '#remark_message',
            messageId: '#remark_message_text'
        }
    };

    function pickProduct(index) {
        indexProduct = index;
    }

    function calculateTotal() {
        let total = 0;

        document.querySelectorAll('input[id^="total"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('budget_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        document.getElementById('advance_summary_total_table').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function calculateTotalLine(index) {
        const getValue = (field) =>
            Utils.parseFloatSafe(Utils.removeCommas($(`#${field}${index}`).val()));

        const qty = getValue('quantity');
        const qtyAvailable = getValue('quantityAvailable');

        if (indexProduct !== index && qty > qtyAvailable) {
            $(`#quantity${index}`).val('');
            $(`#balance${index}`).val(Utils.formatCurrency(qtyAvailable));
            ErrorNotif("Qty Req is over budget !");
        } else {
            $(`#balance${index}`).val(
                Utils.formatCurrency(qtyAvailable - qty)
            );
        }

        const price = getValue('price');
        const priceAvailable = getValue('priceAvailable');

        if (price > priceAvailable) {
            $(`#price${index}`).val('');
            ErrorNotif("Price Req is over budget !");
        }

        $(`#total${index}`).val(
            Utils.formatCurrency(qty * price)
        );

        calculateTotal();
    }

    function showAdvanceSummary() {
        const sourceTable = document.getElementById('budget_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('advance_summary_table').getElementsByTagName('tbody')[0];

        targetTable.innerHTML = '';

        const rows = sourceTable.getElementsByTagName('tr');

        if (rows.length === 0) {
            targetTable.append(`
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        No data to display.
                    </td>
                </tr>
            `);
        }

        for (let row of rows) {
            const productInformation = row.querySelector('[data-field="product"]');
            const uomInformation = row.querySelector('[data-field="uom"]');

            const qtyInput = row.querySelector('[data-field="quantity"]');
            const priceInput = row.querySelector('[data-field="price"]');
            const totalInput = row.querySelector('[data-field="total"]');

            if (
                qtyInput &&
                priceInput &&
                totalInput &&
                qtyInput.value.trim() !== '' &&
                priceInput.value.trim() !== '' &&
                totalInput.value.trim() !== ''
            ) {
                const product = productInformation?.innerText
                    ? productInformation.innerText.trim()
                    : productInformation?.value?.trim();

                const uom = uomInformation?.innerText?.trim();

                const price = priceInput.value.trim();
                const qty = qtyInput.value.trim();
                const total = totalInput.value.trim();

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td style="text-wrap: auto;line-height: normal;padding: 0.8rem 0.5rem;">${product}</td>
                    <td style="padding: 0.8rem 0.5rem;">${uom}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${price}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${qty}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${total}</td>
                `;

                targetTable.appendChild(newRow);
            }
        }

        if (targetTable.children.length === 0) {
            targetTable.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center text-muted" style="padding: 0.8rem 0.5rem;">
                        No data to display.
                    </td>
                </tr>
            `;
        }
    }

    function getBudgetDetails(siteCodeID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + siteCodeID,
            beforeSend: function () {
                $('#budget_details_table tbody').empty();
                $('#budget_details_loading_table').show();
                $('#budget_details_message_container_table').hide();
            },
            success: function (data) {
                $("#budget_details_loading_table").hide();

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

                $.each(data, function (key, value) {
                    let isUnspecified = '';
                    let balanced = currencyTotal(value.quantityRemaining);
                    let totalBudget = value.quantity * value.priceBaseCurrencyValue;

                    let productColumn = `
                        <td style="text-align: center;">
                            -
                        </td>
                        
                        <td data-field="product" style="text-align: left;">
                            ${value.productCode} - ${value.productName}
                        </td>
                    `;

                    if (value.productName === "Unspecified Product") {
                        isUnspecified = 'disabled';
                        balanced = '-';
                        productColumn = `
                            <td style="text-align: center;">
                                -
                            </td>

                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input type="text" id="product_preview${key}" data-field="product" class="form-control" style="border-radius:0;width:130px;background-color:white;" readonly />
                                    <div class="input-group-append">
                                        <span id="product_container${key}" class="input-group-text form-control" data-toggle="modal" data-target="#myProductss" style="border-radius:0;cursor:pointer;" onclick="pickProduct(${key})">
                                            <i id="product_icon${key}" class="fas fa-gift"></i>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        `;
                    }

                    let row = `
                        <tr>
                            <input
                                type="hidden"
                                id="workStructure_RefID${key}"
                                name="additionalData[${key}][workStructure_RefID]"
                                value="302000000000001"
                            />

                            <input
                                type="hidden"
                                id="combinedBudgetSectionDetail_RefID${key}"
                                name="additionalData[${key}][combinedBudgetSectionDetail_RefID]"
                                value="${value.sys_ID}"
                            />

                            <input
                                type="hidden"
                                id="product_RefID${key}"
                                name="additionalData[${key}][product_RefID]"
                                value="${value.product_RefID}"
                            />

                            <input
                                type="hidden"
                                id="quantityUnit_RefID${key}"
                                name="additionalData[${key}][quantityUnit_RefID]"
                                value="${value.quantityUnit_RefID}"
                            />

                            <input
                                type="hidden"
                                id="productUnitPriceCurrency_RefID${key}"
                                name="additionalData[${key}][productUnitPriceCurrency_RefID]"
                                value="${value.unitPriceCurrency_RefID}"
                            />

                            <input
                                type="hidden"
                                id="productUnitPriceCurrencyExchangeRate${key}"
                                name="additionalData[${key}][productUnitPriceCurrencyExchangeRate]"
                                value="1"
                            />

                            <input
                                type="hidden"
                                id="remarks${key}"
                                name="additionalData[${key}][remarks]"
                                value=""
                            />

                            <input
                                type="hidden"
                                id="quantityAvailable${key}"
                                value="${value.quantityRemaining}"
                            />

                            <input
                                type="hidden"
                                id="priceAvailable${key}"
                                value="${value.priceBaseCurrencyValue}"
                            />
                            
                            ${productColumn}

                            <td style="text-align: center;">
                                ${Utils.formatCurrency(value.quantity)}
                            </td>
                            
                            <td style="text-align: center;">
                                ${value.productName === "Unspecified Product" ? '-' : Utils.formatCurrency(value.quantityRemaining)}
                            </td>
                            
                            <td data-field="uom" style="text-align: center;">
                                ${value.quantityUnitName || '-'}
                            </td>
                            
                            <td style="text-align: center;">
                                ${Utils.formatCurrency(value.priceBaseCurrencyValue)}
                            </td>

                            <td style="text-align: center;">
                                ${Utils.formatCurrency(totalBudget)}
                            </td>

                            <td style="text-align: center;">
                                ${value.priceBaseCurrencyISOCode}
                            </td>
                            
                            <td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input 
                                    id="quantity${key}" 
                                    data-field="quantity"
                                    class="form-control number-without-negative" 
                                    autocomplete="off" 
                                    name="additionalData[${key}][quantity]"
                                    style="border-radius:0px;" 
                                    oninput="calculateTotalLine(${key})" 
                                    ${isUnspecified} 
                                />
                            </td>

                            <td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input 
                                    id="price${key}" 
                                    data-field="price"
                                    class="form-control number-without-negative" 
                                    autocomplete="off" 
                                    name="additionalData[${key}][productUnitPriceCurrencyValue]"
                                    style="border-radius:0px;" 
                                    oninput="calculateTotalLine(${key})" 
                                    ${isUnspecified} 
                                />
                            </td>
                            
                            <td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">
                                <input 
                                    id="total${key}" 
                                    data-field="total"
                                    class="form-control number-without-negative" 
                                    autocomplete="off" 
                                    style="border-radius:0px;" 
                                    readonly 
                                />
                            </td>
                            
                            <td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;padding-right:.3rem;">
                                <input 
                                    id="balance${key}" 
                                    data-field="balance"
                                    class="form-control number-without-negative" 
                                    autocomplete="off" 
                                    style="border-radius:0px;" 
                                    data-default="${balanced}" 
                                    value="${balanced}" 
                                    readonly 
                                />
                            </td>
                        </tr>
                    `;

                    $('#budget_details_table tbody').append(row);
                });

                getProductss();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                $('#budget_details_table tbody').empty();
                $('#budget_details_loading_table').hide();
                $('#budget_details_message_container_table').show();
                $('#budget_details_message_table').text(jqXHR.responseJSON);
            }
        });
    }

    function getBudgetProgress(budgetCodeID, budgetCode, budgetName) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("BudgetProgress.lastWeekAvailable") !!}',
            data: {
                record_id: budgetCodeID
            },
            success: function (response) {
                if (response.status === 200 && response.isAvailable) {
                    getSiteCode(budgetCodeID);

                    $("#budget_preview").val(`${budgetCode} - ${budgetName}`);
                    $("#budget_id").val(budgetCodeID);
                    $("#budget_name").val(budgetName);
                    $("#budget_code").val(budgetCode);

                    $("#budget_preview").css("background-color", "#e9ecef");
                    $("#sub_budget_container").css({ "cursor": "pointer" });

                    $('#sub_budget_container').attr({
                        'data-toggle': 'modal',
                        'data-target': '#sub_budget_code_modal'
                    });
                } else {
                    Swal.fire("Error", "Budget progress from last week has not been entered yet", "error");
                }

                $("#budget_loading").css({ "display": "none" });
                $("#budget_icon").css({ "display": "block" });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            }
        });
    }

    function getWorkflow(budgetCodeID, budgetCode, budgetName) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            data: {
                businessDocumentType_RefID: documentTypeRefID,
                combinedBudget_RefID: budgetCodeID
            },
            success: function (response) {
                if (response.status === 200 && response.data[0].signAccess) {
                    getBudgetProgress(budgetCodeID, budgetCode, budgetName);

                    $("#workflow_path_id").val(response.data[0].workFlowPath_RefIDArray[0]);
                } else {
                    $("#budget_loading").css({ "display": "none" });
                    $("#budget_icon").css({ "display": "block" });

                    Swal.fire("Error", "You are not included in this budget", "error");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                $("#budget_loading").css({ "display": "none" });
                $("#budget_icon").css({ "display": "block" });
            }
        });
    }

    function commentWorkflow() {
        const currentComment = document.getElementById('workflow_comment').value || "";

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
            inputValue: currentComment,
            showCloseButton: false,
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                $("#workflow_comment").val(result.value);

                document.getElementById('advanceRequestForm').requestSubmit();
            }
        });

        $("#advance_summary_modal").modal('toggle');
    }

    $('#advanceRequestForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("AdvanceRequest.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                Utils.hideLoading();

                if (response.status == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + response.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('AdvanceRequest.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Create Advance Request Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                Utils.hideLoading();

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    $.each(errors, function (key, value) {
                        // console.log(key + ': ' + value[0]);

                        if (formList[key]) {
                            ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);
                        }
                    });
                }
            }
        });
    });

    $('#budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_preview").val("");
            $("#budget_id").val("");
            $("#budget_name").val("");
            $("#budget_code").val("");

            $("#budget_loading").css({ "display": "block" });
            $("#budget_icon").css({ "display": "none" });

            getWorkflow(id, code, name);

            ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
        }

        $("#budget_code_modal").modal('toggle');
    });

    $('#sub_budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#sub_budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.Sys_ID;
            const code = dataRow.Code;
            const name = dataRow.Name;

            $("#sub_budget_preview").val(`${code} - ${name}`);
            $("#sub_budget_id").val(id);
            $("#sub_budget_name").val(name);
            $("#sub_budget_code").val(code);

            $("#sub_budget_preview").css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#sub_budget_preview", "#sub_budget_message");
            ErrorHandler.hideErrorInputMessage("", "#budget_details_message");

            $("#requester_container").css({ "cursor": "pointer" });
            $('#requester_container').attr({
                'data-toggle': 'modal',
                'data-target': '#requester_modal'
            });

            $("#beneficiary_container").css({ "cursor": "pointer" });
            $('#beneficiary_container').attr({
                'data-toggle': 'modal',
                'data-target': '#beneficiary_modal'
            });

            getBudgetDetails(id);
            getRequester();
            getBeneficiary();
        }

        $("#sub_budget_code_modal").modal('toggle');
    });

    $('#requester_list_table').on('click', 'tbody tr', function () {
        const table = $('#requester_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const name = dataRow.personName;

            $("#requester_preview").val(name);
            $("#requester_id").val(id);
            $("#requester_name").val(name);

            $("#requester_preview").css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#requester_preview", "#requester_message");
        }

        $("#requester_modal").modal('toggle');
    });

    $('#beneficiary_list_table').on('click', 'tbody tr', function () {
        const table = $('#beneficiary_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const name = dataRow.personName;
            const personRefID = dataRow.person_RefID;

            $("#beneficiary_preview").val(name);
            $("#beneficiary_id").val(id);
            $("#beneficiary_name").val(name);

            $("#beneficiary_preview").css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#beneficiary_preview", "#beneficiary_message");

            $('#bank_preview').val('');
            $('#bank_id').val('');
            $('#bank_code').val('');
            $('#bank_name').val('');

            $('#bank_preview').css("background-color", "#fff");
            $("#bank_container").css({ "cursor": "pointer" });

            ErrorHandler.hideErrorInputMessage("#bank_preview", "#bank_message");

            $('#bank_container').attr({
                'data-toggle': 'modal',
                'data-target': '#bank_modal'
            });

            $('#account_number_preview').val('');
            $('#account_number_id').val('');
            $('#account_number_code').val('');
            $('#account_number_name').val('');

            $('#account_number_preview').css("background-color", "#fff");

            ErrorHandler.hideErrorInputMessage("#account_number_preview", "#account_number_message");

            getBank(personRefID);
        }

        $("#beneficiary_modal").modal('toggle');
    });

    $('#bank_list_table').on('click', 'tbody tr', function () {
        const table = $('#bank_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.Bank_RefID;
            const code = dataRow.BankAcronym;
            const name = dataRow.BankName;
            const accountName = dataRow.AccountName;

            $('#bank_preview').val(`${code} - ${name}`);
            $('#bank_id').val(id);
            $('#bank_code').val(code);
            $('#bank_name').val(name);

            $('#bank_preview').css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#bank_preview", "#bank_message");

            $("#account_number_container").css({ "cursor": "pointer" });
            $('#account_number_container').attr({
                'data-toggle': 'modal',
                'data-target': '#account_number_modal'
            });

            ErrorHandler.hideErrorInputMessage("#account_number_preview", "#account_number_message");

            getBankAccounts(code, accountName);
        }

        $("#bank_modal").modal('toggle');
    });

    $('#account_number_list_table').on('click', 'tbody tr', function () {
        const table = $('#account_number_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.additionalData.bankName;
            const name = dataRow.sys_Text;

            $('#account_number_preview').val(name);
            $('#account_number_id').val(id);
            $('#account_number_code').val(code);
            $('#account_number_name').val(name);

            $('#account_number_preview').css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#account_number_preview", "#account_number_message");
        }

        $("#account_number_modal").modal('toggle');
    });

    $('#tableGetProductss').on('click', 'tbody tr', function () {
        const table = $('#tableGetProductss').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $(`#product_RefID${indexProduct}`).val(id);
            $(`#product_preview${indexProduct}`).val(`${code} - ${name}`);
            $(`#quantity${indexProduct}`).prop('disabled', false);
            $(`#price${indexProduct}`).prop('disabled', false);

            $(`#product_preview${indexProduct}`).css("background-color", "#e9ecef");
        }

        $("#myProductss").modal('toggle');
    });

    $('#remark').on('input', function (e) {
        if (e.target.value) {
            ErrorHandler.hideErrorInputMessage("#remark", "#remark_message");
        }
    });

    $(document).ready(function () {
        $('#advance_summary_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>