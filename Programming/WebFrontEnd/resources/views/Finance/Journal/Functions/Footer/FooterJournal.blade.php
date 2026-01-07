<script>
    let dummyBeginningBalance       = 5000000000;
    let journalDetails              = [];
    let dataStore                   = [];
    let cashDisbursementItemList    = [];
    let cashReceiptItemList         = [];
    let dataWorkflow                = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    let currentIndexPickCOA         = null;
    let currentIndexPickRefNumber   = null;
    let currentIndexPickFromTo      = null;
    let triggerButtonModal          = null;
    const COABank                   = 65000000000003;
    const dateNow                   = new Date();
    const accountNumber             = document.getElementById("bank_accounts_id");
    const journalDate               = document.getElementById("journal_date");

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
            ref_number_id: "", // REF NUMBER
            ref_number_name: "", // REF NUMBER
            budget_name: "",
            accountingEntryRecordType_RefID: "", // DEBIT OR CREDIT
            amountCurrency_RefID: 62000000000001,
            amountCurrencyValue: "", // PAYMENT
            amountCurrencyExchangeRate: 1,
            quantityUnit_RefID: 73000000000001,
            quantity: 1,
            source_RefID: "", // FROM OR TO
            source: "", // FROM OR TO
            chartOfAccount_RefID: "", // COA CODE
            chartOfAccountName: "", // COA CODE
            attachment: null, // ATTACHMENT
            attachment_url: "" // ATTACHMENT
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
    }

    function handleFileUpload(index, input) {
        const file = input.files[0];
        if (!file) return;

        const fileUrl = URL.createObjectURL(file);
        journalDetails[index].attachment = file;
        journalDetails[index].attachment_url = fileUrl;

        renderTable(); // refresh tampilan supaya preview muncul
    }

    // function previewAttachment(url) {
    //     const modalImg = document.getElementById("previewImage");
    //     modalImg.src = url;
    //     $("#previewModal").modal("show");
    // }

    function deleteAttachment(index) {
        journalDetails[index].attachment = null;
        journalDetails[index].attachment_url = "";
        renderTable();
    }

    function totalDebitCredit() {
        totalCredit = 0;
        totalDebit  = 0;
        
        for (let index = 0; index < journalDetails.length; index++) {
            if (journalDetails[index].accountingEntryRecordType_RefID === "214000000000002") {
                totalDebit += 1;
            }
            if (journalDetails[index].accountingEntryRecordType_RefID === "214000000000001") {
                totalCredit += 1;
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
                if (journalDetails[index].accountingEntryRecordType_RefID === "214000000000002") {
                    totalCashOut += value;
                    isTypeNotEmpty =  true;
                }
                if (journalDetails[index].accountingEntryRecordType_RefID === "214000000000001") {
                    totalCashIn += value;
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
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:flex;"
                                onclick="{removeRow(${index});totalDebitCredit();totalPayments();}">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myAllTransactions" onclick="pickRefNumber(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="hidden" id="quantity${index}" value="${row.quantity}">
                            <input type="hidden" id="ref_number_id${index}" value="${row.ref_number_id}">
                            <input type="text" id="ref_number_name${index}" class="form-control" readonly
                                value="${row.ref_number_name}"
                                onchange="updateField(${index}, 'ref_number_name', this.value)" style="background-color: ${row.ref_number_name ? '#e9ecef' : 'white'};">
                        </div>
                    </td>

                    <td>
                        <select class="form-control" id="accountingEntryRecordType_RefID${index}"
                            onchange="updateField(${index}, 'accountingEntryRecordType_RefID', this.value)">
                            <option value="" disabled ${row.accountingEntryRecordType_RefID == '' ? 'selected' : ''}>Select a ...</option>
                            <option value="214000000000001" ${row.accountingEntryRecordType_RefID == '214000000000001' ? 'selected' : ''}>DB</option>
                            <option value="214000000000002" ${row.accountingEntryRecordType_RefID == '214000000000002' ? 'selected' : ''}>CR</option>
                        </select>
                    </td>

                    <td>
                        <input id="budget${index}" type="text" class="form-control" value="${row.budget_name}" readonly />
                    </td>

                    <td>
                        <input id="value${index}" type="text" class="form-control" readonly />
                    </td>

                    <td>
                        <input id="unpaid${index}" type="text" class="form-control" readonly />
                    </td>

                    <td>
                        <input type="hidden" id="amountCurrency_RefID${index}" value="${row.amountCurrency_RefID}">
                        <input type="hidden" id="quantityUnit_RefID${index}" value="${row.quantityUnit_RefID}" />
                        <input type="hidden" id="amountCurrencyExchangeRate${index}" value="${row.amountCurrencyExchangeRate}">
                        <input id="amountCurrencyValue${index}" class="form-control number-without-negative" autocomplete="off" value="${row.amountCurrencyValue ? currencyTotal(row.amountCurrencyValue) : row.amountCurrencyValue}" onchange="updateField(${index}, 'amountCurrencyValue', parseFloat(this.value.replace(/,/g, '')))">
                    </td>

                    <td>
                        <input id="balance${index}" type="number" class="form-control" readonly />
                    </td>

                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myBanksAccount" onclick="pickFromTo(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="hidden" id="source_RefID${index}" class="form-control" value="${row.source_RefID}">
                            <input type="text" id="source${index}" class="form-control" readonly value="${row.source}" style="background-color: ${row.source ? '#e9ecef' : 'white'};">
                        </div>
                    </td>

                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="hidden" id="chartOfAccount_RefID${index}" value="${row.chartOfAccount_RefID}">
                            <input type="text" id="chartOfAccountName${index}" class="form-control" readonly
                                value="${row.chartOfAccountName}" onchange="updateField(${index}, 'chartOfAccountName', this.value)" style="background-color: ${row.chartOfAccountName ? '#e9ecef' : 'white'};">
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
                                    <input type="file" accept="image/*,.pdf,.doc,.docx" 
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

            $(`#accountingEntryRecordType_RefID${index}`).on('change', function() {
                totalPayments();
            });

            $(`#amountCurrencyValue${index}`).on('keyup', function() {
                let payment     = $(this).val().replace(/,/g, '');
                let typePayment = $(`#accountingEntryRecordType_RefID${index}`).val();

                totalPayments();
            });
        });
    }

    function summaryData() {
        const year              = dateNow.getFullYear();
        const month             = String(dateNow.getMonth() + 1).padStart(2, '0');
        const day               = String(dateNow.getDate()).padStart(2, '0');
        const journalDateTimeTZ = journalDate.value.split('/'); 
        const sourceTable       = document.getElementById('journal_details_table').getElementsByTagName('tbody')[0];
        const targetTable       = document.getElementById('journal_summary_table').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const refNumberRefID                    = row.querySelector('input[id^="ref_number_id"]');
            const refNumberName                     = row.querySelector('input[id^="ref_number_name"]');
            const accountingEntryRecordTypeRefID    = row.querySelector('select[id^="accountingEntryRecordType_RefID"]');
            const quantityUnitRefID                 = row.querySelector('input[id^="quantityUnit_RefID"]');
            const amountCurrencyExchangeRate        = row.querySelector('input[id^="amountCurrencyExchangeRate"]');
            const amountCurrencyRefID               = row.querySelector('input[id^="amountCurrency_RefID"]');
            const sourceRefID                       = row.querySelector('input[id^="source_RefID"]');
            const source                            = row.querySelector('input[id^="source"]');
            const chartOfAccountRefID               = row.querySelector('input[id^="chartOfAccount_RefID"]');
            const chartOfAccountName                = row.querySelector('input[id^="chartOfAccountName"]');
            const quantityInput                     = row.querySelector('input[id^="quantity"]');
            const paymentInput                      = row.querySelector('input[id^="amountCurrencyValue"]');
            const budgetInput                       = row.querySelector('input[id^="budget"]');

            if (
                refNumberName && accountingEntryRecordTypeRefID && paymentInput && source && chartOfAccountName &&
                refNumberName.value.trim() !== '' &&
                accountingEntryRecordTypeRefID.value.trim() !== '' &&
                paymentInput.value.trim() !== '' &&
                source.value.trim() !== '' &&
                chartOfAccountName.value.trim() !== ''
            ) {
                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCode = targetRow.children[0].value.trim();

                    if (targetCode == refNumberRefID.value) {
                        targetRow.children[1].innerText = refNumberName.value;
                        targetRow.children[2].innerText = accountingEntryRecordTypeRefID.value == '214000000000001' ? 'Debit' : 'Credit';
                        targetRow.children[3].innerText = budgetInput.value;
                        targetRow.children[4].innerText = paymentInput.value;
                        targetRow.children[5].innerText = chartOfAccountName.value;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.refNumberID == refNumberRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                refNumberID: parseInt(refNumberRefID.value),
                                accountingEntryRecordType_RefID: parseInt(accountingEntryRecordTypeRefID.value),
                                documentDateTimeTZ: `${year}-${month}-${day}`,
                                businessDocument_RefID: parseInt(refNumberRefID.value),
                                bankAccount_RefID: parseInt(accountNumber.value), 
                                combinedBudget_RefID: 46000000000033,
                                journalDateTimeTZ: `${journalDateTimeTZ[2]}-${journalDateTimeTZ[0]}-${journalDateTimeTZ[1]}`,
                                log_FileUpload_Pointer_RefID: null, // cashDisbursementItemList & cashReceiptItemList
                                beneficiaryBankAccount_RefID: 167000000000001, // cashDisbursementItemList
                                senderBankAccount_RefID: 167000000000001, // cashReceiptItemList
                                chartOfAccount_RefID: parseInt(chartOfAccountRefID.value), // cashDisbursementItemList & cashReceiptItemList
                                amountCurrency_RefID: parseInt(amountCurrencyRefID.value), // cashDisbursementItemList & cashReceiptItemList
                                amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')), // cashDisbursementItemList & cashReceiptItemList
                                amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value), // cashDisbursementItemList & cashReceiptItemList
                                remarks: null, // cashDisbursementItemList & cashReceiptItemList
                                entities: [
                                    // COA CODE
                                    {
                                        chartOfAccount_RefID: COABank,
                                        accountingEntryRecordType_RefID: parseInt(accountingEntryRecordTypeRefID.value),
                                        amountCurrency_RefID: parseInt(amountCurrencyRefID.value),
                                        amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')),
                                        amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value),
                                        quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                        quantity: parseFloat(quantityInput.value.replace(/,/g, '')),
                                        type: accountingEntryRecordTypeRefID.value == '214000000000001' ? 'Debit' : 'Credit'
                                    },
                                    // COA BANK
                                    {
                                        chartOfAccount_RefID: parseInt(chartOfAccountRefID.value),
                                        accountingEntryRecordType_RefID: accountingEntryRecordTypeRefID.value == '214000000000001' ? 214000000000002 : 214000000000001,
                                        amountCurrency_RefID: parseInt(amountCurrencyRefID.value),
                                        amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')),
                                        amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value),
                                        quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                        quantity: parseFloat(quantityInput.value.replace(/,/g, '')),
                                        type: accountingEntryRecordTypeRefID.value == '214000000000001' ? 'Credit' : 'Debit',
                                    }
                                ]
                            }
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="refID[]" value="${refNumberRefID.value}">
                        <td style="text-align: left;padding: 0.8rem;">${refNumberName.value}</td>
                        <td style="text-align: left;padding: 0.8rem;">${accountingEntryRecordTypeRefID.value == '214000000000001' ? 'Debit' : 'Credit'}</td>
                        <td style="text-align: left;padding: 0.8rem;text-transform: capitalize;">${budgetInput.value}</td>
                        <td style="text-align: left;padding: 0.8rem;">${paymentInput.value}</td>
                        <td style="text-align: left;padding: 0.8rem;">${chartOfAccountName.value}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        refNumberID: parseInt(refNumberRefID.value),
                        accountingEntryRecordType_RefID: parseInt(accountingEntryRecordTypeRefID.value),
                        documentDateTimeTZ: `${year}-${month}-${day}`,
                        businessDocument_RefID: parseInt(refNumberRefID.value),
                        bankAccount_RefID: parseInt(accountNumber.value), 
                        combinedBudget_RefID: 46000000000033,
                        journalDateTimeTZ: `${journalDateTimeTZ[2]}-${journalDateTimeTZ[0]}-${journalDateTimeTZ[1]}`,
                        log_FileUpload_Pointer_RefID: null, // cashDisbursementItemList & cashReceiptItemList
                        beneficiaryBankAccount_RefID: 167000000000001, // cashDisbursementItemList
                        senderBankAccount_RefID: 167000000000001, // cashReceiptItemList
                        chartOfAccount_RefID: parseInt(chartOfAccountRefID.value), // cashDisbursementItemList & cashReceiptItemList
                        amountCurrency_RefID: parseInt(amountCurrencyRefID.value), // cashDisbursementItemList & cashReceiptItemList
                        amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')), // cashDisbursementItemList & cashReceiptItemList
                        amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value), // cashDisbursementItemList & cashReceiptItemList
                        remarks: null, // cashDisbursementItemList & cashReceiptItemList
                        entities: [
                            // COA CODE
                            {
                                chartOfAccount_RefID: COABank,
                                accountingEntryRecordType_RefID: parseInt(accountingEntryRecordTypeRefID.value),
                                amountCurrency_RefID: parseInt(amountCurrencyRefID.value),
                                amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')),
                                amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value),
                                quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                quantity: parseFloat(quantityInput.value.replace(/,/g, '')),
                                type: accountingEntryRecordTypeRefID.value == '214000000000001' ? 'Debit' : 'Credit'
                            },
                            // COA BANK
                            {
                                chartOfAccount_RefID: parseInt(chartOfAccountRefID.value),
                                accountingEntryRecordType_RefID: accountingEntryRecordTypeRefID.value == '214000000000001' ? 214000000000002 : 214000000000001,
                                amountCurrency_RefID: parseInt(amountCurrencyRefID.value),
                                amountCurrencyValue: parseFloat(paymentInput.value.replace(/,/g, '')),
                                amountCurrencyExchangeRate: parseInt(amountCurrencyExchangeRate.value),
                                quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                quantity: parseFloat(quantityInput.value.replace(/,/g, '')),
                                type: accountingEntryRecordTypeRefID.value == '214000000000001' ? 'Credit' : 'Debit',
                            }
                        ]
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

    function commentWorkflow() {
        cashDisbursementItemList = dataStore.filter(value => value.accountingEntryRecordType_RefID == '214000000000002')
            .map(value => ({ 
                entities: { 
                    documentDateTimeTZ: value.documentDateTimeTZ,
                    businessDocument_RefID: value.businessDocument_RefID,
                    log_FileUpload_Pointer_RefID: value.log_FileUpload_Pointer_RefID,
                    combinedBudget_RefID: value.combinedBudget_RefID,
                    beneficiaryBankAccount_RefID: value.beneficiaryBankAccount_RefID,
                    chartOfAccount_RefID: value.chartOfAccount_RefID,
                    amountCurrency_RefID: value.amountCurrency_RefID,
                    amountCurrencyValue: value.amountCurrencyValue,
                    amountCurrencyExchangeRate: value.amountCurrencyExchangeRate,
                    remarks: value.remarks
                } 
            }));
        cashReceiptItemList = dataStore.filter(value => value.accountingEntryRecordType_RefID == '214000000000001')
            .map(value => ({ 
                entities: { 
                    documentDateTimeTZ: value.documentDateTimeTZ,
                    businessDocument_RefID: value.businessDocument_RefID,
                    log_FileUpload_Pointer_RefID: value.log_FileUpload_Pointer_RefID,
                    combinedBudget_RefID: value.combinedBudget_RefID,
                    senderBankAccount_RefID: value.senderBankAccount_RefID,
                    chartOfAccount_RefID: value.chartOfAccount_RefID,
                    amountCurrency_RefID: value.amountCurrency_RefID,
                    amountCurrencyValue: value.amountCurrencyValue,
                    amountCurrencyExchangeRate: value.amountCurrencyExchangeRate,
                    remarks: value.remarks
                } 
            }));

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
                    journalDetail: JSON.stringify(dataStore),
                    cashDisbursementItemList: JSON.stringify(cashDisbursementItemList),
                    cashReceiptItemList: JSON.stringify(cashReceiptItemList),
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

        $(`#ref_number_id${currentIndexPickRefNumber}`).val(sysId);
        $(`#ref_number_name${currentIndexPickRefNumber}`).val(trano);
        $(`#ref_number_name${currentIndexPickRefNumber}`).css('background-color', '#e9ecef');

        $(`#budget${currentIndexPickRefNumber}`).val(project);

        updateField(currentIndexPickRefNumber, 'ref_number_id', parseInt(sysId));
        updateField(currentIndexPickRefNumber, 'ref_number_name', trano);
        updateField(currentIndexPickRefNumber, 'budget_name', project);

        $('#myAllTransactions').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();
        
        $(`#chartOfAccount_RefID${currentIndexPickCOA}`).val(sysId);
        $(`#chartOfAccountName${currentIndexPickCOA}`).val(`${code} - ${name}`);
        $(`#chartOfAccountName${currentIndexPickCOA}`).css('background-color', '#e9ecef');

        updateField(currentIndexPickCOA, 'chartOfAccount_RefID', parseInt(sysId));
        updateField(currentIndexPickCOA, 'chartOfAccountName', `${code} - ${name}`);
        
        $('#myGetChartOfAccount').modal('hide');
    });

    $('#tableBanksAccount').on('click', 'tbody tr', function() {
        const sysID       = $(this).find('input[type="hidden"]').val();
        const bankName    = $(this).find('td:nth-child(2)').text();
        const bankAccount = $(this).find('td:nth-child(3)').text();
        const accountName = $(this).find('td:nth-child(4)').text();

        if (currentIndexPickFromTo !== null) {
            $(`#source_RefID${currentIndexPickFromTo}`).val(sysID);
            $(`#source${currentIndexPickFromTo}`).val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $(`#source${currentIndexPickFromTo}`).css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});

            updateField(currentIndexPickFromTo, 'source_RefID', sysID);
            updateField(currentIndexPickFromTo, 'source', `(${bankName}) ${bankAccount} - ${accountName}`);
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

    $('#tableWorkflows').on('click', 'tbody tr', function() {
        const sysId             = $(this).find('input[data-trigger="sys_id_approver"]').val();
        const workflowName      = $(this).find('td:nth-child(2)').text();
        const workflowPosition  = $(this).find('td:nth-child(3)').text();

        dataWorkflow.approverEntityRefID = parseInt(sysId);

        $("#myWorkflows").modal('toggle');
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
            if (journalDate.value) {
                $("#journal_date").css({
                    "background-color": "#e9ecef",
                    "border": "1px solid #ced4da"
                });
                $("#journal_date_message").hide();
            }
        });
    });
</script>