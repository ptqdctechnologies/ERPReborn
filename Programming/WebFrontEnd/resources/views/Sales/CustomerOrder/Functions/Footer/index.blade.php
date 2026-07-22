<script>
    $('#customerOrderListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_customer_order"]').val();
        const status = $(this).find('input[data-trigger="workflow_status_customer_order"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $(`#modal_customer_order_id`).val(sysId);
        $(`#modal_customer_order_document_number`).val(trano);
        $(`#modal_customer_order_document_number`).css({ 'border': '1px solid #ced4da', 'background-color': '#e9ecef' });

        $('#customerOrderRevisionModal').modal('toggle');
        $('#customerOrderModal').modal('toggle');
    });

    $('#revision_customer_order').on('click', function (e) {
        getCustomerOderList();
    });

    $('#modal_customer_order_document_number_icon').on('click', function () {
        $('#customerOrderRevisionModal').modal('toggle');
        $('#customerOrderModal').modal('toggle');
    });
</script>