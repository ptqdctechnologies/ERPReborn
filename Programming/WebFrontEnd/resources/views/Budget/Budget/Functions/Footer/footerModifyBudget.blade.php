<!-- DISABLE SUD BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<script>
    $("#site_code").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
</script>

<!-- BUDGET CODE -->
<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {

        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#project_id").val(sys_id);
        $("#project_code").val(code);
        $("#project_name").val(name);
        $("#site_code").prop("disabled", false);
        $("#site_code_popup").prop("disabled", false);
        $("#site_id").val("");
        $("#site_code").val("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?project_code=' + sys_id,
            success: function(data) {

                var no = 1;
                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.Code + '</td>',
                        '<td>' + val.Name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<!-- SITE CODE -->
<script>
    $('#tableGetSite tbody').on('click', 'tr', function() {

        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#site_id").val(sys_id);
        $("#site_code").val(code);
        $("#site_name").val(name);
    });
</script>

<!-- FUNCTION KETIKA ADDITIONAL YES OR NO -->
<script>
    function toggleCurrencyField() {
        const additionalCORadios = document.getElementsByName('additional_co');
        const currencyField = document.getElementById('currency_field');
        const currencyInput = document.getElementById('currency');
        const currencyID = document.getElementById('currency_id');
        const currencySymbol = document.getElementById('currency_symbol');
        const currencyName = document.getElementById('currency_name');
        const valueIDRRateField = document.getElementById('value_idr_rate_field');
        const valueIDRRateInput = document.getElementById('value_idr_rate');
        const valueCOAdditionalField = document.getElementById('value_co_additional_field');
        const valueCOAdditionalInput = document.getElementById('value_co_additional');
        const valueCODeductiveField = document.getElementById('value_co_deductive_field');
        const valueCODeductiveInput = document.getElementById('value_co_deductive');
        
        additionalCORadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'yes' && this.checked) {
                    currencyField.style.display = 'flex';
                    valueIDRRateField.style.display = 'flex';
                    valueCOAdditionalField.style.display = 'flex';
                    valueCODeductiveField.style.display = 'flex';
                } else {
                    currencyField.style.display = 'none';
                    currencyID.value = '';
                    currencySymbol.value = '';
                    currencyName.value = '';

                    valueIDRRateField.style.display = 'none';
                    valueIDRRateInput.value = '';

                    valueCOAdditionalField.style.display = 'none';
                    valueCOAdditionalInput.value = '';
                    valueCODeductiveField.style.display = 'none';
                    valueCODeductiveInput.value = '';

                    $('#value_co_deductive').prop('disabled', false);
                    $('#value_co_additional').prop('disabled', false);
                }
            });
        });
    }

    toggleCurrencyField();
</script>

<!-- CURRENCY -->
<script>
    $('#tableGetCurrency tbody').on('click', 'tr', function() {

        $("#myCurrency").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_currency' + id).val();
        var name = row.find("td:nth-child(2)").text();
        var symbol = row.find("td:nth-child(3)").text();

        $("#currency_id").val(sys_id);
        $("#currency_name").val(name);
        $("#currency_symbol").val(symbol);
    });
</script>

<!-- VALUE CO ADDITIONAL & DEDUCTIVE -->
<script>
    $(document).ready(function() {
        $('#value_co_additional').on('input', function() {
            if ($(this).val().trim() !== "") {
                $('#value_co_deductive').prop('disabled', true);
            } else {
                $('#value_co_deductive').prop('disabled', false);
            }
        });

        $('#value_co_deductive').on('input', function() {
            if ($(this).val().trim() !== "") {
                $('#value_co_additional').prop('disabled', true);
            } else {
                $('#value_co_additional').prop('disabled', false);
            }
        });
    });
</script>

<!-- FILE ATTACHMENT -->
<script>
    const fileInput = document.getElementById('attachment_file');
    const fileList = document.getElementById('file_list');
    const hiddenInputs = document.getElementById('hidden_inputs');
    const fileTable = document.getElementById('file_table');
    let fileIndex = 1;

    fileInput.addEventListener('change', (event) => {
        const files = event.target.files;

        Array.from(files).forEach(file => {
            const row = document.createElement('tr');

            const noCell = document.createElement('td');
            noCell.textContent = fileIndex++;
            row.appendChild(noCell);

            const fileNameCell = document.createElement('td');
            fileNameCell.textContent = file.name;
            row.appendChild(fileNameCell);

            const fileSizeCell = document.createElement('td');
            fileSizeCell.textContent = (file.size / 1024).toFixed(2) + ' KB';
            row.appendChild(fileSizeCell);

            const uploadDateCell = document.createElement('td');
            const currentDateTime = new Date().toLocaleString();
            uploadDateCell.textContent = currentDateTime;
            row.appendChild(uploadDateCell);

            const previewCell = document.createElement('td');
            const previewLink = document.createElement('a');
            previewLink.href = URL.createObjectURL(file);
            previewLink.target = '_blank';
            previewLink.className = 'btn btn-primary btn-sm';
            previewLink.textContent = 'Preview';
            previewCell.appendChild(previewLink);
            row.appendChild(previewCell);

            const deleteCell = document.createElement('td');
            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.className = 'btn btn-danger btn-sm';
            deleteButton.onclick = (e) => {
                e.preventDefault();
                row.remove();
                hiddenInput.remove();
                updateTableVisibility();
            };
            deleteCell.appendChild(deleteButton);
            row.appendChild(deleteCell);

            fileList.appendChild(row);

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'uploaded_files[]';
            hiddenInput.value = file;
            hiddenInputs.appendChild(hiddenInput);
        });

        updateTableVisibility();
    });
    
    function updateTableVisibility() {
        if (fileList.children.length === 0) {
            fileTable.style.display = 'none';
            resetFileInput();
        } else {
            fileTable.style.display = 'inline-table';
        }
    }

    function resetFileInput() {
        fileInput.value = ''; 
    }
</script>

<!-- VALIDASI SHOW/HIDE FORM ADD NEW ITEM KETIKA TABLE EXISTING BUDGET ADA DATANYA -->
<script>
    function checkTableRows() {
        const table = document.getElementById('budgetTable');
        const tbody = table.querySelector('tbody');
        const form = document.getElementById('budgetForm');

        if (tbody.getElementsByTagName('tr').length > 0) {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }

    checkTableRows();
</script>

<!-- BUTTON ADD TO CART (BUDGET DETAILS) -->
<script>
    document.getElementById('buttonBudgetDetails').addEventListener('click', function() {
        let budgetRows = document.querySelectorAll('#budgetTable tbody tr');

        budgetRows.forEach(function(row) {
            let qtyAdditional = row.querySelector('input[name="qty_additional"]').value.trim();
            let priceAdditional = row.querySelector('input[name="price_additional"]').value.trim();
            let totalAdditional = row.querySelector('input[name="total_additional"]').value.trim();
            let qtySaving = row.querySelector('input[name="qty_saving"]').value.trim();
            let priceSaving = row.querySelector('input[name="price_saving"]').value.trim();
            let totalSaving = row.querySelector('input[name="total_saving"]').value.trim();
            let productId = row.querySelector('td:first-child').textContent.trim();

            if (qtyAdditional && priceAdditional && totalAdditional || qtySaving && priceSaving && totalSaving) {
                let listTableBody = document.querySelector('#listBudgetTable tbody');
                let existingRow = Array.from(listTableBody.querySelectorAll('tr')).find(tr => {
                    return tr.querySelector('td:first-child').textContent.trim() === productId;
                });

                if (existingRow) {
                    existingRow.querySelectorAll('td').forEach(function(td, index) {
                        let input = row.querySelectorAll('td')[index].querySelector('input');
                        if (input) {
                            td.textContent = input.value;
                        }
                        td.className = 'container-tbody-tr-budget';
                    });
                } else {
                    let clonedRow = row.cloneNode(true);

                    clonedRow.querySelectorAll('td').forEach(function(td) {
                        let input = td.querySelector('input');
                        if (input) {
                            td.textContent = input.value;
                        }
                        td.className = 'container-tbody-tr-budget';
                    });

                    listTableBody.appendChild(clonedRow);
                }
            } else if (!qtyAdditional && priceAdditional && totalAdditional) {
                Swal.fire("Error", "Qty Additional Cannot Be Empty", "error");
            } else if (qtyAdditional && !priceAdditional && totalAdditional) {
                Swal.fire("Error", "Price Additional Cannot Be Empty", "error");
            } else if (!qtySaving && priceSaving && totalSaving) {
                Swal.fire("Error", "Qty Saving Cannot Be Empty", "error");
            } else if (qtySaving && !priceSaving && totalSaving) {
                Swal.fire("Error", "Price Saving Cannot Be Empty", "error");
            }
        });
    });

    // OLD
    // document.getElementById('buttonBudgetDetails').addEventListener('click', function() {
    //     let budgetRows = document.querySelectorAll('#budgetTable tbody tr');

    //     budgetRows.forEach(function(row) {
    //         let qtyAdditional = row.querySelector('input[name="qty_additional"]').value.trim();
    //         let priceAdditional = row.querySelector('input[name="price_additional"]').value.trim();
    //         let totalAdditional = row.querySelector('input[name="total_additional"]').value.trim();
    //         let qtySaving = row.querySelector('input[name="qty_saving"]').value.trim();
    //         let priceSaving = row.querySelector('input[name="price_saving"]').value.trim();
    //         let totalSaving = row.querySelector('input[name="total_saving"]').value.trim();

    //         if (qtyAdditional && priceAdditional && totalAdditional && qtySaving && priceSaving && totalSaving) {
    //             row.querySelectorAll('td').forEach(function(td) {
    //                 let input = td.querySelector('input');
    //                 if (input) {
    //                     td.textContent = input.value;
    //                 }
    //                 td.className = 'container-tbody-tr-budget';
    //             });
                
    //             document.querySelector('#listBudgetTable tbody').appendChild(row);
    //         } else if (!qtyAdditional && priceAdditional && totalAdditional && qtySaving && priceSaving && totalSaving) {
    //             Swal.fire("Error", "Qty Additional Cannot Be Empty", "error");
    //         } else if (qtyAdditional && !priceAdditional && totalAdditional && qtySaving && priceSaving && totalSaving) {
    //             Swal.fire("Error", "Price Additional Cannot Be Empty", "error");
    //         } else if (qtyAdditional && priceAdditional && totalAdditional && !qtySaving && priceSaving && totalSaving) {
    //             Swal.fire("Error", "Qty Saving Cannot Be Empty", "error");
    //         } else if (qtyAdditional && priceAdditional && totalAdditional && qtySaving && !priceSaving && totalSaving) {
    //             Swal.fire("Error", "Price Saving Cannot Be Empty", "error");
    //         }
    //     });
    // });
</script>

<!-- FORM ADD NEW ITEM -->
<script>
    const addNewItemBtn = document.getElementById('addNewItemBtn');
    const newItemForm = document.getElementById('newItemForm');
    const newItemFormTwo = document.getElementById('newItemFormTwo');
    const buttonItemFormTwo = document.getElementById('buttonItemForm');
    const productIdInput = document.getElementById('product_id');
    const budgetTable = document.getElementById('budgetTable');
    const listBudgetTable = document.getElementById('listBudgetTable');
    const addToCartBtn = document.getElementById('addToCartNewFormItem');

    function resetFormInputs() {
        document.getElementById('product_id').value = '';
        document.getElementById('product_name').value = '';
        document.getElementById('qty').value = '';
        document.getElementById('price').value = '';
    }

    function hideFormAddNewItem() {
        newItemForm.style.display = 'none';
        newItemFormTwo.style.display = 'none';
        buttonItemFormTwo.style.display = 'none';
    }

    addNewItemBtn.addEventListener('click', function() {
        if (newItemForm.style.display === 'none' || newItemForm.style.display === '' && newItemFormTwo.style.display === 'none' || newItemFormTwo.style.display === '' && buttonItemFormTwo.style.display === 'none' || buttonItemFormTwo.style.display === '') {
            newItemForm.style.display = 'flex';
            newItemFormTwo.style.display = 'flex';
            buttonItemFormTwo.style.display = 'flex';
        } else {
            hideFormAddNewItem();
            resetFormInputs();
        }
    });

    function getExistingProductIds() {
        const productIds = [];
        const rows = budgetTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const productId = row.cells[0].textContent.trim();

            productIds.push(productId);
        });
        return productIds;
    }

    function validateProductId(productId) {
        const existingIds = getExistingProductIds();
        return !existingIds.includes(productId);
    }

    function addRowToTable(productId, productName, qty, price) {
        const tbody = budgetTable.querySelector('tbody');
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td class="container-tbody-tr-budget">${productId}</td>
            <td class="container-tbody-tr-budget">${productName}</td>
            <td class="container-tbody-tr-budget">${qty}</td>
            <td class="container-tbody-tr-budget">${qty}</td>
            <td class="container-tbody-tr-budget">${price}</td>
            <td class="container-tbody-tr-budget">${productName}</td>
            <td class="container-tbody-tr-budget">${qty}</td>
            <td class="container-tbody-tr-budget">${price}</td>
            <td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">
                <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional">
            </td>
            <td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">
                <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional">
            </td>
            <td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">
                <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" disabled>
            </td>
            <td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">
                <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving">
            </td>
            <td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">
                <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving">
            </td>
            <td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">
                <input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" disabled>
            </td>
        `;

        tbody.appendChild(newRow);
    }

    addToCartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const newProductId = productIdInput.value.trim();
        const newProductName = document.getElementById('product_name').value.trim();
        const newQty = document.getElementById('qty').value.trim();
        const newPrice = document.getElementById('price').value.trim();
        
        if (validateProductId(newProductId)) {
            addRowToTable(newProductId, newProductName, newQty, newPrice);
            resetFormInputs();
            hideFormAddNewItem();
        } else {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Product ID already exists in the existing budget table.", "error");
                }
            });
        }
    });
</script>

<!-- VALIDASI TOTAL ADDITIONAL & TOTAL SAVING PADA TABLE EXISTING BUDGET -->
<script>
    function initializeRowListeners(row) {
        const qtyAdditionalInput = row.querySelector('input[name="qty_additional"]');
        const priceAdditionalInput = row.querySelector('input[name="price_additional"]');
        const totalAdditionalInput = row.querySelector('input[name="total_additional"]');
        const totalBudgetElement = row.querySelector('.container-tbody-tr-budget:nth-child(8)');

        const qtySavingInput = row.querySelector('input[name="qty_saving"]');
        const priceSavingInput = row.querySelector('input[name="price_saving"]');
        const totalSavingInput = row.querySelector('input[name="total_saving"]');
        const balanceBudgetElement = row.querySelector('.container-tbody-tr-budget:nth-child(7)');

        function calculateTotalAdditional() {
            const qtyAdditional = parseFloat(qtyAdditionalInput.value) || 0;
            const priceAdditional = parseFloat(priceAdditionalInput.value) || 0;
            const totalAdditional = qtyAdditional * priceAdditional;

            const totalBudget = parseFloat(totalBudgetElement.textContent.replace(/,/g, '')) || 0;

            totalAdditionalInput.value = totalAdditional.toFixed(2);

            if (totalAdditional && totalAdditional < totalBudget) {
                Swal.fire("Error", "Total Additional must be greater than Total Budget!", "error");
                qtyAdditionalInput.value = '';
                priceAdditionalInput.value = '';
                totalAdditionalInput.value = '';
                toggleSavingInputs(false);
            } else {
                if (qtyAdditional > 0 && priceAdditional > 0) {
                    toggleSavingInputs(true);
                } else {
                    toggleSavingInputs(false);
                }
                qtySavingInput.value = '0.00';
                priceSavingInput.value = '0.00';
                totalSavingInput.value = '0.00';
            }
        }

        function calculateTotalSaving() {
            const qtySaving = parseFloat(qtySavingInput.value) || 0;
            const priceSaving = parseFloat(priceSavingInput.value) || 0;
            const totalSaving = qtySaving * priceSaving;

            const balanceBudget = parseFloat(balanceBudgetElement.textContent.replace(/,/g, '')) || 0;
            const totalBudget = parseFloat(totalBudgetElement.textContent.replace(/,/g, '')) || 0;

            totalSavingInput.value = totalSaving.toFixed(2);

            if (totalSaving && (totalSaving < balanceBudget || totalSaving > totalBudget)) {
                Swal.fire("Error", "Total Saving must be greater than Balance Budget & must be less than Total Budget!", "error");
                qtySavingInput.value = '';
                priceSavingInput.value = '';
                totalSavingInput.value = '';
                toggleAdditionalInputs(false);
            } else {
                if (qtySaving > 0 && priceSaving > 0) {
                    toggleAdditionalInputs(true);
                } else {
                    toggleAdditionalInputs(false);
                }

                qtyAdditionalInput.value = '0.00';
                priceAdditionalInput.value = '0.00';
                totalAdditionalInput.value = '0.00';
            }
        }

        function toggleSavingInputs(disable) {
            if (disable) {
                qtySavingInput.setAttribute('disabled', 'disabled');
                priceSavingInput.setAttribute('disabled', 'disabled');
            } else {
                qtySavingInput.removeAttribute('disabled');
                priceSavingInput.removeAttribute('disabled');
            }
        }

        function toggleAdditionalInputs(disable) {
            if (disable) {
                qtyAdditionalInput.setAttribute('disabled', 'disabled');
                priceAdditionalInput.setAttribute('disabled', 'disabled');
            } else {
                qtyAdditionalInput.removeAttribute('disabled');
                priceAdditionalInput.removeAttribute('disabled');
            }
        }

        qtyAdditionalInput.addEventListener('blur', calculateTotalAdditional);
        priceAdditionalInput.addEventListener('blur', calculateTotalAdditional);

        qtySavingInput.addEventListener('blur', calculateTotalSaving);
        priceSavingInput.addEventListener('blur', calculateTotalSaving);
    }

    function initializeTableListeners() {
        const rows = document.querySelectorAll('#budgetTable tbody tr');

        rows.forEach(row => {
            initializeRowListeners(row);
        });
    }

    initializeTableListeners();

    const tableBody = document.querySelector('#budgetTable tbody');
    const observers = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.type === 'childList') {
                initializeTableListeners(); // Menginisialisasi ulang event listener jika ada perubahan
            }
        });
    });

    observers.observe(tableBody, { childList: true });
</script>

<!-- BUTTON SUBMIT OR CANCEL -->
<script>
    const submitButton = document.getElementById('submitButton');
    const cancelButton = document.getElementById('cancelButton');
    const fileInputssss = document.querySelector('#hidden_inputs');
    const fileListTable = document.querySelector('#file_table tbody');
    const listBudgetTableBody = document.querySelector('#listBudgetTable tbody');
    const budgetTbodyTable = document.querySelector('#budgetTable tbody');
    const additionalCoRadioss = document.getElementsByName('additional_co');
    const currencyField = document.getElementById('currency_field');
    const valueIDRRateField = document.getElementById('value_idr_rate_field');
    const valueCOAdditionalField = document.getElementById('value_co_additional_field');
    const valueCODeductiveField = document.getElementById('value_co_deductive_field');
    const fileTableee = document.getElementById('file_table');

    function checkTableData() {
        if (listBudgetTableBody.rows.length > 0) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    checkTableData();

    const observer = new MutationObserver(checkTableData);
    observer.observe(listBudgetTableBody, { childList: true });

    cancelButton.addEventListener('click', function() {
        while (listBudgetTableBody.firstChild) {
            listBudgetTableBody.removeChild(listBudgetTableBody.firstChild);
        }

        while (budgetTbodyTable.firstChild) {
            budgetTbodyTable.removeChild(budgetTbodyTable.firstChild);
        }

        while (fileListTable.firstChild) {
            fileListTable.removeChild(fileListTable.firstChild);
        }

        while (fileInputssss.firstChild) {
            fileInputssss.removeChild(fileInputssss.firstChild);
        }

        $("#project_id").val("");
        $("#project_code").val("");
        $("#project_name").val("");

        $("#site_id").val("");
        $("#site_code").val("");
        $("#site_name").val("");
        $("#site_code").prop("disabled", true);
        $("#site_code_popup").prop("disabled", true);

        $("#currency_id").val("");
        $("#currency_name").val("");
        $("#currency_symbol").val("");

        $("#reason_modify").val("");
        $("#currency_id").val("");
        $("#currency_name").val("");
        $("#currency_symbol").val("");
        $("#value_co_additional").val("");
        $("#attachment_file").val("");

        currencyField.style.display = 'none';
        valueIDRRateField.style.display = 'none';
        valueCOAdditionalField.style.display = 'none';
        valueCODeductiveField.style.display = 'none';
        
        fileTableee.style.display = 'none';

        additionalCoRadioss.forEach(function(radio) {
            radio.checked = false;
        });

        checkTableData(); 
    });
</script>