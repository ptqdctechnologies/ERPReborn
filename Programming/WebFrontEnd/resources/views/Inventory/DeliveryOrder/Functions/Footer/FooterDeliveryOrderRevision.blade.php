<script>
    const dataTable = document.getElementById('data_table');

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalReferenceNumber').textContent = currencyTotal(total);
    }

    function GetReferenceNumberDetail(dataDetail) {
        $(".loadingReferenceNumberDetail").hide();

        let totalRefNumberDetail = 0;
        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        let tbodyList = $('#tableDeliverOrderDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            totalRefNumberDetail += parseFloat(val2.QtyReq);
            
            let row = `
                <tr>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.DocumentNumber}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-quantity=${val2.QtyReq} autocomplete="off" value=${val2.QtyReq} style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" id="balance${key}" autocomplete="off" style="border-radius:0px;" value="0" disabled />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                        <textarea id="note${key}" class="form-control">${val2.RemarksDeliveryOrderDetail}</textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#qty_req${key}`).on('keyup', function() {
                var qty_req = $(this).val().replace(/,/g, '');
                var data_index = $(this).data('index');
                var data_total_request = $(this).data('quantity');
                var result = data_total_request - qty_req;

                if (Math.sign(result) === -1) {
                    $(this).val("");
                    $(`#balance${data_index}`).val("");
                    ErrorNotif("Qty Request is over Qty Avail !");
                } else {
                    $(`#balance${data_index}`).val(result.toFixed(2));
                    calculateTotal();
                }
            });

            let rowList = `
                <tr>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.DocumentNumber}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">0</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.QtyReq}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">0</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.RemarksDeliveryOrderDetail}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        document.getElementById('TotalReferenceNumber').textContent = totalRefNumberDetail.toFixed(2);
        document.getElementById('GrandTotal').textContent = totalRefNumberDetail.toFixed(2);

        $("#tableReferenceNumberDetail tbody").show();
    }

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).on('load', function() {
        const data = JSON.parse(dataTable.value);

        GetReferenceNumberDetail(data);
    });
</script>