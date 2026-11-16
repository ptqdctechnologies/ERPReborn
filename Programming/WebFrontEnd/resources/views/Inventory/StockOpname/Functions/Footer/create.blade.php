<script>
    const tbodyTableStockOpname = $('#tableStockOpname tbody');
    const type = document.getElementById('stockOpnameType');

    function selectType(e) {
        tbodyTableStockOpname.empty();

        $('#total_items').text('0');
        $('#counted_items').text('0');
        $('#shortage_items').text('0');
        $('#reject_units').text('0');

        if (e.value == "ALL") {
            getStockOpnameDetail("");

            $('#containerWarehouseName').hide();
            $('.containerTypeAll').show();
            $('#warehouse_name').val('');
            $('#warehouse_id').val('');
        } else {
            $('#containerWarehouseName').show();
            $('.containerTypeAll').hide();
        }
    }

    function calculateStockOpname() {
        let shortageCount = 0;
        let totalReject = 0;
        let countedItems = 0;

        $('#tableStockOpname tbody tr').each(function () {

            let row = $(this);

            let good = parseFloat(
                row.find('.qty-good').val()
            ) || 0;

            let reject = parseFloat(
                row.find('.qty-reject').val()
            ) || 0;

            let system = parseFloat(
                row.find('[id^="system_"]').text()
            ) || 0;

            let total = good + reject;

            row.find('[id^="total_"]').text(total);

            if (good && reject && total === system) {
                row.find('[id^="status_"]')
                    .text('Matched')
                    .css({
                        'color': 'green',
                        'font-weight': 'bold'
                    });

                countedItems++;

            } else {
                row.find('[id^="status_"]')
                    .text('-')
                    .css({
                        'color': 'green',
                        'font-weight': 'bold'
                    });

                countedItems++;
            }

            if (good && reject && total !== system) {
                row.find('[id^="status_"]')
                    .text('Shortage')
                    .css({
                        'color': 'red',
                        'font-weight': 'bold'
                    });

                shortageCount++;
            } else {
                row.find('[id^="status_"]')
                    .text('-')
                    .css({
                        'color': 'green',
                        'font-weight': 'bold'
                    });

                countedItems++;
            }

            totalReject += reject;
        });

        // $('#counted_items').text(Utils.formatCurrency(countedItems));
        $('#shortage_items').text(shortageCount);
        $('#reject_units').text(totalReject);
    }

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

                if (Array.isArray(data)) {
                    $("#total_items").text(data.length);

                    $.each(data, function (key, value) {
                        let row = null;

                        if (type.value == "ALL") {
                            row = `
                            <tr>
                                <td style="text-align: center;">${value.ProductCode}</td>
                                <td>${value.ProductName}</td>
                                <td style="text-align: center;">${value.QuantityUnitName}</td>
                                <td style="text-align: center;" id="system_${key}">${value.QuantityStok}</td>
                                <td style="text-align: center;">${value.WarehouseCode} - ${value.WarehouseName}</td>
                                <td>
                                    <input
                                        class="form-control number-only qty-good"
                                        id="qty_good${key}"
                                        data-row="${key}"
                                        autocomplete="off"
                                        style="border-radius:0px;"
                                        value="0"
                                        oninput="$('#stockOpnameType').prop('disabled', true)"
                                    />
                                </td>
                                <td>
                                    <input
                                        class="form-control number-only qty-reject"
                                        id="qty_reject${key}"
                                        data-row="${key}"
                                        autocomplete="off"
                                        style="border-radius:0px;"
                                        value="0"
                                        oninput="$('#stockOpnameType').prop('disabled', true)"
                                    />
                                </td>
                                <td style="text-align: center;" id="total_${key}">0</td>
                                <td style="text-align: center;" id="status_${key}">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">
                                    <textarea class="form-control"></textarea>
                                </td>
                            </tr>
                        `;
                        } else {
                            row = `
                            <tr>
                                <td style="text-align: center;">${value.ProductCode}</td>
                                <td>${value.ProductName}</td>
                                <td style="text-align: center;">${value.QuantityUnitName}</td>
                                <td style="text-align: center;" id="system_${key}">${value.QuantityStok}</td>
                                <td>
                                    <input
                                        class="form-control number-only qty-good"
                                        id="qty_good${key}"
                                        data-row="${key}"
                                        autocomplete="off"
                                        style="border-radius:0px;"
                                        value="0"
                                    />
                                </td>
                                <td>
                                    <input
                                        class="form-control number-only qty-reject"
                                        id="qty_reject${key}"
                                        data-row="${key}"
                                        autocomplete="off"
                                        style="border-radius:0px;"
                                        value="0"
                                    />
                                </td>
                                <td style="text-align: center;" id="total_${key}">0</td>
                                <td style="text-align: center;" id="status_${key}">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">
                                    <textarea class="form-control"></textarea>
                                </td>
                            </tr>
                        `;
                        }

                        tbodyTableStockOpname.append(row);
                    });
                } else {
                    $("#total_items").text('0');
                }
            },
            error: function (textStatus, errorThrown) {
                $("#loadingTableStockOpname").hide();
            }
        });
    }

    $('#warehouseListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const address = $(this).find('td:nth-child(3)').text();

        tbodyTableStockOpname.empty();
        ErrorHandler.hideErrorInputMessage("#warehouse_name", "#warehouseMessage");

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(`${name} - ${address}`);
        $("#warehouse_name").css('background-color', '#e9ecef');
        $('#stockOpnameType').prop("disabled", true);

        getStockOpnameDetail(sysId);

        $('#warehouseListModal').modal('toggle');
    });

    $(document).ready(function () {
        getWarehouseList();
    });

    $(document).on('input', '.qty-good, .qty-reject',
        function () {
            calculateStockOpname();
        }
    );
</script>