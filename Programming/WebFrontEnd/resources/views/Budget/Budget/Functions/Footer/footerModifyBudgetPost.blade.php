<!-- DISABLE SUB BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<script>
    $("#project_code_popup").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
    $("#currency_popup").prop("disabled", true);
</script>

<!-- FUNCTION INPUT NUMBER ONLY OR WITHOUT NEGATIVE -->
<script>
    $(document).on('input', '.number-only', function() {
        allowNumbersOnly(this);
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>

<!-- CURRENCY -->
<script>
    var no = 1;
    var applied = 0;
    var status = "";
    var statusDisplay = [];
    var statusJustifyContentCenter = [];
    var statusDisplay2 = [];
    var statusJustifyContentCenter2 = [];
    var statusForm = [];

    const budgetDataElement = document.getElementById('budgetDetailsData');
    const budgetArrayData = JSON.parse(budgetDataElement.value);

    if (budgetArrayData.length > 0) {
        $.each(budgetArrayData, function(key, val2) {
            var used = val2.quantityAbsorptionRatio * 100;

            if (used == "0.00" && val2.quantity == "0.00") {
                var applied = 0;
            } else {
                var applied = Math.round(used);
            }

            if (applied >= 100) {
                var status = "disabled";
            }

            if (val2.productName == "Unspecified Product") {
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
                balance_qty = numberFormatPHPCustom(val2.qtyAvail, 2);
            }

            var html = 
                '<tr>' +
                    '<td class="container-tbody-tr-budget" style="justify-content: center; display:' + statusDisplay[key] + '";">' + 
                        '<div class="input-group" style="max-width: 140px !important;">' + 
                            '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" value="' + val2.productId + '" readonly>' +
                            '<div>' +
                                '<span style="border-radius:0;" class="input-group-text form-control">' +
                                    '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                '</span>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +

                    '<td class="container-tbody-tr-budget" style="text-align: center !important; display:' + statusDisplay2[key] + '";">' + val2.productId + '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' + val2.productName + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.qtyBudget, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.price + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.currency + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.balanceBudget + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.totalBudget + '</td>' +
                    '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center" data-toggle="tooltip" data-placement="top" title="Pesan"> <input style="border-radius:0; width: 55px !important;" class="form-control number-only" autocomplete="off" id="modify_budget_details" name="modify_budget_details" value="' + val2.modifyInput +'"> </div>' + '</td>' +
                    '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-without-negative" autocomplete="off" id="price_budget_details" name="price_budget_details" value="' + val2.priceInput +'"> </div>' + '</td>' +
                    '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-only" autocomplete="off" id="total_budget_details" name="total_budget_details" value="' + val2.totalInput +'" disabled> </div>' + '</td>' +
                '</tr>';

            $('table#budgetTable tbody').append(html);
        });
    }
</script>

<!-- FUNCTION INPUT NUMBER ONLY OR WITHOUT NEGATIVE -->
<script>
    $(document).on('input', '.number-only', function() {
        allowNumbersOnly(this);
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>

<!-- FORM ADD NEW ITEM -->
<script>
    const addNewItemBtn = document.getElementById('addNewItemBtn');
    const newItemForm = document.getElementById('newItemForm');
    const newItemFormTwo = document.getElementById('newItemFormTwo');
    const newItemFormThree = document.getElementById('newItemFormThree');
    const newItemFormFour = document.getElementById('newItemFormFour');
    const buttonItemFormTwo = document.getElementById('buttonItemForm');

    function resetFormInputs() {
        document.getElementById('products_id').value = '';
        document.getElementById('products_id_show').value = '';
        document.getElementById('products_name').value = '';
        document.getElementById('qty').value = '';
        document.getElementById('price').value = '';
        document.getElementById('total_qty_price').value = '';
    }

    function hideFormAddNewItem() {
        newItemForm.style.display = 'none';
        newItemFormTwo.style.display = 'none';
        newItemFormThree.style.display = 'none';
        newItemFormFour.style.display = 'none';
        buttonItemFormTwo.style.display = 'none';
    }

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
</script>

<!-- FUNCTION MENGHITUNG TOTAL SETIAP BARIS PADA BUDGET DETAILS (TABLE) -->
<script>
    function calculateTotal(row) {
        const modifyInput = row.querySelector('input[name="modify_budget_details"]');
        const priceInput = row.querySelector('input[name="price_budget_details"]');
        const totalInput = row.querySelector('input[name="total_budget_details"]');
        const qtyAvail = row.children[4].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[4].textContent.trim().replace(/,/g, ''));
        const balancedBudget = row.children[7].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[7].textContent.trim().replace(/,/g, ''));
        const totalBudget = row.children[8].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[8].textContent.trim().replace(/,/g, ''));

        const modifyValue = parseFloat(modifyInput.value) || 0;
        const priceValue = parseFloat(priceInput.value) || 0;
        
        const resultQtyInput = qtyAvail + modifyValue;

        if (resultQtyInput < 0) {
            Swal.fire("Error", `Qty must be greater than 0`, "error");
            modifyInput.value = qtyAvail;
        }

        const totalValue = modifyInput.value * priceValue;
        const resultTotalInput = balancedBudget + totalValue;

        if (resultTotalInput < 0) {
            Swal.fire("Error", `Total must be greater than 0`, "error");
        }

        totalInput.value = numberFormatPHPCustom(totalValue, 2);
    }

    $('#budgetTable tbody').on('blur', 'input[name="modify_budget_details"], input[name="price_budget_details"]', function () {
        const row = $(this).closest('tr')[0];
        calculateTotal(row);
    });
</script>

<!-- FUNCTION UNTUK PENJUMLAHAN MODIFY, PRICE, TOTAL PADA MODIFY BUDGET LIST (CART) TABLE -->
<script>
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
</script>

<!-- FUNCTION BUTTON ADD TO CART FROM BUDGET DETAILS TABLE -->
<script>
    document.getElementById('buttonBudgetDetails').addEventListener('click', function () {
        const budgetTable = document.getElementById('budgetTable').querySelector('tbody');
        const listBudgetTable = document.getElementById('listBudgetTable').querySelector('tbody');
        let updated = false;
        let allBudgetDetailsData = [];
        let modifiedBudgetListData = [];

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
                    existingRow.cells[9].textContent = numberFormatPHPCustom(modifyInput.value, 2);
                    existingRow.cells[10].textContent = numberFormatPHPCustom(priceInput.value, 2);
                    existingRow.cells[11].textContent = totalInput.value;
                    updated = true;
                } else {
                    const clonedRow = row.cloneNode(true);

                    const productIdValue = productId;
                    const modifyValue = modifyInput.value;
                    const priceValue = priceInput.value;
                    const totalValue = totalInput.value;

                    clonedRow.cells[0].textContent = productIdValue;
                    clonedRow.cells[9].textContent = numberFormatPHPCustom(modifyValue, 2);
                    clonedRow.cells[10].textContent = numberFormatPHPCustom(priceValue, 2);
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
                    modifyInput: modifyInput.value,
                    priceInput: priceInput.value,
                    totalInput: totalInput.value
                });
            }
        });

        if (updated) {
            calculateBudgetTotals();

            document.getElementById('budgetDetailsData').value = JSON.stringify(allBudgetDetailsData);
            document.getElementById('modifyBudgetListData').value = JSON.stringify(modifiedBudgetListData);
        } else {
            Swal.fire("Error", "Please fill in Product Id, Modify(+/-), Price, and Total for at least one row", "error");
        }
    });
</script>

<!-- FUNCTION UNTUK MENGHITUNG TOTAL (MODIFY * PRICE) -->
<script>
    function calculateTotalForm() {
        const qty = parseFloat(document.getElementById("qty_form").value) || 0;
        const price = parseFloat(document.getElementById("price_form").value) || 0;
        const total = qty * price;
        document.getElementById("total_qty_price").value = total.toFixed(2);
    }

    document.getElementById("qty_form").addEventListener("input", calculateTotalForm);
    document.getElementById("price_form").addEventListener("input", calculateTotalForm);
</script>

<!-- FUNCTION BUTTON ADD TO CART FORM ADD NEW ITEM -->
<script>
    document.getElementById("addToCartNewFormItem").addEventListener("click", function (event) {
        event.preventDefault();

        const productId = document.getElementById("products_id_show").value;
        const productName = document.getElementById("products_name").value;
        const qty = document.getElementById("qty_form").value;
        const price = document.getElementById("price_form").value;
        const total = document.getElementById("total_qty_price").value;
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

        let productExists = false;
        for (let row of tbody.rows) {
            if (row.cells[0].textContent === productId) {
                productExists = true;
                break;
            }
        }

        if (productExists) {
            Swal.fire("Error", "Product ID already exists in the table.", "error");
            return;
        }

        budgetListDataaa.push({
            productId       : productId,
            productName     : productName,
            qtyBudget       : 0.00,
            qtyAvail        : 0.00,
            price           : 0.00,
            currency        : "USD",
            balanceBudget   : 0.00,
            totalBudget     : 0.00,
            modifyInput     : qty,
            priceInput      : price,
            totalInput      : total,
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
</script>

<script>
    const modifyDataElement = document.getElementById('modifyBudgetListData');
    const modifyArrayData = JSON.parse(modifyDataElement.value);
    const modifyFooterDataElement = document.getElementById('totalModifyFooterData');
    const modifyFooterElement = document.getElementById('totalModifyFooter');
    const priceFooterDataElement = document.getElementById('totalPriceFooterData');
    const priceFooterElement = document.getElementById('totalPriceFooter');
    const amountFooterDataElement = document.getElementById('totalAmountFooterData');
    const amountFooterElement = document.getElementById('totalAmountFooter');

    if (modifyArrayData.length > 0) {
        modifyFooterElement.textContent = numberFormatPHPCustom(modifyFooterDataElement.value, 2);
        priceFooterElement.textContent = numberFormatPHPCustom(priceFooterDataElement.value, 2);
        amountFooterElement.textContent = numberFormatPHPCustom(amountFooterDataElement.value, 2);

        $.each(modifyArrayData, function(key, val2) {
            var html = 
                '<tr>' +
                    '<td class="container-tbody-tr-budget" style="text-align: center !important; display: none;">' +
                        val2.productId +
                    '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: center !important;">' +
                        val2.productId +
                    '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' +
                        val2.productName +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.qtyBudget +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' +
                        val2.qtyAvail +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.price + 
                    '</td>' + 
                    '<td class="container-tbody-tr-budget">' + 
                        val2.currency +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.balanceBudget + 
                    '</td>' + 
                    '<td class="container-tbody-tr-budget">' + 
                        val2.totalBudget + 
                    '</td>' + 
                    '<td class="container-tbody-tr-budget">' +
                        numberFormatPHPCustom(val2.modifyInput, 2) + 
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        numberFormatPHPCustom(val2.priceInput, 2) + 
                    '</td>' +
                    '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + 
                        val2.totalInput +
                    '</td>'
                '</tr>';

            $('table#listBudgetTable tbody').append(html);
        });
    }
</script>