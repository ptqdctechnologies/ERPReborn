<!-- DISABLE SUD BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<script>
    $("#site_code").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);

    $("#currency_code").prop("disabled", true);
    $("#currency_code_popup").prop("disabled", true);
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
        const valueCOAdditionalField = document.getElementById('value_co_additional_field');
        const valueCOAdditionalInput = document.getElementById('value_co_additional');
        
        additionalCORadios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === 'yes' && this.checked) {
                    currencyField.style.display = 'flex';
                    valueCOAdditionalField.style.display = 'flex';
                } else {
                    currencyField.style.display = 'none';
                    // currencyInput.value = '';

                    valueCOAdditionalField.style.display = 'none';
                    valueCOAdditionalInput.value = '';
                }
            });
        });
    }

    toggleCurrencyField();
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

<!-- FORM ADD NEW ITEM -->
<script>
    const addNewItemBtn = document.getElementById('addNewItemBtn');
    const newItemForm = document.getElementById('newItemForm');
    const newItemFormTwo = document.getElementById('newItemFormTwo');
    const buttonItemFormTwo = document.getElementById('buttonItemForm');
    const productIdInput = document.getElementById('product_id');
    const budgetTable = document.getElementById('budgetTable');
    const listBudgetTable = document.getElementById('listBudgetTable');
    const formAddNewItem = document.getElementById('formAddNewItem');

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
            formAddNewItem.reset();
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
        const tbody = listBudgetTable.querySelector('tbody');
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${productId}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${productName}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${qty}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${price}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${productId}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${productName}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${qty}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${price}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${productId}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${productName}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${qty}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${price}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${qty}</td>
            <td style="padding-top: 10px;padding-bottom: 10px;text-align: center;border:1px solid #e9ecef;">${price}</td>
        `;
        
        tbody.appendChild(newRow);
    }

    formAddNewItem.addEventListener('submit', function(e) {
        e.preventDefault();
        const newProductId = productIdInput.value.trim();
        const newProductName = document.getElementById('product_name').value.trim();
        const newQty = document.getElementById('qty').value.trim();
        const newPrice = document.getElementById('price').value.trim();
        
        if (validateProductId(newProductId)) {
            addRowToTable(newProductId, newProductName, newQty, newPrice);
            formAddNewItem.reset();
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
    function calculateTotals(row) {
        const qtyAdditional = row.querySelector('input[name="qty_additional"]').value;
        const priceAdditional = row.querySelector('input[name="price_additional"]').value;
        const qtySaving = row.querySelector('input[name="qty_saving"]').value;
        const priceSaving = row.querySelector('input[name="price_saving"]').value;

        const totalAdditional = row.querySelector('input[name="total_additional"]');
        const totalSaving = row.querySelector('input[name="total_saving"]');
        const totalBudget = parseFloat(row.querySelector('.container-tbody-tr-budget:nth-child(8)').innerText.replace(/,/g, ''));

        let calculatedTotalAdditional = 0;
        let calculatedTotalSaving = 0;

        if (qtyAdditional && priceAdditional) {
            calculatedTotalAdditional = (parseFloat(qtyAdditional) * parseFloat(priceAdditional));
        } else if (qtyAdditional) {
            calculatedTotalAdditional = parseFloat(qtyAdditional);
        } else if (priceAdditional) {
            calculatedTotalAdditional = parseFloat(priceAdditional);
        } else {
            calculatedTotalAdditional = 0;
        }

        if (qtySaving && priceSaving) {
            calculatedTotalSaving = (parseFloat(qtySaving) * parseFloat(priceSaving));
        } else if (qtySaving) {
            calculatedTotalSaving = parseFloat(qtySaving);
        } else if (priceSaving) {
            calculatedTotalSaving = parseFloat(priceSaving);
        } else {
            calculatedTotalSaving = 0;
        }

        // Validasi setelah input selesai (menggunakan event blur)
        totalAdditional.value = calculatedTotalAdditional.toFixed(2);
        totalSaving.value = calculatedTotalSaving.toFixed(2);

        if (qtyAdditional && priceAdditional && calculatedTotalAdditional < totalBudget) {
            ErrorNotif("Total Additional is over budget !");
            totalAdditional.value = '';
            row.querySelector('input[name="qty_additional"]').value = '';
            row.querySelector('input[name="price_additional"]').value = '';
        }

        if (qtySaving && priceSaving && calculatedTotalSaving > totalBudget) {
            ErrorNotif("Total Saving is under budget !");
            totalSaving.value = '';
            row.querySelector('input[name="qty_saving"]').value = '';
            row.querySelector('input[name="price_saving"]').value = '';
        }
    }

    budgetTable.querySelectorAll('input').forEach(input => {
        input.addEventListener('keyup', function() {
            const row = this.closest('tr');
            calculateTotals(row);
        });
    });
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
    const valueCOAdditionalField = document.getElementById('value_co_additional_field');
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

        $("#reason_modify").val("");
        $("#currency_id").val("");
        $("#currency_code").val("");
        $("#currency_name").val("");
        $("#value_co_additional").val("");
        $("#attachment_file").val("");

        currencyField.style.display = 'none';
        valueCOAdditionalField.style.display = 'none';
        
        fileTableee.style.display = 'none';

        additionalCoRadioss.forEach(function(radio) {
            radio.checked = false;
        });

        checkTableData(); 
    });
</script>