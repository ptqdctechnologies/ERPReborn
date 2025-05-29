<script>
    var indexPurchaseOrder          = 0;
    const termOfPaymentID           = document.getElementById('termOfPaymentID');
    const vatOptionValue            = document.getElementById('vatOptionValue');
    const dataTable                 = document.getElementById('DataPurchaseOrderDetail');
    const ppn                       = document.getElementById('ppn');
    const TotalBudgetSelecteds      = document.getElementById('TotalBudgetSelected');
    const TotalBudgetSelectedPpn    = document.getElementById('TotalBudgetSelectedPpn');
    const TotalPpns                 = document.getElementById('TotalPpn');

    $(".errorPurchaseOrderTable").hide();

    ppn.addEventListener('change', function () {
        if (this.value == "Yes") {
            $('#containerValuePPN').show();
        } else {
            TotalBudgetSelectedPpn.textContent = TotalBudgetSelecteds.textContent;
            TotalPpns.textContent = "0.00";
            $('#tariffCurrencyValue').val('0.00');
            $('#vatOption').val('Select a PPN');
            $('#containerValuePPN').hide();
        }
    });

    function getPaymentTerm() {
        $('#containerSelectTOP').hide();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPaymentTerm") !!}',
            success: function(data) {
                $('#containerLoadingTOP').hide();

                if (data && Array.isArray(data)) {
                    $('#containerSelectTOP').show();

                    $('#termOfPaymentOption').empty();
                    $('#termOfPaymentOption').append('<option disabled selected>Select a TOP</option>');

                    data.forEach(function(project) {
                        let isSelected = project.sys_ID == termOfPaymentID.value ? ' selected ' : ' ';
                        $('#termOfPaymentOption').append('<option' + isSelected + 'value="' + project.sys_ID + '">' + project.name + '</option>');
                    });
                } else {
                    console.log('Data top code not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getPaymentTerm error: ', textStatus, errorThrown);
            }
        });
    }

    function getVAT() {
        $('#containerSelectPPN').hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function(data) {
                $('#containerLoadingPPN').hide();

                if (data && Array.isArray(data)) {
                    $('#containerSelectPPN').show();

                    $('#vatOption').empty();
                    $('#vatOption').append('<option disabled selected value="Select a PPN">Select a PPN</option>');

                    data.forEach(function(project) {
                        let isSelected = project.tariffFixRate == vatOptionValue.value ? ' selected ' : ' ';
                        $('#vatOption').append('<option' + isSelected + 'value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                    });
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getVAT error: ', textStatus, errorThrown);
            }
        });
    }

    function CancelPurchaseOrder() {
        ShowLoading();
        window.location.href = '/PurchaseOrder?var=1';
    }

    function viewPurchaseOrderDetail(dataDetail) {
        $(".loadingPurchaseOrderTable").hide();

        let tbody = $('#tablePurchaseOrderDetail tbody');
        tbody.empty();

        let tbodyList = $('#tablePurchaseOrderList tbody');
        tbodyList.empty();

        let totalRequest = 0;

        $.each(dataDetail, function(key, val2) {
            let totalReq = val2.quantity * val2.productUnitPriceCurrencyValue;
            let balanced = totalReq - totalReq;

            totalRequest += totalReq;
            let row = `
                <tr>
                    <td style="text-align: center; padding: 10px !important;">${val2.documentNumber || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productCode || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productName || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.quantity || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName || 'kg'}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">${currencyTotal(totalReq || 0)}</td>
                    <td style="text-align: center; padding: 10px !important;">IDR</td>
                    <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="qty_req${indexPurchaseOrder}" data-index=${indexPurchaseOrder} data-default="${currencyTotal(val2.quantity || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.quantity || 0)}" />
                    </td>
                    <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="price_req${indexPurchaseOrder}" data-index=${indexPurchaseOrder} data-default="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}" />
                    </td>
                    <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="total_req${indexPurchaseOrder}" data-default="${currencyTotal(totalReq || 0)}" autocomplete="off" style="border-radius:0px;" disabled value="${currencyTotal(totalReq || 0)}" />
                    </td>
                    <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="balance${indexPurchaseOrder}" data-default="${currencyTotal(balanced || 0)}" autocomplete="off" style="border-radius:0px;" disabled value="${currencyTotal(balanced || 0)}" />
                    </td>
                    <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <textarea id="note${indexPurchaseOrder}" data-default="" class="form-control">${val2.note || ''}</textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            let rowList = `
                <tr>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.documentNumber || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantityUnitName || 'kg'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">IDR</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.productUnitPriceCurrencyValue || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.quantity || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(totalReq || 0)}</td> 
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.remarks || ''}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        let allTotal = totalRequest + parseFloat(dataDetail[0].tariffCurrencyValue.replace(/,/g, ''))

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(totalRequest);
        document.getElementById('TotalPpn').textContent = currencyTotal(dataDetail[0].tariffCurrencyValue);
        document.getElementById('TotalBudgetSelectedPpn').textContent = currencyTotal(allTotal);
        document.getElementById('GrandTotal').textContent = currencyTotal(allTotal);
    }

    $(window).one('load', function(e) {
        const data = JSON.parse(dataTable.value);

        if (vatOptionValue.value) {
            $('#containerValuePPN').show();
        } else {
            $('#containerValuePPN').hide();
        }

        getPaymentTerm();
        getVAT();
        getDocumentType("Purchase Order Revision Form");
        viewPurchaseOrderDetail(data);
    });
</script>