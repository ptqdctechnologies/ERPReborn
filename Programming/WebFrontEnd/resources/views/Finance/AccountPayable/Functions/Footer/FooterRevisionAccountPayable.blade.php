<script>
    let totalTaxBased           = 0;
    let totalWHT                = 0;
    let totalDeduction          = 0;
    let currentIndexPickCOA     = null;
    let dataStore               = [];
    const valueVAT              = document.getElementById('ppn');

    function assetValue(params) {
        if (params.value == "no") {
            $(".asset-components").css("display", "none");
            $("#category_number").val("");
            $("#category_id").val("");
            $("#depreciation_rate_percentage").val("");
            $("#depreciation_rate_years").val("");
            $("#depreciation_coa_number").val("");
            $("#depreciation_coa_id").val("");
        } else {
            $(".asset-components").css("display", "flex");
        }
    }

    function vatValue(params) {
        if (params.value == "no") {
            $(".vat-components").css("display", "none");
            $("#invoice_details_total_vat").text(`Total VAT: 0.00`);
        } else {
            $(".vat-components").css("display", "flex");
        }
    }

    function onChangeVAT(params) {
        document.getElementById('invoice_details_total_vat').textContent = `Total VAT: ${decimalFormat((totalTaxBased * params.value) / 100)}`;
    }

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_ap"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        totalTaxBased = total;
        
        document.getElementById('invoice_details_total').textContent = `Total Tax Based: ${decimalFormat(total)}`;
        document.getElementById('invoice_details_total_vat').textContent = `Total VAT: ${decimalFormat((total * valueVAT.value) / 100)}`;
    }

    function getAccountPayableDetails() {
        const dataTable = {!! json_encode($detail ?? []) !!};

        $.each(dataTable, function(key, val) {
            dataStore.push({
                recordID: 212000000000010,
                entities: {
                    combinedBudgetSectionDetail_RefID: parseInt(val.CombinedBudgetSectionDetail_RefID),
                    chartOfAccount_RefID: parseInt(val.ChartOfAccount_RefID),
                    product_RefID: parseInt(val.Product_RefID),
                    quantityUnit_RefID: 73000000000001,
                    quantity: parseFloat(val.Quantity.replace(/,/g, '')),
                    productUnitPriceCurrency_RefID: 62000000000001,
                    productUnitPriceCurrencyValue: parseFloat(val.ProductUnitPriceCurrencyValue.replace(/,/g, '')),
                    productUnitPriceCurrencyExchangeRate: parseFloat(val.ProductUnitPriceBaseCurrencyValue.replace(/,/g, '')),
                    wht: parseFloat(val.WHT.replace(/,/g, '')),
                }
            });

            let row = `
                <tr>
                    <input type="hidden" id="record_RefID${key}" value="${212000000000010}" />

                    <td style="text-align: center;">${val.ProductCode} - ${val.ProductName}</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">${val.UOM}</td>
                    <td style="text-align: center;">-</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input id="qty_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" value="${decimalFormat(parseFloat(val.Quantity))}" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input id="total_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" value="${decimalFormat(parseFloat(val.ProductUnitPriceCurrencyValue))}" readonly />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input id="wht${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" value="${decimalFormat(parseFloat(val.WHT))}" />
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                    <a data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${key})">
                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                    </a>
                                </span>
                            </div>
                            <input id="coa_id${key}" style="border-radius:0;width:130px;" class="form-control" value="${val.ChartOfAccount_RefID}" hidden />
                            <input id="coa_name${key}" style="border-radius:0;width:130px;" class="form-control" value="${val.ChartOfAccountCode} - ${val.ChartOfAccountName}" readonly />
                        </div>
                    </td>
                </tr>
            `;

            $('#invoice_details_table tbody').append(row);

            $(`#qty_ap${key}`).on('keyup', function() {
                let qty_ap      = $(this).val().replace(/,/g, '');
                let wht_ap      = $(`#wht${key}`).val().replace(/,/g, '');
                let total_ap    = parseFloat(qty_ap || 0) * val.ProductUnitPriceBaseCurrencyValue;

                console.log('total_ap', total_ap);

                if (parseFloat(qty_ap) > val.qtyAvail) {
                    $(this).val("");
                    ErrorNotif("Qty AP is over!");
                } else {
                    $(`#total_ap${key}`).val(currencyTotal(total_ap));

                    if (wht_ap) {
                        let result = (total_ap * wht_ap) / 100;
                        totalWHT = result;

                        document.getElementById('invoice_details_total_wht').textContent = `Total WHT: ${currencyTotal(result)}`;
                    }
                    
                }

                calculateTotal();
            });

            $(`#wht${key}`).on('input', function () {
                let val         = this.value.replace(/[^\d]/g, '').slice(0, 3);
                let total_ap    = $(`#total_ap${key}`).val().replace(/,/g, '');

                if (parseInt(val) > 100) {
                    $(this).val("");
                    document.getElementById('invoice_details_total_wht').textContent = "Total WHT: 0.00";
                    ErrorNotif("WHT is over!");
                } else {
                    if (total_ap && total_ap != "0.00") {
                        let result = (val * total_ap) / 100;
                        totalWHT = result;

                        document.getElementById('invoice_details_total_wht').textContent = `Total WHT: ${currencyTotal(result)}`;
                    }
                }
            });
        });
    }

    function summaryData() {
        const sourceTable = document.getElementById('invoice_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('account_payable_details_table').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
        }
    }

    function validationForm() {
        summaryData();
        $('#account_payable_submit_modal').modal('show');
    }

    $('#tableGetCategory').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        $(`#category_id`).val(sysId);
        $(`#category_number`).val(`${code} - ${name}`);
        $(`#category_number`).css('background-color', '#e9ecef');
        
        $('#myGetCategory').modal('hide');
    });

    $('#tableGetPaymentTransfer').on('click', 'tbody tr', async function() {
        let bankCode        = $(this).find('td:nth-child(4)').text();
        let bankAccount     = $(this).find('td:nth-child(6)').text();
        let accountNumber   = $(this).find('td:nth-child(7)').text();

        $(`#payment_transfer_number`).val(`${bankAccount} - (${bankCode}) ${accountNumber}`);
        $(`#payment_transfer_number`).css('background-color', '#e9ecef');
        
        $('#myGetPaymentTransfer').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        if (currentIndexPickCOA === null) {
            $(`#depreciation_coa_id`).val(sysId);
            $(`#depreciation_coa_number`).val(`${code} - ${name}`);
            $(`#depreciation_coa_number`).css({"background-color": "#e9ecef"});
        } else {
            $(`#coa_id${currentIndexPickCOA}`).val(sysId);
            $(`#coa_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
            $(`#coa_name${currentIndexPickCOA}`).css({"background-color": "#e9ecef"});

            currentIndexPickCOA = null;
        }

        $('#myGetChartOfAccount').modal('hide');
    });

    $(`#budget_details_deduction`).on('keyup', function(e) {
        let val = e.target.value.replace(/,/g, '');
        
        if (val <= totalTaxBased) {
            totalDeduction = val;
            $(`#invoice_details_vat`).text(`Total Deduction: ${currencyTotal(val)}`);
        } else {
            $(this).val("");
        }
    });

    $('#tableAccountPayables').on('click', 'tbody tr', function() {
        let sysId           = $(this).find('input[data-trigger="sys_id_modal_account_payable"]').val();
        let trano           = $(this).find('td:nth-child(2)').text();
        let budgetCode      = $(this).find('td:nth-child(3)').text();
        let budgetName      = $(this).find('td:nth-child(4)').text();

        $("#modal_account_payable_id").val(sysId);
        $("#modal_account_payable_document_number").val(trano);

        $('#myAccountPayables').modal('hide');
    });

    $(window).one('load', function(e) {
        getAccountPayableDetails();
    });
</script>