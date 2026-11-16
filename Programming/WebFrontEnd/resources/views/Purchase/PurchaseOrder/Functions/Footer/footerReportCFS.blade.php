<script>
    $('#budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_information").text(`${code} - ${name}`);
            $("#budget_preview").val(`${code} - ${name}`);
            $("#budget_id").val(id);
            $("#budget_name").val(name);
            $("#budget_code").val(code);

            $("#budget_preview").css("background-color", "#e9ecef");
            $("#sub_budget_container").css({ "cursor": "pointer" });

            $('#sub_budget_container').attr({
                'data-toggle': 'modal',
                'data-target': '#sub_budget_code_modal'
            });

            getSiteCode(id);

            ErrorHandler.hideErrorInputMessage("#budget_preview", "#budget_message");
        }

        $("#budget_code_modal").modal('toggle');
    });

    $('#sub_budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#sub_budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.Sys_ID;
            const code = dataRow.Code;
            const name = dataRow.Name;

            $("#sub_budget_preview").val(`${code} - ${name}`);
            $("#sub_budget_id").val(id);
            $("#sub_budget_name").val(name);
            $("#sub_budget_code").val(code);

            $("#sub_budget_preview").css("background-color", "#e9ecef");

            ErrorHandler.hideErrorInputMessage("#sub_budget_preview", "#sub_budget_message");
        }

        $("#sub_budget_code_modal").modal('toggle');
    });
</script>