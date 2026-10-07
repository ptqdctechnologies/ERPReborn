<script>
    let journalDetails = [];
    let currentIndexCoa = null;
    let currentIndexFromTo = null;
    let currentIndexTransNumber = null;
    let dummyBeginningBalance = 5000000000;
    let totalEndingBalance = 5000000000;
    const dummyCoaAccountNumber = 65000000000003; // COA BANK
    const dateNow = new Date();
    const accountNumberID = document.getElementById("bank_coa_id");
    const journalDate = document.getElementById("journal_date");

    function pickTransNumber(index) {
        currentIndexTransNumber = index;
    }

    function pickCoa(index) {
        currentIndexCoa = index;
    }

    function pickFromTo(index) {
        currentIndexFromTo = index;
    }

    function totalDebitCredit() {
        let totalCredit = 0;
        let totalDebit = 0;
        let totalVariance = 0;

        for (const detail of journalDetails) {
            if (detail.debit_credit_id === "214000000000002") {
                totalDebit++;
            } else if (detail.debit_credit_id === "214000000000001") {
                totalCredit++;
            }

            if (detail.variance_value > 0) {
                totalVariance++;
            }
        }

        document.getElementById('total_cash_out').textContent = totalDebit;
        document.getElementById('total_cash_in').textContent = totalCredit;
        document.getElementById('total_variance').textContent = totalVariance;
    }

    function totalVariance() {
        let total = 0;

        document.querySelectorAll('input[id^="variance_value"]').forEach(function (input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

            if (!isNaN(value)) {
                total += value;
            }

            totalDebitCredit();
        });

        let result = totalEndingBalance + parseFloat(total);

        document.getElementById('nominal_variance').textContent = `IDR ${currencyTotal(total)}`;

        document.getElementById('nominal_ending_balance').textContent = `IDR ${currencyTotal(result)}`;
    }

    function totalPayments() {
        let totalCashOut = 0;
        let totalCashIn = 0;
        // let totalPayment = 0;
        let isTypeNotEmpty = false;

        document.querySelectorAll('input[id^="payment_value"]').forEach(function (input, index) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                if (journalDetails[index].debit_credit_id === "214000000000002") {
                    totalCashOut += value;
                    isTypeNotEmpty = true;
                }
                if (journalDetails[index].debit_credit_id === "214000000000001") {
                    totalCashIn += value;
                    isTypeNotEmpty = true;
                }

                // totalPayment += value;
            }
        });

        totalEndingBalance = parseFloat(dummyBeginningBalance) - parseFloat(totalCashOut) + parseFloat(totalCashIn);

        console.log('totalEndingBalance', totalEndingBalance);

        // if (isTypeNotEmpty) {
        // document.getElementById('nominal_ending_balance').textContent = `IDR ${currencyTotal(totalEndingBalance)}`;
        // } else {
        // document.getElementById('nominal_ending_balance').textContent = `IDR 0.00`;
        // }

        document.getElementById('nominal_ending_balance').textContent = `IDR ${currencyTotal(totalEndingBalance)}`;
        document.getElementById('nominal_cash_out').textContent = `IDR ${currencyTotal(totalCashOut)}`;
        document.getElementById('nominal_cash_in').textContent = `IDR ${currencyTotal(totalCashIn)}`;
    }

    function updateDebitCredit(index, value) {
        const row = journalDetails[index];

        const entity = row.additionalData.itemList.items.entities;

        delete entity.cashDisbursementItemList;
        delete entity.cashReceiptItemList;

        if (value === '214000000000001') {
            entity.cashReceiptItemList = {
                items: {
                    entities: {
                        documentDateTimeTZ: '',
                        businessDocument_RefID: '',
                        log_FileUpload_Pointer_RefID: '',
                        combinedBudget_RefID: '',
                        beneficiaryBankAccount_RefID: '',
                        chartOfAccount_RefID: '',
                        amountCurrency_RefID: '',
                        amountCurrencyValue: '',
                        amountCurrencyExchangeRate: '',
                        remarks: '',
                        additionalData: [
                            {
                                chartOfAccount_RefID: '',
                                accountingEntryRecordType_RefID: '',
                                amountCurrency_RefID: '',
                                amountCurrencyValue: '',
                                amountCurrencyExchangeRate: '',
                                quantityUnit_RefID: '',
                                quantity: '',
                                variance: ''
                            },
                            {
                                chartOfAccount_RefID: '',
                                accountingEntryRecordType_RefID: '',
                                amountCurrency_RefID: '',
                                amountCurrencyValue: '',
                                amountCurrencyExchangeRate: '',
                                quantityUnit_RefID: '',
                                quantity: '',
                                variance: ''
                            }
                        ]
                    }
                }
            };
        } else {
            entity.cashDisbursementItemList = {
                items: {
                    entities: {
                        documentDateTimeTZ: '',
                        businessDocument_RefID: '',
                        log_FileUpload_Pointer_RefID: '',
                        combinedBudget_RefID: '',
                        beneficiaryBankAccount_RefID: '',
                        chartOfAccount_RefID: '',
                        amountCurrency_RefID: '',
                        amountCurrencyValue: '',
                        amountCurrencyExchangeRate: '',
                        remarks: '',
                        additionalData: [
                            {
                                chartOfAccount_RefID: '',
                                accountingEntryRecordType_RefID: '',
                                amountCurrency_RefID: '',
                                amountCurrencyValue: '',
                                amountCurrencyExchangeRate: '',
                                quantityUnit_RefID: '',
                                quantity: '',
                                variance: ''
                            },
                            {
                                chartOfAccount_RefID: '',
                                accountingEntryRecordType_RefID: '',
                                amountCurrency_RefID: '',
                                amountCurrencyValue: '',
                                amountCurrencyExchangeRate: '',
                                quantityUnit_RefID: '',
                                quantity: '',
                                variance: ''
                            }
                        ]
                    }
                }
            };
        }
    }

    function addRow() {
        const tbody = document.getElementById("journal_details_table_body");

        const newRow = {
            business_document_id: '',
            trans_number_preview: '',
            trans_number_id: '',
            trans_number_quantity_unit_id: '',
            trans_number_quantity: '',
            trans_number_currency_id: '',
            trans_number_currency_rate: '',
            debit_credit_id: '',
            budget_preview: '',
            budget_id: '',
            budget_code: '',
            budget_name: '',
            trans_value: '',
            unpaid_value: '',
            payment_value: '',
            variance_value: '',
            balance_value: '',
            from_to_preview: '',
            from_to_id: '',
            from_to_code: '',
            from_to_name: '',
            coa_preview: '',
            coa_id: '',
            coa_code: '',
            coa_name: '',
            attachment_value: ''
        };

        journalDetails.push(newRow);
        renderTable();
    }

    function removeRow(index) {
        journalDetails.splice(index, 1);
        renderTable();
    }

    function commentWorkflow() {
        const currentComment = document.getElementById('workflow_comment').value || "";

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
            inputValue: currentComment,
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
                $("#workflow_comment").val(result.value);

                document.getElementById('journalForm').requestSubmit();
            }
        });

        $("#journal_summary_modal").modal('toggle');
    }

    function validationForm() {
        const year = dateNow.getFullYear();
        const month = String(dateNow.getMonth() + 1).padStart(2, '0');
        const day = String(dateNow.getDate()).padStart(2, '0');
        const journalDateTimeTZ = journalDate.value.split('/');
        const filtered = journalDetails.filter(row => row.business_document_id);

        let filteredData = [];

        for (const detail of filtered) {
            filteredData.push({
                documentDateTimeTZ: `${year}-${month}-${day}`,
                businessDocument_RefID: parseInt(detail.business_document_id),
                bankAccount_RefID: 167000000000004, // parseInt(accountNumberID.value),
                combinedBudget_RefID: parseInt(detail.budget_id),
                journalDateTimeTZ: `${journalDateTimeTZ[2]}-${journalDateTimeTZ[0]}-${journalDateTimeTZ[1]}`,
                additionalData: {
                    itemList: {
                        items: {
                            entities: {
                                [detail.debit_credit_id == '214000000000001' ? 'cashReceiptItemList' : 'cashDisbursementItemList']: {
                                    items: {
                                        entities: {
                                            documentDateTimeTZ: `${year}-${month}-${day}`,
                                            businessDocument_RefID: parseInt(detail.business_document_id),
                                            log_FileUpload_Pointer_RefID: null,
                                            combinedBudget_RefID: parseInt(detail.budget_id),
                                            beneficiaryBankAccount_RefID: parseInt(detail.from_to_id),
                                            chartOfAccount_RefID: parseInt(detail.coa_id),
                                            amountCurrency_RefID: parseInt(detail.trans_number_currency_id),
                                            amountCurrencyValue: detail.payment_value,
                                            amountCurrencyExchangeRate: parseFloat(detail.trans_number_currency_rate.replace(/,/g, '')),
                                            remarks: null,
                                            additionalData: [
                                                // COA CODE
                                                {
                                                    chartOfAccount_RefID: parseInt(dummyCoaAccountNumber),
                                                    accountingEntryRecordType_RefID: parseInt(detail.debit_credit_id),
                                                    amountCurrency_RefID: parseInt(detail.trans_number_currency_id),
                                                    amountCurrencyValue: detail.payment_value,
                                                    amountCurrencyExchangeRate: parseFloat(detail.trans_number_currency_rate.replace(/,/g, '')),
                                                    quantityUnit_RefID: parseInt(detail.trans_number_quantity_unit_id),
                                                    quantity: detail.trans_number_quantity,
                                                    variance: detail.variance_value
                                                },
                                                // COA BANK
                                                {
                                                    chartOfAccount_RefID: parseInt(detail.coa_id),
                                                    accountingEntryRecordType_RefID: detail.debit_credit_id == '214000000000001' ? 214000000000002 : 214000000000001,
                                                    amountCurrency_RefID: parseInt(detail.trans_number_currency_id),
                                                    amountCurrencyValue: detail.payment_value,
                                                    amountCurrencyExchangeRate: parseFloat(detail.trans_number_currency_rate.replace(/,/g, '')),
                                                    quantityUnit_RefID: parseInt(detail.trans_number_quantity_unit_id),
                                                    quantity: detail.trans_number_quantity,
                                                    variance: detail.variance_value
                                                }
                                            ]
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            });
        }

        $('#journal_summary_table').DataTable({
            destroy: true,
            data: filtered,
            deferRender: true,
            searching: false,
            scrollCollapse: true,
            scroller: true,
            lengthChange: false,
            columns: [
                {
                    title: "No",
                    data: null,
                    render: function (data, type, row, meta) {
                        return (meta.row + 1);
                    }
                },
                {
                    title: "Trans. Number",
                    data: 'trans_number_preview',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    title: "DB/CR",
                    data: null,
                    defaultContent: '-',
                    render: function (data, type, row, meta) {
                        return data.debit_credit_id == '214000000000001' ? 'Debit' : 'Credit';
                    }
                },
                {
                    title: "Budget",
                    data: 'budget_preview',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    title: "Payment",
                    data: 'payment_value',
                    defaultContent: '-',
                    className: "align-middle"
                },
                {
                    title: "COA",
                    data: 'coa_preview',
                    defaultContent: '-',
                    className: "align-middle"
                }
            ]
        });

        $("#journal_details").val(JSON.stringify(filteredData));
    }

    function updateField(index, field, value) {
        journalDetails[index][field] = value;

        if (field == "debit_credit_id") {
            totalDebitCredit();
            totalPayments();
        }

        // console.log('journalDetails', journalDetails);
    }

    function detailCashBank() {
        journalDetails = [];
        addRow();
    }

    function validatePaymentInput(index) {
        const paymentInput = $(`#payment_value${index}`);

        // Normalize payment value
        let rawPaymentValue = paymentInput.val();

        // Hapus comma
        rawPaymentValue = Utils.removeCommas(rawPaymentValue);

        // Hanya angka dan titik
        rawPaymentValue = rawPaymentValue.replace(/[^0-9.]/g, '');

        // Hanya satu titik
        const dotIndex = rawPaymentValue.indexOf('.');
        if (dotIndex !== -1) {
            rawPaymentValue =
                rawPaymentValue.substring(0, dotIndex + 1) +
                rawPaymentValue
                    .substring(dotIndex + 1)
                    .replace(/\./g, '');
        }

        // Batasi 2 angka di belakang koma
        const parts = rawPaymentValue.split('.');
        if (parts[1]) {
            parts[1] = parts[1].substring(0, 2);
        }

        rawPaymentValue = parts.join('.');

        // Set kembali value input
        paymentInput.val(rawPaymentValue);

        const getValue = (field) =>
            Utils.parseFloatSafe(
                Utils.removeCommas($(`#${field}${index}`).val())
            );

        const transValue = getValue('trans_value');
        const paymentValue = getValue('payment_value');

        if (paymentValue > transValue) {
            paymentInput.val('');
            $(`#balance_value${index}`).val('');

            updateField(index, 'payment_value', '');
            updateField(index, 'balance_value', '');

            ErrorNotif("Payment is over Transaction Value !");

            return;
        }

        const balanceValue =
            (Math.round(transValue * 100) -
                Math.round(paymentValue * 100)) / 100;

        $(`#balance_value${index}`).val(currency(balanceValue));

        updateField(index, 'payment_value', paymentValue);
        updateField(index, 'balance_value', balanceValue);
    }

    function renderTable() {
        const tbody = document.getElementById("journal_details_table_body");

        if (tbody) {
            tbody.innerHTML = "";
        }

        journalDetails.forEach((row, index) => {
            const tr = document.createElement("tr");

            if (index === journalDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div 
                                class="icon-plus d-flex align-items-center justify-content-center" 
                                onclick="addRow()"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 100%;
                                    background-color: #4B586A;
                                    margin: 2px;
                                    cursor: pointer;
                                    display:${index === journalDetails.length - 1 ? 'flex' : 'none !important'};
                                ">
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
                    <td></td>
                `;
            } else {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div 
                                class="icon-minus d-flex align-items-center justify-content-center" 
                                onclick="{removeRow(${index});totalDebitCredit();totalPayments();totalVariance();}"
                                style="
                                    width: 20px;
                                    height: 20px;
                                    border-radius: 100%;
                                    background-color: red;
                                    margin: 2px;
                                    cursor: pointer;
                                    display: flex;
                                ">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myAllTransactions" onclick="pickTransNumber(${index})" style="cursor: pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input id="trans_number_preview${index}" type="text" class="form-control" value="${row.trans_number_preview}" readonly style="background-color: ${row.trans_number_preview ? '#e9ecef' : '#fff'};">
                        </div>
                    </td>
                    <td>
                        <select 
                            class="form-control" 
                            id="debit_credit${index}"
                            onchange="updateField(${index}, 'debit_credit_id', this.value)"
                        >
                            <option value="" disabled ${row.debit_credit_id == '' ? 'selected' : ''}>Select a ...</option>
                            <option value="214000000000001" ${row.debit_credit_id == '214000000000001' ? 'selected' : ''}>DB</option>
                            <option value="214000000000002" ${row.debit_credit_id == '214000000000002' ? 'selected' : ''}>CR</option>
                        </select>
                    </td>
                    <td>
                        <input 
                            id="budget_preview${index}"
                            readonly 
                            type="text"
                            class="form-control" 
                            value="${row.budget_preview}"
                        />
                    </td>
                    <td>
                        <input 
                            id="trans_value${index}"
                            readonly 
                            type="text"
                            class="form-control number-without-negative" 
                            value="${row.trans_value ? currency(row.trans_value) : row.trans_value}"
                        />
                    </td>
                    <td>
                        <input 
                            id="unpaid_value${index}"
                            readonly 
                            type="text"
                            class="form-control number-without-negative" 
                            value="${row.unpaid_value ? currency(row.unpaid_value) : row.unpaid_value}"
                        />
                    </td>
                    <td>
                        <input 
                            id="payment_value${index}"
                            type="text"
                            class="form-control number-without-negative" 
                            autocomplete="off"
                            value="${row.payment_value ? currency(row.payment_value) : row.payment_value}"
                            oninput="validatePaymentInput(${index})"
                            onkeyup="totalPayments()"
                        />
                    </td>
                    <td>
                        <input 
                            id="variance_value${index}"
                            type="text"
                            class="form-control number-without-negative" 
                            autocomplete="off"
                            value="${row.variance_value ? currency(row.variance_value) : row.variance_value}"
                            oninput="updateField(${index}, 'variance_value', parseFloat(this.value.replace(/,/g, '')))"
                            onkeyup="totalVariance()"
                        />
                    </td>
                    <td>
                        <input 
                            id="balance_value${index}"
                            readonly 
                            type="text"
                            class="form-control number-without-negative" 
                            value="${row.balance_value ? currency(row.balance_value) : row.balance_value}"
                        />
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myBanksAccount" onclick="pickFromTo(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input 
                                id="from_to_preview${index}"
                                type="text" 
                                class="form-control" 
                                readonly 
                                style="background-color: ${row.from_to_preview ? '#e9ecef' : '#fff'};"
                                value="${row.from_to_preview}"
                            >
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCoa(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input 
                                id="coa_preview${index}"
                                type="text" 
                                class="form-control" 
                                readonly 
                                style="background-color: ${row.coa_preview ? '#e9ecef' : '#fff'};"
                                value="${row.coa_preview}"
                            />
                        </div>
                    </td>
                    <td>
                        -
                    </td>
                `;
            }

            if (tbody) {
                tbody.appendChild(tr);
            }
        });
    }

    function checkTransactionId(key, value) {
        let referenceId = null;

        if (
            key === "Advance Form" ||
            key === "Loan Form" ||
            key === "Reimbursement Form"
        ) {
            referenceId = value.sys_ID;
        } else if (key === "Person Business Trip Form") {
            referenceId = value.recordID;
        }

        return referenceId;
    }

    function getDetailAllTransactions(key, value) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: `{{ route('Journal.detailTransactions') }}`,
            data: {
                documentType: key,
                referenceId: checkTransactionId(key, value)
            },
            success: function (response) {
                if (response.status === 200) {
                    $(`#trans_number_preview${currentIndexTransNumber}`).css("background-color", "#e9ecef");
                    $(`#trans_number_preview${currentIndexTransNumber}`).val(response.data.trans_number_preview);
                    $(`#budget_preview${currentIndexTransNumber}`).val(response.data.budget_preview);
                    $(`#trans_value${currentIndexTransNumber}`).val(currency(response.data.trans_value));
                    $(`#unpaid_value${currentIndexTransNumber}`).val(currency(response.data.unpaid_value));

                    updateField(currentIndexTransNumber, 'business_document_id', response.data.business_document_id);
                    updateField(currentIndexTransNumber, 'trans_number_preview', response.data.trans_number_preview);
                    updateField(currentIndexTransNumber, 'trans_number_id', response.data.trans_number_id);
                    updateField(currentIndexTransNumber, 'trans_number_quantity_unit_id', response.data.trans_number_quantity_unit_id);
                    updateField(currentIndexTransNumber, 'trans_number_quantity', response.data.trans_number_quantity);
                    updateField(currentIndexTransNumber, 'trans_number_currency_id', response.data.trans_number_currency_id);
                    updateField(currentIndexTransNumber, 'trans_number_currency_rate', response.data.trans_number_currency_rate);
                    updateField(currentIndexTransNumber, 'budget_preview', response.data.budget_preview);
                    updateField(currentIndexTransNumber, 'budget_id', response.data.budget_id);
                    updateField(currentIndexTransNumber, 'budget_code', response.data.budget_code);
                    updateField(currentIndexTransNumber, 'budget_name', response.data.budget_name);
                    updateField(currentIndexTransNumber, 'trans_value', response.data.trans_value);
                    updateField(currentIndexTransNumber, 'unpaid_value', response.data.unpaid_value);
                } else {

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                HideLoading();
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    }

    $('#journalForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("Journal.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                Utils.hideLoading();

                if (response.status === 200) {
                    $('#journal_summary_title').html(`Successful ! Data has been saved. Your transaction number is <span style="color:#0046FF;">${response.documentJournalNumber}</span>`);

                    if ($.fn.DataTable.isDataTable('#journal_summary_table')) {
                        $('#journal_summary_table').DataTable().clear().destroy();
                    }

                    $('#journal_summary_table').empty();

                    $('#journal_summary_table').DataTable({
                        destroy: true,
                        data: response.documentNumber,
                        deferRender: true,
                        searching: false,
                        scrollCollapse: true,
                        scroller: true,
                        lengthChange: false,
                        columns: [
                            {
                                title: "No",
                                data: null,
                                render: function (data, type, row, meta) {
                                    return (meta.row + 1);
                                }
                            },
                            {
                                title: "Reference Number",
                                data: 'referenceNumber',
                                defaultContent: '-',
                                className: "align-middle"
                            },
                            {
                                title: "Journal Number",
                                data: 'journalNumber',
                                defaultContent: '-',
                                className: "align-middle text-wrap"
                            }
                        ]
                    });

                    $('#journal_summary_table').css("width", "100%");

                    $('#journal_summary_table').on('hidden.bs.modal', function (e) {
                        cancelForm("{{ route('Journal.index', ['var' => 1]) }}");
                    });

                    $("#journal_summary_modal").modal('toggle');

                    $(".preview-modal").show();
                    $(".summary-modal").hide();
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                Utils.hideLoading();
            }
        });
    });

    $('#banks_coa_list_table').on('click', 'tbody tr', function () {
        const table = $('#banks_coa_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const preview = dataRow.sys_Text;
            const code = dataRow.additionalData.code;
            const name = dataRow.additionalData.name;

            $('#bank_coa_preview').val(preview);
            $('#bank_coa_id').val(id);
            $('#bank_coa_code').val(code);
            $('#bank_coa_name').val(name);

            $('#bank_coa_preview').css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#bank_coa_preview", "#bank_coa_message");
        }

        $("#banks_coa_modal").modal('toggle');
    });

    $('#tableAllTransactions').on('click', 'tbody tr', function () {
        if (currentIndexTransNumber === null) return null;

        const table = $('#tableAllTransactions').DataTable();
        const dataRow = table.row(this).data();

        const selectDocumentType = document.getElementById("DocumentType");
        const selectedDocumentTypeText = selectDocumentType.options[selectDocumentType.selectedIndex].text;

        if (dataRow) {
            getDetailAllTransactions(selectedDocumentTypeText, dataRow);
        }

        $('#myAllTransactions').modal('toggle');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', function () {
        if (currentIndexCoa === null) return null;

        const table = $('#tableGetChartOfAccount').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const preview = dataRow.sys_Text;
            const code = dataRow.code;
            const name = dataRow.name;

            $(`#coa_preview${currentIndexCoa}`).css("background-color", "#e9ecef");
            $(`#coa_preview${currentIndexCoa}`).val(preview);

            updateField(currentIndexCoa, 'coa_preview', preview);
            updateField(currentIndexCoa, 'coa_id', id);
            updateField(currentIndexCoa, 'coa_code', code);
            updateField(currentIndexCoa, 'coa_name', name);
        }

        $('#myGetChartOfAccount').modal('toggle');
    });

    $('#tableBanksAccount').on('click', 'tbody tr', function () {
        if (currentIndexFromTo === null) return null;

        const table = $('#tableBanksAccount').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const preview = dataRow.fullBankAccountNumber;
            const code = `${dataRow.bankName} (${dataRow.bankAcronym})`;
            const name = `${dataRow.accountNumber} a.n (${dataRow.accountName})`;

            $(`#from_to_preview${currentIndexFromTo}`).css("background-color", "#e9ecef");
            $(`#from_to_preview${currentIndexFromTo}`).val(preview);

            updateField(currentIndexFromTo, 'from_to_preview', preview);
            updateField(currentIndexFromTo, 'from_to_id', id);
            updateField(currentIndexFromTo, 'from_to_code', code);
            updateField(currentIndexFromTo, 'from_to_name', name);
        }

        $('#myBanksAccount').modal('toggle');
    });

    $(document).ready(function () {
        detailCashBank();
        getBanksWithCoA();
        getBanksAccount('', '');

        $('#nominal_beginning_balance').text(`IDR ${currencyTotal(dummyBeginningBalance)}`);
        $('#nominal_ending_balance').text(`IDR ${currencyTotal(totalEndingBalance)}`);

        $('#journal_summary_modal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });

        $('#journal_date_picker').datetimepicker({
            format: 'L'
        });

        $('#journal_date_picker').on('change.datetimepicker', function (e) {
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