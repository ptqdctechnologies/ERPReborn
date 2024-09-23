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
        $("#site_name").val("");

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

<!-- FUNCTION DISABLED KLIK KETIKA BUDGET & SITE CODE TIDAK KOSONG -->
<script>
    function checkAndDisable() {
        var projectId = $('#project_id').val();
        var projectCode = $('#project_code').val();
        var projectName = $('#project_name').val();
        var siteId = $('#site_id').val();
        var siteCode = $('#site_code').val();
        var siteName = $('#site_name').val();

        if (projectId && projectCode && projectName && siteId && siteCode && siteName) {
            $('#project_code_popup').addClass('disabled').css('pointer-events', 'none');
            $('#site_code_popup').addClass('disabled').css('pointer-events', 'none');
        } else {
            $('#project_code_popup').removeClass('disabled').css('pointer-events', 'auto');
            $('#site_code_popup').removeClass('disabled').css('pointer-events', 'auto');
        }
    }

    checkAndDisable();

    $('#myProject').on('click', function() {
        checkAndDisable();
    });

    $('#mySiteCode').on('click', function() {
        checkAndDisable();
    });

    $('#project_code, #site_code').on('input change', function() {
        checkAndDisable();
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

        // PARAMS
        const urlParams = new URLSearchParams(window.location.search);
        const additionalCOUrl = urlParams.get('additionalCO');

        additionalCORadios.forEach(radio => {
            if (additionalCOUrl) {
                if (additionalCOUrl == "yes") {
                    currencyField.style.display = 'flex';
                    valueIDRRateField.style.display = 'flex';
                    valueCOAdditionalField.style.display = 'flex';
                    valueCODeductiveField.style.display = 'flex';

                    radio.addEventListener('change', function() {
                        if (radio.value === 'yes' && radio.checked) {
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

                    radio.addEventListener('change', function() {
                        if (radio.value === 'yes' && radio.checked) {
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
                }
            } else {
                radio.addEventListener('change', function() {
                    if (radio.value === 'yes' && radio.checked) {
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
            }
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
        var symbol = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        if (sys_id == "62000000000002" && name == "United States Dollar") {
            $("#currency_id").val(sys_id);
            $("#currency_name").val(name);
            $("#currency_symbol").val(symbol);
            $("#value_idr_rate").val(16000);
        } else if (sys_id == "62000000000001" && name == "Indonesian Rupiah") {
            $("#currency_id").val(sys_id);
            $("#currency_name").val(name);
            $("#currency_symbol").val(symbol);
            $("#value_idr_rate").val("");
        } else {
            $("#currency_id").val("");
            $("#currency_name").val("");
            $("#currency_symbol").val("");
            $("#value_idr_rate").val("");
            Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");
        }
    });
</script>

<!-- VALUE CO ADDITIONAL & DEDUCTIVE -->
<script>
    // PARAMS
    const urlParams = new URLSearchParams(window.location.search);
    const valueAdditionalCOUrl = urlParams.get('valueAdditionalCO');
    const valueDeductiveCOUrl = urlParams.get('valueDeductiveCO');

    $(document).ready(function() {
        if (valueAdditionalCOUrl || valueDeductiveCOUrl) {
            if (valueAdditionalCOUrl) {
                $('#value_co_deductive').prop('disabled', true);
            } else {
                $('#value_co_additional').prop('disabled', true);
            }
        } else {
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
        }
    });
</script>

<!-- FILE ATTACHMENT -->
<!-- <script>
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

            const fileData = {
                name: file.name,
                size: file.size,
                uploadDate: currentDateTime,
                previewUrl: URL.createObjectURL(file)
            };

            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'uploaded_files[]';
            hiddenInput.value = JSON.stringify(fileData);
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
</script> -->

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
            let type = row.querySelector('input[name="type"]').value.trim();
            let productId = row.querySelector('td:nth-child(1)').textContent.trim();
            let productName = row.querySelector('td:nth-child(2)').textContent.trim();
            let qtyBudget = row.querySelector('td:nth-child(3)').textContent.trim();
            // let qtyAvail = row.querySelector('td:nth-child(4)').textContent.trim();
            let prices = row.querySelector('td:nth-child(5)').textContent.trim();
            // let currencys = row.querySelector('td:nth-child(6)').textContent.trim();
            // let balanceBudget = row.querySelector('td:nth-child(7)').textContent.trim();
            let totalBudget = row.querySelector('td:nth-child(8)').textContent.trim();

            if (qtyAdditional && priceAdditional && totalAdditional && qtySaving && priceSaving && totalSaving) {
                let listTableBody = document.querySelector('#listBudgetTable tbody');
                let existingRow = Array.from(listTableBody.querySelectorAll('tr')).find(tr => {
                    return tr.querySelector('td:first-child').textContent.trim() === productId;
                });

                let form = document.getElementById('modifyBudgetForm');

                if (existingRow) {
                    existingRow.querySelectorAll('td').forEach(function(td, index) {
                        let input = row.querySelectorAll('td')[index].querySelector('input');

                        if (input) {
                            if (index <= 1) {
                                td.textContent = input.value;
                            } else if (index === 8) {
                                td.textContent = numberFormatPHPCustom(qtySaving, 2);
                            } else if (index === 9) {
                                td.textContent = numberFormatPHPCustom(priceSaving, 2);
                            } else if (index === 10) {
                                td.textContent = numberFormatPHPCustom(totalSaving, 2);
                            } else if (index !== 5 || index !== 6 || index !== 7) {
                                td.textContent = numberFormatPHPCustom(input.value, 2);
                            }
                        } else {
                            if (index === 5) {
                                td.textContent = numberFormatPHPCustom(qtyAdditional, 2);
                            } 
                            if (index === 6) {
                                td.textContent = numberFormatPHPCustom(priceAdditional, 2);
                            } 
                            if (index === 7) {
                                td.textContent = numberFormatPHPCustom(totalAdditional, 2);
                            }
                        }

                        if (index == 11) {
                            td.className = 'd-none';
                        } else {
                            td.className = 'container-tbody-tr-budget';
                        }
                    });

                    let hiddenInputIds = ['product_id', 'product_name', 'qty_budget', 'price', 'total_budget', 'qty_additional', 'price_additional', 'total_additional', 'qty_saving', 'price_saving', 'total_saving', 'type'];
                    
                    let inputValues = [
                        productId,
                        productName,
                        qtyBudget,
                        prices,
                        totalBudget,
                        parseInt(qtyAdditional),
                        parseInt(priceAdditional),
                        parseInt(totalAdditional),
                        parseInt(qtySaving),
                        parseInt(priceSaving),
                        parseInt(totalSaving),
                        type
                    ];

                    hiddenInputIds.forEach((inputId, index) => {
                        let existingInput = form.querySelector(`input[name="${inputId}[]"]`);

                        if (existingInput) {
                            existingInput.value = inputValues[index];

                            form.appendChild(existingInput);
                        }
                    });
                } else {
                    let clonedRow = row.cloneNode(true);
                    clonedRow.querySelectorAll('td').forEach(function(td, ind) {
                        if (ind === 3 || ind === 5 || ind === 6) {
                            td.remove();
                        } else {
                            let input = td.querySelector('input');
                            
                            if (input) {
                                if (ind <= 1) {
                                    td.textContent = input.value;
                                } else {
                                    td.textContent = numberFormatPHPCustom(input.value, 2);
                                }

                                if (ind == 14) {
                                    td.className = 'd-none';
                                } else {
                                    td.className = 'container-tbody-tr-budget';
                                }
                            }
                        }
                    });

                    let hiddenInputIds = ['product_id', 'product_name', 'qty_budget', 'price', 'total_budget', 'qty_additional', 'price_additional', 'total_additional', 'qty_saving', 'price_saving', 'total_saving', 'type'];

                    let inputValues = [
                        productId,
                        productName,
                        qtyBudget,
                        prices,
                        totalBudget,
                        parseInt(qtyAdditional),
                        parseInt(priceAdditional),
                        parseInt(totalAdditional),
                        parseInt(qtySaving),
                        parseInt(priceSaving),
                        parseInt(totalSaving),
                        type
                    ];

                    hiddenInputIds.forEach((inputId, index) => {
                        let hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = inputId + '[]';
                        hiddenInput.value = inputValues[index];
                        form.appendChild(hiddenInput);
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
</script>

<!-- DUMMY DATA BUDGET DETAILS TABLE -->
<script>
    var dummyData = [
        {
            siteCode: 235,
            currencyCode: "USD",
            productID: 88000000003832,
            productName: "1.0 Jasa Pemasangan Conductors, including All Joint and Jumper Connections",
            qtyBudget: 5,
            qtyAvail: 10,
            price: 15000,
            currency: 14000,
            balanceBudget: 80000,
            totalBuget: 700000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 235,
            currencyCode: "IDR",
            productID: 88000000010554,
            productName: "110V DC battery, 625Ah, 86 cells, 8 hours Autonomy",
            qtyBudget: 1,
            qtyAvail: 2,
            price: 4000,
            currency: 30000,
            balanceBudget: 15000,
            totalBuget: 500000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 248,
            currencyCode: "USD",
            productID: 88000000010553,
            productName: "110V DC battery, 625Ah, 86 cells, 8 hours Autonomy",
            qtyBudget: 8,
            qtyAvail: 12,
            price: 18000,
            currency: 14500,
            balanceBudget: 110000,
            totalBuget: 850000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 248,
            currencyCode: "IDR",
            productID: 88000000009339,
            productName: "110 VDC BATTERY SUITABLE FOR SUPPLYING VDC LOAD INCLUDING 20 KV CUBICLE  FOR 8 HOURS DISCHARGE INCLUDING VOLTAGE DROPPER. (MINIMUM CAPACITY IS 250 AH 110 VDC) BATTERY CHARGER MIN 100 A FOR 110 VDC BATTERY COMPLETE WITH PANEL",
            qtyBudget: 2,
            qtyAvail: 4,
            price: 750000,
            currency: 15200,
            balanceBudget: 50000,
            totalBuget: 6000000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 235,
            currencyCode: "USD",
            productID: 88000000009435,
            productName: "110 VDC BATTERY SUITABLE FOR SUPPLYING VDC LOAD INCLUDING 20 KV CUBICLE  FOR 8 HOURS DISCHARGE INCLUDING VOLTAGE DROPPER. (MINIMUM CAPACITY IS 250 AH 110 VDC) BATTERY CHARGER MIN 100 A FOR 110 VDC BATTERY COMPLETE WITH PANEL",
            qtyBudget: 1,
            qtyAvail: 2,
            price: 3500,
            currency: 13950,
            balanceBudget: 20000,
            totalBuget: 450000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 235,
            currencyCode: "IDR",
            productID: 88000000004671,
            productName: "11 6A",
            qtyBudget: 7,
            qtyAvail: 9,
            price: 90000,
            currency: 16000,
            balanceBudget: 950000,
            totalBuget: 5000000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 248,
            currencyCode: "USD",
            productID: 88000000003324,
            productName: "1.1. Six twin line conductors ACCC/TW Dublin 520",
            qtyBudget: 6,
            qtyAvail: 11,
            price: 13000,
            currency: 14250,
            balanceBudget: 170000,
            totalBuget: 750000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
        {
            siteCode: 248,
            currencyCode: "IDR",
            productID: 88000000003601,
            productName: "1.2b. One earth conductor, OPGW  70 mm2",
            qtyBudget: 4,
            qtyAvail: 6,
            price: 120000,
            currency: 15500,
            balanceBudget: 125000,
            totalBuget: 2500000,
            qtyAdditional: null,
            priceAdditional: null,
            totalAdditional: null,
            qtySaving: null,
            priceSaving: null,
            totalSaving: null,
        },
    ];

    function filterData() {
        var siteCodesss = $('#site_code').val();
        var currencySymbols = $('#currency_symbol').val();

        if (siteCodesss !== '' && currencySymbols !== '') {
            var filteredData = dummyData.filter(function(item) {
                return item.siteCode == siteCodesss && item.currencyCode == currencySymbols;
            });

            updateTableBody(filteredData);
        } else {
            var tbody = $('#budgetTable tbody');
            tbody.empty();

            checkTableRows();
        }
    }

    function updateTableBody(data) {
        var tbody = $('#budgetTable tbody');
        tbody.empty();

        // PARAMS
        const urlParamssss = new URLSearchParams(window.location.search);
        const dataModifyBudgetUrl = urlParamssss.get('dataModifyBudget[0][no]');
        const dataModifyBudgetUrlArray = [];

        const tempData = {};

        urlParams.forEach((value, key) => {
            const match = key.match(/dataModifyBudget\[(\d+)\]\[(.+)\]/);
            
            if (match) {
                const index = parseInt(match[1], 10); 
                const field = match[2];

                if (!tempData[index]) {
                    tempData[index] = {};
                }

                tempData[index][field] = value;
            }
        });

        Object.values(tempData).forEach(item => {
            if (item.type === 'budgetDetails') {
                dataModifyBudgetUrlArray.push(item);
            }
        });

        if (dataModifyBudgetUrl) {
            data.forEach(function(item, ind) {
                var row = '';
                if (dataModifyBudgetUrlArray[ind] && item.productID == dataModifyBudgetUrlArray[ind]["productID"]) {
                    row = '<tr>' +
                        '<td class="container-tbody-tr-budget">' + item.productID + '</td>' +
                        '<td class="container-tbody-tr-budget" style="text-align: left !important;">' + item.productName + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.qtyBudget, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.qtyAvail, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.price, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.currency, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.balanceBudget, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.totalBuget, 2) + '</td>' +
                        '<td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional" value=' + cleanNumber(dataModifyBudgetUrlArray[ind].qtyAdditionals) + '>' + '</td>' +
                        '<td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional" value=' + cleanNumber(dataModifyBudgetUrlArray[ind].priceAdditionals) + '>' + '</td>' +
                        '<td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" value=' + cleanNumber(dataModifyBudgetUrlArray[ind].totalAdditionals) + ' disabled>' + '</td>' +
                        '<td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving" value=' + cleanNumber(dataModifyBudgetUrlArray[ind].qtySavings) + '>' + '</td>' +
                        '<td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving" value=' + cleanNumber(dataModifyBudgetUrlArray[ind].priceSavings) + '>' + '</td>' +
                        '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" value=' + cleanNumber(dataModifyBudgetUrlArray[ind].totalSavings) + ' disabled>' + '</td>' +
                        '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget d-none">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="type" name="type" value=' + dataModifyBudgetUrlArray[ind].type + ' disabled>' + '</td>' +
                    '</tr>';
                } else {
                    row = '<tr>' +
                        '<td class="container-tbody-tr-budget">' + item.productID + '</td>' +
                        '<td class="container-tbody-tr-budget" style="text-align: left !important;">' + item.productName + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.qtyBudget, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.qtyAvail, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.price, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.currency, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.balanceBudget, 2) + '</td>' +
                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.totalBuget, 2) + '</td>' +
                        '<td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional">' + '</td>' +
                        '<td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional">' + '</td>' +
                        '<td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" disabled>' + '</td>' +
                        '<td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving">' + '</td>' +
                        '<td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving">' + '</td>' +
                        '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" disabled>' + '</td>' +
                        '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget d-none">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="type" name="type" hidden disabled>' + '</td>' +
                    '</tr>';
                }
                
                tbody.append(row); 
            });
        } else {
            data.forEach(function(item) {
                var row = '<tr>' +
                    '<td class="container-tbody-tr-budget">' + item.productID + '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: left !important;">' + item.productName + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.qtyBudget, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.qtyAvail, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.price, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.currency, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.balanceBudget, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(item.totalBuget, 2) + '</td>' +
                    '<td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional">' + '</td>' +
                    '<td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional">' + '</td>' +
                    '<td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" disabled>' + '</td>' +
                    '<td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving">' + '</td>' +
                    '<td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving">' + '</td>' +
                    '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" disabled>' + '</td>' +
                    '<td class="d-none">' + '<input autocomplete="off" id="type" name="type" value="budgetDetails" disabled>' + '</td>' +
                    '</tr>';

                tbody.append(row); 
            });
        }

        document.querySelectorAll('.number-only').forEach(function(input) {
            allowNumbersOnly(input);
        });

        checkTableRows();
    }

    $('#site_code, #currency_symbol').on('change', function() {
        filterData();
    });

    $('#mySiteCode, #myCurrency').on('hidden.bs.modal', function() {
        filterData();
    });

    filterData();
</script>

<!-- FORM ADD NEW ITEM -->
<script>
    const addNewItemBtn = document.getElementById('addNewItemBtn');
    const newItemForm = document.getElementById('newItemForm');
    const newItemFormTwo = document.getElementById('newItemFormTwo');
    const newItemFormThree = document.getElementById('newItemFormThree');
    const newItemFormFour = document.getElementById('newItemFormFour');
    const buttonItemFormTwo = document.getElementById('buttonItemForm');
    const productIdInput = document.getElementById('product_id');
    const budgetTable = document.getElementById('budgetTable');
    const listBudgetTable = document.getElementById('listBudgetTable');
    const addToCartBtn = document.getElementById('addToCartNewFormItem');

    function resetFormInputs() {
        document.getElementById('product_id').value = '';
        document.getElementById('product_id_show').value = '';
        document.getElementById('product_name').value = '';
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

    const qtyInput = document.getElementById('qty');
    const priceInput = document.getElementById('price');
    const totalInput = document.getElementById('total_qty_price');

    function calculateTotal() {
        const qty = parseFloat(qtyInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        const total = qty * price;
        totalInput.value = total;
    }

    qtyInput.addEventListener('input', calculateTotal);
    priceInput.addEventListener('input', calculateTotal);

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

        const qtyBudgetFormatted = numberFormatPHPCustom(0, 2);
        const priceBudgetFormatted = numberFormatPHPCustom(0, 2);
        const totalBudgetFormatted = numberFormatPHPCustom(0, 2);

        const qtyFormatted = numberFormatPHPCustom(qty, 2);
        const priceFormatted = numberFormatPHPCustom(price, 2);
        const totalFormatted = numberFormatPHPCustom(qty * price, 2);

        const qtySavingFormatted = numberFormatPHPCustom(0, 2);
        const priceSavingFormatted = numberFormatPHPCustom(0, 2);
        const totalSavingFormatted = numberFormatPHPCustom(0, 2);

        newRow.innerHTML = `
            <td class="container-tbody-tr-budget" >
                ${productId}
                <input id="product_id" hidden="" name="product_id[]" value="${productId}">
            </td>
            <td class="container-tbody-tr-budget text-wrap" style="text-align: left !important; line-height: 15px;">
                ${productName}
                <input id="product_name" hidden="" name="product_name[]" value="${productName}">
            </td>
            <td class="container-tbody-tr-budget">
                ${qtyBudgetFormatted}
                <input id="qty_budget" hidden="" name="qty_budget[]" value="0">
            </td>
            <td class="container-tbody-tr-budget">
                ${priceBudgetFormatted}
                <input id="price" hidden="" name="price[]" value="0">
            </td>
            <td class="container-tbody-tr-budget">
                ${totalBudgetFormatted}
                <input id="total_budget" hidden="" name="total_budget[]" value="0">
            </td>
            <td class="container-tbody-tr-budget">
                ${qtyFormatted}
                <input id="qty_additional" hidden="" name="qty_additional[]" value="${qty}">
            </td>
            <td class="container-tbody-tr-budget">
                ${priceFormatted}
                <input id="price_additional" hidden="" name="price_additional[]" value="${price}">
            </td>
            <td class="container-tbody-tr-budget">
                ${totalFormatted}
                <input id="total_additional" hidden="" name="total_additional[]" value="${qty * price}">
            </td>
            <td class="container-tbody-tr-budget">
                ${qtySavingFormatted}
                <input id="qty_saving" hidden="" name="qty_saving[]" value="0">
            </td>
            <td class="container-tbody-tr-budget">
                ${priceSavingFormatted}
                <input id="price_saving" hidden="" name="price_saving[]" value="0">
            </td>
            <td class="container-tbody-tr-budget">
                ${totalSavingFormatted}
                <input id="total_saving" hidden="" name="total_saving[]" value="0">
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

        if (newProductId && newProductName && newQty && newPrice) {
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
        } else {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Product ID, Qty, Price, & Total cannot be empty.", "error");
                }
            });
        }
    });
</script>

<!-- PRODUCT -->
<script>
    $('#tableGetProduct tbody').on('click', 'tr', function() {

        $("#myProduct").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_products' + id).val();
        var sys_pid = row.find("td:nth-child(2)").text();
        var uom = row.find("td:nth-child(3)").text();
        var name = row.find("td:nth-child(4)").text();

        $("#product_id").val(sys_id);
        $("#product_id_show").val(sys_pid);
        $("#product_name").val(name);
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
                initializeTableListeners();
            }
        });
    });

    observers.observe(tableBody, { childList: true });
</script>

<!-- BUTTON SUBMIT OR CANCEL -->
<script>
    const siteCode = document.getElementById('site_code');
    const reasonForModify = document.getElementById('reason_modify');
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
        const isTableNotEmpty = listBudgetTableBody.rows.length > 0;
        const isSiteCodeNotEmpty = siteCode.value.trim() !== '';
        const isReasonNotEmpty = reasonForModify.value.trim() !== '';

        if (isTableNotEmpty && isSiteCodeNotEmpty && isReasonNotEmpty) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    checkTableData();

    const observer = new MutationObserver(checkTableData);
    observer.observe(listBudgetTableBody, { childList: true });

    siteCode.addEventListener('input', checkTableData);
    reasonForModify.addEventListener('input', checkTableData);

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
        $("#value_idr_rate").val("");

        $("#reason_modify").val("");
        $("#value_co_deductive").val("");
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