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

    function summaryData() {
        const sourceTable = document.getElementById('invoice_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('account_payable_details_table').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const combinedBudgetSectionDetailRefID      = row.querySelector('input[id^="combinedBudgetSectionDetail_RefID"]');
            const productRefID                          = row.querySelector('input[id^="product_RefID"]');
            const quantityUnitRefID                     = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID         = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');
            const qtyInput                              = row.querySelector('input[id^="qty_ap"]');
            const totalInput                            = row.querySelector('input[id^="total_ap"]');
            const whtInput                              = row.querySelector('input[id^="wht"]');
            const coaRefID                              = row.querySelector('input[id^="coa_id"]');
            const coaInput                              = row.querySelector('input[id^="coa_name"]');

            if (
                qtyInput && whtInput && coaRefID && 
                qtyInput.value.trim() !== '' &&
                whtInput.value.trim() !== '' &&
                coaRefID.value.trim() !== ''
            ) {
                const product = row.children[5].innerText.trim();
                const uom = row.children[9].innerText.trim();

                const qtyValue      = qtyInput.value.trim();
                const totalValue    = totalInput.value.trim();
                const whtValue      = whtInput.value.trim();
                const coaValue      = coaInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${product}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(qtyValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(totalValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(whtValue)}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${coaValue}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            combinedBudgetSectionDetail_RefID: parseInt(combinedBudgetSectionDetailRefID.value),
                            chartOfAccount_RefID: parseInt(coaRefID.value),
                            product_RefID: parseInt(productRefID.value),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            quantity: parseFloat(qtyValue.replace(/,/g, '')),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyValue: parseFloat(totalValue.replace(/,/g, '')),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            wht: parseFloat(whtValue.replace(/,/g, ''))
                        }
                    });
                }
            }
        }
    }

    function validationForm() {
        summaryData();
        $('#account_payable_submit_modal').modal('show');
    }

    function getPurchaseOrderDetail(purchaseOrderRefID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseOrderDetail") !!}?purchase_order_id=' + purchaseOrderRefID,
            success: async function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    $("#purchase_order_id").val(data[0].purchaseOrder_RefID);
                    $("#purchase_order_number").val(data[0].documentNumber);
                    $("#purchase_order_number").css({"background-color": "#e9ecef"});

                    $("#purchase_order_supplier").val(`${data[0].supplierCode} - ${data[0].supplierName}`);
                    $("#purchase_order_currency").val(data[0].productUnitPriceCurrencyISOCode);

                    $("#purchase_order_payment_term").val(data[0].termOfPaymentName);
                    $("#purchase_order_delivery_to").val(data[0].deliveryTo_NonRefID.Address);
                    $("#purchase_order_delivery_from").val(`${data[0].supplierName} - ${data[0].supplierAddress}`);

                    $.each(data, function(key, val) {
                        let row = `
                            <tr>
                                <input type="hidden" id="combinedBudgetSectionDetail_RefID[]" value="${val.sys_ID}">
                                <input type="hidden" id="product_RefID[]" value="${val.product_RefID}">
                                <input type="hidden" id="quantityUnit_RefID[]" value="${val.quantityUnit_RefID}">
                                <input type="hidden" id="productUnitPriceCurrency_RefID[]" value="${val.productUnitPriceCurrency_RefID}">
                                <input type="hidden" id="productUnitPriceCurrencyExchangeRate[]" value="${val.productUnitPriceCurrencyExchangeRate}">
                                
                                <td style="text-align: left;">${val.productCode} - ${val.productName}</td>
                                <td style="text-align: center;">${val.quantity}</td>
                                <td style="text-align: center;">${val.qtyAvail}</td>
                                <td style="text-align: center;">${currencyTotal(val.productUnitPriceBaseCurrencyValue)}</td>
                                <td style="text-align: center;">${val.quantityUnitName}</td>
                                <td style="text-align: center;">${currencyTotal(val.quantity * val.productUnitPriceBaseCurrencyValue)}</td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input id="qty_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input id="total_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" readonly />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input id="wht${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" />
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
                                        <input id="coa_id${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                                        <input id="coa_name${key}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly />
                                    </div>
                                </td>
                            </tr>
                        `;

                        $('#invoice_details_table tbody').append(row);

                        $(`#qty_ap${key}`).on('keyup', function() {
                            let qty_ap      = $(this).val().replace(/,/g, '');
                            let wht_ap      = $(`#wht${key}`).val().replace(/,/g, '');
                            let total_ap    = parseFloat(qty_ap || 0) * val.productUnitPriceBaseCurrencyValue;

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
                } else {
                    
                }
            },
            error: function (textStatus, errorThrown) {
            }
        });
    }

    function submitForm() {
        $('#account_payable_submit_modal').modal('hide');

        let action = $('#form_submit_account_payable').attr("action");
        let method = $('#form_submit_account_payable').attr("method");
        let form_data = new FormData($('#form_submit_account_payable')[0]);
        form_data.append('account_payable_detail', JSON.stringify(dataStore));

        ShowLoading();

        $.ajax({
        url: action,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: method,
        // success: function(response) {
        success: function(res) {
            HideLoading();

            console.log('res', res);

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
                    cancelForm("{{ route('AccountPayable.index', ['var' => 1]) }}");
                });
            } else {
                ErrorNotif("Data Cancel Inputed");
            }

            // if (response.message == "WorkflowError") {
            //   CancelNotif("You don't have access", '/MaterialReturn?var=1');
            // } else if (response.message == "MoreThanOne") {
            //   $('#getWorkFlow').modal('toggle');

            //   let t = $('#tableGetWorkFlow').DataTable();
            //   t.clear();
            //   $.each(response.data, function(key, val) {
            //     t.row.add([
            //       '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
            //       '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
            //     ]).draw();
            //   });
            // } else {
            //   const formatData = {
            //     workFlowPath_RefID: response.workFlowPath_RefID, 
            //     nextApprover: response.nextApprover_RefID, 
            //     approverEntity: response.approverEntity_RefID, 
            //     documentTypeID: response.documentTypeID,
            //     storeData: response.storeData
            //   };

            //   selectWorkFlow(formatData);
            // }
        },
        error: function(response) {
            console.log('response error', response);
            
            HideLoading();

            CancelNotif("You don't have access", '/AccountPayable?var=1');
        }
        });
    }

    $('#TableSearchPORevision tbody').on('click', 'tr', function () {
        var table = $('#TableSearchPORevision').DataTable();
        var data = table.row(this).data();

        if (data) {
            $("#mySearchPO").modal('toggle');

            var purchaseOrder_RefID = data.sys_ID;
            var code = data.sys_Text;

            getPurchaseOrderDetail(purchaseOrder_RefID);

            // $("#purchaseOrder_RefID").val(purchaseOrder_RefID);
            // $("#purchaseOrder_number").val(code);
        }
    });

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
</script>