<script>
    let dataAddManual = [];

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

                res.rows.slice(1).forEach(row => {
                    $('#table_import_from_excel tbody').append(`
                        <tr>
                            <td>${row[1]}</td>
                            <td>${row[2]}</td>
                            <td>${row[3]}</td>
                        </tr>
                    `);
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