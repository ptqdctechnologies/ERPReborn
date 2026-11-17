<script>
    $('#budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_preview").val(`${code} - ${name}`);
            $("#budget_id").val(id);
            $("#budget_name").val(name);
            $("#budget_code").val(code);

            $("#budget_preview").css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
        }

        $("#budget_code_modal").modal('toggle');
    });
</script>