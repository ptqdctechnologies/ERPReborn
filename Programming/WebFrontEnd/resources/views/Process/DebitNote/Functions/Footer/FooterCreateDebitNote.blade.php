<script>
    let dataStore               = [];
    let indexDebitNoteDetails   = 0;
    const referenceNumberID     = document.getElementById("debit_note_reference_number");

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
            const businessDocumentNumber                = row.querySelector('input[id^="business_document_number"]');
            const combinedBudgetSectionDetailID         = row.querySelector('input[id^="combined_budget_section_detail_id"]');
            const productID                             = row.querySelector('input[id^="product_id"]');
            const quantityUnitID                        = row.querySelector('input[id^="quantity_unit_id"]');
            const productUnitPriceCurrencyID            = row.querySelector('input[id^="product_unit_price_currency_id"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="product_unit_price_currency_exchange_rate"]');
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
                    const targetCombinedBudgetSectionDetailID = targetRow.children[5]?.value?.trim();

                    if (targetCombinedBudgetSectionDetailID == combinedBudgetSectionDetailID.value) {
                        targetRow.children[2].innerText = decimalFormat(debitNoteValue);
                        targetRow.children[3].innerText = decimalFormat(debitNoteTax);
                        targetRow.children[4].innerText = debitNoteCoa;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailID.value),
                                    product_RefID: parseInt(productID.value),
                                    quantity: parseFloat(quantity.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                                    vatRatio: 0,
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
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(debitNoteValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(debitNoteTax)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${debitNoteCoa}</td>

                        <input type="hidden" id="target_combined_budget_section_detail_id[]" value="${combinedBudgetSectionDetailID.value}">
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailID.value),
                            product_RefID: parseInt(productID.value),
                            quantity: parseFloat(quantity.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyID.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            vatRatio: 0,
                            chartOfAccount_RefID: parseInt(debitNoteCoaID.value),
                        }
                    });
                }
            } else {
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCombinedBudgetSectionDetailID = targetRow.children[5]?.value?.trim();

                    if (targetCombinedBudgetSectionDetailID == combinedBudgetSectionDetailID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailID.value);
                });
            }
        }

        updateGrandTotal();
    }

    function validationForm() {
        const isReferenceNumberIDNotEmpty   = referenceNumberID.value.trim() !== '';
        const isTableNotEmpty               = checkOneLineBudgetContents();

        if (isReferenceNumberIDNotEmpty && isTableNotEmpty) {
            $('#debit_note_submit_modal').modal('show');
            summaryData();
        } else {
            if (!isReferenceNumberIDNotEmpty) {
                $("#debit_note_reference_number").css("border", "1px solid red");
                $("#debit_note_reference_message").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#debit_note_details_message").show();
                return;
            }
        }
    }

    function getReferenceNumberDetails(refNumberID, refNumber) {
        $("#debit_note_loading_table").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("Reimbursement.GetReimbursementDetail") !!}?reimbursement_id=' + refNumberID,
            success: function(data) {
                $('#var_combinedBudget_RefID').val(data[0].CombinedBudget_RefID);
                
                $('#debit_note_reference_id').val(refNumberID);
                $('#debit_note_reference_number').val(refNumber);
                
                $("#debit_note_reference_number").css("border", "1px solid #ced4da");
                $("#debit_note_reference_message").hide();

                $("#debit_note_loading_table").hide();

                $('#debit_note_partner_id').val(data[0].Requester_RefID);
                $('#debit_note_partner_number').val(`${data[0].RequesterCode} - ${data[0].RequesterName}`);

                let debitNoteDetailsTable = $('#debit_note_details_table tbody');

                let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${refNumber}</td>`;
                
                $.each(data, function(key, value) {
                    let total = value.Quantity * value.ProductUnitPriceCurrencyValue;
                    let row = `
                        <tr>
                            ${key === 0 ? modifyColumn : `<td style="text-align: center; padding: 10px !important;" hidden>${refNumber}</td>`}
                            <td style="text-align: center; padding: 10px !important;">${value.CombinedBudgetCode + ' - ' + value.CombinedBudgetName}</td>
                            <td style="text-align: center; padding: 10px !important;">${currencyTotal(value.Quantity)}</td>
                            <td style="text-align: center; padding: 10px !important;">${currencyTotal(value.ProductUnitPriceCurrencyValue)}</td>
                            <td style="text-align: center; padding: 10px !important;">${currencyTotal(total)}</td>
                            <td style="text-align: center; padding: 10px !important;">-</td>
                            <td style="text-align: center; width: 100px;">
                                <input class="form-control number-without-negative" id="debit_note_value${indexDebitNoteDetails}" data-index=${indexDebitNoteDetails} autocomplete="off" style="border-radius:0px;" />
                            </td>
                            <td style="text-align: center; width: 100px;">
                                <input class="form-control number-without-negative" id="debit_note_tax${indexDebitNoteDetails}" data-index=${indexDebitNoteDetails} autocomplete="off" style="border-radius:0px;" />
                            </td>
                            <td>
                                <div class="input-group">
                                    <input id="debit_note_coa_id${indexDebitNoteDetails}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="debit_note_coa_name${indexDebitNoteDetails}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${indexDebitNoteDetails})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${indexDebitNoteDetails}">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <input type="hidden" id="business_document_number[]" value="${value.BusinessDocumentNumber}">
                            <input type="hidden" id="combined_budget_section_detail_id[]" value="${value.CombinedBudgetSectionDetail_RefID}">
                            <input type="hidden" id="product_id[]" value="${value.Product_RefID}">
                            <input type="hidden" id="quantity_unit_id[]" value="${value.QuantityUnit_RefID}">
                            <input type="hidden" id="product_unit_price_currency_id[]" value="${value.ProductUnitPriceCurrency_RefID}">
                            <input type="hidden" id="product_unit_price_currency_exchange_rate[]" value="${value.ProductUnitPriceCurrencyExchangeRate}">
                        </tr>
                    `;

                    debitNoteDetailsTable.append(row);

                    $(`#debit_note_value${indexDebitNoteDetails}`).on('keyup', function() {
                        let debit_note_value = $(this).val().replace(/,/g, '');
                        let data_index = $(this).data('index');

                        if (debit_note_value > total) {
                            $(this).val('');
                            ErrorNotif("DN Value is over!");
                        }

                        calculateTotal();
                        checkOneLineBudgetContents(data_index);
                    });

                    $(`#debit_note_tax${indexDebitNoteDetails}`).on('keyup', function() {
                        let debit_note_tax = $(this).val().replace(/,/g, '');
                        let data_index = $(this).data('index');

                        if (debit_note_tax > total) {
                            $(this).val('');
                            ErrorNotif("DN Tax is over!");
                        }

                        calculateTotal();
                        checkOneLineBudgetContents(data_index);
                    });

                    $(`#debit_note_coa_name${indexDebitNoteDetails}`).on('change', function() {
                        let data_index = $(this).data('index');

                        checkOneLineBudgetContents(data_index);
                    });

                    indexDebitNoteDetails += 1;
                });

                $("#debit_note_reference_trigger").prop('disabled', true);
                $("#debit_note_reference_trigger").css({"cursor":"not-allowed"});
            },
            error: function (textStatus, errorThrown) {
                console.log('textStatus', textStatus);
                console.log('errorThrown', errorThrown);

                $("#debit_note_loading_table").hide();
                $('#debit_note_details_table tbody').empty();
            }
        });
    }

    function debitNoteStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("DebitNote.store") }}',
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
                debitNoteStore({...formatData, comment: result.value});
            }
        });
    }

    $('#tableGetModalReimbursementAccountPayable').on('click', 'tbody tr', async function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_modal_reference"]').val();
        let trano   = $(this).find('td:nth-child(2)').text();

        getReferenceNumberDetails(sysId, trano);

        $('#myGetModalReimbursementAccountPayable').modal('hide');
    });
</script>