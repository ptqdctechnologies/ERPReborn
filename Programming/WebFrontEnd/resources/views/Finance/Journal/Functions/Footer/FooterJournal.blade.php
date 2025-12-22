<script>
    let dummyBeginningBalance       = 5000000000;
    let journalDetails              = [];
    let dataStore                   = [];
    let totalCredit                 = 0;
    let totalDebit                  = 0;
    let currentIndexPickCOA         = null;
    let currentIndexPickRefNumber   = null;
    let currentIndexPickFromTo      = null;
    let triggerButtonModal          = null;
    const accountNumber             = document.getElementById("bank_accounts_id");
    const journalDate               = document.getElementById("journal_date");
    const dateDelivery              = document.getElementById("journal_date");

    function pickFromTo(index) {
        currentIndexPickFromTo = index;
    }

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
            accountingEntryRecordType_RefID: "",
            amountCurrency_RefID: 62000000000001,
            amountCurrencyValue: "",
            amountCurrencyExchangeRate: 1,
            quantityUnit_RefID: 73000000000001,
            quantity: 0,
            budget_name: "",
            value: "",
            unpaid: "",
            balance: "",
            chartOfAccount_RefID: "",
            chartOfAccountName: "",
            attachment: null,
            attachment_url: "",
            from_to: ""
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

        if (field == "accountingEntryRecordType_RefID") {
            totalDebitCredit();
        }
        
        console.log("Updated:", journalDetails); // untuk debugging
    }

    // Upload file
    function handleFileUpload(index, input) {
        const file = input.files[0];
        if (!file) return;

        const fileUrl = URL.createObjectURL(file);
        journalDetails[index].attachment = file;
        journalDetails[index].attachment_url = fileUrl;

        renderTable(); // refresh tampilan supaya preview muncul
    }

    // Preview file (jika gambar)
    function previewAttachment(url) {
        const modalImg = document.getElementById("previewImage");
        modalImg.src = url;
        $("#previewModal").modal("show");
    }

    // Hapus file yang diupload
    function deleteAttachment(index) {
        journalDetails[index].attachment = null;
        journalDetails[index].attachment_url = "";
        renderTable();
    }

    function totalDebitCredit() {
        totalCredit = 0;
        totalDebit  = 0;
        
        for (let index = 0; index < journalDetails.length; index++) {
            if (journalDetails[index].accountingEntryRecordType_RefID === "CREDIT") {
                totalCredit += 1;
            } 
            if (journalDetails[index].accountingEntryRecordType_RefID === "DEBIT") {
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

        document.querySelectorAll('input[id^="amountCurrencyValue"]').forEach(function(input, index) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                if (journalDetails[index].accountingEntryRecordType_RefID === "CREDIT") {
                    totalCashIn += value;
                    isTypeNotEmpty =  true;
                } 
                if (journalDetails[index].accountingEntryRecordType_RefID === "DEBIT") {
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
                                <span class="input-group-text form-control" data-toggle="modal" data-target="${index === journalDetails.length - 1 ? '#' : '#myAllTransactions'}" onclick="pickRefNumber(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="hidden" id="ref_number_id_${index}" value="${row.ref_number_id}">
                            <input type="hidden" id="amountCurrency_RefID_${index}" value="${row.amountCurrency_RefID}">
                            <input type="hidden" id="quantityUnit_RefID_${index}" value="${row.quantityUnit_RefID}">
                            <input type="hidden" id="amountCurrencyExchangeRate_${index}" value="${row.amountCurrencyExchangeRate}">
                            <input type="hidden" id="quantity_${index}" value="${row.quantity}">
                            <input type="text" id="ref_number_name_${index}" class="form-control" readonly
                                value="${row.ref_number_name}"
                                onchange="updateField(${index}, 'ref_number_name', this.value)" style="background-color: ${index === journalDetails.length - 1 ? '' : 'white'};">
                        </div>
                    </td>
    
                    <td>
                        <select ${index === journalDetails.length - 1 ? 'disabled' : ''} class="form-control" id="accountingEntryRecordType_RefID_${index}"
                            onchange="updateField(${index}, 'accountingEntryRecordType_RefID', this.value)">
                            <option value="" disabled ${row.accountingEntryRecordType_RefID === '' ? 'selected' : ''}>Select a ...</option>
                            <option value="DEBIT" ${row.accountingEntryRecordType_RefID === 'DEBIT' ? 'selected' : ''}>DB</option>
                            <option value="CREDIT" ${row.accountingEntryRecordType_RefID === 'CREDIT' ? 'selected' : ''}>CR</option>
                        </select>
                    </td>
    
                    <td>
                        <input id="budget_${index}" type="text" class="form-control" value="${row.budget_name}" onchange="updateField(${index}, 'budget_name', this.value)" readonly />
                    </td>

                    <td>
                        <input id="value_${index}" type="text" class="form-control" readonly value="${row.value}" onchange="updateField(${index}, 'value', this.value)">
                    </td>
    
                    <td>
                        <input id="unpaid_${index}" type="text" class="form-control" readonly value="${row.unpaid}" onchange="updateField(${index}, 'unpaid', this.value)">
                    </td>
    
                    <td>
                        <input id="amountCurrencyValue${index}" class="form-control number-without-negative" autocomplete="off" value="${row.amountCurrencyValue}" onchange="updateField(${index}, 'amountCurrencyValue', parseFloat(this.value.replace(/,/g, '')))" ${index === journalDetails.length - 1 ? 'readonly' : ''}>
                    </td>
    
                    <td>
                        <input id="balance_${index}" type="number" class="form-control" readonly value="${row.balance}" onchange="updateField(${index}, 'balance', this.value)">
                    </td>

                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="${index === journalDetails.length - 1 ? '#' : '#myBanksAccount'}" onclick="pickFromTo(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="from_to_${index}" class="form-control" readonly value="${row.from_to}" onchange="updateField(${index}, 'from_to', this.value)" style="background-color: ${index === journalDetails.length - 1 ? '' : 'white'};">
                        </div>
                    </td>
    
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="${index === journalDetails.length - 1 ? '#' : '#myGetChartOfAccount'}" onclick="pickCOA(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="hidden" id="chartOfAccount_RefID_${index}" value="${row.chartOfAccount_RefID}">
                            <input type="text" id="chartOfAccountName_${index}" class="form-control" readonly
                                value="${row.chartOfAccountName}" onchange="updateField(${index}, 'chartOfAccountName', this.value)" style="background-color: ${index === journalDetails.length - 1 ? '' : 'white'};">
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

            $(`#accountingEntryRecordType_RefID_${index}`).on('change', function() {
                totalPayments();
            });

            $(`#amountCurrencyValue${index}`).on('keyup', function() {
                let payment     = $(this).val().replace(/,/g, '');
                let typePayment = $(`#accountingEntryRecordType_RefID_${index}`).val();

                totalPayments();
            });
        });
    }

    function summaryData() {
        const sourceTable = document.getElementById('journal_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('journal_summary_table').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const refNumberRefID                = row.querySelector('input[id^="ref_number_id_"]');
            const refNumberName                 = row.querySelector('input[id^="ref_number_name_"]');
            const chartOfAccountRefID           = row.querySelector('input[id^="chartOfAccount_RefID_"]');
            const chartOfAccountName            = row.querySelector('input[id^="chartOfAccountName_"]');
            const amountCurrencyRefID           = row.querySelector('input[id^="amountCurrency_RefID_"]');
            const amountCurrencyExchangeRate    = row.querySelector('input[id^="amountCurrencyExchangeRate_"]');
            const quantityUnitRefID             = row.querySelector('input[id^="quantityUnit_RefID_"]');
            const debitCreditSelect             = row.querySelector('select[id^="accountingEntryRecordType_RefID_"]');
            const budgetInput                   = row.querySelector('input[id^="budget_"]');
            const paymentInput                  = row.querySelector('input[id^="amountCurrencyValue"]');
            const quantityInput                 = row.querySelector('input[id^="quantity_"]');

            if (
                chartOfAccountRefID && paymentInput && debitCreditSelect &&
                chartOfAccountRefID.value.trim() !== '' &&
                paymentInput.value.trim() !== '' &&
                debitCreditSelect.value.trim() !== ''
            ) {
                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[0].value.trim();

                    if (targetCode == refNumberRefID.value) {
                        targetRow.children[1].innerText = refNumberName.value;
                        targetRow.children[2].innerText = debitCreditSelect.value;
                        targetRow.children[3].innerText = budgetInput.value;
                        targetRow.children[4].innerText = paymentInput.value;
                        targetRow.children[5].innerText = chartOfAccountName.value;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.refNumberID == refNumberRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    refNumberID: parseInt(refNumberRefID.value),
                                    chartOfAccount_RefID: parseInt(chartOfAccountRefID.value),
                                    accountingEntryRecordType_RefID: debitCreditSelect.value === "DEBIT" ? 214000000000001 : 214000000000002,
                                    amountCurrency_RefID: parseInt(amountCurrencyRefID.value),
                                    amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')),
                                    amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    quantity: parseFloat(quantityInput.value.replace(/,/g, ''))
                                }
                            }
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="refID[]" value="${refNumberRefID.value}">
                        <td style="text-align: left;padding: 0.8rem;">${refNumberName.value}</td>
                        <td style="text-align: left;padding: 0.8rem;">${debitCreditSelect.value}</td>
                        <td style="text-align: left;padding: 0.8rem;text-transform: capitalize;">${budgetInput.value}</td>
                        <td style="text-align: left;padding: 0.8rem;">${paymentInput.value}</td>
                        <td style="text-align: left;padding: 0.8rem;">${chartOfAccountName.value}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            refNumberID: parseInt(refNumberRefID.value),
                            chartOfAccount_RefID: parseInt(chartOfAccountRefID.value),
                            accountingEntryRecordType_RefID: debitCreditSelect.value === "DEBIT" ? 214000000000001 : 214000000000002,
                            amountCurrency_RefID: parseInt(amountCurrencyRefID.value),
                            amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')),
                            amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            quantity: parseFloat(quantityInput.value.replace(/,/g, ''))
                        }
                    });
                }
            }
        }
    }

    function validationForm() {
        const isAccountNumberNotEmpty   = accountNumber.value.trim() !== '';
        const isJournalDateNotEmpty     = journalDate.value.trim() !== '';

        if (isAccountNumberNotEmpty && isJournalDateNotEmpty) {
            $('#journalFormModal').modal('show');
            summaryData();
        } else {
            if (!isAccountNumberNotEmpty && !isJournalDateNotEmpty) {
                $("#bank_accounts_name").css("border", "1px solid red");
                $("#journal_date").css("border", "1px solid red");

                $("#bank_accounts_message").show();
                $("#journal_date_message").show();
                return;
            }
            if (!isAccountNumberNotEmpty) {
                $("#bank_accounts_name").css("border", "1px solid red");
                $("#bank_accounts_message").show();
                return;
            }
            if (!isJournalDateNotEmpty) {
                $("#journal_date").css("border", "1px solid red");
                $("#journal_date_message").show();
                return;
            }
        }
    }

    function submitJournalDetails() {
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
                // dataWorkflow.comment = result.value;
                ShowLoading();
                JournalStore();
            }
        });
    }

    function JournalStore() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: {
                storeData: {
                    bankAccountsID: accountNumber.value,
                    journalDate: journalDate.value,
                    journalDetail: JSON.stringify(dataStore)
                }
            },
            url: '{{ route("Journal.store") }}',
            success: function(res) {
                HideLoading();

                if (res.status === 200) {
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
                        ShowLoading();
                        window.location.href = '/Journal?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                HideLoading();
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function submitForm(value) {
        triggerButtonModal = value;
        $('#journalFormModal').modal('hide');

        $('#journalFormModal').on('hidden.bs.modal', function (e) {
            if (triggerButtonModal === "SUBMIT") {
                // if (totalNextApprover > 1) {
                //     $('#myWorkflows').modal('show');
                // } else {
                    commentWorkflow();
                // }
            }
        });
    }

    $('#tableAllTransactions').on('click', 'tbody tr', function() {
        if (currentIndexPickRefNumber === null) return null;
        
        const sysId         = $(this).find('input[data-trigger="sys_id_transaction"]').val();
        // const sysIdBudget   = $(this).find('input[data-trigger="sys_id_transaction"]').val();
        const trano         = $(this).find('td:nth-child(2)').text();
        const project       = $(this).find('td:nth-child(3)').text();
        const site          = $(this).find('td:nth-child(4)').text();

        $(`#ref_number_id_${currentIndexPickRefNumber}`).val(sysId);
        $(`#ref_number_name_${currentIndexPickRefNumber}`).val(trano);
        $(`#ref_number_name_${currentIndexPickRefNumber}`).css('background-color', '#e9ecef');

        $(`#budget_${currentIndexPickRefNumber}`).val(project);

        updateField(currentIndexPickRefNumber, 'ref_number_id_', parseInt(sysId));
        updateField(currentIndexPickRefNumber, 'ref_number_name', trano);
        updateField(currentIndexPickRefNumber, 'budget_name', project);

        $('#myAllTransactions').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();
        
        $(`#chartOfAccount_RefID_${currentIndexPickCOA}`).val(sysId);
        $(`#chartOfAccountName_${currentIndexPickCOA}`).val(`${code} - ${name}`);
        $(`#chartOfAccountName_${currentIndexPickCOA}`).css('background-color', '#e9ecef');

        updateField(currentIndexPickCOA, 'chartOfAccount_RefID', parseInt(sysId));
        updateField(currentIndexPickCOA, 'chartOfAccountName', `${code} - ${name}`);
        
        $('#myGetChartOfAccount').modal('hide');
    });

    $('#tableBanksAccount').on('click', 'tbody tr', function() {
        let sysID       = $(this).find('input[type="hidden"]').val();
        let bankName    = $(this).find('td:nth-child(2)').text();
        let bankAccount = $(this).find('td:nth-child(3)').text();
        let accountName = $(this).find('td:nth-child(4)').text();

        if (currentIndexPickFromTo !== null) {
            $(`#from_to_${currentIndexPickFromTo}`).val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $(`#from_to_${currentIndexPickFromTo}`).css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        } else {
            $("#bank_accounts_id").val(sysID);
            $("#bank_accounts_name").val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $("#bank_accounts_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
            $("#bank_accounts_message").hide();
        }

        currentIndexPickFromTo = null;

        $('#myBanksAccount').modal('hide');
    });

    $('#tableGetJournal').on('click', 'tbody tr', function() {
        const sysID     = $(this).find('input[data-trigger="sys_id_journal"]').val();
        const sysText   = $(this).find('td:nth-child(2)').text();

        $(`#modal_journal_id`).val(sysID);
        $(`#modal_journal_document_number`).val(sysText);

        $('#myJournal').modal('hide');
    });

    $('#btn_revision_journal').on('click', function() {
        getJournal();
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
                $("#journal_date_message").hide();
            }
        });
    });
</script>