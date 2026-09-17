<script>
    const materialDisposalType = document.getElementById('materialDisposalType');
    const tbodyTableMaterialDisposal = $('#tableMaterialDisposal tbody');

    function selectType(e) {
        tbodyTableMaterialDisposal.empty();

        $('#total_items').text('0');
        $('#counted_items').text('0');
        $('#shortage_items').text('0');
        $('#reject_units').text('0');

        if (e.value == "ALL") {
            getWarehouse("");

            $('.warehouse-type').hide();
            $('.all-type').show('');
        } else {
            $('.warehouse-type').show();
            $('.all-type').hide('');
        }
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
                    $("#total_items").text(data.length);

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
                                            oninput="$('#materialDisposalType').prop('disabled', true)"
                                        />
                                    </td>
                                    <td>
                                        <select type="text" class="form-control" style="border-radius: 0;">
                                            <option disabled selected value="Select a Category">Select a Category</option>
                                            <option value="GENERAL">General</option>
                                            <option value="HAZARDOUS">Hazardous (B3)</option>
                                            <option value="E_WASTE">E-Waste</option>
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
                                            oninput="$('#materialDisposalType').prop('disabled', true)"
                                        />
                                    </td>
                                    <td>
                                        <select type="text" class="form-control" style="border-radius: 0;">
                                            <option disabled selected value="Select a Category">Select a Category</option>
                                            <option value="GENERAL">General</option>
                                            <option value="HAZARDOUS">Hazardous (B3)</option>
                                            <option value="E_WASTE">E-Waste</option>
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