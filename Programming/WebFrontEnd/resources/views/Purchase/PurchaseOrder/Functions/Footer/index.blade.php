<script>
    $('#modal_purchase_order_document_number_icon').on('click', function () {
        getModalPurchaseOrder();

        $('#purchaseOrderRevisionModal').modal('toggle');
        $('#mySearchPO').modal('toggle');
    });

    $('#TableSearchPORevision').on('click', 'tbody tr', function () {
        const table = $('#TableSearchPORevision').DataTable();
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

            $("#modal_purchase_order_id").val(id);
            $("#modal_purchase_order_document_number").val(trano);
            $("#modal_purchase_order_document_number").css("background-color", "#e9ecef");
        }

        $('#purchaseOrderRevisionModal').modal('toggle');
        $('#mySearchPO').modal('toggle');
    });

    $(document).ready(function () {
        $('#purchaseOrderRevisionModal').on('hide.bs.modal', function () {
            if (document.activeElement && this.contains(document.activeElement)) {
                document.activeElement.blur();
            }
        });
    });
</script>