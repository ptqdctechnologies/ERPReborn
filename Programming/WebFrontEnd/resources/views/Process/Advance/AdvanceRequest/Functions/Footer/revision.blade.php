<script>
    let indexProduct = null;
    const totalPayment = document.getElementById('total_payment');
    const totalBudget = document.getElementById('budget_total');
    const combinedBudgetRefID = document.getElementById('budget_id');
    const combinedBudgetName = document.getElementById('budget_name');
    const combinedBudgetCode = document.getElementById('budget_code');
    const combinedBudgetSectionRefID = document.getElementById('sub_budget_id');
    const documentTypeRefID = {!! json_encode($documentTypeRefID ?? '') !!};
    const dataBudgetDetails = {!! json_encode($details ?? []) !!};
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

        document.querySelectorAll('[data-field="total"]').forEach(function (input) {
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
            $(`#total${index}`).val('');
            $(`#balance${index}`).val(currency(qtyAvailable));
            ErrorNotif("Qty Req is over budget !");

            calculateTotal();

            return;
        } else {
            $(`#balance${index}`).val(
                currency(qtyAvailable - qty)
            );
        }

        const price = getValue('price');
        const priceAvailable = getValue('priceAvailable');

        if (price > priceAvailable) {
            $(`#price${index}`).val('');
            $(`#total${index}`).val('');
            ErrorNotif("Price Req is over budget !");

            calculateTotal();

            return;
        }

        $(`#total${index}`).val(
            currency(qty * price)
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
                    const findData = dataBudgetDetails.find(val => val.combinedBudgetSectionDetail_RefID == value.sys_ID);

                    let isUnspecified = '';
                    let balanced = findData ? value.quantityRemaining - findData.quantity : currencyTotal(value.quantityRemaining);
                    let totalBudget = value.quantity * value.priceBaseCurrencyValue;

                    let productColumn = `
                        <td style="text-align: center;">
                            ${findData ? `${findData.workCode} - ${findData.workName}` : '-'}
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
                                ${findData ? `${findData.productCode} - ${findData.productName}` : '-'}
                            </td>

                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input 
                                        type="text" 
                                        id="product_preview${key}" 
                                        data-field="product" 
                                        class="form-control" 
                                        style="border-radius:0;width:130px;background-color:white;" 
                                        value="${findData ? findData.sys_ID : ''}"
                                        readonly 
                                    />

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
                                id="recordID${key}"
                                name="additionalData[${key}][recordID]"
                                value="${findData ? findData.sys_ID : ''}"
                            />

                            <input
                                type="hidden"
                                id="workStructure_RefID${key}"
                                name="additionalData[${key}][workStructure_RefID]"
                                value="${findData ? findData.workStructure_RefID : '302000000000001'}"
                            />

                            <input
                                type="hidden"
                                id="combinedBudgetSectionDetail_RefID${key}"
                                name="additionalData[${key}][combinedBudgetSectionDetail_RefID]"
                                value="${findData ? findData.combinedBudgetSectionDetail_RefID : value.sys_ID}"
                            />

                            <input
                                type="hidden"
                                id="product_RefID${key}"
                                name="additionalData[${key}][product_RefID]"
                                value="${findData ? findData.product_RefID : value.product_RefID}"
                            />

                            <input
                                type="hidden"
                                id="quantityUnit_RefID${key}"
                                name="additionalData[${key}][quantityUnit_RefID]"
                                value="${findData ? findData.quantityUnit_RefID : value.quantityUnit_RefID}"
                            />

                            <input
                                type="hidden"
                                id="productUnitPriceCurrency_RefID${key}"
                                name="additionalData[${key}][productUnitPriceCurrency_RefID]"
                                value="${findData ? findData.productUnitPriceCurrency_RefID : value.unitPriceCurrency_RefID}"
                            />

                            <input
                                type="hidden"
                                id="productUnitPriceCurrencyExchangeRate${key}"
                                name="additionalData[${key}][productUnitPriceCurrencyExchangeRate]"
                                value="${findData ? findData.productUnitPriceCurrencyExchangeRate : '1'}"
                            />

                            <input
                                type="hidden"
                                id="remarks${key}"
                                name="additionalData[${key}][remarks]"
                                value="${findData ? findData.notes : ''}"
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
                                ${currency(value.quantity)}
                            </td>
                            
                            <td style="text-align: center;">
                                ${value.productName === "Unspecified Product" ? '-' : currency(value.quantityRemaining)}
                            </td>
                            
                            <td data-field="uom" style="text-align: center;">
                                ${value.quantityUnitName || '-'}
                            </td>
                            
                            <td style="text-align: center;">
                                ${currency(value.priceBaseCurrencyValue)}
                            </td>

                            <td style="text-align: center;">
                                ${currency(totalBudget)}
                            </td>

                            <td style="text-align: center;">
                                -
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
                                    value="${findData ? currency(findData.quantity) : ''}"
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
                                    value="${findData ? currency(findData.productUnitPriceCurrencyValue) : ''}"
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
                                    value="${findData ? currency(findData.quantity * findData.productUnitPriceCurrencyValue) : ''}"
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

                calculateTotal();
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
            beforeSend: function () {
                $("#budget_loading").css({ "display": "block" });
                $("#budget_icon").css({ "display": "none" });
            },
            success: function (response) {
                if (response.status === 200 && response.data[0].signAccess) {
                    $("#workflow_path_id").val(response.data[0].workFlowPath_RefIDArray[0]);

                    getBudgetDetails(combinedBudgetSectionRefID.value);
                } else {
                    Swal.fire("Error", "You don't have access", "error").then((res) => {
                        Utils.cancelForm('{{ route('AdvanceRequest.index', ['var' => 1]) }}');
                    });
                }

                $("#budget_loading").css({ "display": "none" });
                $("#budget_icon").css({ "display": "block" });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                $("#budget_loading").css({ "display": "none" });
                $("#budget_icon").css({ "display": "block" });
            }
        });
    }

    function commentWorkflow() {
        if (
            Utils.parseFloatSafe(Utils.removeCommas(totalBudget.textContent)) <
            Utils.parseFloatSafe(Utils.removeCommas(totalPayment.value))
        ) {
            ErrorNotif("Total Budget can't be less than Total Payment!");
            return;
        }

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
            type: 'PUT',
            url: '{!! route("AdvanceRequest.update", $advance_id) !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                Utils.hideLoading();

                console.log('response', response);

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
                    ErrorNotif("Revision Advance Request Failed");
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
        getWorkflow(
            combinedBudgetRefID.value,
            combinedBudgetCode.value,
            combinedBudgetName.value
        );

        $('#advance_summary_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>