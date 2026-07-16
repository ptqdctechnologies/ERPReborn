<script>
    $('#tableCustomerOrder').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_customer_order"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $(`#customer_order_id`).val(sysId);
        $(`#customer_order_number`).val(trano);
        $(`#customer_order_number`).css({ 'border': '1px solid #ced4da', 'background-color': '#e9ecef' });

        $('#myCustomerOrder').modal('toggle');
    });

    $('#revision_customer_order').on('click', function (e) {
        getCustomerOrder();
    });
</script>