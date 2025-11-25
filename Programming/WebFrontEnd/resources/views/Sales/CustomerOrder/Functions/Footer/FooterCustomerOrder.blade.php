<script>
    let data            = [];
    let dataAddManual   = [];
    let indexSubBudget  = null;

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
    }

    function addRow() {
        const tbody = document.getElementById("table_tbody_add_manually");

        const newRow = {
            ref_number_id: "",
            ref_number_name: "",
            debit_credit: "",
            value: "",
            unpaid: "",
            payment: "",
            balance: "",
            coa_id: "",
            coa_name: "",
            attachment: null,
            attachment_url: ""
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

        if (field == "debit_credit") {
            totalDebitCredit();
        }
        
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
                                onclick="{removeRow(${index});totalDebitCredit();totalPayments();}">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
    
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a data-toggle="modal" data-target="${index === dataAddManual.length - 1 ? '#' : '#myAllTransactions'}" onclick="pickRefNumber(${index})">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="ref_number_id_${index}" value="${row.ref_number_id}">
                            <input type="text" id="ref_number_name_${index}" class="form-control" readonly
                                value="${row.ref_number_name}"
                                onchange="updateField(${index}, 'ref_number_name', this.value)" style="background-color: ${index === dataAddManual.length - 1 ? '' : 'white'};">
                        </div>
                    </td>
    
                    <td>
                        <input type="text" id="value_${index}" class="form-control" value="${row.ref_number_name}" onchange="updateField(${index}, 'ref_number_name', this.value)">
                    </td>
    
                    <td>
                        <input type="number" class="form-control" readonly value="${row.value}" onchange="updateField(${index}, 'value', this.value)">
                    </td>
                `;
            }

            tbody.appendChild(tr);

            $(`#debit_credit_${index}`).on('change', function() {
                totalPayments();
            });

            $(`#payment${index}`).on('keyup', function() {
                let payment     = $(this).val().replace(/,/g, '');
                let typePayment = $(`#debit_credit_${index}`).val();

                totalPayments();
            });
        });
    }

    function findByName(nameToFind) {
        const normalizeString = (str) => {
            return str
                .toLowerCase()                   // Mengubah menjadi lowercase
                .trim()                           // Menghapus spasi ekstra
                .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        };

        return data.find(item => normalizeString(item.name) == normalizeString(nameToFind));
    }

    function convertSubBudgetToVariable() {
        const rows = document.querySelectorAll('#tableSites tbody tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            const sys_id = row.querySelector('input').value; // Ambil sys_id dari input
            const code = cells[1].textContent.trim(); // Ambil kode dari kolom kedua
            const name = cells[2].textContent.trim(); // Ambil nama dari kolom ketiga

            // Tambahkan objek ke dalam array
            data.push({
                sys_id: sys_id,
                code: parseInt(code), // Pastikan code adalah angka
                name: name
            });
        });
    }

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function submitJournalDetails() {
        // const testing = document.getElementById(`sub_budget_name${indexSubBudget}`);
        // console.log('testing', testing.value);
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

        $.ajax({
            url: "{{ route('CustomerOrder.Import') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(res) {
                $('#table_import_from_excel tbody').empty(); // bersihkan table

                res.rows.slice(1).forEach((row, index) => {
                    const result = findByName(row[1]);

                    if (result) {
                        $('#table_import_from_excel tbody').append(`
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                                <a data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})">
                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                                </a>
                                            </span>
                                        </div>
                                        <input id="sub_budget_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${result.sys_id}" />
                                        <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${result.code} - ${result.name}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control number-without-negative" id="price_req${index}" autocomplete="off" style="border-radius:0px;" value="${row[2]}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <textarea id="note${index}" class="form-control">${row[3]}</textarea>
                                    </div>
                                </td>
                            </tr>
                        `);
                    } else {
                        $('#table_import_from_excel tbody').append(`
                            <tr>
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
                                        <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;border-color:red;" class="form-control" readonly value="${row[1]}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <input class="form-control number-without-negative" id="price_req${index}" autocomplete="off" style="border-radius:0px;" value="${row[2]}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="input-group">
                                        <textarea id="note${index}" class="form-control">${row[3]}</textarea>
                                    </div>
                                </td>
                            </tr>
                        `);
                    }
                });
            }
        });
    });

    $('#tableProjects').on('click', 'tbody tr', async function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#project_id").val(sysId);
        $("#project_name").val(`${code} - ${name}`);
        $("#project_name").css('background-color', '#e9ecef');

        $('#myProjects').modal('hide');

        getSites(sysId);
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        if (indexSubBudget === null) return;

        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $(`#sub_budget_id${indexSubBudget}`).val(sysId);
        $(`#sub_budget_name${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
        $(`#sub_budget_name${indexSubBudget}`).css('border', '1px solid #ced4da');

        $('#mySites').modal('hide');
    });

    $('#tableCurrencies').on('click', 'tbody tr', async function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#currency_id").val(sysId);
        $("#currency_name").val(`${code} - ${name}`);
        $("#currency_name").css('background-color', '#e9ecef');

        $('#myCurrencies').modal('hide');
    });

    $(window).one('load', function() {
        detailAddManual();
    });

</script>