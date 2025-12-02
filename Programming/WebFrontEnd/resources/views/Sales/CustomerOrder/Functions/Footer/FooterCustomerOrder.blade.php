<script>
    let data            = [];
    let dataAddManual   = [];
    let indexSubBudget  = null;
    let documentTypeID  = document.getElementById("DocumentTypeID");
    const budgetID      = document.getElementById("project_id");
    const currencyID    = document.getElementById("currency_id");
    const coFile        = document.getElementById("excel_name");

    function detailAddManual() {
        dataAddManual = [];
        addRow();
    }

    function typeValue(val) {
        if (val.value === "type_import_from_excel") {
            $("#tab_import_from_excel").show();
            $("#tab_add_manually").hide();
            detailAddManual();
        } else {
            $("#tab_import_from_excel").hide();
            $("#tab_add_manually").show();
            $('#table_import_from_excel tbody').empty();
            $('#excel_name').val("");
            $('#excel_file').val("");
        }
        $('#import_total').text("0.00");
        $('#manually_total').text("0.00");
        $('#type_message').hide();
    }

    function calculateTotal() {
        let total = 0;

        document.querySelectorAll('input[id^="value"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('import_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        document.getElementById('manually_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function checkOneLineImportContents(indexInput) {
        const rows = document.querySelectorAll("#table_import_from_excel tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty   = document.getElementById(`sub_budget_name${index}`)?.value.trim();
            const wht   = document.getElementById(`value${index}`)?.value.trim();

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
            const qty   = document.getElementById(`sub_budget_name${index}`)?.value.trim();
            const wht   = document.getElementById(`value${index}`)?.value.trim();
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
        const tbody = document.getElementById("table_tbody_add_manually");

        const newRow = {
            sub_budget_id: "",
            sub_budget_name: "",
            value: "",
            note: "",
        };

        dataAddManual.push(newRow);

        renderTable();
    }

    function removeRow(index) {
        dataAddManual.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        dataAddManual[index][field] = value;

        console.log("Updated:", dataAddManual); // untuk debugging
    }

    function renderTable() {
        const tbody = document.getElementById("table_tbody_add_manually");
        tbody.innerHTML = "";

        dataAddManual.forEach((row, index) => {
            const tr = document.createElement("tr");
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
                            <input type="hidden" id="sub_budget_id${index}" value="${row.sub_budget_id}">
                            <input type="text" id="sub_budget_name${index}" class="form-control" readonly value="${row.sub_budget_name}" onchange="updateField(${index}, 'sub_budget_name', this.value)" style="background-color: white;">
                        </div>
                    </td>
                    <td>
                        <input type="text" id="value${index}" class="form-control form-control number-without-negative" value="${row.value}" onkeyup="calculateTotal()" onchange="updateField(${index}, 'value', this.value)">
                    </td>
                    <td>
                        <textarea id="note${index}" class="form-control" onchange="updateField(${index}, 'note', this.value)">${row.note}</textarea>
                    </td>
                `;
            }

            tbody.appendChild(tr);
        });
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

    function convertSubBudgetToVariable(Project_RefID) {
        $('#tableSites tbody').empty();
        $(".loadingSites").show();
        $(".errorSitesMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + Project_RefID,
            success: function(response) {
                $(".loadingSites").hide();

                var no = 1;
                var table = $('#tableSites').DataTable();
                table.clear();

                if (Array.isArray(response) && response.length > 0) {
                    $.each(response, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_site" type="hidden">' + no++,
                            val.Code || '-',
                            val.Name || '-',
                        ]).draw();

                        data.push({
                            sys_id: val.Sys_ID,
                            code: val.Code,
                            name: val.Name
                        });
                    });

                    $("#tableSites_length").show();
                    $("#tableSites_filter").show();
                    $("#tableSites_info").show();
                    $("#tableSites_paginate").show();
                } else {
                    $(".errorSitesMessageContainer").show();
                    $("#errorSitesMessage").text(`No Data Available in Table.`);

                    $("#tableSites_length").hide();
                    $("#tableSites_filter").hide();
                    $("#tableSites_info").hide();
                    $("#tableSites_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableSites tbody').empty();
                $(".loadingSites").hide();
                $(".errorSitesMessageContainer").show();
                $("#errorSitesMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function validationForm() {
        let isValid                         = true;
        const isBudgetIDNotEmpty            = budgetID.value.trim() !== '';
        const isCurrencyIDNotEmpty          = currencyID.value.trim() !== '';
        const isCustomerOrderTypeNotEmpty   = document.querySelector('input[name="type_customer_order"]:checked');
        const isCOFileNotEmpty              = coFile.value.trim() !== '';
        const isTableImportNotEmpty         = checkOneLineImportContents();
        const isTableManuallyNotEmpty       = checkOneLineManuallyContents();
        
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
                if (!isTableImportNotEmpty) {
                    $("#import_message").show();
                    isValid = false;
                }
            } else {
                if (!isTableManuallyNotEmpty) {
                    $("#manually_message").show();
                    isValid = false;
                }
            }
            if (isValid) {
                // HERE
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

    $('#excel_file').on('change', function() {
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
            success: function(res) {
                $('#table_import_from_excel tbody').empty();

                res.rows.slice(1).forEach((row, index) => {
                    const result = findByCode(row[1]);

                    let subBudgetContent = `
                        <td>
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                        <a data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})">
                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                        </a>
                                    </span>
                                </div>
                                <input id="sub_budget_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                <input id="sub_budget_code${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${row[1] ?? ''}" />
                                <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;border-color:red;" class="form-control" data-invalid="true" readonly value="${row[1] ?? ''} - ${row[2] ?? ''}" />
                            </div>
                        </td>
                    `;

                    if (result) {
                        subBudgetContent = `
                            <td>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a href="javascript:;" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="sub_budget_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${result.sys_id}" />
                                    <input id="sub_budget_code${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${result.code}" />
                                    <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" data-invalid="true" readonly value="${result.code} - ${result.name}" />
                                </div>
                            </td>
                        `;
                    }

                    $('#table_import_from_excel tbody').append(`
                        <tr>
                            ${subBudgetContent}
                            <td>
                                <div class="input-group">
                                    <input class="form-control number-without-negative" id="value${index}" autocomplete="off" style="border-radius:0px;" onchange="checkOneLineImportContents(${index})" onkeyup="calculateTotal()" value="${row[3] ? currencyTotal(row[3]) : ''}" />
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <textarea id="note${index}" class="form-control">${row[4] ?? ''}</textarea>
                                </div>
                            </td>
                        </tr>
                    `);
                });

                calculateTotal();
            }
        });
    });

    $('#tableProjects').on('click', 'tbody tr', async function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#project_id").val("");
        $("#project_name").val("");
        
        $("#project_name").css("border", "1px solid #ced4da");
        $("#project_message").hide();
        $("#project_loading").css({"display":"block"});
        $("#myProjectsTrigger").css({"display":"none"});

        $('#myProjects').modal('hide');

        try {
            var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID.value);

            if (checkWorkFlow) {
                $("#var_combinedBudget_RefID").val(sysId);
                $("#project_id").val(sysId);
                $("#project_name").val(`${code} - ${name}`);
                $("#project_name").css('background-color', '#e9ecef');
                
                convertSubBudgetToVariable(sysId);
                $("#type_import_from_excel").prop("disabled", false);
                $("#type_add_manually").prop("disabled", false);
                $("#myProjectsTrigger").prop("disabled", true);
                $("#myProjectsTrigger").css("cursor", "not-allowed");
            }
            
            $("#project_loading").css({"display":"none"});
            $("#myProjectsTrigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });

    $('#tableCurrencies').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#currency_id").val(sysId);
        $("#currency_name").val(`${code} - ${name}`);
        $("#currency_name").css({"background-color": "#e9ecef", "border": "1px solid #ced4da"});
        $("#currency_message").hide();

        $("#myCurrenciesTrigger").prop("disabled", true);
        $("#myCurrenciesTrigger").css("cursor", "not-allowed");

        $('#myCurrencies').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        if (indexSubBudget === null) return;

        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $(`#sub_budget_id${indexSubBudget}`).val(sysId);
        $(`#sub_budget_name${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
        $(`#sub_budget_name${indexSubBudget}`).css('border', '1px solid #ced4da');
        $(`#sub_budget_name${indexSubBudget}`).attr('data-invalid', 'false');

        updateField(indexSubBudget, 'sub_budget_id', sysId);
        updateField(indexSubBudget, 'sub_budget_name', `${siteCode} - ${siteName}`);

        $('#mySites').modal('hide');
    });

    $(window).one('load', function() {
        detailAddManual();
    });
</script>