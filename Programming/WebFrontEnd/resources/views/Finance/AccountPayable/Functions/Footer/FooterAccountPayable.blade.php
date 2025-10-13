<script>
    let currentIndexPickCOA     = null;

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
        } else {
            $(".vat-components").css("display", "flex");
        }
    }

    function pickCOA(index) {
        currentIndexPickCOA = index;
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
                                <td style="text-align: center;">${val.productCode} - ${val.productName}</td>
                                <td style="text-align: center;">${val.quantity}</td>
                                <td style="text-align: center;">${val.qtyAvail}</td>
                                <td style="text-align: center;">${val.productUnitPriceBaseCurrencyValue}</td>
                                <td style="text-align: center;">${val.quantityUnitName}</td>
                                <td style="text-align: center;">${val.quantity * val.productUnitPriceBaseCurrencyValue}</td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input id="qty_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input id="total_ap${key}" class="form-control number-without-negative" data-index=${key} autocomplete="off" style="border-radius:0px;" />
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
                    });
                } else {
                    
                }
            },
            error: function (textStatus, errorThrown) {
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
</script>