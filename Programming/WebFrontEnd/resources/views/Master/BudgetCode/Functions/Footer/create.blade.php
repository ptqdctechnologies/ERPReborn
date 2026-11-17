<script>
    $('#tableGetCustomer').on('click', 'tbody tr', function () {
        const table = $('#tableGetCustomer').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const name = dataRow.sys_Text;

            $('#customer_preview').val(name);
            $('#customer_id').val(id);

            $('#customer_preview').css("background-color", "#e9ecef");
        }

        $("#myCustomers").modal('toggle');
    });


    $(document).ready(function () {
        getModalCustomers();
    });
</script>