<script>
    $('#modal_advance_request_document_number_icon').on('click', function () {
        getModalAdvance();

        $('#advanceRequestRevisionModal').modal('toggle');
        $('#myGetModalAdvance').modal('toggle');
    });

    $('#tableGetModalAdvance').on('click', 'tbody tr', function () {
        const table = $('#tableGetModalAdvance').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const status = dataRow.additionalData.latestWorkFlowStatus;

            if (status !== "Rejection To Resubmit" && status !== "Final Approval") {
                Swal.fire(
                    CONFIG.MESSAGE.revision.title,
                    CONFIG.MESSAGE.revision.description,
                    "error"
                );
                return;
            }

            const id = dataRow.sys_ID;
            const trano = dataRow.sys_Text;

            $("#modal_advance_request_id").val(id);
            $("#modal_advance_request_document_number").val(trano);
            $("#modal_advance_request_document_number").css("background-color", "#e9ecef");

            $('#advanceRequestRevisionModal').modal('toggle');
            $('#myGetModalAdvance').modal('toggle');
        }
    });

    $(document).ready(function () {
        $('#advanceRequestRevisionModal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>