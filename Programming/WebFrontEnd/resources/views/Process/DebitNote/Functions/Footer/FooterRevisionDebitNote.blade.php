<script>
    let dataStore   = [];
    const dataTable = {!! json_encode($detail ?? []) !!};

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#debit_note_list_table_modal tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[2];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('debit_note_list_total_modal').innerText = `Total: ${decimalFormat(parseFloat(total))}`;
    }

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="debit_note_value"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('debit_note_details_total').textContent = `Total: ${decimalFormat(parseFloat(total))}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('debit_note_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('debit_note_list_table_modal').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordID                              = row.querySelector('input[id^="record_id"]');
            const combinedBudgetSectionDetailID         = row.querySelector('input[id^="combined_budget_section_detail_id"]');
            const productID                             = row.querySelector('input[id^="product_id"]');
            const quantityUnitID                        = row.querySelector('input[id^="quantity_unit_id"]');
            const productUnitPriceCurrencyID            = row.querySelector('input[id^="product_unit_price_currency_id"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="product_unit_price_currency_exchange_rate"]');
            const vatRatio                              = row.querySelector('input[id^="vat_ratio"]');
            const debitNoteValueInput                   = row.querySelector('input[id^="debit_note_value"]');
            const debitNoteTaxInput                     = row.querySelector('input[id^="debit_note_tax"]');
            const debitNoteCoaID                        = row.querySelector('input[id^="debit_note_coa_id"]');
            const debitNoteCoaNameInput                 = row.querySelector('input[id^="debit_note_coa_name"]');

            if (
                debitNoteValueInput && debitNoteTaxInput && debitNoteCoaNameInput &&
                debitNoteValueInput.value.trim() !== '' &&
                debitNoteTaxInput.value.trim() !== '' &&
                debitNoteCoaNameInput.value.trim() !== ''
            ) {
                const trano     = row.children[0].innerText.trim();
                const budget    = row.children[1].innerText.trim();
                const quantity  = row.children[2].innerText.trim();
                const price     = row.children[3].innerText.trim();

                const debitNoteValue   = debitNoteValueInput.value.trim();
                const debitNoteTax     = debitNoteTaxInput.value.trim();
                const debitNoteCoa     = debitNoteCoaNameInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordID = targetRow.children[5]?.value?.trim();

                    if (targetRecordID == recordID.value) {
                        targetRow.children[2].innerText = decimalFormat(debitNoteValue);
                        targetRow.children[3].innerText = decimalFormat(debitNoteTax);
                        targetRow.children[4].innerText = debitNoteCoa;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordID.value),
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailID.value),
                                    product_RefID: parseInt(productID.value),
                                    quantity: parseFloat(quantity.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                                    vatRatio: parseFloat(vatRatio.value.replace(/,/g, '')),
                                    chartOfAccount_RefID: parseInt(debitNoteCoaID.value),
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${trano}</td>
                        <td style="text-align: center;padding: 0.8rem 0.5rem;" hidden>${budget}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(parseFloat(debitNoteValue))}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(parseFloat(debitNoteTax))}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${debitNoteCoa}</td>

                        <input type="hidden" id="target_record_id[]" value="${recordID.value}">
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: null,
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailID.value),
                            product_RefID: parseInt(productID.value),
                            quantity: parseFloat(quantity.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyID.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            vatRatio: parseFloat(vatRatio.value.replace(/,/g, '')),
                            chartOfAccount_RefID: parseInt(debitNoteCoaID.value),
                        }
                    });
                }
            } else {
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordID = targetRow.children[5]?.value?.trim();

                    if (targetRecordID == recordID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.recordID == recordID.value);
                });
            }
        }

        updateGrandTotal();
    }

    function validationForm() {
        const isTableNotEmpty = checkOneLineBudgetContents();

        if (isTableNotEmpty) {
            $('#debit_note_submit_modal').modal('show');
            summaryData();
        } else {
            $("#debit_note_details_message").show();
        }
    }

    function getDebitNoteDetails(dataDetail) {
        $('#var_combinedBudget_RefID').val(dataDetail[0].CombinedBudget_RefID);

        let debitNoteDetailsTable = $('#debit_note_details_table tbody');
        debitNoteDetailsTable.empty();

        let debitNoteListTable = $('#debit_note_list_table_modal tbody');
        debitNoteListTable.empty();

        $.each(dataDetail, function(key, value) {
            dataStore.push({
                recordID: parseInt(value.Sys_ID_Detail),
                entities: {
                    combinedBudgetSectionDetail_RefID: parseInt(value.CombinedBudgetSectionDetail_RefID),
                    product_RefID: parseInt(value.Product_RefID),
                    quantity: parseFloat(value.Quantity.replace(/,/g, '')),
                    quantityUnit_RefID: parseInt(value.QuantityUnit_RefID),
                    productUnitPriceCurrency_RefID: parseInt(value.ProductUnitPriceCurrency_RefID),
                    productUnitPriceCurrencyValue: parseFloat(value.ProductUnitPriceCurrencyValue.replace(/,/g, '')),
                    productUnitPriceCurrencyExchangeRate: parseFloat(value.PriceFinalCurrencyExchangeRate.replace(/,/g, '')),
                    vatRatio: parseFloat(value.VatRatio.replace(/,/g, '')),
                    chartOfAccount_RefID: parseInt(value.ChartOfAccount_RefID),
                }
            });

            let row = `
                <tr>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">${value.CombinedBudgetCode} - ${value.CombinedBudgetName}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(value.Quantity))}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(value.ProductUnitPriceCurrencyValue))}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(value.Total))}</td>
                    <td style="text-align: center;">-</td>
                    <td>
                        <input class="form-control number-without-negative" id="debit_note_value${key}" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td>
                        <input class="form-control number-without-negative" id="debit_note_tax${key}" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="debit_note_coa_id${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${value.ChartOfAccount_RefID}" />
                            <input id="debit_note_coa_name${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${value.COA_Code} - ${value.COA_Name}" />
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                    <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${key})">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${key}">
                                    </a>
                                </span>
                            </div>
                        </div>
                    </td>

                    <input type="hidden" id="record_id[]" value="${value.Sys_ID_Detail}">
                    <input type="hidden" id="combined_budget_section_detail_id[]" value="${value.CombinedBudgetSectionDetail_RefID}">
                    <input type="hidden" id="product_id[]" value="${value.Product_RefID}">
                    <input type="hidden" id="quantity_unit_id[]" value="${value.QuantityUnit_RefID}">
                    <input type="hidden" id="product_unit_price_currency_id[]" value="${value.ProductUnitPriceCurrency_RefID}">
                    <input type="hidden" id="product_unit_price_currency_exchange_rate[]" value="${value.ProductUnitPriceCurrencyExchangeRate}">
                    <input type="hidden" id="vat_ratio[]" value="${value.VatRatio}">
                </tr>
            `;

            debitNoteDetailsTable.append(row);

            $(`#debit_note_value${key}`).on('keyup', function() {
                calculateTotal();
                checkOneLineBudgetContents(key);
            });

            $(`#debit_note_tax${key}`).on('keyup', function() {
                calculateTotal();
                checkOneLineBudgetContents(key);
            });

            $(`#debit_note_coa_name${key}`).on('change', function() {
                checkOneLineBudgetContents(key);
            });

            let rowList = `
                <tr>
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0.5rem;" hidden>${value.CombinedBudgetCode} - ${value.CombinedBudgetName}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(parseFloat(value.Quantity))}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(parseFloat(value.ProductUnitPriceCurrencyValue))}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${value.COA_Code} - ${value.COA_Name}</td>

                    <input type="hidden" id="target_record_id[]" value="${value.Sys_ID_Detail}">
                </tr>
            `;

            debitNoteListTable.append(rowList);
        });

        calculateTotal();
        updateGrandTotal();
    }

    function revisionDebitNote(id, formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: `/DebitNote/${id}`,
            data: {
                ...formatData,
                _method: 'PUT'
            },
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
                        cancelForm("{{ route('DebitNote.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function selectWorkFlow(formatData) {
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
                ShowLoading();
                revisionDebitNote("UpdateDebitNote", {...formatData, comment: result.value});
            }
        });
    }

    $(window).one('load', function(e) {
        getDebitNoteDetails(dataTable);
    });
</script>