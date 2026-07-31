<script>
    function resetForm() {
        $(`#work_code`).val("");
        $(`#work_name`).val("");
    }

    function getDataWorks() {

    }

    function exportDataWorks() {

    }

    function validateShowButton() {

    }

    $('#tableWorks tbody').on('click', 'tr', function () {
        const table = $('#tableWorks').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            $("#myWorks").modal('toggle');
            $("#workRevisionModal").modal('toggle');

            const workRefID = dataRow.id;
            const workCode = dataRow.code;
            const workName = dataRow.name;

            $(`#modal_work_id`).val(workRefID);
            $(`#modal_work_document_number`).val(`${workCode ?? ''} - ${workName ?? ''}`);
            $(`#modal_work_document_number`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
        }
    });

    $('#revision_work').on('click', function (e) {
        getModalWorks();
    });

    $('#modal_work_document_number_icon').on('click', function () {
        $("#myWorks").modal('toggle');
        $("#workRevisionModal").modal('toggle');
    });
</script>