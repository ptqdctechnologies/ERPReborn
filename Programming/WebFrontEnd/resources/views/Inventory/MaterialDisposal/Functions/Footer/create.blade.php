<script>
    const materialDisposalType = document.getElementById('materialDisposalType');
    const tbodyTableMaterialDisposal = $('#tableMaterialDisposal tbody');

    function selectType(e) {
        tbodyTableMaterialDisposal.empty();

        $('#total_items').text('0');
        $('#lines_entered').text('0');
        $('#total_qty').text('0');
        $('#hazardous_qty').text('0');

        if (e.value == "ALL") {
            getWarehouse("");

            $('.warehouse-type').hide();
            $('.all-type').show('');
        } else {
            $('.warehouse-type').show();
            $('.all-type').hide('');
        }
    }

    function updateSummary() {
        let totalQty     = 0;
        let hazardousQty = 0;
        let linesEntered = 0;

        tbodyTableMaterialDisposal.find('tr').each(function () {
            const qty      = parseFloat($(this).find('input.number-only').val()) || 0;
            const category = $(this).find('select[data-category]').val();
            const categorySelected = category && category !== 'Select a Category';

            totalQty += qty;

            if (category === 'HAZARDOUS') {
                hazardousQty += qty;
            }

            if (qty > 0 && categorySelected) {
                linesEntered++;
            }
        });

        $('#total_qty').text(totalQty);
        $('#hazardous_qty').text(hazardousQty);
        $('#lines_entered').text(linesEntered);
    }

    function getWarehouse(warehouseRefID) {
        $("#loadingTableMaterialDisposal").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("DeliveryOrder.StockDetail") !!}?combinedBudget_RefID=""&warehouse_RefID=' + warehouseRefID,
            success: async function (data) {
                $("#loadingTableMaterialDisposal").hide();

                if (Array.isArray(data)) {
                    // total_items = COUNT(DISTINCT ProductCode)
                    const distinctProductCodes = new Set(data.map(item => item.ProductCode).filter(Boolean));
                    $("#total_items").text(distinctProductCodes.size);

                    // Reset qty-based summaries
                    $('#total_qty').text('0');
                    $('#hazardous_qty').text('0');

                    $.each(data, function (key, value) {
                        let row = null;

                        if (materialDisposalType.value == "ALL") {
                            row = `
                                <tr>
                                    <td style="text-align: center;">${value.ProductCode || '-'}</td>
                                    <td>${value.ProductName || '-'}</td>
                                    <td style="text-align: center;">${value.WarehouseCode} - ${value.WarehouseName}</td>
                                    <td style="text-align: center;">${value.QuantityUnitName}</td>
                                    <td>
                                        <input
                                            class="form-control number-only"
                                            id="qty${key}"
                                            data-row="${key}"
                                            autocomplete="off"
                                            style="border-radius:0px;"
                                            value="0"
                                            oninput="$('#materialDisposalType').prop('disabled', true); updateSummary();"
                                        />
                                    </td>
                                    <td>
                                        <select type="text" class="form-control" data-category style="border-radius: 0;" onchange="updateSummary()">
                                            <option disabled selected value="Select a Category">Select a Category</option>
                                            <option value="GENERAL">General</option>
                                            <option value="HAZARDOUS">Hazardous (B3)</option>
                                            <option value="E_WASTE">E-Waste</option>
                                            <option value="LOST">Lost</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">0</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">
                                        <textarea class="form-control"></textarea>
                                    </td>
                                </tr>
                            `;
                        } else {
                            row = `
                                <tr>
                                    <td style="text-align: center;">${value.ProductCode || '-'}</td>
                                    <td>${value.ProductName || '-'}</td>
                                    <td style="text-align: center;">${value.QuantityUnitName}</td>
                                    <td>
                                        <input
                                            class="form-control number-only"
                                            id="qty${key}"
                                            data-row="${key}"
                                            autocomplete="off"
                                            style="border-radius:0px;"
                                            value="0"
                                            oninput="$('#materialDisposalType').prop('disabled', true); updateSummary();"
                                        />
                                    </td>
                                    <td>
                                        <select type="text" class="form-control" data-category style="border-radius: 0;" onchange="updateSummary()">
                                            <option disabled selected value="Select a Category">Select a Category</option>
                                            <option value="GENERAL">General</option>
                                            <option value="HAZARDOUS">Hazardous (B3)</option>
                                            <option value="E_WASTE">E-Waste</option>
                                            <option value="LOST">Lost</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">0</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">-</td>
                                    <td style="text-align: center;">
                                        <textarea class="form-control"></textarea>
                                    </td>
                                </tr>
                            `;
                        }

                        tbodyTableMaterialDisposal.append(row);
                    });
                } else {
                    $("#total_items").text('0');
                    $("#lines_entered").text('0');
                }
            },
            error: function (textStatus, errorThrown) {
                $("#loadingTableMaterialDisposal").hide();
            }
        });
    }

    $('#warehouseListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const address = $(this).find('td:nth-child(3)').text();

        tbodyTableMaterialDisposal.empty();
        ErrorHandler.hideErrorInputMessage("#warehouse_name", "#warehouseMessage");

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(`${name} - ${address}`);
        $("#warehouse_name").css('background-color', '#e9ecef');
        $('#materialDisposalType').prop("disabled", true);

        getWarehouse(sysId);

        $('#warehouseListModal').modal('toggle');
    });

    $(document).ready(function () {
        getWarehouseList();
    });
</script>