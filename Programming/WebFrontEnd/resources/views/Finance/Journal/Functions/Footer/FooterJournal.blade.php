<script>
    let journalDetails              = [];
    let totalCredit                 = 0;
    let totalDebit                  = 0;
    let currentIndexPickCOA         = null;
    let currentIndexPickRefNumber   = null;

    function pickRefNumber(index) {
        currentIndexPickRefNumber = index;
    }

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function detailCashBank() {
        journalDetails = [];
        addRow();
    }

    function addRow() {
        const tbody = document.getElementById("journal_details_table_body");

        const newRow = {
            ref_number_id: "",
            ref_number_name: "",
            debit_credit: "",
            value: "",
            unpaid: "",
            payment: "",
            balance: "",
            coa_id: "",
            coa_name: ""
        };

        journalDetails.push(newRow);

        renderTable();
    }

    function removeRow(index) {
        journalDetails.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        journalDetails[index][field] = value;

        if (field == "debit_credit") {
            totalDebitCredit();
        }
        
        // console.log("Updated:", journalDetails); // untuk debugging
    }

    function totalDebitCredit() {
        totalCredit = 0;
        totalDebit  = 0;
        
        for (let index = 0; index < journalDetails.length; index++) {
            if (journalDetails[index].debit_credit === "CREDIT") {
                totalCredit += 1;
            } 
            if (journalDetails[index].debit_credit === "DEBIT") {
                totalDebit += 1;
            }
        }

        document.getElementById('total_cash_out').textContent   = totalDebit;
        document.getElementById('total_cash_in').textContent    = totalCredit;
    }

    function totalPayments() {
        let totalCashOut    = 0;
        let totalCashIn     = 0;
        let totalPayment    = 0;

        document.querySelectorAll('input[id^="payment"]').forEach(function(input, index) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                if (journalDetails[index].debit_credit === "CREDIT") {
                    totalCashIn += value;
                } 
                if (journalDetails[index].debit_credit === "DEBIT") {
                    totalCashOut += value;
                }

                totalPayment += value;
            }
        });

        document.getElementById('nominal_cash_out').textContent             = `IDR ${currencyTotal(totalCashOut)}`;
        document.getElementById('nominal_cash_in').textContent              = `IDR ${currencyTotal(totalCashIn)}`;
        document.getElementById('journal_details_table_total').textContent  = currencyTotal(totalPayment);
    }

    function renderTable() {
        const tbody = document.getElementById("journal_details_table_body");
        tbody.innerHTML = "";

        journalDetails.forEach((row, index) => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                <td style="text-align: center; padding-left: 4px !important;">
                    <div class="d-flex justify-content-center">
                        <!-- ICON MINUS -->
                        <div class="icon-minus d-flex align-items-center justify-content-center" 
                            style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === journalDetails.length - 1 ? 'none !important' : 'flex'};"
                            onclick="removeRow(${index})">
                            <i class="fas fa-minus" style="color:#fff;"></i>
                        </div>

                        <!-- ICON PLUS -->
                        <div class="icon-plus d-flex align-items-center justify-content-center" 
                            style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                            display:${index === journalDetails.length - 1 ? 'flex' : 'none !important'};"
                            onclick="addRow()">
                            <i class="fas fa-plus" style="color:#fff;"></i>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text form-control" style="cursor:pointer;">
                                <a data-toggle="modal" data-target="${index === journalDetails.length - 1 ? '#' : '#myAllTransactions'}" onclick="pickRefNumber(${index})">
                                    <i class="fas fa-search"></i>
                                </a>
                            </span>
                        </div>
                        <input type="hidden" id="ref_number_id_${index}" value="${row.ref_number_id}">
                        <input type="text" id="ref_number_name_${index}" class="form-control" readonly
                            value="${row.ref_number_name}"
                            onchange="updateField(${index}, 'ref_number_name', this.value)" style="background-color: ${index === journalDetails.length - 1 ? '' : 'white'};">
                    </div>
                </td>

                <td>
                    <select ${index === journalDetails.length - 1 ? 'disabled' : ''} class="form-control" id="debit_credit_${index}"
                        onchange="updateField(${index}, 'debit_credit', this.value)">
                        <option disabled ${row.debit_credit === '' ? 'selected' : ''}>Select a ...</option>
                        <option value="DEBIT" ${row.debit_credit === 'DEBIT' ? 'selected' : ''}>DB</option>
                        <option value="CREDIT" ${row.debit_credit === 'CREDIT' ? 'selected' : ''}>CR</option>
                    </select>
                </td>

                <td><input type="number" class="form-control" readonly
                    value="${row.value}" onchange="updateField(${index}, 'value', this.value)"></td>

                <td><input type="number" class="form-control" readonly
                    value="${row.unpaid}" onchange="updateField(${index}, 'unpaid', this.value)"></td>

                <td><input id="payment${index}" class="form-control number-without-negative" autocomplete="off"
                    value="${row.payment}" onchange="updateField(${index}, 'payment', this.value.replace(/,/g, ''))" ${index === journalDetails.length - 1 ? 'readonly' : ''}></td>

                <td><input type="number" class="form-control" readonly
                    value="${row.balance}" onchange="updateField(${index}, 'balance', this.value)"></td>

                <td>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text form-control" style="cursor:pointer;">
                                <a data-toggle="modal" data-target="${index === journalDetails.length - 1 ? '#' : '#myGetChartOfAccount'}" onclick="pickCOA(${index})">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box" />
                                </a>
                            </span>
                        </div>
                        <input type="hidden" id="coa_id_${index}" value="${row.coa_id}">
                        <input type="text" id="coa_name_${index}" class="form-control" readonly
                            value="${row.coa_name}" onchange="updateField(${index}, 'coa_name', this.value)" style="background-color: ${index === journalDetails.length - 1 ? '' : 'white'};">
                    </div>
                </td>

                <td>
                    <div class="input-group justify-content-center">
                        <div class="input-group-append">
                            <span class="input-group-text form-control" style="cursor:pointer;">
                                <a data-toggle="modal" data-target="#"><i class="fas fa-paperclip"></i></a>
                            </span>
                        </div>
                    </div>
                </td>
            `;

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

    function submitJournalDetails() {
        console.log("Data siap dikirim:", journalDetails);

        $.ajax({
            url: '/cashbank/save',  
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                journal_details: JSON.stringify(journalDetails)
            },
            success: function(response) {
                alert('Data berhasil dikirim!');
            },
            error: function(xhr) {
                alert('Terjadi kesalahan: ' + xhr.responseText);
            }
        });
    }

    $('#tableAllTransactions').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_transaction"]').val();
        let trano   = $(this).find('td:nth-child(2)').text();
        let project = $(this).find('td:nth-child(3)').text();
        let site    = $(this).find('td:nth-child(4)').text();

        $(`#ref_number_id_${currentIndexPickRefNumber}`).val(sysId);
        $(`#ref_number_name_${currentIndexPickRefNumber}`).val(trano);
        $(`#ref_number_name_${currentIndexPickRefNumber}`).css('background-color', '#e9ecef');
        
        updateField(currentIndexPickRefNumber, 'ref_number_id', sysId);
        updateField(currentIndexPickRefNumber, 'ref_number_name', trano);

        $('#myAllTransactions').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();
        
        $(`#coa_id_${currentIndexPickCOA}`).val(sysId);
        $(`#coa_name_${currentIndexPickCOA}`).val(`${code} - ${name}`);
        $(`#coa_name_${currentIndexPickCOA}`).css('background-color', '#e9ecef');

        updateField(currentIndexPickCOA, 'coa_id', sysId);
        updateField(currentIndexPickCOA, 'coa_name', `${code} - ${name}`);
        
        $('#myGetChartOfAccount').modal('hide');
    });

    $(window).one('load', function() {
        detailCashBank();
    });
</script>