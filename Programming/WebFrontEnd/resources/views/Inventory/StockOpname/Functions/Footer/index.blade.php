<script>
    const tbodyTableStockOpname = $('#tableStockOpname tbody');
    const type = document.getElementById('stockOpnameType');

    function selectType(e) {
        if (e.value == "ALL") {
            $('#containerWarehouseName').hide();
        } else {
            $('#containerWarehouseName').show();
            $("#containerWarehouseName").css('display', 'flex');
        }
    }

    $('#warehouseListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const address = $(this).find('td:nth-child(3)').text();

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(`${name} - ${address}`);
        $("#warehouse_name").css('background-color', '#e9ecef');
        $('#stockOpnameType').prop("disabled", true);

        $('#warehouseListModal').modal('toggle');
    });

    $(document).ready(function () {
        getWarehouseList();
    });
</script>