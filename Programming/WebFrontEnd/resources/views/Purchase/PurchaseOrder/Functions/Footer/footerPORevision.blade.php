<script>
    var indexPurchaseOrder = 0;
    const termOfPaymentID = document.getElementById('termOfPaymentID');
    const dataTable = document.getElementById('DataPurchaseOrderDetail');
    
    $('#containerValuePPN').hide();
    // $(".loadingPurchaseOrderTable").hide();
    $(".errorPurchaseOrderTable").hide();

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
                        $('#vatOption').append('<option value="' + project.sys_PID + '">' + project.tariffFixRate + '</option>');
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

    function getDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                const result = data.find(({ Name }) => Name === "Purchase Order Form");

                if (Object.keys(result).length > 0) {
                    $("#DocumentTypeID").val(result.Sys_ID);
                } else {
                    console.log('error get document type');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
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

        $.each(dataDetail, function(key, val2) {
            let row = `
                <tr>
                    <td style="text-align: center; padding: 10px !important;">${val2.documentNumber || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productCode || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.productName || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">-</td>
                    <td style="text-align: center; padding: 10px !important;">-</td>
                    <td style="text-align: center; padding: 10px !important;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center; padding: 10px !important;">-</td>
                    <td style="text-align: center; padding: 10px !important;">-</td>
                    <td style="text-align: center; padding: 10px !important;">-</td>
                    <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="qty_req${indexPurchaseOrder}" data-index=${indexPurchaseOrder} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px;" value="${val2.quantity || ''}" />
                    </td>
                    <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="price_req${indexPurchaseOrder}" data-index=${indexPurchaseOrder} data-total-request=${val2.priceBaseCurrencyValue} data-default="" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="total_req${indexPurchaseOrder}" data-default="" autocomplete="off" style="border-radius:0px;" disabled />
                    </td>
                    <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="balance${indexPurchaseOrder}" data-default="" autocomplete="off" style="border-radius:0px;" disabled />
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
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantity || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.remarks || ''}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });
    }

    $(window).one('load', function(e) {
        const data = JSON.parse(dataTable.value);

        getPaymentTerm();
        getVAT();
        getDocumentType();
        viewPurchaseOrderDetail(data);
    });
</script>