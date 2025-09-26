<script>
    let dataStore           = [];
    let currentIndexPickCOA = null;
    const dataTable         = {!! json_encode($detail ?? []) !!};

    function validateWithHighlight() {
        let isValid                     = true;
        const rows                      = document.querySelectorAll("#tableGetCreditNoteDetails tbody tr");
        const creditNoteDetailsMessage  = document.getElementById("creditNoteDetailsMessage");

        if (creditNoteDetailsMessage) {
            creditNoteDetailsMessage.style.display = "none";
        }

        rows.forEach(row => {
            const cnValueInput  = row.querySelector('input[id^="cn_value"]');
            const cnTaxInput    = row.querySelector('input[id^="cn_tax"]');
            const COAInput      = row.querySelector('input[id^="coa_name"]');

            if (!cnValueInput || !cnTaxInput || !COAInput) return;

            const cnValue       = cnValueInput.value.trim();
            const cnValueDetail = cnValueInput.getAttribute("data-default");

            const cnTax         = cnTaxInput.value.trim();
            const cnTaxDetail   = cnTaxInput.getAttribute("data-default");
            
            const coa         = COAInput.value.trim();
            const coaDetail   = COAInput.getAttribute("data-default");

            const isCNValueFilled   = cnValue !== "";
            const isCNTaxFilled     = cnTax !== "";
            const isCoaFilled       = coa !== "";

            cnValueInput.style.border   = "1px solid #e9ecef";
            cnTaxInput.style.border = "1px solid #e9ecef";
            COAInput.style.border = "1px solid #e9ecef";

            if (
                (isCNValueFilled && isCNTaxFilled && !isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail) || 
                (isCNValueFilled && !isCNTaxFilled && isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail) || 
                (!isCNValueFilled && isCNTaxFilled && isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail) || 
                (isCNValueFilled && !isCNTaxFilled && !isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail) || 
                (!isCNValueFilled && !isCNTaxFilled && isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail) || 
                (!isCNValueFilled && isCNTaxFilled && !isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail) || 
                (!isCNValueFilled && !isCNTaxFilled && !isCoaFilled && cnValueDetail && cnTaxDetail && coaDetail)
            ) {
                if (!isCNValueFilled) {
                    cnValueInput.style.border   = "1px solid red";
                }

                if (!isCNTaxFilled) {
                    cnTaxInput.style.border = "1px solid red";
                }

                if (!isCoaFilled) {
                    COAInput.style.border = "1px solid red";
                }
                
                if (creditNoteDetailsMessage) {
                    creditNoteDetailsMessage.style.display = "block";
                }

                isValid = false;
            }
        });

        return isValid;
    }

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
            const recordRefID                           = row.querySelector('input[id^="record_RefID"]');
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
                const trano     = row.children[1].value.trim();
                const budget    = row.children[8].innerText.trim();
                const subBuget  = row.children[9].innerText.trim();
                const quantity  = row.children[10].innerText.trim();
                const price     = row.children[11].innerText.trim();

                const cnValue   = cnValueInput.value.trim();
                const cnTax     = cnTaxInput.value.trim();
                const coaId     = coaRefID.value.trim();
                const coaName   = coaNameInput.value.trim();

                let found = false;
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordRefID = targetRow.children[0]?.value?.trim();

                    if (targetRecordRefID == recordRefID.value) {
                        targetRow.children[4].innerText = decimalFormat(cnValue);
                        targetRow.children[5].innerText = decimalFormat(cnTax);
                        targetRow.children[6].innerText = coaName;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                                    product_RefID: parseInt(productRefID.value),
                                    quantity: parseFloat(cnValue.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyValue: parseFloat(cnTax.replace(/,/g, '')),
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
                        <input type="hidden" id="record_RefID[]" value="${recordRefID.value}">
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${trano}</td>
                        <td style="text-align: center;padding: 0.8rem 0.5rem;" hidden>${budget}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${subBuget}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(cnValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(cnTax)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${coaName}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: parseInt(recordRefID.value),
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                            product_RefID: parseInt(productRefID.value),
                            quantity: parseFloat(cnValue.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyValue: parseFloat(cnTax.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            chartOfAccount_RefID: parseInt(coaId),
                        }
                    });
                }
            } else {
                const existingRows = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordRefID = targetRow.children[0]?.value?.trim();

                    if (targetRecordRefID == recordRefID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.recordID == recordRefID.value);
                });
            }
        }
    }

    function validationForm() {
        const isTableNotEmpty = checkOneLineBudgetContents();
        const isInputNotEmpty = validateWithHighlight();

        if (isTableNotEmpty && isInputNotEmpty) {
            $('#creditNoteFormModal').modal('show');
            summaryData();
        } else {
            if (!isTableNotEmpty) {
                $("#creditNoteDetailsMessage").show();
                return;
            }
        }
    }

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function getCreditNoteDetails(dataDetail) {
        let tbody = $('#tableGetCreditNoteDetails tbody');
        tbody.empty();

        let tbodyList = $('#tableCreditNoteList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            dataStore.push({
                recordID: parseInt(val2.Sys_ID_Detail),
                entities: {
                    combinedBudgetSectionDetail_RefID: parseInt(val2.CombinedBudgetSectionDetail_RefID),
                    product_RefID: parseInt(val2.Product_RefID),
                    quantity: parseFloat(val2.Quantity.replace(/,/g, '')),
                    quantityUnit_RefID: parseInt(val2.QuantityUnit_RefID),
                    productUnitPriceCurrency_RefID: parseInt(val2.ProductUnitPriceCurrency_RefID),
                    productUnitPriceCurrencyValue: parseFloat(val2.ProductUnitPriceCurrencyValue.replace(/,/g, '')),
                    productUnitPriceCurrencyExchangeRate: parseFloat(val2.ProductUnitPriceCurrencyExchangeRate.replace(/,/g, '')),
                    chartOfAccount_RefID: parseInt(val2.ChartOfAccount_RefID),
                }
            });

            let row = `
                <tr>
                    <input type="hidden" id="record_RefID[]" value="${val2.Sys_ID_Detail}">
                    <input type="hidden" id="trano[]" value="-">
                    <input type="hidden" id="combinedBudgetSectionDetail_RefID[]" value="${val2.CombinedBudgetSectionDetail_RefID}">
                    <input type="hidden" id="product_RefID[]" value="${val2.Product_RefID}">
                    <input type="hidden" id="quantityUnit_RefID[]" value="${val2.QuantityUnit_RefID}">
                    <input type="hidden" id="productUnitPriceCurrency_RefID[]" value="${val2.ProductUnitPriceCurrency_RefID}">
                    <input type="hidden" id="productUnitPriceCurrencyExchangeRate[]" value="${val2.ProductUnitPriceCurrencyExchangeRate}">

                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">${val2.CombinedBudgetCode} - ${val2.CombinedBudgetName}</td>
                    <td style="text-align: center;">${val2.CombinedBudgetSectionCode} - ${val2.CombinedBudgetSectionName}</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td>
                        <input class="form-control number-without-negative" id="cn_value${key}" autocomplete="off" data-default="${decimalFormat(parseFloat(val2.Quantity))}" value="${decimalFormat(parseFloat(val2.Quantity))}" style="border-radius:0px;" />
                    </td>
                    <td>
                        <input class="form-control number-without-negative" id="cn_tax${key}" autocomplete="off" data-default="${decimalFormat(parseFloat(val2.ProductUnitPriceCurrencyValue))}" value="${decimalFormat(parseFloat(val2.ProductUnitPriceCurrencyValue))}" style="border-radius:0px;" />
                    </td>
                    <td>
                        <div class="input-group">
                            <input id="coa_id${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" value="${val2.ChartOfAccount_RefID}" hidden />
                            <input id="coa_name${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" data-default="${val2.COA_Code} - ${val2.COA_Name}" value="${val2.COA_Code} - ${val2.COA_Name}" readonly />
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                    <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${key})">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#cn_value${key}`).on('keyup', function() {
                checkOneLineBudgetContents(key);
            });

            $(`#cn_tax${key}`).on('keyup', function() {
                checkOneLineBudgetContents(key);
            });

            let rowList = `
                <tr>
                    <input type="hidden" id="record_RefID[]" value="${val2.Sys_ID_Detail}">
                    <td style="text-align: left;padding: 0.8rem 0.5rem;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0.5rem;" hidden>${val2.CombinedBudgetCode} - ${val2.CombinedBudgetName}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${val2.CombinedBudgetSectionCode} - ${val2.CombinedBudgetSectionName}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(parseFloat(val2.Quantity))}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(parseFloat(val2.ProductUnitPriceCurrencyValue))}</td>
                    <td style="text-align: right;padding: 0.8rem 0.5rem;">${val2.COA_Code} - ${val2.COA_Name}</td>
                </tr>
            `;

            tbodyList.append(rowList);
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
                RevisionCreditNote({...formatData, comment: result.value});
            }
        });
    }

    function RevisionCreditNote(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("CreditNote.UpdateCreditNote") }}',
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

    function SubmitForm() {
        $('#creditNoteFormModal').modal('hide');

        let action = $('#FormRevisionCreditNote').attr("action");
        let method = $('#FormRevisionCreditNote').attr("method");
        let form_data = new FormData($('#FormRevisionCreditNote')[0]);
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

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        if (currentIndexPickCOA === null) return;
        
        var sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        var code  = $(this).find('td:nth-child(2)').text();
        var name  = $(this).find('td:nth-child(3)').text();
        
        checkOneLineBudgetContents(currentIndexPickCOA);
        
        $(`#coa_id${currentIndexPickCOA}`).val(sysId);
        $(`#coa_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
        
        $('#myGetChartOfAccount').modal('hide');
    });

    $(window).one('load', function(e) {
        getDocumentType("Credit Note Revision Form");
        getCreditNoteDetails(dataTable);
    });
</script>