<!-- DISABLE SUD BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<!-- <script>
    // const urlParamsssss = new URLSearchParams(window.location.search);
    // const subBudgetCOUrl = urlParamsssss.get('subBudgetCode');
    const subBudgetCOUrl = '{{ $subBudgetCode }}';

    if (!subBudgetCOUrl) {
        $("#site_code").prop("disabled", true);
        $("#site_code_popup").prop("disabled", true);
    }
</script> -->

<!-- BUDGET CODE -->
<!-- <script>
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
</script> -->

<!-- SITE CODE -->
<!-- <script>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + sys_id,
            success: function(data) {
                var no = 1;
                applied = 0;
                status = "";
                statusDisplay = [];
                statusDisplay2 = [];
                statusForm = [];

                if (data.message == "Invalid SQL Syntax") {
                    var html = 
                        '<tr>' +
                            '<td class="container-tbody-tr-budget" colspan="14" style="color: red; font-style: italic;">' + 
                                'No Data Available' +
                            '</td>' +
                        '</tr>';

                        $('table#budgetTable tbody').append(html);
                } else {
                    $.each(data, function(key, val2) {
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
                        statusDisplay[key] = "";
                        statusDisplay2[key] = "none";
                        statusForm[key] = "disabled";
                        balance_qty = "-";
                    } else {
                        statusDisplay[key] = "none";
                        statusDisplay2[key] = "";
                        statusForm[key] = "";
                        balance_qty = numberFormatPHPCustom(val2.quantityRemaining, 2);
                    }
                    
                    var html = 
                        '<tr>' +
                            '<td class="container-tbody-tr-budget" style="display:' + statusDisplay[key] + '";">' + 
                                '<div class="input-group" style="min-width: 150px !important;">' + 
                                    '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" readonly>' +
                                    '<div>' +
                                        '<span style="border-radius:0;" class="input-group-text form-control">' +
                                            '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                        '</span>' +
                                    '</div>' +
                                '</div>' +
                            '</td>' +

                            '<td class="container-tbody-tr-budget" style="text-align: left !important; display:' + statusDisplay2[key] + '";">' + val2.product_RefID + '</td>' +
                            '<td class="container-tbody-tr-budget" style="text-align: left !important;">' + val2.productName + '</td>' +
                            '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.quantity, 2) + '</td>' +
                            '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                            '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) + '</td>' +
                            '<td class="container-tbody-tr-budget">' + val2.priceBaseCurrencyISOCode + '</td>' +
                            '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(50000, 2) + '</td>' +
                            '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.quantity * val2.priceBaseCurrencyValue, 2) + '</td>' +
                            '<td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional">' + '</td>' +
                            '<td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional">' + '</td>' +
                            '<td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" disabled>' + '</td>' +
                            '<td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving">' + '</td>' +
                            '<td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving">' + '</td>' +
                            '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" disabled>' + '</td>' +
                            '<td class="d-none">' + '<input autocomplete="off" id="type" name="type" value="budgetDetails" disabled>' + '</td>' +
                        '</tr>';

                        $('table#budgetTable tbody').append(html);
                    });
                }

                checkTableRows();
            }
        });
    });
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

<script>
    const parsedDatas = @json($parsedData ?? []);

    var no = 1;
        applied = 0;
        status = "";
        statusDisplay = [];
        statusDisplay2 = [];
        statusForm = [];

    if (parsedDatas.budgetData && parsedDatas.budgetData.length > 0) {
        $.each(parsedDatas.budgetData, function(key, val2) {
            var used = val2.quantityAbsorptionRatio * 100;
            var productsIDS = val2.product_id && val2.product_id !== "null" ? val2.product_id : '';

            if (used == "0.00" && val2.quantity == "0.00") {
                var applied = 0;
            } else {
                var applied = Math.round(used);
            }
            if (applied >= 100) {
                var status = "disabled";
            }
            if (val2.product_name == "Unspecified Product") {
                statusDisplay[key] = "";
                statusDisplay2[key] = "none";
                statusForm[key] = "disabled";
                balance_qty = "-";
            } else {
                statusDisplay[key] = "none";
                statusDisplay2[key] = "";
                statusForm[key] = "";
                balance_qty = numberFormatPHPCustom(val2.quantityRemaining, 2);
            }

            var html = 
                '<tr>' +
                    '<td class="container-tbody-tr-budget" style="display:' + statusDisplay[key] + '";">' + 
                        '<div class="input-group" style="min-width: 150px !important;">' + 
                            '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" value="' + productsIDS + '" readonly>' +
                            '<div>' +
                                '<span style="border-radius:0;" class="input-group-text form-control">' +
                                    '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                '</span>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +

                    '<td class="container-tbody-tr-budget" style="text-align: left !important; display:' + statusDisplay2[key] + '";">' + val2.product_id + '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: left !important;">' + val2.product_name + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.qty_budget + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.qty_avail + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.price + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.currency + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.balance_budget + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.total_budget + '</td>' +
                    '<td class="sticky-col sixth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_additional" name="qty_additional" value="' + val2.qty_additional +'">' + '</td>' +
                    '<td class="sticky-col fifth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_additional" name="price_additional" value="' + val2.price_additional +'">' + '</td>' +
                    '<td class="sticky-col forth-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_additional" name="total_additional" value="' + val2.total_additional +'" disabled>' + '</td>' +
                    '<td class="sticky-col third-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="qty_saving" name="qty_saving" value="' + val2.qty_saving +'">' + '</td>' +
                    '<td class="sticky-col second-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="price_saving" name="price_saving" value="' + val2.price_saving +'">' + '</td>' +
                    '<td class="sticky-col first-col-modify-budget container-tbody-tr-fixed-budget">' + '<input style="border-radius:0;" class="form-control number-only" autocomplete="off" id="total_saving" name="total_saving" value="' + val2.total_saving +'" disabled>' + '</td>' +
                    '<td class="d-none">' + '<input autocomplete="off" id="type" name="type" value="budgetDetails" disabled>' + '</td>' +
                '</tr>';

            $('table#budgetTable tbody').append(html);
        });
    } else {
        var html = 
            '<tr>' +
                '<td class="container-tbody-tr-budget" colspan="14" style="color: red; font-style: italic;">' + 
                    'No Data Available' +
                '</td>' +
            '</tr>';

            $('table#budgetTable tbody').append(html);
    }

    checkTableRows();
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

        const additionalCOUrl = '{{ $additionalCO }}';

        additionalCORadios.forEach(radio => {
            if (additionalCOUrl == 'yes') {
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
    // const urlParams = new URLSearchParams(window.location.search);
    // const valueAdditionalCOUrl = urlParams.get('valueAdditionalCO');
    // const valueDeductiveCOUrl = urlParams.get('valueDeductiveCO');
    const valueAdditionalCOUrl = '{{ $valueAdditionalCO }}';
    const valueDeductiveCOUrl = '{{ $valueDeductiveCO }}';

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

<!-- BUTTON ADD TO CART (BUDGET DETAILS) -->
<script>
    let totalBudgetSum = 0;
    let totalAdditionalSum = 0;
    let totalAdditionalSumMirroring = 0;
    let totalSavingSum = 0;
    let totalAdditionalsss = "{{ $totalAdditional }}";
    let totalSavingsss = "{{ $totalSaving }}";

    let listTableBodys = document.querySelector('#listBudgetTable tbody');
    const dataModifyBudgetsss = @json($dataModifyBudget ?? []);

    if (dataModifyBudgetsss.length > 0) {
        listTableBodys.innerHTML = '';

        let forms = document.getElementById('modifyBudgetForm');

        dataModifyBudgetsss.forEach(function(items) {
            let row = document.createElement('tr');

            // Buat dan tambahkan setiap elemen <td> ke dalam <tr>
            row.innerHTML = `
                <td class="container-tbody-tr-budget">${items.productID}</td>
                <td class="container-tbody-tr-budget">${items.productName}</td>
                <td class="container-tbody-tr-budget">${items.qtyBudget}</td>
                <td class="container-tbody-tr-budget">${items.price}</td>
                <td class="container-tbody-tr-budget">${items.totalBudget}</td>
                <td class="container-tbody-tr-budget">${items.qtyAdditionals}</td>
                <td class="container-tbody-tr-budget">${items.priceAdditionals}</td>
                <td class="container-tbody-tr-budget">${items.totalAdditionals}</td>
                <td class="container-tbody-tr-budget">${items.qtySavings}</td>
                <td class="container-tbody-tr-budget">${items.priceSavings}</td>
                <td class="container-tbody-tr-budget">${items.totalSavings}</td>
                <td hidden>${items.type}</td>
            `;

            // Tambahkan <tr> ke dalam <tbody>
            listTableBodys.appendChild(row);

            let hiddenInputIds = [
                'product_id',
                'product_name',
                'qty_budget',
                'price',
                'total_budget',
                'qty_additional',
                'price_additional',
                'total_additional',
                'qty_saving',
                'price_saving',
                'total_saving',
                'type'
            ];

            let inputValues = [
                items.productID,
                items.productName,
                items.qtyBudget,
                items.price,
                items.totalBudget,
                items.qtyAdditionals.replace(/,/g, ''),
                items.priceAdditionals.replace(/,/g, ''),
                items.totalAdditionals.replace(/,/g, ''),
                items.qtySavings.replace(/,/g, ''),
                items.priceSavings.replace(/,/g, ''),
                items.totalSavings.replace(/,/g, ''),
                items.type
            ];

            hiddenInputIds.forEach((inputId, index) => {
                let hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = inputId + '[]';
                hiddenInput.value = inputValues[index];
                forms.appendChild(hiddenInput);
            });
        });

        let footerRows = document.querySelector('#listBudgetTable tfoot tr');
        
        if (!footerRows) {
            let tfoot = document.createElement('tfoot');
            totalAdditionalSum += parseFloat(totalAdditionalsss.replace(/,/g, ''));
            totalSavingSum += parseFloat(totalSavingsss.replace(/,/g, ''));

            tfoot.innerHTML = `
                <tr>
                    <td colspan="7" class="container-thead-tr-budget font-weight-bold" style="text-align: left !important;">GRAND TOTAL</td>
                    <td class="text-center">${numberFormatPHPCustom(totalAdditionalSum, 2)}</td>
                    <td colspan="2" class="container-tbody-tr-budget" style="text-align:right"></td>
                    <td class="text-center">${numberFormatPHPCustom(totalSavingSum, 2)}</td>
                </tr>`;
            document.querySelector('#listBudgetTable').appendChild(tfoot);
        } else {
            footerRows.querySelector('td:nth-child(2)').textContent = 5999;
            footerRows.querySelector('td:nth-child(4)').textContent = 1232;
        }
    }

    document.getElementById('buttonBudgetDetails').addEventListener('click', function() {
        totalBudgetSum = 0;
        totalAdditionalSum = 0;
        totalAdditionalSum += totalAdditionalSumMirroring;
        totalSavingSum = 0;

        let budgetRows = document.querySelectorAll('#budgetTable tbody tr');
        let processedProductIds = new Set();
        let budgetData = [];

        budgetRows.forEach(function(row) {
            let qtyAdditional = row.querySelector('input[name="qty_additional"]').value.trim();
            let priceAdditional = row.querySelector('input[name="price_additional"]').value.trim();
            let totalAdditional = row.querySelector('input[name="total_additional"]').value.trim();
            let qtySaving = row.querySelector('input[name="qty_saving"]').value.trim();
            let priceSaving = row.querySelector('input[name="price_saving"]').value.trim();
            let totalSaving = row.querySelector('input[name="total_saving"]').value.trim();
            let type = row.querySelector('input[name="type"]').value.trim();
            let productIdInput = row.querySelector('input[name="product_id_show"]');
            let productId = productIdInput.value ? productIdInput.value : row.querySelector('td:nth-child(2)').textContent.trim();
            let productName = row.querySelector('td:nth-child(3)').textContent.trim();
            let qtyBudget = row.querySelector('td:nth-child(4)').textContent.trim();
            let qtyAvail = row.querySelector('td:nth-child(5)').textContent.trim();
            let prices = row.querySelector('td:nth-child(6)').textContent.trim();
            let currencys = row.querySelector('td:nth-child(7)').textContent.trim();
            let balanceBudget = row.querySelector('td:nth-child(8)').textContent.trim();
            let totalBudget = row.querySelector('td:nth-child(9)').textContent.trim();

            let data = {
                product_id: productId,
                product_name: productName,
                qty_budget: qtyBudget,
                qty_avail: qtyAvail,
                price: prices,
                currency: currencys,
                balance_budget: balanceBudget,
                total_budget: totalBudget,
                qty_additional: qtyAdditional,
                price_additional: priceAdditional,
                total_additional: totalAdditional,
                qty_saving: qtySaving,
                price_saving: priceSaving,
                total_saving: totalSaving
            };

            budgetData.push(data);

            if (qtyAdditional && priceAdditional && totalAdditional && qtySaving && priceSaving && totalSaving) {
                let listTableBody = document.querySelector('#listBudgetTable tbody');
                let existingRow = Array.from(listTableBody.querySelectorAll('tr')).find(tr => {
                    if (productIdInput.value) {
                        return tr.querySelector('td:nth-child(1)').textContent.trim() === productId;
                    } else {
                        return tr.querySelector('td:nth-child(2)').textContent.trim() === productId;
                    }
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

                        if (index == 12) {
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
                        if (ind === 4 || ind === 6 || ind === 7) {
                            td.remove();
                        } else {
                            let input = td.querySelector('input');
                            
                            if (input) {
                                if (ind <= 2) {
                                    td.textContent = input.value;
                                } else {
                                    td.textContent = numberFormatPHPCustom(input.value, 2);
                                }

                                if (ind == 15) {
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

                if (!processedProductIds.has(productId)) {
                    if (totalBudget) {
                        totalBudgetSum += parseFloat(totalBudget);
                    }
                    if (totalAdditional) {
                        totalAdditionalSum += parseFloat(totalAdditional);
                    }
                    if (totalSaving) {
                        totalSavingSum += parseFloat(totalSaving);
                    }
                    
                    processedProductIds.add(productId);
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

        // Menyimpan data ke elemen hidden di view
        let hiddenInputBudgetData = document.getElementById('hiddenBudgetData');
        hiddenInputBudgetData.value = JSON.stringify({
            budgetData: budgetData,
            totalBudgetSum: totalBudgetSum,
            totalAdditionalSum: totalAdditionalSum,
            totalSavingSum: totalSavingSum
        });

        let footerRow = document.querySelector('#listBudgetTable tfoot tr');
        if (!footerRow) {
            let tfoot = document.createElement('tfoot');
            tfoot.innerHTML = `
                <tr>
                    <td colspan="7" class="container-thead-tr-budget font-weight-bold" style="text-align: left !important;">GRAND TOTAL</td>
                    <td class="text-center">${numberFormatPHPCustom(totalAdditionalSum, 2)}</td>
                    <td colspan="2" class="container-tbody-tr-budget" style="text-align:right"></td>
                    <td class="text-center">${numberFormatPHPCustom(totalSavingSum, 2)}</td>
                </tr>`;
            document.querySelector('#listBudgetTable').appendChild(tfoot);
        } else {
            footerRow.querySelector('td:nth-child(2)').textContent = numberFormatPHPCustom(totalAdditionalSum, 2);
            footerRow.querySelector('td:nth-child(4)').textContent = numberFormatPHPCustom(totalSavingSum, 2);
        }
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
    const productIdInput = document.getElementById('products_id');
    const budgetTable = document.getElementById('budgetTable');
    const listBudgetTable = document.getElementById('listBudgetTable');
    const addToCartBtn = document.getElementById('addToCartNewFormItem');

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

        totalAdditionalSum += parseFloat(qty * price);
        totalAdditionalSumMirroring += parseFloat(qty * price);

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
            <td class="container-tbody-tr-budget" hidden>
                <input id="type" hidden="" name="type[]" value="budgetDetails">
            </td>
        `;

        tbody.appendChild(newRow);

        let footerRow = document.querySelector('#listBudgetTable tfoot tr');
        if (footerRow) {
            footerRow.querySelector('td:nth-child(2)').textContent = numberFormatPHPCustom(totalAdditionalSum, 2);
        }
    }

    addToCartBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const newProductId = productIdInput.value.trim();
        const newProductName = document.getElementById('products_name').value.trim();
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
    $('#tableGetProducts tbody').on('click', 'tr', function() {

        $("#myProducts").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_products' + id).val();
        var sys_pid = row.find("td:nth-child(2)").text();
        var uom = row.find("td:nth-child(3)").text();
        var name = row.find("td:nth-child(4)").text();

        $("#products_id").val(sys_id);
        $("#products_id_show").val(sys_pid);
        $("#products_name").val(uom);
    });
</script>

<!-- VALIDASI TOTAL ADDITIONAL & TOTAL SAVING PADA TABLE EXISTING BUDGET -->
<script>
    function initializeRowListeners(row) {
        const qtyAdditionalInput = row.querySelector('input[name="qty_additional"]');
        const priceAdditionalInput = row.querySelector('input[name="price_additional"]');
        const totalAdditionalInput = row.querySelector('input[name="total_additional"]');
        const totalBudgetElement = row.querySelector('.container-tbody-tr-budget:nth-child(9)');

        const qtySavingInput = row.querySelector('input[name="qty_saving"]');
        const priceSavingInput = row.querySelector('input[name="price_saving"]');
        const totalSavingInput = row.querySelector('input[name="total_saving"]');
        const balanceBudgetElement = row.querySelector('.container-tbody-tr-budget:nth-child(8)');

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
        window.location.href = '/ModifyBudget';
        
        // while (listBudgetTableBody.firstChild) {
        //     listBudgetTableBody.removeChild(listBudgetTableBody.firstChild);
        // }

        // while (budgetTbodyTable.firstChild) {
        //     budgetTbodyTable.removeChild(budgetTbodyTable.firstChild);
        // }

        // while (fileListTable.firstChild) {
        //     fileListTable.removeChild(fileListTable.firstChild);
        // }

        // while (fileInputssss.firstChild) {
        //     fileInputssss.removeChild(fileInputssss.firstChild);
        // }

        // $("#project_id").val("");
        // $("#project_code").val("");
        // $("#project_name").val("");

        // $("#site_id").val("");
        // $("#site_code").val("");
        // $("#site_name").val("");
        // $("#site_code").prop("disabled", true);
        // $("#site_code_popup").prop("disabled", true);

        // $("#currency_id").val("");
        // $("#currency_name").val("");
        // $("#currency_symbol").val("");
        // $("#value_idr_rate").val("");

        // $("#reason_modify").val("");
        // $("#value_co_deductive").val("");
        // $("#value_co_additional").val("");
        // $("#attachment_file").val("");

        // currencyField.style.display = 'none';
        // valueIDRRateField.style.display = 'none';
        // valueCOAdditionalField.style.display = 'none';
        // valueCODeductiveField.style.display = 'none';
        
        // fileTableee.style.display = 'none';

        // additionalCoRadioss.forEach(function(radio) {
        //     radio.checked = false;
        // });

        // checkTableData(); 
    });
</script>

<script>
    document.querySelectorAll('.number-only').forEach(function(input) {
        allowNumbersOnly(input);
    });
</script>