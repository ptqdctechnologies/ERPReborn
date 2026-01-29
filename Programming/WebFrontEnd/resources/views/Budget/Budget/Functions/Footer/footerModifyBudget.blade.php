<script>
    const siteId                = document.getElementById('site_id');
    const siteCode              = document.getElementById('site_code');
    const reasonForModify       = document.getElementById('reason_modify');
    const submitButton          = document.getElementById('submitButton');
    const listBudgetTableBody   = document.querySelector('#listBudgetTable tbody');
    const addNewItemBtn         = document.getElementById('addNewItemBtn');
    const newItemForm           = document.getElementById('newItemForm');
    const newItemFormTwo        = document.getElementById('newItemFormTwo');
    const newItemFormThree      = document.getElementById('newItemFormThree');
    const newItemFormFour       = document.getElementById('newItemFormFour');
    const buttonItemFormTwo     = document.getElementById('buttonItemForm');
    const cancelButton          = document.getElementById('cancelButton');
    const budgetTbodyTable      = document.querySelector('#budgetTable tbody');
    const dummy                 = [
        {
            quantityAbsorptionRatio: 1.8,
            quantity: 50,
            productName: "Compacted Back Fill",
            quantityRemaining: 0,
            product_RefID: 88000000005292,
            priceBaseCurrencyValue: 29.99,
            balancedBudget: 499.50
        },
        {
            quantityAbsorptionRatio: 2.2,
            quantity: 20,
            productName: "Acces Roof Top Tangga",
            quantityRemaining: 0,
            product_RefID: 88000000001725,
            priceBaseCurrencyValue: 120.50,
            balancedBudget: 410.00
        },
        {
            quantityAbsorptionRatio: 1.5,
            quantity: 100,
            productName: "Yoke Plate Triangular 30 KIP Galvanize",
            quantityRemaining: 10,
            product_RefID: 88000000011558,
            priceBaseCurrencyValue: 50.00,
            balancedBudget: 1000.00
        },
        {
            quantityAbsorptionRatio: 2.8,
            quantity: 100,
            productName: "Wiring, Testing dan Commisioning Peralatan Telekomunikasi PLC Teleproteksi",
            quantityRemaining: 0,
            product_RefID: 88000000010609,
            priceBaseCurrencyValue: 30.99,
            balancedBudget: 599.50
        },
        {
            quantityAbsorptionRatio: 1.2,
            quantity: 10,
            productName: "150kV Single suspension string set for 2xAAAC 630Qmm, 120kN, w/o insulator, envelope type",
            quantityRemaining: 0,
            product_RefID: 88000000010968,
            priceBaseCurrencyValue: 110.50,
            balancedBudget: 400.00
        },
        {
            quantityAbsorptionRatio: 3.5,
            quantity: 200,
            productName: "Jumper 5 m Din Male - Din Right Angels",
            quantityRemaining: 20,
            product_RefID: 88000000005886,
            priceBaseCurrencyValue: 100.00,
            balancedBudget: 10000.00
        },
    ];

    function checkTableData() {
        const isTableNotEmpty       = listBudgetTableBody.rows.length > 0;
        const isSiteCodeNotEmpty    = siteCode.value.trim() !== '';
        const isReasonNotEmpty      = reasonForModify.value.trim() !== '';

        if (isTableNotEmpty && isSiteCodeNotEmpty && isReasonNotEmpty) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    function toggleAddNewItemButton() {
        const tbody             = document.querySelector('#budgetTable tbody');
        const addNewItemBtn     = document.getElementById('addNewItemBtn');
        const searchBudgetBtn   = document.getElementById('budget_detail_search');
        const budgetDetailsBtn  = document.getElementById('buttonBudgetDetails');
        
        if (tbody && tbody.rows.length > 0) {
            addNewItemBtn.style.display     = 'block';
            searchBudgetBtn.style.display   = 'block';
            budgetDetailsBtn.style.display  = 'flex';
        } else {
            addNewItemBtn.style.display     = 'none';
            searchBudgetBtn.style.display   = 'none';
            budgetDetailsBtn.style.display  = 'none';
        }
    }

    function resetFormInputs() {
        document.getElementById('products_id').value = '';
        document.getElementById('products_id_show').value = '';
        document.getElementById('products_name').value = '';
        document.getElementById('qty_form').value = '';
        document.getElementById('price_form').value = '';
        document.getElementById('total_qty_price').value = '';
    }

    function hideFormAddNewItem() {
        newItemForm.style.display = 'none';
        newItemFormTwo.style.display = 'none';
        newItemFormThree.style.display = 'none';
        newItemFormFour.style.display = 'none';
        buttonItemFormTwo.style.display = 'none';
    }

    function checkAndDisable() {
        const projectId   = $('#project_id').val();
        const projectCode = $('#project_code').val();
        const projectName = $('#project_name').val();
        const siteId      = $('#site_id').val();
        const siteCode    = $('#site_code').val();
        const siteName    = $('#site_name').val();

        if (projectId && projectCode && projectName && siteId && siteCode && siteName) {
            $('#project_code_popup').addClass('disabled').css('pointer-events', 'none');
            $('#site_code_popup').addClass('disabled').css('pointer-events', 'none');
        } else {
            $('#project_code_popup').removeClass('disabled').css('pointer-events', 'auto');
            $('#site_code_popup').removeClass('disabled').css('pointer-events', 'auto');
        }
    }

    function calculateBudgetTotals() {
        let totalModify = 0;
        let totalPrice = 0;
        let totalAmount = 0;

        document.querySelectorAll('#listBudgetTable tbody tr').forEach(row => {
            let modifyValue = 0;
            let priceValue = 0;
            let totalValue = 0;

            if (row.cells.length > 11) {
                modifyValue = row.cells[9].textContent;
                priceValue = row.cells[10].textContent;
                totalValue = row.cells[11].textContent;
            } else {
                modifyValue = row.cells[8].textContent;
                priceValue = row.cells[9].textContent;
                totalValue = row.cells[10].textContent;
            }

            totalModify += parseFloat(modifyValue.replace(/,/g, ""));
            totalPrice += parseFloat(priceValue.replace(/,/g, ""));
            totalAmount += parseFloat(totalValue.replace(/,/g, ""));
        });

        document.getElementById('totalModifyFooter').textContent = numberFormatPHPCustom(totalModify, 2);
        document.getElementById('totalPriceFooter').textContent = numberFormatPHPCustom(totalPrice, 2);
        document.getElementById('totalAmountFooter').textContent = numberFormatPHPCustom(totalAmount, 2);

        document.getElementById('totalModifyFooterData').value = totalModify;
        document.getElementById('totalPriceFooterData').value = totalPrice;
        document.getElementById('totalAmountFooterData').value = totalAmount;
    }

    function calculateTotalForm() {
        const qty   = parseFloat(document.getElementById("qty_form").value.replace(/,/g, '')) || 0;
        const price = parseFloat(document.getElementById("price_form").value.replace(/,/g, '')) || 0;
        const total = qty * price;
        
        document.getElementById("total_qty_price").value = numberFormatPHPCustom(total, 2);
    }

    function calculateTotal(row) {
        const modifyInput = row.querySelector('input[name="modify_budget_details"]');
        const priceInput = row.querySelector('input[name="price_budget_details"]');
        const totalInput = row.querySelector('input[name="total_budget_details"]');
        const qtyAvail = row.children[4].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[4].textContent.trim().replace(/,/g, ''));
        const balancedBudget = row.children[7].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[7].textContent.trim().replace(/,/g, ''));
        const totalBudget = row.children[8].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[8].textContent.trim().replace(/,/g, ''));

        const modifyValue = parseFloat(modifyInput.value.replace(/,/g, '')) || 0;
        const priceValue = parseFloat(priceInput.value.replace(/,/g, '')) || 0;
        
        const resultQtyInput = qtyAvail + modifyValue;

        if (resultQtyInput < 0) {
            Swal.fire("Error", `Qty must not exceed Qty Avail`, "error");
            modifyInput.value = qtyAvail;
        }

        const totalValue = modifyValue * priceValue;
        const resultTotalInput = balancedBudget + totalValue;

        if (resultTotalInput < 0) {
            Swal.fire("Error", `Total must not exceed Total Budget`, "error");
        }

        totalInput.value = numberFormatPHPCustom(totalValue, 2);
    }

    function getBudgetDetail(currencyCode) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + siteId.value,
            success: function(data) {
                let no = 1;
                let applied = 0;
                let status = "";
                let statusDisplay = [];
                let statusJustifyContentCenter = [];
                let statusDisplay2 = [];
                let statusJustifyContentCenter2 = [];
                let statusForm = [];
                let balance_qty = 0;

                if (data.message == "Invalid SQL Syntax") {
                    $('table#budgetTable tbody').append(
                        '<tr>' +
                            '<td class="container-tbody-tr-budget" colspan="14" style="color: red; font-style: italic;">' + 
                                'No Data Available' +
                            '</td>' +
                        '</tr>'
                    );
                } else {
                    if (currencyCode == "USD" || currencyCode == "EUR") {
                        $.each(dummy, function(key, val) {
                            let used = val.quantityAbsorptionRatio * 100;
                            let product_name_id = 'product_name' + key;

                            if (used == "0.00" && val.quantity == "0.00") {
                                applied = 0;
                            } else {
                                applied = Math.round(used);
                            }

                            if (applied >= 100) {
                                status = "disabled";
                            }

                            if (val.productName == "Unspecified Product") {
                                statusDisplay[key] = "flex";
                                statusJustifyContentCenter[key] = "center";
                                statusDisplay2[key] = "none";
                                statusForm[key] = "disabled";
                                balance_qty = numberFormatPHPCustom(val.quantityRemaining, 2);
                            } else {
                                statusDisplay[key] = "none";
                                statusJustifyContentCenter2[key] = "center";
                                statusDisplay2[key] = "";
                                statusForm[key] = "";
                                balance_qty = numberFormatPHPCustom(val.quantityRemaining, 2);
                            }

                            var html = 
                                '<tr>' +
                                    '<td class="container-tbody-tr-budget" style="justify-content: center; display:' + statusDisplay[key] + '";">' + 
                                        '<div class="input-group" style="max-width: 140px !important;">' + 
                                            '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" readonly>' +
                                            '<div>' +
                                                '<span style="border-radius:0;" class="input-group-text form-control">' +
                                                    '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                                '</span>' +
                                            '</div>' +
                                        '</div>' +
                                    '</td>' +
                                    '<td class="container-tbody-tr-budget" style="text-align: center !important; display:' + statusDisplay2[key] + '";">' + val.product_RefID + '</td>' +
                                    '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' + 
                                        '<span id="' + product_name_id + '">' + val.productName + '</span>' +
                                    '</td>' +
                                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val.quantity, 2) + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val.priceBaseCurrencyValue, 2) + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + currencyCode + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(balance_qty * val.priceBaseCurrencyValue , 2) + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val.quantity * val.priceBaseCurrencyValue, 2) + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center" data-toggle="tooltip" data-placement="top" title="Pesan"> <input style="border-radius:0; width: 55px !important;" class="form-control number-only" autocomplete="off" id="modify_budget_details" name="modify_budget_details"> </div>' + '</td>' +
                                    '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-without-negative" autocomplete="off" id="price_budget_details" name="price_budget_details"> </div>' + '</td>' +
                                    '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-only" autocomplete="off" id="total_budget_details" name="total_budget_details" disabled> </div>' + '</td>' +
                                '</tr>';

                            $('table#budgetTable tbody').append(html);
                        });
                    } else {
                        $.each(data, function(key, val) {
                            if (val.product_RefID && val.productName != "Unspecified Product") {
                                let used            = val.quantityAbsorptionRatio * 100;
                                let product_name_id = 'product_name' + key;

                                if (used == "0.00" && val.quantity == "0.00") {
                                    applied = 0;
                                } else {
                                    applied = Math.round(used);
                                }

                                if (applied >= 100) {
                                    status = "disabled";
                                }

                                if (val.productName == "Unspecified Product") {
                                    statusDisplay[key] = "flex";
                                    statusJustifyContentCenter[key] = "center";
                                    statusDisplay2[key] = "none";
                                    statusForm[key] = "disabled";
                                    balance_qty = "-";
                                } else {
                                    statusDisplay[key] = "none";
                                    statusJustifyContentCenter2[key] = "center";
                                    statusDisplay2[key] = "";
                                    statusForm[key] = "";
                                    balance_qty = numberFormatPHPCustom(val.quantityRemaining, 2);
                                }

                                var html = 
                                    '<tr>' +
                                        '<td class="container-tbody-tr-budget" style="justify-content: center; display:' + statusDisplay[key] + '";">' + 
                                            '<div class="input-group" style="max-width: 140px !important;">' + 
                                                '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" readonly>' +
                                                '<div>' +
                                                    '<span style="border-radius:0;" class="input-group-text form-control">' +
                                                        '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                                    '</span>' +
                                                '</div>' +
                                            '</div>' +
                                        '</td>' +

                                        '<td class="container-tbody-tr-budget" style="text-align: center !important; display:' + statusDisplay2[key] + '";">' + val.product_RefID + '</td>' +
                                        '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' + 
                                            '<span id="' + product_name_id + '">' + val.productName + '</span>' +
                                        '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val.quantity, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val.priceBaseCurrencyValue, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + val.priceBaseCurrencyISOCode + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(50000, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val.quantity * val.priceBaseCurrencyValue, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center" data-toggle="tooltip" data-placement="top" title="Pesan"> <input style="border-radius:0; width: 55px !important;" class="form-control number-only" autocomplete="off" id="modify_budget_details" name="modify_budget_details"> </div>' + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-without-negative" autocomplete="off" id="price_budget_details" name="price_budget_details"> </div>' + '</td>' +
                                        '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-only" autocomplete="off" id="total_budget_details" name="total_budget_details" disabled> </div>' + '</td>' +
                                    '</tr>';

                                $('table#budgetTable tbody').append(html);
                            }
                        });
                    }
                }

                getProductss();
            }
        });
    }

    siteCode.addEventListener('input', checkTableData);
    
    reasonForModify.addEventListener('input', checkTableData);

    cancelButton.addEventListener('click', function() {
        $('table#budgetTable tbody').empty();
        $('table#listBudgetTable tbody').empty();

        $('#project_code_popup').removeClass('disabled').css('pointer-events', 'auto');
        $('#site_code_popup').removeClass('disabled').css('pointer-events', 'auto');
        
        $("#project_id").val("");
        $("#project_code").val("");
        $("#project_name").val("");

        $("#site_id").val("");
        $("#site_code").val("");
        $("#site_name").val("");

        $("#reason_modify").val("");
        $("#currency_id").val("");
        $("#currency_symbol").val("");
        $("#currency_name").val("");
        $("#exchange_rate").val("");
        $("#value_co").val("");

        $("#budgetDetailsData").val("");
        $("#modifyBudgetListData").val("");

        $(`#newItemForm`).hide();
        $(`#newItemFormTwo`).hide();
        $(`#newItemFormThree`).hide();
        $(`#newItemFormFour`).hide();
        $(`#buttonItemForm`).hide();
        
        document.getElementById('totalModifyFooter').textContent = 0;
        document.getElementById('totalPriceFooter').textContent = 0;
        document.getElementById('totalAmountFooter').textContent = 0;

        document.getElementById('totalModifyFooterData').value = 0;
        document.getElementById('totalPriceFooterData').value = 0;
        document.getElementById('totalAmountFooterData').value = 0;
    });

    addNewItemBtn.addEventListener('click', function() {
        if (newItemForm.style.display === 'none' || newItemForm.style.display === '' && newItemFormTwo.style.display === 'none' || newItemFormTwo.style.display === '' && newItemFormThree.style.display === 'none' || newItemFormThree.style.display === '' && newItemFormFour.style.display === 'none' || newItemFormFour.style.display === '' && buttonItemFormTwo.style.display === 'none' || buttonItemFormTwo.style.display === '') {
            newItemForm.style.display = 'flex';
            newItemFormTwo.style.display = 'flex';
            newItemFormThree.style.display = 'flex';
            newItemFormFour.style.display = 'flex';
            buttonItemFormTwo.style.display = 'flex';
        } else {
            hideFormAddNewItem();
            resetFormInputs();
        }
    });

    document.getElementById("addToCartNewFormItem").addEventListener("click", function (event) {
        event.preventDefault();

        const productId = document.getElementById("products_id_show").value;
        const productName = document.getElementById("products_name").value;
        const qty = document.getElementById("qty_form").value.replace(/,/g, '');
        const price = document.getElementById("price_form").value.replace(/,/g, '');
        const total = document.getElementById("total_qty_price").value.replace(/,/g, '');
        const currencySymbolll = document.getElementById("currency_symbol").value;

        if (!productId || !productName || !qty || !price) {
            Swal.fire("Error", "Please fill all the fields before adding to cart.", "error");
            return;
        }

        let budgetListDataaa = [];
        const existingData = document.getElementById("modifyBudgetListData").value;
        if (existingData) {
            budgetListDataaa = JSON.parse(existingData);
        }

        const tbody = document.getElementById("listBudgetTable").getElementsByTagName("tbody")[0];

        // let productExists = false;
        // for (let row of tbody.rows) {
        //     if (row.cells[0].textContent === productId) {
        //         productExists = true;
        //         break;
        //     }
        // }

        // if (productExists) {
        //     Swal.fire("Error", "Product ID already exists in the table.", "error");
        //     return;
        // }

        budgetListDataaa.push({
            productId       : productId,
            productName     : productName,
            qtyBudget       : 0.00,
            qtyAvail        : 0.00,
            price           : 0.00,
            currency        : "USD",
            balanceBudget   : 0.00,
            totalBudget     : 0.00,
            modifyInput     : numberFormatPHPCustom(qty, 2),
            priceInput      : numberFormatPHPCustom(price, 2),
            totalInput      : numberFormatPHPCustom(total, 2),
        });

        document.getElementById("modifyBudgetListData").value = JSON.stringify(budgetListDataaa);

        const row = tbody.insertRow();

        const cell1 = row.insertCell();
        cell1.textContent = productId;
        cell1.classList.add("container-tbody-tr-budget");

        const cell2 = row.insertCell();
        cell2.textContent = productName;
        // cell2.classList.add("container-tbody-tr-budget");

        const cell3 = row.insertCell();
        cell3.textContent = numberFormatPHPCustom(0, 2);
        cell3.classList.add("container-tbody-tr-budget");

        const cell4 = row.insertCell();
        cell4.textContent = numberFormatPHPCustom(0, 2);
        cell4.classList.add("container-tbody-tr-budget");

        const cell5 = row.insertCell();
        cell5.textContent = numberFormatPHPCustom(0, 2);
        cell5.classList.add("container-tbody-tr-budget");

        const cell6 = row.insertCell();
        cell6.textContent = currencySymbolll;
        cell6.classList.add("container-tbody-tr-budget");

        const cell7 = row.insertCell();
        cell7.textContent = numberFormatPHPCustom(0, 2);
        cell7.classList.add("container-tbody-tr-budget");

        const cell8 = row.insertCell();
        cell8.textContent = numberFormatPHPCustom(0, 2);
        cell8.classList.add("container-tbody-tr-budget");

        const cell9 = row.insertCell();
        cell9.textContent = numberFormatPHPCustom(qty, 2);
        cell9.classList.add("container-tbody-tr-budget");

        const cell10 = row.insertCell();
        cell10.textContent = numberFormatPHPCustom(price, 2);
        cell10.classList.add("container-tbody-tr-budget");

        const cell11 = row.insertCell();
        cell11.textContent = numberFormatPHPCustom(total, 2);
        cell11.classList.add("container-tbody-tr-budget");

        calculateBudgetTotals();

        document.getElementById("products_id_show").value = "";
        document.getElementById("products_name").value = "";
        document.getElementById("qty_form").value = "";
        document.getElementById("price_form").value = "";
        document.getElementById("total_qty_price").value = "";
    });

    document.getElementById('buttonBudgetDetails').addEventListener('click', function () {
        const budgetTable = document.getElementById('budgetTable').querySelector('tbody');
        const listBudgetTable = document.getElementById('listBudgetTable').querySelector('tbody');
        let updated = false;
        let allBudgetDetailsData = [];
        let modifiedBudgetListData = [];

        // Ambil value yang ada sebelumnya di input `modifyBudgetListData`
        const existingModifyBudgetListData = document.getElementById('modifyBudgetListData').value;

        if (existingModifyBudgetListData) {
            try {
                modifiedBudgetListData = JSON.parse(existingModifyBudgetListData);
            } catch (error) {
                modifiedBudgetListData = [];
            }
        }

        [...budgetTable.rows].forEach((row, index) => {
            const productIdTemp = row.querySelector('input[name="product_id_show"]');
            const productId     = row.cells[1].textContent != "null" ? row.cells[1].textContent.trim() : productIdTemp.value;
            const productName   = row.cells[2].textContent.trim();
            const qtyBudget     = row.cells[3].textContent.trim();
            const qtyAvail      = row.cells[4].textContent.trim();
            const price         = row.cells[5].textContent.trim();
            const currency      = row.cells[6].textContent.trim();
            const balanceBudget = row.cells[7].textContent.trim();
            const totalBudget   = row.cells[8].textContent.trim();
            const modifyInput   = row.querySelector('input[name="modify_budget_details"]');
            const priceInput    = row.querySelector('input[name="price_budget_details"]');
            const totalInput    = row.querySelector('input[name="total_budget_details"]');

            allBudgetDetailsData.push({
                productId,
                productName,
                qtyBudget,
                qtyAvail,
                price,
                currency,
                balanceBudget,
                totalBudget,
                modifyInput: modifyInput.value,
                priceInput: priceInput.value,
                totalInput: totalInput.value
            });

            if (productId && modifyInput.value && priceInput.value && totalInput.value) {
                let existingRow = [...listBudgetTable.rows].find(listRow => listRow.cells[2].textContent.trim() === productName && listRow.cells[3].textContent.trim() === qtyBudget && listRow.cells[4].textContent.trim() === qtyAvail && listRow.cells[5].textContent.trim() === price && listRow.cells[6].textContent.trim() === currency && listRow.cells[7].textContent.trim() === balanceBudget && listRow.cells[8].textContent.trim() === totalBudget);

                if (existingRow) {
                    existingRow.cells[0].textContent = productId;
                    existingRow.cells[9].textContent = numberFormatPHPCustom(modifyInput.value.replace(/,/g, ""), 2);
                    existingRow.cells[10].textContent = numberFormatPHPCustom(priceInput.value.replace(/,/g, ""), 2);
                    existingRow.cells[11].textContent = totalInput.value;
                    updated = true;
                } else {
                    const clonedRow = row.cloneNode(true);

                    const productIdValue = productId;
                    const modifyValue = numberFormatPHPCustom(modifyInput.value.replace(/,/g, ""), 2);
                    const priceValue = numberFormatPHPCustom(priceInput.value.replace(/,/g, ""), 2);
                    const totalValue = totalInput.value;

                    clonedRow.cells[0].textContent = productIdValue;
                    clonedRow.cells[9].textContent = modifyValue;
                    clonedRow.cells[10].textContent = priceValue;
                    clonedRow.cells[11].textContent = totalValue;

                    listBudgetTable.appendChild(clonedRow);
                    updated = true;
                }

                modifiedBudgetListData.push({
                    productId,
                    productName,
                    qtyBudget,
                    qtyAvail,
                    price,
                    currency,
                    balanceBudget,
                    totalBudget,
                    modifyInput: numberFormatPHPCustom(modifyInput.value.replace(/,/g, ""), 2),
                    priceInput: numberFormatPHPCustom(priceInput.value.replace(/,/g, ""), 2),
                    totalInput: totalInput.value
                });
            }
        });

        if (updated) {
            calculateBudgetTotals();

            document.getElementById('budgetDetailsData').value = JSON.stringify(allBudgetDetailsData);

            // Gabungkan data baru dengan data lama
            const combinedData = [
                ...modifiedBudgetListData.reduce((map, obj) => map.set(obj.productId, obj), new Map()).values(),
            ];

            document.getElementById('modifyBudgetListData').value = JSON.stringify(combinedData);
        } else {
            Swal.fire("Error", "Please fill in Product Id, Modify(+/-), Price, and Total for at least one row", "error");
        }
    });

    document.getElementById("qty_form").addEventListener("input", calculateTotalForm);

    document.getElementById("price_form").addEventListener("input", calculateTotalForm);

    $('#budgetTable tbody').on('keyup', 'input[name="modify_budget_details"], input[name="price_budget_details"]', function () {
        const row = $(this).closest('tr')[0];
        calculateTotal(row);
    });

    $('#tableProjects').on('click', 'tbody tr', async function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        const projectCode = $(this).find('td:nth-child(2)').text();
        const projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id").val(sysId);
        $("#project_code").val(projectCode);
        $("#project_name").val(`${projectCode} - ${projectName}`);
        $("#project_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        $("#site_code_popup").prop("disabled", false);
        $("#budgetMessage").hide();

        getSites(sysId);

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId     = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode  = $(this).find('td:nth-child(2)').text();
        const siteName  = $(this).find('td:nth-child(3)').text();

        $("#site_id").val(sysId);
        $("#site_code").val(siteCode);
        $("#site_name").val(`${siteCode} - ${siteName}`);
        $("#site_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        $("#currency_popup").prop("disabled", false);
        $("#subBudgetMessage").hide();

        $("#mySites").modal('toggle');
    });

    $('#tableCurrencies').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        if (code != "USD" && code != "IDR" && code != "EUR") {
            Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");

            return;
        } else {
            if (code == "USD") {
                $("#exchange_rate").val(numberFormatPHPCustom(16000, 2));
            } else if (code == "EUR") {
                $("#exchange_rate").val(numberFormatPHPCustom(17205, 2));
            } else if (code == "IDR") {
                $("#exchange_rate").val("");
            }

            $(`#currency_id`).val(sysId);
            $(`#currency_symbol`).val(code);
            $(`#currency_name`).val(`${code} - ${name}`);
            $(`#currency_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
            $("#currency_message").hide();
            $('table#budgetTable tbody').empty();

            getBudgetDetail(code);
        }

        $("#myCurrencies").modal('toggle');
    });

    $('#tableGetProductss').on('click', 'tbody tr', async function() {
        const sysId = $(this).find('input[data-trigger="sys_id_product"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();
        
        $(`#products_id`).val(sysId);
        $(`#products_id_show`).val(code);
        $(`#products_name`).val(`${code} - ${name}`);
        $(`#products_name`).css('background-color', '#e9ecef');
        
        $('#myProductss').modal('hide');
    });

    $('#myProjects').on('click', function() {
        checkAndDisable();
    });

    $('#mySites').on('click', function() {
        checkAndDisable();
    });

    $('#project_code, #site_code').on('input change', function() {
        checkAndDisable();
    });

    $(document).on('input', '.number-only', function() {
        allowNumbersOnly(this);
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        const observer = new MutationObserver(toggleAddNewItemButton);
        observer.observe(document.querySelector('#budgetTable tbody'), { childList: true });

        const observerListBudgetTableBody = new MutationObserver(checkTableData);
        observerListBudgetTableBody.observe(listBudgetTableBody, { childList: true });

        $("#site_code_popup").prop("disabled", true);
        $("#currency_popup").prop("disabled", true);

        $('#budget_detail_search').on('input', function() {
            const searchValue = $(this).val().toLowerCase();
            
            const rows = $('#budgetTable tbody tr');
            
            rows.each(function() {
                const row = $(this);
                const productId = row.find('td:eq(1)').text().trim().toLowerCase();
                const productName = row.find('td:eq(2)').text().trim().toLowerCase();
                
                if (productId.includes(searchValue) || productName.includes(searchValue)) {
                    row.show();
                } else {
                    row.hide();
                }
            });
        });

        $('#budget_detail_search').on('change', function() {
            if ($(this).val() === '') {
                $('#budgetTable tbody tr').show();
            }
        });

        checkTableData();
        checkAndDisable();
        toggleAddNewItemButton();
    });
</script>