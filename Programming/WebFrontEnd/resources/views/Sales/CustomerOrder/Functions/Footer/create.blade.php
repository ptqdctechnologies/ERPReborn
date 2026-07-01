<script>
    let data = [];
    let dataAddManual = [];
    let dataSubBudget = [];
    let dataProducts = [];
    let dataWorks = [];
    let dataUom = [];
    let indexSubBudget = null;
    let indexProduct = null;
    let indexUom = null;
    let indexWork = null;
    let documentTypeID = document.getElementById("DocumentTypeID");
    let isImportFromExcel = false;
    let customerOrderDetailType = null;
    let dataWorkflow = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    const budgetID = document.getElementById("project_id");
    const currencyID = document.getElementById("currency_id");
    const typeOption = document.getElementById("typeOption");
    const fileID = document.getElementById("dataInput_Log_FileUpload");
    const coFile = document.getElementById("excel_name");

    function getVAT() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function (data) {
                if (data && Array.isArray(data)) {
                    $('#ppn_percentage_option').empty();
                    $('#ppn_percentage_option').append('<option disabled selected value="Select a VAT">Select a VAT</option>');

                    $('#ppn_percentage_import_option').empty();
                    $('#ppn_percentage_import_option').append('<option disabled selected value="Select a VAT">Select a VAT</option>');

                    data.forEach(function (project) {
                        $('#ppn_percentage_option').append('<option value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                        $('#ppn_percentage_import_option').append('<option value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getVAT error: ', textStatus, errorThrown);
            }
        });
    }

    function detailAddManual() {
        dataAddManual = [];
        addRow();
    }

    function selectType(params) {
        if (params.value == "SUB_BUDGET_BASE") {
            $(".productField").hide();
            $(".subBudgetField").show();
            $('#ppn_percentage_option').val('Select a VAT');
        } else {
            $(".productField").show();
            $(".subBudgetField").hide();
            $('#ppn_percentage_import_option').val('Select a VAT');
        }
    }

    function selectPercentageVAT(params) {
        if (customerOrderDetailType == "type_import_from_excel") {
            const tableTotal = document.getElementById("import_total");
            const resultVAT = (Utils.parseFloatSafe(params.value) / 100) * Utils.parseFloatSafe(Utils.removeCommas(tableTotal.textContent));
            const resultGrandTotal = resultVAT + Utils.parseFloatSafe(Utils.removeCommas(tableTotal.textContent));

            $("#table_import_total_vat").text(Utils.formatCurrency(Utils.parseFloatSafe(resultVAT)));
            $("#table_import_grand_total").text(Utils.formatCurrency(Utils.parseFloatSafe(resultGrandTotal)));
        } else {
            const tableTotal = document.getElementById("table_total");
            const resultVAT = (Utils.parseFloatSafe(params.value) / 100) * Utils.parseFloatSafe(Utils.removeCommas(tableTotal.textContent));
            const resultGrandTotal = resultVAT + Utils.parseFloatSafe(Utils.removeCommas(tableTotal.textContent));

            $("#table_total_vat").text(Utils.formatCurrency(Utils.parseFloatSafe(resultVAT)));
            $("#table_grand_total").text(Utils.formatCurrency(Utils.parseFloatSafe(resultGrandTotal)));
        }
    }

    function selectVAT(params) {
        if (customerOrderDetailType == "type_import_from_excel") {
            if (params.value == "NO") {
                $('#ppn_percentage_import_container').css('display', 'none');
            } else {
                $('#ppn_percentage_import_container').css('display', 'flex');
            }
        } else {
            if (params.value == "NO") {
                $('#ppn_percentage_container').css('display', 'none');
            } else {
                $('#ppn_percentage_container').css('display', 'flex');
            }
        }
    }

    function typeValue(val) {
        if (val.value === "type_import_from_excel") {
            dataAddManual = [];
            isImportFromExcel = true;

            $("#tab_import_from_excel").show();
            $("#tab_add_manually").hide();
            // detailAddManual();
        } else {
            isImportFromExcel = false;

            $("#tab_import_from_excel").hide();
            $("#tab_add_manually").show();
            $('#table_import_from_excel tbody').empty();
            $('#excel_name').val("");
            $('#excel_file').val("");

            detailAddManual();
        }

        customerOrderDetailType = val.value;
        $("#typeOption").prop("disabled", true);
        $('#import_total').text("0.00");
        $('#table_import_total_vat').text("0.00");
        $('#table_import_grand_total').text("0.00");
        $('#ppn_import_option').val('NO');
        $('#ppn_percentage_import_option').val('Select a VAT');
        $('#ppn_percentage_import_container').hide();
        $('#table_total').text("0.00");
        $('#table_total_vat').text("0.00");
        $('#table_grand_total').text("0.00");
        $('#ppn_percentage_option').val('Select a VAT');
        $('#ppn_percentage_container').hide();
        $('#ppn_option').val('NO');
        $('#type_message').hide();
    }

    function calculateTotal() {
        let total = 0;

        if (typeOption.value === "SUB_BUDGET_BASE") {
            document.querySelectorAll('input[id^="value"]').forEach(function (input) {
                let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

                if (!isNaN(value)) {
                    total += value;
                }
            });
        } else {
            document.querySelectorAll('input[id^="total"]').forEach(function (input) {
                let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

                if (!isNaN(value)) {
                    total += value;
                }
            });
        }

        document.getElementById('import_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        document.getElementById('table_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        if (customerOrderDetailType == "type_import_from_excel") {
            const tableTotalVAT = document.getElementById("ppn_percentage_import_option");
            const resultVAT = (Utils.parseFloatSafe(tableTotalVAT.value) / 100) * Utils.parseFloatSafe(total);
            const resultGrandTotal = resultVAT + total;

            $("#table_import_total_vat").text(Utils.formatCurrency(Utils.parseFloatSafe(resultVAT)));
            $("#table_import_grand_total").text(Utils.formatCurrency(Utils.parseFloatSafe(resultGrandTotal)));
        } else {
            const tableTotalVAT = document.getElementById("ppn_percentage_option");
            const resultVAT = (Utils.parseFloatSafe(tableTotalVAT.value) / 100) * Utils.parseFloatSafe(total);
            const resultGrandTotal = resultVAT + total;

            $("#table_total_vat").text(Utils.formatCurrency(Utils.parseFloatSafe(resultVAT)));
            $("#table_grand_total").text(Utils.formatCurrency(Utils.parseFloatSafe(resultGrandTotal)));
        }
    }

    function calculateTotalLine(index) {
        const qtyLine = document.getElementById(`qty${index}`);
        const priceLine = document.getElementById(`price${index}`);
        const result = Utils.parseFloatSafe(Utils.removeCommas(qtyLine.value)) * Utils.parseFloatSafe(Utils.removeCommas(priceLine.value));

        calculateTotal();
        $(`#total${index}`).val(Utils.formatCurrency(result));
        updateField(index, 'total', Utils.parseFloatSafe(Utils.removeCommas(Utils.formatCurrency(result))));
    }

    function checkOneLineImportContents(indexInput) {
        const rows = document.querySelectorAll("#table_import_from_excel tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty = document.getElementById(`sub_budget_name${index}`)?.value.trim();
            const wht = document.getElementById(`value${index}`)?.value.trim();

            if (qty !== "" && wht !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const qtyEl = document.getElementById(`sub_budget_name${index}`);
            const whtEl = document.getElementById(`value${index}`);

            if (hasFullRow) {
                $(qtyEl).css("border", "1px solid #ced4da");
                $(whtEl).css("border", "1px solid #ced4da");
                $("#import_message").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || whtEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(whtEl).css("border", "1px solid red");
                            $("#import_message").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(whtEl).css("border", "1px solid #ced4da");
                            $("#import_message").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && whtEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(whtEl).css("border", "1px solid #ced4da");
                    }
                } else {
                    $(qtyEl).css("border", "1px solid red");
                    $(whtEl).css("border", "1px solid red");
                    $("#import_message").show();
                }
            }
        });

        return hasFullRow;
    }

    function checkOneLineManuallyContents(indexInput) {
        const rows = document.querySelectorAll("#table_add_manually tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty = document.getElementById(`sub_budget_name${index}`)?.value.trim();
            const wht = document.getElementById(`value${index}`)?.value.trim();
            // const coa   = document.getElementById(`coa_name${index}`)?.value.trim();

            if (qty !== "" && wht !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const qtyEl = document.getElementById(`sub_budget_name${index}`);
            const whtEl = document.getElementById(`value${index}`);
            // const coaEl = document.getElementById(`coa_name${index}`);

            if (hasFullRow) {
                $(qtyEl).css("border", "1px solid #ced4da");
                $(whtEl).css("border", "1px solid #ced4da");
                // $(coaEl).css("border", "1px solid #ced4da");
                $("#manually_message").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || whtEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(whtEl).css("border", "1px solid red");
                            // $(coaEl).css("border", "1px solid red");
                            $("#manually_message").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(whtEl).css("border", "1px solid #ced4da");
                            // $(coaEl).css("border", "1px solid #ced4da");
                            $("#manually_message").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && whtEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(whtEl).css("border", "1px solid #ced4da");
                        // $(coaEl).css("border", "1px solid #ced4da");
                    }
                } else {
                    $(qtyEl).css("border", "1px solid red");
                    $(whtEl).css("border", "1px solid red");
                    // $(coaEl).css("border", "1px solid red");
                    $("#manually_message").show();
                }
            }
        });

        return hasFullRow;
    }

    function addRow() {
        if (typeOption.value == "SUB_BUDGET_BASE") {
            dataAddManual.push({
                entities: {
                    combinedBudgetSection_RefID: "",
                    sub_budget_name: "",
                    value: "",
                    notes: "",
                    isDefault: true
                }
            });
        } else {
            dataAddManual.push({
                entities: {
                    combinedBudgetSection_RefID: "",
                    sub_budget_name: "",
                    product_RefID: "",
                    product_name: "",
                    work_RefID: "",
                    work_name: "",
                    uom_RefID: "",
                    uom_name: "",
                    qty: "",
                    price: "",
                    total: "",
                    notes: "",
                    isDefault: true
                }
            });
        }

        renderTable();
    }

    function removeRow(index) {
        dataAddManual.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        dataAddManual[index].entities[field] = value;

        calculateTotal();
        console.log("Updated:", dataAddManual); // untuk debugging
    }

    function renderTable() {
        const tbody = isImportFromExcel ? document.getElementById("table_tbody_import_from_excel") : document.getElementById("table_tbody_add_manually");
        tbody.innerHTML = "";

        dataAddManual.forEach((row, index) => {
            const tr = document.createElement("tr");
            if (typeOption.value === "SUB_BUDGET_BASE") {
                if (index === dataAddManual.length - 1) {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === dataAddManual.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRow()">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
                } else {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === dataAddManual.length - 1 ? 'none !important' : 'flex'};"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="combinedBudgetSection_RefID${index}" value="${row.entities.combinedBudgetSection_RefID}">
                            <input type="text" id="sub_budget_name${index}" class="form-control" readonly value="${row.entities.sub_budget_name}" onchange="updateField(${index}, 'sub_budget_name', this.value)" style="background-color: ${row.entities.sub_budget_name ? '#e9ecef' : 'white'}; border: ${row.entities.combinedBudgetSection_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <input type="text" id="value${index}" class="form-control form-control number-without-negative" value="${row.entities.value ? Utils.formatCurrency(row.entities.value) : row.entities.value}" onkeyup="calculateTotal()" onkeydown="calculateTotal()" onchange="updateField(${index}, 'value', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td style="padding-right: 0.3rem;">
                        <textarea id="notes${index}" class="form-control" onchange="updateField(${index}, 'notes', this.value)">${row.entities.notes}</textarea>
                    </td>
                `;
                }
            } else {
                if (index === dataAddManual.length - 1) {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === dataAddManual.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRow()">
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
                `;
                } else {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === dataAddManual.length - 1 ? 'none !important' : 'flex'};"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="combinedBudgetSection_RefID${index}" value="${row.entities.combinedBudgetSection_RefID}">
                            <input type="text" id="sub_budget_name${index}" class="form-control" readonly value="${row.entities.sub_budget_name}" onchange="updateField(${index}, 'sub_budget_name', this.value)" style="background-color: ${row.entities.sub_budget_name ? '#e9ecef' : 'white'}; border: ${row.entities.combinedBudgetSection_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#myWorks" onclick="pickWork(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="work_RefID${index}" value="${row.entities.work_RefID}">
                            <input type="text" id="work_name${index}" class="form-control" readonly value="${row.entities.work_name}" onchange="updateField(${index}, 'work_name', this.value)" style="background-color: ${row.entities.work_name ? '#e9ecef' : 'white'}; border: ${row.entities.work_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#myProductss" onclick="pickProduct(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="product_RefID${index}" value="${row.entities.product_RefID}">
                            <input type="text" id="product_name${index}" class="form-control" readonly value="${row.entities.product_name}" onchange="updateField(${index}, 'product_name', this.value)" style="background-color: ${row.entities.product_name ? '#e9ecef' : 'white'}; border: ${row.entities.product_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#myUom" onclick="pickUom(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="uom_RefID${index}" value="${row.entities.uom_RefID}">
                            <input type="text" id="uom_name${index}" class="form-control" readonly value="${row.entities.uom_name}" onchange="updateField(${index}, 'uom_name', this.value)" style="background-color: ${row.entities.uom_name ? '#e9ecef' : 'white'}; border: ${row.entities.uom_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <input type="text" id="qty${index}" class="form-control form-control number-without-negative" value="${row.entities.qty ? Utils.formatCurrency(row.entities.qty) : row.entities.qty}" onkeyup="calculateTotalLine(${index})" onkeydown="calculateTotalLine(${index})" onchange="updateField(${index}, 'qty', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td>
                        <input type="text" id="price${index}" class="form-control form-control number-without-negative" value="${row.entities.price ? Utils.formatCurrency(row.entities.price) : row.entities.price}" onkeyup="calculateTotalLine(${index})" onkeydown="calculateTotalLine(${index})" onchange="updateField(${index}, 'price', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td>
                        <input type="text" id="total${index}" class="form-control form-control number-without-negative" value="${row.entities.total ? Utils.formatCurrency(row.entities.total) : row.entities.total}" onchange="updateField(${index}, 'total', parseFloat(this.value.replace(/,/g, '')))" disabled>
                    </td>
                    <td style="padding-right: 0.3rem;">
                        <textarea id="notes${index}" class="form-control" onchange="updateField(${index}, 'notes', this.value)">${row.entities.notes}</textarea>
                    </td>
                `;
                }
            }

            tbody.appendChild(tr);
        });

        calculateTotal();
    }

    function findByCode(codeToFind) {
        const normalizeString = (str) => {
            return str
                .toLowerCase()                   // Mengubah menjadi lowercase
                .trim()                           // Menghapus spasi ekstra
                .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        };

        return data.find(item => item.code == codeToFind);
        // return data.find(item => normalizeString(item.code) == normalizeString(codeToFind));
    }

    function findSubBudgetByCode(codeToFind) {
        return dataSubBudget.find(item => item.Code == codeToFind);
    }

    function findWorkByCode(codeToFind) {
        return dataWorks.find(item => item.code == codeToFind);
    }

    function findProductByCode(codeToFind) {
        return dataProducts.find(item => item.code == codeToFind);
    }

    function findUomByName(nameToFind) {
        return dataUom.find(item => item.name == nameToFind);
    }

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function pickProduct(index) {
        indexProduct = index;
    }

    function pickUom(index) {
        indexUom = index;
    }

    function pickWork(index) {
        indexWork = index;
    }

    function submitForm() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: {
                // workFlowPath_RefID: dataWorkflow.workFlowPathRefID,
                // approverEntity: dataWorkflow.approverEntityRefID,
                comment: dataWorkflow.comment,
                storeData: {
                    combinedBudgetRefID: budgetID.value,
                    currencyRefID: currencyID.value,
                    logFileUploadPointerRefID: fileID.value,
                    customerOrderDetail: JSON.stringify(dataAddManual.filter(val => val.entities.combinedBudgetSection_RefID))
                }
            },
            url: '{!! route("CustomerOrder.store") !!}',
            success: function (res) {
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
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('CustomerOrder.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Create Customer Order Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                HideLoading();
                ErrorNotif("Internal Server Error");
            }
        });
    }

    function commentWorkflow() {
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
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                dataWorkflow.comment = result.value;
                ShowLoading();
                submitForm();
            }
        });
    }

    function validationForm() {
        let isValid = true;
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isCurrencyIDNotEmpty = currencyID.value.trim() !== '';
        const isCustomerOrderTypeNotEmpty = document.querySelector('input[name="type_customer_order"]:checked');
        const isCOFileNotEmpty = coFile.value.trim() !== '';
        // const isTableImportNotEmpty = checkOneLineImportContents();
        const isTableManuallyNotEmpty = checkOneLineManuallyContents();
        const findEmptyData = dataAddManual.find(
            ({ entities }) =>
                !entities.isDefault && (
                    !entities.combinedBudgetSection_RefID ||
                    !entities.value
                )
        );

        if (
            isBudgetIDNotEmpty &&
            isCurrencyIDNotEmpty &&
            isCustomerOrderTypeNotEmpty
        ) {
            if (isCustomerOrderTypeNotEmpty.value === "type_import_from_excel") {
                if (!isCOFileNotEmpty) {
                    $("#excel_name").css("border", "1px solid red");
                    $("#co_file_message").show();
                    isValid = false;
                }
                // if (!isTableImportNotEmpty) {
                //     $("#import_message").show();
                //     isValid = false;
                // }
                if (findEmptyData) {
                    isValid = false;

                    ErrorHandler.notifToast(
                        'error',
                        'Please review the highlighted fields (red border) and ensure all required values are filled in correctly before proceeding.',
                        'Validation Error'
                    );
                }
            } else {
                if (!isTableManuallyNotEmpty) {
                    $("#manually_message").show();
                    isValid = false;
                }
            }
            if (isValid) {
                commentWorkflow();
            }
        } else {
            if (
                !isBudgetIDNotEmpty &&
                !isCurrencyIDNotEmpty &&
                !isCustomerOrderTypeNotEmpty
            ) {
                $("#project_name").css("border", "1px solid red");
                $("#currency_name").css("border", "1px solid red");

                $("#project_message").show();
                $("#currency_message").show();
                $("#type_message").show();
                return;
            }
            if (!isBudgetIDNotEmpty) {
                $("#project_name").css("border", "1px solid red");
                $("#project_message").show();
                return;
            }
            if (!isCurrencyIDNotEmpty) {
                $("#currency_name").css("border", "1px solid red");
                $("#currency_message").show();
                return;
            }
            if (!isCustomerOrderTypeNotEmpty) {
                $("#type_message").show();
                return;
            }
        }
    }

    function getCustomSites(Project_RefID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + Project_RefID,
        })
            .done(function (response) {
                let data = response[0] ? response : [];
                dataSubBudget = data;

                $('#tableSites').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_site' + (meta.row + 1) + '" value="' + data.Sys_ID + '" data-trigger="sys_id_site" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'Code',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'Name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingSites").hide();
            });
    }

    function getCustomProducts() {
        $(".loadingGetModalProductss").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getProduct") !!}',
        })
            .done(function (response) {
                let data = response.data.data ? response.data.data : [];
                dataProducts = data;

                $('#tableGetProductss').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<td class="align-middle text-center">' +
                                    '<input id="sys_id_product' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_product" type="hidden">' +
                                    (meta.row + 1) +
                                    '</td>';
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle"
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'quantityUnitName',
                            defaultContent: '-',
                            className: "align-middle"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $(".loadingGetModalProductss").hide();
            });
    }

    function getCustomWorks() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getWorks") !!}',
        })
            .done(function (response) {
                const data = response && response[0] ? response : [];
                dataWorks = data;

                $('#tableWorks').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_work' + (meta.row + 1) + '" value="' + data.id + '" data-trigger="sys_id_work" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle"
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingGetModalWorks").hide();
            });
    }

    function getCustomUom() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("getQuantityUnit") !!}',
        })
            .done(function (response) {
                const data = response.data && response.data[0] ? response.data : [];
                dataUom = data;

                $('#tableGetUom').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_uom' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_uom" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingGetModalUom").hide();
            });
    }

    function getWorkflow(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
        $.ajax({
            type: 'POST',
            data: {
                businessDocumentType_RefID: '77000000000057',
                combinedBudget_RefID: combinedBudgetRefID
            },
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            success: function (response) {
                if (response.status === 200 && !response.data[0].signAccess) {
                    getCustomSites(combinedBudgetRefID);

                    $("#project_id").val(combinedBudgetRefID);
                    $("#project_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#project_name").css('background-color', '#e9ecef');

                    $("#type_import_from_excel").prop("disabled", false);
                    $("#type_add_manually").prop("disabled", false);
                    $("#myProjectsTrigger").prop("disabled", true);
                    $("#myProjectsTrigger").css("cursor", "not-allowed");
                } else {
                    Swal.fire("Error", "You are not included in this budget", "error");
                }

                $("#project_loading").css({ "display": "none" });
                $("#myProjectsTrigger").css({ "display": "block" });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");
            }
        });
    }

    $('#downloadTemplate').click(function () {
        let type = typeOption.value;

        window.location.href =
            "{{ route('CustomerOrder.Download') }}?customer_order_type=" + encodeURIComponent(type);
    });

    $('#excel_file').on('change', function () {
        let fileName = this.files[0].name;
        $('#excel_name').val(fileName);
        $('#excel_name').css('background-color', '#e9ecef');
    });

    $('#uploadCOFile input[type=file]').on('change', function () {
        let formData = new FormData();
        formData.append("excel_file", this.files[0]);
        formData.append("_token", "{{ csrf_token() }}");

        $("#excel_name").css("border", "1px solid #ced4da");
        $('#co_file_message').hide();

        $.ajax({
            url: "{{ route('CustomerOrder.Import') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#table_import_from_excel tbody').empty();

                res.rows.slice(1).forEach((row, index) => {
                    if (typeOption.value == "SUB_BUDGET_BASE") {
                        const validateSubBudget = findSubBudgetByCode(row[1]);

                        dataAddManual.push({
                            entities: {
                                isDefault: false,
                                combinedBudgetSection_RefID: validateSubBudget ? validateSubBudget.Sys_ID : '',
                                sub_budget_name: validateSubBudget ? `${validateSubBudget.Code} - ${validateSubBudget.Name}` : `${row[1]} - ${row[2]}`,
                                value: row[3] > 0 ? Utils.parseFloatSafe(row[3]) : Utils.parseFloatSafe(0),
                                notes: row[4] ? row[4] : ''
                            }
                        });
                    } else {
                        const validateSubBudget = findSubBudgetByCode(row[1]);
                        const validateWork = findWorkByCode(row[3]);
                        const validateProduct = findProductByCode(row[5]);
                        const validateUom = findUomByName(row[7]);

                        dataAddManual.push({
                            entities: {
                                isDefault: false,
                                combinedBudgetSection_RefID: validateSubBudget ? validateSubBudget.Sys_ID : '',
                                sub_budget_name: validateSubBudget ? `${validateSubBudget.Code} - ${validateSubBudget.Name}` : `${row[1]} - ${row[2]}`,
                                product_RefID: validateProduct ? validateProduct.sys_ID : '',
                                product_name: validateProduct ? `${validateProduct.code} - ${validateProduct.name}` : `${row[5]} - ${row[6]}`,
                                work_RefID: validateWork ? validateWork.id : '',
                                work_name: validateWork ? validateWork.name : `${row[3]} - ${row[4]}`,
                                uom_RefID: validateUom ? validateUom.sys_ID : '',
                                uom_name: validateUom ? validateUom.name : row[7],
                                qty: row[8] > 0 ? Utils.parseFloatSafe(row[8]) : Utils.parseFloatSafe(0),
                                price: row[9] > 0 ? Utils.parseFloatSafe(row[9]) : Utils.parseFloatSafe(0),
                                total: row[10] > 0 ? Utils.parseFloatSafe(row[10]) : Utils.parseFloatSafe(0),
                                notes: row[11] ? row[11] : ''
                            }
                        });
                    }
                });

                addRow();
            }
        });
    });

    $('#tableProjects').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        getWorkflow(sysId, code, name);

        $("#project_id").val("");
        $("#project_name").val("");
        $("#project_name").css("border", "1px solid #ced4da");
        $("#project_message").hide();

        $("#project_loading").css({ "display": "block" });
        $("#myProjectsTrigger").css({ "display": "none" });

        $('#myProjects').modal('toggle');
    });

    $('#tableCurrencies').on('click', 'tbody tr', function () {
        let sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        let code = $(this).find('td:nth-child(2)').text();
        let name = $(this).find('td:nth-child(3)').text();

        $("#currency_id").val(sysId);
        $("#currency_name").val(`${code} - ${name}`);
        $("#currency_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
        $("#currency_message").hide();

        $("#myCurrenciesTrigger").prop("disabled", true);
        $("#myCurrenciesTrigger").css("cursor", "not-allowed");

        $('#myCurrencies').modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        if (indexSubBudget === null) return;

        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        const findData = dataAddManual.find(val => val.entities.combinedBudgetSection_RefID == sysId);

        if (findData) {
            ErrorHandler.notifToast(
                'error',
                'The Sub Budget already exists. Please select a different Sub Budget.',
                'Error!'
            );
        } else {
            $(`#sub_budget_id${indexSubBudget}`).val(sysId);
            $(`#sub_budget_name${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
            $(`#sub_budget_name${indexSubBudget}`).css({ 'border': '1px solid #ced4da', 'background-color': '#e9ecef' });
            $(`#sub_budget_name${indexSubBudget}`).attr('data-invalid', 'false');

            updateField(indexSubBudget, 'combinedBudgetSection_RefID', sysId);
            updateField(indexSubBudget, 'sub_budget_name', `${siteCode} - ${siteName}`);

            $('#mySites').modal('toggle');
        }
    });

    $('#tableCustomerOrder').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_customer_order"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $(`#customer_order_id`).val(sysId);
        $(`#customer_order_number`).val(trano);
        $(`#customer_order_number`).css({ 'border': '1px solid #ced4da', 'background-color': '#e9ecef' });

        $('#myCustomerOrder').modal('toggle');
    });

    $('#tableGetProductss tbody').on('click', 'tr', function () {
        if (indexProduct === null) return;

        const table = $('#tableGetProductss').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            $("#myProductss").modal('toggle');

            const productRefID = dataRow.sys_ID;
            const productCode = dataRow.code;
            const productName = dataRow.name;

            $(`#product_RefID${indexProduct}`).val(productRefID);
            $(`#product_name${indexProduct}`).val(`${productCode ?? ''} - ${productName ?? ''}`);
            $(`#product_name${indexProduct}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexProduct, 'product_RefID', productRefID);
            updateField(indexProduct, 'product_name', `${productCode ?? ''} - ${productName ?? ''}`);
        }
    });

    $('#tableGetUom').on('click', 'tbody tr', async function () {
        if (indexUom === null) return;

        const sysId = $(this).find('input[data-trigger="sys_id_uom"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#uom_RefID${indexUom}`).val(sysId);
        $(`#uom_name${indexUom}`).val(name);
        $(`#uom_name${indexUom}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        updateField(indexUom, 'uom_RefID', sysId);
        updateField(indexUom, 'uom_name', name);

        $('#myUom').modal('toggle');
    });

    $('#tableWorks tbody').on('click', 'tr', function () {
        if (indexWork === null) return;

        const table = $('#tableWorks').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            $("#myWorks").modal('toggle');

            const workRefID = dataRow.id;
            const workCode = dataRow.code;
            const workName = dataRow.name;

            $(`#work_RefID${indexWork}`).val(workRefID);
            $(`#work_name${indexWork}`).val(`${workCode ?? ''} - ${workName ?? ''}`);
            $(`#work_name${indexWork}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexWork, 'work_RefID', workRefID);
            updateField(indexWork, 'work_name', `${workCode ?? ''} - ${workName ?? ''}`);
        }
    });

    $('#revision_customer_order').on('click', function (e) {
        getCustomerOrder();
    });

    $(document).ready(function () {
        getVAT();
        getCustomUom();
        getCustomWorks();
        getCustomProducts();
    });
</script>