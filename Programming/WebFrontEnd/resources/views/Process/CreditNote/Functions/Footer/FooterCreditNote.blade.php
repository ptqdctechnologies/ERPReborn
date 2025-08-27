<script>
    let dataDummy               = [];
    let dataStore               = [];
    let indexCreditNoteDetails  = 0;
    let currentIndexPickCOA     = null;
    const invoiceID             = document.getElementById("invoice_id");

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#tableGetCreditNoteDetails tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const value = document.getElementById(`cn_value${index}`)?.value.trim();
            const tax   = document.getElementById(`cn_tax${index}`)?.value.trim();
            const coa   = document.getElementById(`coa_name${index}`)?.value.trim();

            if (value !== "" && tax !== "" && coa !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const valueEl   = document.getElementById(`cn_value${index}`);
            const taxEl     = document.getElementById(`cn_tax${index}`);
            const coaEl     = document.getElementById(`coa_name${index}`);

            if (hasFullRow) {
                $(valueEl).css("border", "1px solid #ced4da");
                $(taxEl).css("border", "1px solid #ced4da");
                $(coaEl).css("border", "1px solid #ced4da");
                $("#creditNoteDetailsMessage").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (valueEl.value.trim() != "" || taxEl.value.trim() != "") {
                            $(valueEl).css("border", "1px solid red");
                            $(taxEl).css("border", "1px solid red");
                            $(coaEl).css("border", "1px solid red");
                            $("#creditNoteDetailsMessage").show();
                        } else {
                            $(valueEl).css("border", "1px solid #ced4da");
                            $(taxEl).css("border", "1px solid #ced4da");
                            $(coaEl).css("border", "1px solid #ced4da");
                            $("#creditNoteDetailsMessage").hide();
                        }
                    }

                    if (indexInput != index && (valueEl.value.trim() == "" && taxEl.value.trim() == "")) {
                        $(valueEl).css("border", "1px solid #ced4da");
                        $(taxEl).css("border", "1px solid #ced4da");
                        $(coaEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(valueEl).css("border", "1px solid red");
                    $(taxEl).css("border", "1px solid red");
                    $(coaEl).css("border", "1px solid red");
                    $("#creditNoteDetailsMessage").show();
                }
            }
        });

        return hasFullRow;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tableGetCreditNoteDetails').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableCreditNoteList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const combinedBudgetSectionDetailRefID      = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const productRefID                          = row.querySelector('input[id^="product_RefID"]');
            const quantityUnitRefID                     = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID         = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');
            const cnValueInput                          = row.querySelector('input[id^="cn_value"]');
            const cnTaxInput                            = row.querySelector('input[id^="cn_tax"]');
            const coaRefID                              = row.querySelector('input[id^="coa_id"]');
            const coaNameInput                          = row.querySelector('input[id^="coa_name"]');

            if (
                cnValueInput && cnTaxInput && coaNameInput && 
                cnValueInput.value.trim() !== '' &&
                cnTaxInput.value.trim() !== '' &&
                coaNameInput.value.trim() !== ''
            ) {
                const trano     = row.children[0].value.trim();
                const budget    = row.children[7].innerText.trim();
                const subBuget  = row.children[8].innerText.trim();
                const quantity  = row.children[9].innerText.trim();
                const price     = row.children[10].innerText.trim();

                const cnValue   = cnValueInput.value.trim();
                const cnTax     = cnTaxInput.value.trim();
                const coaId     = coaRefID.value.trim();
                const coaName   = coaNameInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCombinedBudgetSectionDetailRefID = targetRow.children[0]?.value?.trim();

                    if (targetCombinedBudgetSectionDetailRefID == combinedBudgetSectionDetailRefID.value) {
                        targetRow.children[4].innerText = decimalFormat(cnValue);
                        targetRow.children[5].innerText = decimalFormat(cnTax);
                        targetRow.children[6].innerText = coaName;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(quantity.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                                    productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                                    chartOfAccount_RefID: parseInt(coaId),
                                }
                            }
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="combinedBudgetSectionDetail_RefID[]" value="${combinedBudgetSectionDetailRefID.value}">
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${trano}</td>
                        <td style="text-align: center;padding: 0.8rem 0.5rem;" hidden>${budget}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${subBuget}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(cnValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(cnTax)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${coaName}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                            product_RefID: parseInt(productRefID.value),
                            quantity: parseFloat(quantity.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            chartOfAccount_RefID: parseInt(coaId),
                        }
                    });
                }
            } else {
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetCombinedBudgetSectionDetailRefID = targetRow.children[0]?.value?.trim();

                    if (targetCombinedBudgetSectionDetailRefID == combinedBudgetSectionDetailRefID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.entities.combinedBudgetSectionDetail_RefID == combinedBudgetSectionDetailRefID.value);
                });
            }
        }
    }

    function validationForm() {
        const isInvoiceIDNotEmpty = invoiceID.value.trim() !== '';
        const isTableNotEmpty     = checkOneLineBudgetContents();

        if (isInvoiceIDNotEmpty && isTableNotEmpty) {
            $('#creditNoteFormModal').modal('show');
            summaryData();
        } else {
            if (!isInvoiceIDNotEmpty) {
                $("#invoice_number").css("border", "1px solid red");
                $("#invoiceMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#creditNoteDetailsMessage").show();
                return;
            }
        }
    }

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function getInvoiceDetails(invoiceID, trano) {
        if (trano === "INV/QDC/2025/000001") {
            dataDummy.push(
                {
                    balanced: 2000,
                    combinedBudgetSectionDetail_RefID: 169000000000041,
                    product_RefID: 88000000001364,
                    quantity: 10,
                    budgetCode: "Q000062",
                    budgetName: "XL Microcell 2007",
                    subBudgetCode: "240",
                    subBudgetName: "Cendana Andalas",
                    quantityUnit_RefID: 73000000000001,
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: 3000,
                    productUnitPriceCurrencyExchangeRate: 1,
                },
                {
                    balanced: 1300,
                    combinedBudgetSectionDetail_RefID: 169000000000048,
                    product_RefID: 88000000001357,
                    quantity: 5,
                    budgetCode: "Q000062",
                    budgetName: "XL Microcell 2007",
                    subBudgetCode: "240",
                    subBudgetName: "Cendana Andalas",
                    quantityUnit_RefID: 73000000000001,
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: 1500,
                    productUnitPriceCurrencyExchangeRate: 1,
                },
                {
                    balanced: 900,
                    combinedBudgetSectionDetail_RefID: 169000000000040,
                    product_RefID: 88000000001361,
                    quantity: 5,
                    budgetCode: "Q000062",
                    budgetName: "XL Microcell 2007",
                    subBudgetCode: "240",
                    subBudgetName: "Cendana Andalas",
                    quantityUnit_RefID: 73000000000001,
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: 1500,
                    productUnitPriceCurrencyExchangeRate: 1,
                }
            );
        } else {
            dataDummy.push(
                {
                    balanced: 5798,
                    combinedBudgetSectionDetail_RefID: 169000000000050,
                    product_RefID: 88000000001372,
                    quantity: 34,
                    budgetCode: "Q000062",
                    budgetName: "XL Microcell 2007",
                    subBudgetCode: "221",
                    subBudgetName: "Halat Medan",
                    quantityUnit_RefID: 73000000000001,
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: 8542,
                    productUnitPriceCurrencyExchangeRate: 1,
                },
                {
                    balanced: 89367,
                    combinedBudgetSectionDetail_RefID: 169000000000035,
                    product_RefID: 88000000000391,
                    quantity: 29,
                    budgetCode: "Q000062",
                    budgetName: "XL Microcell 2007",
                    subBudgetCode: "221",
                    subBudgetName: "Halat Medan",
                    quantityUnit_RefID: 73000000000001,
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: 94851,
                    productUnitPriceCurrencyExchangeRate: 1,
                },
                {
                    balanced: 16893,
                    combinedBudgetSectionDetail_RefID: 169000000000032,
                    product_RefID: 88000000000836,
                    quantity: 17,
                    budgetCode: "Q000062",
                    budgetName: "XL Microcell 2007",
                    subBudgetCode: "221",
                    subBudgetName: "Halat Medan",
                    quantityUnit_RefID: 73000000000001,
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: 18485,
                    productUnitPriceCurrencyExchangeRate: 1,
                }
            );
        }

        let tbody = $('#tableGetCreditNoteDetails tbody');

        let modifyColumn = `<td rowspan="${dataDummy.length}" style="text-align: center; padding: 10px !important;">${trano}</td>`;

        $.each(dataDummy, function(key, val2) {
            let total = val2.quantity * val2.productUnitPriceCurrencyValue;
            let row = `
                <tr>
                    <input type="hidden" id="trano[]" value="${trano}">
                    <input type="hidden" id="combinedBudgetSectionDetail_RefID[]" value="${val2.combinedBudgetSectionDetail_RefID}">
                    <input type="hidden" id="product_RefID[]" value="${val2.product_RefID}">
                    <input type="hidden" id="quantityUnit_RefID[]" value="${val2.quantityUnit_RefID}">
                    <input type="hidden" id="productUnitPriceCurrency_RefID[]" value="${val2.productUnitPriceCurrency_RefID}">
                    <input type="hidden" id="productUnitPriceCurrencyExchangeRate[]" value="${val2.productUnitPriceCurrencyExchangeRate}">

                    ${key === 0 ? modifyColumn : `<td style="text-align: center; padding: 10px !important;" hidden>${trano}</td>`}
                    <td style="text-align: center;">${val2.budgetCode} - ${val2.budgetName}</td>
                    <td style="text-align: center;">${val2.subBudgetCode} - ${val2.subBudgetName}</td>
                    <td style="text-align: center;">${decimalFormat(val2.quantity)}</td>
                    <td style="text-align: center;">${decimalFormat(val2.productUnitPriceCurrencyValue)}</td>
                    <td style="text-align: center;">${decimalFormat(total)}</td>
                    <td style="text-align: center;">${decimalFormat(val2.balanced)}</td>
                    <td>
                        <input class="form-control number-without-negative" id="cn_value${indexCreditNoteDetails}" data-index=${indexCreditNoteDetails} autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td>
                        <input class="form-control number-without-negative" id="cn_tax${indexCreditNoteDetails}" data-index=${indexCreditNoteDetails} autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="coa_id${indexCreditNoteDetails}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                            <input id="coa_name${indexCreditNoteDetails}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly />
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                    <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${indexCreditNoteDetails})">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#cn_value${indexCreditNoteDetails}`).on('keyup', function() {
                checkOneLineBudgetContents(indexCreditNoteDetails);
            });

            $(`#cn_tax${indexCreditNoteDetails}`).on('keyup', function() {
                checkOneLineBudgetContents(indexCreditNoteDetails);
            });

            indexCreditNoteDetails += 1;
            dataDummy = [];
        });
    }

    function SelectWorkFlow(formatData) {
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
                CreditNoteStore({...formatData, comment: result.value});
            }
        });
    }

    function CreditNoteStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("CreditNote.store") }}',
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
                        window.location.href = "{{ route('CreditNote.index', ['var' => 1]) }}";
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

    function cancelCreditNote() {
        ShowLoading();
        window.location.href = "{{ route('CreditNote.index', ['var' => 1]) }}";
    }

    function SubmitForm() {
        $('#creditNoteFormModal').modal('hide');

        let action = $('#FormSubmitCreditNote').attr("action");
        let method = $('#FormSubmitCreditNote').attr("method");
        let form_data = new FormData($('#FormSubmitCreditNote')[0]);
        form_data.append('creditNoteDetail', JSON.stringify(dataStore));

        ShowLoading();

        $.ajax({
            url: action,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: method,
            success: function(response) {
                HideLoading();
                
                if (response.message == "WorkflowError") {
                    CancelNotif("You don't have access", "{{ route('CreditNote.index', ['var' => 1]) }}");
                } else if (response.message == "MoreThanOne") {
                    $('#getWorkFlow').modal('toggle');

                    let t = $('#tableGetWorkFlow').DataTable();
                    t.clear();
                    $.each(response.data, function(key, val) {
                        t.row.add([
                            '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                            '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                        ]).draw();
                    });
                } else {
                    const formatData = {
                        workFlowPath_RefID: response.workFlowPath_RefID, 
                        nextApprover: response.nextApprover_RefID, 
                        approverEntity: response.approverEntity_RefID, 
                        documentTypeID: response.documentTypeID,
                        storeData: response.storeData
                    };

                    SelectWorkFlow(formatData);
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                CancelNotif("You don't have access", "{{ route('CreditNote.index', ['var' => 1]) }}");
            }
        });
    }

    $('#tableCreditNote').on('click', 'tbody tr', async function() {
        var sysId = $(this).find('input[data-trigger="sys_id_modal_cn"]').val();
        var trano  = $(this).find('td:nth-child(2)').text();

        $('#creditNote_RefID').val(sysId);
        $('#creditNoteNumber').val(trano);
        
        $('#myCreditNote').modal('hide');
    });

    $('#tableGetInvoice').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_modal_invoice"]').val();
        var trano = $(this).find('td:nth-child(2)').text();
        
        $("#invoice_number").css("border", "1px solid #ced4da");

        $("#invoice_id").val(sysId);
        $("#invoice_number").val(trano);
        $('#myInvoice').modal('hide');
        $("#invoiceMessage").hide();

        getInvoiceDetails(sysId, trano);
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        if (currentIndexPickCOA === null) return;
        
        var sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        var code  = $(this).find('td:nth-child(2)').text();
        var name  = $(this).find('td:nth-child(3)').text();
        
        checkOneLineBudgetContents(indexCreditNoteDetails);
        
        $(`#coa_id${currentIndexPickCOA}`).val(sysId);
        $(`#coa_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
        
        $('#myGetChartOfAccount').modal('hide');
    });

    $(window).one('load', function(e) {
        getDocumentType("Credit Note Form");
    });
</script>