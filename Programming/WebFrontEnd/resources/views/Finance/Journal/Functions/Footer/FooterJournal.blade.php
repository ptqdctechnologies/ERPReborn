<script>
    let dummyBeginningBalance       = 5000000000;
    let journalDetails              = [];
    let totalCredit                 = 0;
    let totalDebit                  = 0;
    let currentIndexPickCOA         = null;
    let currentIndexPickRefNumber   = null;
    const dateDelivery              = document.getElementById("journal_date");

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
            coa_name: "",
            attachment: null,
            attachment_url: ""
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
        
        console.log("Updated:", journalDetails); // untuk debugging
    }

    // 🔹 Upload file
    function handleFileUpload(index, input) {
        const file = input.files[0];
        if (!file) return;

        const fileUrl = URL.createObjectURL(file);
        journalDetails[index].attachment = file;
        journalDetails[index].attachment_url = fileUrl;

        renderTable(); // refresh tampilan supaya preview muncul
    }

    // 🔹 Preview file (jika gambar)
    function previewAttachment(url) {
        const modalImg = document.getElementById("previewImage");
        modalImg.src = url;
        $("#previewModal").modal("show");
    }

    // 🔹 Hapus file yang diupload
    function deleteAttachment(index) {
        journalDetails[index].attachment = null;
        journalDetails[index].attachment_url = "";
        renderTable();
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
        let isTypeNotEmpty  = false;

        document.querySelectorAll('input[id^="payment"]').forEach(function(input, index) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                if (journalDetails[index].debit_credit === "CREDIT") {
                    totalCashIn += value;
                    isTypeNotEmpty =  true;
                } 
                if (journalDetails[index].debit_credit === "DEBIT") {
                    totalCashOut += value;
                    isTypeNotEmpty =  true;
                }

                totalPayment += value;
            }
        });

        let totalEndingBalance = parseFloat(dummyBeginningBalance) - parseFloat(totalCashOut) + parseFloat(totalCashIn);

        if (isTypeNotEmpty) {
            document.getElementById('nominal_ending_balance').textContent   = `IDR ${currencyTotal(totalEndingBalance)}`;
        } else {
            document.getElementById('nominal_ending_balance').textContent   = `IDR 0.00`;
        }

        document.getElementById('nominal_cash_out').textContent             = `IDR ${currencyTotal(totalCashOut)}`;
        document.getElementById('nominal_cash_in').textContent              = `IDR ${currencyTotal(totalCashIn)}`;
        document.getElementById('journal_details_table_total').textContent  = currencyTotal(totalPayment);
    }

    function renderTable() {
        const tbody = document.getElementById("journal_details_table_body");
        tbody.innerHTML = "";

        journalDetails.forEach((row, index) => {
            const tr = document.createElement("tr");
            if (index === journalDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === journalDetails.length - 1 ? 'flex' : 'none !important'};"
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
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === journalDetails.length - 1 ? 'none !important' : 'flex'};"
                                onclick="{removeRow(${index});totalDebitCredit();totalPayments();}">
                                <i class="fas fa-minus" style="color:#fff;"></i>
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
    
                    <td style="text-align:center;padding-right:unset;">
                        ${row.attachment_url ? 
                            `
                                <div class="d-flex align-items-center" style="gap: 6px;">
                                    <div style="cursor:pointer;color:red;font-size:12px;" onclick="deleteAttachment(${index})">
                                        <i class="fas fa-trash"></i>
                                    </div>
                                    <a href="${row.attachment_url}" target="_blank" style="font-size:12px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;width: 50px;">${row.attachment.name}</a>
                                </div>
                            ` : 
                            `
                                <label class="btn btn-sm mb-0" style="cursor:pointer; background-color: #e9ecef; border: 1px solid #ced4da;">
                                    <i class="fas fa-paperclip"></i>
                                    <input ${index === journalDetails.length - 1 ? 'disabled' : ''} type="file" accept="image/*,.pdf,.doc,.docx" 
                                        style="display:none;" onchange="handleFileUpload(${index}, this)">
                                </label>
                            `
                        }
                    </td>
                `;
                
                // <td style="text-align:center;">
                //     ${row.attachment_url ? 
                //         `
                //             <div>
                //                 ${row.attachment.type.startsWith('image/') ? 
                //                     `<img src="${row.attachment_url}" onclick="previewAttachment('${row.attachment_url}')" style="width:40px;height:40px;object-fit:cover;cursor:pointer;border-radius:4px;border:1px solid #ccc;" />` :
                //                     `<a href="${row.attachment_url}" target="_blank" style="font-size:12px;">${row.attachment.name}</a>`
                //                 }
                //                 <div style="cursor:pointer;color:red;margin-top:3px;font-size:12px;" onclick="deleteAttachment(${index})">
                //                     <i class="fas fa-trash"></i> Delete
                //                 </div>
                //             </div>
                //         ` : 
                //         `
                //             <label class="btn btn-sm mb-0" style="cursor:pointer; background-color: #e9ecef; border: 1px solid #ced4da;">
                //                 <i class="fas fa-paperclip"></i>
                //                 <input ${index === journalDetails.length - 1 ? 'disabled' : ''} type="file" accept="image/*,.pdf,.doc,.docx" 
                //                     style="display:none;" onchange="handleFileUpload(${index}, this)">
                //             </label>
                //         `
                //     }
                // </td>
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

    $('#tableBanksAccount').on('click', 'tbody tr', function() {
        let sysID       = $(this).find('input[type="hidden"]').val();
        let bankName    = $(this).find('td:nth-child(2)').text();
        let bankAccount = $(this).find('td:nth-child(3)').text();
        let accountName = $(this).find('td:nth-child(4)').text();

        $("#bank_accounts_id").val(sysID);
        $("#bank_accounts_name").val(`(${bankName}) ${bankAccount} - ${accountName}`);
        $("#bank_accounts_name").css({"background-color":"#e9ecef"});

        $('#myBanksAccount').modal('hide');
    });

    $('#journal_date').on('keypress', function() {
        $("#journal_date").val("");
    });

    $('#journal_date').on('keyup', function() {
        $("#journal_date").val("");
    });

    $(window).one('load', function() {
        detailCashBank();
        getBanksAccount("", "");

        $('#nominal_beginning_balance').text(`IDR ${currencyTotal(dummyBeginningBalance)}`);

        $('#dateOfJournal').datetimepicker({
            format: 'L'
        });

        $('#dateOfJournal').on('change.datetimepicker', function (e) {
            if (dateDelivery.value) {
                $("#journal_date").css({
                    "background-color": "#e9ecef",
                    "border": "1px solid #ced4da"
                });
                // $("#dateOfDeliveryMessage").hide();
            }
        });
    });
</script>