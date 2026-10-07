<script>
    $('#modal_journal_document_number_icon').on('click', function () {
        getJournal();

        $('#journalRevisionModal').modal('toggle');
        $('#myJournal').modal('toggle');
    });

    $('#tableGetJournal').on('click', 'tbody tr', function () {
        const table = $('#tableGetJournal').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            // const status = dataRow.additionalData.latestWorkFlowStatus;

            // if (status !== "Rejection To Resubmit" && status !== "Final Approval") {
            //     Swal.fire(
            //         CONFIG.MESSAGE.revision.title,
            //         CONFIG.MESSAGE.revision.description,
            //         "error"
            //     );
            //     return;
            // }

            const id = dataRow.sys_ID;
            const trano = dataRow.sys_Text;

            $("#modal_journal_id").val(id);
            $("#modal_journal_document_number").val(trano);
            $("#modal_journal_document_number").css({ 'border': '', "background-color": "#e9ecef" });
        }

        $('#journalRevisionModal').modal('toggle');
        $('#myJournal').modal('toggle');
    });

    $('#btn-edit').on('click', function () {
        const journalRefID = $('#modal_journal_id').val();

        if (!journalRefID) {
            $('#modal_journal_document_number').focus();
            $('#modal_journal_document_number').css("border", "1px solid red");
            return;
        }

        const url = "{{ url('Journal') }}/" + journalRefID + "/edit";

        $('#editForm').attr('action', url);
        $('#modal_journal_document_number').css({ 'border': '', 'background-color': '#fff' });

        ShowLoading();

        $('#editForm').submit();
    });

    $('#btn-cancel').on('click', function () {
        $('#modal_journal_id').val('');
        $('#modal_journal_document_number').val('');
        $('#modal_journal_document_number').css({ 'border': '', 'background-color': '#fff' });
    });

    $('#journalRevisionModal').on('hidden.bs.modal', function () {
        $('#modal_journal_id').val('');
        $('#modal_journal_document_number').val('');
        $('#modal_journal_document_number').css({ 'border': '', 'background-color': '#fff' });
    });

    $(document).ready(function () {
        $('#journalRevisionModal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>