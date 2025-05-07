<script>
    const dataTable = document.getElementById('purchaseRequisitionDetail');

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
                const result = data.find(({ Name }) => Name === "Purchase Requisition Revision Form");

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

    function GetPRNumberDetail(dataDetail) {
        $(".loadingPRDetails").hide();

        let totalPRNumberDetail = 0;

        let tbody = $('#tableGetPRDetails tbody');
        tbody.empty();

        let tbodyList = $('#tablePRDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            totalPRNumberDetail += parseFloat(val2.quantity);

            let row = `
                <tr>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productName}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;"></td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.quantityUnitName}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${currencyTotal(val2.priceCurrencyValue)}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.priceCurrencyISOCode}</td>
                    <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled />
                    </td>
                    <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" disabled />
                    </td>
                    <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                        <textarea id="remark${key}" class="form-control"></textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            let rowList = `
                <tr>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantityUnitName}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.priceCurrencyISOCode}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(val2.priceCurrencyValue)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });
    }

    $(window).one('load', function(e) {
        const data = JSON.parse(dataTable.value);

        $(".loadingPRDetails").hide();
        $(".errorMessageContainerPRDetails").hide();

        GetPRNumberDetail(data);
        getDocumentType();
    });
</script>