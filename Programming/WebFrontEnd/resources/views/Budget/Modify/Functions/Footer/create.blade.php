<script>
    let dummyCustomerOrderType = null;
    let budgetDetails = [];
    let customerOrderDetails = [];
    let currentWorkRow = null;
    let currentProductRow = null;
    const documentTypeRefID = {!! json_encode($documentTypeRefID ?? '') !!};
    const subBudgetCodeID = document.getElementById('sub_budget_id');

    function coRevisedHandler(e) {
        if (e.value == "no") {
            $('#customer_order_value').val('');
            $('#customer_order_detail_tab').addClass('d-none');
            $('#customer_order_value_container').addClass('d-none');
        } else {
            if (dummyCustomerOrderType == "SUB_BUDGET_BASE") {
                $('#customer_order_value_container').removeClass('d-none');
            } else {
                $('#customer_order_detail_tab').removeClass('d-none');
            }
        }
    }

    function newItemHandler() {
        $('#new_item_form').toggleClass('d-none');
    }

    function showHideLoading(displayIcon, displayLoading) {
        $("#budget_icon").css({ "display": displayIcon });
        $("#budget_loading").css({ "display": displayLoading });
    }

    function fillSite(budgetCodeID, budgetCode, budgetName) {
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
    }

    function pickWork(type, index) {
        currentWorkRow = {
            type,
            index
        };
    }

    function pickProduct(type, index) {
        currentProductRow = {
            type,
            index
        };
    }

    /* START OF CUSTOMER ORDER SECTION */
    function addCustomerOrderRow() {
        const newRow = {
            isOrigin: false,
            work_RefID: '',
            workCode: '',
            workName: '',
            workPreview: '',
            product_RefID: '',
            productCode: '',
            productName: '',
            productPreview: '',
            quantityUnit_RefID: '',
            quantityUnitName: '',
            qty: '',
            price: '',
            note: ''
        };

        customerOrderDetails.push(newRow);
        renderCustomerOrderTable();
    }

    function removeCustomerOrderRow(index) {
        customerOrderDetails.splice(index, 1);
        renderCustomerOrderTable();
    }

    function updateCustomerOrderField(index, field, value) {
        customerOrderDetails[index][field] = value;
    }

    function renderCustomerOrderTable() {
        const tbody = document.getElementById("customer_order_details_tbody_table");

        if (tbody) {
            tbody.innerHTML = "";
        }

        customerOrderDetails.forEach((row, index) => {
            const tr = document.createElement("tr");

            if (index === customerOrderDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div 
                                class="icon-plus d-flex align-items-center justify-content-center" 
                                onclick="addCustomerOrderRow()"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 100%;
                                    background-color: #4B586A;
                                    margin: 2px;
                                    cursor: pointer;
                                    display:${index === customerOrderDetails.length - 1 ? 'flex' : 'none !important'};
                                ">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
            } else {
                let actionDefault = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div 
                                class="icon-minus d-flex align-items-center justify-content-center" 
                                onclick="removeCustomerOrderRow(${index})"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 100%;
                                    background-color: red;
                                    margin: 2px;
                                    cursor: pointer;
                                    display: flex;
                                ">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>

                    <td style="text-align: center;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span id="work_co_container${index}" class="input-group-text form-control" data-toggle="modal" data-target="#myWorks" onclick="pickWork('customer_order', ${index})" style="border-radius:0;cursor:pointer;">
                                    <i id="work_co_icon${index}" class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="work_co_preview${index}" data-field="work" class="form-control" style="border-radius: 0; width: 130px; background-color: white;" readonly />
                        </div>
                    </td>

                    <td style="text-align: center;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span id="product_co_container${index}" class="input-group-text form-control" data-toggle="modal" data-target="#myProductss" onclick="pickProduct('customer_order', ${index})" style="border-radius:0;cursor:pointer;">
                                    <i id="product_co_icon${index}" class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="product_co_preview${index}" data-field="product" class="form-control" style="border-radius: 0; width: 130px; background-color: white;" readonly />
                        </div>
                    </td>
                `;

                if (row.isOrigin) {
                    actionDefault = `
                        <td style="text-align: center;">
                            -
                        </td>
                        
                        <td style="text-align: center;">
                            -
                        </td>

                        <td style="text-align: center;">
                            ${row.productCode} - ${row.productName}
                        </td>
                    `;
                }

                tr.innerHTML = `
                    ${actionDefault}

                    <td style="text-align: center;">
                        ${row.quantityUnitName || '-'}
                    </td>

                    <td style="text-align: center;">
                        <input 
                            id="quantityCOInput${index}" 
                            class="form-control number-without-negative"
                            autocomplete="off" 
                            style="border-radius:0px;"
                            value="${Utils.formatCurrency(row.qty || '0')}"
                        />
                    </td>

                    <td style="text-align: center;">
                        <input 
                            id="priceCOInput${index}" 
                            class="form-control number-without-negative"
                            autocomplete="off" 
                            style="border-radius:0px;"
                            value="${Utils.formatCurrency(row.price || '0')}"
                        />
                    </td>

                    <td style="text-align: center;">
                        <input 
                            id="totalCOInput${index}" 
                            data-field="totalInput"
                            class="form-control" 
                            autocomplete="off" 
                            style="border-radius:0px;" 
                            value="${Utils.formatCurrency(row.qty * row.price)}"
                            readonly
                        />
                    </td>

                    <td style="text-align: center; padding-right: .3rem;">
                        <textarea 
                            id="noteCOInput${index}" 
                            class="form-control" 
                        >${row.note || ''}</textarea>
                    </td>
                `;
            }

            if (tbody) {
                tbody.appendChild(tr);
            }
        });
    }

    function getCustomerOrderDetail() {
        // dummyCustomerOrderType = 'SUB_BUDGET_BASE';
        dummyCustomerOrderType = 'PRODUCT_BASE';

        customerOrderDetails.push(
            {
                isOrigin: true,
                work_RefID: 123,
                workCode: 'W-01',
                workName: 'Memasang beton',
                product_RefID: 789,
                productCode: '1002767',
                productName: 'Washer Cylinder Head Cover',
                quantityUnit_RefID: 456,
                quantityUnitName: 'ea',
                qty: 4.39,
                price: 8472.49,
                note: ''
            },
            {
                isOrigin: true,
                work_RefID: 231,
                workCode: 'W-07',
                workName: 'Pondasi',
                product_RefID: 897,
                productCode: '1002464',
                productName: 'Vibration damper for OPGW 70 mm2',
                quantityUnit_RefID: 456,
                quantityUnitName: 'ea',
                qty: 7,
                price: 28593.40,
                note: ''
            }
        );

        addCustomerOrderRow();

        $("#customer_order_revised_no").removeAttr('disabled');
        $("#customer_order_revised_yes").removeAttr('disabled');
    }
    /* END OF CUSTOMER ORDER SECTION */

    /* START OF BUDGET SECTION */
    function calculateTotal() {
        let total = 0;

        document.querySelectorAll('input[data-field="totalInput"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('budget_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function calculateTotalLine(index) {
        const getValue = (field) =>
            Utils.parseFloatSafe(Utils.removeCommas($(`#${field}${index}`).val()));

        const qty = getValue('quantityInput');
        const qtyAvailable = getValue('quantityAvailable');

        if (qty > qtyAvailable) {
            $(`#quantityInput${index}`).val('');
            $(`#totalInput${index}`).val('');
            ErrorNotif("Qty Req is over budget !");

            calculateTotal();

            return;
        } else {
            $(`#balance${index}`).val(
                currency(qtyAvailable - qty)
            );
        }

        const price = getValue('priceInput');
        const priceAvailable = getValue('priceAvailable');

        if (price > priceAvailable) {
            $(`#priceInput${index}`).val('');
            $(`#totalInput${index}`).val('');
            ErrorNotif("Price Req is over budget !");

            calculateTotal();

            return;
        }

        $(`#totalInput${index}`).val(
            currency(qty * price)
        );

        calculateTotal();
    }

    function addRow() {
        const newRow = {
            isOrigin: false,
            combinedBudgetSectionDetail_RefID: '',
            work_RefID: '',
            workCode: '',
            workName: '',
            workPreview: '',
            product_RefID: '',
            productCode: '',
            productName: '',
            productPreview: '',
            qtyBudget: '',
            qtyBudgetAvail: '',
            priceBudget: '',
            currency: '',
            balanced: '',
            total: '',
            qtyInput: '',
            priceInput: '',
            totalInput: ''
        };

        budgetDetails.push(newRow);
        renderTable();
    }

    function removeRow(index) {
        budgetDetails.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        budgetDetails[index][field] = value;
    }

    function renderTable() {
        const tbody = document.getElementById("budget_details_tbody_table");

        if (tbody) {
            tbody.innerHTML = "";
        }

        budgetDetails.forEach((row, index) => {
            const tr = document.createElement("tr");

            if (index === budgetDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div 
                                class="icon-plus d-flex align-items-center justify-content-center" 
                                onclick="addRow()"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 100%;
                                    background-color: #4B586A;
                                    margin: 2px;
                                    cursor: pointer;
                                    display:${index === budgetDetails.length - 1 ? 'flex' : 'none !important'};
                                ">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
            } else {
                let actionDefault = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div 
                                class="icon-minus d-flex align-items-center justify-content-center" 
                                onclick="removeRow(${index})"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 100%;
                                    background-color: red;
                                    margin: 2px;
                                    cursor: pointer;
                                    display: flex;
                                ">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>

                    <td style="text-align: center;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span id="work_container${index}" class="input-group-text form-control" data-toggle="modal" data-target="#myWorks" onclick="pickWork('budget', ${index})" style="border-radius:0;cursor:pointer;">
                                    <i id="work_icon${index}" class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="work_preview${index}" data-field="work" class="form-control" style="border-radius: 0; width: 130px; background-color: white;" readonly />
                        </div>
                    </td>

                    <td style="text-align: center;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span id="product_container${index}" class="input-group-text form-control" data-toggle="modal" data-target="#myProductss" onclick="pickProduct('budget', ${index})" style="border-radius:0;cursor:pointer;">
                                    <i id="product_icon${index}" class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="product_preview${index}" data-field="product" class="form-control" style="border-radius: 0; width: 130px; background-color: white;" readonly />
                        </div>
                    </td>
                `;

                if (row.isOrigin) {
                    actionDefault = `
                        <td style="text-align: center;">
                            -
                        </td>
                        
                        <td style="text-align: center;">
                            -
                        </td>

                        <td style="text-align: center;">
                            ${row.productCode} - ${row.productName}
                        </td>
                    `;
                }

                tr.innerHTML = `
                    <input
                        type="hidden"
                        id="quantityAvailable${index}"
                        value="${row.qtyBudgetAvail || '0'}"
                    />

                    <input
                        type="hidden"
                        id="priceAvailable${index}"
                        value="${row.priceBudget || '0'}"
                    />

                    ${actionDefault}

                    <td style="text-align: center;">
                        ${Utils.formatCurrency(row.qtyBudget || '0')}
                    </td>

                    <td style="text-align: center;">
                        ${Utils.formatCurrency(row.qtyBudgetAvail || '0')}
                    </td>

                    <td style="text-align: center;">
                        ${Utils.formatCurrency(row.priceBudget || '0')}
                    </td>

                    <td style="text-align: center;">
                        ${row.currency || '-'}
                    </td>

                    <td style="text-align: center;">
                        ${row.balanced || '-'}
                    </td>

                    <td style="text-align: center;">
                        ${Utils.formatCurrency(row.total || '0')}
                    </td>

                    <td style="text-align: center;">
                        <input 
                            id="quantityInput${index}" 
                            class="form-control number-only" 
                            autocomplete="off" 
                            style="border-radius:0px;"
                            oninput="calculateTotalLine(${index})"
                        />
                    </td>

                    <td style="text-align: center;">
                        <input 
                            id="priceInput${index}" 
                            class="form-control number-without-negative" 
                            autocomplete="off" 
                            style="border-radius:0px;"
                            oninput="calculateTotalLine(${index})"
                        />
                    </td>

                    <td style="text-align: center; padding-right: .3rem;">
                        <input 
                            id="totalInput${index}" 
                            data-field="totalInput"
                            class="form-control" 
                            autocomplete="off" 
                            style="border-radius:0px;" 
                            readonly
                        />
                    </td>
                `;
            }

            if (tbody) {
                tbody.appendChild(tr);
            }
        });
    }

    function getBudgetDetails() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + subBudgetCodeID.value,
            beforeSend: function () {
                $('#budget_details_table tbody').empty();
                $('#budget_details_loading_table').show();
                $('#budget_details_message_container_table').hide();
            },
            success: function (response) {
                if (Array.isArray(response) && response.length > 0) {
                    $.each(response, function (key, value) {
                        if (!value.product_RefID && value.productName == "Unspecified Product") {
                            return;
                        }

                        budgetDetails.push({
                            isOrigin: true,
                            combinedBudgetSectionDetail_RefID: value.sys_ID,
                            work_RefID: '',
                            workCode: '',
                            workName: '',
                            product_RefID: value.product_RefID,
                            productCode: value.productCode,
                            productName: value.productName,
                            qtyBudget: value.quantity,
                            qtyBudgetAvail: value.quantityRemaining,
                            priceBudget: value.priceBaseCurrencyValue,
                            currency: value.priceBaseCurrencyISOCode,
                            balanced: '',
                            total: value.quantity * value.priceBaseCurrencyValue,
                            qtyInput: '',
                            priceInput: '',
                            totalInput: ''
                        });
                    });

                    addRow();
                } else {
                    $('#budget_details_table tbody').empty();
                    $('#budget_details_message_container_table').show();

                    $('#budget_details_message_table').text('Budget details not found.');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                $('#budget_details_table tbody').empty();
                $('#budget_details_message_container_table').show();
                $('#budget_details_message_table').text(jqXHR.responseJSON);
            },
            complete: function () {
                getProductss();
                getModalWorks();

                $('#budget_details_loading_table').hide();
            }
        });
    }
    /* END OF BUDGET SECTION */

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
                if (response.status === 200 && !response.isAvailable) {
                    fillSite(budgetCodeID, budgetCode, budgetName);
                } else {
                    Swal.fire("Error", "Budget progress from last week has not been entered yet", "error");
                }

                showHideLoading("block", "none");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                showHideLoading("block", "none");
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
                if (response.status === 200 && !response.data[0].signAccess) {
                    if (String(budgetCodeID).startsWith('103', 0)) {
                        fillSite(budgetCodeID, budgetCode, budgetName);

                        showHideLoading("block", "none");
                    } else {
                        getBudgetProgress(budgetCodeID, budgetCode, budgetName);
                    }

                    $("#workflow_path_id").val(response.data[0].workFlowPath_RefIDArray[0]);
                } else {
                    showHideLoading("block", "none");

                    Swal.fire("Error", "You are not included in this budget", "error");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                showHideLoading("block", "none");
            }
        });
    }

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

            showHideLoading("none", "block");

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

            $("#sub_budget_preview").val(`${code} - ${name} `);
            $("#sub_budget_id").val(id);
            $("#sub_budget_name").val(name);
            $("#sub_budget_code").val(code);

            $("#sub_budget_preview").css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#sub_budget_preview", "#sub_budget_message");
            ErrorHandler.hideErrorInputMessage("", "#budget_details_message");

            $("#currency_container").css({ "cursor": "pointer" });
            $('#currency_container').attr({
                'data-toggle': 'modal',
                'data-target': '#myCurrencies'
            });

            getCustomerOrderDetail();
        }

        $("#sub_budget_code_modal").modal('toggle');
    });

    $('#tableCurrencies tbody').on('click', 'tr', function () {
        const table = $('#tableCurrencies').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const currencyID = dataRow.sys_ID;
            const currencyExchangeRate = dataRow.exchangeRate;
            const currencyISOCode = dataRow.ISOCode;
            const currencyName = dataRow.name;

            if (!currencyExchangeRate) {
                Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");

                return;
            }

            $("#currency_id").val(currencyID);
            $("#currency_name").val(currencyName);
            $("#currency_code").val(currencyISOCode);
            $("#currency_preview").val(`${currencyISOCode} - ${currencyName}`);
            $("#currency_preview").css('background-color', '#e9ecef');

            // $('#new_item_toggle').removeClass('d-none');

            $("#exchange_rate").val(Utils.formatCurrency(currencyExchangeRate));
            $("#exchange_rate").css('background-color', '#e9ecef');

            ErrorHandler.hideErrorInputMessage("#currency_preview", "#currency_message");

            getBudgetDetails();
        }

        $("#myCurrencies").modal('toggle');
    });

    $('#tableWorks tbody').on('click', 'tr', function () {
        if (currentWorkRow === null) return null;

        const table = $('#tableWorks').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.additionalData.code;
            const name = dataRow.sys_Text;

            if (currentWorkRow.type == 'customer_order') {
                $(`#work_co_preview${currentWorkRow.index}`).css("background-color", "#e9ecef");
                $(`#work_co_preview${currentWorkRow.index}`).val(`${code} - ${name}`);

                updateCustomerOrderField(currentWorkRow.index, 'workPreview', `${code} - ${name}`);
                updateCustomerOrderField(currentWorkRow.index, 'work_RefID', id);
                updateCustomerOrderField(currentWorkRow.index, 'workCode', code);
                updateCustomerOrderField(currentWorkRow.index, 'workName', name);
            } else {
                $(`#work_preview${currentWorkRow.index}`).css("background-color", "#e9ecef");
                $(`#work_preview${currentWorkRow.index}`).val(`${code} - ${name}`);

                updateField(currentWorkRow.index, 'workPreview', `${code} - ${name}`);
                updateField(currentWorkRow.index, 'work_RefID', id);
                updateField(currentWorkRow.index, 'workCode', code);
                updateField(currentWorkRow.index, 'workName', name);
            }
        }

        $("#myWorks").modal('toggle');
    });

    $('#tableGetProductss tbody').on('click', 'tr', function () {
        if (currentProductRow === null) return null;

        const table = $('#tableGetProductss').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            if (currentProductRow.type == 'customer_order') {
                $(`#product_co_preview${currentProductRow.index}`).css("background-color", "#e9ecef");
                $(`#product_co_preview${currentProductRow.index}`).val(`${code} - ${name}`);

                updateCustomerOrderField(currentProductRow.index, 'productPreview', `${code} - ${name}`);
                updateCustomerOrderField(currentProductRow.index, 'product_RefID', id);
                updateCustomerOrderField(currentProductRow.index, 'productCode', code);
                updateCustomerOrderField(currentProductRow.index, 'productName', name);
            } else {
                $(`#product_preview${currentProductRow.index}`).css("background-color", "#e9ecef");
                $(`#product_preview${currentProductRow.index}`).val(`${code} - ${name}`);

                updateField(currentProductRow.index, 'productPreview', `${code} - ${name}`);
                updateField(currentProductRow.index, 'product_RefID', id);
                updateField(currentProductRow.index, 'productCode', code);
                updateField(currentProductRow.index, 'productName', name);
            }
        }

        $("#myProductss").modal('toggle');
    });

    $(document).ready(function () {
        $("#exchange_rate").attr('disabled', true);

        $("#customer_order_revised_no").attr('disabled', true);
        $("#customer_order_revised_yes").attr('disabled', true);

        $('#currency_container').css('cursor', 'not-allowed');
        $("#currency_container").removeAttr('data-target');
    });
</script>