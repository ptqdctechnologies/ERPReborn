<script>
    function getStockOpnameDetail(warehouseRefID) {
        $("#loadingTableStockOpname").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("DeliveryOrder.StockDetail") !!}?combinedBudget_RefID=""&warehouse_RefID=' + warehouseRefID,
            success: async function (data) {
                $("#loadingTableStockOpname").hide();
                console.log('data', data);

                let tbody = $('#tableStockOpname tbody');
                tbody.empty();

                $.each(data, function (key, value) {
                    let row = `
                        <tr>
                            <td style="text-align: center;">${value.ProductCode}</td>
                            <td>${value.ProductName}</td>
                            <td style="text-align: center;">${value.QuantityUnitName}</td>
                            <td style="text-align: center;">${value.QuantityStok}</td>
                            <td>
                                <input class="form-control number-without-negative" id="qty_good${key}" autocomplete="off" style="border-radius:0px;" />
                            </td>
                            <td>
                                <input class="form-control number-without-negative" id="qty_reject${key}" autocomplete="off" style="border-radius:0px;" />
                            </td>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;">-</td>
                            <td style="text-align: center;">-</td>
                        </tr>
                    `;

                    tbody.append(row);
                });
            },
            error: function (textStatus, errorThrown) {
                $("#loadingTableStockOpname").hide();
            }
        });
    }

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const address = $(this).find('td:nth-child(3)').text();

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(`${name} - ${address}`);
        $("#warehouse_name").css('background-color', '#e9ecef');

        getStockOpnameDetail(sysId);

        ErrorHandler.hideErrorInputMessage("#warehouse_name", "#warehouseMessage");

        $('#myGetModalWarehouses').modal('toggle');
    });

    $(document).ready(function () {
        getModalWarehouses();
    });
</script>