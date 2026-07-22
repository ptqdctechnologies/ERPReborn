<script>
    $('#warehouseListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $(`#modal_warehouse_id`).val(sysId);
        $(`#modal_warehouse_document_number`).val(`${code} - ${name}`);
        $(`#modal_warehouse_document_number`).css({ 'background-color': '#e9ecef', 'border': '1px solid #ced4da' });

        $('#warehouseListModal').modal('toggle');
        $('#warehouseRevisionModal').modal('toggle');
    });

    $('#revision_warehouse').on('click', function (e) {
        getWarehouseList();
    });

    $('#modal_warehouse_document_number_icon').on('click', function () {
        $('#warehouseListModal').modal('toggle');
        $('#warehouseRevisionModal').modal('toggle');
    });
</script>