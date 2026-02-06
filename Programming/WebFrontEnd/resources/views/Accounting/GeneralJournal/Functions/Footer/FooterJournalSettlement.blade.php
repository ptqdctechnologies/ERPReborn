<script>
    let journalSettlementDetails = [];
    let currentIndexPickProduct = 0;
    let totalAdvanceSettlement = 0.00;
    let totalDebitCreditSettlement = 0.00;
    let valueCombinedBudgetCode = '';
    let valueCombinedBudgetName = '';
    let valueCombinedBudgetSectionCode = '';
    let valueCombinedBudgetSectionName = '';
    const documentType = document.getElementById('DocumentType');

    function pickProduct(index) {
        currentIndexPickProduct = index;
    }

    function addRow() {
        const tbody = document.getElementById("journal_settlement_body_table");

        const createRow = (isShow) => ({
            combinedBudgetCode: valueCombinedBudgetCode,
            combinedBudgetName: valueCombinedBudgetName,
            combinedBudgetSectionCode: valueCombinedBudgetSectionCode,
            combinedBudgetSectionName: valueCombinedBudgetSectionName,
            productCode: '',
            productName: '',
            coa_id: '',
            coa_name: '',
            debit_credit: '',
            isShow
        });

        journalSettlementDetails.push(createRow(false));
        journalSettlementDetails.push(createRow(false));

        renderTableJournalSettlement();
    }

    function updateField(index, field, value) {
        journalSettlementDetails[index][field] = value;
    }

    function removeRow(index) {
        journalSettlementDetails.splice(index, 2);
        renderTableJournalSettlement();
    }

    function calculateTotalSettlement() {
        let total = 0.00;
        const rows = document.querySelectorAll('#journal_settlement_table tbody tr');

        rows.forEach(row => {
            const input = row.lastElementChild?.querySelector('input');
            const value = parseFloat(input?.value?.replace(/,/g, '')) || 0;
            total += value;
        });

        totalDebitCreditSettlement = total;
        const countBalance = totalAdvanceSettlement - total;
        
        document.getElementById('total_balance').innerText =
            countBalance.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        document.getElementById('total_settlement_table').innerText =
            total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
    }

    function onKeyUpDebitCredit(index) {
        let hasShownError = false;
        const input = document.getElementById(`debit_credit${index}`);
        if (!input) return;

        const currentValue = parseFloat(input.value.replace(/,/g, '')) || 0;

        calculateTotalSettlement();

        if (
            currentValue > totalAdvanceSettlement ||
            totalDebitCreditSettlement > totalAdvanceSettlement
        ) {
            input.value = '';
            calculateTotalSettlement();

            if (!hasShownError) {
                ErrorNotif("Value is over !");
                hasShownError = true;
            }
            return;
        }

        hasShownError = false;
        updateField(index, 'debit_credit', input.value.replace(/,/g, ''));
    }

    function renderTableJournalSettlement() {
        const tbody = document.getElementById("journal_settlement_body_table");
        tbody.innerHTML = "";

        journalSettlementDetails.forEach((row, index) => {
            const tr = document.createElement("tr");
            const tr2 = document.createElement("tr");
            if (index === journalSettlementDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === journalSettlementDetails.length - 1 ? 'flex' : 'none !important'};"
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
                `;
            } else {
                if (index % 2 === 0) {
                    if (row.isShow === true) {
                        tr.innerHTML = `
                            <td rowspan="2" style="text-align: center; padding-left: 4px !important;">
                                <div class="d-flex justify-content-center">
                                    <!-- ICON MINUS -->
                                    <div class="icon-minus d-flex align-items-center justify-content-center" 
                                        style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:flex;"
                                        onclick="removeRow(${index})">
                                        <i class="fas fa-minus" style="color:#fff;"></i>
                                    </div>
                                </div>
                            </td>
                            <td rowspan="2" style="text-align: center;">
                                ${row.combinedBudgetCode} - ${row.combinedBudgetName}
                            </td>
                            <td rowspan="2" style="text-align: center;">
                                ${row.combinedBudgetSectionCode} - ${row.combinedBudgetSectionName}
                            </td>
                            <td rowspan="2" style="text-align: center;">
                                ${row.productCode} - ${row.productName}
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="coa_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="coa_name${index}" value="${row.coa_name}" style="border-radius:0;width:130px;background-color:${row.coa_name ? '#e9ecef' : '#fff'};" class="form-control" readonly />
                                </div>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <select class="form-control" id="accountingEntryRecordType_RefID${index}" onchange="updateField(${index}, 'accountingEntryRecordType_RefID', this.value)">
                                    <option value="" disabled selected>Select a ...</option>
                                    <option value="214000000000001" ${row.accountingEntryRecordType_RefID == '214000000000001' ? 'selected' : ''}>Debit</option>
                                    <option value="214000000000002" ${row.accountingEntryRecordType_RefID == '214000000000002' ? 'selected' : ''}>Credit</option>
                                </select>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <input id="debit_credit${index}" class="form-control number-without-negative" onkeyup="onKeyUpDebitCredit(${index})" autocomplete="off" value="${row.debit_credit ? currencyTotal(row.debit_credit) : row.debit_credit}" style="border-radius:0px;" />
                            </td>
                        `;
                        tr2.innerHTML = `
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;padding-left: .3rem;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${index + 1})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="coa_id${index + 1}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="coa_name${index + 1}" value="${journalSettlementDetails[index + 1].coa_name}" style="border-radius:0;width:130px;background-color: ${journalSettlementDetails[index + 1].coa_name ? '#e9ecef' : '#fff'};" class="form-control" readonly />
                                </div>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <select class="form-control" id="accountingEntryRecordType_RefID${index + 1}" onchange="updateField(${index + 1}, 'accountingEntryRecordType_RefID', this.value)">
                                    <option value="" disabled selected>Select a ...</option>
                                    <option value="214000000000001" ${journalSettlementDetails[index + 1].accountingEntryRecordType_RefID == '214000000000001' ? 'selected' : ''}>Debit</option>
                                    <option value="214000000000002" ${journalSettlementDetails[index + 1].accountingEntryRecordType_RefID == '214000000000002' ? 'selected' : ''}>Credit</option>
                                </select>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <input id="debit_credit${index + 1}" class="form-control number-without-negative" onkeyup="onKeyUpDebitCredit(${index + 1})" autocomplete="off" value="${journalSettlementDetails[index + 1].debit_credit ? currencyTotal(journalSettlementDetails[index + 1].debit_credit) : journalSettlementDetails[index + 1].debit_credit}" style="border-radius:0px;" />
                            </td>
                        `;
                    } else {
                        tr.innerHTML = `
                            <td rowspan="2" style="text-align: center; padding-left: 4px !important;">
                                <div class="d-flex justify-content-center">
                                    <!-- ICON MINUS -->
                                    <div class="icon-minus d-flex align-items-center justify-content-center" 
                                        style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:flex;"
                                        onclick="removeRow(${index})">
                                        <i class="fas fa-minus" style="color:#fff;"></i>
                                    </div>
                                </div>
                            </td>
                            <td rowspan="2" style="text-align: center;">
                                ${row.combinedBudgetCode} - ${row.combinedBudgetName}
                            </td>
                            <td rowspan="2" style="text-align: center;">
                                ${row.combinedBudgetSectionCode} - ${row.combinedBudgetSectionName}
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myProductss" onclick="pickProduct(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="product_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="product_name${index}" value="${row.productName}" style="border-radius:0;width:130px;background-color:${row.productName ? '#e9ecef' : '#fff'};" class="form-control" readonly />
                                </div>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="coa_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="coa_name${index}" value="${row.coa_name}" style="border-radius:0;width:130px;background-color:${row.coa_name ? '#e9ecef' : '#fff'};" class="form-control" readonly />
                                </div>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <select class="form-control" id="accountingEntryRecordType_RefID${index}" onchange="updateField(${index}, 'accountingEntryRecordType_RefID', this.value)">
                                    <option value="" disabled selected>Select a ...</option>
                                    <option value="214000000000001" ${row.accountingEntryRecordType_RefID == '214000000000001' ? 'selected' : ''}>Debit</option>
                                    <option value="214000000000002" ${row.accountingEntryRecordType_RefID == '214000000000002' ? 'selected' : ''}>Credit</option>
                                </select>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <input id="debit_credit${index}" class="form-control number-without-negative" onkeyup="onKeyUpDebitCredit(${index})" autocomplete="off" value="${row.debit_credit ? currencyTotal(row.debit_credit) : row.debit_credit}" style="border-radius:0px;" />
                            </td>
                        `;
                        tr2.innerHTML = `
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;padding-left: .3rem;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myProductss" onclick="pickProduct(${index + 1})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="product_id${index + 1}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="product_name${index + 1}" value="${journalSettlementDetails[index + 1].productName}" style="border-radius:0;width:130px;background-color: ${journalSettlementDetails[index + 1].productName ? '#e9ecef' : '#fff'};" class="form-control" readonly />
                                </div>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;padding-left: .3rem;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${index + 1})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                    <input id="coa_id${index + 1}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                    <input id="coa_name${index + 1}" value="${journalSettlementDetails[index + 1].coa_name}" style="border-radius:0;width:130px;background-color: ${journalSettlementDetails[index + 1].coa_name ? '#e9ecef' : '#fff'};" class="form-control" readonly />
                                </div>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <select class="form-control" id="accountingEntryRecordType_RefID${index + 1}" onchange="updateField(${index + 1}, 'accountingEntryRecordType_RefID', this.value)">
                                    <option value="" disabled selected>Select a ...</option>
                                    <option value="214000000000001" ${journalSettlementDetails[index + 1].accountingEntryRecordType_RefID == '214000000000001' ? 'selected' : ''}>Debit</option>
                                    <option value="214000000000002" ${journalSettlementDetails[index + 1].accountingEntryRecordType_RefID == '214000000000002' ? 'selected' : ''}>Credit</option>
                                </select>
                            </td>
                            <td style="border:1px solid #e9ecef;padding-right: .3rem;">
                                <input id="debit_credit${index + 1}" class="form-control number-without-negative" onkeyup="onKeyUpDebitCredit(${index + 1})" autocomplete="off" value="${journalSettlementDetails[index + 1].debit_credit ? currencyTotal(journalSettlementDetails[index + 1].debit_credit) : journalSettlementDetails[index + 1].debit_credit}" style="border-radius:0px;" />
                            </td>
                        `;
                    }
                }
            }

            tbody.appendChild(tr);
            tbody.appendChild(tr2);
        });

        $("#journal_settlement_loading_table").hide();
    }

    function getDetailJournalSettlement(transactionID) {
        const selectedIndex = documentType.selectedIndex;
        const url = documentType.options[selectedIndex].text == "Advance Settlement Form" ? '{!! route("AdvanceSettlement.Detail") !!}?advance_settlement_id=' + transactionID : '{!! route("getPurchaseOrderDetail") !!}';

        $("#journal_settlement_loading_table").show();
        $('#journal_settlement_body_table').empty();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                if (data.status === 200 && Array.isArray(data.data) && data.data.length > 0) {
                    let totalUnsettle = 0;

                    valueCombinedBudgetCode = data.data[0].combinedBudgetCode;
                    valueCombinedBudgetName = data.data[0].combinedBudgetName;
                    valueCombinedBudgetSectionCode = data.data[0].combinedBudgetSectionCode;
                    valueCombinedBudgetSectionName = data.data[0].combinedBudgetSectionName;

                    $.each(data.data, function(key, val) {
                        totalUnsettle += val.balance;
                        totalAdvanceSettlement = ( parseFloat(val.expenseQuantity) * parseFloat(val.expenseProductUnitPriceCurrencyValue) ) + ( parseFloat(val.refundQuantity) * parseFloat(val.refundProductUnitPriceCurrencyValue) );

                        journalSettlementDetails.push(
                            {
                                combinedBudgetCode: val.combinedBudgetCode,
                                combinedBudgetName: val.combinedBudgetName,
                                combinedBudgetSectionCode: val.combinedBudgetSectionCode,
                                combinedBudgetSectionName: val.combinedBudgetSectionName,
                                productCode: val.productCode,
                                productName: val.productName,
                                coa_id: '',
                                coa_name: '',
                                debit_credit: '',
                                isShow: true
                            },
                            {
                                combinedBudgetCode: val.combinedBudgetCode,
                                combinedBudgetName: val.combinedBudgetName,
                                combinedBudgetSectionCode: val.combinedBudgetSectionCode,
                                combinedBudgetSectionName: val.combinedBudgetSectionName,
                                productCode: val.productCode,
                                productName: val.productName,
                                coa_id: '',
                                coa_name: '',
                                debit_credit: '',
                                isShow: true
                            }
                        );
                    });

                    $('#detail_transaction_table').DataTable({
                        destroy: true,
                        data: data.data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +(meta.row + 1) +'</td>';
                                }
                            },
                            {
                                data: 'productCode',
                                defaultContent: '-'
                            },
                            {
                                data: 'productName',
                                defaultContent: '-'
                            },
                            {
                                data: 'UOM',
                                defaultContent: '-'
                            },
                            {
                                data: 'currency',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.quantity);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.productUnitPriceCurrencyValue);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.quantity * data.productUnitPriceCurrencyValue);
                                }
                            },
                            {
                                data: 'expenseQuantity',
                                defaultContent: '-'
                            },
                            {
                                data: 'expenseProductUnitPriceCurrencyValue',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.expenseQuantity * data.expenseProductUnitPriceCurrencyValue);
                                }
                            },
                            {
                                data: 'refundQuantity',
                                defaultContent: '-'
                            },
                            {
                                data: 'refundProductUnitPriceCurrencyValue',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.refundQuantity * data.refundProductUnitPriceCurrencyValue);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    const balanced = ((data.quantity * data.productUnitPriceCurrencyValue) - (data.expenseQuantity * data.expenseProductUnitPriceCurrencyValue)) + (data.refundQuantity * data.refundProductUnitPriceCurrencyValue);

                                    return currencyTotal(balanced);
                                }
                            },
                        ]
                    });

                    const divInputFile = {!! json_encode(
                        \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                            \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'dataInput_Log_FileUpload',
                            null,
                            'dataInput_Return'
                        )
                    ) !!};

                    renderTableJournalSettlement();
                    
                    $('#journalSettlementModalLabel').text(`Detail Transaction ${data.data[0].documentNumber}`);
                    $('#detail_budget_information').text(`: ${data.data[0].combinedBudgetCode} - ${data.data[0].combinedBudgetName}`);
                    $('#detail_sub_budget_information').text(`: ${data.data[0].combinedBudgetSectionCode} - ${data.data[0].combinedBudgetSectionName}`);
                    $('#detail_beneficiary_information').text(`: ${data.data[0].beneficiaryName}`);
                    $('#detail_bank_information').text(`: (${data.data[0].bankNameAcronym}) ${data.data[0].bankName} - ${data.data[0].bankAccount}`);
                    $('#dataInput_Log_FileUpload').val('91000000000291');
                    $("#detail_attachment_information").append(divInputFile);
                    $('#total_unsettle_settlement').val(totalUnsettle);
                    $('#detail_transaction_table').css("width", "100%");
                    $('#total_unposted_journal').val(currencyTotal(totalAdvanceSettlement));
                    $('#total_settlement').val(currencyTotal(totalAdvanceSettlement));
                    // $('#total_settlement').text(currencyTotal(totalAdvanceSettlement));
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', status, error);
            }
        });
    }

    // $('#tableAllTransactions').on('click', 'tbody tr', function() {
    //     const sysId     = $(this).find('input[data-trigger="sys_id_transaction"]').val();
    //     const trano     = $(this).find('td:nth-child(2)').text();
    //     const project   = $(this).find('td:nth-child(3)').text();
    //     const site      = $(this).find('td:nth-child(4)').text();
        
    //     $(`#transaction_id_settlement`).val(sysId);
    //     $(`#transaction_number_settlement`).val(trano);
    //     $(`#transaction_number_settlement`).css('background-color', '#e9ecef');

    //     journalSettlementDetails = [];
    //     getDetailJournalSettlement(sysId);
    //     onClickGeneralJournalButton();

    //     $('#total_settlement').text(currencyTotal(0.00));
    //     $('#total_settlement_table').text(currencyTotal(0.00));
    //     $('#myAllTransactions').modal('hide');
    // });

    $('#tableGetProductss').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_product"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();
        
        $(`#product_id${currentIndexPickProduct}`).val(sysId);
        $(`#product_name${currentIndexPickProduct}`).val(`${code} - ${name}`);
        $(`#product_name${currentIndexPickProduct}`).css('background-color', '#e9ecef');

        updateField(currentIndexPickProduct, 'productCode', code);
        updateField(currentIndexPickProduct, 'productName', name);
        
        $('#myProductss').modal('hide');
    });
</script>